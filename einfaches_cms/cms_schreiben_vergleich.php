<?php

// Eine Schritt für Schritt Anleitung gibts hier:
// https://makitweb.com/integrate-ckeditor-to-html-page-and-save-to-mysql-with-php/
include "config.php";

// Insert record
if(isset($_POST['submit'])){

  $title = $_POST['title'];
  $short_desc = $_POST['short_desc'];
  $long_desc = $_POST['long_desc'];

  if($title != ''){

    mysqli_query($con, "INSERT INTO contents(title,short_desc,long_desc) VALUES('".$title."','".$short_desc."','".$long_desc."') ");
    header('location: cms_schreiben.php');
  }
}


// Funktion: LESEN eines Textfiles
function readContent($contentFile) {
	// Der Content des Textfiles wird mit "file()" in ein Array eingelesen
	$arr = file($contentFile);
	$content = "";
	foreach ($arr as $out) { // Zeile für Zeile interieren und in eine Variable abfüllen in content
		$content .= $out;
	}
	return $content;
}



// Funktion: SCHREIBEN in ein Textfile
function writeContent($contentFile) {
	$handle = fopen($contentFile,"w"); // Es gibt ganz viele verschiedene Bezeichnungen im Netz: "w" (Neuer Inhalt wird abgespeichert, alter überschrieben), "a" (append = Neuer Inhalt wird hintenran gehängt) und viele mehr
	// "a" bedeutet: Nur zum Schreiben geöffnet; platziere Dateizeiger auf Dateiende. Existiert die Datei nicht, versuche, diese zu erzeugen.
	fwrite($handle,$_POST['content']); // Da das <textarea> name="content" heisst
	fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Integrate CKeditor to HTML page and save to MySQL with PHP</title>
	<link rel="stylesheet" href="../generalstyles.css">
	<script src="ckeditor/ckeditor.js"></script>
</head>
<body>
	<h2 class="blau">Einfaches CMS: schreiben (Text schreiben und abspeichern, sichtbar machen)</h2>
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
if (isset($_POST['go'])) {
	// ja
	// Funktionaufruf zum SCHREIBEN:
	writeContent("content.txt");
	// Feedback wie immer
	echo "<div class=\"feedback_positiv\">";
	echo "Habe den Inhalt gespeichert.";
	echo "</div>\n";
  // Funktionsaufruf zu lesen
	$ausgabe = readContent("content.txt");
}

else {
	$ausgabe = readContent("content.txt");
}
?>

	<form action="cms_schreiben.php" method="post">
		<textarea name="content" id="editor_content" cols="75" rows="15"><?=$ausgabe?></textarea><br><br> <!-- Kurze Echoschreibweise -->
		<button type="submit" name="go">Speichern</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
	<script>
	// Kopiert aus https://ckeditor.com/docs/ckeditor4/latest/guide/dev_installation.html
  // CKEDITOR.replace( 'editor_content' ); Bezieht sich auf die ID der Textarea. Er tauscht somit die normale Textarea mit dem ckeditor aus
  
	CKEDITOR.replace( 'editor_content', { // Gefunden bei: https://ckeditor.com/docs/ckeditor4/latest/guide/dev_configuration.html
    language: 'de', // Hauptsprache einstellen
    uiColor: '#ffffff', // Farbe des Editors auswählen, falls gewünscht. Buttonfarbe bleibt aber bestehen
		contentsCss: 'ckeditor/page_styles.css',
		removePlugins: 'pastefromword',
		removeButtons: 'spellchecker',
		// Responsiver Teil, um den Editor repsonsive zu gestalten:
		width: '50%' // Etc. Macht den Editor responsive und 50% so breit

});

	</script>
</body>
</html>

