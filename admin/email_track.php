<?php

if(isset($_GET['code']))
{
    $values = array(
        'email_track_code' => $_GET['code']
    );
    update_email_tracking($values);
}

?>