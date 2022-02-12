<?php
require("class/Haustier.class.php");
require("class/Hund.class.php");
// Instanziiert wird hier nur die Subklasse.
// Trotzdem stehen darauf die Mitglieder der Superklasse im Objekt zur Verfügung.
$instanz = new Hund();

// Eigenschaften schreiben, man beachte:
// diese gehören zur Instanz der Subklasse, obwohl sie in der Superklasse definiert wurden!!!
// Über die Instanz ansprechen:
$instanz -> geschlecht = "männlich";
$instanz -> name = "Waldi";
$instanz -> art = "Hund";

// Methode der Superklasse aufrufen, man beachte:
// diese gehört zur Instanz der Subklasse, obwohl sie in der Superklasse definiert wurde!!!
$ausgabe1 = $instanz -> WasBinIch();

// Methode der Subklasse aufrufen
$ausgabe2 = $instanz -> bellen();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Vererbung Teil 1: Beispiel 1</title>
</head>
<body>
<h2>Die Katze ist ein Haustier, das miauen kann</h2>
<?php
echo $ausgabe1;
echo "<br>";
echo $ausgabe2;
?>
</body>
</html>
