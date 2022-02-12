<?php
class Bauplan {
	// Statische Variable, dies ist keine Eigenschaft
	public static $counter = 0;
	
	// Konstruktor: Bei jeder Instanzierung wird gezählt
	function __construct() {
		self::$counter++;
		
		// Das würde nicht funktionieren!
		// $this -> counter++;
	}
}