<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch student details
    $query = "SELECT * FROM students WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        if (password_verify($password, $student['password'])) {
            // Login successful
            $_SESSION['student_id'] = $student['id'];
            $_SESSION['student_email'] = $student['email'];
            echo "<script>alert('Login successful!');</script>";
            echo "<script>window.location.href = 'userdashboard.php';</script>";
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('Student not found.');</script>";
    }
}
?>