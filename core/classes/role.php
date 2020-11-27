<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of role
 *
 * @author Mtcy
 */
class role extends model {
    
    private $table = TABLE_USERS;
    private $column = COLUMN_ROLE;
    
    public function isRole($id, $role) {
        $user = $this->query("SELECT `$this->column` FROM `$this->table` WHERE `id` = '$id' LIMIT 1;");
        if ($user != false)
            if ($user->role == $role) {
                return true;
            }
        die("Access denied, not in your roles");
    }
    
    public function loggedInDenied() {
        if (cookie::get("id") != false) 
            die("Access denied, not in your roles");
    }
    
}

?>
