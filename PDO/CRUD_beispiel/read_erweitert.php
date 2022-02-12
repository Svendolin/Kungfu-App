<?php
require('class/SimpleCRUD.class.php');
$myInstance = new SimpleCRUD();
if (isset($_POST['go'])) {
	// Hier müssten unbedingt Sicherheitsvorkehrungen getroffen werden...
	$idValue = $_POST['go'];
	$myInstance -> deleteMethod($idValue);
}

$recordArray = $myInstance -> readMethod();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>CRUD-Beispiel: Read erweitert</title>
	<link rel="stylesheet" href="../../generalstyles.css">
</head>
<body>
	<h2 class="rotweiss">CRUD-Beispiel: Read erweitert</h2>
	<hr>
	<p class="explanation">
		<a href="create.php"><strong>C</strong>reate</a> | 
		<a href="read.php"><strong>R</strong>ead</a> | 
		<a href="read_erweitert.php" style="text-decoration: underline;">Read erweitert</a>
	</p>
	<hr>
<?php
// print_r($recordArray);
?>
	
	<form action="read_erweitert.php" method="post">
	<table class="explanation bordered">
	<? foreach ($recordArray as $row): ?>
		<tr>
			<td><?=$row['vorname']?></td>
			<td><?=$row['nachname']?></td>
			<td><a href="update.php?id=<?=$row['ID']?>"><strong>U</strong>pdate</a></td>
			<td><button type="submit" name="go" class="deleter" data-confirm="<?=$row['vorname']?> <?=$row['nachname']?>" value="<?=$row['ID']?>"><strong>D</strong>elete</button></td>
		</tr>
	<? endforeach; ?>
	</table>
	</form>
	<footer>
		<a href="../../index_2.html">&lt; Home</a>
	</footer>
	<script>
	// Javascript: Gebe Confirm-Fenster mit Hinweis aus
	var deleteButtons = document.querySelectorAll('.deleter');

	for (var i = 0; i < deleteButtons.length; i++) {
		deleteButtons[i].addEventListener('click', function(event) {
      		var go = confirm('Willst du ' + this.getAttribute('data-confirm') + ' wirklich löschen?\nDieser Vorgang ist unwiderruflich!');
      		if (go == false) {
      			event.preventDefault();
      		}
		});
      }
	</script>
</body>
</html>
