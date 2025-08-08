<?php
session_start();
include 'config.php';
include 'setup.php';
?>
<link rel="stylesheet" href="style.css">
<link rel="icon" href="../home/logo/logome.png" type="image/x-icon">
<link rel="apple-touch-icon" href="../home/logo/logome.png">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password_input = $_POST['password'];

    $stmt = $conn->prepare('SELECT id, password FROM admins WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($admin_id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password_input, $hashed_password)) {
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit;
        } else {
            echo '❌ Incorrect password.';
        }
    } else {
        echo '';
    }

    $stmt->close();
}
?>