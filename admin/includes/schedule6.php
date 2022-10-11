<?php

include("scheduleFunctions.php");
//scheduling once a day

//users that have subscription that have not expired and state is active
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

    if($agreement->getState() == "Active" && date('Y-m-d') == $fifteen)
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

}

//users that have subscription that have not expired and state is cancelled
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

    if($agreement->getState() == "Cancelled" && date('Y-m-d') == $fifteen)
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

}

//users that subscription will expire today
$payments = fetch_users_from_payment_subscriptions();
foreach($payments as $payment)
{
    $id = $payment['id'];

    $user = fetch_single_row($payment['user_id'], 'users');

    $email = $user['email'];
    $first_name = ucfirst(strtolower($user['first_name']));
    $created_at = $payment['created_at'];

    $created_at = date('Y-m-d', strtotime($created_at));

    $values = array(
        'agreement_id'   => $payment['agreement_id'],
        'interval_value' => $payment['interval_value']
    );

    $end_date  = paypal($values)['end_date'];
    $agreement = paypal($values)['agreement'];
    $agreementDetails = paypal($values)['agreementDetails'];
    
    $end_date = date('Y-m-d', strtotime($end_date));
    
    if($agreement->getState() == "Active" && date('Y-m-d') == $end_date && date('Y-m-d') != $created_at)
    {
        
        $next_date = $agreementDetails->getNextBillingDate();
        $last_payment = $agreementDetails->getLastPaymentAmount();

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
    
        $subject = 'Thanks for your support!';
        $body = '<p>Thank you '.$first_name.'. for supporting us once again in making a better software for you and others. We\'ve recieved a payment of '.$last_payment.' for bwajes+ ads removal.</p><p>This current plan will be due for renewal on ' . date("F jS, Y", strtotime($next_date)) . '</p>';
        $altbody = 'Thank you '.$first_name.'. for supporting us once again in making a better software for you and others. We\'ve recieved a payment of '.$last_payment.' for bwajes+ ads removal. This current plan will be due for renewal on ' . date("F jS, Y", strtotime($next_date));
    
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