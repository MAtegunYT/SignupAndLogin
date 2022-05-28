<h1>Simple signup and login system. 💻</h1>
<p>3 steps before start 📌:</p>
<p>1.) You have to download XAMPP (https://www.apachefriends.org/index.html) 📥</p>
<p>2.) Create a new database "users" 👥</p>
<p>3.) Run this SQL Code 👨‍💻: </p>
<p>CREATE TABLE `users`.`accounts` (
    `userId` int(11) NOT NULL AUTO_INCREMENT,
    `userName` varchar(128) NOT NULL,
    `userEmail` varchar(128) NOT NULL,
    `userPwd` varchar(500) NOT NULL,
    `dateCreated` varchar(128) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;</p>
