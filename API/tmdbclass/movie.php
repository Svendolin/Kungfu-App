<?php
if (isset($_GET['id'])) {
    require("class/MyTMDBstart.class.php");
    $id = $_GET['id'];
    $inst = new MyTMDBstart("movie/".$id);
    $treffer = $inst->searchMovie();
}
else {
    $treffer = "Kann den Film nicht finden, brauche eine ID";

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
    max-width: 300px;
    height: auto;
}
</style>
</head>

<?=$treffer?>
</body>
</html>