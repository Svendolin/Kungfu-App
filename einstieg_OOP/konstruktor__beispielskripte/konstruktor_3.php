<?php
require("class/Kreisberechnung.class.php");
/*
- Die Konstruktormethode wird mit einem Parameter aufgerufen (Kreisradius)
*/
$instanz = new Kreisberechnung(5);
// Lesen der Eigenschaften
$ausgabe1 = $instanz -> flaeche;
$ausgabe2 = $instanz -> umfang;
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Die Konstruktormethode: Beispiel 3</title>
</head>
<body>
<?php
echo $ausgabe1;
echo "<br>";
echo $ausgabe2;
?>
</body>
</html>
