<?php
require("class/Haustier.class.php");
require("class/Katze.class.php");
require("class/Kanarienvogel.class.php");
//Instanziiert wird hier nur die Subklasse.
// Trotzdem stehen darauf die Mitglieder der Superklasse im Objekt zur Verfügung.
$instanz = new Kanarienvogel();

//Eigenschaften schreiben, man beachte:
//diese gehören zur Instanz der Subklasse, obwohl sie in der Superklasse definiert wurden!!!
$instanz -> geschlecht = "weiblich";
$instanz -> name = "Kalapagos";
$instanz -> art = "Kanarienvogel";

//Methode der Superklasse aufrufen, man beachte:
//diese gehört zur Instanz der Subklasse, obwohl sie in der Superklasse definiert wurde!!!
$ausgabe1 = $instanz -> WasBinIch();

// Methode der Subklasse aufrufen
$ausgabe2 = $instanz -> piepsen();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Vererbung Teil 1: Beispiel 2</title>
</head>
<body>
<h2>Der Kanarienvogel ist ein Haustier, was piepsen kann!</h2>
<?php
echo $ausgabe1;
echo "<br>";
echo $ausgabe2;
?>
</body>
</html>
