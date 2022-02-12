<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Der Fehler 1</title>
</head>
<body>
<?php
session_start();
?>
</body>
</html>

<!-- Lösung: session_start(); sollte nicht IM sondern VOR dem HTML stehen -->
