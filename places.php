<?php

require_once "db.php";

/*
|--------------------------------------------------------------------------
| GET CATEGORY FILTER
|--------------------------------------------------------------------------
*/

$category = trim($_GET["category"] ?? "");


/*
|--------------------------------------------------------------------------
| GET PLACES FROM DATABASE
|--------------------------------------------------------------------------
*/

if ($category !== "") {

    $sql = "SELECT * FROM places WHERE category = ? ORDER BY id ASC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);
    $stmt->execute();

    $result = $stmt->get_result();

} else {

    $sql = "SELECT * FROM places ORDER BY id ASC";

    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="stylesheet.css">

    <title>Places | DayTrail</title>

</head>

<body>


<header class="top-bar">

    <!-- NAV BAR -->

    <nav class="navbar">

        <img
            src="LOGO.png"
            class="logo"
            alt="Local Travel Planner LOGO"
        >

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
                <a href="myplan.php">MY PLAN</a>
            </li>

            <li>
                <a href="aboutus.php">ABOUT US</a>
            </li>

            <li>
                <a href="contact.php">CONTACT</a>
            </li>

        </ul>

    </nav>


    <!-- PLACES PAGE -->

    <section class="places-page">

        <div class="places-page-header">

            <span class="section-tag">
                DESTINATIONS
            </span>

            <h1>
                Explore Places
            </h1>

            <p>
                Discover amazing places around Colombo and plan your perfect day.
            </p>

        </div>


        <!-- SEARCH BAR -->

        <div class="search-filter-container">

            <input
                type="text"
                id="searchInput"
                class="place-search"
                placeholder="🔍 Search places..."
            >

        </div>


        <!-- PLACES GRID -->

        <div
            class="places-grid"
            id="placesContainer"
        >

            <?php if ($result && $result->num_rows > 0): ?>

                <?php while ($place = $result->fetch_assoc()): ?>

                    <div
                        class="place-card"
                        data-name="<?php echo htmlspecialchars($place["name"]); ?>"
                        data-category="<?php echo htmlspecialchars($place["category"]); ?>"
                    >

                        <!-- IMAGE -->

                        <div class="card-img-wrapper">

                            <img
                                src="<?php echo htmlspecialchars($place["image_url"]); ?>"
                                alt="<?php echo htmlspecialchars($place["name"]); ?>"
                            >

                            <span class="category-badge">

                                <?php echo htmlspecialchars($place["category"]); ?>

                            </span>

                        </div>


                        <!-- CARD BODY -->

                        <div class="card-body">

                            <span class="distance-text">

                                📍
                                <?php echo htmlspecialchars($place["distance_km"]); ?>
                                km from center

                            </span>


                            <h3>

                                <?php echo htmlspecialchars($place["name"]); ?>

                            </h3>


                            <p>

                                <?php echo htmlspecialchars($place["short_description"]); ?>

                            </p>


                            <!-- ACTIONS -->

                            <div class="card-actions">

                                <a
                                    href="details.php?id=<?php echo $place["id"]; ?>"
                                    class="btn-view"
                                >
                                    VIEW MORE →
                                </a>


                                <button
                                    class="btn-card-add"

                                    data-name="<?php echo htmlspecialchars($place["name"]); ?>"

                                    data-category="<?php echo htmlspecialchars($place["category"]); ?>"

                                    data-image="<?php echo htmlspecialchars($place["image_url"]); ?>"

                                    data-distance="<?php echo htmlspecialchars($place["distance_km"]); ?>"

<?php
$visitDurations = [
    "Galle Face Green" => 1.5,
    "One Galle Face" => 2,
    "Gangaramaya Temple" => 1.5,
    "Colombo National Museum" => 2,
    "Colombo Lotus Tower" => 1.5,
    "Dehiwala Zoo" => 3,
    "Viharamahadevi Park" => 1,
    "Independence Memorial Hall" => 1,
    "Havelock City Mall" => 2,
    "Water World Lanka" => 3,
    "St. Anthony's Shrine, Kochchikade" => 1
];

$visitTime = $visitDurations[$place["name"]] ?? 1;
?>                                >
                                    +
                                </button>

                            </div>

                        </div>

                    </div>

                <?php endwhile; ?>


            <?php else: ?>

                <div class="no-places-message">

                    <h3>
                        No places found
                    </h3>

                    <p>
                        There are currently no places available in this category.
                    </p>

                </div>

            <?php endif; ?>

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

                <h4>
                    NAVIGATION
                </h4>

                <ul>

                    <li>
                        <a href="index.php">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="places.php">
                            Places
                        </a>
                    </li>

                    <li>
                        <a href="category.php">
                            Categories
                        </a>
                    </li>

                    <li>
                        <a href="myplan.php">
                            My Plan
                        </a>
                    </li>

                </ul>

            </div>


            <div class="footer-col">

                <h4>
                    CONTACT
                </h4>

                <p>
                    📍 Colombo, Sri Lanka
                </p>

                <p>
                    ✉️ support@daytrail.com
                </p>

                <p>
                    📞 +94 11 234 5678
                </p>

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