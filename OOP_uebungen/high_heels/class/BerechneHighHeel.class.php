<?php
/* 
Zu empfehlen:

- Lieber mehrere Methoden mit einer bestimmten Aufgabe, als
	eine Methode mit wiederum ganz vielen Aufgaben


*/ 
class BerechneHighHeel {
	// Faktor zum Umrechnen von CHF nach Pfund, properties auf:
	private $waehrungsFaktor = 1.31; // "private" statt "public", weil wir den Zugriff hier beschränken (nur auf dieses File, wir greifen nicht von anderswo zu)
	// Differenz CH-Schuhgrössen zu brit. Schuhgrössen 
	private $differenzGroesse = 33; // "private" statt "public", weil wir den Zugriff hier beschränken (nur auf dieses File, wir greifen nicht von anderswo zu)
	
	/**
  	 * (Haupt-)Methode für das Bestimmen der High-Heel-Höhe
  	 *
  	 * @param float $p	Sexyness der Schuhe (Zahl zwischen 0 und 1)
  	 * @param float $y	Erfahrung im Tragen von hohen Schuhen (Jahre)
  	 * @param float $L 	Preis der Schuhe (wird noch umgerechnet)
  	 * @param float $t 	Anzahl der Monate, seitdem die Schuhe in Mode waren
  	 * @param int $A	Anzahl der zu trinkenden Gläser Alkohol
  	 * @param float $s	Schuhgrösse (wird noch umgerechnet)
  	 *
  	 * @return float
  	*/
	
		// HAUPTMETHODE
		function HoeheBerechnen($p, $y, $L, $t, $A, $s) { // default = public

			// CHF zu GB-Pfund umwandeln
			$L = $this->CHFZuPfund($L);
			// Wandelt schweizer Schuhgrösse in britischer Grösse um
			$s = $this->CHGroesseZuBritGroesse($s);
			// Formel aus dem Artikel, ich habe die Formel so notiert, dass sie in PHP läuft
			// (Eckige Klammern haben in PHP eine andere Bedeutung), diese rechnet mit britischen Werten
			$resultat = (($p * ($y+9) * $L) / (($t+1) * ($A+1) * ($y+10) * ($L+30))) * (12 + 3 * $s / 8);
			return $resultat;
	}
	
	// (Hilfs-)Methode 1: PREIS umrechnen von CHF zu brit. Pfund
	private function CHFZuPfund($preis) { // PRIVATE = diese Schalter ist zu
		$Pfund = $preis / $this->waehrungsFaktor;
		return $Pfund;
	}
	
	// (Hilfs-)Methode 2: Umrechnen von Schweizer nach brit. Schuhgrössen
	private function CHGroesseZuBritGroesse($groesse) { // PRIVATE = dieser Schalter ist zu
		$BritGroesse = $groesse - $this->differenzGroesse;
		return $BritGroesse;
	}
}