<?php
require("Apachenland/User.class.php"); // Pfad angeben, Namespace Name hat hier keinen Einfluss
require("Irokesenland/User.class.php"); // Pfad angeben, Namespace Name hat hier keinen Einfluss

// Instanziierung mit dem Namen des Namespace der Klasse als Präfix
$instanz1 = new Apachenland\User(); // Namespace Namen "Apachenland" / Sowie Klassennamen der doppelt vorkommt User()
$instanz2 = new Irokesenland\User(); // Namespace Namen "Irokesenland" / Sowie Klassennamen der doppelt vorkommt User()
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Namespaces: Zwei Klasse mit demselben Namen, mit Namespace</title>
</head>
<body>

</body>
</html>
