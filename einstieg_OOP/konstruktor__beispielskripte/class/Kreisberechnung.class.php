<?php
class Kreisberechnung {
	// Eigenschaften für das Festhalten der Ergebnisse
	public $flaeche = "";
	public $umfang = "";
	
	// Konstruktormethode
	function __construct($radius) {
		// Aufrufen der Hilfs-Methoden
		$this -> flaeche = $this -> calculateArea($radius);
		$this -> umfang = $this -> calculateCircumference($radius) ;
	}
	
	// Hilfs-Methode für das Berechnen der Kreisfläche
	public function calculateArea($r) {
		$fl = $r * $r * pi();
		$flGerundet = round($fl, 2);
		$flAntwort = "Die Kreisflaeche betraegt: ".$flGerundet;
		return $flAntwort;
	}
	
	// Hilfs-Methode für das Berechnen des Kreisumfangs
	public function calculateCircumference($r) {
		$um = 2 * $r * pi();
		$umGerundet = round($um, 2);
		$umAntwort = "Der Kreisumfang betraegt: ".$umGerundet;
		return $umAntwort;
	}
}
?>