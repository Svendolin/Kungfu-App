<?php
/*
- Die Funktionsdefinition ist losgelöst von der HTML-Struktur, sie steht ganz oben im Dokument (A)
- Die Funktion arbeitet nicht mehr mit echos, sondern mit einem return (B)
- Die Funktion ist  wiederverwendbar für das Berechnen beliebige Quadrat-Zahlen, 
denn sie wartet auf einen Parameter zum Verarbeiten
*/

function quadrat_zahl($anna) {
	$resultat = $anna * $anna;
	return $resultat; // (A)
}

$ausgabe = quadrat_zahl(2); // Anna ist somit 2, 2x2 das Resultat und die Ausgabe wird dann als Echo ausgegeben! = TOP :D
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Funktionen: Beispiel 2</title>
</head>
<body>
<?php
echo $ausgabe; // Echo wird hier gegeben
?>
</body>
</html>
