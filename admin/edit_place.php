<?php

session_start();

require_once "../db.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: admin_login.php");
    exit;
}

$id = $_GET["id"] ?? "";

if ($id === "" || !is_numeric($id)) {
    header("Location: admin_places.php");
    exit;
}

// Get existing place
$stmt = $conn->prepare("SELECT * FROM places WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    header("Location: admin_places.php");
    exit;
}

$place = $result->fetch_assoc();
$stmt->close();

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

        $sql = "UPDATE places SET
                name = ?,
                category = ?,
                distance_km = ?,
                short_description = ?,
                description = ?,
                opening_hours = ?,
                travel_tips = ?,
                image_url = ?,
                maps_query = ?,
                latitude = ?,
                longitude = ?
                WHERE id = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ssdssssssddi",
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
            $longitude,
            $id
        );

        if ($stmt->execute()) {

            $success = "Place updated successfully!";

            // Refresh displayed data
            $stmt2 = $conn->prepare("SELECT * FROM places WHERE id = ?");
            $stmt2->bind_param("i", $id);
            $stmt2->execute();

            $place = $stmt2->get_result()->fetch_assoc();

            $stmt2->close();

        } else {

            $error = "Failed to update place: " . $stmt->error;
        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Place | DayTrail</title>

    <link rel="stylesheet"
          href="admin.css?v=4">

</head>

<body>

<div class="dashboard">

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


    <main class="main-content">

        <div class="page-header">

            <div>

                <h1>Edit Place</h1>

                <p>
                    Update the information of this destination.
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
            </div>

        <?php endif; ?>


        <div class="place-form-container">

            <form method="POST">

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
                            value="<?php echo htmlspecialchars($place["name"]); ?>"
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

                            <option value="NATURE"
                                <?php echo $place["category"] === "NATURE" ? "selected" : ""; ?>>
                                NATURE
                            </option>

                            <option value="SHOPPING"
                                <?php echo $place["category"] === "SHOPPING" ? "selected" : ""; ?>>
                                SHOPPING
                            </option>

                            <option value="RELIGIOUS"
                                <?php echo $place["category"] === "RELIGIOUS" ? "selected" : ""; ?>>
                                RELIGIOUS
                            </option>

                            <option value="HERITAGE"
                                <?php echo $place["category"] === "HERITAGE" ? "selected" : ""; ?>>
                                HERITAGE
                            </option>

                            <option value="ENTERTAINMENT"
                                <?php echo $place["category"] === "ENTERTAINMENT" ? "selected" : ""; ?>>
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
                            value="<?php echo htmlspecialchars($place["distance_km"]); ?>"
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
                            value="<?php echo htmlspecialchars($place["opening_hours"]); ?>"
                            required
                        >

                    </div>

                </div>


                <h2>Description</h2>

                <div class="admin-form-group">

                    <label for="short_description">
                        Short Description *
                    </label>

                    <textarea
                        id="short_description"
                        name="short_description"
                        rows="3"
                        required
                    ><?php echo htmlspecialchars($place["short_description"]); ?></textarea>

                </div>


                <div class="admin-form-group">

                    <label for="description">
                        Full Description *
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        required
                    ><?php echo htmlspecialchars($place["description"]); ?></textarea>

                </div>


                <div class="admin-form-group">

                    <label for="travel_tips">
                        Travel Tips
                    </label>

                    <textarea
                        id="travel_tips"
                        name="travel_tips"
                        rows="4"
                    ><?php echo htmlspecialchars($place["travel_tips"]); ?></textarea>

                </div>


                <h2>Image</h2>

                <div class="admin-form-group">

                    <label for="image_url">
                        Image Path *
                    </label>

                    <input
                        type="text"
                        id="image_url"
                        name="image_url"
                        value="<?php echo htmlspecialchars($place["image_url"]); ?>"
                        required
                    >

                </div>


                <h2>Location & Map</h2>

                <div class="admin-form-group">

                    <label for="maps_query">
                        Google Maps Query
                    </label>

                    <input
                        type="text"
                        id="maps_query"
                        name="maps_query"
                        value="<?php echo htmlspecialchars($place["maps_query"]); ?>"
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
                            value="<?php echo htmlspecialchars($place["latitude"]); ?>"
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
                            value="<?php echo htmlspecialchars($place["longitude"]); ?>"
                        >

                    </div>

                </div>


                <div class="form-actions">

                    <a href="admin_places.php"
                       class="cancel-btn">

                        Cancel

                    </a>

                    <button type="submit"
                            class="save-btn">

                        Update Place

                    </button>

                </div>

            </form>

        </div>

    </main>

</div>

</body>

</html>