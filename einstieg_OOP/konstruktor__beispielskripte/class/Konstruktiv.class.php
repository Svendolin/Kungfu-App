<?php
class Konstruktiv {

	// Schlüsselwort Ausgabe
	public $ausgabe;

	// Konstruktormethode (Hier wird die GRUNDVERSORGUNG angegeben = WAS DAS OBJEKT ZUM ÜBERLEBEN BRAUCHT)
	function __construct() { // Immer mit 2x _ schreiben 
		$string = "Ich wurde geboren am ";
		$string .= date("d.m.y")." um ";
		$string .= date("H:i:s");
		// Hier wird mit echo gearbeitet, dies jedoch nur aus didaktischen Gründen (KEIN RETURN)!!!
		echo $string; // KEIN return sondern direkt das echo bei __construct()
	}

}
