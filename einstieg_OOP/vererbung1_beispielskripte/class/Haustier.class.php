<?php
//  * Superklasse *
class Haustier {
	// Es hat drin: Eigenschaften (properties) für ALLE Haustiere
	public $geschlecht;
	public $name;
	public $art;
		
	// Es hat drin: Methode (method) für ALLE Haustiere
	function WasBinIch() {
		$string = "Über mich: Ich bin ein/e ";
		$string .= $this->art.", ";
		$string .= "ich heisse ".$this->name;
		$string .= " und ich bin ".$this->geschlecht;
		return $string;
	}
}