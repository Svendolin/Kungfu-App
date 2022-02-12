<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Personenfahnung Lösung</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>	
	<h2 class="braun">Personenfahnung Lösung</h2>
	<p class="explanation"><strong>Hinweis:</strong> Bei den Queries sind mehrere Lösungen möglich, da die Übungs-Tabelle nur 200 Datensätze umfasst. Versuche, <strong>möglichst genaue und einschränkende Abfragen</strong> zu formulieren, die auch erfolgreich sein würden, wenn es tausende von Datensätzen haben würde (s. Lösung vom ersten Fall).</p>
	<ol class="explanation">
		<li><strong>Furrer Ivan</strong><br>
		Query: <code>SELECT * FROM Personen WHERE Ort = 'Winterthur' AND Geschl = 'M' AND Alt < 18 AND Groesse > 175 AND Gewicht < 70 AND Hobbys LIKE '%Fussball%'</code></li>
		
		<li><strong>Bertschi Christian</strong><br>
		Query: <code>...</code></li>
		
		<li><strong>Steuber Esther</strong> (Fuhrmann Stefan hat keine langen Haare, sondern eine Skinhead-Frisur)<br>
		Query: <code>...</code></li>

		<li><strong>Fabrizzo Raphael</strong><br>
		Query: <code>...</code></li>

		<li><strong>Kaufmann Sandra</strong><br>
		Query: <code>...</code></li>

		<li><strong>Rodriquez Cecilla</strong> (Cavigelli Maria unterrichtet Deutsch, spricht also sicher nicht gebrochen Deutsch)<br>
		Query: <code>...</code></li>

		<li><strong>Bleuler Margrit</strong><br>
		Query: <code>...</code></li>

		<li><strong>Karrer Alice</strong> (Bodenmann Sarah hat keine hellen Haare, Aeschlimann Klara ist bettlägrig)<br>
		Query: <code>...</code></li>

		<li><strong>Lauber Walter</strong><br>
		Query: <code>...</code></li>

		<li><strong>Fröhlich Martina</strong> (Teuscher Martin hat eine Glatze)<br>
		Query: <code>...</code></li>
		
	</ol>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>
