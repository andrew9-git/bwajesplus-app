<?php
require_once('includes/functions.php');
//logout script with last visited algorithm
session_start();

$id = $_SESSION['bwajes_plus_user_data']['id'];

$executed = set_active_to_0($id);

if($executed)
{
    $executed = update_last_logout($id);
    
    if($executed)
    {
        unset($_SESSION['is_bwajes_plus_user_logged_in']);
        session_destroy();
        $url = url()[1].'login';
        redirect_to($url);
    }
}


?>
