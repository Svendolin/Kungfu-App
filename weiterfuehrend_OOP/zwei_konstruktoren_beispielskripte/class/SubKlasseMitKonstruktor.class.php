<?php
class SubKlasseMitKonstruktor extends SuperKlasseOhneKonstruktor {
	
	function __construct() {
		echo "<p>Die Konstruktormethode der Subklasse wurde abgearbeitet.</p>";
	}
}
?>