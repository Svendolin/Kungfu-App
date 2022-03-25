<?php
session_start();
require('prefs/credentials.php');
require('class/SimpleCRUD.class.php');
$myInstance = new SimpleCRUD($host, $user, $passwd, $dbname);

if (isset($_POST['go'])) {
	$username = $_POST['userName'];
	$password = $_POST['PW'];
	$feedback = $myInstance -> checkUser($username,$password);
}
else {
	$feedback = "";
	$username = "";
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
	<h2 class="gelb">Login Formular</h2>
	<div>
	<?=$feedback?>
	</div>
 	<form method="post" action="login_form.php">
 		<div>
    		<label for="userName">Username:</label>
       		<input type="text" id="userName" name="userName" value="<?=$username?>">
       	</div>
       	<div>
        	<label for="Passwort">Passwort:</label>
        	<input type="password" id="PW" name="PW">
       	</div>
       	<div>        
        	<button type="submit" name="go" id="go">Sign in</button>
        </div>
    </form>
</div>
</body>
</html>
