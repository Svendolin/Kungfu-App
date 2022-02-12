<?php
require("inc/credentials.php");

// Query für "beitraege" Tabelle
$query1 = "SELECT * FROM beitraege";
$result1 = $dbh->query($query1);

// Query für "autoren" Tabelle
$query2 = "SELECT * FROM autoren";
$result2 = $dbh->query($query2);

// Query mit LEFT JOIN
$query3 = "SELECT beitraege.*, autoren.vorname, autoren.nachname FROM beitraege
LEFT JOIN autoren
ON beitraege.autor_id = autoren.autor_id";
$result3 = $dbh->query($query3);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LEFT JOIN</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
<p><a href="index.html">&lt; Index</a></p>
<h1>LEFT (OUTER) JOIN</h1>
<p><img src="images/Left_Join.png" width="320" height="216" alt="Left_Join"></p>
<h2>Tabelle beitraege</h2>
<table class="db_table">
<tr>
<th>beitrag_id</th>
<th>thema</th>
<th>titel</th>
<th>autor_id</th>
</tr>
<?php
foreach($result1 as $row) {
	echo "<tr>";
	echo "<td>" . $row['beitrag_id'] . "</td>";
	echo "<td>" . $row['thema'] . "</td>";
	echo "<td>" . $row['titel'] . "</td>";
	echo "<td>" . $row['autor_id'] . "</td>";
	echo "</tr>";
}
?>
</table>

<h2>Tabelle autoren</h2>
<table class="db_table">
<tr>
<th>autor_id</th>
<th>vorname</th>
<th>nachname</th>
</tr>
<?php
foreach($result2 as $row) {
	echo "<tr>";
	echo "<td>" . $row['autor_id'] . "</td>";
	echo "<td>" . $row['vorname'] . "</td>";
	echo "<td>" . $row['nachname'] . "</td>";
	echo "</tr>";
}
?>
</table>

<h2>Beiträge mit Autoren</h2>
<p><strong>Query:</strong></p>
<pre><code class="language-sql"><?=$query3?></code></pre>
<p>ON schlägt sozusagen die Brücke zwischen den beiden Tabellen ...</p>
<br>
<table class="result_table">
<tr>
<th>beitrag_id</th>
<th>titel</th>
<th>vorname</th>
<th>nachname</th>
</tr>
<?php
foreach($result3 as $row) {
	echo "<tr>";
	echo "<td>" . $row['beitrag_id'] . "</td>";
	echo "<td>" . $row['titel'] . "</td>";
	echo "<td>" . $row['vorname'] . "</td>";
	echo "<td>" . $row['nachname'] . "</td>";
	echo "</tr>";
}
?>
</table>
<p><strong>Wichtig:</strong> Es werden auch die Beiträge anzeigt, zu denen kein Autor gefunden wird! Bei einem INNER JOIN (vergl. letzte Seite) wäre das nicht so.</p>
</div>
<script src="prism/prism.js"></script>
</body>
</html>
