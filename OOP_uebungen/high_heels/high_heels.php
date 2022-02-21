<?php
// Verbindung zum "Abreiterfile herstellen
require('class/BerechneHighHeel.class.php');

// Instanz inizialisieren aus der Klasse, die wir oben required haben
$instance = new BerechneHighHeel();

// input name="" einsetzen
if (isset($_POST['go'])) {
	// input name="" einsetzen
	$Sexy = $_POST['Sexy'];
	$Erfahrung = $_POST['Erfahrung'];
	$Preis = $_POST['Preis'];
	$Mode = $_POST['Mode'];
	$Alkohol = $_POST['Alkohol'];
	$Groesse = $_POST['Groesse'];

	// HAUPTMETHODE mit Formel aufrufen
	$res = $instance->HoeheBerechnen($Sexy, $Erfahrung, $Preis, $Mode, $Alkohol, $Groesse);

} else {
	$Sexy = "";
	$Erfahrung = "";
	$Preis = "";
	$Mode = "";
	$Alkohol = "";
	$Groesse = "";
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8" />
	<title>Die perfekte High-Heels-Höhe</title>
	<link rel="stylesheet" href="../../generalstyles.css">
</head>

<body>
	<h2>Die perfekte High-Heels-Höhe</h2>
	<p class="explanation"><img src="images/blick_highheel.jpg" alt="Blick Artikel" width="500" height="427" border="0"></p>
	<p class="explanation">Aus: "Blick am Abend", im Oktober 2009</p>
	<ul class="explanation">
		<li>Ausgehend von der oben stehenden Formel soll eine Klasse (fertig) geschrieben werden, welche als <strong>Input die oben stehenden Parameter empfängt</strong> und als <strong>Output die ideale Absatzhöhe zurückgibt</strong>.</li>
		<li>Um etwas Zeit zu sparen, habe ich einiges schon vorbereitet:<br>
			- Klasse mit einer Grundstruktur<br>
			- auf dieser Seite ein Formular mit den nötigen Eingabe-Möglichkeiten</li>
		<li>Der Input für den Preis soll in Schweizer Franken erfolgen. Die Formel oben im Artikel arbeitet aber mit britischen Pfund. Die Umrechnung von Franken in Pfund soll in einer <strong>separaten Methode</strong> geschehen.</li>
		<li>Auch für den Input der Schuhgrösse sollen Schweizer Schuhgrössen erlaubt sind. Im Artikel kannst du entnehmen, wie die Umrechnung der Schuhgrössen geht. Notiere eine weitere <strong>separate Methode</strong>, welche diese Umrechnung vornimmt.</li>
		<li>Damit man die Klasse <strong>schnell auf andere Grundvoraussetzungen</strong> anpassen kann, sind zwei Eigenschaften in der Klasse definiert: Eine für den Währungsfaktor, die andere für die Differenz für das Umrechnen der Schuhgrösse (auch schon vorbereitet).</li>
	</ul>
	<!-- Feedback RESULTAT -->
	<?php
	if(isset($res)) {
		echo "Die ideale High-Heels-Höhe beträgt: ".$res;
	};

	?>

	<!-- Formularteil -->
	<form method="post" action="high_heels.php">
		<input type="text" size="10" name="Sexy" id="Sexy" value="<?=$Sexy ?>"> <label for="Sexy">Wie sexy sind die High-Heels? (Wert von 0 bis 1, Kommazahlen bitte <strong>mit Punkten</strong> schreiben)</label><br><br>
		<input type="text" size="10" name="Erfahrung" id="Erfahrung" value="<?=$Erfahrung ?>"> <label for="">Erfahrung im Tragen von hohen Schuhen in Jahren</label><br><br>
		<input type="text" size="10" name="Preis" id="Preis" value="<?=$Preis ?>"> <label for="">Preis der Schuhe in CHF</label><br><br>
		<input type="text" size="10" name="Mode" id="Mode" value="<?=$Mode ?>"> <label for="">Vor wie vielen Monaten waren die Schuhe in Mode? (bei aktuellen Trends 0 eingeben)</label><br><br>
		<input type="text" size="10" name="Alkohol" id="Alkohol" value="<?=$Alkohol ?>"> <label for="">Wie viele Gläser hochprozentigen Alkohols werden vor dem Ausgang getrunken?</label><br><br>
		<input type="text" size="10" name="Groesse" id="Groesse" value="<?=$Groesse ?>"> <label for="">Schuhgrösse (Schweizer Schuh-Nummer)</label><br><br>
		<input type="submit" value="High-Heels-Höhe bestimmen" name="go" id="go">
	</form>
	<p class="explanation">
		Hast du es gemerkt? Der Franken ist nicht stärker als das Pfund! Dem Schreiberling ist ein krasser Fehler unterlaufen, es müsste natürlich heissen: 1 Pfund = 1,6 Franken.<br>
		Und ausserdem: Was kommt eigentlich heraus aus dieser Formel: Meter, Zentimeter, Millimeter oder brit. Fuss, ...?<br>
		<strong>Nimm also bitte die Formel nicht allzu Ernst!</strong>
	</p>
	<hr>
	<footer>
		<a href="../../index_2.html">&lt; Home</a>
	</footer>
</body>

</html>