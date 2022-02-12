<?php
// Hier braucht's das Schlüsselwort extends
// Somit ist diese Klasse HUND offiziell eine Subklasse von HAUSTIER
class Hund extends Haustier {
		
	// Diese METHODE gibt's NUR HIER, in der Subklasse
	function bellen() {
		$meineWoerter = "Wuff, Wuff";
		return $meineWoerter;
	}
}