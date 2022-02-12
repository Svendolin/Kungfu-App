<?php
/*
- Beachte die Kommentare in der Klassendatei
- Dort wird mit einer "Eigenschaft" gearbeitet
*/
require("class/QuadratZahl2.class.php"); // Den passenden Quadrahtzahlsatz verlinken
$instanz = new QuadratZahl2();
$ausgabe = $instanz -> rechne(5); // "rechne()" kümmert sich um alles
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Einfache Klassen: Beispiel 3</title>
</head>
<body>
<?php
echo $ausgabe;
?>
</body>
</html>
