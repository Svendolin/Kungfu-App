<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Statische Mitglieder (static members)</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="rot">Statische Mitglieder (static members)</h2>
	
	<h3>Statische Mitglieder gehören zur Klasse selber, nicht zur Instanz</h3>

	<ul class="explanation">
		<li>Statische Variablen gehören zur Klasse und <strong>nicht</strong> zu den Instanzen einer Klasse. Deshalb werden sie oft auch als <strong>Klassenvariablen</strong> bezeichnet.</li>
		<li>Statische Methoden gehören zur Klasse und <strong>(eigentlich) nicht</strong> zu den Instanzen einer Klasse. Deshalb werden sie oft auch als <strong>Klassenmethoden</strong> bezeichnet. </li>
		<li>Wird versucht, über die Instanz auf eine <strong>statische Variable</strong> zuzugreifen (Beispiel <code>$myInstance -> $myStaticVar()</code>), wird eine Fehlermeldung ausgelöst:<br>
		&quot;<strong>Notice:</strong> Accessing static property ... as non static in ...&quot; und<br>
		&quot;<strong>Notice:</strong> Undefined property: ... in&quot;
		</li>
		<li>Wird hingegen versucht, über die Instanz auf eine <strong>statische Methode</strong> zuzugreifen (Beispiel <code>$myInstance -> myStaticMethod()</code>), wird <strong>keine</strong> Fehlermeldung (!!!) ausgelöst, was inkonsequent und unlogisch ist.<br>
		Dieser Fact ist vielen PHP-Entwicklern unbekannt, auch wenn sie schon jahrelang mit der Sprache Objekte entwickeln. Für Quereinsteiger aus anderen Programmiersprachen ist es ein Stolperstein.<br>
		Wie auch immer: Es wird nicht empfohlen, so zu vorgehen, vor allem dann nicht, wenn du in einem Team arbeitest...</li>
		<li>Innerhalb der Klasse wird nicht mit <code>$this</code>, sondern mit <strong><code>self::</code></strong> auf statische Member zugegriffen.</li>
		<li>Ausserhalb der Klasse wird für den Zugriff mit <strong>dem Namen der Klasse</strong> und Gültigkeitsbereichsoperator (::) gearbeitet, Beispiel:<br>
		<code>MyClassName::$myStaticVariable</code>.</li>
		<li>In statischen Variablen werden sehr oft (Meta-)Informationen über eine Klasse abgelegt, welche von allgemeinen Interesse sind.</li>
		<li>Statische Methoden werden häufig in sog. &quot;Utility&quot;- oder &quot;Helper&quot;-Klassen in PHP-Frameworks verwendet. Eine Utility-Klasse ist eine Klasse, die in der Regel nur statische Methoden enthält. Sie versucht, einfache, wiederkehrende Aufgaben zu lösen, zum Beispiel Datumsfunktionen, mathematische Funktionen, URL-Funktionen, etc.</li>
		<li>Aus rein technischer Sicht gibt es keine wirklichen Gründe, statische Mitglieder einzusetzen. Viele Entwickler-Gurus raten sogar grundsätzlich davon ab, statische Methoden zu verwenden. Abseits vom Philosophieren über Programmier-Logik gilt auch hier: Es ist gut zu wissen, was das Konzept dahinter ist, wenn man auf Klassen-Bibliotheken anderer aufbauen muss, die <code>static</code> verwenden.</li>
	</ul>
	
	<div class="falle">
		<p><strong>Geht in PHP 7 nicht mehr:</strong> Aufrufen einer nicht-statischen Methode als wäre sie statisch. Sauberer Programmierstil ist also gefragt.</p>

		<p>Zitat aus dem PHP-Handbuch:<br>
		<cite>&quot;Warnung: In PHP 7 ist der statische Aufruf von nicht-statischen Methoden missbilligt, und erzeugt eine Warnung der Stufe E_DEPRECATED. Die Unterstützung von statischen Aufrufen nicht-statischer Methoden kann in der Zukunft entfernt werden.&quot;</cite> (Abgerufen im März 2018)</p>
	</div>
	<hr>
	<h4>Links zu den Beispielscripts</h4>
	<ul class="explanation">
		<li><a href="statische_mitglieder_beispielskripte/statische_variablen.php">statische_variablen.php</a></li>
		<li><a href="statische_mitglieder_beispielskripte/statische_methoden.php">statische_methoden.php</a></li>
		<li><a href="statische_mitglieder_beispielskripte/statischer_methodenaufruf_veraltet.php">statischer_methodenaufruf_veraltet.php</a> (Aufruf erzeugt in PHP 7 eine Warnung, bitte Code anschauen. S. auch die Hinweise oben auf dieser Seite)</li>
	</ul>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>


