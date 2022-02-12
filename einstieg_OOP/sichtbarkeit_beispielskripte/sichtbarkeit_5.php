<?php
require("class/SchatzkistePrivate.class.php");
require("class/SchatzkisteKind2.class.php");
$instanz = new SchatzkisteKind2();
// Zugriff auf eine öffentliche Methode der Subklasse,
// die (intern) auf eine Methode der Superklasse zugreift,
// welche ihrerseits mit private definiert ist.
// Das schlägt fehl
$ausgabe = $instanz -> KindMethode();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Sichtbarkeit: Beispiel 5</title>
</head>
<body>
<?php
echo $ausgabe;
?>
</body>
</html>
