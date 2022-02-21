<?php
// Die Klasse erbt von der Superklasse PDO
class SimpleCRUD extends PDO {
	
	// Konstruktormethode: Stelle die Verbindung zur DB her
    public function __construct($host, $user, $passwd, $dbname) {
    	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname .';charset=utf8';
    	
        // Array für Optionen für PDO anlegen
        $options = array(
        	// Wir wollen in der Testphase wissen, ob es Fehler gibt.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Mit dieser Option werden die Resultate in Form von assoziativen Arrays retour kommen.
            // In den meisten Fällen ist das der effizienteste Weg, die Resultate in HTML auszugeben ...
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try {
        	// Konstruktor der PDO-Klasse (Superklasse) aufrufen
			parent::__construct($dsn, $user, $passwd, $options);
		}
		catch (PDOException $e) {
			die("Verbindung zur Datenbank fehlgeschlagen: ".$e->getMessage());
		}
	}
	
	public function checkUser($username, $password) {
		$query = "SELECT * FROM login WHERE username = :username"; // "login" ist unsere Tabelle
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':username', $username);
		$stmt -> execute();
		$result = $stmt -> fetch(); // Nur fetch() statt fetchAll() weil es ja nicht meherere Nutzernamen dazu gibt...
		// User wird nicht gefunden: $result hat den Wert false
		// User wird gefunden: $result wird gefüllt mit dem Array mit dem Treffer
		if ($result) {
			// Stimmt das Passwort überein mit dem Hash in der DB?
			if (password_verify($password,$result['pw'])) {
				// Sessionvariable
				$_SESSION['loginstate'] = "eingeloggt";
				// Alles ist OK, leite weiter ...
				header('Location: success.php');
			}
			else {
				return "Falsches Passwort";
			}
		}
		else {
			return "Kann diesen User nicht finden.";
		}
	}
}