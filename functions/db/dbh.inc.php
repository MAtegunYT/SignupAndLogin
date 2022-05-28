<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "users";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
            die("Connection error!: " . mysqli_connect_error());
}

/* 

ATTENTION!
Before you start, you must create a new database, named "users".

After you did that, you have to run this SQL code:

    CREATE TABLE `users`.`accounts` (
    `userId` int(11) NOT NULL AUTO_INCREMENT,
    `userName` varchar(128) NOT NULL,
    `userEmail` varchar(128) NOT NULL,
    `userPwd` varchar(500) NOT NULL,
    `dateCreated` varchar(128) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

*/