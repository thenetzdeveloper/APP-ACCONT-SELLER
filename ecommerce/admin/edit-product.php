<?php
include '../api/db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM products WHERE id=$id");
$product = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $desc = $conn->real_escape_string($_POST['description']);
    $price = floatval($_POST['price']);
    $iconPath = $product['image'];
    if (isset($_FILES['icon']) && $_FILES['icon']['error'] == UPLOAD_ERR_OK) {
        $targetDir = "../img/products/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $fileType = mime_content_type($_FILES['icon']['tmp_name']);

        if (in_array($fileType, $allowedTypes)) {

            if (!empty($product['image']) && file_exists("../" . $product['image'])) {
                unlink("../" . $product['image']);
            }

            $ext = pathinfo($_FILES['icon']['name'], PATHINFO_EXTENSION);
            $iconName = uniqid('icon_', true) . '.' . $ext;
            $iconPath = $targetDir . $iconName;

            if (move_uploaded_file($_FILES['icon']['tmp_name'], $iconPath)) {
                $iconPath = str_replace('../', '', $iconPath);
            } else {
                die("Failed to upload icon");
            }
        } else {
            die("Invalid file type. Only JPG, PNG, GIF, or WEBP allowed.");
        }
    }
    $sql = "UPDATE products SET name=?, description=?, price=?, image=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsi", $name, $desc, $price, $iconPath, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Update error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
    <link rel="icon" href="../home/logo/logome.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../home/logo/logome.png">
    <link rel="stylesheet" href="./style.css">
    <style>
        body {
            background-image: url('../home/logo/logome.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Segoe UI', Arial, sans-serif;
            padding: 20px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input,
        textarea,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        button:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }

        .current-image {
            max-width: 100px;
            display: block;
            margin-bottom: 10px;
            border-radius: 8px;
            transition: transform 0.3s;
        }

        .current-image:hover {
            transform: scale(1.1);
        }

        .file-upload {
            position: relative;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .file-upload-btn {
            display: block;
            padding: 12px;
            background: #4f8cff;
            color: white;
            text-align: center;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-upload-btn:hover {
            background: #357ae8;
            transform: translateY(-2px);
        }

        .file-upload-input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            width: 100%;
            height: 100%;
        }

        .file-upload-preview {
            display: none;
            max-width: 150px;
            max-height: 150px;
            margin: 15px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .file-upload-preview:hover {
            transform: scale(1.05);
        }

        .file-upload-filename {
            display: none;
            text-align: center;
            margin-top: 10px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <h2>កែសម្រួលកម្មវិធី</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br><br>
        <textarea name="description" required><?= htmlspecialchars($product['description']) ?></textarea><br><br>
        <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price']) ?>" required><br><br>

        <label>កម្មវិធីបច្ចុប្បន្ន:</label>
        <?php if (!empty($product['image'])): ?>
            <img src="../<?= htmlspecialchars($product['image']) ?>" class="current-image" alt="Current Icon" id="current-icon">
        <?php endif; ?>

        <div class="file-upload">
            <div class="file-upload-btn" id="upload-btn">ជ្រើសរើសកម្មវិធីថ្មី</div>
            <input type="file" name="icon" accept="image/*" class="file-upload-input" id="file-input">
            <img src="" class="file-upload-preview" id="image-preview">
            <div class="file-upload-filename" id="file-name"></div>
        </div>

        <button type="submit">កែសម្រួល</button>
    </form>
    <a href="index.php" style="
        display:inline-block;
        margin-top:20px;
        padding:10px 24px;
        background:#4f8cff;
        color:#fff;
        border-radius:6px;
        text-decoration:none;
        font-size:16px;
        font-weight:600;
        transition:background 0.2s;
    " onmouseover="this.style.background='#ff0000ff'" onmouseout="this.style.background='#4f8cff'">
        ថយក្រោយ
    </a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('file-input');
            const uploadBtn = document.getElementById('upload-btn');
            const imagePreview = document.getElementById('image-preview');
            const fileName = document.getElementById('file-name');
            const currentIcon = document.getElementById('current-icon');

            fileInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                        if (currentIcon) {
                            currentIcon.style.display = 'none';
                        }
                    }

                    reader.readAsDataURL(this.files[0]);
                    fileName.textContent = this.files[0].name;
                    fileName.style.display = 'block';
                    uploadBtn.textContent = 'ជ្រើសរើសឯកសារផ្សេងទៀត';
                    uploadBtn.style.animation = 'none';
                    void uploadBtn.offsetWidth;
                    uploadBtn.style.animation = 'pulse 0.5s';
                }
            });

            uploadBtn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });

            uploadBtn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>

</html>