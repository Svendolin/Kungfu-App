<?php
// "Affenschwanz" Abfrage
if (isset($_POST['go'])) {
	echo "<pre>";
	// Der Name der Variablen $_FILES['myFile'] stammt vom Formular-Element name="myFile"
	// Das Prinzip ist also gleich wie bei POST-Variablen
	print_r($_FILES['myFile']);
	echo "</pre>";
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Datei-Upload - Affenschwanz</title>
	<style>
	body {
		font-size: 18px;
		font-family: Arial, Helevetica, sans-serif;
	}
	</style>
</head>
<body>
<h1>Datei-Upload - Affenschwanz</h1>
<form action="dateiupload_affenschwanz.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="30000">
    <p>Wählen Sie die Datei aus, die hochladen möchten:</p>
    <input type="file" name="myFile" id="myFile">
    <br><br>
    <input type="submit" value="Hochladen" name="go">
</form>

</body>
</html>