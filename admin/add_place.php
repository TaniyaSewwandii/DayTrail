<?php

session_start();

require_once "../db.php";

// Protect admin page
if (!isset($_SESSION["admin_id"])) {
    header("Location: admin_login.php");
    exit;
}

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $category = trim($_POST["category"] ?? "");
    $distance_km = trim($_POST["distance_km"] ?? "");
    $short_description = trim($_POST["short_description"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $opening_hours = trim($_POST["opening_hours"] ?? "");
    $travel_tips = trim($_POST["travel_tips"] ?? "");
    $image_url = trim($_POST["image_url"] ?? "");
    $maps_query = trim($_POST["maps_query"] ?? "");
    $latitude = trim($_POST["latitude"] ?? "");
    $longitude = trim($_POST["longitude"] ?? "");

    // Check required fields
    if (
        $name === "" ||
        $category === "" ||
        $distance_km === "" ||
        $short_description === "" ||
        $description === "" ||
        $opening_hours === "" ||
        $image_url === ""
    ) {

        $error = "Please fill in all required fields.";

    } else {

        $sql = "INSERT INTO places
        (
            name,
            category,
            distance_km,
            short_description,
            description,
            opening_hours,
            travel_tips,
            image_url,
            maps_query,
            latitude,
            longitude
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt) {

            $stmt->bind_param(
                "ssdssssssdd",
                $name,
                $category,
                $distance_km,
                $short_description,
                $description,
                $opening_hours,
                $travel_tips,
                $image_url,
                $maps_query,
                $latitude,
                $longitude
            );

            if ($stmt->execute()) {

                $success = "Place added successfully!";

                // Clear form
                $name = "";
                $category = "";
                $distance_km = "";
                $short_description = "";
                $description = "";
                $opening_hours = "";
                $travel_tips = "";
                $image_url = "";
                $maps_query = "";
                $latitude = "";
                $longitude = "";

            } else {

                $error = "Failed to add place: " . $stmt->error;
            }

            $stmt->close();

        } else {

            $error = "Database error: " . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Place | DayTrail</title>

    <link rel="stylesheet"
          href="admin.css?v=3">

</head>

<body>

<div class="dashboard">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="sidebar-logo">

            <img src="/DayTrail/LOGO.png"
                 alt="DayTrail Logo">

            <h2>DayTrail</h2>

            <p>Admin Panel</p>

        </div>

        <nav>

            <a href="admin_dashboard.php">
                🏠 Dashboard
            </a>

            <a href="admin_places.php"
               class="active">
                📍 Manage Places
            </a>

            <a href="admin_messages.php">
                ✉ Contact Messages
            </a>

            <a href="admin_logout.php">
                🚪 Logout
            </a>

        </nav>

    </aside>


    <!-- MAIN CONTENT -->

    <main class="main-content">

        <div class="page-header">

            <div>

                <h1>Add New Place</h1>

                <p>
                    Add a new tourist destination to DayTrail.
                </p>

            </div>

            <a href="admin_places.php"
               class="add-btn">

                ← Back to Places

            </a>

        </div>


        <?php if ($error !== ""): ?>

            <div class="form-message error-message">
                <?php echo htmlspecialchars($error); ?>
            </div>

        <?php endif; ?>


        <?php if ($success !== ""): ?>

            <div class="form-message success-message">

                <?php echo htmlspecialchars($success); ?>

                <br><br>

                <a href="admin_places.php">
                    View Places
                </a>

            </div>

        <?php endif; ?>


        <div class="place-form-container">

            <form method="POST">


                <!-- BASIC INFORMATION -->

                <h2>Basic Information</h2>

                <div class="form-grid">

                    <div class="admin-form-group">

                        <label for="name">
                            Place Name *
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="<?php echo htmlspecialchars($name ?? ''); ?>"
                            placeholder="Example: Galle Face Green"
                            required
                        >

                    </div>


                    <div class="admin-form-group">

                        <label for="category">
                            Category *
                        </label>

                        <select
                            id="category"
                            name="category"
                            required
                        >

                            <option value="">
                                Select Category
                            </option>

                            <option value="NATURE"
                                <?php echo (($category ?? '') === 'NATURE') ? 'selected' : ''; ?>>
                                NATURE
                            </option>

                            <option value="SHOPPING"
                                <?php echo (($category ?? '') === 'SHOPPING') ? 'selected' : ''; ?>>
                                SHOPPING
                            </option>

                            <option value="RELIGIOUS"
                                <?php echo (($category ?? '') === 'RELIGIOUS') ? 'selected' : ''; ?>>
                                RELIGIOUS
                            </option>

                            <option value="HERITAGE"
                                <?php echo (($category ?? '') === 'HERITAGE') ? 'selected' : ''; ?>>
                                HERITAGE
                            </option>

                            <option value="ENTERTAINMENT"
                                <?php echo (($category ?? '') === 'ENTERTAINMENT') ? 'selected' : ''; ?>>
                                ENTERTAINMENT
                            </option>

                        </select>

                    </div>


                    <div class="admin-form-group">

                        <label for="distance_km">
                            Distance (km) *
                        </label>

                        <input
                            type="number"
                            id="distance_km"
                            name="distance_km"
                            step="0.01"
                            min="0"
                            value="<?php echo htmlspecialchars($distance_km ?? ''); ?>"
                            placeholder="Example: 4"
                            required
                        >

                    </div>


                    <div class="admin-form-group">

                        <label for="opening_hours">
                            Opening Hours *
                        </label>

                        <input
                            type="text"
                            id="opening_hours"
                            name="opening_hours"
                            value="<?php echo htmlspecialchars($opening_hours ?? ''); ?>"
                            placeholder="Example: 9:00 AM - 10:00 PM"
                            required
                        >

                    </div>

                </div>


                <!-- DESCRIPTION -->

                <h2>Description</h2>

                <div class="admin-form-group">

                    <label for="short_description">
                        Short Description *
                    </label>

                    <textarea
                        id="short_description"
                        name="short_description"
                        rows="3"
                        placeholder="Write a short description..."
                        required
                    ><?php echo htmlspecialchars($short_description ?? ''); ?></textarea>

                </div>


                <div class="admin-form-group">

                    <label for="description">
                        Full Description *
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        placeholder="Write detailed information about the place..."
                        required
                    ><?php echo htmlspecialchars($description ?? ''); ?></textarea>

                </div>


                <div class="admin-form-group">

                    <label for="travel_tips">
                        Travel Tips
                    </label>

                    <textarea
                        id="travel_tips"
                        name="travel_tips"
                        rows="4"
                        placeholder="Example: Visit in the evening for a beautiful sunset."
                    ><?php echo htmlspecialchars($travel_tips ?? ''); ?></textarea>

                </div>


                <!-- IMAGE -->

                <h2>Image</h2>

                <div class="admin-form-group">

                    <label for="image_url">
                        Image Path *
                    </label>

                    <input
                        type="text"
                        id="image_url"
                        name="image_url"
                        value="<?php echo htmlspecialchars($image_url ?? ''); ?>"
                        placeholder="Example: pics/galleface.jpg"
                        required
                    >

                    <small>
                        Example:
                        <strong>pics/galleface.jpg</strong>
                    </small>

                </div>


                <!-- MAP -->

                <h2>Location & Map</h2>

                <div class="admin-form-group">

                    <label for="maps_query">
                        Google Maps Query
                    </label>

                    <input
                        type="text"
                        id="maps_query"
                        name="maps_query"
                        value="<?php echo htmlspecialchars($maps_query ?? ''); ?>"
                        placeholder="Example: Galle Face Green Colombo"
                    >

                </div>


                <div class="form-grid">

                    <div class="admin-form-group">

                        <label for="latitude">
                            Latitude
                        </label>

                        <input
                            type="number"
                            id="latitude"
                            name="latitude"
                            step="any"
                            value="<?php echo htmlspecialchars($latitude ?? ''); ?>"
                            placeholder="Example: 6.9271"
                        >

                    </div>


                    <div class="admin-form-group">

                        <label for="longitude">
                            Longitude
                        </label>

                        <input
                            type="number"
                            id="longitude"
                            name="longitude"
                            step="any"
                            value="<?php echo htmlspecialchars($longitude ?? ''); ?>"
                            placeholder="Example: 79.8612"
                        >

                    </div>

                </div>


                <!-- BUTTONS -->

                <div class="form-actions">

                    <a href="admin_places.php"
                       class="cancel-btn">

                        Cancel

                    </a>

                    <button type="submit"
                            class="save-btn">

                        Save Place

                    </button>

                </div>

            </form>

        </div>

    </main>

</div>

</body>

</html>