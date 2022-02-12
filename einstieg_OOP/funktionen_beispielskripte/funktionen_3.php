<?php
/*
- Noch besser: Die Funktionsdefinition ist einer externen Datei abgelegt mit INC
*/

// include der Funktiondefinition
require("inc/func_quadrat_zahl.inc.php");

$ausgabe = quadrat_zahl(2);
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Funktionen: Beispiel 3</title>
</head>
<body>
<?php
echo $ausgabe;
?>
</body>
</html>
