<?php
/* Wichtig: Im realen Leben braucht es mehr Sicherheitsvorkehrungen !!!
siehe nächste Seite ... */

require("inc/credentials2.php");
require("inc/highlight.func.php");
// Variable für das Value-Attribut des Suchfelds
$suchBegriffValue = "";
// Query erster Teil
$query = "SELECT customerNumber, customerName, contactLastName, contactFirstName, country
FROM customers
";
if (isset($_POST['go'])) {
	$query .= "WHERE contactLastName LIKE '%".$_POST['suchbegriff']."%'
	OR customerName LIKE '%".$_POST['suchbegriff']."%'
	OR contactFirstName LIKE '%".$_POST['suchbegriff']."%'";	
	$suchBegriffValue = $_POST['suchbegriff'];
}

$result = $dbh->query($query);
$hitsNr = $result->rowCount();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Einfache Suche</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
<p><a href="index.html">&lt; Index</a></p>
<h1>Einfache Suche mit <code>LIKE</code></h1>

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
<form method="post" action="einfache_suche.php">
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
	echo "<td>" . highlight($row['customerName'],$suchBegriffValue). "</td>";
	echo "<td>" . highlight($row['contactLastName'],$suchBegriffValue). "</td>";
	echo "<td>" . highlight($row['contactFirstName'] ,$suchBegriffValue). "</td>";
	echo "<td>" . $row['country'] . "</td>";
	echo "</tr>";
}
?>
</table>
<br>
<h2>Fragen</h2>
<ul>
	<li>Was bedeuten die Prozentzeichen (Wildcards) in der Query (s. Code)? </li>
	<li>Warum braucht es zwei Prozentzeichen?</li>
	<li>Ist die Suche case-sensitive?</li>
</ul>
<br>
<h2>Aufgabe</h2>
<p>Erweitere die Query: die Suche soll über die Spalten &quot;customerName&quot;, &quot;contactLastName&quot; und &quot;contactFirstName&quot; erfolgen!</p>
</div>
<script src="prism/prism.js"></script>
</body>
</html>
