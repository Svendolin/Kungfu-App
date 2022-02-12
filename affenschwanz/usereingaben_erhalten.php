<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Usereingaben erhalten</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="gelborange">Die Usereingaben bleiben erhalten</h2>
	<ul class="explanation">
		<li>In diesem Script werden die POST-Vars beim zweiten Affenschwanz-Durchgang - wenn das Formular also verschickt wurde - wieder in die value-Attribute der Formular-Elemente ausgegeben.</li>
		<li>In englischen Tutorials nennt man diesen Vorgang &quot;re-populate&quot; oder &quot;repopulate the form fields&quot;.</li>
		<li>Dies ist aus Usability-Gründen sehr wichtig: Der User soll <strong>nicht neu mit dem Ausfüllen beginnen müssen</strong>, falls die Validierung fehlschlägt!</li>
		<li>Die Usereingaben werden vorläufig &quot;einfach so&quot; übernommen, was natürlich ein Hack-Risiko darstellt (mehr dazu auf den nächsten zwei Seiten)</li>
		<li><strong>Hinweis:</strong> In diesem Skript wird die praktische Syntax-Kurzform <code>&lt;?=$vornameValue?&gt;</code> statt <code>echo</code> verwendet.<br>
		Falls dich das irritiert, kannst du das im <a href="http://php.net/manual/de/function.echo.php">PHP-Handbuch</a> nachschlagen.<br>
		Ich lege dir an's Herz, in Zukunft mit diesen Kurzformen zu arbeiten, du kannst den Code für deine Formulare so viel übersichtlicher aufbauen.</li>
	</ul>
	<div class="falle">
		<p><strong>Vorsicht Falle:</strong> <code>&lt;textarea&gt;</code></a> besitzt kein value-Attribut. Dies ist ein &quot;Pärli-Tag&quot; und der Startwert muss zwischen dem Anfangs- und Schlusstag notiert werden. Ausserdem empfehle ich dir, alles auf die gleiche Zeile zu schreiben (vergl. Code).</p>
	</div>

<?php
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	// ja
	echo "<div class=\"feedback_positiv\">";
	echo "Das Formular wurde verschickt";
	echo "</div>\n";
	// Hier findet die "Übergabe" statt
	$vornameValue = $_POST['vorname'];
	$nachnameValue = $_POST['nachname'];
	$emailValue = $_POST['email'];
	$bemerkungenValue = $_POST['bemerkungen'];
	
}
else {
	// nein, setzte die Variablen leer, damit beim ersten Affenschwanz-Durchgang kein Fehler generiert wird
	$vornameValue = "";
	$nachnameValue = "";
	$emailValue = "";
	$bemerkungenValue = "";
}
?>

	<form action="usereingaben_erhalten.php" method="post">
		<div>
			<label for="vorname">Vorname</label>
			<input type="text" id="vorname" name="vorname" value="<?=$vornameValue?>"> <!-- vereinfachte Schreibweise PHP Echo -->
		</div>
		<div>
			<label for="nachname">Nachname</label>
			<input type="text" id="nachname" name="nachname" value="<?=$nachnameValue?>">
		</div>
		<div>
		<label for="email">Ihre E-Mail Adresse</label>
			<input type="email" id="email" name="email" value="<?=$emailValue?>">
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
