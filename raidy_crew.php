<?php
	session_start();

	if (!$_SESSION['token'])
		header('Location: index.html');
?>

<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Oswald|Slabo+27px" rel="stylesheet">
		<link rel="stylesheet" href="crew.css" media="screen" charset="utf-8">
		<title>Raidy - Ton Crew</title>
	</head>
	<body>
		<h1>Ton Escouade est en formation... </h1>
		<div class="image">
			<div class="gif">
				<img src="utility/spin.gif">
			</div>
		</div>
			<div style="background:url(utility/spin.gif) no-repeat center center;width:32px;height:32px;margin: auto;"></div>
		<h2 style="text-align:center;" id="players"></h2>
		<script type="text/javascript" src="call_bdd.js">
		</script>
	</body>
</html>
