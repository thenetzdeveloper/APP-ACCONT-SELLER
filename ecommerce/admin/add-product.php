<?php
include '../api/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $desc = $conn->real_escape_string($_POST['description']);
    $price = floatval($_POST['price']);

    $iconPath = '';
    if (isset($_FILES['icon']) && $_FILES['icon']['error'] == UPLOAD_ERR_OK) {
        $targetDir = "../img/products/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $fileType = mime_content_type($_FILES['icon']['tmp_name']);
        
        if (in_array($fileType, $allowedTypes)) {
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
    } else {
        die("Icon upload error");
    }

    $sql = "INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $name, $desc, $price, $iconPath);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
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
            background: rgba(255,255,255,0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, textarea, button {
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
        
        .file-upload {
            position: relative;
            overflow: hidden;
            margin-bottom: 15px;
        }
        .file-upload-btn {
            display: inline-block;
            padding: 12px 24px;
            background: #4f8cff;
            color: white;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            width: 100%;
        }
        .file-upload-btn:hover {
            background: #357ae8;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
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
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .file-upload-filename {
            display: none;
            text-align: center;
            margin-top: 10px;
            color: #666;
            font-size: 14px;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .pulse-animation {
            animation: pulse 0.5s;
        }
    </style>
</head>
<body>
    <h2>បន្ថែមកម្មវិធី</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="ឈ្មោះកម្មវិធី" required><br><br>
        <textarea name="description" placeholder="ព័ត៏មានលម្អិត" required></textarea><br><br>
        <input type="number" step="0.01" name="price" placeholder="តម្លៃ" required><br><br>
        
        <label>កម្មវិធី:</label>
        <div class="file-upload">
            <button type="button" class="file-upload-btn" id="upload-btn">
                <i class="fas fa-cloud-upload-alt"></i> ជ្រើសរើសរូបភាព
            </button>
            <input type="file" name="icon" accept="image/*" class="file-upload-input" id="file-input" required>
            <img src="" class="file-upload-preview" id="image-preview">
            <div class="file-upload-filename" id="file-name"></div>
        </div>
        <br>
        
        <button type="submit">បន្ថែម</button>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('file-input');
            const uploadBtn = document.getElementById('upload-btn');
            const imagePreview = document.getElementById('image-preview');
            const fileName = document.getElementById('file-name');
            
            fileInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                    fileName.textContent = this.files[0].name;
                    fileName.style.display = 'block';
                    
                    uploadBtn.innerHTML = '<i class="fas fa-check-circle"></i> ' + this.files[0].name;
                    uploadBtn.classList.add('pulse-animation');
                    
                    setTimeout(() => {
                        uploadBtn.classList.remove('pulse-animation');
                    }, 500);
                }
            });
            
            uploadBtn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 4px 8px rgba(0,0,0,0.2)';
            });
            
            uploadBtn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            });
        });
    </script>
</body>
</html>