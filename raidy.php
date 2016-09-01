<?php
	session_start();

	// unset($_SESSION['token']);
	if (!$_SESSION['users'])
		header('Location: profil.php');
	foreach ($_SESSION['users'] as $value) {
		echo $value."<br/>";
	}
	// $_SESSION['users'] = "";
 ?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Raidy</title>
	</head>
	<body>
		<a href="clean_users.php">Tout le monde est la</a>
	</body>
</html>
