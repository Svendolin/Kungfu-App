<?php
require("inc/credentials.php");


// Query für "beitraege" Tabelle
$query1 = "SELECT * FROM beitraege2";
$result1 = $dbh->query($query1);

// Query für "autoren" Tabelle
$query2 = "SELECT * FROM autoren2";
$result2 = $dbh->query($query2);

// Query mit LEFT JOIN
$query3 = "SELECT beitraege2.*, autoren2.id AS autid, autoren2.vorname, autoren2.nachname
FROM beitraege2
LEFT JOIN autoren2
ON beitraege2.autor_id = autoren2.id";
$result3 = $dbh->query($query3);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aliasse, das Schlüsselwort AS</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
<p><a href="index.html">&lt; Index</a></p>
<h1>Aliasse und das Schlüsselwort <code>AS</code></h1>
<p>Bei Joins stösst man sehr oft auf ein Problem: Spalten aus verschiedenen Tabellen, die man zusammenfügen möchte, haben den gleichen Namen. Bei der Ausgabe des Arrays mit dem Resultat der Abfrage ergibt sich somit ein Konflikt, wenn man die Spalte &quot;id&quot; ausgeben möchte. Genau für dieses Problem ist der Einsatz von sog. Aliassen in Queries gedacht.</p>
<p>Hier sind die gleichen Tabellen wie beim Beispiel &quot;LEFT JOIN&quot;, nur heissen die ersten Spalten (id) bei beiden Tabellen nun gleich:<p>

<h2>Tabelle beitraege2</h2>
<table class="db_table">
<tr>
<th>id</th>
<th>thema</th>
<th>titel</th>
<th>autor_id</th>
</tr>
<?php
foreach($result1 as $row) {
	echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['thema'] . "</td>";
	echo "<td>" . $row['titel'] . "</td>";
	echo "<td>" . $row['autor_id'] . "</td>";
	echo "</tr>";
}
?>
</table>

<h2>Tabelle autoren2</h2>
<table class="db_table">
<tr>
<th>id</th>
<th>vorname</th>
<th>nachname</th>
</tr>
<?php
foreach($result2 as $row) {
	echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['vorname'] . "</td>";
	echo "<td>" . $row['nachname'] . "</td>";
	echo "</tr>";
}
?>
</table>

<h2>Beiträge mit Autoren</h2>
<p></p>
<p><strong>Query mit <code>AS</code>:</strong></p>
<pre><code class="language-sql"><?=$query3?></code></pre>
<br>
<table class="result_table">
<tr>
<th>id (Tab. beitraege2)</th>
<th>titel</th>
<th class="lightred">autid (Alias)</th>
<th>vorname</th>
<th>nachname</th>
</tr>
<?php
foreach($result3 as $row) {
	echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['titel'] . "</td>";
	// Sowas schlägt leider fehl!
	// echo "<td>" . $row['autoren2.id'] . "</td>";
	// Spaltenname mit Alias:
	echo "<td class=\"lightred\">" . $row['autid'] . "</td>";
	echo "<td>" . $row['vorname'] . "</td>";
	echo "<td>" . $row['nachname'] . "</td>";
	echo "</tr>";
}
?>
</table>
<br>
<p>Beachte bitte den Code der Ausgabe dieser Tabelle: <code>$row['autid']</code> (farbige Spalte, siehe autid)</p>
<p><strong>Hinweis:</strong> Das Schlüsselwort <code>AS</code> muss nicht zwingend notiert werden, es empfiehlt sich aber meiner Meinung nach, es trotzdem einzusetzen (für die bessere Lesbarkeit von Query-Strings). Das ist natürlich &quot;Geschmackssache&quot; ...</p>
</div>
<script src="prism/prism.js"></script>
</body>
</html>
