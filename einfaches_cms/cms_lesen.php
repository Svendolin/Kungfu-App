<?php
// Funktion: Lesen eines Textfiles
function readContent($contentFile) {
	// Der Content des Textfiles wird mit "file()" in ein Array eingelesen
	$arr = file($contentFile); // mit file() wird das angegebene File in einem array Zeile für Zeile gespeichert in ein Array
	$content = "";
	foreach ($arr as $out) {
		$content .= $out; // hier werden alle Zeilen aneinandergehängt per Loop und in die Variable $content gespeichert
	}
	return $content;
}
$ausgabe = readContent("content.txt"); // Textfile wird gelesen

?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Einfaches CMS: lesen</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="blau">Einfaches CMS: lesen</h2>
	<ul class="explanation">
		<li>Kernstück des bestehenden Codes ist <code>file()</code>. Falls du nicht weisst, was das macht, lies bitte den <a href="http://php.net/manual/de/function.file.php" target="_blank">entsprechen Eintrag im php-Handbuch</a></li>
		<li><strong>Augabe:</strong> Es soll - bevor der Leseprozess ausgeführt wird - gecheckt werden, ob das Textdokument <strong>überhaupt vorhanden und beschreibbar</strong> ist.</li>
		Falls diese Checks nicht erfolgreich verlaufen, soll ein entsprechendes Feedback ausgegeben werden.<br>
		Du brauchst dafür <a href="http://php.net/manual/de/function.is-file.php" target="_blank"><code>is_file()</code></a> und <a href="http://php.net/manual/de/function.is-writable.php" target="_blank"><code>is_writable()</code></a></li>
	</ul>
	<hr>
	<p class="explanation"><a href="cms_schreiben.php">&gt; Zur &quot;Schreiben&quot;-Seite</a></p>
	<hr>
	<h3>Ausgabe (Inhalt aus dem Text-File)</h3>
	<div style="background-color: ivory; padding: 25px;">
<?php
echo $ausgabe;
?>	
	</div>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>
