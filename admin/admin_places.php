<?php

session_start();

require_once "../db.php";

// Protect admin page
if (!isset($_SESSION["admin_id"])) {
    header("Location: admin_login.php");
    exit;
}

// Get all places
$sql = "SELECT * FROM places ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Manage Places | DayTrail</title>

    <link rel="stylesheet" href="admin.css">

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

                <h1>Manage Places</h1>

                <p>
                    View and manage DayTrail tourist places.
                </p>

            </div>

            <a href="add_place.php"
               class="add-btn">

                + Add Place

            </a>

        </div>


        <!-- PLACES TABLE -->

        <div class="table-container">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Image</th>

                        <th>Name</th>

                        <th>Category</th>

                        <th>Distance</th>

                        <th>Opening Hours</th>

                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                <?php if ($result && $result->num_rows > 0): ?>

                    <?php while ($place = $result->fetch_assoc()): ?>

                        <tr>

                            <td>
                                <?php echo $place["id"]; ?>
                            </td>

                            <td>

                                <img
                                    src="../<?php echo htmlspecialchars($place["image_url"]); ?>"
                                    class="place-image"
                                    alt="Place"
                                >

                            </td>

                            <td>
                                <?php echo htmlspecialchars($place["name"]); ?>
                            </td>

                            <td>

                                <span class="category-badge">

                                    <?php echo htmlspecialchars($place["category"]); ?>

                                </span>

                            </td>

                            <td>
                                <?php echo htmlspecialchars($place["distance_km"]); ?>
                                km
                            </td>

                            <td>
                                <?php echo htmlspecialchars($place["opening_hours"]); ?>
                            </td>

                            <td class="action-buttons">

                                <a
                                    href="edit_place.php?id=<?php echo $place["id"]; ?>"
                                    class="edit-btn"
                                >
                                    Edit
                                </a>

                                <a
                                    href="delete_place.php?id=<?php echo $place["id"]; ?>"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this place?');"
                                >
                                    Delete
                                </a>

                            </td>

                        </tr>

                    <?php endwhile; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="7"
                            class="no-data">

                            No places found.

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </main>

</div>

</body>

</html>