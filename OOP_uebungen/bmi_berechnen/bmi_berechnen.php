<?php

require("class/bmi_berechnen.class.php");

// // Gewicht in kg, diese Angaben sollen aus einem Formular kommen
// $gewicht = 75;
// // Grösse in m, auch diese Angaben sollen aus einem Formular kommen
// $groesse = 1.78;


// Aufrufen der Funktion

if(isset($_POST["go"])) {
	// Hier müsste VALIDIERT werden
	$gewicht = $_POST['gewicht'];
	$groesse = $_POST['groesse'];
	$instanz = new BMIBerechnen(); // INSTANZIERUNG ERST, WENN DAS FORMULAR ABGESCHICKT WURDE
	// Aufrufen der Methode:
	$resultat = $instanz ->rechneBMI($gewicht, $groesse);
}
else {
	//Für den ersten Durchgang
	$resultat = "Bitte Angaben machen!";
	$gewicht = "";
	$groesse = "";
}

// Code für grünes Feedbackfeld zusammensetzen
$ausgabe = "<div class=\"feedback_positiv\">\n";
$ausgabe .= "Auswertung Ihres BMI: <strong>".$resultat."</strong>";
$ausgabe .= "</div>\n";
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>BMI berechnen</title>
	<link rel="stylesheet" href="../../generalstyles.css">
</head>
<body>
	<h2>BMI berechnen</h2>
	<p class="explanation"><img src="images/BMI.jpg" width="424" height="283" alt="BMI"></p>
	<ul class="explanation">
		<li>In diesem Dokument findest du eine einfache Funktion für die Berechnung des Body-Mass-Indexes. Allgemeine Informationen zum BMI sowie die Formel habe ich von hier: <a class="externer_link" href="http://de.wikipedia.org/wiki/Body-Mass-Index" target="_blank">de.wikipedia.org/wiki/Body-Mass-Index</a></li>
		<li>Die Funktion berechnet den BMI aus zwei Variablen, welche (vorläufig) oben im Dokument definiert, bzw. &quot;hart codiert&quot; worden sind. Dies werden wir zuerst ändern. Die Funktion soll nämlich <strong>mit Usereingaben arbeiten können</strong> und somit wiederverwertbar sein.</li>
		<li>Erstelle also ein Formular zum Eingeben des Gewichtes und der Körpergrösse.</li>
		<li>Hinweis: Die Usereingaben müssen <strong>nicht validiert werden</strong>, das gehört nicht zum Ziel der Übung.</li>
		<li>Wenn die Funktion wieder lauffähig ist, packst  den Code <strong>in eine Klasse </strong>und diese in eine Klassendatei.</li>
	</ul>
<?php
echo $ausgabe;
?>
<hr>
	<form method="post" action="">
			<label for="gewicht">Gewicht in kg:</label><br>
			<input type="text" name="gewicht" id="gewicht" placeholder="Gewicht in kg (z.B. 80)" value="<?=$gewicht?>"><br>

			<label for="groesse">Grösse in Meter:</label><br>
			<input type="text" name="groesse" id="groesse" placeholder="Grösse in Meter (z.B. 1.80)" value="<?=$groesse?>"><br>

			<button type="submit" name="go">BMI berechnen</button>
	</form>
	<footer>
		<a href="../../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>
