<?php
$feedback = ""; // Feedback aufnehmen
$goon = true;		// Status = true? Weiterarbeiten. Status = false? Stopp: Da die Funktion zwei Probleme aufzeigt, müssen beide als "false" definiert werden



function validateStrLength($str, $field, $min, $max) { // Briefkastenvariablen
	// Durch "global" sind diese Variablen innerhalb der function() sichtbar in php. JS ist da toleratner
	global $feedback;
	global $goon;
	// Notieren hier die Funktion, um beide Felder zu Prüfen, ob da die Eingabe zu kurz oder zu lang ist:
	$anzZeichen = strlen($str); 		// 1) Zeichenlänge $anzZeichen prüfen mit strlen() - Erste Variable $str überprüfen
	if ($anzZeichen < $min) {				// 2) Erste Sizuation: Zuwenig Zeichen eingegeben
		$feedback = "Zeichenlänge zu kurz! ";
		$goon = false;
	} elseif ($anzZeichen > $max) { //4) Zweite Situatuion: Zuviele Zeichen eingegeben
		$feedback = "Zeichenlänge zu lang!";
		$goon = false;
	}
}
?>



<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Stringlänge validieren (Required fields) - Übung für Chuck-Norris-Fans</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="orange">Stringlänge validieren (Required fields) - Übung für Chuck-Norris-Fans</h2>
	<p><img src="../img/chuck_norris.gif" width="250" height="170" alt="chuck_norris"></p>
	<ul class="explanation"> 
		<li>Auf dieser Seite hat es nun zwei Felder, die es zu überprüfen gilt</li>
		<li><strong>Aufgabe:</strong> Schreibe eine Funktion, die für die Validierung von <strong>beiden</strong> Eingaben verwendet werden kann.</li>
		<li>Zusätzlich soll es möglich sein, eine Minimal- und Maximalzahl für die Länge des Eingabe-Strings zu definieren.</li>
		<li>Der User soll bei nicht erfolgreicher Validation wissen, was sein Fehler war (Ausgabe eines Feedbacks).</li>
		<li>Ich habe den Code schon etwas vorbereitet ...</li>
		<li>Eine mögliche Lösung findest du auf der nächsten Seite.</li>
	</ul>

<?php
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	// Desinfektion der Eingaben
	$vornameValue = filter_var($_POST['vorname'], FILTER_SANITIZE_STRING);
	$nachnameValue = filter_var($_POST['nachname'], FILTER_SANITIZE_STRING);
	// Felder validieren (Funktionsaufruf)
	validateStrLength($vornameValue,"Vorname",3,30);   // Quasi: $str, $field, $min, $max
	validateStrLength($nachnameValue,"Nachname",2,40); // Quasi: $str, $field, $min, $max
	
	// Sind die Eingaben gültig (die Überprüfung soll in der Funktion erfolgen)? 
	if ($goon) {
		// ja (Wert entspricht in dieser Zeichenspanne: true)
		echo "<div class=\"feedback_positiv\">";
		echo "Vielen Dank für Ihre Angaben, ihre Namen sind gültig.";
		echo "</div>\n";
	}
	else {
		// nein (Wert entspricht NICHT in dieser Zeichenspanne: false)
  		echo "<div class=\"feedback_negativ\">";
		echo $feedback;
		echo "</div>\n";
	}
}
else {
	$vornameValue = "";
	$nachnameValue = "";
}
?>
	<form action="" method="post">
		<div>
			<label for="vorname">Vorname</label>
			<input type="text" id="vorname" name="vorname" value="<?=$vornameValue?>">
		</div>
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