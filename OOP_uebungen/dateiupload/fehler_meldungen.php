<?php
if (isset($_POST['go'])) {
	echo "<pre>";
	print_r($_FILES['myFile']);
	echo "</pre>";

	// Überprüfen der Fehlermeldungen mit Hilfe einer switch Anweisung
	switch ($_FILES['myFile']['error']) {
		case 0:
			// Achtung, dies könnte man falsch verstehen, die Datei ist erst im temp. Verzeichnis!
			echo "Normalo-Feedback: Die Datei wurde erfolgreich hochgeladen.<br>";
			echo "PHP-Handbuch: Es liegt kein Fehler vor, die Datei wurde erfolgreich hochgeladen.";
			break;
		case 1:
			echo "Normalo-Feedback: Die hochgeladene Datei ist zu schwer (Serverseitige Beschränkung).<br>";
			echo "PHP-Handbuch: Die hochgeladene Datei überschreitet die in der Anweisung upload_max_filesize in php.ini festgelegte Größe.";
			break;
		case 2:
			echo "Normalo-Feedback: Die hochgeladene Datei ist zu schwer.<br>";
			echo "PHP-Handbuch: Die hochgeladene Datei überschreitet die in dem HTML Formular mittels der Anweisung MAX_FILE_SIZE angegebene maximale Dateigröße.";
			break;
		case 3:
			echo "Die Datei wurde nur teilweise hochgeladen.";
			break;
		case 4:
			echo "Es wurde keine Datei hochgeladen.";
			break;
		case 6:
			echo "Normalo-Feedback: Kann den Ordner nicht finden, um die Datei hochzuladen.<br>";
			echo "PHP-Handbuch: Fehlender temporärer Ordner. Eingeführt in PHP 5.0.3.";
			break;
		case 7:
			echo "Das Speichern der Datei ist fehlgeschlagen.<br>";
			echo "PHP-Handbuch: Speichern der Datei auf die Festplatte ist fehlgeschlagen. Eingeführt in PHP 5.1.0.";
			break;
		case 8:
			echo "Normalo-Feedback: Der Upload der Datei wurde gestoppt.<br>";
			echo "PHP-Handbuch: Eine PHP Erweiterung hat den Upload der Datei gestoppt. PHP bietet keine Möglichkeit an, um festzustellen welche Erweiterung das Hochladen der Datei gestoppt hat. Überprüfung aller geladenen Erweiterungen mittels phpinfo() könnte helfen. Eingeführt in PHP 5.2.0.";
			break;
	}
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Datei-Upload - Fehlermeldungen</title>
	<style>
	body {
		font-size: 18px;
		font-family: Arial, Helevetica, sans-serif;
	}
	</style>
</head>
<body>
<h1>Datei-Upload - Fehlermeldungen</h1>
<form action="fehler_meldungen.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="30000">
    <p>Wählen Sie die Datei aus, die hochladen möchten:</p>
    <input type="file" name="myFile" id="myFile">
    <br><br>
    <input type="submit" value="Hochladen" name="go">
</form>
</body>
</html>
