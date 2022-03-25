<?php
/* REGISTRIERUNGSFORMULAR ALLGEMEIN (STARTSEITE) */
// http://localhost/OOP/webapp_kungfu/PDO/loginWithPDO/registration_form.php
/* Für Localhost am Laptop */
// http://localhost/OOP_PDO_MVC/webapp_kungfu%20(LOCAL)/PDO/loginWithPDO/registration_form.php
session_start();
require('prefs/credentials.php'); // 
require('class/SimpleCRUD.class.php');
require('class/ValidateForm.class.php');
$myInstance = new SimpleCRUD($host, $user, $passwd, $dbname);
$validateInstance = new ValidateForm();

// 1) Wenn der User das Formular gesetzt hat...
if (isset($_POST['go'])) {
	$feedback = "";
	// Gibt es den User bereits in der Datenbank (zuerst testen)
	$username = $validateInstance -> desinfect($_POST['userName'])
	// Sichere validierte  Variante:
	// (Erklärungen, warum das so angeben werden muss, findest du auf: OOP_uebungen > formular_validierung)
	$username = $validateInstance -> validateElement($_POST['userName'],true,"Username","min_length-3|max_length-20","Die Eingabe muss zwischen 3 und 20 Zeichen sein.");
	$password =  $validateInstance -> validateElement($_POST['PW'],true,"Password","password","Das entspricht nicht den Vorgaben!");

	// Unsichere unvalidierte Variante:
	// $username = $_POST['userName'];
	// $password = $_POST['PW'];



	if ($validateInstance -> validationState) {
		// Validierung ist korrekt:
		$feedback = "Die Eingaben sind in Ordnung!";
		// Checken, ob des den User bereits in der Datenbank gibt:
		$isUser = $myDBInstance -> checkUserName($username);
	} else {
		// Wenn es den User nicht gibt, kommt FALSE retour
			$myInstance -> newUser($username,$password);
			$feedback .= "Der Account wurde erstellt!"; 

	}
	
	if ($isUser) {
		// Der User ist schon vorhanden? - Es kommt dadurch TRUE retour
			$feedback .= "Der Username existiert bereits"; 
	} else {
		
	}
}
else {
	$feedback = "Bitte geben Sie einen Nutzernamen und Passwort ein!";
	$username = "";
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Regitrierungs Formular</title>
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
 	<form method="post" action="registration_form.php"> <!-- Formular zuteilen, welcher PHP Seite es angehört -->
 		<div>
    		<label for="userName">Username:</label>
       		<input type="text" id="userName" name="userName" value="<?=$username?>">
       	</div>
       	<div>
        	<label for="Passwort">Passwort:</label>
        	<input type="password" id="PW" name="PW">
       	</div>
				 <p> Ihr Passwort muss eine Länge von 8 bis 20 Zeichen haben <br>
						 Ausserdem muss es ein Sonderzeichen enthalten! ( ! @ # % ) <br>
						 Das Passwort muss mit einem Buchstaben beginnen. </p>
       	<div>        
        	<button type="submit" name="go" id="go">Sign up</button>
        </div>
    </form>
</div>
</body>
</html>
