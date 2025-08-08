<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signUp'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if email already exists
    $query = "SELECT * FROM students WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists. Please use a different email.');</script>";
    } else {
        // Insert new student
        $query = "INSERT INTO students (fname, lname, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ssss", $fname, $lname, $email, $password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Registration successful! Please login.');</script>";
            echo "<script>window.location.href = 'student_loginpage.php';</script>";
        } else {
            echo "<script>alert('Error during registration.');</script>";
        }
    }
}
?>