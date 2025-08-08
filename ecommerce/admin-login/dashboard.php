<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit;
}
?>
<h2>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
<p>This is your admin dashboard.</p>
<a href="logout.php">Logout</a>
<?php

$_SESSION['admin_id'] = $admin_id;
$_SESSION['username'] = $username;
header('Location: ../admin/index.php');
exit;
?>
