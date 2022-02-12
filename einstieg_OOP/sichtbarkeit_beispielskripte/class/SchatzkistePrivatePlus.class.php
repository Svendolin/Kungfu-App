<?php
class SchatzkistePrivatePlus {
	private function zeigeCodeFuerSchatz() {
		$source = "<img src=\"bilder/treasurechest.png\">";
		return $source;
	}
	
	// Innerhalb der Klasse kann auf die obige Methode zugegriffen werden,
	// auch wenn diese mit private definiert ist.
	public function zweiteMethode() {
		$sourceVonOben = $this -> zeigeCodeFuerSchatz();
		return $sourceVonOben;
	
	}
}