<?php 
$conn = mysqli_connect("localhost","root","","demo"); //Immer diese Sachen hier ins mysqli angebengen: "localhost" = Name, Username ="root", Passwort="", Name der Datenbank=""

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>