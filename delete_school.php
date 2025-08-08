<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}
include "database.php"; // Include your database connection file


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM school_data WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header('Location: admin_dashboard.php');
    exit();
}
?>