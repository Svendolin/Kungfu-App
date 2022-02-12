<?php

class LoveCalculator { // Camelcase und Gross am Anfang

// Keine Funktion sondern METHODE für das Berechnen des "Liebespotentials"

  function lovecalc ($firstname, $secondname)
  {
    $lovename = strtolower(preg_replace("/ /", "", strip_tags(trim($firstname . $secondname))));
    $alp = count_chars($lovename);
    for ($i = 97; $i <= 122; $i++) {
      if ($alp[$i] != false) {
        $anz = strlen($alp[$i]);
        if ($anz < 2) {
          $calc[] = $alp[$i];
        } else {
          for ($a = 0; $a < $anz; $a++) {
            $calc[] = substr($alp[$i], $a, 1);
          }
        }
      }
    }
    while (($anzletter = count($calc)) > 2) {
      $lettermitte = ceil($anzletter / 2);
      for ($i = 0; $i < $lettermitte; $i++) {
        // Just a little bit SHIFT :D
        $sum = array_shift($calc) + array_shift($calc);
        $anz = strlen($sum);
        if ($anz < 2) {
          $calcmore[] = $sum;
        } else {
          for ($a = 0; $a < $anz; $a++) {
            $calcmore[] = substr($sum, $a, 1);
          }
        }
      }
      $anzc = count($calcmore);
      for ($b = 0; $b < $anzc; $b++) {
        $calc[] = $calcmore[$b];
      }
      array_splice($calcmore, 0);
    }
    $lovestat = $calc[0] . $calc[1];
    return $lovestat;
  }
}
