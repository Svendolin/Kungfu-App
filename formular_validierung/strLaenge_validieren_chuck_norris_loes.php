<?php
$feedback = "";
$goon = true;
function validateStrLength($str, $field, $min, $max) {
	global $feedback;
	global $goon;
    $anzZeichen = strlen($str);
    if ($anzZeichen < $min) {
    	$feedback = "Ihre Eingabe für das Feld &quot".$field."&quot ist zu kurz, sie muss mindestens ".$min." Buchstaben betragen.<br>";
        $goon = false;
    }
    elseif ($anzZeichen > $max) {
        $feedback = "Ihre Eingabe für den Feld &quot".$field."&quot ist zu lang, sie darf ".$max." Buchstaben nicht überschreiten.<br>";
        $goon = false;
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Stringlänge validieren (Required fields) - Übung für Chuck-Norris-Fans Lösung</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="orange">Stringlänge validieren (Required fields) - Übung für Chuck-Norris-Fans Lösung</h2>

<?php
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	// Desinfektion der Eingaben
	$vornameValue = filter_var($_POST['vorname'], FILTER_SANITIZE_STRING);
	$nachnameValue = filter_var($_POST['nachname'], FILTER_SANITIZE_STRING);
	// Felder validieren
	validateStrLength($vornameValue,"Vorname",3,30);
	validateStrLength($nachnameValue,"Nachname",2,40);
	
	// Sind die Eingaben gültig (die Überprüfung erfolgte in der Funktion)? 
	if ($goon) {
		// ja
		echo "<div class=\"feedback_positiv\">";
		echo "Vielen Dank für Ihre Angaben, ihre Namen sind gültig.";
		echo "</div>\n";
	}
	else {
		// nein
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