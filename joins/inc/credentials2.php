<?php
// Credentials (Kurzform, ohne Super + Subklassen)
$hostname = "localhost";
$username = "root";
$password = "";
$db = "classicmodels";
// PDO starten
$dsn = "mysql:host=$hostname;dbname=$db";
$options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
// dbh = Instanz der PDO
$dbh = new PDO($dsn, $username, $password,$options); // 4 Parameter - Stets vordefiniert
?>