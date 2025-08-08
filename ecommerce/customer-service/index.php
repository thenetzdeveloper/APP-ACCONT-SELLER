<?php

?>
<!DOCTYPE html>
<html lang="km​ , en">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ជំនួយអតិថិជន</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../home/logo/logome.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../home/logo/logome.png">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
        font-family: Arial, sans-serif;
        background-image: url('../home/logo/logome.png');
    }

    .form-center {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
    }

    input,
    textarea {
        width: 100%;
        max-width: 400px;
        padding: 10px;
        margin-bottom: 12px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        padding: 10px 20px;
        background: #dfc909ff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background: #0bdf04ff;
    }

    .success-message,
    .error-message {
        max-width: 400px;
        width: 100%;
        box-sizing: border-box;
        margin-top: 10px;
        text-align: center;
    }

    .success-message {
        color: green;
        padding: 10px;
        background: #e6ffe6;
        border: 1px solid green;
        border-radius: 4px;
    }

    .error-message {
        color: red;
        padding: 10px;
        background: #ffebeb;
        border: 1px solid red;
        border-radius: 4px;
    }

    .form-center {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
    }
</style>

<body>
    <div class="form-center">
        <h2>បញ្ចេញ​មតិរបស់អ្នកនៅទីនេះ</h2>
        <form method="POST" action="submit-form.php">
            <label>ឈ្មោះ</label><br>
            <input type="text" name="name" required><br>
            <label>អ៊ីម៉ែល</label><br>
            <input type="email" name="email" required><br>
            <label>មតិរបស់អ្នក</label><br>
            <textarea name="message" required></textarea><br>
            <button type="submit">បញ្ជូន</button>
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
        </form>

        <?php
        if (isset($_GET['success'])) {
            echo '<p class="success-message">Your message has been sent successfully!</p>';
        }
        if (isset($_GET['error'])) {
            echo '<p class="error-message">There was an error sending your message. Please try again.</p>';
        }
        ?>
    </div>
</body>

</html>