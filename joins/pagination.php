<?php
// https://codeshack.io/how-to-create-pagination-php-mysql/

/*
Rufe diesen Link auf, um dieses Script auf dem Browser anzeigen zu lassen:
http://localhost/OOP_PDO_MVC/webapp_kungfu%20(LOCAL)/joins3_2/pagination.php
(!Achtung: Pfad kann varrieren je nach Computer)
*/


require("inc/credentials2.php");
// 1) Query: Wie viele Datensätze gibt es insgesamt?
$countQuery = "SELECT COUNT(*) FROM customers AS total";
$result = $dbh->query($countQuery);
$total = $result->fetchColumn();

// 2) Treffer pro Seite definieren - Wie viele Datensätze möchte ich "pro Seite" anzeigen?
$numHits = 20;

// 3) Ab welcher Grenze soll die Pagination (3. Variante) angezeigt werden?
$showFullPagination = 6;

// 4) Wie viele "Seiten" gibt es?
// ceil() gibt die nächste Ganzzahl, die grösser oder gleich der Zahl ist, zurück.
$numPages = ceil($total / $numHits); // ceil() = Aufrunden auf die nächste Ganzzahl // floor() = Abrunden // round() = allgemein runden

// 5) Was ist die aktuelle Seite? Mit GET-Parmeter anzeigen - Das heisst: IMMER SANITIZEN!
if (isset($_GET['page'])) {
	$cleanPageNr = filter_var($_GET['page'], FILTER_SANITIZE_STRING);
	if (is_numeric($cleanPageNr)) { // is_numeric() = Herausfinden, ob es sich im eine Zahl handelt
		$currentPage = $cleanPageNr;
		$isCurrentPageValueFromGETParam = "<span style=\"color: green\">Ja</span>";
	}
	else {
		$currentPage = 1;
		$isCurrentPageValueFromGETParam = "<span style=\"color: red\">Nein, der GET-Param war keine Zahl</span>";
	}

}
else {
	$currentPage = 1;
	$isCurrentPageValueFromGETParam = "<span style=\"color: red\">Nein, der GET-Param war nicht vorhanden.</span>";
}
// 6) Was ist der OFFSET (Nummer des Start-Datensatz) // Unsere mathemtische Berechnung dazu:
$offset = ($currentPage - 1) * $numHits; 

// 7) Nun bereit, die effektive Query abzusetzen
$query = "SELECT customerNumber, customerName, contactLastName, contactFirstName, country
FROM customers
ORDER BY customerName
LIMIT $offset, $numHits";

$result = $dbh->query($query);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pagination</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="styles_pagination.css">

</head>
<body>
<div id="container">
<p><a href="index.html">&lt; Index</a></p>
<h1>Pagination für die Tabelle &quot;customers&quot;</h1>

<p>Hier musst du verstehen, was der Schlüsselwort <code>LIMIT</code> bedeutet. Der &quot;offset&quot; sucht übrigens <strong>nicht</strong> im Primärschlüssel, sondern in der Reihenfolge der Ausgabe!!!</p>

<p><strong>Die Basis für die Algorithmen:</strong><br>
Ergebnis einer Query: die Anzahl <strong>aller</strong>  Datensätze beträgt: <?=$total?><br>
Wurde so defniert: die Anzahl der Datensätze, die <strong>pro Seite</strong> angezeigt werden soll: <?=$numHits?><br>
Die daraus berechnete Anzahl <strong>aller Seiten</strong> beträgt: <?=$numPages?><br>
Die <strong>aktuelle Seite</strong> ist: <?=$currentPage?><br>
Wurde der Wert für die aktuelle Seite durch den GET-Param bestimmt: <?=$isCurrentPageValueFromGETParam?><br>
Der erste Datensatz zum Anzeigen, der sog. <strong>&quot;offset&quot;</strong> ist: <?=$offset?><br>
Ab dieser Grenze wird die volle Pagination angezeigt: <?=$showFullPagination?></p>

<p><strong>Query:</strong></p>
<pre><code class="language-sql"><?=$query?></code></pre>
<br>
<table class="db_table" style="margin: 0 auto;">
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
	echo "<td>" . $row['customerName'] . "</td>";
	echo "<td>" . $row['contactLastName'] . "</td>";
	echo "<td>" . $row['contactFirstName'] . "</td>";
	echo "<td>" . $row['country'] . "</td>";
	echo "</tr>";
}
?>
</table>
<br>
<div style="font-size: 28px; text-align: center;">

<!-- 3 PAGINATION VARIANTEN -->


<?php
// ---------- 1. Variante für Spartaner (ELEMENTARE PAGINTION) ---------- //
// Pfeil für "Zurück", wird auf der ersten Seite ausgeblendet:
if ($currentPage != 1) {
	echo "<a style=\"text-decoration: none;\" href=\"pagination.php?page=".($currentPage - 1)."\">&lt;</a>";
}
echo "&nbsp;&nbsp;".$currentPage."/".$numPages."&nbsp;&nbsp;";
// Pfeil für "Vorwärts", wird auf der letzten Seite ausgeblendet:
if ($currentPage < $numPages) {
	echo "<a style=\"text-decoration: none;\" href=\"pagination.php?page=".($currentPage + 1)."\">&gt;</a>";
}
?>
</div>
<hr>
<div style="font-size: 24px; text-align: center;">



<?php
// ---------- 2. Variante für Kontrollfreaks ---------- //
for ($i = 1; $i<=$numPages; $i++) {
	echo "<a href=\"pagination.php?page=".$i."\"";
	// Markiere im Link, welches die aktive Seite ist
	if ($i == $currentPage) {
		echo " style=\"color: red; text-decoration: none; font-weight: bold;\"";
	}
	echo ">".$i."</a>&nbsp;&nbsp;";
}
?>
</div>
<hr>
<div style="text-align: center;">




<?php
// ---------- 3. Variante für Nerds ---------- //
echo "<ul class=\"pagination\">\n";
if ($numPages > $showFullPagination) {
	// Zeige "grosse" Variante
	// Variable für den Code für die "Zwischenräume"
	$dots = "<li class=\"dots\">...</li>\n";

	// "Prev" Button, wird dann angezeigt, wenn man NICHT auf der ersten Seite ist
	if ($currentPage > 1) {
		echo "<li class=\"prev\"><a href=\"pagination.php?page=".($currentPage - 1)."\">Prev</a></li>\n";
	}

	// Der erste Zahl-Button wird IMMER angezeigt
	echo "<li class=\"start";
	if ($currentPage == 1) {
		echo " currentpage";
	}
	// echo "\"><a href=\"pagination.php?page=1\">1</a></li>\n";
	echo '"><a href="pagination.php?page=1">1</a></li>'."\n";

	// Zeige dots links vom Feld
	if ($currentPage >= 5) {
		echo $dots;
	}

	// Zeige "Feld" mit den Buttons, zwei Zahlen links und zwei rechts von der aktuellen Seite
	$startFieldNr = $currentPage - 2;
	$endFieldNr = $currentPage + 2;
	for ($i=$startFieldNr; $i<=$endFieldNr; $i++) {
		if ($i > 1 && $i < $numPages) {
			echo "<li";
			if ($i == $currentPage) {
				echo " class=\"currentpage\"";
			}
			echo "><a href=\"pagination.php?page=".$i."\">".$i."</a></li>\n";
		}
	}

	// Zeige dots rechts vom Feld
	if ($currentPage < ($numPages - 3)) {
		echo $dots;
	}

	// Der letzte Zahl-Button wird IMMER angezeigt
	echo "<li class=\"end";
	if ($currentPage == $numPages) {
		echo " currentpage";
	}
	echo "\"><a href=\"pagination.php?page=".$numPages."\">".$numPages."</a></li>\n";

	// "Next" Button, wird dann angezeigt, wenn man NICHT auf der letzten Seite ist
	if ($currentPage < $numPages) {
		echo "<li class=\"next\"><a href=\"pagination.php?page=".($currentPage + 1)."\">Next</a></li>\n";
	}
}
else {
	// Zeige "kleine" Variante
	for ($i = 1; $i<=$numPages; $i++) {
		echo "<li";
		if ($i == $currentPage) {
			echo " class=\"currentpage\"";
		}
		echo "><a href=\"pagination.php?page=".$i."\">".$i."</a></li>\n";
	}
}
echo "</ul>\n";
?>
</div>
<hr>
<h2>Aufgabe für die dritte Variante:</h2>
<p>Beim dritten Ansatz müsste man noch eine Grenze definieren: ab wie vielen angezeigten Seiten soll diese Art von Pagination angezeigt werden?<br>
Bei wenigen Seiten macht diese Art nämlich überhaupt keinen Sinn!</p>
<p>Programmiere eine Bedingung: Bei weniger als 6 Seiten soll die zweite Variante angezeigt werden und diese soll die selben CSS-Stile haben.<br>
Erst ab 6 Seiten soll die dritte Variante mit der vollumfänglichen Funktionalität erscheinen.</p>
</div>
<script src="prism/prism.js"></script>
</body>
</html>
