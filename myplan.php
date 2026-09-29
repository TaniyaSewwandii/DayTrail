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
      <li><a href="category.php">CATEGORIES</a></li>
      <li><a href="myplan.php">MY PLAN</a></li>
      <li><a href="aboutus.php">ABOUT US</a></li>
      <li><a href="contact.php">CONTACT</a></li>
    </ul>
  </nav>
<main class="my-plan-page">

    <!-- PAGE TITLE -->

    <section class="my-plan-header">

        <p class="my-plan-label">
            DAYTRAIL PLANNER
        </p>

        <h1>
            My <span>Day Plan</span>
        </h1>

        <p>
            Select places from our destinations and create
            your own Colombo day trip.
        </p>

    </section>


    <!-- PLAN AREA -->

    <section class="my-plan-layout">


        <!-- SELECTED PLACES -->

        <div class="selected-places-card">

            <div class="plan-card-header">

                <div>

                    <p class="plan-small-title">
                        YOUR PLAN
                    </p>

                    <h2>
                        Planned Places
                        (<span id="planCount">0</span>)
                    </h2>

                </div>

            </div>


            <!-- PLACES WILL APPEAR HERE -->

            <div id="planList">

            </div>


            <!-- EMPTY MESSAGE -->

            <div
                id="emptyPlan"
                class="empty-plan"
            >

                <div class="empty-plan-icon">
                    📍
                </div>

                <h3>
                    No places added yet
                </h3>

                <p>
                    Go to the Places page and click the
                    + button to add destinations to your plan.
                </p>

                <a
                    href="places.php"
                    class="plan-explore-btn"
                >
                    Explore Places →
                </a>

            </div>

        </div>



        <!-- PLAN SUMMARY -->

        <aside class="plan-summary-card">

            <p class="plan-small-title">
                TRIP SUMMARY
            </p>

            <h2>
                Your Day
            </h2>


            <div class="summary-item">

                <span>
                    Selected Places
                </span>

                <strong id="summaryCount">
                    0
                </strong>

            </div>


            <div class="summary-item">

                <span>
                    Total Distance
                </span>

                <strong>
                    <span id="totalDistance">0</span> km
                </strong>

            </div>


            <div class="summary-item">

                <span>
                    Estimated Time
                </span>

                <strong>
                    <span id="totalHours">0</span> hours
                </strong>

            </div>


            <button
                id="clearPlan"
                class="clear-plan-btn"
            >
                Clear My Plan
            </button>


            <a
                href="places.php"
                class="add-more-btn"
            >
                + Add More Places
            </a>

        </aside>

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
                <li><a href="myplan.php">My Plan</a></li>
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