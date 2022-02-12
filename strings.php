<?php
/* String-Operator */
// String-Operator in PHP ist der Punkt .
// 8ung: In JavaScript ist es das Plus-Zeichen +

// Zum anschauen: http://localhost/webapp_kungfu/strings.php im LOCALHOST

//Schreibweisen mit "" und ''
echo "Hallo"." "."Welt";
echo "<br>";
echo 'Hallo'.' '.'Welt';
echo "<br> ------------------------------------- <br>";


/* --- Variable im String drin --- */
$var = " meine ";

// So geht's immer, bedeutet aber viel Schreibarbeit...
//Schreibweisen mit "" und ''
echo "Hallo".$var."Welt";
echo "<br>";
echo 'Hallo'.$var.'Welt';
echo "<br> ------------------------------------- <br>";

// Mit den "intelligenten" Anführungszeichen ""
echo "Hallo $var Welt";
echo "<br>";

// Mit den "dummen" Anführungszeichen ''
echo 'Hallo $var Welt';
echo "<br> ------------------------------------- <br>";

/* Variante mit Curly Braces (Nicht empfohlen) */
$a = 'schöne';
// Mit den "intelligenten" Anführungszeichen
echo "Hallo {$a} Welt";
echo "<br>";
// Mit den "dummen" Anführungszeichen 
echo 'Hallo {$a} Welt';
echo "<br> ------------------------------------- <br>";


/* Ausgabe von HTML */
// Vorbereitung: Was kommt hier heraus?
echo "\"";
echo "<br>";
echo '"';
echo "<br> ------------------------------------- <br>";
// Solange es keine Attribute hat, spielt es keine Rolle
echo '<p>Hallo Paragraf</p>';
echo "<p>Hallo Paragraf</p>";
echo "<br> ------------------------------------- <br>";
// Attribute: Die brauchen von sich aus auch Anführungszeichen



echo "\n\n\n";

echo '<a href="http://www.google.ch">Zu Google</a>';
echo "<br>";
echo "<a href=\"http://www.google.ch\">Zu Google</a>\n";
echo "<br>"; // x
echo "<br> ------------------------------------- <br>";
// Innerhalb den "dummen" Anführungszeichen kann man nicht "escapen"
echo "<p>Hallo Abschnitt</p>\n"; // "" = Gescheit, somit funtktioniert \n für einen neuen Abschnitt
// vs
echo '<p>Hallo Abschnitt</p>\n'; // '' = dumm, somit funtktioniert \n für einen neuen Abschnitt NICHT
echo "<br> ------------------------------------- <br>";
// Komplexe Blöcke kann man auch so zusammensetzen
// -> Bitte Quellcode anschauen
$code = "<ul>\n";

$code .= "<li>";
$code .= "Hallo";
$code .= "</li>\n";

$code .= "<li>";
$code .= "Welt";
$code .= "</li>\n";

$code .= "</ul>\n";
echo $code;
?>
