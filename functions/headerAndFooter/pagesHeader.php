<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/mainstyle.css">
    <link rel="icon" href="../images/icons/icon.png">
    <title>MAtegunYT - Signup & Login</title>
</head>
<body>
    <div class="header">
            <ul class="headerMenu">
                <li class="headerMenuItem"><a href="../index.php">Home</a></li>
                <?php
                session_start();
                if (!isset($_SESSION["username"]))
                {
                    echo '<li class="headerMenuItem"><a href="./signup.php">Signup</a></li>';
                    echo '<li class="headerMenuItem"><a href="./login.php">Login</a></li>';
                }
                else
                {
                    echo '<li class="headerMenuItem"><a href="./profile.php">Profile</a></li>';
                    echo '<li class="headerMenuItem"><a href="../functions/logout.inc.php">Logout</a></li>';
                }
                ?>
            </ul>
        </div>