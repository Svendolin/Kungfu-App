<?php
// BOOLEAN_MODE (KOMPLIZIERTE VARIANTE MIT + und - IN DER TABELLE)
require("inc/credentials2.php");
// Variable für das Value-Attribut des Suchfelds
$suchBegriffValue = "";
// Query erster Teil

$query = "SELECT * FROM boolitabelle
";
if (isset($_POST['go'])) {
	$query .= "WHERE MATCH (title, body)
AGAINST (:suchbegriff IN BOOLEAN MODE)";
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
<title>Volltext Suche - Profis</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
<p><a href="index.html">&lt; Index</a></p>
<h1>Volltext Suche für Profis, aber nicht für Frau Muggli</h1>
<ol>
<li>Füge der Datenbank &quot;classicmodels&quot; die Tabelle &quot;boolitext&quot; hinzu (sql-Dokumente beiliegend, im Ordner &quot;dumps&quot;)</li>
<li>Entferne im Code die Kommentarzeichen auf Zeile 6 und 28</li>
</ol>
<p>Volltext-Suchen können auch im sog. &quot;BOOLEAN MODE&quot; programmiert werden. Darin hat der User die Möglichkeit, die Qualität der Ergebnisse mit Hilfe von Operatoren zu optimieren.</p>
<p>Wird ein + an ein Wort angehängt muss es zwingend vorkommen, bei einem - darf es nicht vorkommen. Derartige Operatoren stehen übrigens auch in zahlreichen Suchmaschinen zur Verfügung.</p>
<p>Mehr: <a href="https://inside-intermedia.de/die-volltextsuche-in-mysql-richtig-nutzen" target="_blank">inside-intermedia.de/die-volltextsuche-in-mysql-richtig-nutzen</a></p>
<p>Die Frage ist nun grundsätzlich, wie viele Besucher meiner Website wissen werden, wie so gesucht werden kann, der Einsatz von &quot;BOOLEAN MODE&quot; ist wohl eher nur für Nerds-Seiten sinnvoll ...</p>
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
<form method="post" action="volltext_suche_3.php">
<input type="text" name="suchbegriff" style="font-size: 18px; width: 360px;" value="<?=$suchBegriffValue?>" placeholder="Suchbegriff eingeben">
<button type="submit" name="go" style="font-size: 18px;">
Suchen
</button>
</form>

<br>
<table class="result_table">
<tr>
<th>id</th>
<th>title</th>
<th>body</th>
</tr>
<?php
foreach($result as $row) {
	echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td nowrap=\"nowrap\" valign=\"top\">" . $row['title'] . "</td>";
	echo "<td>" . $row['body'] . "</td>";
	echo "</tr>";
}
?>
</table>
<br>
<h2>Aufgaben</h2>
<p>Gib den Suchstring &quot;+MySQL -YourSQL&quot; ein. Welche Zeile wird ausgeschlossen?</p>
</div>
<script src="prism/prism.js"></script>
</body>
</html>
