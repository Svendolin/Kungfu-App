<?php 
require_once("config.php");
if(isset($_POST['submit'])){
		$firstName = $_POST['first_name'];
		$surName = $_POST['surname'];
		$email 	= $_POST['email'];
		$password = $_POST['password'];
		
		$hashPassword = password_hash($password,PASSWORD_DEFAULT);
		
		$sql = "insert into users (first_name, last_name,email, password) value('".$firstName."', '".$surName."', '".$email."','".$hashPassword."')";
		$result = mysqli_query($conn, $sql);
		if($result)
		{
			echo "Registration successfully";
		}
	}
?>

<h1>Registration</h1>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="first_name" value="" placeholder="First Name">
	<input type="text" name="surname" value="" placeholder="Surname">
	<input type="text" name="email" value="" placeholder="Email">
	<input type="password" name="password" value="" placeholder="Password">
	<button type="submit" name="submit">Submit</submit>
</form>