<?php
require('class/SimpleCRUD.class.php');
$myInstance = new SimpleCRUD();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>CRUD-Beispiel: Create</title>
	<link rel="stylesheet" href="../../generalstyles.css">
</head>
<body>
	<h2 class="rotweiss">CRUD-Beispiel: Create</h2>
	<hr>
	<p class="explanation">
		<a href="create.php" style="text-decoration: underline;"><strong>C</strong>reate</a> | 
		<a href="read.php"><strong>R</strong>ead</a> | 
		<a href="read_erweitert.php">Read erweitert</a>
	</p>
	<hr>
<?php
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	// ja
	// Hier müssten unbedingt Sicherheitsvorkehrungen getroffen werden...
	$vornameValue = $_POST['vorname'];
	$nachnameValue = $_POST['nachname'];
	$emailAdresseValue = $_POST['emailAdresse'];
	$bemerkungenValue = $_POST['bemerkungen'];
	
	$lastID = $myInstance -> createMethod($vornameValue,$nachnameValue,$emailAdresseValue,$bemerkungenValue);
	
	echo "<div class=\"feedback_positiv\">";
	echo "Der Datensatz wurde aufgenommen. Die ID des eingefügten Datensatzes ist ".$lastID;
	echo "</div>\n";
	
}
else {
	// nein, setzte die Variablen leer, damit beim ersten Affenschwanz-Durchgang kein Fehler generiert wird
	$vornameValue = "";
	$nachnameValue = "";
	$emailAdresseValue = "";
	$bemerkungenValue = "";
}
?>

	<form action="create.php" method="post">
		<div>
			<label for="vorname">Vorname:</label><br>
			<input type="text" id="vorname" name="vorname" value="<?=$vornameValue?>">
		</div>
		<br>
		<div>
			<label for="nachname">Nachname:</label><br>
			<input type="text" id="nachname" name="nachname" value="<?=$nachnameValue?>">
		</div>
		<br>
		<div>
			<label for="nachname">E-Mail-Adresse:</label><br>
			<input type="email" id="emailAdresse" name="emailAdresse" value="<?=$emailAdresseValue?>">
		</div>
		<br>
		<div>
			<label for="bemerkungen">Bemerkungen:</label><br>
			<textarea id="bemerkungen" name="bemerkungen" cols="50" rows="6"><?=$bemerkungenValue?></textarea>
		</div>
		<button type="submit" name="go">Datensatz speichern</button>
	</form>
	<footer>
		<a href="../../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>
