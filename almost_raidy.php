<?php
	session_start();

	// header("Refresh:2");
	if (!$_SESSION['token'])
		header('Location: index.html');

	echo "<table style='border: solid 1px black;'>";
	echo "<tr><th>Id</th><th>Console</th><th>classe</th><th>raid_mode</th><th>activities</th><th>light</th></tr>";

	class TableRows extends RecursiveIteratorIterator {
	    function __construct($it) {
	        parent::__construct($it, self::LEAVES_ONLY);
	    }

	    function current() {
	        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
	    }

	    function beginChildren() {
	        echo "<tr>";
	    }

	    function endChildren() {
	        echo "</tr>" . "\n";
	    }
	}

	require('php/db_info.php');

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $stmt = $conn->prepare("SELECT user_id, console, classe, raid_mode, activities, light FROM user_table");
	    $stmt->execute();

	    // set the resulting array to associative
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
	        echo $v;
	    }
	}
	catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
	$conn = null;
	echo "</table>";
?>

<!-- <html>
	<head>
		<meta charset="utf-8">
		<title>Raidy</title>
	</head>
	<body>
		<h1>Recrutement</h1>

	</body>
</html> -->
