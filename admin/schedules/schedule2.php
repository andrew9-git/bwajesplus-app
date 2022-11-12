<?php

include("scheduleFunctions.php");

//---------------//
//schedule at custom interval


//users that have posted/edited in a week

$users = fetch_users();
foreach($users as $user)
{
    $id = $user['id'];
    $email = $user['email'];

    if(fetch_last_post_count($id) > 0)
    {

        $set_from = array(
            'email' => 'support@bwajes-plus.andadel.com',
            'name' => 'bwajes+'
        );
    
        // $add_reply_to = array(
        //     'email' => 'no-reply@bwajes-plus.andadel.com', 
        //     'message' => 'Do not reply to this mail'
        // );
    
        $add_address = array(
            'email' => $email,
            'name' => ''
        );
    
        $subject = 'Got an [IDEA] to share?';
        $body = 'You are just one click away from sharing that wonderful idea to the world!. <a href="'.url()[0].'login" style="color: red;">GET STARTED NOW!</a>';
        $altbody = 'You are just one click away from sharing that wonderful idea to the world!. GET STARTED NOW!';
    
        $body = email_template($body, 0, 1, '', '', 1);
    
        $data = array(
            'subject' => $subject,
            'body' => $body,
            'altbody' => $altbody
        );
    
        send_mail($set_from, $add_address, $data);
    }

}


//==============//

?>