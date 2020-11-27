<?php 

class validation {
	
	public static function is_empty($data) {
		if (empty($data)) return true;
		return false;
	}
	
	public static function array_is_empty($data) {
		if (is_array($data)) {
			if (count($data)< 1 || empty($data))
				return true;
			return false;
		}
		return false;
	}

}

?>