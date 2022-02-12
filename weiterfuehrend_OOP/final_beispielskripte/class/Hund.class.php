<?php
// Hier braucht's das Schlüsselwort extends
// Somit ist diese Klasse offiziell eine Subklasse von haustier 
class Hund extends HaustierEndueltig {
		
	// Diese Methode gibt's nur hier, in der Subklasse
	function bellen() {
		$meineWoerter = "Wuff, Wuff";
		return $meineWoerter;
	}
}