<?php

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

include('../includes/db.php');
include('./billing-email.php');
include('../includes/email-template.php');
session_start();

function paypal_context($id, $secret)
{
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            $id,     // ClientID
            $secret      // ClientSecret
        )
    );
    return $apiContext;
}

function paypal_config($apiContext)
{
    $apiContext->setConfig(
        array(
        'log.LogEnabled' => true,
        'log.FileName' => 'PayPal.log',
        'log.LogLevel' => 'DEBUG'
        )
    );
}

function accepted_option($option)
{
    
    if($option === 'S')
    {
        return false;  
    }
    else
    {
        return true;
    }
}

function redirect_to($url)
{
    header("Location: {$url}");
}

//getting a single row in a table
function fetch_single_row($value, $table_name, $column_name = 'id', $type='int')
{
    $db = new dbase();

    $query = "SELECT * FROM $table_name WHERE $column_name = :value";
    $db->prep($query);
    $db->bindvalue(':value', $value, $type);
    $row = $db->fetchSingle();
    return $row;
}

//update number of private posts allowed
function update_no_of_private_posts($id)
{
    $db = new dbase();
    $query = "UPDATE users SET no_of_private_post_allowed = no_of_private_post_allowed + 1, updated_at = NOW() WHERE id = :id";
    $db->prep($query);

    $db->bindvalue(':id', $id, 'int');

    $execute = $db->execute();
    
    return $execute;
}

//insert into payment subscriptions table
function payment_subscriptions(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO payment_subscriptions(user_id, agreement_id, interval_value, state, status, amount, payer_id, email, first_name, last_name, start_date, end_date, payment_method) VALUES(:user_id, :agreement_id, :interval_value, :state, :status, :amount, :payer_id, :email, :first_name, :last_name, :start_date, :end_date, :payment_method)";
    $db->prep($query);

    $db->bindvalue(':user_id', $value['user_id'], 'int');
    $db->bindvalue(':agreement_id', $value['agreement_id'], 'str');
    $db->bindvalue(':interval_value', $value['interval_value'], 'int');
    $db->bindvalue(':state', $value['state'], 'str');
    $db->bindvalue(':status', $value['status'], 'str');
    $db->bindvalue(':amount', $value['amount'], 'str');
    $db->bindvalue(':payer_id', $value['payer_id'], 'str');
    $db->bindvalue(':email', $value['email'], 'str');
    $db->bindvalue(':first_name', $value['first_name'], 'str');
    $db->bindvalue(':last_name', $value['last_name'], 'str');
    $db->bindvalue(':start_date', $value['start_date'], 'str');
    $db->bindvalue(':end_date', $value['end_date'], 'str');
    $db->bindvalue(':payment_method', $value['payment_method'], 'str');

    $execute = $db->execute();

    return $execute;
}

//getting a single row in payment table
function fetch_single_row_in_payment($value, $column_name = 'id', $type='int', $by='id', $order='DESC', $limit=1)
{
    $db = new dbase();

    $query = "SELECT * FROM payment_subscriptions WHERE $column_name = :value ORDER BY $by $order LIMIT $limit";
    $db->prep($query);
    $db->bindvalue(':value', $value, $type);
    $row = $db->fetchSingle();
    return $row;
}

//update number of private posts allowed
function update_state($id)
{
    $db = new dbase();
    $query = "UPDATE payment_subscriptions SET state = 'Cancelled', updated_at = NOW() WHERE id = :id";
    $db->prep($query);

    $db->bindvalue(':id', $id, 'int');

    $execute = $db->execute();
    
    return $execute;
}

?>