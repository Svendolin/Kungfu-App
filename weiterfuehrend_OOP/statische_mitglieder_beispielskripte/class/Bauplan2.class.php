<?php
class Bauplan2 {

	// Eine statische Methode
	public static function hurra() {
		$string = "Hurra, ich lebe!";
		return $string;
	}
	
	// Eine nicht-statische Methode
	public function hallihallo() {
		$string = "Hurra, ich lebe immer noch!";
		return $string;
	}
}