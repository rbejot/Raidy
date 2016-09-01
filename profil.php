<?php
    session_start();

    unset($_SESSION['users']);
 ?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles.css" media="screen" charset="utf-8">
		<link rel="stylesheet" href="profil.css" media="screen" title="no title" charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Oswald|Slabo+27px" rel="stylesheet">
		<title>Raidy</title>
	</head>
	<body>
		<div class="page">
			<div class="title">
				Destiny - Raid Oryx
			</div>
			<div class="instructions">
				Ton profil
			</div>
			<div class="formulaire">
				<form class="" action="php/check_form.php" method="post">
					Id / Gamertag (celui que tu utilises pour jouer) : <br/>

					<div class="gametag">
						<input type="text" name="user_id" value="">
						<br />
					</div>
					Ta console : <br />
					<select class="" name="console">
						<option value="none">

						</option>
						<option value="ps4">
							PS4
						</option>
						<option value="one">
							ONE
						</option>
					</select>
					<br />
					Ta classe : <br />
					<select class="" name="classe">
						<option value="none">

						</option>
						<option value="hunt">
							Chasseur
						</option>
						<option value="titan">
							Titan
						</option>
						<option value="arca">
							Arcaniste
						</option>
					</select>
					<br />
					Raid mode : <br />
					<select class="" name="raid_mode">
						<option value="none">

						</option>
						<option value="normal">
							Normal
						</option>
						<option value="hard">
							Hard
						</option>
					</select>
					<br />
					Ce que tu cherches : <br />
					<select class="" name="raid">
						<option value="none">

						</option>
						<option value="beginning">
							Du début
						</option>
						<option value="glyphes">
							Glyphes
						</option>
						<option value="pretre">
							Prêtre de guerre
						</option>
						<option value="golgo">
							Golgoroth
						</option>
						<option value="pretresses">
							Pretresses
						</option>
						<option value="oryx">
							Oryx[boss]
						</option>
					</select>
					<br />
					Ton niveau de lumière : <br />
					<input type="range" name="lightLevel" min="280" max="335" onchange="updateTextInput(this.value);">
					<input class="light_text" type="text" name="light" id="textInput" value="0">
				   <br /><br />
					<div class="submit">
						<input type="submit" name="submit" value="TAG!">
					</div>
				</form>
			</div>
		</div>

		<script src="app.js" type="text/javascript">
		</script>
	</body>
</html>
