<?php
/* Hier definieren wir die Superklasse, die geschützt ist */
class SchatzkisteProtected {

	protected function zeigeCodeFuerSchatz() { // LÖSUNG: public statt protected
		$source = "<img src=\"bilder/treasurechest.png\">";
		return $source;
	}
}