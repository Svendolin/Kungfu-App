<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Hacken verhindern 1: Schutzlos ausgeliefert</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="gelborange">Hacken verhindern 1: Schutzlos ausgeliefert</h2>
	<ul class="explanation">
		<li>Bei einer Art von XSS-Attacke wird versucht, ein Code-Schnippsel durch ein Formular einzuschleusen, das ausführbares JavaScript enthält.</li>
		<li><a href="https://de.wikipedia.org/wiki/Cross-Site-Scripting" target="_blank">XSS erklärt bei Wikipedia</a></li>
		<li><a href="https://www.owasp.org/index.php/XSS_Filter_Evasion_Cheat_Sheet#Half_open_HTML.2FJavaScript_XSS_vector" target="_blank">Beispiele: &quot;XSS Filter Evasion Cheat Sheet&quot; bei OWASP</a></li>
		<li>Schreibe einen HTML-Tag in das Feld &quot;Username&quot; ein und verschicke das Formular: Was passiert genau bei der Ausgabe des Wertes?</li>
		<li>Z.B. kann der User HTML code in den Username eingeben und sich so anzeigen lassen...</li> <!-- Probiere es mal <h1>Hallo</h1> -->
	</ul>
	
<?php
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	// ja
	echo "<div class=\"feedback_positiv\">";
	echo "Das Formular wurde verschickt.<br>";
	echo "Hallo ".$_POST['username']; // NICHT GUT, Hacken Verhindern 2 verrät hier die Lösung
	echo "</div>\n";
}
?>

	<form action="hacken_verhindern_1.php" method="post">
		<div>
			<label for="username">Username</label>
			<input type="text" id="username" name="username">
		</div>
		<div>
			<label for="passwort">Passwort</label>
			<input type="password" id="passwort" name="passwort">
		</div>
		<button type="submit" name="go">Log in</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>
