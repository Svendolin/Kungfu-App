<?php
require("inc/credentials2.php");

$query = "SELECT * FROM INFORMATION_SCHEMA.INNODB_FT_DEFAULT_STOPWORD;";
$result = $dbh->query($query);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Stoppwörter und Limiten</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
<p><a href="index.html">&lt; Index</a></p>
<h1>Stoppwörter und Limiten: &quot;Risko-Versicherungen&quot;</h1>
<p>Um die Volltextsuche nicht zu überlasten, gibt es gewisse &quot;Risko-Versicherungen&quot; in der Datenbank-Maschine.</p>
<p>Diese Massnahmen stehen bei einfachen Suchen mit <code>LIKE</code> <strong>nicht</strong> zur Verfügung, du müsstest sie &quot;von Hand&quot; programmieren.</p>
<h2>1. Eine Tabelle mit Wörtern, die beim Suchen ausgeblendet werden</h2>
<p><strong>Query:</strong></p>
<pre><code class="language-sql"><?=$query?></code></pre>
<h3>Die Default-Stoppwörter in deiner DB (InnoDB) sind:</h3>
<p style="color: red; font-size: 20px;">
<?php
foreach($result as $row) {
	echo $row['value'];
	echo ", ";
}
?>
</p>
<p>Die Liste kannst du mit deutschen Begriffen ergänzen, du kannst Sie aber auch ganz ersetzen. Eine Anleitung dafür findest du u.a. hier:<br>
<a href="http://acmeextension.com/how-to-configure-full-text-stopwords-mysql-innodb-and-myisam/" target="_blank">acmeextension.com/how-to-configure-full-text-stopwords-mysql-innodb-and-myisam/</a><br>
<a href="https://www.ulrischa.de/mysql-volltextsuche-stoppwoerter-fuer-deutsche-sprache-konfigurieren/">www.ulrischa.de/mysql-volltextsuche-stoppwoerter-fuer-deutsche-sprache-konfigurieren/</a></p>
</p>
<br>
<h2>2. Minimale und maximale Limite bei der Länge von Suchstrings</h2>

<p>Worte, die <strong>kürzer als 3 Zeichen</strong> oder <strong>länger als 84 Zeichen</strong> (InnoDB) sind, werden bei der Suche nicht berücksichtigt. Sie werden erst gar nicht in den Index aufgenommen.<br>
Maximale und minimale Wortlängenwerte sind mit den Variablen <strong>innodb_ft_max_token_size</strong> und <strong>innodb_ft_min_token_size</strong> konfigurierbar.</p>
<p>Wenn du etwas an diesen Parametern änderst, musst du die Indizes erneut anlegen, damit sie angewendet werden. Somit lohnt es sich, das gut zu planen und vorgängig mit Dummy-Datensätzen zu testen, bevor man &quot;richtige&quot; Daten in die DB einfüllt. Ausserdem musst du abklären, ob der Provider eine Änderung überhaupt erlaubt!</p>
<br>
</div>
</body>
<script src="prism/prism.js"></script>
</html>
