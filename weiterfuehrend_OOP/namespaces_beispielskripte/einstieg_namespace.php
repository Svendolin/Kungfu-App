<?php
/* Man beachte: In diesem Dokument gibt es zwei gleichnamige Funktionen!
Dies ist nur darum möglich, weil die Funktionsdefinitionen
in zwei verschiedenen namespace-Namensräume notiert sind.
*/
// Hier wechsle ich ins Apachenland;
namespace Apachenland {
	function doSomething() {
		echo "Hallo Appachen!<br>";
	}
	echo 'Echo von der magic constant __namespace__: Ich bin hier im '.__namespace__.'<br>';
	doSomething();
}

// Hier wechsle ich ins Irokesenland;
namespace Irokesenland {
	function doSomething() {
		echo "Hallo Irokesen!<br>";
	}
	echo 'Echo von der magic constant __namespace__:  Ich bin hier im '.__namespace__.'<br>';
	doSomething();
}
?>
