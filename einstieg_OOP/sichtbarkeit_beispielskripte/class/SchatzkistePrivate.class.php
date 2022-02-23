<?php
class SchatzkistePrivate {

	/* Opt:
	- Ändere private zu protected, um die Subklasse zu schützen und den Error hier zu löschen! Somit kann die Subklasse ihren part übernehmen
	- Ändere private zu public, so wird die Superklasse direkt ausgeführt und die Subklasse wäre eigentlich hinfällig
	*/
	private function zeigeCodeFuerSchatz() { 
		$source = "<img src=\"bilder/treasurechest.png\">";
		return $source;
	}
}