<?php 

session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if($result) {
            if($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                } else {
                    // Use JavaScript alert
                    echo "<script>alert('Wrong username or password!');</script>";
                }
            } else {
                // Use JavaScript alert
                echo "<script>alert('Wrong username or password!');</script>";
            }
        } else {
            // Use JavaScript alert
            echo "<script>alert('Wrong username or password!');</script>";
        }
    } else {
        // Use JavaScript alert
        echo "<script>alert('Wrong username or password!');</script>";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<style type="text/css">
    
    body {
        font-family: "Kode Mono", monospace;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
    }
    h3 {
        text-align: center;
        font-size: 26px;
        padding: 40px;
        color: #ffffff;
    }

    #text {
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }

    #box {
        background-color: grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }
    #nav {
        background-color: #0099ff;
        width: 100%;
        position: fixed;
        right: 0px;
        top: 0;
    }
    a {
        color: #ffffff;
    }
    a:hover {
        color: #0099ff; /* Change color when hovering */
    }

    .login-box {
        width: 420px;
        position: absolute;
        top: calc(50% + 60px); /* Adjust this value as needed */
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        background: rgba(0, 0, 0, 0.5);
        padding: 50px;
        border-radius: 20px;
    }

</style>
<div id="nav">
    <div>
        <h3>Hostel Girls Security System</h3>
    </div>
    <div>
        <i class="fas fa-bars"></i>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="login-box">
    
    <form method="post" class="login" autocomplete="off">
        <div style="font-size: 20px;margin: 10px;color: white;">Login</div>

        <input id="text" type="text" name="user_name" placeholder="Enter username"><br><br>
        <input id="text" type="password" name="password" placeholder="Enter password"><br><br>

        <input id="button" type="submit" type="button" class="btn btn-primary" value="Click to Login"><br><br>

        <a href="signup.php" class="alink">New user? Signup here</a><br><br>
        
    </form>
</div>
</body>
</html>
