<?php
	session_start();

	unset($_SESSION['token']);
	if (!$_SESSION['users'])
		header('Location: profil.php');
	if ($_SESSION['member_crew'])
		$_SESSION['users'] = $_SESSION['member_crew'];
	foreach ($_SESSION['users'] as $value) {
		echo $value."<br/>";
	}
	unset($_SESSION['member_crew']);
 ?>
