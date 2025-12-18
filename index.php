<?php
session_start(); // FOR ADMIN ACCESS
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Locally Viral</title>
</head>

<body>
    <header>
        <div class="navbar"> <!--NAVI BAR WITH MINI LOGO-->
            <img src="logoo.png" class="logo">
            <div class="hamburger" onclick="toggleMenu()">☰</div> <!--MENU ON MOBILE-->
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#category">Category</a></li>
                <li><a href="#footer">Contact</a></li>
                <li><a href="browse.php">Browse</a></li>

            <!-- ONLY LOGGED IN ADMIN CAN SEE -->
                <?php if (!empty($_SESSION['is_admin'])): ?>
                    <li class="divider"></li>
                    <li><a href="admin_page.php" id="Panel">Admin Panel</a></li>
                    <li><a href="logout.php" id="Logout">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </header>
    <div class="background">
        <section id="home" class="home"> <!--HOMEPAGE CONTENT-->
            <div class="content">
                <div class="hovercontainer">
                    <img src="logo.png" alt="Locally Viral Logo" class="logo1">
                    <h1 class="explosive-text">LOCALLY VIRAL</h1>
                    <p>CHOOSE LOCAL, SUPPORT LOCAL AND MAKE THEM LOCALLY VIRAL!</p>
                </div>
                <div>
                    <a href="http://localhost/official-locally-viral-/browse.php"><button type="button"
                            class="btnBrowse">BROWSE</button></a>
                </div>
            </div>
        </section>


        <section class="about-section" id="about"> <!--ABOUT-->
            <h1>ABOUT LOCALLY VIRAL</h1>
            <div class="about-desc">
                <p class="about1">At <a href="https://maps.app.goo.gl/yE7mc4wwV4qDQKqf7" id="meyc" target="_blank">Meycauayan, Bulacan</a>, there are many local and small businesses that are not yet
                    recognized in their own local areas. This website will feature local, small and medium businesses
                    that
                    are found within Meycauayan only, with the purpose of increasing their market's visibility online.
                    This
                    website included 28 local businesses located in 11 barangays at Meycauayan:
                </p>

                <ul class="about2">
                    <li><a href="https://maps.app.goo.gl/cAScaoEaB3yYRYH87" target="_blank">Bancal</a></li>
                    <li><a href="https://maps.app.goo.gl/DBhYvCGfEi3UyNZj9" target="_blank">Bayugo</a></li>
                    <li><a href="https://maps.app.goo.gl/uazawj2G4TTTW1au6" target="_blank">Calvario</a></li>
                    <li><a href="https://maps.app.goo.gl/3X21Wy1s75y4bNU99" target="_blank">Hulo</a></li>
                    <li><a href="https://maps.app.goo.gl/45EwJjMi8FEFtid49" target="_blank">Malhacan</a></li>
                    <li><a href="https://maps.app.goo.gl/vrtHChJFjxi68sTC9" target="_blank">Pandayan</a></li>
                </ul>

                <ul class="about3">
                    <li><a href="https://maps.app.goo.gl/KuQpHTnt9eNj1MdL8" target="_blank">Poblacion</a></li>
                    <li><a href="https://maps.app.goo.gl/SrTqbdYBFpPtn46EA" target="_blank">Saint Francis</a></li>
                    <li><a href="https://maps.app.goo.gl/2cLXDaSYzWATEr186" target="_blank">Saluysoy</a></li>
                    <li><a href="https://maps.app.goo.gl/W7BSgJDmTjDcQgar9" target="_blank">Ubihan</a></li>
                    <li><a href="https://maps.app.goo.gl/e8ZVBBYu4AqSPTt46" target="_blank">Zamora</a></li>
                </ul>
            </div>
        </section>


        <section class="category-section" id="category"> <!--CATEGORIES-->
            <div class="container-sec">
                <h1>BUSINESS CATEGORIES</h1>
                <div class="category-desc">
                    <div class="desccat">
                        <p>These local businesses features a variety of products and services. Here includes:</p> <br>
                        <p id="business_cat">Food & Beverages, Services, and Clothes & Accessories </p>
                        <p id="cat">The businesses shown and listed on this website also provides the businesses'
                            details
                            such
                            as exact location, menu, price range, contact details, and pictures for enhanced visualization.</p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer" id="footer"> <!--FOOTER SECTION-->
            <h1 id="local"><a href="admin_login.php" class="admin-login-link"><img src="logo.png" id="logo"></a>Locally
                Viral</h1>
            <p class="email">EMAIL: <a href="https://mail.google.com/mail/?view=cm&fs=1&to=locallyviral02@gmail.com"
                    id="emaill" target="_blank">locallyviral02@gmail.com</a></p>
            <p class="cont">CONTACT: <a href="tel:09276845740" class="admin-num">0927-684-5740</a></p>
        </footer>
    </div>

    <script src="interaction.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>