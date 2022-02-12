<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>E-Mail Adresse validieren</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="orange">E-Mail Adresse validieren</h2>
	<ul class="explanation"> 
		<li>Für die Validierung von E-Mail-Adressen gibt es in PHP zwei Wege: Einsatz eines <strong>regulären Ausdrucks</strong> oder eines <strong>Validate-Filters</strong>.</li>
		<li>Das Schreiben von reguläre Ausdrücken ist grundsätzlich etwas Anspruchvolles, brauchbare reguläre Ausdrücke für gültige E-Mail sind extrem komplex.<br>
		Beispiel aus einem PHP-Forum:<br>
		<code>^[^\x00-\x20()<>@,;:\\".[\]\x7f-\xff]+(?:\.[^\x00-\x20()<>@,;:\\".[\]\x7f-\xff]+)*\@[^\x00-\x20()<>@,;:\\".[\]\x7f-\xff]+(?:\.[^\x00-\x20()<>@,;:\\".[\]\x7f-\xff]+)+$</code></li>
		<li>Man findet auf dem Netz zahlreiche andere lustige Beispiele. Erschwerend kommt hinzu, dass es mit den <a href="https://www.united-domains.de/neue-top-level-domain/" target="_blank">neuen Domain-Endungen</a> noch viel lustiger wird.</li>
		<li><strong>Mein Tipp:</strong> Lasse die Finger von regulären Ausdrücken, die du nicht verstehst und brauche statt dessen PHP-Filter.</li>
		<li>Hast du das Prinzip dieser Seite bzw. der PHP-Filter mal begriffen, kannst du easy auch andere Dinge validieren: URLs, IP-Adressen, Ganze Zahlen, etc.<br>
		<li>Eine Anleitung findest du bei <a href="https://www.w3schools.com/php/php_ref_filter.asp" target="_blank">w3schools</a>, das PHP-Handbuch hilft bei diesem Thema leider nicht wirklich viel.</li>
	</ul>

<?php
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	// Desinfektion der Eingabe
	$emailValue = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Liefert uns die saubere desinfizierte Emailadresse mit TRUE oder FALSE (Können somit alles in ein IF/ELSE statement einbinden)
	// Ist die E-Mail-Adresse gültig?
	if (filter_var($emailValue, FILTER_VALIDATE_EMAIL)) {
		// ja
		echo "<div class=\"feedback_positiv\">";
		echo "Die E-Mail Adresse ist gültig.";
		echo "</div>\n";
	}
	else {
		// nein
  		echo "<div class=\"feedback_negativ\">";
		echo "Die E-Mail Adresse ist ungültig.";
		echo "</div>\n";
	}
}
else {
	$emailValue = "";
}
?>
	<form action="" method="post">
		<div>
			<label for="email">E-Mail Adresse</label>
			<input type="email" id="email" name="email" value="<?=$emailValue?>">
		</div>
		<button type="submit" name="go">Validate!</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>