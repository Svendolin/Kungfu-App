<?php
require('class/SimpleCRUD.class.php');
$myInstance = new SimpleCRUD();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>CRUD-Beispiel: Update</title>
	<link rel="stylesheet" href="../../generalstyles.css">
</head>
<body>
	<h2 class="rotweiss">CRUD-Beispiel: Update</h2>
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
	$idValue = $_POST['id'];
	
	$myInstance -> updateMethod($idValue, $vornameValue,$nachnameValue,$emailAdresseValue,$bemerkungenValue);
	
	echo "<div class=\"feedback_positiv\">";
	echo "Der Datensatz wurde gesichert.";
	echo "</div>\n";
	echo "</body>";
	echo "</html>";
	// Ausgabe beenden
	exit();
}
else {
	// nein
	// Die ID kommt beim ersten Affenschwanz-Durchgang von read_erweitert.php als GET-Var
	if (!isset($_GET['id'])) {
		die("Weiss nicht, welchen User ich bearbeiten soll");
	}
	$cleanID = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
	
	// Fülle die Variablen mit dem Resultat von der DB-Query
	$recordArray = $myInstance -> getSingleRecord($cleanID);
	
	$vornameValue = $recordArray['vorname'];
	$nachnameValue = $recordArray['nachname'];
	$emailAdresseValue = $recordArray['email'];
	$bemerkungenValue = $recordArray['bemerkungen'];
	$idValue = $cleanID;
}
?>

	<form action="update.php" method="post">
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
		<input type="hidden" name="id" value="<?=$idValue?>">
		<button type="submit" name="go">Datensatz speichern</button>
	</form>
	<footer>
		<a href="../../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>
