<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the time from the form submission
    $time = $_POST['time'];
    
    // Establish connection to the database (assuming you already have connection.php)
    include("connection.php");

    // Prepare user ID and table name
    $user_id = $_SESSION['user_id']; // Get user ID from session
    $table_name = "time_logs"; // Specify the table name without the database name

    // Fetch the user's name from the users table
    $query = "SELECT user_name FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);
    $user_name = $user_data['user_name'];

    // Prepare and execute the SQL statement to save the time along with the user's name
    $sql = "INSERT INTO $table_name (user_id, user_name, time) VALUES ('$user_id', '$user_name', '$time')";
    if (mysqli_query($con, $sql)) {
        // Time saved successfully
        echo "<script>alert('Time saved Successfully!');</script>";
    } else {
        // Error saving time
        echo "Error: " . mysqli_error($con);
    }
    
    // Close database connection
    mysqli_close($con);
} else {
    // Redirect to index page if accessed directly
    header("Location: index.php");
    exit;
}
?>
