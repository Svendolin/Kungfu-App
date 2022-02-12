<?php
require("class/SchatzkistePublic.class.php");
$instanz = new SchatzkistePublic();
// Zugriff auf eine Methode, die mit public definiert ist
$ausgabe = $instanz -> zeigeCodeFuerSchatz();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Sichtbarkeit: Beispiel 1</title>
</head>
<body>
<?php
echo $ausgabe;
?>
</body>
</html>
