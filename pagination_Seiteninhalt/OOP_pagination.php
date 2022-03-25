<?php
// https://codeshack.io/how-to-create-pagination-php-mysql/
require("inc/credentials2.php");
require("class/MyPagination.class.php");
$Instance = new MyPagination($hostname,$username,$password,$db);

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pagination mit OOP</title>
<link href="prism/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="styles_pagination.css">

</head>
<body>
<div id="container">
<h1>Pagination mit OOP für die Tabelle &quot;customers&quot;</h1>

<?=$Instance->makeFeedbackforTesting()?>

<?=$Instance->makeTable()?>

<br>
<div style="font-size: 28px; text-align: center;">
<?=$Instance->makePagination1()?>
</div>
<hr>
<div style="font-size: 24px; text-align: center;">
<?=$Instance->makePagination2()?>
</div>
<hr>
<div style="text-align: center;">
<?=$Instance->makePagination3()?>
</div>
</body>
</html>