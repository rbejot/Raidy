<?php
	session_start();

	include("utilities.php");
	include("insert_to_db.php");

	function delete_user($user)
	{
		require('db_info.php');

		try {
		   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		   // set the PDO error mode to exception
		   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		   $sql = "DELETE FROM user_table WHERE user_id='$user'";
		   // use exec() because no results are returned
		   $conn->exec($sql);
		   }
	   catch(PDOException $e)
	  	   {
	  	   echo $sql . "<br>" . $e->getMessage();
	  	   }

 	  	$conn = null;
	}

	if($_POST['user_id'] && $_POST['console'] !== 'none' && $_POST['classe'] !== 'none' && $_POST['light'] !== "0" && $_POST['raid_mode'] !== 'none' && $_POST['raid'] !== 'none' && $_POST['submit'] === "TAG!")
	{
		$user_id = $_POST['user_id'];
		delete_user($user_id);
		$console = console_no($_POST['console']);
		$classe = classe_no($_POST['classe']);
		$raid_mode = raid_mode_no($_POST['raid_mode']);
		$activities = activities_no($_POST['raid']);
		$light = $_POST['light'];
		if ($light > 335 || $light < 280)
			header('Location: ../profil.php');
		insert_to_db($user_id, $console, $classe, $raid_mode, $activities, $light, 0);

		$_SESSION['token'] = $user_id;
		$_SESSION['console'] = $console;
		$_SESSION['classe'] = $classe;
		$_SESSION['raid_mode'] = $raid_mode;
		$_SESSION['activities'] = $activities;
		$_SESSION['light'] = $light;

		header('Location: ../raidy_crew.php');
	}
	else
		header('Location: ../profil.php');
 ?>
