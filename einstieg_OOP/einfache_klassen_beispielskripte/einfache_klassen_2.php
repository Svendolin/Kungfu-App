<?php
// include der Klassendatei
require("class/QuadratZahl1.class.php");

/*
MEHRMALIGES EINSETZEN DER KLASSEN: MERHERE INSTANZEN bedeuten auch MEHRERE AUSGABEN mit dem gleichen PLAN
Klassen können, genau so wie Funktionen, mehrmals eingesetzt werden
In der PHP-Welt ist das zwar eher selten, aber natürlich durchaus möglich
Hier wird mit drei Instanzen gearbeitet.
*/
$instanz1 = new QuadratZahl1();
$ausgabe1 = $instanz1 -> rechne(5);

$instanz2 = new QuadratZahl1();
$ausgabe2 = $instanz2 -> rechne(8);

$instanz3 = new QuadratZahl1();
$ausgabe3 = $instanz3 -> rechne(15);

// Hinweis: Dieser Code ist (abgesehen von didaktischen Gründen) eigentlich sinnlos. Weisst du, warum?
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Einfache Klassen: Beispiel 2</title>
</head>
<body>
<?php
echo "Erste Ausgabe: ".$ausgabe1."<br>";
echo "Zweite Ausgabe: ".$ausgabe2."<br>";
echo "Dritte Ausgabe: ".$ausgabe3;
?>
</body>
</html>
