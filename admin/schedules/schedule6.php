<?php

include("scheduleFunctions.php");
//scheduling once a day

//users that have subscription that have not expired and state is active/cancelled
//with 15 days to expiration

$payments = fetch_users_from_payment_subscriptions();
foreach($payments as $payment)
{
    $id = $payment['id'];

    $user = fetch_single_row($payment['user_id'], 'users');

    $email = $user['email'];
    $first_name = ucfirst(strtolower($user['first_name']));

    $values = array(
        'agreement_id'   => $payment['agreement_id'],
        'interval_value' => $payment['interval_value']
    );

    $end_date  = paypal($values)['end_date'];
    $agreement = paypal($values)['agreement'];

    $fifteen = date('Y-m-d', strtotime("-15 days", strtotime($end_date)));

    $state = $agreement->getState();

    if($state == "Active" && date('Y-m-d') == $fifteen)
    {  
        $set_from = array(
            'email' => 'billing@bwajes-plus.andadel.com',
            'name' => 'bwajes+'
        );
    
        // $add_reply_to = array(
        //     'email' => 'no-reply@bwajes-plus.andadel.com', 
        //     'message' => 'Do not reply to this mail'
        // );
    
        $add_address = array(
            'email' => $email,
            'name' => $first_name
        );

        $subject = 'Ads removal';
        $body = 'Your subscription to bwajes+ ad removal will be due for renewal on ' . date("F jS, Y", strtotime($end_date));
        $altbody = 'Your subscription to bwajes+ ad removal will be due for renewal on ' . date("F jS, Y", strtotime($end_date));
    
        $body = email_template($body, 0, 1, '', '', 1);
    
        $data = array(
            'subject' => $subject,
            'body' => $body,
            'altbody' => $altbody
        );
    
        $mail_sent = send_mail($set_from, $add_address, $data);
    }
    elseif($state == "Cancelled" && date('Y-m-d') == $fifteen)
    {  
        $set_from = array(
            'email' => 'billing@bwajes-plus.andadel.com',
            'name' => 'bwajes+'
        );
    
        // $add_reply_to = array(
        //     'email' => 'no-reply@bwajes-plus.andadel.com', 
        //     'message' => 'Do not reply to this mail'
        // );
    
        $add_address = array(
            'email' => $email,
            'name' => $first_name
        );
        
        $subject = 'Ads removal';
        $body = 'Your subscription to bwajes+ ad removal will not be due for renewal on ' . date("F jS, Y", strtotime($end_date));
        $altbody = 'Your subscription to bwajes+ ad removal will not be due for renewal on ' . date("F jS, Y", strtotime($end_date));
    
        $body = email_template($body, 0, 1, '', '', 1);
    
        $data = array(
            'subject' => $subject,
            'body' => $body,
            'altbody' => $altbody
        );
    
        $mail_sent = send_mail($set_from, $add_address, $data);
    }

}

//==============//

?>