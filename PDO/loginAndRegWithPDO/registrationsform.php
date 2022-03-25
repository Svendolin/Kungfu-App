<?php
session_start();
require('prefs/credentials.php');
require('class/SimpleCRUD.class.php');
require('class/ValidateForm.class.php');
$myDBInstance = new SimpleCRUD($host, $user, $passwd, $dbname);
$validateInstance = new ValidateForm();

if (isset($_POST['go'])) {
	$feedback = "";
	
	$username = $validateInstance -> desinfect($_POST['userName']);
	// Gibt es den User bereits in der DB?
	$isUser = $myDBInstance -> checkUserName($username);
	if ($isUser) {
		// Der Username ist schon vorhanden
		$feedback .= "Der Username existiert bereits";
	}
	else {
		// Den User gibt es noch nicht, die Eingaben werden validiert
		$username = $validateInstance -> validateElement($_POST['userName'],true,"Username","min_length-3|max_length-12","Die Eingabe muss zwischen 3 und 12 Zeichen sein.");
		$password =  $validateInstance -> validateElement($_POST['PW'],true,"Passwort","password","Das Passwort entspricht nicht den Vorgaben");
		
		// Der Validierungs-Status ist eine Eigenschaft im Objekt
		if ($validateInstance -> validationState) {
			// Validierung ist ok
			$feedback = "Die Eingaben sind in Ordnung.";
			// Der Account wird neu erstellt
			$myDBInstance -> newUser($username,$password);
			$feedback .= "Der Account wurde erstellt";
		}
		else {
			// Validierung ist nicht ok, es gibt keine query
			// Die Feedbacksätze kommen aus dem Objekt
			foreach ($validateInstance -> feedbackArray as $out) {
				$feedback .=  $out."<br>";
			}
		}
	}
}
// Erster Affenschwanzdurchgang
else {
	$feedback = "Bitte geben Sie einen Usernamen und ein Passwort ein";
	$username = "";
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Registration Formular</title>
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
	<h2 class="gelb">Registrations Formular</h2>
	<div>
	<?=$feedback?>
	</div>
 	<form method="post" action="registrationsform.php">
 		<div>
    		<label for="userName">Username:</label>
       		<input type="text" id="userName" name="userName" value="<?=$username?>">
       	</div>
       	<div>
        	<label for="Passwort">Passwort:</label>
        	<input type="password" id="PW" name="PW">
       	</div>
		<p>Ihr Passwort muss eine Länge von 8 bis 20 Zeichen haben und mind. eine Zahl aufweisen.<br>
		Ausserdem muss es ein Sonderzeichen enthalten (! @ # %).<br>
		Das Passwort muss mit einem Buchstaben beginnen.</p>
       	<div>        
        	<button type="submit" name="go" id="go">Sign in</button>
        </div>
    </form>
</div>
</body>
</html>
