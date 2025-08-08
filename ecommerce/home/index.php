<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../home/logo/logome.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../home/logo/logome.png">
    <link rel="stylesheet" href="./page.css">
</head>

<body class="bg-gray-50 font-sans">
    <header>
        <div class="header-content">
            <h1><img src="./logo/icon.png" alt="net Icon">APP ACCOUNT SELLER</h1>
        </div>
    </header>
    <nav class="bg-gray-800 text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-blue-500"></a>
            <div class="hidden md:flex space-x-6 items-center">
                <a href="../home/index.php" class="hover:text-teal-400 transition-colors duration-300">Home</a>
                <a href="#footer" class="hover:text-teal-400 transition-colors duration-300">Contact</a>
                <a href="../home/about.php" class="hover:text-teal-400 transition-colors duration-300">About</a>
                <a href="../customer-service/index.php" class="hover:text-teal-400 transition-colors duration-300">Support</a>
                <a href="../admin-login/index.php" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-full transition-colors duration-300">Admin Login</a>
            </div>
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-gray-800 transition-all duration-300 ease-in-out">
            <div class="flex flex-col space-y-4 px-4 py-4 text-center">
                <a href="../home/index.php" class="hover:text-teal-400 transition-colors duration-300">Home</a>
                <a href="#footer" class="hover:text-teal-400 transition-colors duration-300">Contact</a>
                <a href="../home/about.php" class="hover:text-teal-400 transition-colors duration-300">About</a>
                <a href="../customer-service/index.php" class="hover:text-teal-400 transition-colors duration-300">Support</a>
                <a href="../admin-login/index.php" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-full transition-colors duration-300">Admin Login</a>
            </div>
        </div>
    </nav>
    <div class="overlay" id="overlay"></div>

    <div class="overlay" id="overlay"></div>

    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <div class="banner">
        <div class="slider">
            <div class="slides" id="slide-track">
                <img src="../home/logo/banner.png" alt="Slide 1">
                <img src="../home/logo/logome.png" alt="Slide 3">
            </div>
        </div>
        <script>
            const slides = document.getElementById('slide-track');
            const totalSlides = slides.children.length;
            let index = 0;

            setInterval(() => {
                index = (index + 1) % totalSlides;
                slides.style.transform = `translateX(-${index * 100}%)`;
            }, 5000);
        </script>
    </div>

    <div class="section-title">
        <?php
        date_default_timezone_set('Asia/Phnom_Penh');
        $hour = date('H');
        if ($hour < 12) {
            $greeting = "អរុណសួស្តីពេលព្រឹក!";
        } elseif ($hour < 18) {
            $greeting = "អរុណសួស្តីពេលរសៀល!";
        } else {
            $greeting = "រាត្រីសួស្តី!";
        }
        echo "<div class='greeting' style='text-align:center; margin:10px 0; font-weight:bold;'>$greeting 🥳</div>";
        ?>
        <hr>
        <h3>មានទំនុកចិត្តខ្ពស់ និងសុវត្តិភាព 100%</h3>
        <p style="text-decoration: underline;">សូមជ្រើសរើសកម្មវិធីដែលអ្នកចង់ទិញ</p>
    </div>

    <div class="game-grid" id="game-grid">
        <div class="game-card"><img src="../img/yt.png" alt="yt">
            <p>YOUTUBE PREMIUM</p>
            <form method="post" action="buy.php">
                <input type="hidden" name="item" value="yt">
                <button type="submit" class="buy-btn">12.85$/ខែ</button>
            </form>
        </div>

        <div class="game-card"><img src="../img/mt.png" alt="mt">
            <p>META VERIFIED</p>
            <form method="post" action="buy.php">
                <input type="hidden" name="item" value="mt">
                <button type="submit" class="buy-btn">13.50$/ខែ</button>
            </form>
        </div>

        <div class="game-card"><img src="../img/tl.png" alt="tl">
            <p>TELEGRAM PREMIUM</p>
            <form method="post" action="buy.php">
                <input type="hidden" name="item" value="tl">
                <button type="submit" class="buy-btn">3.75$/ខែ</button>
            </form>
        </div>

        <div class="game-card"><img src="../img/cv.png" alt="cv">
            <p>CANVA PRO</p>
            <form method="post" action="buy.php">
                <input type="hidden" name="item" value="cv">
                <button type="submit" class="buy-btn">29.85$/ខែ</button>
            </form>
        </div>

        <div class="game-card"><img src="../img/ct.png" alt="ct">
            <p>CAPCUT PRO</p>
            <form method="post" action="buy.php">
                <input type="hidden" name="item" value="ct">
                <button type="submit" class="buy-btn">6.75$/ខែ</button>
            </form>
        </div>

        <div class="game-card"><img src="../img/gn.png" alt="gn">
            <p>GEMINI PRO</p>
            <form method="post" action="buy.php">
                <input type="hidden" name="item" value="gn">
                <button type="submit" class="buy-btn">18.85$/ខែ</button>
            </form>
        </div>
        <?php
        include '../api/db.php';
        $result = $conn->query("SELECT * FROM products ORDER BY id DESC");
        ?>
        <div class="game-grid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="game-card">
                    <img src="../<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                    <p><?php echo htmlspecialchars($row['name']); ?></p>
                    <form method="post" action="buy.php">
                        <input type="hidden" name="item" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="buy-btn"><?php echo htmlspecialchars($row['price']); ?>$/ខែ</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <hr>
    <footer class="bg-gray-900 text-white p-4 text-center" id="footer" style="
        background: #222;
        color: #fff;
        padding: 32px 0 24px 0;
        text-align: center;
        margin-top: 40px;
    ">
        <div style="font-size:20px;margin-bottom:10px;">ទំនាក់ទំនងតាមរយៈ</div>
        <hr style="width:60px;border:1px solid #fff;margin:10px auto;">
        <div class="social-icons" style="margin-bottom:18px;">
            <a href="https://t.me/netisnet" target="_blank" rel="noopener noreferrer"
                style="color:#fff;font-size:28px;margin:0 10px;">
                <i class="fab fa-telegram"></i>
            </a>
        </div>
        <div style="margin-top:18px;font-size:14px;color:#bbb;">
            &copy; <?php echo date('Y'); ?> APP ACCOUNT SELLER | All rights reserved.
        </div>
    </footer>
    <button id="scrollUpBtn" title="Scroll to top"><i class="fas fa-arrow-up"></i></button>
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        window.addEventListener("load", function() {
            const loader = document.getElementById("loader-wrapper");
            loader.style.opacity = "0";
            loader.style.visibility = "hidden";
        });

        document.addEventListener("DOMContentLoaded", () => {

            function createWeatherParticle(type) {
                const el = document.createElement("div");
                el.classList.add("weather-particle");

                if (type === "snow") {
                    el.classList.add("snow");
                    el.textContent = "❄";
                    el.style.fontSize = (Math.random() * 8 + 12) + "px";
                    el.style.animationDuration = (Math.random() * 5 + 5) + "s";
                } else if (type === "rain") {
                    el.classList.add("rain");
                    el.style.animationDuration = (Math.random() * 1.5 + 1) + "s";
                } else if (type === "storm") {
                    el.classList.add("storm");
                    el.textContent = "⚡";
                    el.style.animationDuration = (Math.random() * 3 + 2) + "s";
                }

                el.style.left = Math.random() * window.innerWidth + "px";
                document.body.appendChild(el);

                setTimeout(() => el.remove(), 7000);
            }

            function triggerLightningFlash() {
                const flash = document.createElement("div");
                flash.classList.add("lightning-flash");
                document.body.appendChild(flash);
                setTimeout(() => flash.remove(), 300);
            }

            setInterval(() => createWeatherParticle("snow"), 300);
            setInterval(() => createWeatherParticle("rain"), 120);
            setInterval(() => {
                if (Math.random() < 0.3) {
                    createWeatherParticle("storm");
                    triggerLightningFlash();
                }
            }, 2000);
        });

        document.addEventListener("DOMContentLoaded", function() {
            const scrollUpBtn = document.getElementById("scrollUpBtn");
            const scrollDownBtn = document.getElementById("scrollDownBtn");
            const gameGrid = document.getElementById("game-grid");
            window.addEventListener("scroll", () => {
                if (window.scrollY > 200) {
                    scrollUpBtn.style.display = "block";
                } else {
                    scrollUpBtn.style.display = "none";
                }
            });

            scrollUpBtn.addEventListener("click", () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>