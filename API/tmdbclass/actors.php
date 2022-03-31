<?php
if (isset($_GET['id'])) {
    require("class/MyTMDBstart.class.php");
    $id = $_GET['id'];
    $inst = new MyTMDBstart("movie/".$id."/credits");
    $treffer = $inst->getActors() ;
}
else {
    $treffer = "Kann keine Schauspieler finden, brauche eine ID";

}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schauspieler</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?=$treffer?>

</body>
</html>