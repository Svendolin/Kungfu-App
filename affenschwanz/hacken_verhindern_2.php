<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Hacken verhindern 2: einfache aber effiziente Massnahme</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="gelborange">Hacken verhindern 2: eine einfache aber effiziente Massnahme</h2>
	<ul class="explanation">
		<li>PHP stellt praktische Hilfen, sog. Filter, zur Verfügung, um Hackern das Leben schwer zu machen. Hier wird mit <code>FILTER_SANITIZE_STRING</code> gearbeitet (vergl. Code).</li>
		<li><a href="https://www.w3schools.com/php/filter_sanitize_string.asp" target="_blank"><code>FILTER_SANITIZE_STRING</code></a> bei w3schools</li>
		<li>Schreibe einen HTML-Tag in das Feld &quot;Username&quot; ein und verschicke das Formular: <strong>Was passiert nun bei der Ausgabe des Wertes?</strong></li>
	</ul>
<?php
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	// ja
	echo "<div class=\"feedback_positiv\">";
	echo "Das Formular wurde verschickt.<br>";
	// Hier wird die Usereingabe zuerst gefiltert, bevor sie auf der Website ausgegeben wird.
	echo "Hallo ".filter_var($_POST['username'], FILTER_SANITIZE_STRING); // filter_var($_POST['username'], FILTER_SANITIZE_STRING); sorgt dafür, dass kein HTML Code gelesen werden kann
	echo "</div>\n";
}
?>

	<form action="hacken_verhindern_2.php" method="post">
		<div>
			<p class="explanation">Schreibe einen HTML-Tag in das Feld &quot;Username&quot; ein und verschicke das Formular:</p>
			
			<label for="username">Username</label>
			<input type="text" id="username" name="username">
		</div>
		<div>
			<label for="passwort">Passwort</label>
			<input type="password" id="passwort" name="passwort">
		</div>
		<button type="submit" name="go">Log in</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>
