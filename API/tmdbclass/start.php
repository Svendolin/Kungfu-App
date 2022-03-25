<?php
if (isset($_POST['go'])) {
    require("class/MyTMDBstart.class.php");
    $inst = new MyTMDBstart("search/movie");
    $searchStr = $_POST['search'];
    $treffer = $inst->search($searchStr);
}
else {
    $treffer = "";
    $searchStr = "";
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start</title>
<style>
.poster {
    width: 100%;
    max-width: 80px;
    height: auto;;
}
</style>
</head>
<h1>Suche nach Film</h1>
	<form method="post" action="start.php">
		<input type="text" name="search" id="search" value="<?=$searchStr?>"><br><br>
		<button type="submit" name="go">Suchen</button>
</form>
<?=$treffer?>
</body>
</html>