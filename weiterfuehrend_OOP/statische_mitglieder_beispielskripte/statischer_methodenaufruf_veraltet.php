<?php
include("class/Bauplan2.class.php");

// Aufrufen einer nicht-statischen Methode, als wäre sie statisch
$ausgabe = Bauplan2::hallihallo();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Statische Methoden</title>
</head>
<body>
<p>Sie sehen ab PHP 7 auf dieser Seite eine &quot;Deprecated&quot;-Warnmeldung, das Script wird trotzdem abgearbeitet. In nachfolgenden PHP-Versionen wird sich das ändern.</p>
<?php
echo $ausgabe;
?>
</body>
</html>
