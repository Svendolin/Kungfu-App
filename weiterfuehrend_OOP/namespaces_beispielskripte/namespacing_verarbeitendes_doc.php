<?php
// Somit bringt man das verarbeitende Dokument in's A) Apachenland:
namespace Apachenland;


require("Apachenland/User.class.php");
require("Irokesenland/User.class.php");

// Weil wir uns jetzt im A) Apachenland befinden,
// kann die User-Klasse im Apachenland so instanziert werden:
$instanz1 = new User();

/* Weil wir uns jetzt im A) Apachenland befinden,
 muss der Pfad für die Userklasse im B) Irokesenland von "zuoberst",
 also vom globalen Namespace aus, angegeben werden:

*/
$instanz2 = new \Irokesenland\User(); // SOMIT: Explizit sagen
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Namespaces: Im verarbeitenden Dokument wird auch mit Namespaces gearbeitet</title>
</head>
<body>
<?php
echo "<br><br>";
echo "Das verarbeitende Dokument ist im Namespace ".__namespace__;
?>
</body>
</html>
