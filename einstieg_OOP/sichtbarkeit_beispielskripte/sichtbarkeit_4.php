<?php
require("class/SchatzkisteProtected.class.php");
require("class/SchatzkisteKind.class.php");
$instanz = new SchatzkisteKind();
/* Zugriff auf eine öffentliche Methode der SUBKLASSE,
   die (intern) auf eine Methode der Superklasse zugreift,
   welche ihrerseits mit protected definiert ist:
	 Sprich: Superklasse verschliesst die Tür, die Subklasse ist unser Notschlüssel! */
$ausgabe = $instanz -> KindMethode();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Sichtbarkeit: Beispiel 4</title>
</head>
<body>
<?php
echo $ausgabe;
?>
</body>
</html>
