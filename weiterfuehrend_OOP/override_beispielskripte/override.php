<?php
include("class/Haustier.class.php");
include("class/Bakterie.class.php");
$instanz = new Bakterie();
$ausgabe = $instanz -> WasBinIch();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Override</title>
</head>
<body>
<?php
echo "Die Ausgabe des Overrides siehst du hier: <br>";
echo $ausgabe;
?>
</body>
</html>
