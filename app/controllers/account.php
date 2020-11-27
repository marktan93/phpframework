<?php

class account extends controller {
    
    # hardcoded, just for running first time generate data
//    public function register($param) {
//        list($username, $password, $email) = $param;
//        $salt = sha1(uniqid());
//        $password = $this->hash_algorithm($password, $salt);
//        $role = Constant::Admin;
//        $result = new m_account;
//        var_dump($result->register($username, $password, $salt, $email, $role));
//    }
    
    private function hash_algorithm($data, $salt) {
        return sha1($salt.$data.$salt);
    }
    
    public function login() {
        $role = new role();
        $role->loggedInDenied();
        $this->content('login');
    }
    
    public function login_process() {
        $role = new role();
        $role->loggedInDenied();
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $duration = 0;
            if (isset($_POST['remember']))
                $duration = time()+3600*24*30; // expired in 30 days
            $_POST = array_values($_POST);
            list($username, $password) = $_POST;
            if (!empty($username) && !empty($password)) {
                $account = new m_account();
                $obj = $account->get_account($username);
                $salt = $obj->salt;
                $password = $this->hash_algorithm($password, $salt);
                if ($password == $obj->password) {
                    // login
                    
                    cookie::create('id', $obj->id, $duration);
                    
                    $this->redirect(url("company/banner")); 
                    die();
                }
            }
        }
        viewbag("login_error", "Incorrect information");
        $this->redirect(url("account/login"));
    }
    
    public function logout() {
        $role = new role();
        $role->isRole(cookie::get("id"), Constant::Admin);
        cookie::unset_cookie("id");
        $this->redirect(url("account/login"));
    }
    
    public function forget() {
        $role = new role();
        $role->loggedInDenied();
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            if (!empty($email)) {
                $acc = new m_account();
                $obj = $acc->get_id_by_email($email);
                if ($obj != false) {
                    $id = $obj->id;
                    $result = $acc->reset_password($id);
                    if ($result != false) {
                        // send email
                        if (mail($email, "password recovery", $result)) {
                            // success
                            viewbag("forget_success", "Please check your email. Thanks");
                        } 
                    }
                } 
            }
        }
        viewbag("Invalid email, please enter again.");
        $this->redirect(url("account/login"));
    }
    
    public function password() {
        $role = new role();
        $role->isRole(cookie::get("id"), Constant::Admin);
        $this->content("changepassword");
    }
    
    public function password_process() {
        $role = new role();
        $role->isRole(cookie::get("id"), Constant::Admin);
        $_POST = array_values($_POST);
        if (count($_POST) == 2) {
            list($password, $confirm_password) = $_POST;
            if ($password == $confirm_password) {
                $m_account = new m_account();
                $acc = $m_account->get_user_by_id(cookie::get("id"));
                $password = $this->hash_algorithm($password, $acc->salt);
                $result = $m_account->change_password(cookie::get("id"), $password);
                if ($result) {
                    $this->redirect(url("company/banner"));
                    die();
                }
            } else {
                viewbag("msg", "Password doesn't match");
                $this->redirect(url("account/password"));
                die();
            }
        }
        viewbag("msg", "Faild to change password");
        $this->redirect(url("account/password"));
    }
}

?>
