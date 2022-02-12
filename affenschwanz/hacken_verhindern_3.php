
<?php
// NEU: Hier machen wir eine Sanitize Funktion, die für alle Values auf einmal gelten, nicht wie vorher einzeln nur auf den Vornamen:
// Sanitize Funktion = Funktion zum desinfizieren der User-Eingaben. Funktionen sind "SChläfer". Wir müssen sie "aufrufen", das geschiet mit dem Namen. Hier "desinfizieren" und auf Zeile 34 bis 36 die Namen rufen!
function desinfizieren($str) { // () = Quasi ein Briefkasten, den wir mit einer auszuführenden Variable benennen
	// PHP-Filter wird eingesetzt
	$newStr = filter_var($str, FILTER_SANITIZE_STRING); // Statt wie zuvor ($_POST['nachname']); nach dem filter_var erwähnen wir eine zuvor definierte Variable $str, die für alles gilt und der desinfizierer FILTER_SANITIZE_STRING
	$trimmedStr = trim($newStr); // trim = Nimmt die Leerschläge vorne und hinten weg, falls der user schludrig ist oder mit Leerschlag schummeln möchte, um ein Feld zu füllen
	return $trimmedStr; // Aufrufende Funktion zurückführen. (Resultat kommt retour)
	// Strip tags sind dann 
}
?>


<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Hacken verhindern 3: Eine Funktion zum Desinfizieren</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="gelborange">Hacken verhindern 3: Eine Funktion zum Desinfizieren der Usereingaben</h2>
	<ul class="explanation">
		<li><strong>Hinweis:</strong> Der Inhalt dieser Seite entspricht im Wesentlichen der Seite &quot;Usereingaben erhalten&quot;.</li>
		<li><strong>Aufgabe:</strong> Füge eine Funktion hinzu, die alle Usereingaben &quot;desinfiziert&quot;, bevor diese weiter verarbeitet werden (vergl. letzte Seite).</li>
		<li>Die Funktion soll zusätzlich mit <a href="http://php.net/manual/de/function.trim.php" target="_blank"><code>trim()</code></a> die Eingabe &quot;putzen&quot;. Dies ist aus verschiedenen Gründen extrem sinnvoll.</li>
	</ul>
<?php
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	// ja
	echo "<div class=\"feedback_positiv\">";
	echo "Das Formular wurde verschickt";
	echo "</div>\n";
	// Füge hier deine Funktionsaufrufe hinzu (heikle stelle, somit müssen wir desinfizieren)
	$vornameValue = desinfizieren($_POST['vorname']);
	$nachnameValue = desinfizieren($_POST['nachname']);
	$bemerkungenValue = desinfizieren($_POST['bemerkungen']);
}
else {
	// nein, setzte die Variablen leer, damit beim ersten Affenschwanz-Durchgang kein Fehler generiert wird (Mit leerem String bevölkern)
	$vornameValue = "";
	$nachnameValue = "";
	$bemerkungenValue = "";
}
?>

	<form action="hacken_verhindern_3.php" method="post">
		<div>
			<label for="vorname">Vorname</label>
			<input type="text" id="vorname" name="vorname" value="<?=$vornameValue?>">
		</div>
		<div>
			<label for="nachname">Nachname</label>
			<input type="text" id="nachname" name="nachname" value="<?=$nachnameValue?>">
		</div>
		<div>
			<label for="bemerkungen">Bemerkungen</label>
			<textarea id="bemerkungen" name="bemerkungen" cols="50" rows="6"><?=$bemerkungenValue?></textarea>
		</div>
		<button type="submit" name="go">Formular verschicken</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>
