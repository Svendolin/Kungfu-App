<?php
include("class/SuperKlasseOhneKonstruktor.class.php");
include("class/SubKlasseMitKonstruktor.class.php");
$instanz = new SubKlasseMitKonstruktor();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Variante 1</title>
</head>
<body>
	<h1>Variante 1</h1>
	<ul>
		<li>Die Superklasse wurde <strong>ohne</strong> Konstruktormethode notiert</li>
		<li>Die Subklasse besitzt eine Konstruktormethode</li>
	</ul>
</body>
</html>
