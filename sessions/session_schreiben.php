<?php
session_start();
$_SESSION['state'] = "Ich bin eingeloggt."; // [Name der Session] = Beliebig
?> 
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Session schreiben</title>
</head>
<body>
<h2>Session schreiben</h2>
<p>Diese Seite soll ein Login-Vorgang grundsätzlich andeuten: Dieses Script <strong>schreibt</strong> eine Session.<p>

<p>An dieser Stelle wäre dann das Login-Formular ...</p>
</body>
</html>
