<?php
/*
- Beachte die Kommentare in der Klassendatei
*/
require("class/QuadratZahl2.class.php");
$instanz = new QuadratZahl2();
/* 
- Hier wird auf Eigenschaft "AntwortSatz" von aussen gelesen
*/

/* INFO:
$ausgabe wir somit der Ausrufer später. 
Da wir "public" in QuadratZahl2 geschrieben haben, wollen wir als Instanz den String ausgeben und nicht die Methode mit rechne()
Daruch erhalten wir bei Zeile 26 nen String und nicht die Zahl 
*/
$ausgabe = $instanz -> AntwortSatz; 
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Einfache Klassen: Beispiel 4</title>
</head>
<body>
<?php
echo $ausgabe; // "Das Resultat ist:"
?>
</body>
</html>
