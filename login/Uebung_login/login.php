<?php 
require_once("config.php");
if(isset($_POST['submit'])){
	$email = trim($_POST['email']); // es gilt noch den Sanitize einzubauen! Dann wäre es perfekt :)
	$password = trim($_POST['password']);
	
	$sql = "select * from users where email = '".$email."'";
	$rs = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($rs); // Treffer zählen mit den Resultaten
	
	if($numRows  == 1){ // Beste Option hier: Ein Treffer gelingt, wenn die Abfrage gelingt (User existiert)
		$row = mysqli_fetch_assoc($rs);
		if(password_verify($password,$row['password'])){
			echo "Password verified";
		}
		else{
			echo "Wrong Password";
		}
	}
	else{
		echo "No User found";
	}
}
?>

<h1>Login</h1>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="email" value="" placeholder="Email">
	<input type="password" name="password" value="" placeholder="Password">
	<button type="submit" name="submit">Submit</submit>
</form>