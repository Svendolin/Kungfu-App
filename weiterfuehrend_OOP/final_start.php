<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Vererbung (Inheritance) - Teil 4: Final</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="rot">Vererbung (Inheritance) - Teil 4: Final</h2>
	
	<h3>final heisst endgültig</h3>
	
	<div class="falle">
		<p>Das Schlüsselwort <code>final</code> kann entweder auf eine ganze Klasse angewendet werden <strong>oder</strong> auf eine Methode!<br>
		Es kommt also darauf an, wo es notiert wird: Vor dem Klassennamen oder vor einem Methodennamen.</p>
	</div>
	
	<ul class="explanation">
		<li><code>final</code> wirst du vermutlich erst dann in deinen eigenen Codes einsetzen, wenn du schon etwas Übung mit der OOP hast.</li>
		<li>Trotzdem lohnt es sich, schon in einem frühen OOP-Karriere-Stadium zu wissen, was <code>final</code> bewirkt: Falls du nämlich beginnst, mit Hilfe eines Frameworks zu programmieren, wirst du bald merken, dass sich nicht alles vererben oder überschreiben lässt, was an Objekten oder Methoden im Framework vorhanden ist.</li>
		<li>Wird <strong>eine Klasse</strong> mit <code>final</code> deklariert, kann diese grundsätzlich (also als Ganzes) nicht mehr erweitert werden. PHP bricht ab mit<br>
		&quot;<strong>Fatal error:</strong> Class ... may not inherit from final class ...&quot; </li>
		<li>Wird <strong>eine Methode</strong> mit <code>final</code> deklariert, wird diese vor einem override geschützt. PHP bricht ab mit<br>
		&quot;<strong>Fatal error:</strong> Cannot override final method ... in ...&quot;</li>
		<li>Eigenschaften können nicht als <code>final</code> deklariert werden.</li>
	</ul>


	<hr>
	<h4>Links zu den Beispielscripts</h4>
	<ul class="explanation">
		<li><a href="final_beispielskripte/finale_klassen.php">finale_klassen.php</a> (Aufruf schlägt fehl, bitte Code anschauen)</li>
		<li><a href="final_beispielskripte/finale_methoden.php">finale_methoden.php</a> (Aufruf schlägt fehl, bitte Code anschauen)</li>
	</ul>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>


