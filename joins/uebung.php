<?php
require("inc/credentials2.php");

// Query
$query = "SELECT lastName, firstName, customerName, checkNumber, amount
FROM employees
LEFT JOIN customers
ON employeeNumber = salesRepEmployeeNumber
LEFT JOIN payments
ON payments.customerNumber = customers.customerNumber
ORDER BY lastName, firstName, customerName, checkNumber";

$result = $dbh->query($query);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Übung</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
<p><a href="index.html">&lt; Index</a></p>
<h1>Übung</h1>
<ul>
<li>Installiere die DB &quot;classicmodels&quot; im dumps-Ordner, falls du das nicht schon gemacht hast.</li>
<li>Setze die Fremdschlüssel so wie im folgenden Schema:</li>
</ul>
<p><img src="images/payments-customers-employees.png" width="634" height="304" alt="payments-customers-employees"></p>
<ul>
<li>Formuliere nun eine Query, welche die Daten für die untenstehende Tabelle produziert (s. Spaltennamen).<br>
Tipp: Beginne in deiner Query mit der Tabelle Tabelle &quot;employees&quot;<br>
Hinweis: Du brauchst dafür <strong>zwei LEFT JOINS</strong> ...</li>
<li>Die Ausgabe soll nach den Werten in den Spalten <strong>customerName</strong> und <strong>checkNumber</strong> sortiert werden (ORDER BY).</li>
</ul>
<br>
<p><strong>Query:</strong><br>
<pre><code class="language-sql"><?=$query?></code></pre>

<h2>Ausgabe</h2>
<table class="result_table">
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
</div>
<script src="prism/prism.js"></script>
</body>
</html>
