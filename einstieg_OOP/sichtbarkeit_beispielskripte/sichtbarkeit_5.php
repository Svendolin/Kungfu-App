<?php
require("class/SchatzkistePrivate.class.php"); // Auslagerung der Superklasse (set to private)
require("class/SchatzkisteKind2.class.php"); // Auslagerung der Subklasse (set to public)
$instanz = new SchatzkisteKind2();
// 1) Zugriff auf eine öffentliche Methode der Subklasse SchatzkisteKind2...
// 2) ...die (intern) auf eine Methode der Superklasse SchatzkistePrivate zugreift...
// 3) ...welche ihrerseits mit private definiert ist.
// 4) Das schlägt fehl! Der Notschlüssel
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
