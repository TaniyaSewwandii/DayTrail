<?php

session_start();

require_once "../db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if ($username === "" || $password === "") {

        $error = "Please enter username and password.";

    } else {

        $sql = "SELECT * FROM admins WHERE username = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {

            $admin = $result->fetch_assoc();

            /*
             * Your database column is password_hash
             */
            if ($password === $admin["password_hash"]) {

                $_SESSION["admin_id"] = $admin["id"];
                $_SESSION["admin_username"] = $admin["username"];

                header("Location: admin_dashboard.php");
                exit;

            } else {

                $error = "Incorrect password.";
            }

        } else {

            $error = "Admin account not found.";
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

    <title>Admin Login | DayTrail</title>

    <link rel="stylesheet" href="admin.css">

</head>

<body>

<div class="login-container">

    <div class="login-card">

        <div class="login-logo">
            <img src="/DayTrail/LOGO.png" alt="DayTrail Logo">
        </div>

        <h1>Admin Login</h1>

        <p class="login-subtitle">
            DayTrail Administration
        </p>

        <?php if ($error !== ""): ?>

            <div class="error-message">
                <?php echo htmlspecialchars($error); ?>
            </div>

        <?php endif; ?>

        <form method="POST">

            <div class="form-group">

                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter username"
                    required
                >

            </div>

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required
                >

            </div>

            <button type="submit" class="login-btn">
                Login
            </button>

        </form>

        <a href="../index.php" class="back-home">
            ← Back to DayTrail
        </a>

    </div>

</div>

</body>

</html>