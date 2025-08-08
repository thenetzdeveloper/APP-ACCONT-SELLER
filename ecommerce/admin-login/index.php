<?php
?>

<!DOCTYPE html>
<html lang="km">
<html>

<head>
    <title>គណនី​ អេដមីន</title>
    <link rel="icon" href="../home/logo/logome.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../home/logo/logome.png">
</head>
<style>
    body {
        background-image: url(../home/logo/logome.png);
        font-family: 'Segoe UI', Arial, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
    }

    h2 {
        color: #333;
        margin-bottom: 24px;
        letter-spacing: 1px;
    }

    form {
        background: #fff;
        padding: 32px 28px;
        border-radius: 10px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 320px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 12px 10px;
        margin: 8px 0;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 16px;
        transition: border 0.2s;
        outline: none;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border: 1.5px solid #4f8cff;
    }

    button[type="submit"] {
        background: #4f8cff;
        color: #fff;
        border: none;
        padding: 12px 0;
        width: 100%;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 16px;
        transition: background 0.2s;
    }

    button[type="submit"]:hover {
        background: #357ae8;
    }

    a {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 24px;
        background: #4f8cff;
        color: #fff;
        border-radius: 6px;
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        transition: background 0.2s;
    }

    a:hover {
        background: #ff0000;
    }
</style>

<body>
    <h2>គណនី​ អេដមីន</h2>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="netsmos100" required><br><br>
        <input type="password" name="password" placeholder="netsmos100" required><br><br>
        <button type="submit">ចូលគណនី</button>
    </form>
    <a href="../home/index.php">
        ថយក្រោយ
    </a>
</body>

</html>