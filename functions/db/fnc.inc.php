<?php

function emptyInpReg($uname, $email, $pss, $pss2) {
    $res;
    if (empty($uname) || empty($email) || empty($pss) || empty($pss2)) {
        $res = true;
    } else {
        $res = false;
    }
    return $res;
}

function invalidUname($uname) {
    $res;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
        $res = true;
    } else {
        $res = false;
    }
    return $res;
}

function invalidEmail($email) {
    $res;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $res = true;
    } else {
        $res = false;
    }
    return $res;
}

function passMatch($pss, $pss2) {
    $res;
    if ($pss !== $pss2) {
        $res = true;
    } else {
        $res = false;
    }
    return $res;
}

function unameExists($conn, $uname, $email) {
    $sql = "SELECT * FROM accounts WHERE userName = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $uname, $email);
    mysqli_stmt_execute($stmt);

    $resoultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resoultData)) {
        return $row;
    } else {
        $res = false;
        return $res;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $uname, $email, $pss, $date) {
    $sql = "INSERT INTO accounts (userName, userEmail, userPwd, dateCreated) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/signup.php?error=stmtfailed");
        exit();
    }

    $hashedPass = password_hash($pss, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $uname, $email, $hashedPass, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../pages/signup.php?error=none");
    exit();
}

function emptyInpLog($username, $pass) {
    $res;
    if (empty($username) || empty($pass)) {
        $res = true;
    } else {
        $res = false;
    }
    return $res;
}

function loginUser($conn, $username, $pass) {
    $unameExists = unameExists($conn, $username, $username);

    if($unameExists === false) {
        header("location: ../pages/login.php?error=nouname");
        exit();
    }

    $passHashed = $unameExists["userPwd"];
    $checkPass = password_verify($pass, $passHashed);

    if($checkPass === false) {
        header("location: ../pages/login.php?error=wronglogin");
        exit();
    } else if ($checkPass === true) {
            session_start();
            $_SESSION["username"] = $unameExists["userName"];
            $_SESSION["email"] = $unameExists["userEmail"];
            $_SESSION["id"] = $unameExists["userId"];
            $_SESSION["c_date"] = $unameExists["dateCreated"];
            header('location: ../index.php');
    }
}