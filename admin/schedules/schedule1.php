<?php

include("scheduleFunctions.php");

//---------------//

//schedule at custom interval

//people that have unsubscribed for the last 30 days
//and this should done for all (4) tables


$users = fetch_unsubscribed_people('users');
foreach($users as $user)
{
    $email = $user['email'];

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

    $tblname = encryption('users');

    $subject = '[IMPORTANT] UPDATE';
    $body = 'Don\'t miss out on any important update. Please kindly <a href="'.url()[0].'dz5445z/resubscribe/'.$tblname.'/'.$email.'" style="color: red;">RESUBSCRIBE</a> to keep yourself updated on latest developments';
    $altbody = 'Don\'t miss out on any important update. Please kindly RESUBSCRIBE to keep yourself updated on latest developments';

    $body = email_template($body, 0, 1, '', '', 1);

    $data = array(
        'subject' => $subject,
        'body' => $body,
        'altbody' => $altbody
    );

    send_mail($set_from, $add_address, $data);
}

$subscribers = fetch_unsubscribed_people('subscriber_list');
foreach($subscribers as $subscriber)
{
    $email = $subscriber['email'];

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

    $tblname = encryption('users');

    $subject = '[IMPORTANT] UPDATE';
    $body = 'Don\'t miss out on any important update. Please kindly <a href="'.url()[0].'dz5445z/resubscribe/'.$tblname.'/'.$email.'" style="color: red;">RESUBSCRIBE</a> to keep yourself updated on latest developments';
    $altbody = 'Don\'t miss out on any important update. Please kindly RESUBSCRIBE to keep yourself updated on latest developments';

    $body = email_template($body, 0, 1, '', '', 1);

    $data = array(
        'subject' => $subject,
        'body' => $body,
        'altbody' => $altbody
    );

    send_mail($set_from, $add_address, $data);
}

$comments = fetch_unsubscribed_people('comments');
foreach($comments as $comment)
{
    $email = $comment['email'];

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

    $tblname = encryption('users');

    $subject = '[IMPORTANT] UPDATE';
    $body = 'Don\'t miss out on any important update. Please kindly <a href="'.url()[0].'dz5445z/resubscribe/'.$tblname.'/'.$email.'" style="color: red;">RESUBSCRIBE</a> to keep yourself updated on latest developments';
    $altbody = 'Don\'t miss out on any important update. Please kindly RESUBSCRIBE to keep yourself updated on latest developments';

    $body = email_template($body, 0, 1, '', '', 1);

    $data = array(
        'subject' => $subject,
        'body' => $body,
        'altbody' => $altbody
    );

    send_mail($set_from, $add_address, $data);
}

$email_lists = fetch_unsubscribed_people('email_list');
foreach($email_lists as $email_list)
{
    $email = $email_list['email'];

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

    $tblname = encryption('users');

    $subject = '[IMPORTANT] UPDATE';
    $body = 'Don\'t miss out on any important update. Please kindly <a href="'.url()[0].'dz5445z/resubscribe/'.$tblname.'/'.$email.'" style="color: red;">RESUBSCRIBE</a> to keep yourself updated on latest developments';
    $altbody = 'Don\'t miss out on any important update. Please kindly RESUBSCRIBE to keep yourself updated on latest developments';

    $body = email_template($body, 0, 1, '', '', 1);

    $data = array(
        'subject' => $subject,
        'body' => $body,
        'altbody' => $altbody
    );

    send_mail($set_from, $add_address, $data);
}

//==============//

?>