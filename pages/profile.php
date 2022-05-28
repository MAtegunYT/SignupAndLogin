<?php
include_once "../functions/headerAndFooter/pagesHeader.php";

if(empty($_SESSION["username"])) {
            header("location: ../index.php");
        }
?>

<div id="prallaxProfile"></div>

<div class="prallax_text">
        <h1 id="welcome">Profile deitals</h1>
        <hr>
        <p class="profileDeitals" >Username: <?php echo $_SESSION["username"] ?></p>
        <p class="profileDeitals" >Email address: <?php echo $_SESSION["email"] ?></p>
        <p class="profileDeitals" >Password: Cannot be displayed</p>
        <p class="profileDeitals" >Profile created: <?php echo $_SESSION["c_date"] ?></p>
    </div>

<?php
include_once "../functions/headerAndFooter/pagesFooter.php";
?>