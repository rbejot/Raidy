<?php
require('db_info.php');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql =  "CREATE TABLE `raidy_db`.`user_table` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` VARCHAR(225) NOT NULL , `console` INT NOT NULL , `raid_mode` INT NOT NULL , `classe` INT NOT NULL , `activities` INT NOT NULL , `light` VARCHAR(3) NOT NULL , `notAlone` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    // use exec() because no results are returned
    $conn->exec($sql);
	header('../index.html');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
 ?>
