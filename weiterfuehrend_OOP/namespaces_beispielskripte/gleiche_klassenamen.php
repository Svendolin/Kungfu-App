<?php
require("class1/User.class.php");
require("class2/User.class.php");
// Konflikt, da PHP mit new User arbeiten muss - Dieser Vorgang schlägt im Browser fehl!
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Namespaces: Zwei Klassen mit demselben Namen</title>
</head>
<body>
	<p> class1 hat den Klassennamen USER in User.class.php UND class2 hat den Klassennamen USER in User.class.php</p>

</body>
</html>
