<?php
require('class/SimpleCRUD.class.php');
$myInstance = new SimpleCRUD();
$recordArray = $myInstance -> readMethod();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>CRUD-Beispiel: Read</title>
	<link rel="stylesheet" href="../../generalstyles.css">
</head>
<body>
	<h2 class="rotweiss">CRUD-Beispiel: Read</h2>
	<hr>
	<p class="explanation">
		<a href="create.php"><strong>C</strong>reate</a> | 
		<a href="read.php" style="text-decoration: underline;"><strong>R</strong>ead</a> | 
		<a href="read_erweitert.php">Read erweitert</a>
	</p>
	<hr>
<?php
// print_r($recordArray);
?>

	<? foreach ($recordArray as $row): ?>
		<p class="explanation">
			<?=$row['vorname']?> <strong><?=$row['nachname']?></strong> (ID: <?=$row['ID']?>)<br>
 			<a href="mailto:<?=$row['email']?>"><?=$row['email']?></a>
 		</p>
 		<p class="explanation"><?=nl2br($row['bemerkungen'])?></p>
 		<hr>
 	<? endforeach; ?>
	
	<footer>
		<a href="../../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>
