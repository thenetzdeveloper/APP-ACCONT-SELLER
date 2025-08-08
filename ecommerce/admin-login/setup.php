<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "admin_db";

echo '<link rel="icon" href="../img/logome.png" type="image/x-icon">';
echo '<link rel="apple-touch-icon" href="../img/logome.png">';

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

$conn->query("
    CREATE TABLE IF NOT EXISTS admins (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL
    )
");

$conn->query("DELETE FROM admins WHERE username = 'netsmos100'");

$username = 'netsmos100';
$password = password_hash('netsmos100k', PASSWORD_DEFAULT);

$stmt = $conn->prepare('INSERT INTO admins (username, password) VALUES (?, ?)');
$stmt->bind_param('ss', $username, $password);
$stmt->execute();

echo '<div class="success-box">រកមិនឃើញ.<br><a href="index.php">ព្យាយាមម្ដងទៀត</a></div>';
?>
