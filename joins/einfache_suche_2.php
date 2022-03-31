<?php
require("inc/credentials2.php");
require("inc/highlight.func.php");
// Variable für das Value-Attribut des Suchfelds
$suchBegriffValue = "";
// Query erster Teil
$query = "SELECT customerNumber, customerName, contactLastName, contactFirstName, country
FROM customers
";
if (isset($_POST['go'])) {
	$query .= "WHERE contactLastName LIKE :suchbegriff
OR customerName LIKE :suchbegriff
OR contactFirstName LIKE :suchbegriff";
	// POST-Variable desinfizieren
	$cleanStr = filter_var($_POST['suchbegriff'], FILTER_SANITIZE_STRING);
	$suchBegriffValue = $cleanStr;
	// Wildcards (%) hinzufügen für bindParam
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
<title>Einfache Suche mit Prepared Statements</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
<p><a href="index.html">&lt; Index</a></p>
<h1>Einfache Suche mit Prepared Statements</h1>
<p><strong>Knacknuss:</strong> Wie muss ich den String für <strong>bindParam()</strong> mit den Prozentzeichen (Wildcards) formulieren?</p>
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
<form method="post" action="einfache_suche_2.php">
<input type="text" name="suchbegriff" style="font-size: 18px; width: 360px;" value="<?=$suchBegriffValue?>" placeholder="Suchbegriff eingeben">
<button type="submit" name="go" style="font-size: 18px;">
Suchen
</button>
</form>
<br>
<table class="result_table">
<tr>
<th>customerNumber</th>
<th>customerName</th>
<th>contactLastName</th>
<th>contactFirstName</th>
<th>country</th>
</tr>
<?php
foreach($result as $row) {
	echo "<tr>";
	echo "<td>" . $row['customerNumber'] . "</td>";
	echo "<td>" . highlight($row['customerName'],$suchBegriffValue) . "</td>";
	echo "<td>" . highlight($row['contactLastName'],$suchBegriffValue) . "</td>";
	echo "<td>" . highlight($row['contactFirstName'],$suchBegriffValue) . "</td>";
	echo "<td>" . $row['country'] . "</td>";
	echo "</tr>";
}
?>
</table>
<br>
<br>
<h2>Aufgabe</h2>
<p>Erweitere die Query: die Suche soll über die Spalten &quot;customerName&quot;, &quot;contactLastName&quot; und &quot;contactFirstName&quot; erfolgen!</p>
</div>
<script src="prism/prism.js"></script>
</body>
</html>
