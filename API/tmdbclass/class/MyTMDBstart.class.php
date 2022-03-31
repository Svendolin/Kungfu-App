<?php
// --- MyTMBDstart.class.php ist die AUFBAUENDE VARIANTE von MyTMDB.class.php, die nicht mehr zum Einsatz kommt --- //
class MyTMDBstart {
	//1) PROPERTIES einbauen

	// API Key von: https://www.themoviedb.org/ (Konto erstellen, bei MEHR API Key anfordern)
	private $key = "91787fa61f4b1cc3be3cb842892d2b64";
	
	// Base-URL (Erwähnen, da die Version oder URL ändern kann: Neurere Version einfach hier einsetzen)
	private $baseURL = "https://api.themoviedb.org/3/";
	
	// Language (Resultate retour bekommen in dieser Sprache)
	private $lang = "de";
	
	// Full URL (URL die abgesetzt wird)
	private $fullURL = "";
	
	// Image-Path (Bilderordner herausnehmen und Breite auf Width: 500 reduzieren)
	private $imagePath = "https://image.tmdb.org/t/p/w500/";

	// Masse für iframes mit Videoausgabe
	private $width = 560;
	private $height = 315;

	//2) CONSTRUCTOR-METHOD (GRUNDVERSORGUNG dieses Objekts, was als Instanz nicht sonst wo aufgerufen wird):
	// Konstruktor: Setze den ersten Teil der URL zusammen (Bastelspass)
	function __construct($segment) {
		$this->fullURL .= $this->baseURL;
		$this->fullURL .= $segment;
		$this->fullURL .= "?api_key="; // So oder so nötiger Parameter
		$this->fullURL .= $this->key;
		$this->fullURL .= "&language="; // So oder so nötiger Parameter
		$this->fullURL .= $this->lang;
	}

	// 3) --- METHODE search() = Für FILME MIT SUCHBEGRIFFEN, z.B JACK REACHER:
	// Diese Methode wird als erstes Ausgelöst
	// Setze den vollen URL (mit Suchbegriff) zusammen:
	function search($searchStr) {
		$searchStr = urlencode($searchStr); // URL-Konform encodieren (Schönes URL ohne Sonderzeichen, die man nicht zuordnen kann - z.B. % für einen Abstand)
		$this->fullURL .= "&query=".$searchStr;
		// echo $this->fullURL;
		
		// CURL von unten initialisieren
		$arr = $this->makeRequest();
		
		$code = "";
		// Filmtitel EN und DE
		foreach ($arr['results'] as $out) { // Jeder Treffer der Anfrage soll retour kommen - In jedem Durchgang eine Variable $out
			$code .= "<h3>En. Titel: ".$out['original_title']."<br>"; // Als Originalspache vom Film (englicher Titel z.B) herausgeben.
			$code .= "Deutsch. Titel: ".$out['title']."</h3>";

			// String mit explode() zerchneiden, um die amerikanische Zeit in die Deutsche "zurechtzubiegen"
			$datum = $out['release_date'];
			$datumArr = explode("-",$datum);
			$year = $datumArr[0];
			$code .= "<p>".$year ."</p>";

			// $out geht aus dem foreach einher, ['id'] die dazu passende ID des Films
			// Filmposter
			$code .= "<p><img class=\"poster\" src=\"".$this->imagePath.$out['poster_path']."\"></p>";
			$code .= "<p>";
			
			// Link zu Filmseite
			$code .= "<a href=\"movie.php?id=".$out['id']."\">Zum Film</a> | ";
			
			// Link zu Trailerseite
			$code .= "<a href=\"trailer.php?id=".$out['id']."\">Trailer</a> | ";
			
			// Link zu Schauspielerseite
			$code .= "<a href=\"actors.php?id=".$out['id']."\">Schauspieler</a>";
			$code .= "</p>";
			
			$code .= "<hr>";
		}
		/*
		echo "<pre>";
		var_dump($arr);
		echo "</pre>";
		*/
		return $code;
	}
	
	// 4) --- METHODE searchMovie() = Hier bauen wir die Grundstruktur der Filmesuchfunktion, die optisch eine Grundbasis bietet
	function searchMovie() {

		// CURL von unten initialisieren
		$arr = $this->makeRequest();
		
		$code = "";
		// Filmtitel
		$code .= "<h2>En. Titel: ".$arr['original_title']."<br>";
		$code .= "Deutsch. Titel: ".$arr['title']."</h2>";
		// Untertitel
		$code .= "<h3><em>".$arr['tagline']."</em></h3>";
		//  Genres
		foreach($arr['genres'] as $out) {
			$code .= $out["name"]." | ";
		}
		// Budget
		$budget = $arr['budget'] / 1000000;
		$code .= "<p>Budget: ".$budget ." Mio</p>";
		// Erscheinungsländer
		$countries = "";
		foreach($arr['production_countries'] as $out2) {
			$countries .= $out2["name"]." | ";
		}
		
		// Erscheinungsjahr
		$datum = $arr['release_date'];
		$datumArr = explode("-",$datum);
		$datumDe = $datumArr[0];
		$code .= "<p>".$countries.$datumDe ."</p>";
		// Website
		$code .= "<p><a href=\"".$arr['homepage']."\" target=\"_blank\">".$arr['homepage']."</a></p>";

		// Handlung
		$code .= "<p>".$arr['overview']."</p>";
		$code .= "<p><img class=\"poster\" src=\"".$this->imagePath.$arr['poster_path']."\"></p>";
		/*
		echo "<pre>";
		var_dump($arr);
		echo "</pre>";
		*/
		return $code;
	}

	// NEU:

	// 5) --- METHODE getTrailer() = Trailer auf Trailerseite ausgeben
	function getTrailer() {
		$arr = $this->makeRequest();
		
		$code = "";
		foreach ($arr['results'] as $out) {
		
			$code .= "<h3>".$out['name']."</h3>";
			
			// Youtube
			if ($out['site'] == "YouTube") {
				$code .= "<iframe width=\"".$this->width."\" height=\"".$this->height."\" src=\"https://www.youtube-nocookie.com/embed/".$out['key']."\"";
				$code .= " title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write;";
				$code .= "encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>";
				$code .= "</iframe>";
			}
			
			// Vimeo
			if ($out['site'] == "Vimeo") {
				$code .= "<iframe src=\"https://player.vimeo.com/video/".$out['key']."&title=0&byline=0&portrait=0\"";
				$code .= " width=\"".$this->width."\" height=\"".$this->height."\" frameborder=\"0\"";
				$code .= " allow=\"autoplay; fullscreen; picture-in-picture\" allowfullscreen>";
				$code .= "</iframe>";
			}
		}	
		return $code;
	}

	// NEU:

	// 6) --- Methode getActors() = Schauspieler filmspezifisch ausgeben
	function getActors() {
	
		$arr = $this->makeRequest();
		
		$code = "";
		foreach ($arr['cast'] as $out) {
			if ($out['known_for_department'] ==  "Acting") {
				// Name
				$code .= "Name: ".$out['name']."<br>";
				// Rolle
				$code .= "Rolle: ".$out['character'];
				if ($out['profile_path'] != "") {
					$code .= "<p><img class=\"actor_img\" src=\"".$this->imagePath.$out['profile_path']."\"></p>";
				}
				else {
					$code .= "<p>Kein Bild gefunden</p>";	
				}
				$code .= "<hr>";
			}
		}
		
		return $code;
	
	}

	// CURL verbindungsaufnahme (Das was der Browser macht mit ein paar Zeilen Code immitieren - Verbindungsaufnahme muss auf dem Server erfolgen, desshalb CURL)
	// makeRequest()-Methode
	private function makeRequest() {
		$ch = curl_init(); // CURL initialisieren
		curl_setopt($ch, CURLOPT_URL, $this->fullURL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);

		$arr = json_decode($result,true); // json_decode = Objekt in ein assoziatives Array ummöbeln
		return $arr;
	}
}
?>