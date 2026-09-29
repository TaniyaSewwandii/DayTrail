<?php

session_start();

require_once "../db.php";

// Protect dashboard
if (!isset($_SESSION["admin_id"])) {
    header("Location: admin_login.php");
    exit;
}

// Count places
$place_count = 0;

$place_result = $conn->query("SELECT COUNT(*) AS total FROM places");

if ($place_result) {
    $place_data = $place_result->fetch_assoc();
    $place_count = $place_data["total"];
}

// Count contact messages
$message_count = 0;

$message_result = $conn->query("SELECT COUNT(*) AS total FROM contact_messages");

if ($message_result) {
    $message_data = $message_result->fetch_assoc();
    $message_count = $message_data["total"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | DayTrail</title>

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

            <a href="admin_dashboard.php"
               class="active">
                🏠 Dashboard
            </a>

            <a href="admin_places.php">
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

        <div class="dashboard-header">

            <div>

                <h1>Welcome, Admin!</h1>

                <p>
                    Manage your DayTrail website from here.
                </p>

            </div>

        </div>


        <!-- STAT CARDS -->

        <div class="stat-container">

            <div class="stat-card">

                <div class="stat-icon">
                    📍
                </div>

                <div>

                    <h3>
                        <?php echo $place_count; ?>
                    </h3>

                    <p>Total Places</p>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    ✉
                </div>

                <div>

                    <h3>
                        <?php echo $message_count; ?>
                    </h3>

                    <p>Contact Messages</p>

                </div>

            </div>

        </div>


        <!-- QUICK ACTIONS -->

        <section class="dashboard-section">

            <h2>Quick Actions</h2>

            <div class="action-container">

                <div class="action-card">

                    <h3>📍 Manage Places</h3>

                    <p>
                        Add, edit and delete tourist
                        destinations.
                    </p>

                    <a href="admin_places.php"
                       class="action-btn">

                        Manage Places

                    </a>

                </div>


                <div class="action-card">

                    <h3>✉ Contact Messages</h3>

                    <p>
                        View messages submitted by
                        DayTrail users.
                    </p>

                    <a href="admin_messages.php"
                       class="action-btn">

                        View Messages

                    </a>

                </div>

            </div>

        </section>

    </main>

</div>

</body>

</html>