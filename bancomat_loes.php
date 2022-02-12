<?php
$banknoten = array(200,100,50,20,10);
// String für das Feedback
$feedback = "";
$ausgabe = "";
$betragValue = "";
// Checke, ob der Submit-Button geklickt wurde
if (isset($_POST['go'])) {
	$betrag = $_POST['betrag'];
	$betragValue =  $_POST['betrag'];
	foreach ($banknoten as $out) {
		if ($betrag > 0) {
			$anz = floor($betrag / $out);
			$ausgabe .= $out."-er: ".$anz."<br>";
			$betrag = $betrag - $anz * $out;
		}
	}
	

	$feedback .= "<div class=\"feedback_positiv\">";
	$feedback .= $ausgabe;
	$feedback .= "</div>\n";
}
else {
	$feedback .= "<div class=\"feedback_negativ\">";
	$feedback .= "Gib einen Betrag ein";
	$feedback .= "</div>\n";
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Bancomat</title>
	<link rel="stylesheet" href="generalstyles.css">
</head>
<body>
<?php
echo $feedback;
?>
	<form action="bancomat_loes.php" method="post">
		<label for="betrag">Betrag: </label>
		<input type="text" name="betrag" id="betrag" size="6" value="<?=$betragValue?>">
		<button type="submit" name="go">Geld beziehen</button>
	</form>
	<h3>Vorhandene Scheine</h3>
<?php
foreach ($banknoten as $schein) {
	echo "<img style=\"border: 1px solid #CCC\" src=\"img/geld/".$schein."_Euro.jpg\">&nbsp;&nbsp;";
}
?>
	<footer>
		<a href="index.html">&lt; Home</a>
	</footer>
</body>
</html>
