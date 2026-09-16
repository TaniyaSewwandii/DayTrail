<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="stylesheet.css">

    <title>Places | DayTrail</title>
</head>

<body>

<header class="top-bar">
  
  <!-- NAV BAR -->
  <nav class="navbar">
    
      <!-- LOGO -->
        <img src="LOGO.png" class="logo" alt="Local Travel Planner LOGO">
<ul class="nav-list">
      <li><a href="index.php" >HOME</a></li>
      <li><a href="places.php">PLACES</a></li>
      <li><a href="#categories">CATEGORIES</a></li>
      <li><a href="#my-plan">MY PLAN</a></li>
      <li><a href="#about">ABOUT US</a></li>
      <li><a href="#contact">CONTACT</a></li>
    </ul>
  </nav>


<!-- PLACES PAGE -->

<section class="places-page">

    <div class="places-page-header">

        <span class="section-tag">DESTINATIONS</span>

        <h1>Explore Places</h1>

        <p>
            Discover amazing places around Colombo and plan your perfect day.
        </p>

    </div>


    <!-- SEARCH AND FILTER -->

    <div class="places-controls">

        <input
            type="text"
            placeholder="Search for a place..."
            class="place-search"
        >

        <select class="category-filter">

            <option value="">All Categories</option>
            <option value="Nature">Nature</option>
            <option value="Religious">Religious</option>
            <option value="Heritage">Heritage</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Shopping">Shopping</option>

        </select>

    </div>


    <!-- PLACES GRID -->

    <div class="places-grid">


       <!-- CARD 1 -->

<div class="place-card">

    <div class="card-img-wrapper">

        <img 
            src="pics/galleface.jpg" 
            alt="Galle Face Green"
        >

        <span class="category-badge">
            NATURE
        </span>

    </div>

    <div class="card-body">

        <span class="distance-text">
            📍 4 km from center
        </span>

        <h3>Galle Face Green</h3>

        <p>
            A popular seaside recreation area
            with beautiful coastal views.
        </p>

        <div class="card-actions">

     <a href="details.php?place=galle-face" class="btn-view">
    VIEW MORE →
</a>

            <button class="btn-card-add">
                +
            </button>

        </div>

    </div>

</div>


<!-- CARD 2 -->

<div class="place-card">

    <div class="card-img-wrapper">

        <img 
            src="pics/onegalleface.jpg" 
            alt="One Galle Face"
        >

        <span class="category-badge">
            SHOPPING
        </span>

    </div>

    <div class="card-body">

        <span class="distance-text">
            📍 4 km from center
        </span>

        <h3>One Galle Face</h3>

        <p>
            A modern shopping and entertainment
            mall in the heart of Colombo.
        </p>

        <div class="card-actions">

           <a href="details.php?place=one-galle-face" class="btn-view">
    VIEW MORE →
</a>

            <button class="btn-card-add">
                +
            </button>

        </div>

    </div>

</div>


<!-- CARD 3 -->

<div class="place-card">

    <div class="card-img-wrapper">

        <img 
            src="pics/gangaramaya.jpg" 
            alt="Gangaramaya Temple"
        >

        <span class="category-badge">
            RELIGIOUS
        </span>

    </div>

    <div class="card-body">

        <span class="distance-text">
            📍 5 km from center
        </span>

        <h3>Gangaramaya Temple</h3>

        <p>
            A famous Buddhist temple with
            cultural and historical importance.
        </p>

        <div class="card-actions">

           <a href="details.php?place=gangaramaya" class="btn-view">
    VIEW MORE →
</a>

            <button class="btn-card-add">
                +
            </button>

        </div>

    </div>

</div>


<!-- CARD 4 -->

<div class="place-card">

    <div class="card-img-wrapper">

        <img 
            src="pics/museum.jpg" 
            alt="Colombo National Museum"
        >

        <span class="category-badge">
            HERITAGE
        </span>

    </div>

    <div class="card-body">

        <span class="distance-text">
            📍 6 km from center
        </span>

        <h3>Colombo National Museum</h3>

        <p>
            Explore Sri Lanka's history, culture
            and valuable historical collections.
        </p>

        <div class="card-actions">

            <a href="details.php?place=museum" class="btn-view">
    VIEW MORE →
</a>

            <button class="btn-card-add">
                +
            </button>

        </div>

    </div>

</div>


<!-- CARD 5 -->

<div class="place-card">

    <div class="card-img-wrapper">

        <img 
            src="pics/loutus tower.jpg" 
            alt="Colombo Lotus Tower"
        >

        <span class="category-badge">
            ENTERTAINMENT
        </span>

    </div>

    <div class="card-body">

        <span class="distance-text">
            📍 5 km from center
        </span>

        <h3>Colombo Lotus Tower</h3>

        <p>
            An iconic observation tower offering
            beautiful views of Colombo.
        </p>

        <div class="card-actions">

           <a href="details.php?place=lotus-tower" class="btn-view">
    VIEW MORE →
</a>

            <button class="btn-card-add">
                +
            </button>

        </div>

    </div>

</div>


<!-- CARD 6 -->

<div class="place-card">

    <div class="card-img-wrapper">

        <img 
            src="pics/zoo.jpg" 
            alt="Dehiwala Zoo"
        >

        <span class="category-badge">
            NATURE
        </span>

    </div>

    <div class="card-body">

        <span class="distance-text">
            📍 10 km from center
        </span>

        <h3>Dehiwala Zoo</h3>

        <p>
            A popular attraction where visitors
            can explore wildlife and nature.
        </p>

        <div class="card-actions">

            <a href="details.php?place=zoo" class="btn-view">
    VIEW MORE →
</a>

            <button class="btn-card-add">
                +
            </button>

        </div>

    </div>

</div>


<!-- CARD 7 -->

<div class="place-card">

    <div class="card-img-wrapper">

        <img 
            src="pics/viharamahadevi.jpg" 
            alt="Viharamahadevi Park"
        >

        <span class="category-badge">
            NATURE
        </span>

    </div>

    <div class="card-body">

        <span class="distance-text">
            📍 5 km from center
        </span>

        <h3>Viharamahadevi Park</h3>

        <p>
            A peaceful public park offering
            a relaxing green environment.
        </p>

        <div class="card-actions">

            <a href="details.php?place=viharamahadevi" class="btn-view">
    VIEW MORE →
</a>

            <button class="btn-card-add">
                +
            </button>

        </div>

    </div>

</div>


<!-- CARD 8 -->

<div class="place-card">

    <div class="card-img-wrapper">

        <img 
            src="pics/independence.jpg" 
            alt="Independence Memorial Hall"
        >

        <span class="category-badge">
            HERITAGE
        </span>

    </div>

    <div class="card-body">

        <span class="distance-text">
            📍 7 km from center
        </span>

        <h3>Independence Memorial Hall</h3>

        <p>
            A national monument and important
            historical site in Colombo.
        </p>

        <div class="card-actions">

            <a href="details.php?place=independence" class="btn-view">
    VIEW MORE →
</a>

            <button class="btn-card-add">
                +
            </button>

        </div>

    </div>

</div>


<!-- CARD 9 -->

<div class="place-card">

    <div class="card-img-wrapper">

        <img 
            src="pics/havelockcity.jpg" 
            alt="Havelock City Mall"
        >

        <span class="category-badge">
            SHOPPING
        </span>

    </div>

    <div class="card-body">

        <span class="distance-text">
            📍 8 km from center
        </span>

        <h3>Havelock City Mall</h3>

        <p>
            A modern complex for shopping,
            dining and entertainment.
        </p>

        <div class="card-actions">

           <a href="details.php?place=havelock-city" class="btn-view">
    VIEW MORE →
</a>

            <button class="btn-card-add">
                +
            </button>

        </div>

    </div>

</div>


<!-- CARD 10 -->

<div class="place-card">

    <div class="card-img-wrapper">

        <img 
            src="pics/waterworld.jpg" 
            alt="Water World Lanka"
        >

        <span class="category-badge">
            NATURE
        </span>

    </div>

    <div class="card-body">

        <span class="distance-text">
            📍 17 km from center
        </span>

        <h3>Water World Lanka</h3>

        <p>
            An aquatic attraction where visitors
            can explore aquatic wildlife.
        </p>

        <div class="card-actions">

          <a href="details.php?place=water-world" class="btn-view">
    VIEW MORE →
</a>

            <button class="btn-card-add">
                +
            </button>

        </div>

    </div>

</div>

    </div>

</section>


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
                <li><a href="#categories">Categories</a></li>
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

</body>
</html>