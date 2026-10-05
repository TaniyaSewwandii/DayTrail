<?php

session_start();

require_once "../db.php";

// Protect admin page
if (!isset($_SESSION["admin_id"])) {
    header("Location: admin_login.php");
    exit;
}

// Get place ID
$id = $_GET["id"] ?? "";

if ($id === "" || !is_numeric($id)) {
    header("Location: admin_places.php");
    exit;
}

// Delete place
$stmt = $conn->prepare("DELETE FROM places WHERE id = ?");

$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    $stmt->close();

    header("Location: admin_places.php");
    exit;

} else {

    $stmt->close();

    die("Failed to delete place.");
}

?>