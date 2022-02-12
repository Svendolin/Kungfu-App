<?php
$myVar = "Hallo Welt";
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Syntax-Kurzform von echo</title>
</head>
<body>
<p class="explanation">Normaler <code>echo</code>:</p>
<?php
echo $myVar;
?>
<p class="explanation">Syntax-Kurzform von <code>echo</code>. Es kann damit ähnlich wie mit einem HTML-Tag gearbeitet werden.</p>
<?=$myVar?>
<p class="explanation"><a href="http://php.net/manual/de/function.echo.php" target="_blank">http://php.net/manual/de/function.echo.php</a></p>
</body>
</html>
