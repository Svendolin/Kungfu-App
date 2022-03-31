<?php
/* index.php > {DU BIST HIER: suchen.php} > */

// Wenn wir den 'go' button gedrückt haben, geht es los:
if(isset($_POST['go'])) {
	require("class/MyTMDBstart.class.php"); 
	$inst = new MyTMDBstart("search/movie");
	$searchStr = $_POST['search'];
	$treffer = $inst->search($searchStr);
	/* --- Was ist passiert? ---
	 Siehe oben: Auf Klasse wird hingeweisen, diese wird instanziert, 
	 POST_Variable aus dem Inputfeldnamen mitgenommen und in den searchstring überführt:
	 Aus MyTMDBstart.class.php wird 1) 2) und 3) ausgeführt...

	 --- Was passiert danach? ---
	 Passender Film wird angezeigt, darunter die drei Links aufgezeigt
	 Je nach Klick des Links wird aus MyTMDBstart.class.php 4), 5) oder 6) ausgeführt...
	
	 */
}
else {
	$searchStr = "";
	$treffer = "";
}
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film suchen</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Suche nach Film</h1>
	<form method="post" action="suchen.php"> <!-- action="" Attribut auf suchen.php, übermittelte Infos werden dorhin übertragen -->
		<input type="text" name="search" id="search" value="<?=$searchStr?>"><br><br>
		<button type="submit" name="go">Suchen</button>
	</form>
<?=$treffer?>
</body>
</html>