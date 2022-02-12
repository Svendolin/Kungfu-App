<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Vererbung (Inheritance) - Teil 3: Override</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="rot">Vererbung (Inheritance) - Teil 3: Override</h2>
	
	<h3>Der Spezialfall des Spezialfalles. Oder: Bakterien passen nicht in's Haustierschema</h3>
	
	<p class="explanation"><img src="images/bakterie.jpg" alt="Bakterien" width="300" height="202"></p>
	<ul class="explanation">
		<li>Denken wir unser digitales Haustier-Szenario (&gt; vergl. &quot;Vererbung (Inheritance) - Teil 1: Einstieg&quot;) noch etwas weiter. Mit den bisherigen Subklassen können wir viele Fälle von denkbaren Haustieren abdecken: Hühner, Kühe, Meerschweinchen, Schlangen, Schildkröten, etc.</li>
		<li>Was aber ist, wenn wir eine Klasse für eine Bakterie schreiben möchten, denn solche kommen ja auch in jedem Haushalt vor? Bakterien sind geschlechtlos und keinem Menschen kommt es in den Sinn, ein solches Lebewesen zu taufen. Die Methode der Superklasse <code>WasBinIch()</code> wäre hier <strong>somit sinnlos</strong>.</li>
		<li>Schreiben wir also eine Subklasse <code>Bakterie</code>, und aus dem oben erwähnten Grund überschreiben wir hier die Methode <code>WasBinIch()</code> der Superklasse, wir geben der Methode sozusagen <strong>einen neuen Zweck, der nur für die Bakterie angewendet werden soll</strong>.</li>
	</ul>
	<div class="falle">
		<p>Overrides kann man in PHP ganz leicht notieren. Es genügt bereits, dass die Methode der Subklasse <strong>den gleichen Namen und die gleichen Parameter</strong> wie die zu überschreibende Methode der Superklasse hat. In anderen Programmiersprachen müsste man die überschreibende Methode explizit mit dem Schlüsselwort <code>override</code> kennzeichnen.</p>
		<p>Weil dies so einfach geht, <strong>sind Missverständnisse jedoch vorprogrammiert!</strong> Verzichte wenn möglich auf dieses Konzept, oder kommentiere aus diesem Grund overrides gut, falls du sie wirklich brauchst!</p>
	</div>

	<hr>
	<h4>Links zu den Beispielscripts</h4>
	<ul class="explanation">
		<li><a href="override_beispielskripte/override.php">override.php</a></li>
	</ul>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>


