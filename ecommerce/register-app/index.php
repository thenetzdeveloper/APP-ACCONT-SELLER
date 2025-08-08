<?php
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./style.css">

<head>
    <meta charset="UTF-8">
    <title>បង្កើតគណនីថ្មីផ្ទាល់ខ្លួន</title>
    <link rel="icon" href="../home/logo/logome.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../home/logo/logome.png">
</head>
<style>
    body {
        background-image: url('../home/logo/logome.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        font-family: 'Arial', sans-serif;
    }
</style>


<body>
    <div class="form-box">
        <h2>បង្កើតគណនីថ្មីផ្ទាល់ខ្លួន</h2>
        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="ឈ្មោះប្រើប្រាស់" required>
            <input type="password" name="password" placeholder="ពាក្យសម្ងាត់" required>
            <input type="submit" value="បង្កើតគណនី">
        </form>
        <a href="../login-app/index.php" style="
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