<?php
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./style.css">

<head>
  <meta charset="UTF-8">
  <title>ចូលគណនី</title>
  <link rel="icon" href="../home/logo/logome.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="../home/logo/logome.png">
</head>

<body>
  <div class="login-box">
    <h2>ចូលគណនី</h2>
    <form action="login.php" method="POST">
      <input type="text" name="username" placeholder="ឈ្មោះអ្នកប្រើប្រាស់" required>
      <input type="password" name="password" placeholder="លេខកូដសម្ងាត់" required>
      <input type="submit" value="ចូលគណនី">
      <p>មិនទាន់​មាន​គណនី ? <a href="../register-app/index.php" target="_blank" rel="noopener noreferrer">បង្កើតគណនីថ្មី</a></p>
    </form>
    <a href="../home/index.php" style="
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
    " onmouseover="this.style.background='#ff0000'" onmouseout="this.style.background='#4f8cff'">
    ថយក្រោយ
    </a>
  </div>
</body>

</html>