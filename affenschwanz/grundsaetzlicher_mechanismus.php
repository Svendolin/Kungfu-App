<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Grundsätzlicher Mechanismus</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="gelborange">Grundsätzlicher Mechanismus für Affenschwanz-Formulare</h2>
	<p class="explanation">Erklärungen sind im Code (s. Kommentare)</p>
<?php
// Checke, ob der Submit-Button "go" geklickt wurde (name="go" des buttons im HTML)
if (isset($_POST['go'])) { // "Ist die post-variable gesetzt? = isset?
	// ja, wir sind im zweiten oder xten Affenschwanz-Durchgang = Grünes Feedback! :D
	echo "<div class=\"feedback_positiv\">";
	echo "Das Formular wurde verschickt.";
	echo "</div>\n";
}
else {
	// nein, wir sind im ersten Affenschwanz Durchgang
	// Das heisst, das Formular wurde frisch geladen und somit wurden noch keine User-Eingaben oder Klicks getätigt. = Rotes Feedback!
	echo "<div class=\"feedback_negativ\">";
	echo "Das Formular wurde noch nicht verschickt. Klicke den Submit-Button!";
	echo "</div>\n";
}
?>

	<form action="grundsaetzlicher_mechanismus.php" method="post">
		<button type="submit" name="go">Formular verschicken</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>
