<?php
class SchatzkisteKind2 extends SchatzkistePrivate {

	public function KindMethode() {
		// Aufruf einer Methode in der Superklasse SchatzkistePrivate, die mit private definiert ist
		// Dies schlägt fehl
		$raus = $this -> ZeigeCodeFuerSchatz();
		return $raus;
	}
}