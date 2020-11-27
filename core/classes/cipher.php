<?php

/**
 * cipher class to manage the encryption and decryption process or algorithm
 * @author Mtcy
 * @copyright (c) 2014, Mtcy
 * 
 */

class cipher {
    /**
     *
     * @var string set the securekey for the mcrypt_encrypt and mcrypt_decrypt
     */
    private $securekey;
    
    /**
     * When create the object class, need to pass in the securekey
     * @param string $textkey required to pass in the securekey
     */
    public function __construct($textkey) {
        $this->securekey = hash('sha256',$textkey,TRUE);
    }
    
    /**
     * Use to do the encryption, used base64_encode and mcrypt_encrypt
     * @param string $input Data to be encrypted
     * @return string Data already been encrypted
     */
    public function encrypt($input) {
        $iv = mcrypt_create_iv(32);
        return base64_encode($iv.mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->securekey, $input, MCRYPT_MODE_ECB, $iv));
    }
    
    /**
     * Use to do the decryption, used base64_decode and mcrypt_decrypt
     * @param string $input Data to be decrypted
     * @return string Data already been decrypted
     */
    public function decrypt($input) {
        $input = base64_decode($input);
        $iv = substr($input, 0, 32);
        $input = substr($input, 32);
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->securekey, $input, MCRYPT_MODE_ECB, $iv);
    }
}

?>
