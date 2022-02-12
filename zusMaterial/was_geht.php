<?php
// Irgendeine Variable ...
$myVar = "Hallo Variable";

// Irgendeine Funktion ...
function myFunc() {
	return "Hallo Funktion";
}

// Irgendeine Klasse ...
class myClass {
	public $myProperty = "Hallo Eigenschaft";
	function myMethod() {
		return "Hallo Methode";
	}
}

$myInstance = new myClass();

?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Was geht?</title>
</head>
<body>
<h1>Was geht zum Ausgeben innerhalb der Kurzschreibweise?</h1>

<h1>
<h2>Ausgabe des Wertes einer Variablen</h2>
<p><?=$myVar?></p>

<h2>Aufrufen einer Funktion, Ausgabe des returns</h2>
<p><?=myFunc()?></p>

<hr>

<h2>Aufrufen einer Methode, Ausgabe des returns</h2>
<p><?=$myInstance->myMethod()?></p>

<hr>

<h2>Ausgabe des Wertes einer Eigenschaft</h2>
<p><?=$myInstance->myProperty?></p>
</body>
</html>
