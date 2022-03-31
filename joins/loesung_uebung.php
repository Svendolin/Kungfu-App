<?php
require("inc/credentials2.php");

// Query
$query = "SELECT lastName, firstName, customerName, checkNumber, amount
FROM employees
LEFT JOIN customers ON employeeNumber = salesRepEmployeeNumber
LEFT JOIN payments ON payments.customerNumber = customers.customerNumber
ORDER BY customerName, checkNumber";
$result = $dbh->query($query);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lösung der Übung</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
<p><a href="index.html">&lt; Index</a></p>
<h1>Lösung der Übung</h1>

<p><strong>Query:</strong></p>
<pre><code class="language-sql"><?=$query?></code></pre>
<h2>Ausgabe</h2>
<table class="db_table">
<tr>
<th colspan="2">Tabelle &quot;employees&quot;:</th>
<th>Tabelle &quot;customers&quot;:</th>
<th colspan="2">Tabelle &quot;payments&quot;:</th>
</tr>
<tr>
<th>lastName</th>
<th>firstName</th>
<th>customerName</th>
<th>checkNumber</th>
<th>amount</th>
</tr>
<?php
foreach($result as $row) {
	echo "<tr>";
	echo "<td>" . $row['lastName'] . "</td>";
	echo "<td>" . $row['firstName'] . "</td>";
	echo "<td>" . $row['customerName'] . "</td>";
	echo "<td>" . $row['checkNumber'] . "</td>";
	echo "<td>" . $row['amount'] . "</td>";
	echo "</tr>";
}
?>
</table>
<br>
<p>
Quelle der Übung:<br>
<a href="https://www.mysqltutorial.org/mysql-left-join.aspx" target="_blank">www.mysqltutorial.org</a><br>
(Die dort zur Verfügung stehenden Tabellen habe ich leicht abgeändert)</p>
<br>
</div>
<script src="prism/prism.js"></script>
</body>
</html>
