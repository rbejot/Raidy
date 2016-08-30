<?php
	session_start();

	if ($_SESSION['member_crew'])
		header('Location: raidy.php');
	else
	{
		$_SESSION['users'] = "";
		header("Refresh:2");
	}
	if (!$_SESSION['token'])
		header('Location: index.html');

	require('php/db_info.php');

	$console = $_SESSION['console'];
	$raid_mode = $_SESSION['raid_mode'];
	$activities = $_SESSION['activities'];

	try {
	    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
	catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
	$reponse = $bdd->query("SELECT * FROM user_table WHERE console='$console' AND raid_mode='$raid_mode' AND activities='$activities' AND crewed=0");

	$member_crew = 0;
	while ($data = $reponse->fetch())
	{
		$users[] = $data['user_id'];
		if ($data['console'] == 2)
			$data['console'] = "ONE";
		else
			$data['console'] = "PS4";
		echo $data['user_id'] . " " . $data['console'] . " ". $data['light'] . "<br/>";
		if ($member_crew == 5)
		{
			$_SESSION['member_crew'] = $users;
			foreach ($users as $value)
			{
				$_SESSION['users'][] = $value;
				require('php/db_info.php');
				try {
				    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				catch(PDOException $e) {
				    echo "Error: " . $e->getMessage();
				}
				$reponse = $bdd->query("UPDATE user_table SET crewed = 3 WHERE user_id = '$value'");
			}
		}
		$member_crew++;
	}
	$reponse->closeCursor();
?>

<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Oswald|Slabo+27px" rel="stylesheet">
		<link rel="stylesheet" href="crew.css" media="screen" charset="utf-8">
		<title>Raidy - Ton Crew</title>
	</head>
	<body>
		<h1>Ton Escouade est en formation. </h1>
	</body>
</html>
