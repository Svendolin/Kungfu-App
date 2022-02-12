<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Datei-Upload - Themen</title>
	<link rel="stylesheet" href="../../generalstyles.css">
</head>
<body>
<h2>Übung &quot;Dateiupload&quot; - Startseite<h1>

<h3>Einstellungen auf diesem Server (php.ini)</h3>
<?php
echo "<p class=\"explanation\">Einstellung &quot;file_uploads&quot;: <strong>".ini_get('file_uploads')."</strong><br>";
echo "Sind Datei-Uploads per HTTP überhaupt erlaubt?</p>";

echo "<p class=\"explanation\">Einstellung &quot;upload_max_filesize&quot;: <strong>".ini_get('upload_max_filesize')."</strong><br>";
echo "Maximale Grösse, die eine hochgeladene Datei haben darf.</p>";

echo "<p class=\"explanation\">Einstellung &quot;upload_tmp_dir&quot;: <strong>".ini_get('upload_tmp_dir')."</strong><br>";
echo "Temporäres Verzeichnis, in dem Dateien während des Uploads provisorisch abgelegt werden.</p>";

echo "<p class=\"explanation\">Einstellung &quot;post_max_size&quot;: <strong>".ini_get('post_max_size')."</strong><br>";
echo "Die maximal erlaubte Größe von POST-Daten.</p>";

echo "<p class=\"explanation\">Einstellung &quot;max_input_time&quot;: <strong>".ini_get('max_input_time')."</strong><br>";
echo "Die maximale Zeit in Sekunden, die ein Skript verbrauchen darf, um Eingabedaten (wie POST, GET und Dateiuploads) zu verarbeiten.</p>";
?>

<h3>Erklärungen und Hilfen</h3>
<p class="explanation"><a href="https://www.php.net/manual/de/features.file-upload.php" target="_blank">PHP-Handbuch: Steuerung von Dateiuploads</a></p>
<p class="explanation">Dort insbesondere zu lesen:<br>
<a href="https://www.php.net/manual/de/features.file-upload.errors.php" target="_blank">PHP-Handbuch: Fehlermeldungen erklärt ($_FILES['myFile']['error'])</a></p>

<p class="explanation">Hilreiche Erklärungen beim Upload von Bild-Dateien:<br>
<a href="https://www.w3schools.com/php/php_file_upload.asp" target="_blank">PHP 5 File Upload (w3Schools.com)</a></p>

<p class="explanation">Erklärungen zum MIME-Type:</p>
<ul class="explanation">
	<li><a href="https://de.wikipedia.org/wiki/Internet_Media_Type" target="_blank">Wikipedia</a></li>
	<li><a href="https://wiki.selfhtml.org/wiki/MIME-Type/Übersicht" target="_blank">selfhtml</a></li>
</ul>

<h3>Beispielscripte in diesem Ordner</h3>
<ul class="explanation">
	<li><a href="info.php">info.php</a> Hinweis: Eine solche Datei <strong>nie</strong> auf einen Produktiv-Server laden, das wäre ein Sicherheitsrisiko!</li>
	<li><a href="dateiupload.html">Datei-Upload - Das Formular</a> (&quot;nur HTML&quot;)</li>
	<li><a href="dateiupload_affenschwanz.php">Datei-Upload - Affenschwanz</a></li>
	<li><a href="fehler_meldungen.php">Datei-Upload - Fehlermeldungen</a></li>
	<li><a href="dateiupload_elementare_klasse.php">Datei-Upload - mit einer elementaren Klasse</a></li>
	<li>Eine komplexe &quot;Bildgalerie&quot; mit Swiper erstellen (folgt)</li>
</ul>

<footer>
	<a href="../../index_2.html">&lt; Home</a>
</footer>
</body>
</html>
