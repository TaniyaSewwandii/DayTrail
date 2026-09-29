<!DOCTYPE html>
<?php

require_once "db.php";

$messageSent = false;
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if (
        $name === "" ||
        $email === "" ||
        $subject === "" ||
        $message === ""
    ) {

        $errorMessage = "Please fill in all fields.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errorMessage = "Please enter a valid email address.";

    } else {

        $sql = "INSERT INTO contact_messages
                (name, email, subject, message)
                VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ssss",
            $name,
            $email,
            $subject,
            $message
        );

        if ($stmt->execute()) {

            $messageSent = true;

        } else {

            $errorMessage = "Something went wrong. Please try again.";
        }

        $stmt->close();
    }
}

?>
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
   <!-- CONTACT PAGE -->
    <main class="contact-page">

        <!-- CONTACT HEADER -->
        <section class="contact-header">

            <p class="contact-label">CONTACT DAYTRAIL</p>

            <h1>
                Let's Stay<br>
                <span>Connected.</span>
            </h1>

            <p class="contact-intro">
                Have a question, suggestion, or feedback?
                We would love to hear from you.
            </p>

        </section>


        <!-- CONTACT CONTENT -->
        <section class="contact-content">

            <!-- CONTACT INFORMATION -->
            <div class="contact-info">

                <p class="contact-small-title">
                    GET IN TOUCH
                </p>

                <h2>
                    We'd Love to<br>
                    Hear From You
                </h2>

                <p class="contact-description">
                    Whether you have a question about a destination,
                    want to share feedback, or have a suggestion for
                    improving DayTrail, feel free to contact us.
                </p>


                <!-- EMAIL -->
                <div class="contact-item">

                    <div class="contact-icon">
                        ✉
                    </div>

                    <div>
                        <h3>Email</h3>
                        <p>support@daytrail.com</p>
                    </div>

                </div>


                <!-- PHONE -->
                <div class="contact-item">

                    <div class="contact-icon">
                        ☎
                    </div>

                    <div>
                        <h3>Phone</h3>
                        <p>+94 11 234 5678</p>
                    </div>

                </div>


                <!-- LOCATION -->
                <div class="contact-item">

                    <div class="contact-icon">
                        📍
                    </div>

                    <div>
                        <h3>Location</h3>
                        <p>Colombo, Sri Lanka</p>
                    </div>

                </div>

            </div>
            <?php if ($messageSent): ?>

    <div class="success-message">
        Your message has been sent successfully!
    </div>

<?php endif; ?>


<?php if ($errorMessage !== ""): ?>

    <div class="error-message">
        <?php echo htmlspecialchars($errorMessage); ?>
    </div>

<?php endif; ?>


            <!-- CONTACT FORM -->
            <div class="contact-form-card">

                <h2>Send Us a Message</h2>

                <form action="contact.php" method="post">

                    <div class="form-group">

                        <label for="name">
                            Your Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Enter your name"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter your email"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="subject">
                            Subject
                        </label>

                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            placeholder="Enter your subject"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="message">
                            Message
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="6"
                            placeholder="Write your message..."
                            required
                        ></textarea>

                    </div>


                    <button type="submit" class="contact-submit">
                        Send Message →
                    </button>

                </form>

            </div>

        </section>


        <!-- BOTTOM MESSAGE -->
        <section class="contact-bottom">

            <img
                src="LOGO.png"
                class="contact-logo"
                alt="DayTrail Logo"
            >

            <h2>
                Your next Colombo adventure<br>
                starts with DayTrail.
            </h2>

            <a href="places.php" class="contact-btn">
                Explore Places →
            </a>

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