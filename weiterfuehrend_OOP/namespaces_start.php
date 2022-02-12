<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Namespaces</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="rot">Namespaces</h2>
	
	<h3>Verhinderung von Namenskollisionen - Für was braucht es Namespaces?</h3>

	<ul class="explanation">
		<li>Je umfangreicher deine PHP-Klassenbibliothek wird, desto grösser wird das Risiko, dass du oder jemand anders in deinem Entwicklerteam versehentlich einen zuvor deklarierten Klassennamen verwendet.</li>
		<li>Das Problem wird noch verschärft, wenn man versucht, Klassen von Drittanbietern hinzuzufügen: Die Wahrscheinlichkeit steigt, dass diese einen Namen verwenden, der in den eigenen Codes bereits zum Einsatz kommt.</li>
		<li>Setzt man keine Namespaces ein, braucht es deshalb lange und umständliche Klassennamen, um die Bezeichnung einzigartig zu machen.</li>
		<li>Versucht man, zwei gleiche Klassennamen (ohne namespaces) zu verwenden, bricht PHP mit einem Fehler ab (vergl. erstes Beispielscript):<br>
		<strong>Fatal error:</strong> Cannot declare class ..., because the name is already in use in ...</li>
	</ul>
	
	<div class="falle">
		<h3>Stolpersteine beim Einstieg ins Thema &quot;Namespaces&quot;</h3>
		<ul class="explanation">
			<li>Namespaces sind ein abstraktes, virtuelles Konzept, bei der Definition von Namespaces spielt es (vorerst) keine Rolle, wo im Dateisystem die Codes zuhause sind. Es kann sogar mit zwei verschiedenen Namespaces im gleichen Dokument gearbeitet werden, wovon aber abgeraten wird (vergl. zweites Beispielscript).</li>
			<li>Verwirrend ist die Tatsache, dass es in Namespaces - anlog zum Dateisystem - auch eine &quot;Verschachtelungs&quot;-Hierarchie gibt. Bei Namespaces werden zur Kennzeichnung der Hierarchiestufen <strong>Backslashes</strong> verwendet.</li>
		</ul>
	</div>
	<ul class="explanation">
		<li>Wurde die Klasse in einem Namespace (Apachenland) deklariert und ist das verarbeitende Dokument in einem anderen Namespace, wird bei der Instanziierung mit einem Präfix gearbeitet, Beispiel:<br><code>$instanz = new Apachenland\User();</code></li>
		<li>Ist es unklar, in welchem Namespace der Code sich befindet, hilft die magische Konstante <code>__namespace__</code> weiter.</li>
		<li>Leider liefert <code>__namespace__</code> im globalem Code (ohne Namespace)  einen leeren String zurück, was nicht besonders hilfreich beim Entwickeln ist.</li>
	</ul>
	<br>
	<h3>Muss ich Namespaces zwingend verwenden?</h3>
	<p class="explanation">Nein.<br>
	Für OOP-Einsteigerinnen und Einsteiger sind Namespaces ein schwierig zu verstehendes Konzept. Allerdings kann man auch, falls man noch unsicher damit ist, den <strong>eigenen</strong> Code global (also ganz ohne Namespaces) notieren und trotzdem eine Bibliothek verwenden, die mit Namespaces arbeitet. Wichtig ist einfach, dass man begreift, wie man eine Klasse im globalen Namensraum intanziieren muss, welche mit Namespace deklariert wurde.<br>
	Dieser Sachverhalt wird sich in PHP übrigens auch nicht ändern.</p>
	<hr>
	<h4>Links zu den Beispielscripts</h4>
	<ul class="explanation">
		<li><a href="namespaces_beispielskripte/gleiche_klassenamen.php">gleiche_klassenamen.php</a> (Aufruf schlägt fehl, bitte Code anschauen)</li>
		<li><a href="namespaces_beispielskripte/einstieg_namespace.php">einstieg_namespace.php</a></li>
		<li><a href="namespaces_beispielskripte/gleiche_klassenamen_namespaced.php">gleiche_klassenamen_namespaced.php</a></li>
		<li><a href="namespaces_beispielskripte/namespacing_verarbeitendes_doc.php">namespacing_verarbeitendes_doc.php</a></li>
		<li><a href="namespaces_beispielskripte/use.php">use.php</a></li>
	</ul>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>


