<?php

class ImageGallery {

  /* Eigenschaften (Als erstes als EIGENSCHAFT anlegen...) */
  // Array mit allen Bildern
  public $bilder = Array();
  
  /* Konstruktor */
  /* Aufgaben:
  1. Checken, ob der Galerie-Ordner existiert
  2. Einlesen der Bildpfade in der Array
  */

  // METHODE 1, Konstruktormethode
  function __construct($pfad) {

    // CHECK: 
    if(is_dir($pfad)) {
    
    // Alle Bilder in Array einlesen (nur GIFS)
    foreach (glob($pfad. "/" . "*.gif") as $image) { // Mit glob() werden alle * Dokumente mit der Dateinamenendung .gif in die $bilder array() geladen
      $this->bilder[] = $image;
    }
    sort($this -> bilder);
  }
  else {
    exit("Kann diesen Ordner nicht finden");
  }
}

// METHODE 2, die verwantwortlich für den HTML Code ist
  function makeGallery() {
    $htmlCode = "";
    foreach ($this -> bilder as $val) {
      $htmlCode .= "<img src=\"" . $val . "\">\n";
    }
    return $htmlCode;
  }
}
