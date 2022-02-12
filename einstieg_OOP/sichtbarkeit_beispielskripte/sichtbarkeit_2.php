<?php
require("class/SchatzkisteProtected.class.php");
$instanz = new SchatzkisteProtected();
// Zugriff auf eine Methode, die mit protected definiert ist
// Dies schlägt fehl
$ausgabe = $instanz -> zeigeCodeFuerSchatz();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Sichtbarkeit: Beispiel 2</title>
</head>
<body>
<?php
echo $ausgabe;
?>
</body>
</html>
