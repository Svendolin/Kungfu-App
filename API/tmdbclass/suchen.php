<?php
if(isset($_POST['go'])) {
	require("class/MyTMDB.class.php");
	$inst = new MyTMDB("search/movie");
	$searchStr = $_POST['search'];
	$treffer = $inst->search($searchStr);
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
    <title>Suche nach Film</title>
<style>
input {
	width: 300px;
}
</style>
</head>
<body>
	<h1>Suche nach Film</h1>
	<form method="post">
		<input type="text" name="search" id="search" value="<?=$searchStr?>"><br><br>
		<button type="submit" name="go">Suchen</button>
</form>
<?=$treffer?>
</body>
</html>