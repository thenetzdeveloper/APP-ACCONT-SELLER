<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message_id'])) {
    $message_id = intval($_POST['message_id']);
    
    $stmt = $conn->prepare("DELETE FROM messages WHERE id = ?");
    $stmt->bind_param("i", $message_id);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        header('Location: dashboard.php?status=deleted');
    } else {
        header('Location: dashboard.php?status=error');
    }
    exit;
} else {
    header('Location: dashboard.php');
    exit;
}
?>