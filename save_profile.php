<?php
session_start();
include("connection.php");
include("functions.php");

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data
    // Example: Save profile data to database (replace this with your actual code)
    $user_id = $_SESSION['user_id'];
    // Extract and sanitize form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $parent_phone = mysqli_real_escape_string($con, $_POST['parent_phone']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $reg_no = mysqli_real_escape_string($con, $_POST['reg_no']);

    // Example query to insert profile data into user_profiles table
    $sql = "INSERT INTO user_profiles (user_id, name, age, phone, parent_phone, department, reg_no)
            VALUES ('$user_id', '$name', '$age', '$phone', '$parent_phone', '$department', '$reg_no')";

    if (mysqli_query($con, $sql)) {
        // Profile saved successfully
        echo "<script>alert('Profile saved successfully.');</script>";
    } else {
        // Error saving profile
        echo "Error: " . mysqli_error($con);
    }
}
?>