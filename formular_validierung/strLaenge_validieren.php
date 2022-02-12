<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Stringlänge validieren (Required fields) - einfaches Beispiel</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="orange">Stringlänge validieren (Required fields) - einfaches Beispiel</h2>
	<ul class="explanation"> 
		<li>Voraussetzung für diesen Teil der Übungen ist das Verständnis von <a href="http://php.net/manual/de/function.strlen.php" target="_blank"><code>strlen()</code></a>.</li>
		<li>Es geht darum, obligatorische Felder (Required fields) daraufhin zu überprüfen, ob sie ausgefüllt wurden.</li>
		<li>Diese Seite ist ein Vorbereitung auf die nächste Seite mit einer Aufgabe</li>
	</ul>

<?php
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	// Desinfektion der Eingabe
	$nachnameValue = filter_var($_POST['nachname'], FILTER_SANITIZE_STRING);
	// Zeichenlänge mit strlen() zählen
	$anzZeichen = strlen($nachnameValue);
	// Ist die Eingabe gültig? 
	if ($anzZeichen > 2) {
		// ja
		echo "<div class=\"feedback_positiv\">";
		echo "Vielen Dank für Ihre Angaben, ihr Name ist gültig.";
		echo "</div>\n";
	}
	else {
		// nein
  		echo "<div class=\"feedback_negativ\">";
		echo "Bitte füllen Sie das Feld aus.";
		echo "</div>\n";
	}
}
else {
	$nachnameValue = "";
}
?>
	<form action="" method="post">
		<div>
			<label for="nachname">Nachname</label>
			<input type="text" id="nachname" name="nachname" value="<?=$nachnameValue?>">
		</div>
		<button type="submit" name="go">Validate!</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>