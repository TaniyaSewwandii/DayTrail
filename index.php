<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="stylesheet.css">
   <title>Local Travel Planner</title>
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

</header>
<section class="main">
  <div class="main2">
    <h1>Explore Colombo</h1>
    <p>Discover amazing places within 25 km of Colombo and plan your perfect one-day trip.</p>
    <div class="buttongroup">
      <a href="places.php" class="btn btn-green">Explore Places</a>
      <a href="#plan" class="btn btn-white">Plan My Trip</a>   
    </div>
    </div>
</section>
<!-- PLACES PREVIEW SECTION -->
<section class="places-section" id="places">
  <div class="places-header">
    <span class="section-tag">DESTINATIONS</span>
    <h2>Popular Attractions</h2>
  </div>

  <div class="places-grid">
    <!-- Card 1 -->
    <div class="place-card">
      <div class="card-img-wrapper">
        <img src="pics/loutus tower.jpg" alt="Lotus Tower">
        <span class="category-badge">ENTERTAINMENT</span>
      </div>
      <div class="card-body">
        <span class="distance-text">📍 5 km from center</span>
        <h3>Lotus Tower</h3>
        <p>South Asia's tallest structure offering breathtaking skyline views.</p>
        <div class="card-actions">
                  <a href="details.php?place=lotus-tower" class="btn-view">
    VIEW MORE →
</a>
          <button class="btn-card-add">+</button>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="place-card">
      <div class="card-img-wrapper">
        <img src="pics/galleface.jpg" alt="Galle Face Green">
        <span class="category-badge">NATURE</span>
      </div>
      <div class="card-body">
        <span class="distance-text">📍 4 km from center</span>
        <h3>Galle Face Green</h3>
        <p>Famous ocean-side urban park perfect for sunsets and street food.</p>
        <div class="card-actions">
          <a href="details.php?place=galle-face" class="btn-view">
    VIEW MORE →
</a>
          <button class="btn-card-add">+</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Action -->
  <div class="more-container">
    <a href="places.php" class="btn-explore-more">EXPLORE ALL PLACES</a>
  </div>
</section>
<!-- FOOTER SECTION -->
<footer class="footer" id="contact">
  <div class="footer-container">
    
    <!-- Brand Info -->
    <div class="footer-col brand-col">
      <img src="LOGO.png" alt="DayTrail Logo" class="footer-logo">
      <p>Navigate Colombo's finest destinations in a single day.</p>
    </div>

    <!-- Quick Links -->
    <div class="footer-col">
      <h4>NAVIGATION</h4>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="places.php">Places</a></li>
        <li><a href="#categories">Categories</a></li>
        <li><a href="#my-plan">My Plan</a></li>
      </ul>
    </div>

    <!-- Contact Info -->
    <div class="footer-col">
      <h4>CONTACT</h4>
      <p>📍 Colombo, Sri Lanka</p>
      <p>✉️ support@daytrail.com</p>
      <p>📞 +94 11 234 5678</p>
    </div>

  </div>

  <!-- Bottom Copyright Bar -->
  <div class="footer-bottom">
    <p>&copy; 2026 DayTrail. All Rights Reserved.</p>
  </div>
</footer>




</body>
</html>