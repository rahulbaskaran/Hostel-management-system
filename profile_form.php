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


    <title>Profile | Hostel Girls Security System</title>
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
        h2{
            left: 540px;
            text-align: center;
            line-height: 80px;
            box-shadow: inset 0 -0.2em white, inset 0 -0.30em #0099ff;
            display: inline;
            position: relative;
            padding-bottom: 10px
        }
    </style>
</head>
<body>
    <header>
        <h1>Hostel Girls Security System</h1>
    </header>
    <br>
    <br>
    <h2 style="text-align: center;">Profile Details</h2>

    <div class="container">
    <form action="save_profile.php" method="post" autocomplete="off">
        <label for="name" >Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="reg_no">Register No:</label>
        <input type="text" id="reg_no" name="reg_no" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="parent_phone">Parent's Phone Number:</label>
        <input type="text" id="parent_phone" name="parent_phone" required><br><br>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" required><br><br>

        <button type="submit" class="btn btn-primary">Save Profile</button>
        <br>
        <br>
         <a href="index.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Click to Home Page
        </a>
    </form>
</div>
</body>
</html>
