<?php

/**
 * Manage the cookie functions
 * 
 * @author Mtcy
 * @copyright (c) 2014, Mtcy
 */

class cookie {
    /**
     * Use to create the cookie
     * @global object $cipher Cipher class object
     * @param string $field_name Cookie's name
     * @param string $value Cookie's value
     * @param integer $duration Duration to keep the cookie working, default session
     * @return boolean
     */
	public static function create($field_name, $value, $duration = 0, $path = PATH, $domain = DOMAIN, $secure = false, $httponly = false) {
		global $cipher;
        if (setcookie($field_name, $cipher->encrypt($value), $duration, $path, $domain, $secure, $httponly))
            return true;
        return false;
	}
    
    /**
     * 
     * @global object $cipher Cipher class object
     * @param type $field_name Cookie's name
     * @return boolean return value when the cookie is set else return false
     */
    public static function get($field_name) {
        global $cipher;
        if (isset($_COOKIE[$field_name]))
            return trim($cipher->decrypt($_COOKIE[$field_name]));
        return false;
    }
    
    /**
     * call in bootstrap
     */
    public static function reset_deadline() {
        // check if the deadline is near
    }
	
	public static function unset_cookie($field_name) {
		if (isset($_COOKIE[$field_name]))
			setcookie($field_name, '', time()-1000, PATH, DOMAIN);
		else 
			return false;
		return true;
	}
	
	public function __destruct() {
		if (isset($_SERVER['HTTP_COOKIE'])) {
			$cookie = explode(';', $_SERVER['HTTP_COOKIE']);
			foreach ($cookie as $c) {
				$part = explode('=', $c);
				setcookie(trim($part[0]), '', time()-1000, PATH, DOMAIN);
			}
		}
		
		return true;
	}
}

?>
