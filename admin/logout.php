<?php
require_once('includes/functions.php');
//logout script with last visited algorithm
session_start();

$id = $_SESSION['admin_data']['id'];

$executed = set_active_to_0($id);

if($executed)
{
    $executed = update_last_logout($id);
    
    if($executed)
    {
        unset($_SESSION['is_admin_logged_in']);
        session_destroy();
        redirect_to('http://localhost:9090/bwajes/admin/login');
    }
}


?>
