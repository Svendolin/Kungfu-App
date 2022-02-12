<?php
include("class/Bauplan.class.php");
// Erzeugen von drei Instanzen
$instanz1 = new Bauplan();
$instanz2 = new Bauplan();
$instanz3 = new Bauplan();
// ...

// Wie viele Instanzen gibt es?
// 8ung: Hier wird mit dem Namen der Klasse und dem Gültigkeitsbereichsoperator (::) gearbeitet!
$anzahl = Bauplan::$counter;

// Das würde nicht funktionieren!
// $anzahl = $instanz3 -> counter;
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Statische Variablen</title>
</head>
<body>
<?php
echo "Es gibt ".$anzahl." Instanzen von mir";
?>
</body>
</html>
