<?php
class MyTMDBstart {
	// API Key
	private $key = "91787fa61f4b1cc3be3cb842892d2b64";
	
	// Base-URL
	private $baseURL = "https://api.themoviedb.org/3/";
	
	// Language
	private $lang = "de";
	
	// Full URL
	private $fullURL = "";
	
	// Image-Path
	private $imagePath = "https://image.tmdb.org/t/p/w500/";

	// Konstruktor: Setze den ersten Teil der URL zusammen
	function __construct($segment) {
		$this->fullURL .= $this->baseURL;
		$this->fullURL .= $segment;
		$this->fullURL .= "?api_key=";
		$this->fullURL .= $this->key;
		$this->fullURL .= "&language=";
		$this->fullURL .= $this->lang;
	}
	
	// Setze den vollen URL (mit Suchbegriff) zusammen
	function search($searchStr) {
		$searchStr = urlencode($searchStr);
		$this->fullURL .= "&query=".$searchStr;
		// echo $this->fullURL;
		
		$arr = $this->makeRequest();
		
		$code = "";

		foreach ($arr['results'] as $out) {
			$code .= "<h3>En. Titel: ".$out['original_title']."<br>";
			$code .= "Deutsch. Titel: ".$out['title']."</h3>";

			$datum = $out['release_date'];
			$datumArr = explode("-",$datum);
			$datumDe = $datumArr[0];

			$code .= "<p>".$datumDe ."</p>";
			// $code .= "<p>".$out['overview']."</p>";
			$code .= "<p><img class=\"poster\" src=\"".$this->imagePath.$out['poster_path']."\"></p>";
			$code .= "<p><a href=\"movie.php?id=".$out['id']."\">Zum Film</a></p>";
			
			$code .= "<hr>";
		}
		/*
		echo "<pre>";
		var_dump($arr);
		echo "</pre>";
		*/
		return $code;
	}
	
	function searchMovie() {

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

	// CURL
	private function makeRequest() {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->fullURL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);

		$arr = json_decode($result,true);
		return $arr;
	}
}
?>