<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Funktionen: vom Amateur zum Profi</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="schwarz">Funktionen: vom Amateur zum Profi</h2>
	<ul class="explanation">
		<li>Ziel dieses Teils ist es, Funktionen professioneller zu notieren. Damit wird auch ins Thema &quot;OOP&quot; übergeleitet.</li>
		<li>Du findest drei Skripte im Ordner &quot;funktionen_beispielskripte&quot;. Beachte dort die erklärenden Kommentare.</li>
		<li>Grundlegende Erklärungen zu Funktionen gibt es an dieser Stelle jedoch nicht, es wird vorausgesetzt, dass du dich damit schon auskennst.</li>
	</ul>
	
	<h3><code>include</code> vs. <code>require</code> - die bessere Wahl beim Arbeiten mit ausgelagertem Code</h2>
	<ul class="explanation">
		<li>Zwischen <code>include</code> und <code>require</code> besteht ein kleiner, aber feiner Unterschied.</li>
		<li>Schlägt <code>include</code> fehl, wird lediglich eine <strong>Warnung</strong> ausgelöst. Der nachfolgende Code wird trotzdem versucht <strong>zu verarbeiten</strong>.</li>
		<li>Schlägt hingegen <code>require</code> fehl, wird das Script mit einem &quot;fatal error&quot; <strong>abgebrochen.</strong></li> 
		<li>Grundsätzlich stellt sich die Frage, ob es überhaupt Sinn macht, mit einem Script zu arbeiten, dem ein Bestandteil fehlt, oder ob es nicht sinnvoller wäre, einfach komplett mit der Programm-Ausführung aufzuhören, bevor nicht alles in Ordnung ist.</li>
		<li><a href="http://php.net/manual/de/function.require.php" target="_blank"><code>require</code></a> im PHP-Handbuch</li>
		<li><a href="http://php.net/manual/de/function.include.php" target="_blank"><code>include</code></a> im PHP-Handbuch</li>
		<li>Zu diesem Thema gibt es auch einen Beitrag bei <a href="https://www.w3schools.com/php/php_includes.asp" target="_blank">w3schools</a>.</li>
	</ul>
	
	<h3>Hinweis zu inkludierten Dateien</h3>
	<div class="falle">
		<p>Die Dateiendung &quot;.inc&quot; sollte aus verschiedenen Gründen in PHP-Projekten <strong>nie</strong> verwendet werden, auch wenn du dahingehende Informationen in (veralteten) Tutorials findest! Setze <strong>immer</strong> die Dateiendung &quot;.php&quot; ein.</p>
	</div>
	<hr>
	<h4>Links zu den Beispielscripts</h4>
	<ul class="explanation">
		<li><a href="funktionen_beispielskripte/funktionen_1.php">funktionen_1.php</a></li>
		<li><a href="funktionen_beispielskripte/funktionen_2.php">funktionen_2.php</a></li>
		<li><a href="funktionen_beispielskripte/funktionen_3.php">funktionen_3.php</a></li>
	</ul>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>
