<?php
session_start();
if (isset($_SESSION['loginstate']) && $_SESSION['loginstate'] == "eingeloggt") {
	echo "Login ist erfolgt";	
}
else {
	// Umleitung auf Login-Formular
	header('Location: login_form.php');
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Login Formular</title>
	<style>
	body {
		font-family: Arial, Verdana, sans-serif;
		font-size: 16px;
	}
	#container {
		width: 500px;
		margin: 30px auto 20px auto;
		padding: 10px 20px;
		border: 1px solid black;
	}
	input {
		width: 96%;
		padding: 3px 2%;
	}
	div {
		margin-bottom: 15px;
	}
	button {
		font-size: 20px;
		padding: 5px 20px;
		cursor: pointer;
	}
	</style>
</head>
<body>
<div id="container">
	<h2 class="gelb">Geschützter Bereich</h2>
	<p>Diese Seite soll einen geschützten Bereich andeuten ...</p>
	<button  type="button" name="logoutreg"><a href="logout.php">Logout</a></button>
</div>
</body>
</html>
