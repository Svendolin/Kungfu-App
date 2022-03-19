<?php
// Bakterie erbt von Haustier
class Bakterie extends Haustier {
		
	// Diese Methode der Subklasse Bakterie ÜBERSCHREIBT die GLEICHNAMIGE Methode in der Superklasse d.h:
	// HIER GESCHIEHT EIN KLASSICHER "OVERRIDE" DER SUPERKLASSE DURCH DIE SUBKLASSE
	function WasBinIch() {
		$meineWoerter = "Über mich: Ich bin ein Schädling und bin namen- und geschlechtlos";
		return $meineWoerter;
	}
}