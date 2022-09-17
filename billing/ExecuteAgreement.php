<?php

// use PayPal\Api\ChargeModel;
// use PayPal\Api\Currency;
// use PayPal\Api\MerchantPreferences;
// use PayPal\Api\Patch;
// use PayPal\Api\PatchRequest;
// use PayPal\Api\PaymentDefinition;
// use PayPal\Api\Plan;
// use PayPal\Common\PayPalModel;
// use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;//
use PayPal\Auth\OAuthTokenCredential;//
// use PayPal\Api\Transaction;
// use PayPal\Api\RedirectUrls;


include('billingFunctions.php');

    require('../vendor/autoload.php');

    $id = 'AT7HaJrDpit6eDrFtPtdC7_v-qZE9fydQDxZBCZw-YKc0Xk23xVPDqhpRzJ62JltKHdnj7FOUcnTDu2N';

    $secret = 'EKYM7jeg21Y8Xkj5eF1saUIU_LwHjsTKe1x-1VqJKFEzPvUFDimAJh-7EWx9HOgCaelPIgQonv3S0Tz3';

    $apiContext = paypal_context($id, $secret);

    paypal_config($apiContext);


    if(isset($_GET['success']) && $_GET['success'] == 'true')
    {
        $token = $_GET['token'];
        $agreement = new \PayPal\Api\Agreement();

        try
        {
            $agreement->execute($token, $apiContext);
        }
        catch(\PayPal\Exception\PayPalConnectionException $ex)
        {
            // $msg = "<div class='card error'><div>". $ex->getData()."</div></div>";
            // echo $msg;
            echo $ex->getData();
        }

        //fetch agreement details of user's payment from paypal and will get inserted into the database
        $agreement = \PayPal\Api\Agreement::get($agreement->getId(), $apiContext);
        $details = $agreement->getAgreementDetails();
        
        $payer = $agreement->getPayer();
        $status = $payer->status;
        $payment_method = $payer->payment_method;
        $payer_info = $payer->getPayerInfo();

        $plan = $agreement->getPlan();
        $payment = $plan->payment_definitions[0];
        $interval = $payment->frequency_interval;

        $agreement_id = $agreement->getId();
        $state = $agreement->getState();
        $description = $agreement->getDescription();
        $start_date = date('Y-m-d H:i:s', strtotime($agreement->getstartDate()));

        $currency = $payment->amount->currency;
        $amount = $payment->amount->value;
        // $cycle = $payment->cycles;
        $value = $currency . ' ' . $amount;

        $payer_id = $payer_info->payer_id;
        $email = $payer_info->email;
        $first_name = $payer_info->first_name;
        $last_name = $payer_info->last_name;

        if($interval > 1)
        {
            $month = 'months';
        }
        else
        {
            $month = 'month';
        }

        $end_date = date('Y-m-d H:i:s', strtotime("+{$interval} {$month}", strtotime($start_date)));
        $user_id = $_SESSION['user_data']['id'];

        //if interval is 12, add 1 to number of private posts allowed
        if($interval == 12)
        {
            // $user = fetch_single_row($user_id, 'users');

            $executed = update_no_of_private_posts($user_id);
            if($executed)
            {
                //insert into payment subcriptions table
                $values = array(
                    'user_id'        => $user_id,
                    'agreement_id'   => $agreement_id,
                    'interval_value' => $interval,
                    'state'          => $state,
                    'status'         => $status,
                    'amount'         => $amount,                    'amount_with_currency' => $value,
                    'payer_id'       => $payer_id,
                    'email'          => $email,
                    'first_name'     => $first_name,
                    'last_name'      => $last_name,
                    'start_date'     => $start_date,
                    'end_date'       => $end_date,
                    'payment_method' => $payment_method
                );

                $executed = payment_subscriptions($values);

                if($executed)
                {
                    $set_from = array(
                        'email' => 'billing@bwajes-plus.andadel.com',
                        'name' => 'Payment Service'
                    );

                    $name = $_SESSION['user_data']['first_name']. ' ' . $_SESSION['user_data']['last_name'];
                    $add_address = array(
                        'email' => $_SESSION['user_data']['email'],
                        'name' => $name
                    );

                    $subject = 'Ads removal';
                    $body_msg = 'Thank you ' . ucfirst(strtolower($_SESSION['user_data']['first_name'])). '. we\'ve recieved your payment of '.$value.' for ads removal on all your posts. This subscription will be due for renewal on '.date("F jS, Y", strtotime($end_date));
                    $altbody = 'Thank you ' . ucfirst(strtolower($_SESSION['user_data']['first_name'])). '. we\'ve recieved your payment of '.$value.' for ads removal on all your posts. This subscription will be due for renewal on '.date("F jS, Y", strtotime($end_date));
                    $body = email_template($body_msg, 0, 1, encryption('users'), $_SESSION['user_data']['email']);

                    $data = array(
                        'subject' => $subject,
                        'body'    => $body,
                        'altbody' => $altbody
                    );

                    $mail_response = send_mail($set_from, $add_address, $data);
                    if($mail_response !== true)
                    {
                        echo "<div class='card error'><div>" . $mail_response . "</div></div>";
                    }
                    else
                    {
                        //redirect to remove-ads page with a message using query string
                        $url = 'http://localhost:9090/bwajesplus-app/remove-ads?success=true';

                        redirect_to($url);
                    }
                }
            }
        }
        else
        {
            //insert into payment subcriptions table
            $values = array(
                'user_id'        => $user_id,
                'agreement_id'   => $agreement_id,
                'interval_value' => $interval,
                'state'          => $state,
                'status'         => $status,
                'amount'         => $amount,                'amount_with_currency' => $value,
                'payer_id'       => $payer_id,
                'email'          => $email,
                'first_name'     => $first_name,
                'last_name'      => $last_name,
                'start_date'     => $start_date,
                'end_date'       => $end_date,
                'payment_method' => $payment_method
            );

            $executed = payment_subscriptions($values);

            if($executed)
            {
                if($executed)
                {
                    $set_from = array(
                        'email' => 'developer@andadel.com',
                        'name' => 'bwajes+'
                    );

                    $name = $_SESSION['user_data']['first_name']. ' ' . $_SESSION['user_data']['last_name'];
                    $add_address = array(
                        'email' => $_SESSION['user_data']['email'],
                        'name' => $name
                    );

                    $subject = 'Ads removal';
                    $body_msg = 'Thank you ' . $_SESSION['user_data']['first_name']. '. we\'ve recieved your payment of '.$value.' for ads removal on all your posts.\r\nThis subscription will be due for renewal on '.date("F jS, Y", strtotime($end_date));
                    $altbody = 'Thank you ' . $_SESSION['user_data']['first_name']. '. we\'ve recieved your payment of '.$value.' for ads removal on all your posts.\r\nThis subscription will be due for renewal on '.date("F jS, Y", strtotime($end_date));
                    $body = email_template($body_msg, 0);

                    $data = array(
                        'subject' => $subject,
                        'body'    => $body,
                        'altbody' => $altbody
                    );

                    $mail_response = send_mail($set_from, $add_address, $data);
                    if($mail_response !== true)
                    {
                        echo "<div class='card error'><div>" . $mail_response . "</div></div>";
                    }
                    else
                    {
                        //redirect to remove-ads page with a message using query string
                        $url = 'http://localhost:9090/bwajesplus-app/remove-ads?success=true';

                        redirect_to($url);
                    }
                }
            }

        }
        
    }
    else
    {
        echo 'user cancelled agreement';
    }


?>