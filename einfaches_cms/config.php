<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User / "root" in XAMPP */
$password = ""; /* Password / "" in XAMPP */
$dbname = "tutorial"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}