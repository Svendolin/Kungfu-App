<?php
// Die Klasse erbt von der Superklasse PDO
class SimpleCRUD extends PDO {

	// Eigenschaften für die obligaten DB-Angaben (= sog. DB-Credentials)
	// hier macht es Sinn, diese mit "private" zu kennzeichen
	private $host = "localhost";
	private $user = "";
	private $passwd = "";
	private $dbname = "kungfu";
	
	// Konstruktormethode: Stelle die Verbindung zur DB her
    public function __construct() {
    	$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname .';charset=utf8';
    	
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
			parent::__construct($dsn, $this->user, $this->passwd, $options);
		}
		catch (PDOException $e) {
			die("Verbindung zur Datenbank fehlgeschlagen: ".$e->getMessage());
		}
	}
	
	public function createMethod($vornameInput, $nachnameInput, $emailInput, $bemerkungenInput) {
		$query = "INSERT INTO CRUD (vorname, nachname, email, bemerkungen) VALUES (:vorname, :nachname, :email, :bemerkungen)";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':vorname', $vornameInput);
		$stmt -> bindParam(':nachname', $nachnameInput);
		$stmt -> bindParam(':email', $emailInput);
		$stmt -> bindParam(':bemerkungen', $bemerkungenInput);
		$stmt -> execute();
		// Das funktioniert nur mit MySQL-Datenbanken!
		return $this -> lastInsertId();
	}
	
	public function readMethod() {
		$query = "SELECT * FROM CRUD";
		$stmt = $this -> prepare($query);
		$stmt -> execute();
		$result = $stmt -> fetchAll();
		return $result;
	}
	
	public function getSingleRecord($idInput) {
		$query = "SELECT * FROM CRUD WHERE ID = :ID";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':ID', $idInput, PDO::PARAM_INT);
		$stmt -> execute();
		$result = $stmt -> fetch();
		return $result;
	}
	
	public function updateMethod($idInput, $vornameInput, $nachnameInput, $emailInput, $bemerkungenInput) {
		$query = "UPDATE CRUD SET ";
		$query .= "vorname = :vorname, ";
		$query .= "nachname = :nachname, ";
		$query .= "email = :email, ";
		$query .= "bemerkungen = :bemerkungen ";
		$query .= "WHERE ID = :ID ";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':ID', $idInput, PDO::PARAM_INT);
		$stmt -> bindParam(':vorname', $vornameInput);
		$stmt -> bindParam(':nachname', $nachnameInput);
		$stmt -> bindParam(':email', $emailInput);
		$stmt -> bindParam(':bemerkungen', $bemerkungenInput);
		$stmt -> execute();
	}
	
	public function deleteMethod($idInput) {
		$query = "DELETE FROM CRUD WHERE ID = :ID";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':ID', $idInput, PDO::PARAM_INT);
		$stmt -> execute();
	}
}