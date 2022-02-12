<?php
require("class/SchatzkistePrivatePlus.class.php");
$instanz = new SchatzkistePrivatePlus();
// Zugriff auf eine öffentliche Methode,
// die (intern) auf eine andere Methode der gleichen Klasse zugreift,
// welche ihrerseits mit private definiert ist
$ausgabe = $instanz -> zweiteMethode();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Sichtbarkeit: Beispiel 6</title>
</head>
<body>
<?php
echo $ausgabe;
?>
</body>
</html>
