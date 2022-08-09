<?php

use PayPal\Api\ChargeModel;//
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Common\PayPalModel;
// use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
// use PayPal\Api\Transaction;
// use PayPal\Api\RedirectUrls;
// use PayPal\Api\Agreement;
// use PayPal\Api\Payer;
// use PayPal\Api\ShippingAddress;

include('billingFunctions.php');


if(isset($_POST['interval']))
{
    $interval = trim($_POST['interval']);
    // $interval = 12;

    if(accepted_option($interval) == false)
    {
        $msg = "<div class='card error'><div>Please select a plan for ads to be removed</div></div>";
        echo $msg;
    }
    else
    {
        $price = fetch_single_row(1, 'payment_prices');

        $amount = $price['amount_per_month'];

        $rate = $price['rate'];

        $amount = (float) ($amount * (1 + (($rate / 100) / (int) $interval)) * (int) $interval);
        
        $amount = number_format($amount, 2, '.', '');
        // $amount = 10;

        require('../vendor/autoload.php');
    
        $id = 'AT7HaJrDpit6eDrFtPtdC7_v-qZE9fydQDxZBCZw-YKc0Xk23xVPDqhpRzJ62JltKHdnj7FOUcnTDu2N';
    
        $secret = 'EKYM7jeg21Y8Xkj5eF1saUIU_LwHjsTKe1x-1VqJKFEzPvUFDimAJh-7EWx9HOgCaelPIgQonv3S0Tz3';
    
        $apiContext = paypal_context($id, $secret);
    
        paypal_config($apiContext);
    
        $plan = new Plan();
    
        $plan->setName('Ad removal')
        ->setDescription('Removing ads on all user\'s posts')
        ->setType('INFINITE');
    
        $paymentDefinition = new PaymentDefinition();
    
        $paymentDefinition->setName('Regular payments for all ads on user\'s posts to be removed')
        ->setType('REGULAR')
        ->setFrequency('MONTH')
        ->setFrequencyInterval("$interval")
        // ->setCycles("12")
        ->setAmount(new Currency(array('value' => $amount, 'currency' => 'USD')));
        
        //Charge Models
    
        // $chargeModel = new ChargeModel();
        // $chargeModel->setType('SHIPPING')
        //     ->setAmount(new Currency(array('value' => 10, 'currency' => 'USD')));
    
        // $paymentDefinition->setChargeModels(array($chargeModel));
    
        $merchantPreferences = new MerchantPreferences();
        $baseUrl = 'http://localhost:9090/bwajesplus-app';
        // $baseUrl = getBaseUrl();
    
        $merchantPreferences->setReturnUrl("$baseUrl/billing/ExecuteAgreement?success=true")
            ->setCancelUrl("$baseUrl/remove-ads?success=false")
            ->setAutoBillAmount("yes")
            ->setInitialFailAmountAction("CONTINUE")
            ->setMaxFailAttempts("0");
            // ->setSetupFee(new Currency(array('value' => 1, 'currency' => 'USD')));
    
    
        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);
    
        //Create Plan
        try {
    
            $output = $plan->create($apiContext);
    
            try
            {
                $patch = new Patch();
                $value = new PayPalModel('{"state":"ACTIVE"}');
                $patch->setOp('replace')
                ->setPath('/')
                ->setValue($value);
                $patchRequest = new PatchRequest();
                $patchRequest->addPatch($patch);
                $createdPlan = Plan::get($output->getId(), $apiContext);
    
                $createdPlan->update($patchRequest, $apiContext);
                
                $plan = Plan::get($createdPlan->getId(), $apiContext);
    
                require_once('CreateBillingAgreementWithPayPal.php');
                // require_once('../remove-ads.php');
            }
            catch(\PayPal\Exception\PayPalConnectionException $ex)
            {
                // $msg = "<div class='card error'><div>". $ex->getData()."</div></div>";
                // echo $msg;
                echo $ex->getData();
            }
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        
            // $msg = "<div class='card error'><div>". $ex->getData()."</div></div>";
            // echo $msg;
            echo $ex->getData();
            exit(1);
        }
    }

}
?>