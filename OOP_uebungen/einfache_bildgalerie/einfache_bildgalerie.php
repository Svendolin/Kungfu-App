<?php
// Verarbeitendes Script
// Require
require("class/einfache_bildgalerie.class.php");

// Instanzierung zum Bilder Ordner
$instanz = new ImageGallery("bilder");
// HTML ausgeben
$ausgabe = $instanz -> makeGallery();

?>



<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Eine einfache Bildgalerie</title>
	<link rel="stylesheet" href="../../generalstyles.css">
</head>
<body>
	<h2>Eine einfache Bildgalerie</h2>
	<hr>
	<ul class="explanation">
		<li>In diesem Dokument findest du eine Funktion, welche Files aus einem Ordner liest und daraus eine ganz einfache Bildergalerie schreibt.</li>
		<li>Transferiere den Code der Funktion in eine Klasse mit Konstruktormethode.</li>
		<li>Der Pfad zum Bilder-Ordner soll <strong>dem Konstruktor als Parameter übergeben werden können</strong>.</li>
		<li>Der Konstruktor soll überprüfen, ob der Bilderordner existiert und legt darauf die Filenamen in ein Array ab.</li>
		<li>Der HTML-Code für die Ausgabe der Bilder soll in einer <strong>zweiten Methode</strong> erzeugt werden.</li>
		<li>Überlege dir beim Planen, welche Informationen in beiden Methoden gebraucht werden (= Eigenschaften).</li>
	</ul>
<?php
echo $ausgabe;
?>

	<footer>
		<a href="../../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>
