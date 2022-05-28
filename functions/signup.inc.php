<?php
    if (isset($_POST["signup"])) {
        require_once "./db/dbh.inc.php";

        $uname = mysqli_real_escape_string($conn, $_POST["signupUname"]);
        $email = mysqli_real_escape_string($conn, $_POST["signupEmail"]);
        $pss = mysqli_real_escape_string($conn, $_POST["signupPassword"]);
        $pss2 = mysqli_real_escape_string($conn, $_POST["signupPassword2"]);
        $date = date("Y-m-d H:i:s");
        $pssc = strlen($pss);
        $unamec = strlen($uname);

        require_once "./db/fnc.inc.php";

        if(emptyInpReg($uname, $email, $pss, $pss2) !== false) {
            header("location: ../pages/signup.php?error=emptyinput");
            exit();
        }

        if(invalidUname($uname) !== false) {
            header("location: ../pages/signup.php?error=invaliduname");
            exit();
        }
        if(invalidEmail($email) !== false) {
            header("location: ../pages/signup.php?error=invalidemail");
            exit();
        }
        if(passMatch($pss, $pss2) !== false) {
            header("location: ../pages/signup.php?error=passdntmatch");
            exit();
        }
        if(unameExists($conn, $uname, $email) !== false) {
            header("location: ../pages/signup.php?error=unametaken");
            exit();
        }
        if($pssc < 8) {
            header("location: ../pages/signup.php?error=passshort");
            exit();
        }
        if($unamec < 3) {
            header("location: ../pages/signup.php?error=unameshort");
            exit();
        }
        
        createUser($conn, $uname, $email, $pss, $date);

    } else {
        header("location: ../pages/signup.php");
        exit();
    }