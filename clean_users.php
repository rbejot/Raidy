<?php
	session_start();

	$_SESSION['users'] = "";
	require('php/db_info.php');
	try {
	    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
	$reponse = $bdd->query("UPDATE user_table SET crewed = 3 WHERE user_id = '$value'");
	header('Location: profil.php');
 ?>
