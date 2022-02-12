<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Session lesen</title>
</head>
<body>
<h2>Session lesen</h2>
<p>Diese Seite soll einen geschützten Bereich andeuten, der nur angemeldeten Benutzern zur Verfügung stehen soll.<p>
<p>Es versucht, eine Session zu <strong>lesen</strong>.</p>
<?php
if (isset($_SESSION['state']) && $_SESSION['state'] == "Ich bin eingeloggt.") { //['state'] = Name der Session. Beliebig wählbar. Hier prüfen wir, ob sie gestzt wurde
	echo "<p>Wert in der SESSION-Vars: ".$_SESSION['state']."</p>\n";
}
else {
	echo "<p>Kann die Session-Var nicht lesen.</p>\n";
}
?>
</body>
</html>
