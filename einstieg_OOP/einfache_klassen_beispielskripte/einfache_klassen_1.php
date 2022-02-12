<?php
// include bzw require der Klassendatei (somit unbedingt CLASS-ordner verbinden damit die Methoden funktionieren)
require("class/QuadratZahl1.class.php"); // Rene's Empfehlung: .class informativ nennen

/*
1) Instanziierung (QuadratZahl1 wird in die $instanz Variable geladen mit new. Wie ein SUPERHELD bekommt diese Instanz diese Spezialkraft
- (in PHP-Tutorials wird manchmal auch der Begriff "Referenzierung" gewählt)
*/
$instanz = new QuadratZahl1();

// Eine Methode "rechne" wird aufgerufen, diese enstpricht im Wesentlichen der Funktion des letzten Teils
// Aufrufen in der Instanzvariable mit Parameter 5 als Bsp
$ausgabe = $instanz -> rechne(5);
/* 
1) $ausgabe Variable definieren für das spätere Echo
2) Instanz methode ausrufen
3) Die Funktion aus dem classfile nennen = rechne() , 1:1 schreiben, sonst geht es nicht. 
4) Hier der Variable Anna eine Zahl metgeben
*/
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Einfache Klassen: Beispiel 1</title>
</head>
<body>
<?php
echo $ausgabe;
?>
</body>
</html>
