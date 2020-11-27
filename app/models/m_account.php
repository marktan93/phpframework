<?php

/**
 * Description of m_account
 *
 * @author Mtcy
 */
class m_account extends model {
    
    # hardcoded, just for running first time generate data
//    public function register($username, $password, $salt, $email, $role) {
//        $result = $this->insert(TABLE_USERS, array(
//                                            'username' => $username,
//                                            'password' => $password,
//                                            'salt'     => $salt,
//                                            'email'    => $email,
//                                            'role'     => $role
//                                        )
//                    );
//        return $result;
//    }
    
    public function get_account($username) {
        $obj = $this->query("SELECT * FROM `".TABLE_USERS."` WHERE `username` = '$username' ");
        return $obj;
    }
    
    public function get_id_by_email($email) {
        $obj = $this->query("SELECT `id` FROM `".TABLE_USERS."` WHERE `email` = '$email' LIMIT 1 ;");
        return $obj;
    }
    
    public function reset_password($id) {
        $obj = $this->get_user_by_id($id);
        $salt = $obj->salt;
        $new_pass = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 5);
        $salted_pass = sha1($salt.$new_pass.$salt);
        $result = $this->update(TABLE_USERS, array("password"=>$salted_pass), array("id"=>$id));
        if ($result != false) 
            return $new_pass;
        return false;
    }
    
    public function get_user_by_id($id) {
        $obj = $this->query("SELECT * FROM `".TABLE_USERS."` WHERE `id` = '$id' LIMIT 1;");
        return $obj;
    }
    
    public function change_password($id, $password) {
        $result = $this->update(TABLE_USERS, array("password"=>$password), array("id"=>$id));
        return $result;
    }
    
}

?>
