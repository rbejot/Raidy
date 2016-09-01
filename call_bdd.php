<?php
	session_start();

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
		echo $member_crew;
		if ($member_crew == 5)
		{
			foreach ($users as $value)
			{
				$_SESSION['users'][] = $value;
				// require('php/db_info.php');
				// try {
				//     $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				//     $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				// }
				// catch(PDOException $e) {
				//     echo "Error: " . $e->getMessage();
				// }
				// $reponse = $bdd->query("UPDATE user_table SET crewed = 3 WHERE user_id = '$value'");
			}
		}
		$member_crew++;
	}
	$reponse->closeCursor();
 ?>
