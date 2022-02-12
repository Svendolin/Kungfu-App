<?php
session_start();
if (isset($_SESSION['state']) && $_SESSION['state'] == "Ich bin eingeloggt.") {
	$ausgabe = "<p>Wert in der SESSION-Vars: ".$_SESSION['state']."</p>\n";
}
else {
	// Umleitung auf Login-Seite
	header('Location: session_schreiben.php'); // Name der Datei angeben, wohin man geführt werden soll. Befindet sich das in einem eigenen Ordner, so muss der auch angegeben werden im Pfad z.B. header('Location:sessiontime/session_schreiben.php')
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Session lesen oder umleiten</title>
</head>
<body>
<h2>Session lesen oder umleiten</h2>
<p>Diese Seite soll eine Seite andeuten, die nur angemeldeten Benutzern zur Verfügung stehen soll.<p>
<p>Falls das Lesen der Session fehlschlägt, wird auf die Seite <strong>umgeleitet</strong>, welche das Login andeutet.</p>
<?php
	echo $ausgabe;
?>
<p>Wenn man das sieht, ist man also auf dieser Seite verblieben :-o</p>
</body>
</html>
