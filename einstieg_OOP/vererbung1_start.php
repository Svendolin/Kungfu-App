<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Vererbung (Inheritance) - Teil 1</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="schwarz">Vererbung (Inheritance) - Teil 1: Einstieg</h2>
	<h3>Von Super- und Subklassen</h3>
	<ul class="explanation">
		<li>Ein wichtiger Aspekt in der OOP: Klassen kann man in <strong>Super- und Subklassen</strong> einteilen, Klassen also, die eine Art hierarchische Verwandtschaftsbeziehung zu einander unterhalten.</li>
		<li>Ziel einer solchen Aufteilung ist es, den Code für Objekte, die eine ähnliche Funktionalität haben sollen, möglichst logisch einzuteilen. Innerhalb der Superklasse wird versucht, alle Methoden zu entwerfen, die zu der <strong>allgemeinen Lösung einer Fragestellung</strong> beitragen, während in der Subklasse <strong>die Spezialfälle</strong> des Objektes angegangen werden.</li>
		<li>Das Konzept der Vererbung ist zu Beginn Recht schwierig zu verstehen.</li>
	</ul>
	
	<h3>Die &quot;ist ein&quot;-Beziehung</h3>
	<p class="explanation">Die Verwandschaftsbeziehung zwischen Superklasse und deren Subklassen wird auch als <strong>&quot;ist ein&quot;-Beziehung</strong> bezeichnet. Damit soll verdeutlicht werden, dass Subklassen &quot;Kinder&quot; der Superklasse sind und von dieser gewisse Dinge erben.<br>
	&quot;Ist ein&quot;-Beziehungen gibt es ja auch im realen Leben, das hilft einem zu verstehen, was das Prinzip dieser Aufteilung beabsichtigt.</p>

	<h3>Das Schlüsselwort <code>extends</code></h3>
	<p class="explanation">Wenn du eine Subklasse definierst, musst du mit <code>extends</code> notieren, welche Superklasse erweitert wird:<br>
	<code>class MeineSubklasse <em>extends</em> MeineSuperklasse {...}</code><br>
	Beachte, dass eine Superklasse <strong>mehrere Subklassen</strong> unter sich haben kann...</p>

	<h3>Synonyme für die Begriffe &quot;Superklasse&quot; und &quot;Subklasse&quot;</h3>
	<p class="explanation">Das Prinzip der Vererbung gibt es in praktisch allen OOP-Programmiersprachen. Deshalb haben sich leider verschiedene Begriffe für die gleichen Sachverhalte etabliert. Ich versuche deshalb, hier verschiedenen Synonyme aufzulisten, wobei sich noch weitere Begriffe finden lassen:</p>
	
	<p class="explanation"><strong>Superklasse</strong> = Vererbende Klasse = Elternklasse = Mutterklasse = übergeordnete Klasse = Basisklasse = Oberklasse</p>
	<p class="explanation"><strong>Subklasse</strong> = Erbende Klasse = Kindklasse = untergeordnete Klasse = abgeleitete Klasse = Unterklasse</p>

	<hr>
	<h4>Links zu den Beispielscripts</h4>
	<ul class="explanation">
		<li><a href="vererbung1_beispielskripte/vererbung1_1.php">vererbung1_1.php</a></li>
		<li><a href="vererbung1_beispielskripte/vererbung1_2.php">vererbung1_2.php</a> (Aufgabe)</li>
	</ul>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>


