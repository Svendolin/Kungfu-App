<?php

class BMIBerechnen {

  // Funktion? Nein! Methode für das Berechnen des BMI
  function rechneBMI($anna, $berta) {
    $feedback = "";
    // Formel
    $ergebnis = $anna / ($berta * $berta);

    // Auswertung
    if ($ergebnis < 16) {
      $feedback = "Starkes Untergewicht";
    }
    if ($ergebnis >= 16 && $ergebnis < 17) {
      $feedback = "Mässiges Untergewicht";
    }
    if ($ergebnis >= 17 && $ergebnis < 18.5) {
      $feedback = "Leichtes Untergewicht";
    }
    if ($ergebnis >= 18.5 && $ergebnis < 25) {
      $feedback = "Normalgewicht";
    }
    if ($ergebnis >= 25 && $ergebnis < 30) {
      $feedback = "Präadipositas";
    }
    if ($ergebnis >= 30 && $ergebnis < 35) {
      $feedback = "Adipositas Grad I";
    }
    if ($ergebnis >= 35 && $ergebnis < 40) {
      $feedback = "Adipositas Grad II";
    }
    if ($ergebnis >= 40) {
      $feedback = "Adipositas Grad III";
    }
    return $feedback;
  }
}
