<?php
$products = [

];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['item'])) {
    $item = $_POST['item'];

    if (array_key_exists($item, $products)) {
        $product = $products[$item];

        $qrImage = "../home/qr/" . $product['qr'];

?>
        <!DOCTYPE html>
        <html lang="en">
        <link rel="icon" href="../home/logo/logome.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="../home/logo/logome.png">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>បង់ប្រាក់ចំពោះ<?php echo htmlspecialchars($product['name']); ?></title>
            <link rel="stylesheet" href="./style.css">
        </head>

        <body style="
            background-image: url('../home/logo/logome.png');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        ">
            <div class="card">
                <h2>
                    <?php echo htmlspecialchars($product['name']); ?>
                </h2>
                <div class="qr">
                    <img src="<?php echo htmlspecialchars($qrImage); ?>" alt="QR for <?php echo htmlspecialchars($product['name']); ?>">
                </div>
                <h2>សូមថតអេក្រង់​QRនេះ បន្ទាប់មករងចាំវាដំណើរការ <br> វានឹងលោតចូលTELEGRAM</h2>
                <p> សូមផ្ញើរូបថតអេក្រង់ ​QR ទៅTELEGRAM ADMIN <br>នៅពេលចូលដល់TELEGRAM <br> អាចចំណាយពេលអាចយូរ2នាទី...</p>
                <button id="payNowBtn"></button>
                <a href="../home/index.php" id="backBtn" style="display:inline-block;margin-top:18px;padding:10px 28px;background:#FFD600;color:#540012;border-radius:24px;text-decoration:none;font-weight:bold;transition:background 0.2s, color 0.2s;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                    ថយក្រោយ
                </a>
                <script>
                    setTimeout(function() {
                        document.getElementById('payNowBtn').click();
                    }, 100);

                    document.getElementById('payNowBtn').onclick = function() {
                        const btn = this;
                        btn.disabled = true;
                        btn.textContent = "កំពុកស្នើទៅកាន់ធនាគារ...";
                        btn.insertAdjacentHTML('afterend', '<div id="bank-loading" style="margin-top:20px;"><span class="loader"></span></div>');
                        document.head.insertAdjacentHTML('beforeend', `<style>
                            .loader {
                                border: 4px solid #e0e0e0;
                                border-top: 4px solid #4f8cff;
                                border-radius: 50%;
                                width: 28px;
                                height: 28px;
                                animation: spin 1s linear infinite;
                                display:inline-block;
                                vertical-align:middle;
                            }
                            @keyframes spin {
                                0% { transform: rotate(0deg);}
                                100% { transform: rotate(360deg);}
                            }
                        </style>`);
                        setTimeout(function() {
                            window.location.href = "https://t.me/netisnet?item=<?php echo urlencode($item); ?>";
                        }, 20000);
                    };
                    setTimeout(function() {
                        window.location.href = "https://t.me/netisnet?item=<?php echo urlencode($item); ?>";
                    }, 20000);
                </script>
            </div>
        </body>

        </html>
<?php
    } else {
        $telegramLink = "https://t.me/netisnet";
        echo '<script>
            setTimeout(function() {
                window.location.href = "' . $telegramLink . '";
            }, 0.1);
        </script>';

        echo '<a href="' . htmlspecialchars($telegramLink) . '" target="_blank"
        </a>';
    }
} else {
    echo "<p style='color:orange;'>⚠️ Error​.</p>";
}
?>