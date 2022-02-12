<?php

// Dies ist das verarbeitende Dokument und bauen einen Konstruktor ein:

require("class/lovecalculator.class.php");
// NEU: Instanzierung der Klasse:
$instanz = new LoveCalculator();

// Checke, ob der Submit-Button geklickt wurde AFFENSCHWANZDURCHGANG
if (isset($_POST['go'])) {
	// Hier müsste man dann in der realen Welt desinfizieren...
	$name1Value = $_POST['name1'];
	$name2Value = $_POST['name2'];
	
	// Sind beide Formular-Felder ausgefüllt ...
	if ($name1Value == "" || $name2Value == "") {
		// ... Ja: Setze Code für negatives Feedback zusammen
		$ausgabe = "<div class=\"feedback_negativ\">";
		$ausgabe .= "Bitte fülle beide Namensfelder aus!";
		$ausgabe .= "</div>\n";
	}
	else {
		// ... Nein: Setze Code für positives Feedback zusammen
		$ausgabe = "<div class=\"feedback_positiv\" style=\"font-size: 48px; line-height: 50px; font-weight: bold; text-align: center;\">";
		$ausgabe .= "Liebespotential: ";
		// NEU: Methode aufrufen-> und ist keine Funktion mehr
		$ausgabe .= $instanz -> lovecalc($name1Value, $name2Value)."%";
		$ausgabe .= "</div>\n";
	}
}
else {
	// Setze die Variablen, damit beim ersten Affenschwanz-Durchgang kein Fehler generiert wird
	$name1Value = "";
	$name2Value = "";
	$ausgabe = "";
}
?>



<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Love Calculator</title>
	<link rel="stylesheet" href="../../generalstyles.css">
</head>
<body>
	<h2>Love Calculator</h2>
	<p class="explanation"><img src="images/love_calculator.jpg" width="744" height="310" alt="love_calculator"></p>
	<ul class="explanation">
		<li>In diesem Dokument findest du eine Funktion zu Bestimmung des &quot;Liebespotentials&quot; zweier Namen. Das &quot;Innenleben&quot; dieser Funktion musst du nicht begreifen, im Gegenteil, denn der Wahrheitsgehalt einer solchen Berechnung ist ja nicht wirklich erwiesen. Ich würde jedenfalls meine Partnerin nicht so auswählen.</li>
		<li>Auch das Formular soll uns nicht interessieren und soll so belassen werden, wie es ist.</li>
		<li>Versuche jedoch zu verstehen, wie die Daten (Namen) in die Funktion hineingelangen, wie und wann die Funktion aufgerufen wird und wie das Resultat in das Dokument ausgeben wird.</li>
		<li><strong>Transferiere den Code der Funktion in eine lauffähige Klasse.</strong> Diese sollte wie immer in einem eigenen Dokument festgehalten werden.</li>
	</ul>
<?php
// Ausgabe des Feedbacks
echo $ausgabe;
?>
	<form method="post" action="lovecalculator.php">
		<label for="name1">Erster Name: </label>
		<input type="text" size="25" name="name1" id="name1" value="<?=$name1Value?>">

		<label for="name2">Zweiter Name: </label>
		<input type="text" size="25" name="name2" id="name2" value="<?=$name2Value?>">

		<br>
		<input type="submit" value="Calculate Love" name="go" id="go">
	</form>
	<hr>

	<footer>
		<a href="../../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>
