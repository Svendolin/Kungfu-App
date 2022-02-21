<?php
/* ERWEITERTES LESEFILE (Mit der Tabelle für Update und Delete) */
require('prefs/credentials.php');
require('class/SimpleCRUD.class.php');
$myInstance = new SimpleCRUD($host,$user,$passwd,$dbname);
if (isset($_POST['go'])) {
	// Hier müssten unbedingt Sicherheitsvorkehrungen getroffen werden...
	$idValue = $_POST['go']; // 1) Wert holen
	$myInstance -> deleteMethod($idValue); // 2) Delete Methode 
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
	<?php foreach ($recordArray as $row): ?>
		<tr>
			<td><?=$row['vorname']?></td>
			<td><?=$row['nachname']?></td>
			<!-- GET-parameter = Klick zum Update erhält die URL die ID, um exakt diesen Beitrag bearbeiten zu können -->
			<!-- UPDATE BUTTON (link) -->
			<td><a href="update.php?id=<?=$row['ID']?>"><strong>U</strong>pdate</a></td>
			<!-- DELETE BUTTON -->
			<td><button type="submit" name="go" class="deleter" data-confirm="<?=$row['vorname']?> <?=$row['nachname']?>" value="<?=$row['ID']?>"><strong>D</strong>elete</button></td>
			<!-- 


	-->
		</tr>
	<?php endforeach; ?>
	</table>
	</form>
	<footer>
		<a href="../../index_2.html">&lt; Home</a>
	</footer>
	<script>
	// Javascript: Gebe Confirm-Fenster mit Hinweis aus
	// 1) DOM-Manipulation: Dadurch herausfinden, welche Buttons die Klasse Deleter haben = Nur unsere Deletebuttons somit (Siehe class="deleter")
	var deleteButtons = document.querySelectorAll('.deleter');

	// 2) Jeder Button erhält ein Eventlistener
	for (var i = 0; i < deleteButtons.length; i++) {
		deleteButtons[i].addEventListener('click', function(event) {
					// 3) confirm = Ein Modales Alertfenster, das aufploppt
					// Falls ok-klicken
      		var go = confirm('Willst du ' + this.getAttribute('data-confirm') + ' wirklich löschen?\nDieser Vorgang ist unwiderruflich!'); //get-attribute aus dataconfirm des deleterbuttons Zeile 43
					// Falls abbrechen-klicken
      		if (go == false) {
      			event.preventDefault();
      		}
		});
      }
	</script>
</body>
</html>
