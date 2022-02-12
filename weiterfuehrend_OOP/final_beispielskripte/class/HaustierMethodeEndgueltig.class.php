<?php
// Superklasse
class HaustierMethodeEndgueltig {
	// Eigenschaften für ALLE Haustiere
	public $geschlecht;
	public $name;
	public $art;
		
	// Methode für ALLE Haustiere, diese kann nicht überschrieben werden
	final function WasBinIch() {
		$string = "Über mich: Ich bin ein/e ";
		$string .= $this->art.", ";
		$string .= "ich heisse ".$this->name;
		$string .= " und ich bin ".$this->geschlecht;
		return $string;
	}
}