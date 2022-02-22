<?php
class SchatzkistePublic {
	// Hier muss der Modifikator nicht unbedingt notiert werden
	// function ZeigeCodeFuerSchatz() würde das selbe bewirken (ohne public)
	public function zeigeCodeFuerSchatz() {
		$source = "<img src=\"bilder/treasurechest.png\">";
		return $source;
	}
}