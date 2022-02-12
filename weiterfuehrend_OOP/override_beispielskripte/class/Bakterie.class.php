<?php
class Bakterie extends Haustier {
		
	// Diese Methode überschreibt die gleichnamige Methode in der Superklasse
	function WasBinIch() {
		$meineWoerter = "Über mich: Ich bin ein Schädling und bin namen- und geschlechtlos";
		return $meineWoerter;
	}
}