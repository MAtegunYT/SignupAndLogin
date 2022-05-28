<?php
include_once "../functions/headerAndFooter/pagesHeader.php";

if(!empty($_SESSION["username"])) {
            header("location: ../index.php");
        }
?>

<div id="prallaxSignup"></div>

<div class="prallax_text">
        <h1 id="welcome">Signup</h1>
        
        <form action="../functions/signup.inc.php" method="post">
            <p>Username:</p>
            <input class="textInput" type="text" name="signupUname">
            <br>
            <p>Email:</p>
            <input class="textInput" type="text" name="signupEmail">
            <br>
            <p>Password:</p>
            <input class="textInput" type="password" name="signupPassword">
            <br>
            <p>Password again:</p>
            <input class="textInput" type="password" name="signupPassword2">
            <br><br>
            <input class="subButton" type="submit" value="Signup" name="signup">
            <br>
            <p>You already have an account? <a href="./login.php">Click here!</a></p>
        </form>

        <?php
            if (isset($_GET["error"]))
            {
                switch (isset($_GET["error"])) {
                case $_GET["error"] == "emptyinput":
                        echo '<p style="color: red; margin: 0; font-size: 25px;">Fill in all fields</p>';
                    break;
                case $_GET["error"] == "invaliduname":
                        echo '<p style="color: red; margin: 0; font-size: 25px;">Invalid username</p>';
                    break;
                case $_GET["error"] == "invalidemail":
                        echo '<p style="color: red; margin: 0; font-size: 25px;">Invalid Email</p>';
                    break;
                case $_GET["error"] == "passdntmatch":
                        echo '<p style="color: red; margin: 0; font-size: 25px;">Passwords do not match</p>';
                    break;
                case $_GET["error"] == "passshort":
                        echo '<p style="color: red; margin: 0; font-size: 25px;">The password must be at least 8 characters long</p>';
                    break;
                case $_GET["error"] == "unametaken":
                        echo '<p style="color: red; margin: 0; font-size: 25px;">Username or Email is taken</p>';
                    break;
                case $_GET["error"] == "unameshort":
                        echo '<p style="color: red; margin: 0; font-size: 25px;">The username can be a minimum 3, and a maximum 12 characters long</p>';
                    break;
                case $_GET["error"] == "stmtfailed":
                        echo '<p style="color: green; margin: 0; font-size: 25px;">Something went wrong</p>';
                    break;
                case $_GET["error"] == "none":
                        echo '<p style="color: green; margin: 0; font-size: 25px;">User created successfully</p>';
                    break;
                }
            }
            
        ?>
    </div>
<?php
include_once "../functions/headerAndFooter/pagesFooter.php";
?>