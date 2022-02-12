<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Funktionen: Beispiel 1</title>
</head>
<body>
<?php
/* 
- Objekt bestehen aus Funktionen: wichtig für später
- Die Funktionsdefinition steht im body
- Sie arbeitet mit echos
- Sie ist so nicht wiederverwendbar, es muss in die Funktion gecodet werden,
falls mit einer anderen Zahl gerechnet werden soll
*/

// Funktionsdefinition ("SCHLÄFER", der gewekt werden soll)
function quadrat_zahl() {
	$zahl = 6;
	$resultat = $zahl * $zahl;
	echo $resultat; // Nicht schön, Funktionen sollten eher mit "return" etwas ausgeben statt direkt echos
}
// Funktionsaufruf ("WECKER", welcher eben diese Funktion ausruft)
quadrat_zahl();
?>
</body>
</html>
