<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Mit regulären Ausdrücken validieren - Beispiel PLZ</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="orange">Mit regulären Ausdrücken validieren - Beispiel PLZ</h2>
	<ul class="explanation"> 
		<li>Voraussetzung für diesen Teil der Übungen ist das Verständnis von <a href="http://php.net/manual/de/function.preg-match.php" target="_blank"><code>preg_match()</code></a>.</li>
		<li>Der reguläre Ausdruck für das Testen der PLZ ist sehr generell verfasst (s. Code).</li>
	</ul>

<?php
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	// Desinfektion der Eingabe
	$plzValue = filter_var($_POST['plz'], FILTER_SANITIZE_STRING);
	// Ist die Angabe gültig?


	/* Übersetzung Suchmuster:
	- Die erste Ziffer muss ein Zahl von 1 bis 9 sein
	- Darauf folgen 3 Ziffern mit irgendeiner Zahl
	*/


	// $suchmuster = '/^[1-9]{1}[0-9]{3}$/'; (Allgemeines Suchmuster)
	$suchmuster = '/^([1-468][0-9]|[57][0-7]|9[0-6])[0-9]{2}$/';  // (Schwizer PLZ Suchmuster https://jonaswitmer.ch/projekte/18-regex-fuer-schweizer-postleitzahlen-und-telefonnummern)
	if (preg_match($suchmuster, $plzValue)) { // Erster Parameter
		// ja
		echo "<div class=\"feedback_positiv\">";
		echo "Die PLZ ist gültig.";
		echo "</div>\n";
	}
	else {
		// nein
  		echo "<div class=\"feedback_negativ\">";
		echo "Die PLZ ist ungültig.";
		echo "</div>\n";
	}
}
else {
	$plzValue = "";
}
?>
	<form action="" method="post">
		<div>
			<label for="ort">PLZ</label>
			<input type="text" id="ort" name="plz" value="<?=$plzValue?>">
			<p>Bitte vierstellige Schweizer Postleitzahl eingeben!</p>
		</div>
		<button type="submit" name="go">Validate!</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>