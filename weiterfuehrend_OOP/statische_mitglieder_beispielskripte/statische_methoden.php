<?php
include("class/Bauplan2.class.php");

// Aufrufen einer statischen Methode.
// 8ung: Hier wird mit dem Namen der Klasse und dem Gültigkeitsbereichsoperator (::) gearbeitet!
$ausgabe = Bauplan2::hurra();

// Das würde zwar auch funktionieren, ist aber unsauberer Programmierstil!
// Lasse die Finger davon!
// $instanz = new Bauplan2();
// $ausgabe = $instanz -> hurra();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Statische Methoden</title>
</head>
<body>
<?php
echo $ausgabe;
?>
</body>
</html>
