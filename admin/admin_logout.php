<?php

session_start();

// Remove all session data
session_unset();

// Destroy the session
session_destroy();

// Go back to admin login
header("Location: admin_login.php");
exit;

?>