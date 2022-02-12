<?php
// Setze auf der nächsten Zeile den Hash ein (bei password_hash.php erstellt mit 9876 > Dann hier im localhost des password_verify.php testen)
// Da $-Zeichen im String vorkommen, müssen hier ZWINGEND einfache Anführungszeichen verwendet werden!
$hash = '$2y$10$8eEyrE.1Xrvn9KzlCLXzK.C9einkztBRIO46K2n7t476ekXQ835iq';
// $hash = '$2y$10$0mbqkRvpZ6hxN4Qq8JusvOG..cRacPSZT3PHM3Is2EuXoPsKUDjWC'; // '' benutzen, die dummen Anführungszeichen, um den Hash nicht von PHP interprätieren zu lassen (Im gegensatz zum "")
$state = "";
if (isset($_POST['go'])) {
	$eingabe = $_POST['eingabe'];
	// Vergleiche die Eingabe (Klartext) mit dem Hash
	if (password_verify($eingabe, $hash)) { // Magic trick: Hier soll geprüft werden, ob der Klartext der $eingabe zum $hash passt
		$state .= "<div class=\"feedback_positiv\">";
		$state .= "<p>Das Passwort passt!</p>";
		$state .= "</div>\n";
	}
	else {
		$state .= "<div class=\"feedback_negativ\">";
		$state .= "<p>Das Passwort passt leider <strong>nicht</strong> zum Hash.</p>";
		$state .= "</div>\n";
	}
}
else {
	$eingabe = "";
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Verifizieren des Passworts</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="gruen">Verifizieren des Passworts</h2>
	<ul class="explanation">
		<li>Erzeuge auf der letzten Seite den Hash von einem Passwort.</li>
		<li>Kopiere dort den Hash und setze ihn hier im Script ein (s. Code). Merke dir auch den Klartext des Passworts.</li>
		<li>Bitte beachte, dass die Verarbeitung dieses Skriptes einige Zeit in Anspruch nimmt, und das ist auch gut so. Warum wohl?</li>
	</ul>
<?php
echo $state;
?>
	<form method="post" action="password_verify.php">
		<label for="eingabe">Gib hier den Klartext ein:</label>
		<input type="text" size="25" id="eingabe" name="eingabe" value="<?=$eingabe?>">
		<br>
		<button type="submit" name="go">Verify!</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>
