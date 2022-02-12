<?php
class SubKlasseMitKonstruktor3 extends SuperKlasseMitKonstruktor {
	
	function __construct() {
		// Mit der folgenden Zeile wird die Konstruktormethode der Elternklasse explizit aufgerufen:
		parent::__construct();
		echo "<p>Die Konstruktormethode der Subklasse wurde abgearbeitet.</p>";
	}
}
?>