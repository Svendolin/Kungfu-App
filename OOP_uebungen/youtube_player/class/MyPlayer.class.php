<?php
// Unsere Methode (Klasse mit Funktion? Nein wir probieren es mit mehreren Funktionen, mehrere Player)
class MyPlayer {

	/* 1) EIGENSCHAFT (Property) um zu bestimmten, ob iframes responsive sind*/

	public $isResponsive = "";

	/* 2) KONSTRUKTOR, der die Eigenschaft schreibt
				- Eigenschaft nennen und mit $this bestücken
				- boolsche Werte TRUE or FALSE im youtube_player.php erklären */
	function __construct($bool) {
		$this->isResponsive = $bool;
	}



	// 3) PARAMETER
	//Youtube-ID Breite, Höhe des Videos
	public function makeYoutubePlayer($id, $width, $height) {
		/* 
		- Vor die " des Videocodes \ setzen um deren Funktion aufzuheben, zugehörig pink markiert
		- Die Äusseren "" bitte nicht mit \ zersettzen, da sie zur Variable $code gehören
		- ".$id." um Variablen der Funktion in $code einzusetzen, dazu .. nutzen
		*/
		$code = "";
		if ($this->isResponsive) {
			$code .= "<div class=\"videoWrapper\">"; // Wrapperdiv, um einen responsiven "Videokasten" zu haben
		}
	
		$code .="<iframe width=\"".$width."\" height=\"".$height."\" src=\"https://www.youtube-nocookie.com/embed/".$id."\""; 
		$code .="title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write\""; 
		$code .="encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>";
		$code .="</iframe>";
		if ($this->isResponsive) {
			$code .= "</div>"; // Wrapperdiv, um einen responsiven "Videokasten" zu haben
		}
		return $code;
	}

	public function makeVimeoPlayer($id, $width, $height) {
	
		$code = "";
		if ($this->isResponsive) {
			$code .= "<div class=\"videoWrapper\">"; // Wrapperdiv, um einen responsiven "Videokasten" zu haben
		}
		$code .= "<iframe src=\"https://player.vimeo.com/video/".$id."&title=0&byline=0&portrait=0\"";
		$code .= "width=\"".$width."\" height=\"".$height."\" frameborder=\"0\" allow=\"autoplay; fullscreen; picture-in-picture\" allowfullscreen></iframe>";

		if ($this->isResponsive) {
			$code .= "</div>"; // Wrapperdiv, um einen responsiven "Videokasten" zu haben
		}
		return $code;
	}
}
?>