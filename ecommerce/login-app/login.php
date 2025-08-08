<?php
include 'db.php';
?>
<link rel="stylesheet" href="../login-app/style.css">
<link rel="icon" href="../home/logo/logome.png" type="image/x-icon">
<link rel="apple-touch-icon" href="../home/logo/logome.png">
<?php
$username = $_POST['username'];
$password_input = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    if (password_verify($password_input, $hashed_password)) {
        echo '
        <div class="success-box" id="login-success">
            Login successful by: , ' . htmlspecialchars($username) . '!<br>
            <span id="redirect-msg">Redirecting in <span id="countdown"></span>...</span>
        </div>
        <script>
            let seconds = 1;
            const countdown = document.getElementById("countdown");
            const msg = document.getElementById("redirect-msg");
            const interval = setInterval(function() {
                seconds--;
                countdown.textContent = seconds;
                if (seconds <= 0) {
                    clearInterval(interval);
                    msg.textContent = "Redirecting...";
                    window.location.href = "../home/index.php";
                }
            }, 1000);
        </script>
        ';
    } else {
        echo "<div class='error-box'>❌ Wrong password.</div>";
    }
} else {
    echo "<div class='error-box'>❌ Username not found.</div>";
}

$stmt->close();
$conn->close();
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
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
}
.next-btn:hover {
    background: #fffde7;
    color: #cc1a55;
    box-shadow: 0 4px 16px rgba(255,214,0,0.15);
}
</style>