<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Die PDO-Instanz erzeugen</title>
	<link rel="stylesheet" href="formstyles.css">
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="rotweiss">Die PDO-Instanz erzeugen</h2>
	
	<p class="explanation">Die PDO-Klasse steht überall in PHP &quot;einfach so&quot; zur Verfügung. Das heisst: es braucht <strong>keinen</strong> <code>require</code> oder <code>include</code>, um mit der Klasse arbeiten zu können.</p>

	<p class="explanation">Bevor irgend etwas läuft, muss man eine Instanz von PDO erzeugen. Mit PDO muss man <strong>zwingend - im Gegensatz zu msqli - objektorientiert arbeiten</strong>. Deshalb kommt ein Mal mehr das Schlüsselwort <code>new()</code> zum Zug:
<br /><br />
<?php
echo highlight_string('<?php
new PDO($dsn,$dbuser,$dbpw,$opts);
?>', TRUE);
?>
<br /></p>

	<p class="explanation">Falls du eine eigene Klasse schreiben möchtest, die PDO verwendet, ist es angezeigt, <strong>eine Subklasse von PDO zu entwerfen</strong>. Das Instanziieren könnte jetzt so aussehen:
<br /><br />
<?php
echo highlight_string('<?php
class mydb extends PDO {
	public function __construct() {
		// Konstruktor der PDO-Klasse (Superklasse) aufrufen
		parent::__construct($dsn, $this->dbuser, $this->dbpw, $opts);
	}
}
?>', TRUE);
?>
</p>

	<h3>Die Verbindung zur Datenbank herstellen - der erste Parameter für den PDO-Konstruktor (DSN)</h3>
	<p class="explanation">Weil man mit PDO mit verschiedenen Datenbanken kommunizieren kann, gestaltet sich das Verbinden etwas schwieriger. <strong>Jede Datenbank braucht nämlich einen spezifischen &quot;Weckruf&quot;, einen sog. <a href="http://de.wikipedia.org/wiki/Data_Source_Name" target="_blank">DSN</a></strong>. Um diese Hürde zu nehmen, braucht man eine gute Anleitung.<br>
	Der erste Parameter für den PDO-Konstruktor beschreibt also den DSN. Für mySQL-Datenbanken könnte das so aussehen:
<br /><br />
<?php
echo highlight_string('<?php
$dsn = "mysql:host=localhost;dbname=test";
?>', TRUE);
?>
<br /><br />
An dieser Stelle <strong>ein Tipp für alle Nicht-Angelsachsen</strong>, also komische Menschen, die mit UTF-8 o.ä. in Datenbanken arbeiten müssen: <strong>Gib im DSN auch gerade den charset an:</strong>
<br /><br />
<?php
echo highlight_string('<?php
$dsn = "mysql:host=localhost;dbname=test;charset=utf8";
?>', TRUE);
?>
<br /><br />
</p>

	<div class="falle">
		<p>Die Entwickler von PDO haben einen netten Stolperstein in ihre Klasse eingebaut: Wenn du &quot;localhost&quot; im DSN angibst, geht die Klasse davon aus, dass  die <strong>Standardports der Datenbank</strong> verwendet werden sollen. Hast du in deiner Entwicklungsumgebung jedoch andere Ports definiert, musst du die <strong>IP-Nummer</strong> (meistens <code>host=127.0.0.1</code>) plus den <strong>Port</strong> <code>(port=####)</code> angeben.</p>
	</div>
	
	<h3>Fehlermeldungen selber in die Hand nehmen: <code>try/catch</code></h3>
	<p class="explanation">Die Verbindungsaufnahme zur Datenbank sollte nun noch in eine Ausnahmebehandlung eingepackt werden, was zusätzliche Sicherheit schafft:
<br /><br />

<?php
echo highlight_string('<?php
try {
    parent::__construct($dsn, $this->user, $this->passwd, $options);
} 
catch (PDOException $e) {
    die("Verbindung fehlgeschlagen.");
}
?>', TRUE);
?>
<br /><br />
</p>
	
	<h3>Die PDO-Optionen für die Verbindungsaufnahme (vierter Parameter)</h3>
	<p class="explanation">Als weiteren Parameter kann man dem Konstruktor ein Array mit Optionen mitgeben. Zwei der häufigsten Optionen sind:</p>

	<ul class="explanation">
		<li>Wenn du wie hier mit try und catch (s.o.) arbeiten möchtest, ist diese Option für die Fehlerbehandlung die sinnvollste:<br />
	<code>PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION</code></li>
		<li>Mit dieser Option werden die Resultate in Form von assoziativen Arrays retour kommen. In den meisten Fällen ist das der effizienteste Weg, die Resultate in HTML auszugeben:<br />
    <code>PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC</code></li>
	</ul>

	<p class="explanation">Im Code könnte das so ausschauen:
<br /><br />
<?php
echo highlight_string('<?php
public function __construct() {
    // Array für Optionen für PDO anlegen
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    try {
		parent::__construct($dsn, $this->user, $this->passwd, $options);
	}
	catch (PDOException $e) {
		die ("Verbindung zur Datenbank fehlgeschlagen.");
	}
}
?>
', TRUE);
?>
</p>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>