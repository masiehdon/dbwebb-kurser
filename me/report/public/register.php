<?php
include_once __DIR__ . '/../src/functions.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // function call to save user input to the database
    saveUserToDatabase($username, $email, $password);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "../../config/config.php" ?>

    <link rel="stylesheet" href="<?= $assetsUrl ?>css/style.css">
    <link rel="stylesheet" href="<?= $assetsUrl ?>css/register.css">
    <title>Register</title>




    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

        .main {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px;
        }

        .main h2 {
            color: #4caf50;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 15px;
            border-radius: 10px;
            border: none;
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
    </style> -->


</head>
<body>
<div class="container"> 
<nav>

      <div class="navbar">
        <?php
        $title = "Index";
        include("../view/header.php");
        ?>
      </div>

    </nav>


    <div class="main">
        <h2>Registration Form</h2>
        <form action="" method="post" class="form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required />


            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"/>       

            

            <button type="submit" class="button">
                Submit
            </button>
        </form>
    </div>

    <footer>
    <div class="footer">
      <?php
      include("../view/footer.php");
      ?>
    </div>
  </footer>
</div>
</body>
</html>