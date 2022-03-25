<?php
class ValidateForm {
	// Feedbackstring für leere obligatorische Felder
	private $emptyRequiredFieldsFeedback = "Bitte füllen Sie das Feld aus.";
	// Array für das gesamte Feedback
	public $feedbackArray = array();
	// Eigenschaft für den Validierungsstatus des Formulars
	public $validationState = true;
	
	public function validateElement($value,
									$isRequired,
									$elementName="",
									$kind="",
									$feedbackStr="") {
									
		// Es wird IMMER desinfiziert!
		$cleanValue = $this -> desinfect($value);
		$check = "positive";
		$kindArray = explode("|",$kind);
		if ($isRequired && ($value == "")) {
			$this -> feedbackArray[] = $elementName.": ".$this -> emptyRequiredFieldsFeedback;
			$this -> validationState = false;
		}
		elseif(strlen($value) > 0) {
			if (in_array('email',$kindArray)) {
				if(!$this->isEmail($value)) {
					$check = "negative";
				}
			}
			if (in_array('plz',$kindArray)) {
				if(!$this->isPLZ($value)) {
					$check = "negative";
				}
			}
			if (in_array('password',$kindArray)) {
				if(!$this->isPassword($value)) {
					$check = "negative";
				}
			}
			
			$arr1 = preg_grep("/^min_length-\d*/",$kindArray);
			$key1 = key($arr1);
			if (count($arr1) > 0) {
				$parts1 = explode("-",$arr1[$key1]);
				if(!$this->isMinLength($value,$parts1[1])) {
					$check = "negative";
				}
			}
			
			$arr2 = preg_grep("/^max_length-\d*/",$kindArray);
			$key2 = key($arr2);
			if (count($arr2) > 0) {
				$parts2 = explode("-",$arr2[$key2 ]);
				if(!$this->isMaxLength($value,$parts2[1])) {
					$check = "negative";
				}
			}
		}
		
		if ($check == "negative") {
			$this -> feedbackArray[] = $elementName.": ".$feedbackStr;
			$this -> validationState = false;
		}
		
		return $cleanValue;
	}
	
	public function desinfect($str) {
		$cleanStr = filter_var($str, FILTER_SANITIZE_STRING);
		$cleanStr = trim($cleanStr);
		return $cleanStr;
	}
	
	private function isEmail($str) {
		// Ist die E-Mail-Adresse gültig?
		if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	private function isPLZ($str) {
		$suchmuster = '/^[1-9]{1}[0-9]{3}$/';
		if (preg_match($suchmuster, $str)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	private function isMinLength($str,$length) {
		$anzZeichen = strlen($str);
    	if ($anzZeichen >= $length) {
    		return true;
		}
		else {
			return false;
		}
	}
	
	private function isMaxLength($str,$length) {
		$anzZeichen = strlen($str);
    	if ($anzZeichen <= $length) {
    		return true;
		}
		else {
			return false;
		}
	}

	private function isPassword($str) {
		$suchmuster = '/^(?=[^\d_].*?\d)\w(\w|[!@#%]){7,20}$/';
		if (preg_match($suchmuster, $str)) {
			return true;
		}
		else {
			return false;
		}


	}
}
?>