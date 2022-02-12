<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Einfache Klassen</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="schwarz">Einfache Klassen</h2>
	<ul class="explanation">
		<li>Ziel dieses Teils ist es, den Einstieg ins Thema &quot;OOP&quot; zu schaffen.</li>
		<li>In diesem Tutorial wird der Code aller Klassen in einem <strong>eigenem</strong> Dokument definiert.</li>
<li>Das ist zwar, im Gegensatz zu anderen Programmiersprachen, nicht unbedingt notwendig, aber trotzdem <strong>sehr empfehlenswert</strong>.</li>
	<li>Der Dateinamen einer Klassendatei wird oft so gekennzeichnet: &quot;bla.class.php&quot;, dafür gibt es aber <strong>keinerlei verpflichtende Regeln in PHP</strong> (im Gegensatz zu anderen Sprachen)</li>
<li>Oft werden alle Klassen eines Projektes in einem dafür vorgesehenen Verzeichnis (z.B. &quot;class&quot;) abgelegt.</li>
<li><strong>8ung:</strong> die Dateiendung &quot;.class&quot; - oder &quot;.m&quot; - oder &quot;.h&quot; - o.ä. - ist in PHP nicht gestattet.</li>
	</ul>
	
	<h3>Instanzieren</h3>
	<ul class="explanation">
		<li>Jetzt kommt ein Schritt hinzu, welcher beim Aufruf von Funktionen nicht benötigt wird: das <strong>Instanzieren</strong><br>
		<?php
echo highlight_string('<?php
$instanz = new QuadratZahl1();
?>', TRUE);
?>
		
		</li>
		<li>Man könnte sich das so vorstellen: Vom Bauplan (Klasse) wird mit <code>new()</code> eine lauffähige, eigenständige Kopie (Instanz) erstellt und in einer Variable abgelegt.<br>
		Diese Variable beinhaltet jetzt sozusagen ein Stück &quot;Minisoftware&quot;, die eine eigenständige Aufgabe lösen kann. Sie hat den Datentyp <code>object</code>.</li>
		<li>Das Aufrufen der Methode, also der Funktion in der Klasse, passiert so:<br>
<?php
echo highlight_string('<?php
// Eine Methode der Instanz wird aufgerufen
$ausgabe = $instanz -> rechne(5);
?>', TRUE);
?>
</li>
	</ul>
	
	<h3>Versuche dir zu merken:</h3>
	<ul class="explanation">
		<li>Eine Variable in einer Klasse heisst <strong>Eigenschaft</strong> (engl. property), manchmal wird auch der Begriff &quot;Attribut&quot; verwendet.</li>
		<li>Eine Funktion in einer Klasse heisst <strong>Methode</strong> (engl. method), manchmal wird auch der Begriff &quot;Prozedur&quot; verwendet (bei PHP eher selten).</li>
		<li>Eigenschaften und Methoden sind die <strong>Mitglieder</strong> (engl. member) eines Objektes.</li>
	</ul>
	<hr>
	<h4>Links zu den Beispielscripts</h4>
	<ul class="explanation">
		<li><a href="einfache_klassen_beispielskripte/einfache_klassen_1.php">einfache_klassen_1.php</a></li>
		<li><a href="einfache_klassen_beispielskripte/einfache_klassen_2.php">einfache_klassen_2.php</a></li>
		<li><a href="einfache_klassen_beispielskripte/einfache_klassen_3.php">einfache_klassen_3.php</a></li>
		<li><a href="einfache_klassen_beispielskripte/einfache_klassen_4.php">einfache_klassen_4.php</a></li>
	</ul>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>
