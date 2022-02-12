<?php
/* Erneut: KATZE eine SUBKLASSE von HAUSTIER */
class Katze extends Haustier {
    
    // Diese METHODE gibt's NUR HIER, in der Subklasse
    function miauen() {
        $meineWoerter = "Miau Miau";
		return $meineWoerter;
    }
}
?>
