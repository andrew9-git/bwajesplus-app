<?php
// require __DIR__ . '/../bootstrap.php';
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Common\PayPalModel;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;

    include('./billingFunctions.php');

    require('../vendor/autoload.php');

if(isset($_POST['user-id']))
{
    $id = 'AT7HaJrDpit6eDrFtPtdC7_v-qZE9fydQDxZBCZw-YKc0Xk23xVPDqhpRzJ62JltKHdnj7FOUcnTDu2N';
    $secret = 'EKYM7jeg21Y8Xkj5eF1saUIU_LwHjsTKe1x-1VqJKFEzPvUFDimAJh-7EWx9HOgCaelPIgQonv3S0Tz3';

    $apiContext = paypal_context($id, $secret);
    paypal_config($apiContext);


    // $user_id = $_SESSION['user_data']['id'];
    $user_id = $_POST['user-id'];

    $row = fetch_single_row_in_payment($user_id, 'user_id');

    $agreement_id = $row['agreement_id'];

    $agreement = new \PayPal\Api\Agreement();
    
    // $agreement->setId($agreement_id);

    $agreement_state_descriptor = new \PayPal\Api\AgreementStateDescriptor();
    $agreement_state_descriptor->setNote('Cancelling ad removal on all user\'s posts subscription');

    // $createdAgreement = $agreement->get('I-J59HNHHF9WWU', $apiContext);
    $createdAgreement = $agreement->get($agreement_id, $apiContext);

    try
    {
        // $agreement_id = $agreement->getId();

        // $agreement = new \PayPal\Api\Agreement($agreement_id, $apiContext);

        
        $cancelled = $createdAgreement->cancel($agreement_state_descriptor, $apiContext);
        
        if($cancelled)
        {
            //update payment subscriptions
            $row = fetch_single_row_in_payment($user_id, 'user_id');
            $subscription_id = $row['id'];
            
            $executed = update_state($subscription_id);
            if($executed)
            {
                //redirect
                $url = 'http://localhost:9090/bwajesplus-app/remove-ads?cancelled=true';

                // redirect_to($url);
                echo $url;
            }
        }

    }
    catch(\PayPal\Exception\PayPalConnectionException $ex)
    {
        // $msg = "<div class='card error'><div>". $ex->getData()."</div></div>";
        // echo $msg;
        echo $ex->getData();
    }
}
?>