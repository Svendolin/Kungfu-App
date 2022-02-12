<?php
require('class/MyPlayer.class.php');
/* Instanz der Methode
	- In MyPlayer geben wir den boolschen Parameter mit:
	- true = responsive
	- false = nicht responsive


*/
$instanz = new MyPlayer(true);
// Aufrufen der Methode mit einer Dummy-ID

$ausgabe1 = $instanz->makeYoutubePlayer("FBgLytbB-uE", 560, 315);

$ausgabe2 = $instanz->makeVimeoPlayer("170862361?h=992cde70f4", 560, 315);
?>
<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8" />
	<title>Eine Klasse für einen Youtube-Player</title>
	<link rel="stylesheet" href="../../generalstyles.css">
	<style>
		.videoWrapper {
			position: relative;
			padding-bottom: 56.25%;
			/* 16:9 */
			height: 0;
		}

		.videoWrapper iframe {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}
	</style>
</head>

<body>
	<h2>Eine Klasse für einen Youtube-Player</h2>
	<hr>
	<ul class="explanation">
		<li>Gehe auf <a href="http://www.youtube.com" target="_blank">www.youtube.com</a>, und wähle irgend ein Video aus.</li>
		<li>Unterhalb des Videos findest du einen Button namens &quot;Teilen&quot;. Klickst du darauf, öffnet sich ein weiterer Bereich. Darin siehst du einen weiteren Button namens &quot;Einbetten&quot;.</li>
		<li><strong>Hinweis:</strong> Nicht alle Videos können aus urheberrechtlichen Gründen eingebettet werden, schlägt also oben beschriebenes Verfahren fehl, musst du ein <strong>anderes Video suchen</strong>.</li>
		<li>Nach Klick auf &quot;Einbetten&quot; öffnet sich ein weiterer Bereich, in welchem sich etwas HTML-Code für einen <code>iframe</code> befindet. Dieser Code kann mit Hilfe der unteren Checkboxen übrigens modifiziert werden.</li>
		<li>Kopiere den HTML-Code und füge ihn in die Methode &quot;makePlayer()&quot; der bereits in diesem Order vorbereiteten Klasse ein.</li>
		<li>Diese Methode soll den HTML-Code mit Hilfe eines <code>returns</code> &quot;ausspucken&quot;.</li>
		<li>Die Klasse soll folgende Features haben: Übergabe der ID des Videos, der Höhe und der Breite des <code>iframes</code> als Parameter:<br>
			Passe die Methode so an, dass sich der HTML-Code dynamisch mit den empfangenen Parameter anpasst.</li>
		<li>Bei dieser Aufgabenstellung sind mehrere Lösungsansätze möglich, du musst hier noch nicht mit einem Konstruktor arbeiten.</li>
	</ul>
	<?php
	echo $ausgabe1;
	echo "<br>";
	echo $ausgabe2;

	// echo $vimeoausgabe;
	?>

	<footer>
		<a href="../../index_2.html">&lt; Home</a>
	</footer>
</body>

</html>