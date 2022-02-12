<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Die Konstruktormethode</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="schwarz">Die Konstruktormethode</h2>
	<ul class="explanation">
		<li>Neu in diesem Kapitel ist die Kontruktormethode: <code>__construct()</code>. Doppelte Underscores vor dem Namen bedeutet in PHP &quot;magisch&quot;.</li>
		<li>Manchmal wird auch einfach der Begriff &quot;Konstruktor&quot; verwendet. In englischen Tutorials wird diese Kurzform &quot;Constructor&quot; sogar mehr verwendet als die Langform &quot;constructor method&quot;.</li>
		<li>Die Konstruktormethode wird automatisch abgearbeitet, <strong>wenn eine Instanz erzeugt wird</strong>, sie wird also nirgends explizit aufgerufen. </li>
		<li>In PHP kannst du eine Konstruktormethode (bzw. Dekonstruktormethode) verwenden, <strong>musst du aber nicht</strong>. Dieser Fact wird Programmierer, die mit einer anderen höhreren Sprache aufgewachsen sind, natürlich befremden ...</li>
		<li>PHP kümmert sich weitgehend selber um Speicherressourcen. Als PHP-Programmierer muss man sich erst bei Objekten, welche &quot;einen Berg abarbeiten müssen&quot; darum sorgen.</li>
		<li>Behalte im Hinterkopf, dass Konstruktormethoden in anderen Programmiersprachen mehr Aufgaben übernehmen und deshalb strengeren Gesetzen unterliegen als in der PHP-Welt.</li>
		<li>Viele Webentwickler wissen nicht einmal, dass es so etwas wie Konstruktoren überhaupt gibt.</li>
		<li>Konstruktormethoden sind ein gutes Mittel, Klassen logisch aufzubauen und somit <strong>Ordnung im Code</strong> zu behalten (s. Erklärung unten).</li>
	</ul>
	<div class="falle">
		<p>Konstruktormethoden dürfen <strong>keine <code>return</code>-Anweisungen enthalten</strong>. Dies ist übrigens nicht nur in PHP so...</p>
	</div>
	<h3>Die Konstruktormethode als logischer Startpunkt in der Architekur eines Objektes</h3>
	<p class="explanation">Besorgte und gut organisierte Eltern bereiten sich auf eine Geburt eines Kindes seriös vor. Sie kaufen einen Wickeltisch, ein Kinderbett, 10 Packungen Pampers-Windeln, Kleidchen, etc. etc. Schliesslich soll die Infrastruktur stimmen, wenn der neue Erdenbürger ins Haus kommt und sehr wahrscheinlich hat man dann ja genug andere Sorgen ...</p>
	<p class="explanation">Das Planen von Klassen ähnelt diesem Vorgang sehr. Im Prinzip versucht man sich auch hier vorzustellen, <strong>was das Objekt zum Start ins Leben braucht</strong> und versucht das in den Konstruktor zu packen. Schreibt man zum Beispiel eine Klasse zum Lesen eines Text-Files, wäre es doch sinnvoll, zuerst zu testen, ob es ein solches File überhaupt gibt und ob man über die entsprechenden Rechte verfügt. Schreibt man eine Klasse für eine Datenbankabfrage, wäre es doch sinnvoll, die Verbindung zur Datenbank zuerst herzustellen, bevor man versucht, Datensätze zu verarbeiten. Und so weiter.</p>

	<hr>
	<h4>Links zu den Beispielscripts</h4>
	<ul class="explanation">
		<li><a href="konstruktor__beispielskripte/konstruktor_1.php">konstruktor_1.php</a></li>
		<li><a href="konstruktor__beispielskripte/konstruktor_2.php">konstruktor_2.php</a></li>
		<li><a href="konstruktor__beispielskripte/konstruktor_3.php">konstruktor_3.php</a></li>
	</ul>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>


