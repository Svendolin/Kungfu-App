<?php
require("inc/credentials.php");

// Query für "books" Tabelle
$query1 = "SELECT * FROM books";
$result1 = $dbh->query($query1);

// Query für "book_cat" Tabelle
$query2 = "SELECT * FROM book_cat";
$result2 = $dbh->query($query2);

// Query mit INNER JOIN
$query3 = "SELECT book_id, book_tit, cat_descr FROM books
INNER JOIN book_cat
ON books.cat_id = book_cat.cat_id
WHERE books.pub_lang = 'English'";
$result3 = $dbh->query($query3);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>INNER JOIN</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
<p><a href="index.html">&lt; Index</a></p>
<h1>INNER JOIN (Beispiel)</h1>
<p>Die Informationen sind in zwei Tabellen abgelegt.</p>
<p><img src="images/Inner_Join.png" width="320" height="216" alt="Inner_Join"></p>
<h2>Tabelle books</h2>
<table class="db_table">
<tr>
<th>book_id</th>
<th>book_tit</th>
<th>isbn_no</th>
<th>cat_id</th>
<th>pub_lang</th>
<th>book_price</th>
</tr>
<?php
foreach($result1 as $row) {
	echo "<tr>";
	echo "<td>" . $row['book_id'] . "</td>";
	echo "<td>" . $row['book_tit'] . "</td>";
	echo "<td>" . $row['isbn_no'] . "</td>";
	echo "<td>" . $row['cat_id'] . "</td>";
	echo "<td>" . $row['pub_lang'] . "</td>";
	echo "<td>" . $row['book_price'] . "</td>";
	echo "</tr>";
}
?>
</table>

<h2>Tabelle book_cat</h2>
<table class="db_table">
<tr>
<th>cat_id</th>
<th>cat_descr</th>
</tr>
<?php
foreach($result2 as $row) {
	echo "<tr>";
	echo "<td>" . $row['cat_id'] . "</td>";
	echo "<td>" . $row['cat_descr'] . "</td>";
	echo "</tr>";
}
?>
</table>

<h2>Englische Bücher, inklusive Spalte cat_descr</h2>
<p><strong>Ziel:</strong> Ich möchte gerne die englischen Bücher <strong>mit der Kategorie</strong> anzeigen lassen</p>
<p><strong>Query:</strong></p>
<pre><code class="language-sql"><?=$query3?></code></pre>
<br>
<table class="result_table">
<tr>
<th>books: book_id</th>
<th>books: book_tit</th>
<th>book_cat: cat_descr</th>
</tr>
<?php
foreach($result3 as $row) {
	echo "<tr>";
	echo "<td>" . $row['book_id'] . "</td>";
	echo "<td>" . $row['book_tit'] . "</td>";
	echo "<td>" . $row['cat_descr'] . "</td>";
	echo "</tr>";
}
?>
</table>
<br>
<h2>Fragen</h2>
<ol>
	<li>Das Beispiel würde sich auch mit einem PHP-Array, in welchem die Kategorien abgelegt sind,  umsetzen lassen. Was sind die Vor- und Nachteile einer solche Vorgehensweise?</li>
	<li>Bei beiden Tabellen gibt es die Spalte &quot;cat_id&quot;. Ist diese Namensgebung zwingend notwendig?</li>
	<li>Öffne die Tabelle &quot;books&quot; in phpMyAdmin. Versuche, in einem Datensatz die Spalte &quot;cat_id&quot; zu ändern. Was stellst du fest? Warum kann dir das Tool dabei so praktisch helfen?</li>
</ol>
<p><img src="images/phpMyAdmin_book.png" style="width: 100%; max-width: 600px; height: auto;" alt="phpMyAdmin_book"></p>
</div>
<script src="prism/prism.js"></script>
</body>
</html>
