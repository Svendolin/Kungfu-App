<?php
require('config.php');

// Funktion: Lesen eines Textfiles
function readContent($contentFile) {
	// Der Content des Textfiles wird mit "file()" in ein Array eingelesen
	$arr = file($contentFile); // mit file() wird das angegebene File in einem array Zeile für Zeile gespeichert in ein Array
	$content = "";
	foreach ($arr as $out) {
		$content .= $out; // hier werden alle Zeilen aneinandergehängt per Loop und in die Variable $content gespeichert
	}
	return $content;
}


// Funktion: Schreiben in ein Textfile txt
function writeContent($contentFile) {
	$handle = fopen($contentFile,"w"); // Dateihnadler – erwartet file und Buchstabe(wie soll geschrieben werden) als Parameter.
	// "a" bedeutet: Nur zum Schreiben geöffnet; platziere Dateizeiger auf Dateiende. 
	// Existiert die Datei nicht, versuche, diese zu erzeugen. Gibt es die Datei schon, wird der neue Inhalt angehängt.
	// "w" bedeutet: wenn etwas neues reingeschrieben wird, wird das alte gelöscht.
	fwrite($handle,$_POST['content']); // content wird geschrieben, Dateihandler und content wird benötigt
	fclose($handle);
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Einfaches CMS: schreiben</title>
	<link rel="stylesheet" href="../generalstyles.css">
	<script src="ckeditor/ckeditor.js"></script>
</head>
<style>
	
	
</style>
<body>
	<h2 class="blau">Einfaches CMS: schreiben</h2>
	<ul class="explanation">
		<li>Kernstück des bestehenden Codes ist <code>fopen()</code>. Falls du nicht weisst, was das macht, lies bitte den <a href="http://php.net/manual/de/function.fopen.php" target="_blank">entsprechen Eintrag im php-Handbuch</a></li>
	</ul>
	<h3>Aufgabe: Das Textfeld wird zum HTML-Editor</h3>
	<ul  class="explanation">
		<li>Gehe auf die <a href="http://www.tinymce.com" target="_blank">tinymce-Website</a> und lade dir die aktuellste Version des Editors herunter.</li>
		<li>Schaue dir die Anleitung für die Installation des Editors an: <a href="https://www.tinymce.com/docs/get-started/first-steps/" target="_blank">Your First Steps</a>. Installiere tinymce in diesem Ordner (einfaches_cms).</li>
		<li>Binde tinymce in diesem Dokument ein.</li>
		<li>Wenn du die Seite erneut aufrufst, sollte das Textfeld nun <strong>ein neues &quot;Gesicht&quot;</strong> bekommen haben: es hat sich in einen WYSIWYG-Editor mit Toolbars für Textformatierungen etc. verwandelt.</li>
		<li>Der Begriff &quot;WYSIWYG&quot; erklärt auf <a href="https://de.wikipedia.org/wiki/WYSIWYG" target="_blank">Wikipedia</a>.</li>
		<li>In der Funktion zum Schreiben braucht es ev. (je nach Einstelllungen auf deinem Server) noch eine kleine Änderung: der String, welcher geschrieben werden soll, muss noch mit <a href="http://php.net/manual/de/function.stripslashes.php" target="_blank"><code>stripslashes()</code></a> &quot;geputzt&quot; werden.</li>
		<li>Eine Alternative zu tinymce wäre der <a href="https://ckeditor.com" target="_blank">CKEditor</a>, ein Projekt, dass es auch schon sehr lange gibt und in vielen CMS eingesetzt wird.</li>
	</ul>
	<hr>
	<p class="explanation"><a href="cms_lesen.php">&gt; Zur &quot;Lesen&quot;-Seite</a></p>
	<hr>
<?php

// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) { // wurde gesendet
	// ja
	// Funktionaufruf zum Schreiben
	writeContent("content.txt"); // text aus dem File wird in php geschrieben
	// Feedback wie immer
	echo "<div class=\"feedback_positiv\">";
	echo "Habe den Inhalt gespeichert.";
	echo "</div>\n";

	// Funktionasuafruf zum Lesen
	$ausgabe = readContent("content.txt"); // Textfile wird gelesen

	// DATENBANK
	print_r($_POST);
	 
	$title = $_POST['title'];
  $short_desc = $_POST['short_desc'];
  $long_desc = $_POST['long_desc'];

  if($title != ''){

    mysqli_query($con, "INSERT INTO contents(title,short_desc,long_desc) VALUES('".$title."','".$short_desc."','".$long_desc."') ");
    header('location: cms_schreiben.php');
	}

} else {
	// Funktionsaufruf zum Lesen
	$ausgabe = readContent("content.txt"); // Textfile wird gelesen
}
?>

<form method='post' action=''>
       <label for="title">Title</label>
       <input type="text" name="title" ><br>

       <label for="short_desc">Short Description</label>
       <textarea id="short_desc" name="short_desc" ></textarea><br>

       <label for="long_desc">Long Description</label> 
       <textarea id="long_desc" name="long_desc" ></textarea><br>

       <input type="submit" name="submit" value="Submit">
    </form>
	<footer>
		<a href="../">&lt; Home</a>
	</footer>

	<script>

								CKEDITOR.inline('short_desc');
                
                CKEDITOR.replace( 'long_desc', {
									laungage: 'de',
									contentsCss: 'ckeditor/page-styles.css'
									// einzelne Buttons entfernen:

								} );
            </script>
</body>
</html>
