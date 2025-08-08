<?php
include 'db.php';
?>
<link rel="stylesheet" href="style.css">
<link rel="icon" href="../home/logo/logome.png" type="image/x-icon">
<link rel="apple-touch-icon" href="../home/logo/logome.png">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='error-box'>❌ ឈ្មោះប្រើប្រាស់មិនត្រឹមត្រូវ. <a href='index.php'>ព្យាយាមម្ដងទៀត</a></div>";
    } else {

        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            echo "<div class='success-box'>✅ ការចុះឈ្មោះជោគជ័យ. <a href='../login-app/index.php'>ចូលគណនី</a></div>";
        } else {
            echo "<div class='error-box'>❌ Error: " . $stmt->error . "</div>";
        }
        $stmt->close();
    }

    $check->close();
    $conn->close();
} else {
    echo "<div class='error-box'>មិនត្រឹមត្រូវ.</div>";
}
?>
<style>
    .success-box {
        background: #e8f5e9;
        color: #218838;
        border: 2px solid #28a745;
        border-radius: 10px;
        padding: 24px 32px;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        margin: 40px auto 0 auto;
        display: inline-block;
    }

    .error-box {
        background: #ffebee;
        color: #b71c1c;
        border: 2px solid #f44336;
        border-radius: 10px;
        padding: 24px 32px;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        margin: 40px auto 0 auto;
        display: inline-block;
    }

    .next-btn {
        background: #FFD600;
        color: #540012;
        border: none;
        padding: 12px 32px;
        border-radius: 30px;
        font-size: 1.1em;
        font-weight: bold;
        cursor: pointer;
        margin-top: 15px;
        transition: background 0.3s, color 0.3s, box-shadow 0.3s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        position: relative;
        overflow: hidden;
    }

    .next-btn:hover {
        background: #fffde7;
        color: #cc1a55;
        box-shadow: 0 4px 16px rgba(255, 214, 0, 0.15);
    }
</style>