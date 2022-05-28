<?php
session_start();

if(isset($_POST["login"])) {
    require_once "./db/dbh.inc.php";
    require_once "./db/fnc.inc.php";

    $username = mysqli_real_escape_string($conn, $_POST["loginUname"]);
    $pass = mysqli_real_escape_string($conn, $_POST["loginPassword"]);

    if(emptyInpLog($username, $pass) !== false) {
        header("location: ../pages/login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pass);

    
} else {
    header("location: ../pages/login.php");
    exit();
}
