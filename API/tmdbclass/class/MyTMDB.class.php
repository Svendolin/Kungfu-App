<?php
// --- VERALTET / DEPRICATED !!! --- //
class MyTMDB {
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
        $this->fullURL = $this->baseURL;
        // Was soll gemacht werden
        $this->fullURL .= $segment;
        // Api Key
        $this->fullURL .= "?api_key=" . $this->key;
        // Sprache
        $this->fullURL .="&language=".$this->lang;
	}
	
	function search($searchStr) {
		$searchStr = urlencode($searchStr);
		$this -> fullURL .= "&query=" . $searchStr;
		$result = $this->makeRequest();
		$str = json_decode($result, true);
		
		/*
		echo "<pre>";
		var_dump($str);
		echo "</pre>";
		*/
		
		$code = "";
		foreach ($str["results"] as $out) {
			$code .= "<h3>Original-Titel: ".$out['original_title']." | ";
			$code .= "Deutscher Titel: ".$out['title']."</h3>";
			$temp_arr = explode("-",$out['release_date']);
			$code .= "<p><strong>".$temp_arr[0]."</strong></p>";
			$code .= "<img src=\"".$this->imagePath.$out['poster_path']."\" style=\"width: 100%; max-width: 200px; height: auto;\">";
			$code .= "<p>".$out['overview']."</p>";
			$code .= "<hr>";
		}
		return $code;
	}
	
	
	private function makeRequest() {
		// Zum Testen
		echo $this->fullURL;
		// create curl resource 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $this -> fullURL); 
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $headers = array(
   			"Accept: application/json",
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // $output contains the output string 
        $output = curl_exec($ch); 
        // close curl resource to free up system resources 
        curl_close($ch);
        
        return $output;
	}
}
?>