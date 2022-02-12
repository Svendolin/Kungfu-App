<?php
include("class/SuperKlasseMitKonstruktor.class.php");
include("class/SubKlasseOhneKonstruktor.class.php");
$instanz = new SubKlasseOhneKonstruktor();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Variante 2</title>
</head>
<body>
	<h1>Variante 2</h1>
	<ul>
		<li>Die Superklasse besitzt eine Konstruktormethode</li>
		<li>Die Subklasse wurde <strong>ohne</strong> Konstruktormethode notiert</li>
	</ul>
</body>
</html>
