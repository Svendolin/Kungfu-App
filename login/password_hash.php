<?php
session_start();

if (isset($_POST['go'])) {
	$eingabe = $_POST['eingabe'];
	$ausgabe = "";
	if (isset($_SESSION['input']) && $_SESSION['input'] == $_POST['eingabe']) {
		if (!isset($_SESSION['hashes'])) {
			$_SESSION['hashes'] = array();
		}
		$pw = password_hash($eingabe,PASSWORD_DEFAULT); // Magic trick
		array_push($_SESSION['hashes'], $pw);
	}
	else {
		$_SESSION['input'] = $eingabe;
		$_SESSION['hashes'] = array();
		$pw = password_hash($eingabe,PASSWORD_DEFAULT); // Magic trick
		array_push($_SESSION['hashes'], $pw);
	}
		
	foreach($_SESSION['hashes'] as $out){
		$ausgabe .= $out."\n";
	}
}
else {
	$eingabe = "";
	$ausgabe = "";
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Hashen - Eine Eingabe, viele Ausgaben</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="gruen">Hashen - Eine Eingabe, viele Ausgaben</h2>
	<ul class="explanation">
		<li>PHP bietet ein <strong>Rundum-sorglos-Paket</strong> an, um sichere Logins für deine Web-Anwendungen (auch ohne vertieftes Wissen in Kryptologie) zu erstellen.</li>
		<li>Man verwendet dafür die beiden Funktionen <code><a href="http://php.net/manual/de/function.password-hash.php" target="_blank">password_hash()</a></code> und <code><a href="http://php.net/manual/de/function.password-verify.php" target="_blank">password_verify()</a></code>.</li>
		<li>Setzt man bei <code>password_hash()</code> die Konstante <code>PASSWORD_DEFAULT</code>, wählt PHP die beste zur Verfügung stehende Variante aus, um das Passwort zu hashen.<br>
		Allein dies ist SUPER-praktisch: Der Entwickler muss sein Werk nicht anpassen, falls in späteren oder anderen Umgebungen bessere Verschlüsselungsalgorithmen zur Verfügung stehen.</li>
		<li>Wichtiger Hinweis, falls du schon weisst, was ein sog. Salt ist: Es wird dringend empfohlen, dass du für <code>password_hash()</code> <strong>kein eigenes Salt</strong> erzeugst. Die Funktion wird automatisch ein sicheres Salt für dich erstellen, wenn du keins angibst.</li>
		<li>In einer sicheren Webanwendung wird der Klartetxt eines Passwortes nirgends gespeichert!</li>
	</ul>
	<form method="post" action="password_hash.php">
		<label for="eingabe">Gib hier den Klartext ein: </label>
		<input type="text" size="25" id="eingabe" name="eingabe" value="<?=$eingabe?>">
		<br>
		<label for="ausgabe">Hash:</label><br>
		<textarea id="ausgabe" name="ausgabe" cols="100" rows="20"><?=$ausgabe?></textarea>
		<br>
		<button type="submit" name="go">Hash!</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>
