<?php
include_once "../functions/headerAndFooter/pagesHeader.php";

if(!empty($_SESSION["username"])) {
            header("location: ../index.php");
        }
?>

<div id="prallaxLogin"></div>

<div class="prallax_text">
        <h1 id="welcome">Login</h1>
        
        <form action="../functions/login.inc.php" method="post">
            <p>Username/Email:</p>
            <input class="textInput" type="text" name="loginUname">
            <br>
            <p>Password:</p>
            <input class="textInput" type="password" name="loginPassword">
            <br><br>
            <input class="subButton" type="submit" value="Login" name="login">
            <br>
            <p>You don't have any accounts yet? <a href="./signup.php">Click here!</a></p>
        </form>

        <?php
        if (isset($_GET["error"]))
        {
            switch (isset($_GET["error"])) {
                case $_GET["error"] == "emptyinput":
                        echo '<p style="color: red; margin: 0; font-size: 25px;">Fill in all fields</p>';
                    break;
                case $_GET["error"] == "nouname":
                        echo '<p style="color: red; margin: 0; font-size: 25px;">No such user found</p>';
                    break;
                case $_GET["error"] == "wronglogin":
                        echo '<p style="color: red; margin: 0; font-size: 25px;">Wrong password</p>';
                    break;
            }
        }
        ?>
    </div>

<?php
include_once "../functions/headerAndFooter/pagesFooter.php";
?>