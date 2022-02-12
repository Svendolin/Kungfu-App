<?php
class QuadratZahl2 {
	/* EIGENSCHAFT "PROPERTY" INSTANZIEREN (VOREINSTELLUNGEN QUASI, wie Variablen im CSS zu vergleichen)
	- Das Schlüsselwort "public" (ein sog. "Zugriffsbezeichner") wird später erklärt
	- Weil es hier ein solches Schlüsselwort hat, weiss PHP,
	dass man eine Eigenschaft und keine "normale" Variable deklarieren möchte
	*/
	
	// 1) EIGENSCHAFT "PROPERTY" ist wie eine "VOREINSTELLUNG" in Variable $AntwortSatz füllen wir einen String mit:
	public $AntwortSatz = "Das Resultat ist: "; 
	
	// Methode
	function rechne($anna) {
		/* $this (Zugreifen, was innerhalb der Klasse definiert wurde)
		- Mit $this wird auf die Eigenschaft zugegriffen, die in allen Methoden sichtbar sind ("Im Bauch der Methode suchen")
		- Mit $this macht man einen Verweis auf das eigene Objekt aus der VOREINSTELLUNG
		- Beachte, dass das $-Zeichen vor "AntwortSatz" fehlt!!!
		*/
		$resultat = $this->AntwortSatz.$anna * $anna;
		
		return $resultat;
	}
}