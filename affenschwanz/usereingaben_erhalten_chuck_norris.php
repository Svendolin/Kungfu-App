<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Usereingaben erhalten - Übung für Chuck-Norris-Fans</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="gelborange">Die Usereingaben bleiben erhalten - Übung für Chuck-Norris-Fans</h2>
	<p><img src="../img/chuck_norris.gif" width="250" height="170" alt="chuck_norris"></p>
	<ul class="explanation">
		<li>In diesem Formular hat es Checkboxen, Radiobuttons und eine Auswahlliste.</li>
		<li>Das &quot;Repopulation&quot; dieser Elemente ist ungleich viel schwieriger zu programmieren, zum Glück tauchen sie in Webformularen viel weniger auf wie &quot;normale&quot; <code>inputs</code> .</li>
		<li>Du brauchst die Attribute <code>selected</code> und <code>checked</code>, welche du mit PHP dynamisch &quot;einspielen&quot; musst.</li>
	</ul>
<?php
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	// ja
	echo "<div class=\"feedback_positiv\">";
	echo "Das Formular wurde verschickt";
	echo "</div>\n";
}
else {
	// nein
}
?>

	<form action="usereingaben_erhalten_chuck_norris.php" method="post">
		<div>
			<input type="checkbox" id="surfen" name="surfen" value="Surfen">
			<label for="surfen">Surfen</label>
			<br>
			<input type="checkbox" id="rudern" name="rudern" value="Rudern">
			<label for="rudern">Rudern</label>
			<br>
			<input type="checkbox" id="segeln" name="segeln" value="Segeln">
			<label for="segeln">Segeln</label>
		</div>
		<br>
		<div>
			<input type="radio" id="herr" name="anrede" value="Herr">
			<label for="herr">Herr</label>
			<br>
			<input type="radio" id="frau" name="anrede" value="Frau">
			<label for="frau">Frau</label>
		</div>
		<br>
		<div>
			<label for="land">Land</label>
			<select name="land" id="land">
				<option value="noop">Bitte wählen</option> 
				<option value="ch">Schweiz</option> 
				<option value="de">Deutschland</option>
				<option value="li">Liechtenstein</option>
			</select>
		</div>
		<br>
		<button type="submit" name="go">Formular verschicken</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>
