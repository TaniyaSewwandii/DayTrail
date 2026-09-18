<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="stylesheet.css">

    <title>Categories | DayTrail</title>
</head>

<body>

<!-- =========================
     NAV BAR
     ========================= -->

<header class="top-bar">

    <nav class="navbar">

        <!-- LOGO -->
        <img src="LOGO.png"
             class="logo"
             alt="DayTrail Logo">

        <ul class="nav-list">

            <li>
                <a href="index.php">HOME</a>
            </li>

            <li>
                <a href="places.php">PLACES</a>
            </li>

            <li>
                <a href="category.php">CATEGORIES</a>
            </li>

            <li>
                <a href="#my-plan">MY PLAN</a>
            </li>

            <li>
                <a href="#about">ABOUT US</a>
            </li>

            <li>
                <a href="#contact">CONTACT</a>
            </li>

        </ul>

    </nav>

</header>


<!-- =========================
     CATEGORY PAGE
     ========================= -->

<main class="category-page">

    <!-- PAGE HEADER -->

    <div class="category-header">

        <h1>Explore by Category</h1>

        <p>
            Find the perfect places to visit in Colombo based on your interests.
        </p>

    </div>


    <!-- CATEGORY CARDS -->

    <section class="category-grid">


        <!-- NATURE -->

        <a href="places.php?category=NATURE"
           class="category-card">

            <div class="category-icon">
                🌿
            </div>

            <h2>Nature</h2>

            <p>
                Enjoy beautiful parks, beaches, gardens and peaceful
                natural places around Colombo.
            </p>

            <span>
                Explore Places →
            </span>

        </a>


        <!-- SHOPPING -->

        <a href="places.php?category=SHOPPING"
           class="category-card">

            <div class="category-icon">
                🛍️
            </div>

            <h2>Shopping</h2>

            <p>
                Discover shopping malls, stores and popular shopping
                destinations in Colombo.
            </p>

            <span>
                Explore Places →
            </span>

        </a>


        <!-- RELIGIOUS -->

        <a href="places.php?category=RELIGIOUS"
           class="category-card">

            <div class="category-icon">
                ⛪
            </div>

            <h2>Religious</h2>

            <p>
                Visit churches, temples and other important
                religious places in Colombo.
            </p>

            <span>
                Explore Places →
            </span>

        </a>


        <!-- HERITAGE -->

        <a href="places.php?category=HERITAGE"
           class="category-card">

            <div class="category-icon">
                🏛️
            </div>

            <h2>Heritage</h2>

            <p>
                Explore historical buildings, monuments and
                important landmarks.
            </p>

            <span>
                Explore Places →
            </span>

        </a>


        <!-- ENTERTAINMENT -->

        <a href="places.php?category=ENTERTAINMENT"
           class="category-card">

            <div class="category-icon">
                🎡
            </div>

            <h2>Entertainment</h2>

            <p>
                Find exciting attractions, activities and places
                for fun and relaxation.
            </p>

            <span>
                Explore Places →
            </span>

        </a>

    </section>

</main>


<!-- FOOTER -->

<footer class="footer">

    <div class="footer-container">

        <div class="footer-col brand-col">

            <img
                src="LOGO.png"
                alt="DayTrail Logo"
                class="footer-logo"
            >

            <p>
                Navigate Colombo's finest destinations in a single day.
            </p>

        </div>


        <div class="footer-col">

            <h4>NAVIGATION</h4>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="places.php">Places</a></li>
                <li><a href="category.php">Categories</a></li>
                <li><a href="#my-plan">My Plan</a></li>
            </ul>

        </div>


        <div class="footer-col">

            <h4>CONTACT</h4>

            <p>📍 Colombo, Sri Lanka</p>
            <p>✉️ support@daytrail.com</p>
            <p>📞 +94 11 234 5678</p>

        </div>

    </div>


    <div class="footer-bottom">

        <p>
            &copy; 2026 DayTrail. All Rights Reserved.
        </p>

    </div>

</footer>

<script src="script.js"></script>

</body>

</html>