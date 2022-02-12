<?php
include("class/SuperKlasseMitKonstruktor.class.php");
include("class/SubKlasseMitKonstruktor3.class.php");
$instanz = new SubKlasseMitKonstruktor3();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Variante 4</title>
</head>
<body>
	<h1>Variante 4</h1>
	<ul>
		<li>Super- und Subklasse besitzen <strong>beide</strong> eine Konstruktormethode</li>
		<li>Mit einem &quot;Trickli&quot; wird jetzt auch die Konstruktormethode der Elternklasse abgearbeitet</li>
		<li>Für einen möglichen Einsatz im &quot;realen&quot; Leben: Vergleiche die Klasse &quot;SimpleCRUD&quot; beim CRUD-Beispiel im Thema &quot;PDO - Sicherer Verkehr mit Datenbanken&quot;</li>
	</ul>
</body>
</html>
