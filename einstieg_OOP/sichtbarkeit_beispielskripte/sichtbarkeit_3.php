<?php
require("class/SchatzkistePrivate.class.php");
$instanz = new SchatzkistePrivate();
// Zugriff auf eine Methode, die mit private definiert ist
// Dies schlägt fehl
$ausgabe = $instanz -> zeigeCodeFuerSchatz();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Sichtbarkeit: Beispiel 3</title>
</head>
<body>
<?php
echo $ausgabe;
?>
</body>
</html>
