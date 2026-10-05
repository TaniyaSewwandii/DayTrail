<?php

session_start();

require_once "../db.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: admin_login.php");
    exit;
}

$sql = "SELECT * FROM contact_messages ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Messages | DayTrail</title>

    <link rel="stylesheet" href="admin.css?v=5">

</head>

<body>

<div class="dashboard">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="sidebar-logo">

            <img src="/DayTrail/LOGO.png" alt="DayTrail Logo">

            <h2>DayTrail</h2>

            <p>Admin Panel</p>

        </div>

        <nav>

            <a href="admin_dashboard.php">
                🏠 Dashboard
            </a>

            <a href="admin_places.php">
                📍 Manage Places
            </a>

            <a href="admin_messages.php" class="active">
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

                <h1>Contact Messages</h1>

                <p>
                    View messages submitted by DayTrail users.
                </p>

            </div>

        </div>


        <!-- MESSAGES TABLE -->

        <div class="table-container">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Subject</th>

                        <th>Message</th>

                        <th>Date</th>

                    </tr>

                </thead>


                <tbody>

                <?php if ($result && $result->num_rows > 0): ?>

                    <?php while ($message = $result->fetch_assoc()): ?>

                        <tr>

                            <td>
                                <?php echo $message["id"]; ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($message["name"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($message["email"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($message["subject"]); ?>
                            </td>

                            <td>
                                <?php echo nl2br(
                                    htmlspecialchars($message["message"])
                                ); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($message["created_at"]); ?>
                            </td>

                        </tr>

                    <?php endwhile; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="6" class="no-data">

                            No contact messages found.

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