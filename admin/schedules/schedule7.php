<?php

include("scheduleFunctions.php");
//scheduling every time!

//Messaging users that successfully made a payment (today)
$payments = fetch_users_from_payment_subscriptions();
foreach($payments as $payment)
{
    $id = $payment['id'];

    $user = fetch_single_row($payment['user_id'], 'users');

    $email = $user['email'];
    $first_name = ucfirst(strtolower($user['first_name']));
    $last_date = $payment['last_date'];

    $last_date = date('Y-m-d H:i:s', strtotime($last_date));

    $values = array(
        'agreement_id'   => $payment['agreement_id'],
        'interval_value' => $payment['interval_value']
    );

    $end_date  = paypal($values)['end_date'];
    $agreement = paypal($values)['agreement'];
    $agreementDetails = paypal($values)['agreementDetails'];

    $last_payment_date = $agreementDetails->getLastPaymentDate();

    $last_payment_date = date('Y-m-d H:i:s', strtotime($last_payment_date));
    
    if($last_payment_date != $last_date && $last_payment_date > $last_date)
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

        if($mail_sent == true)
        {
            $values = array(
                'id' => $id,
                'last_date' => $last_payment_date
            );

            //update last date
            update_last_date($values);
        }

    }

}

//==============//

?>