<?php
class KonstruktivPara {
	
	// Die Konstruktormethode empfängt Parameter (Briefkastenvariablen reinschreiben)
	function __construct($param1,$param2) {
		$str = "Guten Tag ";
		// Hier wird mit echo gearbeitet, dies jedoch nur aus didaktischen Gründen!!!
		echo $str.$param1." ".$param2;
	}
}