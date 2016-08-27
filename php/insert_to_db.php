<?php
function insert_to_db($user_id, $console, $classe, $raid_mode, $activities, $light, $notAlone)
{
	require('db_info.php');
	try {
	   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	   // set the PDO error mode to exception
	   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   $sql = "INSERT INTO user_table (user_id, console, raid_mode, classe, activities, light, notAlone)
	   VALUES ('$user_id', $console, $raid_mode, $classe, $activities, $light, $notAlone)";
	   // use exec() because no results are returned
	   $conn->exec($sql);
	   }
	catch(PDOException $e)
	   {
	   echo $sql . "<br>" . $e->getMessage();
	   }

	$conn = null;
}
 ?>
