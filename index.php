<?php
include_once "./functions/headerAndFooter/mainHeader.php";
?>

    <div id="prallax"></div>
    <div class="prallax_text">
        <?php 
            if (!isset($_SESSION["username"]))
            {
                echo '<h1 id="welcome">Welcome here!</h1>';
                echo '<p>Look around, signup, login, check your data, and logout c: </p>';
            }
            else
            {
                echo '<h1 id="welcome">Welcome here ' . $_SESSION["username"] . '! </h1>';
                echo '<p>Look around, check your data, and logout c: </p>';
            }
        ?>
    </div>

<?php
include_once "./functions/headerAndFooter/mainFooter.php";
?>