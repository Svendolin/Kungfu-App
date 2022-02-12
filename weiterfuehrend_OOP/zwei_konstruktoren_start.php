<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Vererbung (Inheritance) - Teil 2: Zwei Konstruktoren</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="rot">Vererbung (Inheritance) - Teil 2: Zwei Konstruktoren</h2>
	
	<h3>Instanziieren von vererbten Klassen: Was wird wann abgearbeitet?</h3>
	<p class="explanation" style="padding-left: 50px;"><img src="images/elephpant_ani.gif" width="65" height="40" alt="elephpant_ani"></p>
	<ul class="explanation">
		<li>An Konstruktormethoden hast du <a href="../einstieg_OOP/konstruktor_start.php">hier</a> bereits geschnuppert und auch das Prinzip der Vererbung hast du <a href="../einstieg_OOP/vererbung1_start.php">hier</a> schon kennengelernt.</li>
		<li>Beim Einstieg in die Vererbung haben wir aber noch nicht besprochen, was passiert, wenn die Subklasse und/oder die Superklasse Konstruktormethoden aufweisen.</li>
		<li>Da ja in PHP das Notieren von Konstruktor-Methoden nicht obligatorisch ist, ist der Sachverhalt dieses Kapitels leider etwas schwierig zu verstehen.</li>
		<li>Alle denkbaren Kombinationen findest du in den Beispielscripts (s. Links unten).</li>
	</ul>
	<br>
	<table class="bordered explanation">
		<tr>
			<td></td>
			<td style="text-align: center;">Konstruktor</td>
			<td style="text-align: center;">Konstruktor</td>
			<td style="text-align: center;">Konstruktor</td>
			<td style="text-align: center;">Konstruktor mit Trickli</td>
		</tr>
		<tr>
			<td>Superklasse</td>
			<td style="text-align: center;">nein</td>
			<td style="text-align: center;">ja</td>
			<td style="text-align: center;">ja</td>
			<td style="text-align: center;">ja</td>
		</tr>
		<tr>
			<td>Subklasse</td>
			<td style="text-align: center;">ja</td>
			<td style="text-align: center;">nein</td>
			<td style="text-align: center;">ja</td>
			<td style="text-align: center;">ja</td>
		</tr>
		<tr>
			<td>Beispielscripts</td>
			<td style="text-align: center;"><a href="zwei_konstruktoren_beispielskripte/variante_1.php">variante_1.php</a></td>
			<td style="text-align: center;"><a href="zwei_konstruktoren_beispielskripte/variante_2.php">variante_2.php</a></td>
			<td style="text-align: center;"><a href="zwei_konstruktoren_beispielskripte/variante_3.php">variante_3.php</a></td>
			<td style="text-align: center;"><a href="zwei_konstruktoren_beispielskripte/variante_4.php">variante_4.php</a></td>
		</tr>
	</table>
	<hr>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>


