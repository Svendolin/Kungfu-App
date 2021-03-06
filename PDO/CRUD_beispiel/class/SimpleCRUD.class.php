<?php
/* VERWALTUNGSFILE mit METHODEN und CRUD-STATEMENTS + DATENBANK ZUGRIFF durch PDO */

/* ZIEL:
- Datenbankverbindung sauber aufbauen
- Ein Modell, was diesen Aufbau macht (MVC-Prinzip) 
*/


// Die Klasse erbt von der Superklasse PDO (PDO ist eine automatische Klasse von PHP, diese ist gegeben)
class SimpleCRUD extends PDO { // "SimpleCRUD ist eine subklasse von PDO mit extends"

	
	
	// Konstruktormethode der Superklasse (Modalteil des MVC Prinzips): Stelle die Verbindung zur DB her
    public function __construct($host,$user,$passwd,$dbname) {
			// 1) DSN (Schlüssel für das Schloss, "Data Source Name") zusammensetzen mit Bestandteilen von oben
    	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname .';charset=utf8'; // (charset empfohlen)
    	
        // 2) Array für Optionen für PDO anlegen
        $options = array(
        	// Wir wollen in der Testphase wissen, ob es Fehler gibt.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Mit dieser Option werden die Resultate in Form von assoziativen Arrays retour kommen.
            // In den meisten Fällen ist das der effizienteste Weg, die Resultate in HTML auszugeben ...
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
				// 3) try and catch formulieren. "Versuche" den Aufruf der Verbindung oder "abfange" den Fehler
        try {
        // Konstruktor der PDO-Klasse (Superklasse) aufrufen (deshalb "parent")
			parent::__construct($dsn,$user,$passwd,$options); // bestehend aus 4-Parameter ($dsn, DB-User, Sein Passwort, PDO-Array)
		}
		catch (PDOException $e) { // Varible $e speichert dann die Fehleransage
			die("Verbindung zur Datenbank fehlgeschlagen: ".$e->getMessage()); // Fehlermeldungen werden ausgegeben. => Fürs Projekt $e->getMessage() nicht schreiben, bzw wird nicht benötigt
		}
	}
	
	// Fakt: Alles was heikel ist, befindet sich in Formularen, also dort, wo der User reinschreiben kann
	

	/* --- "CREATE" from CRUD --- */
	/* METHODE createMethod() aus create.php */

	// 1) Parameter in die Methode einbauen:
	public function createMethod($vornameInput, $nachnameInput, $emailInput, $bemerkungenInput) { // parameter der Methode
		// 2) Query formulieren (inserten) und beim Wert (value) mit Platzhalterschablonenwerte arbeiten:
		$query = "INSERT INTO CRUD (vorname, nachname, email, bemerkungen) VALUES (:vorname, :nachname, :email, :bemerkungen)"; // :vorname z.B. Platzhalter, wie die ?-prepare Statements von früher
		// 3) Auf Prepare-methode zurückgreifen (QUERY VORBEREITEN)
		$stmt = $this -> prepare($query);
		// 4) Mit bindParam verschmelzen wir jeden Platzhalter mit den Parametern (STATEMENT VERSCHMELZEN)
		$stmt -> bindParam(':vorname', $vornameInput);
		$stmt -> bindParam(':nachname', $nachnameInput);
		$stmt -> bindParam(':email', $emailInput);
		// $stmt -> bindParam(':ort', $ortInput);
		$stmt -> bindParam(':bemerkungen', $bemerkungenInput);
		// 5) Statement ausführen (STATEMENT AUSFÜHREN):
		$stmt -> execute();
		// 6) ID am Aufrufer retour gegeben
		// Das funktioniert nur mit MySQL-Datenbanken!
		return $this -> lastInsertId(); 
	}
	
	/* --- "READ" from CRUD --- */
	public function readMethod() {
		$query = "SELECT * FROM CRUD";
		$stmt = $this -> prepare($query);
		$stmt -> execute();
		$result = $stmt -> fetchAll();
		// Assoziatives Array zurückgeben
		return $result;
	}
	
	/* --- "READ" from CRUD --- */
	public function getSingleRecord($idInput) {
		$query = "SELECT * FROM CRUD WHERE ID = :ID";
		$stmt = $this -> prepare($query);
		// Sagen, dass es sich um eine Zahl und nicht um einen String handelt
		$stmt -> bindParam(':ID', $idInput, PDO::PARAM_INT); // Die 3 Parameter angeben: Welcher Parameter betroffen ist, welcher Wert es ist und dass PDO betroffen ist, die Datenbank
		$stmt -> execute();
		$result = $stmt -> fetch();
		return $result;
	}
	
	/* --- "UPDATE" from CRUD --- */
	public function updateMethod($idInput, $vornameInput, $nachnameInput, $emailInput, $bemerkungenInput) {
		$query = "UPDATE CRUD SET ";
		$query .= "vorname = :vorname, ";
		$query .= "nachname = :nachname, ";
		$query .= "email = :email, ";
	// $query .= "ort = :ort, ";
		$query .= "bemerkungen = :bemerkungen ";
		$query .= "WHERE ID = :ID ";
		// Vorbereiten und einzeln ersetzen für den "upgedateten Wert"
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':ID', $idInput, PDO::PARAM_INT); // Die 3 Parameter angeben: Welcher Parameter betroffen ist, welcher Wert es ist und dass PDO betroffen ist, die Datenbank
		$stmt -> bindParam(':vorname', $vornameInput);
		$stmt -> bindParam(':nachname', $nachnameInput);
		$stmt -> bindParam(':email', $emailInput);
		// $stmt -> bindParam(':ort', $ortInput);
		$stmt -> bindParam(':bemerkungen', $bemerkungenInput);
		$stmt -> execute();
	}
	
	/* --- "DELETE" from CRUD --- */
	/* METHODE deleteMethod() aus read_erweitert.php */
	public function deleteMethod($idInput) {
		$query = "DELETE FROM CRUD WHERE ID = :ID";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':ID', $idInput, PDO::PARAM_INT); // Die 3 Parameter angeben: Welcher Parameter betroffen ist, welcher Wert es ist und dass PDO betroffen ist, die Datenbank
		$stmt -> execute();
	}
}