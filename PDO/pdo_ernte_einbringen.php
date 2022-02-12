<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Die PDO-Ernte einbringen</title>
	<link rel="stylesheet" href="formstyles.css">
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="rotweiss">Die PDO-Ernte einbringen</h2>
	
	<p class="explanation">Nach dem Ausführen der Query mit <code>execute()</code> holt man sich das Resultat ab und kann es darauf easy im HTML ausgeben. Dieser Vorgang ist sehr ähnlich wie im Zeitalter vor PDO und mysqli, ich werde deshalb nicht weiter darauf eingehen. Am besten schaust du dir das CRUD-Beispiel in diesem Ordner an.</p>
	
	<p class="explanation">Wie auf der vorletzten Seite erwähnt, wird hier grundsätzlich mit der Option <code>PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC</code> gearbeitet.</p>
	
	<h3>Mehrere Datensätze</h3>
	<p class="explanation">Ist das Resultat in Form von mehreren Datensätzen zu erwarten, wird mit <code>fetchAll()</code> gearbeitet:<br><br>
	<?php
echo highlight_string('<?php
$result = $stmt -> fetchAll();
return $result;
?>', TRUE);
?>
</p>
	
		<h3>Einzelner Datensatz</h3>
	<p class="explanation">Ist das Resultat hingegen in Form eines einzelnen Datensatzes zu erwarten, wird mit <code>fetch()</code> gearbeitet:<br><br>
	<?php
echo highlight_string('<?php
$result = $stmt -> fetch();
return $result;
?>', TRUE);
?>
</p>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>