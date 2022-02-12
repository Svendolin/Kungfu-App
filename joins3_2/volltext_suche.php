<?php
require("inc/credentials2.php");
// Variable für das Value-Attribut des Suchfelds
$suchBegriffValue = "";
// Query erster Teil

$query = "SELECT * FROM volltext
";
if (isset($_POST['go'])) {
	$query .= "WHERE MATCH (titel)
AGAINST (:suchbegriff IN NATURAL LANGUAGE MODE)";
	// POST-Variable desinfizieren
	$cleanStr = filter_var($_POST['suchbegriff'], FILTER_SANITIZE_STRING);
	$suchBegriffValue = $cleanStr;
	
	$stmt = $dbh->prepare($query);
	$stmt->bindParam(":suchbegriff", $cleanStr);
	$stmt->execute();
	$result = $stmt -> fetchAll();
	
	$hitsNr = count($result);
	
}
else {
	$result = $dbh->query($query);
	$hitsNr = $result->rowCount();
}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Volltext Suche - eine Spalte</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
<p><a href="index.html">&lt; Index</a></p>
<h1>Volltext Suche über eine Spalte (&quot;titel&quot;)</h1>
<ol>
<li>Füge der Datenbank &quot;classicmodels&quot; die Tabelle &quot;volltext&quot; hinzu (sql-Dokumente beiliegend, im Ordner &quot;dumps&quot;)</li>
<li>Entferne im Code die Kommentarzeichen auf Zeile 6 und 28</li>
<li>Schau dir die Tabelle in phpMyAdmin kurz an. Was für Indexes sind angelegt worden?</li>
</ol>
<p>Jetzt wird statt <code>LIKE</code> mit <code>MATCH</code> und <code>AGAINST</code> gearbeitet. Die Suche erfolgt auf dieser und der nächsten Seite im <code>IN NATURAL LANGUAGE MODE</code>. Der Suchstring wird hierbei wie ein Satz in der menschlicher Sprache behandelt und ein sehr komplexer Algorithmus berechnet die Relevanz des Suchstrings zu den zu durchsuchenden Inhalten.</p>

<p>Wenn <code>MATCH()</code> in einer <code>WHERE</code>-Klausel verwendet wird, so wie in diesem Beispiel, werden die zurückgegebenen Zeilen automatisch nach der Relevanz der Treffer sortiert (höchste Relevanz zuerst).</p>

<p><strong>Query:</strong></p>
<pre><code class="language-sql"><?=$query?></code></pre>
<?php
if (isset($_POST['go'])) {
	echo "<h2>Treffer: ".$hitsNr."</h2>";
	if ($hitsNr == 0) {
		echo "<p style=\"color: red;\">Mit diesem Suchbegriff wurden keine Datensätze gefunden!</p>";
	}
}
else {
	echo "<h2>Ausgabe aller Datensätze: ".$hitsNr."</h2>";
}
?>
<form method="post" action="volltext_suche.php">
<input type="text" name="suchbegriff" style="font-size: 18px; width: 360px;" value="<?=$suchBegriffValue?>" placeholder="Suchbegriff eingeben">
<button type="submit" name="go" style="font-size: 18px;">
Suchen
</button>
</form>
<br>
<table class="db_table">
<tr>
<th>id</th>
<th>titel</th>
<th>dummytext</th>

</tr>
<?php
foreach($result as $row) {
	echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td nowrap=\"nowrap\" valign=\"top\">" . $row['titel'] . "</td>";
	echo "<td>" . $row['dummytext'] . "</td>";
	echo "</tr>";
}
?>
</table>
<br>
<h2>Fulltext Indizes anlegen</h2>
<p>Um die Volltextsuche zu ermöglichen, muss zuerst ein Index mit der Option &quot;Fulltext&quot; auf die Spalte angelegt werden:</p>
<p><img src="images/FULLTEXT_anlegen.png" style="width: 200px;"></p>
<p><strong>Achtung:</strong> Fulltext-Indizes können nur auf Spalten mit dem Datentyp CHAR, VARCHAR oder TEXT angelegt werden.</p>
<br>
</div>
<script src="prism/prism.js"></script>
</body>
</html>
