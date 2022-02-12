<?php
// Klassenname "QuadratZahl1" mit Camelcase und Anfangsbuchstaben gross mit einer Funktion drin, die wird aber anders genannt:
class QuadratZahl1 {
	// Jetzt ist die Funktion eine sog. Methode geworden = FUNKTION IN EINER KLASSE = METHODE
	function rechne($anna) {
		$resultat = $anna * $anna;
		return $resultat; // return, kein echo
	}
}