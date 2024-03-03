<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

// Fetch user's profile details if user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM user_profiles WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Check if profile data exists
        if (mysqli_num_rows($result) > 0) {
            // Fetch and store profile data
            $profile_data = mysqli_fetch_assoc($result);
        } else {
            // No profile found
            $profile_data = array(); // Set empty profile data
        }
    } else {
        // Query execution failed
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-ZN5U8w6pMpttT4da0/xMY6Zcjqm0cAYJYnJ27WrB+8Md6qzGVP86s4zXacEmwEKTmOOeLrATu7cbkfgcNNMkqg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <title>Hostel Girls Security System</title>
    <style>
    

        body {
            font-family: "Kode Mono", monospace;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }
        header {
            background-color: #0099ff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .container {
            bottom: 10px;
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 2px 0 50px rgba(0.2, 0.2, 0.2, 0.5); /* Increase the shadow size here */
        }
        .welcome {
            margin-bottom: 20px;
            text-align: center;
        }
        .btn {
            background-color: #F4D03F;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-family: "Kode Mono", monospace;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }
        .btn:hover {
            background-color: #007acc;
        }
        #btn {
            background-color: #0099ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-family: "Kode Mono", monospace;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }
        #btn:hover {
            background-color: #007acc;
        }

        .savetime {
            text-align: center;
        }
        .profile-details{
        	align-content: center;
        	text-align: center;
        }
        h2{
        	line-height: 80px;
            box-shadow: inset 0 -0.2em white, inset 0 -0.30em #F4D03F;
            display: inline;
           	position: relative;
           	padding-bottom: 10px
        }

    </style>
</head>
<body>
    <!-- Header content here -->
    <header>
        <h1>Hostel Girls Security System</h1>
    </header>
    <div class="container">
        <!-- Welcome message -->
        <div class="welcome">
            <h2>Welcome Back, <?php echo $user_data['user_name']; ?></h2>
        </div>
       
        <!-- Display user's profile details -->
        <div class="profile-details">
            <h3>Profile Details</h3>
            <?php if (!empty($profile_data)): ?>
                <p><strong>Name:</strong> <?php echo $profile_data['name']; ?></p>
                <p><strong>Age:</strong> <?php echo $profile_data['age']; ?></p>
                <p><strong>Phone Number:</strong> <?php echo $profile_data['phone']; ?></p>
                <p><strong>Parent's Phone Number:</strong> <?php echo $profile_data['parent_phone']; ?></p>
                <p><strong>Department:</strong> <?php echo $profile_data['department']; ?></p>
            <?php else: ?>
                <p>Please <a href="profile_form.php">create your profile</a>.</p>
                	<p>Data will be stored in DataBase</p>
            <?php endif; ?>
        </div>
        <br>

        <!-- Other content here -->
        <div class="savetime">
            <!-- Functionality to save in and out time -->
            <form action="save_time.php" method="post">
                <label for="time">Enter Out-Time:</label>
                <input type="datetime-local" id="time" name="time" required>
                <button type="submit" class="btn">Save Time</button>
            </form>
            <br>
             <form action="save_time.php" method="post">
                <label for="time">Enter In-Time:</label>
                <input type="datetime-local" id="time" name="time" required>
                <button type="submit" class="btn">Save Time</button>
            </form>
        </div>
        <br>
           <div style="margin-top: 20px; text-align: center;">
       <!-- Logout button with Font Awesome icon -->
           <a href="logout.php" class="btn btn-info btn-lg" id="btn">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
       </form>
        </div>
    </div>
</body>
</html>
