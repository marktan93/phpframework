<?php 
session_start();

require 'core/config.php';
require 'core/table.php';
require 'core/bootstrap.php';
require 'core/route.php';
require 'core/functions.php';

$route = new route;

# make it global and easier for display at any site (etc, header, footer, content)
require_once 'app/models/m_account.php'; // prevent fatal error, no such class
if (cookie::get("id") != null) {
    $glob_account = new m_account();
    $user = $glob_account->get_user_by_id(cookie::get("id"));
    viewbag("email", $user->email);
}

?>