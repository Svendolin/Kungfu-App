<?php
/* Hier definieren wir die Subklasse welche nicht geschützt ist ABER mit internem ZUGRIFF auf Superklasse */
class SchatzkisteKind extends SchatzkisteProtected {

	public function KindMethode() {
		// Aufruf einer Methode in der Superklasse, die mit protected definiert ist
		$raus = $this -> ZeigeCodeFuerSchatz();
		return $raus;
	}
}