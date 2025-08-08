<?php
include 'db.php';

echo '<link rel="icon" href="../img/logome.png" type="image/x-icon">';
echo '<link rel="apple-touch-icon" href="../img/logome.png">';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO messages (name, email, message)
            VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background-image:url(../img/logome.png);
            background-size:cover;
            font-family:Arial,sans-serif;
        '>
            <div style='background:#e8f5e9;padding:32px 28px;border-radius:10px;box-shadow:0 4px 24px rgba(0,0,0,0.08);text-align:center;border:2px solid #4caf50;color:#218838;font-weight:bold;'>
                Message sent successfully!
                <script>
                    setTimeout(function(){
                        window.location.href = '../home/index.php';
                    }, 500);
                </script>
            </div>
        </div>";
    } else {
        echo "<div style='
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background-image:url(../img/logome.png);
            background-size:cover;
            font-family:Arial,sans-serif;
        '>
            <div style='background:#fff;padding:32px 28px;border-radius:10px;box-shadow:0 4px 24px rgba(0,0,0,0.08);text-align:center;color:#b71c1c;border:2px solid #f44336;font-weight:bold;'>
                Error: " . $conn->error . "
            </div>
        </div>";
    }
}
?>
