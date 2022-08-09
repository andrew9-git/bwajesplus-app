<?php


use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
// use PayPal\Api\ShippingAddress;
// use PayPal\Exception\PayPalConnectionException;


/* Create a new instance of Agreement object
{
    "name": "Base Agreement",
    "description": "Basic agreement",
    "start_date": "2015-06-17T9:45:04Z",
    "plan": {
      "id": "P-1WJ68935LL406420PUTENA2I"
    },
    "payer": {
      "payment_method": "paypal"
    },
    "shipping_address": {
        "line1": "111 First Street",
        "city": "Saratoga",
        "state": "CA",
        "postal_code": "95070",
        "country_code": "US"
    }
}*/
    $agreement = new Agreement();
    
    // $startDate = date('Y-m-d H:i:s');
    // $startDate = new DateTime($startDate);
    // $startDate = $startDate->format(DateTime::ATOM);

    // $time = time();
    $startDate = date('Y-m-d\\TH:i:s\\Z');

    $agreement->setName('Yearly ad removal agreement')
        ->setDescription('Agreement to remove ads on user\'s posts')
        ->setStartDate($startDate);
        // ->setStartDate('2022-09-17T9:45:04Z');

    $plan = new Plan();
    $plan->setId($createdPlan->getId());
    $agreement->setPlan($plan);

    $payer = new Payer();
    $payer->setPaymentMethod('paypal');
    $agreement->setPayer($payer);

    // $shippingAddress = new ShippingAddress();
    // $shippingAddress->setLine1('111 First Street')
    //     ->setCity('Saratoga')
    //     ->setState('CA')
    //     ->setPostalCode('95070')
    //     ->setCountryCode('US');
    // $agreement->setShippingAddress($shippingAddress);

    try {

        $agreement = $agreement->create($apiContext);

        $approvalUrl = $agreement->getApprovalLink();
        // echo $approvalUrl;

        // header("Location: " . $approvalUrl);
        echo $approvalUrl;

    } catch (\PayPal\Exception\PayPalConnectionException $ex) {

        // $msg = "<div class='card error'><div>". $ex->getData()."</div></div>";
        // echo $msg;
        echo $ex->getData();
        exit(1);
    }


?>