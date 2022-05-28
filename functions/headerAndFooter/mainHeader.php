<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/mainstyle.css">
    <link rel="icon" href="./images/icons/icon.png">
    <title>MAtegunYT - Welcome</title>
    <script>
        function scrollPage()
        {
            window.scrollTo(0,document.body.scrollHeight);
        }
    </script>
</head>
<body <?php session_start(); if(!isset($_SESSION["scrolledOnece"]) || $_SESSION["scrolledOnece"] != true) {echo "onload = scrollPage()";} ?>>
    
        <div class="header">
            <ul class="headerMenu">
                <li class="headerMenuItem"><a href="#">Home</a></li>
                <?php
                $_SESSION["scrolledOnece"] = true;

                if (!isset($_SESSION['username']))
                {
                    echo '<li class="headerMenuItem"><a href="./pages/signup.php">Signup</a></li>';
                    echo '<li class="headerMenuItem"><a href="./pages/login.php">Login</a></li>';
                }
                else
                {
                    echo '<li class="headerMenuItem"><a href="./pages/profile.php">Profile</a></li>';
                    echo '<li class="headerMenuItem"><a href="./functions/logout.inc.php">Logout</a></li>';
                }
                ?>
            </ul>
        </div>