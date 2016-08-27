<?php
	session_start();

	include("utilities.php");
	include("insert_to_db.php");

	if($_POST['user_id'] && $_POST['console'] !== 'none' && $_POST['classe'] !== 'none' && $_POST['light'] !== "0" && $_POST['raid_mode'] !== 'none' && $_POST['raid'] !== 'none' && $_POST['submit'] === "TAG!")
	{
		$user_id = $_POST['user_id'];
		$console = console_no($_POST['console']);
		$classe = classe_no($_POST['classe']);
		$raid_mode = raid_mode_no($_POST['raid_mode']);
		$activities = activities_no($_POST['raid']);
		$light = $_POST['light'];
		if ($light > 335 || $light < 280)
			header('Location: ../index.html');
		$notAlone = notAlone_no($_POST['notAlone']);
		insert_to_db($user_id, $console, $classe, $raid_mode, $activities, $light, $notAlone);
		$_SESSION['token'] = "ok";
		header('Location: ../almost_raidy.php');
	}
	else
		header('Location: ../index.html');
 ?>
