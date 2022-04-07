<?php
// DIESE VERSION IST IM: NATURAL LANGUAGE MODE (EINFACHERE ZU EMPFEHLENDE VARIANTE)
require("inc/credentials2.php");
// Variable für das Value-Attribut des Suchfelds
$suchBegriffValue = "";
// Query erster Teil
$query = "SELECT * FROM volltext2
";
if (isset($_POST['go'])) {
	$query .= "WHERE MATCH (titel, dummytext)
AGAINST (:suchbegriff IN NATURAL LANGUAGE MODE)";
	// POST-Variable desinfizieren
	$cleanStr = filter_var($_POST['suchbegriff'], FILTER_SANITIZE_STRING);
	$suchBegriffValue = $cleanStr;

	$suchBegriff = "%".$cleanStr."%";

	$stmt = $dbh->prepare($query);
	$stmt->bindParam(":suchbegriff", $suchBegriff);
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
<title>Volltext Suche - mehrere Spalten</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
<p><a href="index.html">&lt; Index</a></p>
<h1>Volltext Suche über mehrere Spalten (Aufgabe)</h1>
<ol>
<li>Erstelle für diese Seite zuerst in phpMyAdmin eine Kopie der Tabelle &quot;volltext&quot; und taufe diese &quot;volltext2&quot;</li>
<li>Erstelle darin FULLTEXT Indizes (s.u.), damit die Suche auch in der Spalte &quot;dummytext&quot; läuft.</li>
<li>Ändere nun die Query ab</li>
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
<form method="post" action="volltext_suche_2.php">
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
<h2>FULLTEXT Indizes über mehrere Spalten anlegen</h2>
<p>Um die Volltextsuche über mehrere Spalten zu ermöglichen, muss zuerst ein &quot;FULLTEXT&quot;-Index über die Spalten angelegt und getauft werden:</p>
<p><img src="images/Fulltext_index_taufen.png" style="width: 300px;"></p>
<p><img src="images/Fulltext_namen.png" style="width: 1000px;"></p>
</div>
<script src="prism/prism.js"></script>
</body>
</html>
