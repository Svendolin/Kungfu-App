<?php
class MyUpload {
	// Zielverzeichnis
	private $targetBaseDir = "zielverzeichnis";
	// String für das Ablegen des Feedbacks für den User
	public $feedback = "";
	// Array für erlaubte MIME-Types
	public $allowedMimeTypes = ["image/jpeg","image/png","image/gif"];
	// Array für erlaubte Datei-Endungen
	public $allowedExtensions = ["gif","GIF","png","PNG","jpg","JPG","jpeg","JPEG"];
	
	// max. erlaubte Dateigrösse 
	
	// max. erlaubte Dimensionen des Bildes
	
	
	// Konstruktor
	function __construct() {
		// Hier könnte man testen, ob der Server bereit ist für Uploads (Vergleiche das index.php in diesem Ordner)
		
		// Hier könnte man testen, ob das Zielverzeichnis existiert (Vergleiche die Übungen mit den Bildergalerien)
	
	}
	
	// Checke die Fehlermeldungen, die mir PHP "gratis" zur Verfügung stellt
	function ckeckFILEErrors() {
		$errorNo = $_FILES['myFile']['error'];
		// Überprüfen der Fehlermeldungen mit Hilfe einer switch Anweisung
		switch ($errorNo) {
			case 0:
				// Achtung, dies könnte man falsch verstehen, die Datei ist erst im temp. Verzeichnis!
				$this->feedback .="Normalo-Feedback: Die Datei wurde erfolgreich hochgeladen.<br>";
				$this->feedback .="PHP-Handbuch: Es liegt kein Fehler vor, die Datei wurde erfolgreich hochgeladen.";
				break;
			case 1:
				$this->feedback .="Normalo-Feedback: Die hochgeladene Datei ist zu schwer (Serverseitige Beschränkung).<br>";
				$this->feedback .="PHP-Handbuch: Die hochgeladene Datei überschreitet die in der Anweisung upload_max_filesize in php.ini festgelegte Größe.";
				break;
			case 2:
				$this->feedback .="Normalo-Feedback: Die hochgeladene Datei ist zu schwer.<br>";
				$this->feedback .="PHP-Handbuch: Die hochgeladene Datei überschreitet die in dem HTML Formular mittels der Anweisung MAX_FILE_SIZE angegebene maximale Dateigröße.";
				break;
			case 3:
				// Höchstwahrscheinlich wurde im Formular gar keine Datei ausgewählt...
				$this->feedback .="Die Datei wurde nur teilweise hochgeladen.";
				break;
			case 4:
				$this->feedback .="Es wurde keine Datei hochgeladen.";
				break;
			case 6:
				$this->feedback .="Normalo-Feedback: Kann den Ordner nicht finden, um die Datei hochzuladen.<br>";
				$this->feedback .="PHP-Handbuch: Fehlender temporärer Ordner. Eingeführt in PHP 5.0.3.";
				break;
			case 7:
				$this->feedback .="Das Speichern der Datei ist fehlgeschlagen.<br>";
				$this->feedback .="PHP-Handbuch: Speichern der Datei auf die Festplatte ist fehlgeschlagen. Eingeführt in PHP 5.1.0.";
				break;
			case 8:
				$this->feedback .="Normalo-Feedback: Der Upload der Datei wurde gestoppt.<br>";
				$this->feedback .="PHP-Handbuch: Eine PHP Erweiterung hat den Upload der Datei gestoppt. PHP bietet keine Möglichkeit an, um festzustellen welche Erweiterung das Hochladen der Datei gestoppt hat. Überprüfung aller geladenen Erweiterungen mittels phpinfo() könnte helfen. Eingeführt in PHP 5.2.0.";
				break;
		}
		if ($errorNo == 0) {
			return true;
		}
		else {
			return false;
		}
	}
	
	
	// Mache weitere Tests mit dem File
	function checkFile() {
		// Checke, ob die Datei ein Bild ist (erhöht auch die Sicherheit)
		// $image_info = getimagesize()
		
		
		// Checke die Dateiendung
		// pathinfo($target_file,PATHINFO_EXTENSION)
		
	
		// Checke den MIME-Type der Datei
		// $filepath = realpath($_FILES['myFile']['tmp_name']);
		//  escape spaces in $filename due to their separating effect 
		// $filepath = str_replace(" ","\\ ",$filepath);
		// $finfo = finfo_open(FILEINFO_MIME_TYPE);
		// $mime = finfo_file($finfo, $filepath);
		// finfo_close($finfo);
		// if (!in_array($mime,$this->allowedMimeTypes)) {
			// $this->feedback .= "Diese Datei hat keinen erlaubten MIME-Type. Erlaubt sind nur Bilder.<br>";
		// }

		// Checke die Dimensionen des Bildes
		// $image_info[0]
		
		return true;
	}
	
	// Verschiebe das File aus dem temporären Verzeichnis in das Zielverzeichnis
	function moveFile() {
		// Warum der Schritt mit "is_uploaded_file()"?
		// s. https://www.php.net/manual/de/function.is-uploaded-file.php
		if (is_uploaded_file($_FILES['myFile']['tmp_name'])) {
			$tmp_name = $_FILES["myFile"]["tmp_name"];
        	// basename() kann Directory-Traversal-Angriffe verhindern;
        	// weitere Validierung/Bereinigung des Dateinamens kann angebracht sein
        	$name = basename($_FILES["myFile"]["name"]);
        	// An dieser Stelle könnte man checken, ob eine Datei mit diesem Namen bereits im Zielverzeichnis existiert
        	
        	
        	// Schwierig: Verändere den Dateinamen der hochzuladenden Datei, falls schon eine Datei mit diesem Namen im Zielverzeichnis existiert
        	
        	
        	move_uploaded_file($tmp_name, $this->targetBaseDir."/".$name);
        	$this->feedback .= "<br>Die Datei befindet sich jetzt im Verzeichns &quot;".$this->targetBaseDir."&quot;.";
		}
		else {
   			$this->feedback .= "<br>Mögliche Dateiupload-Attacke!";
   		}	
	}

}
?>