<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "db.php";

/*
|--------------------------------------------------------------------------
| GET PLACE ID
|--------------------------------------------------------------------------
*/

$id = $_GET["id"] ?? "";

if ($id === "" || !is_numeric($id)) {
    die("Invalid place ID.");
}

$id = (int)$id;


/*
|--------------------------------------------------------------------------
| GET PLACE FROM DATABASE
|--------------------------------------------------------------------------
*/

$sql = "SELECT * FROM places WHERE id = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Database Error: " . $conn->error);
}

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();


/*
|--------------------------------------------------------------------------
| CHECK PLACE EXISTS
|--------------------------------------------------------------------------
*/

if ($result->num_rows === 0) {

    die("Place not found.");

}

$currentPlace = $result->fetch_assoc();

$stmt->close();


/*
|--------------------------------------------------------------------------
| GOOGLE MAPS LINK
|--------------------------------------------------------------------------
*/

$mapsQuery = $currentPlace["maps_query"] ?? "";

if ($mapsQuery !== "") {

    $mapUrl =
        "https://www.google.com/maps/search/?api=1&query="
        . urlencode($mapsQuery);

} else {

    $mapUrl = "https://www.google.com/maps";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <link
        rel="stylesheet"
        href="stylesheet.css"
    >

    <title>
        <?php echo htmlspecialchars($currentPlace["name"]); ?> | DayTrail
    </title>

</head>


<body>


<main class="details-container">


    <!-- BACK BUTTON -->

    <a
        href="places.php"
        class="back-btn"
    >
        ← Back to Places
    </a>


    <div class="details-card">


        <!-- IMAGE -->

        <div class="details-image">

            <img
                src="<?php echo htmlspecialchars($currentPlace["image_url"]); ?>"
                alt="<?php echo htmlspecialchars($currentPlace["name"]); ?>"
            >

        </div>


        <!-- DETAILS -->

        <div class="details-content">


            <!-- CATEGORY -->

            <span class="category-badge">

                <?php echo htmlspecialchars($currentPlace["category"]); ?>

            </span>


            <!-- NAME -->

            <h1>

                <?php echo htmlspecialchars($currentPlace["name"]); ?>

            </h1>


            <!-- INFORMATION -->

            <div class="details-info">


                <!-- DISTANCE -->

                <div class="info-box">

                    <span>📍</span>

                    <div>

                        <small>
                            Distance
                        </small>

                        <strong>

                            <?php
                            echo htmlspecialchars(
                                $currentPlace["distance_km"]
                            );
                            ?>
                            km from center

                        </strong>

                    </div>

                </div>


                <!-- OPENING HOURS -->

                <div class="info-box">

                    <span>🕐</span>

                    <div>

                        <small>
                            Opening Hours
                        </small>

                        <strong>

                            <?php
                            echo htmlspecialchars(
                                $currentPlace["opening_hours"]
                            );
                            ?>

                        </strong>

                    </div>

                </div>


                <!-- CATEGORY -->

                <div class="info-box">

                    <span>🏷️</span>

                    <div>

                        <small>
                            Category
                        </small>

                        <strong>

                            <?php
                            echo htmlspecialchars(
                                $currentPlace["category"]
                            );
                            ?>

                        </strong>

                    </div>

                </div>


                <!-- LOCATION -->

                <div class="info-box">

                    <span>🗺️</span>

                    <div>

                        <small>
                            Location
                        </small>

                        <strong>

                            <?php

                            if (!empty($currentPlace["maps_query"])) {

                                echo htmlspecialchars(
                                    $currentPlace["maps_query"]
                                );

                            } else {

                                echo "Colombo, Sri Lanka";

                            }

                            ?>

                        </strong>

                    </div>

                </div>


            </div>


            <!-- ABOUT -->

            <section class="about-place">

                <h2>
                    About This Place
                </h2>

                <p>

                    <?php
                    echo nl2br(
                        htmlspecialchars(
                            $currentPlace["description"]
                        )
                    );
                    ?>

                </p>

            </section>


            <!-- TRAVEL TIPS -->

            <?php if (!empty($currentPlace["travel_tips"])): ?>

                <section class="about-place">

                    <h2>
                        💡 Travel Tips
                    </h2>

                    <p>

                        <?php
                        echo nl2br(
                            htmlspecialchars(
                                $currentPlace["travel_tips"]
                            )
                        );
                        ?>

                    </p>

                </section>

            <?php endif; ?>


            <!-- LOCATION -->

            <div class="place-location">

                <h3>
                    📍 Location
                </h3>

                <p>

                    <?php

                    if (!empty($currentPlace["maps_query"])) {

                        echo htmlspecialchars(
                            $currentPlace["maps_query"]
                        );

                    } else {

                        echo "Colombo, Sri Lanka";

                    }

                    ?>

                </p>


                <a
                    href="<?php echo htmlspecialchars($mapUrl); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="map-button"
                >
                    🗺️ View on Google Maps
                </a>

            </div>


            <!-- GOOD FOR -->

            <section class="good-for">

                <h2>
                    ✨ Good For
                </h2>

                <div class="tags">

                    <span>
                        Sightseeing
                    </span>

                    <span>
                        Photography
                    </span>

                    <span>
                        Day Trip
                    </span>

                    <span>
                        Exploring
                    </span>

                </div>

            </section>


        </div>

    </div>


</main>


<script src="script.js"></script>

</body>

</html>