<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Mit regulären Ausdrücken validieren - Aufgabe Passwort</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="orange">Mit regulären Ausdrücken validieren - Aufgabe Passwort</h2>
	<ul class="explanation">
		<li>In vielen Webanwendungen ist es obligatorisch, dass beim Registrieren eines neuen Users nur ein <strong>starkes</strong> Passwort erfasst werden kann.</li>
		<li>Was in diesem Zusammenhang &quot;stark&quot; heisst, musst für den User genau und einfach beschrieben werden, um ihn nicht zu frustrieren: Länge, erforderliche Art der Zeichen, etc.</li>
		<li>Suche <a href="http://regexlib.com/Search.aspx?k=password" target="_blank">hier</a> einen Regex aus, der dir gefällt und füge ihn dem Script hinzu.</li>
		<li>Beschreibe unterhalb des Eingabefelds <strong>auf Deutsch</strong>, wie das Passwort aussehen muss! Dieser Text soll nicht nur für Nerds verständlich sein. Führe deshalb einen kurzen Usability-Test mit jemand anderem durch.</li>
	</ul>

<?php
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	// Desinfektion der Eingabe
	$pwValue = filter_var($_POST['plz'], FILTER_SANITIZE_STRING);
	// Ist die Angabe gültig?
	// Schreiben Sie hier ihren einen eigenen Regex ein: '/ /', z.B auf https://regexlib.com/Search.aspx?k=password:
	$suchmuster = '/^.{4,8}$/';
	// $suchmuster = '/^(?=.{16,})(?=.*[1-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[(!@#$%^&*()_+|~\- =\`{}[\]:<>?,.\/, )])(?!.*(.)\1{2,}).+$/';
	if (preg_match($suchmuster, $pwValue)) {
		// ja
		echo "<div class=\"feedback_positiv\">";
		echo "Ihr Passwort ist stark.";
		echo "</div>\n";
	}
	else {
		// nein
  		echo "<div class=\"feedback_negativ\">";
		echo "Ihr Passwort entspricht nicht den Vorgaben.";
		echo "</div>\n";
	}
}
else {
	$pwValue = "";
}
?>
	<form action="" method="post">
		<div>
			<label for="ort">Neues Passwort erfassen</label>
			<input type="text" id="pw" name="plz" value="<?=$pwValue?>">
			<!-- <p><strong>Hier kommt die Beschreibung des Passworts hin:
			Passwort-Validator für hochkomplexe sichere Passwörter.<br>
			<ul>
			<li>Länge mindestens 16 Zeichen 
			<li>Mindestens eine Zahl 
			<li>Mindestens ein Kleinbuchstabe 
			<li>Mindestens ein Großbuchstabe 
			<li>Mindestens ein Sonderzeichen aus dem folgenden Satz (!@#$%^&*()_+|~\- =\`{}[\]:";'<>?,.\/, )]" 
			<li>Keine aufeinanderfolgenden, sich wiederholenden Zeichen</strong></p> -->
		</div>
		<button type="submit" name="go">Validate!</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>
