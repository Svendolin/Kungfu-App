<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Queries mit PDO ausführen</title>
	<link rel="stylesheet" href="formstyles.css">
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="rotweiss">Queries mit PDO ausführen</h2>
	
	<h3>prepare - bind - execute</h3>
	<p class="explanation">Im Prinzip braucht es drei Schritte für das Absetzen einer Query mit den PDO-Methoden:</p>
	
	<ol class="explanation">
		<li>Die Query vorbereiten mit <code>prepare()</code>. Im Query-String wird mit Platzhaltern für die Werte gearbeitet (Die Platzhalter sind mit Doppelpunkten markiert, s. Code)</li>
		<li>Die Parameter dazu &quot;anbinden&quot; mit <code>bindParam()</code>: Es wird wird beschrieben, mit welchen Werten die Platzhalter ersetzt werden sollen.</li>
		<li>Die Query ausführen mit <code>execute()</code>.</li>
	</ol>
	<p class="explanation">Im Code könnte das so aussehen:<br /><br />
<?php
echo highlight_string('<?php
// Hier wird davon ausgegangen, dass wir in einer Kindklasse von PDO sind.
$query = "INSERT INTO myTable (vorname, nachname) VALUES (:vorname, :nachname)";
$stmt = $this -> prepare($query);
$stmt -> bindParam(\':vorname\', \'Peter\');
$stmt -> bindParam(\':nachname\', \'Muster\');
$stmt -> execute();
?>', TRUE);
?>
	<p class="explanation">Von diesem Prozess gibt es auch eine Kurzversion. Statt den benannten Parameter (&quot;named parameters&quot;) werden im folgenden Code <strong>anonyme</strong> Parameter (&quot;question mark parameters&quot; oder &quot;unnamed parameters&quot;) verwendet. Die Werte werden als Array an <code>execute()</code> übergeben. Die <strong>Reihenfolge der Werte</strong> im Array muss dabei natürlich stimmen.</p>
<?php
echo highlight_string('<?php
// Hier wird davon ausgegangen, dass wir in einer Kindklasse von PDO sind.
$query = "INSERT INTO myTable (vorname, nachname) VALUES (?, ?)";
$stmt = $this -> prepare($query);
$stmt -> execute(array(\'Peter\', \'Muster\'));
?>', TRUE);
?>
	<div class="falle">
		<p>Theoretisch kann man die Query auch ohne Platzhalter notieren. Damit wäre aber der grösste PDO-Trumpf punkto Sicherheit verspielt worden. Verwende diese Option also nur, wenn du den Query-String komplett ohne &quot;Fremdangaben&quot; formulieren kannst.</p>
	</div>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>