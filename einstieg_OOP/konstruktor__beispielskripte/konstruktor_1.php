<?php
require("class/Konstruktiv.class.php");
/*
- Die Konstruktormethode wird beim Instanziieren automatisch abgearbeitet
- Sie wird also nicht explizit aufgerufen
*/

// 1) Instanzierung mit new und Klassenname() (In $instanz ist der ganze Bauplan):
$instanz = new Konstruktiv();
// - __construct() wird nicht aufgerufen, da in Konstruktiv.class.php die GRUNDVERSORGUNG hergestellt wurde

?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Die Konstruktormethode: Beispiel 1</title>
</head>
<body>
<?php
echo $instanz -> ausgabe; // Eigenschaft "ausgabe" NICHT $ausgabe, in PHP so geregelt
?>
</body>
</html>
