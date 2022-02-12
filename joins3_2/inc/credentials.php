<?php
// Credentials
$hostname = "localhost";
$username = "root"; // "root" in xampp
$password = ""; // "" in xampp
$db = "joins";
// PDO starten
$dsn = "mysql:host=$hostname;dbname=$db";
$options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
$dbh = new PDO($dsn, $username, $password, $options);
?>