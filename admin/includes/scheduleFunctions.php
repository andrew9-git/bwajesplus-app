<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
require_once('db.php');
require_once('../../includes/email-template.php');
// require('../../vendor/autoload.php');
require('../../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require('../../vendor/phpmailer/phpmailer/src/SMTP.php');
require('../../vendor/phpmailer/phpmailer/src/Exception.php');

function send_mail(array $set_from, array $add_address, array $data=array(), array $add_reply_to = array('email' => 'no-reply@bwajes-plus.andadel.com', 'message' => 'Do not reply to this mail'))
{

    //sending password to user via email
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    // try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'localhost';//'smtp.gmail.com';//andadel.com
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sender@bwajes-plus.andadel.com';//'myphptestemail@gmail.com';//developer@andadel.com
        $mail->Password   = '@Deforce9';//'@Deforce9';//@Abletechservices9
        // $mail->SMTPSecure = 'ssl';//PHPMailer::ENCRYPTION_STARTTLS;//ssl
        $mail->Port       = 25;//465;//587;//465

        //Recipients
        $mail->setFrom($set_from['email'], $set_from['name']);
        $mail->addAddress($add_address['email'], $add_address['name']);
        $mail->addReplyTo($add_reply_to['email'], $add_reply_to['message']);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $data['subject'];
        $mail->Body    = $data['body'];
        $mail->AltBody = $data['altbody'];

        if(!$mail->send())
        {
            return $mail->ErrorInfo;
        }
        else
        {
            return true;
        }
    // } catch (Exception $e) {
    //     $error = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     return $error;
    // }
}

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

function paypal($value)
{

    require('../../vendor/autoload.php');

    $secret_id = 'AT7HaJrDpit6eDrFtPtdC7_v-qZE9fydQDxZBCZw-YKc0Xk23xVPDqhpRzJ62JltKHdnj7FOUcnTDu2N';

    $secret_key = 'EKYM7jeg21Y8Xkj5eF1saUIU_LwHjsTKe1x-1VqJKFEzPvUFDimAJh-7EWx9HOgCaelPIgQonv3S0Tz3';

    $apiContext = paypal_context($secret_id, $secret_key);

    // paypal_config($apiContext);

    $agreement = new \PayPal\Api\Agreement();
    $agreement = $agreement->get($value['agreement_id'], $apiContext);
    $agreementDetails = $agreement->getAgreementDetails();
    $last_date = date('Y-m-d H:i:s', strtotime($agreementDetails->getLastPaymentDate()));
    $interval = $value['interval_value'];
    $end_date = date('Y-m-d H:i:s', strtotime("+$interval month", strtotime($last_date)));

    return array(
        'agreement'        => $agreement,
        'agreementDetails' => $agreementDetails,
        'end_date'         => $end_date,
    );
}

function url()
{
    $host='http://localhost:9090/bwajes/';
    return array($host);
}


function encryption($string)
{
    $ciphering = "AES-128-CTR";

    $iv_length = openssl_cipher_iv_length($ciphering);

    $options = 0;

    $encryption_iv = '1234567891011121';
    
    $encryption_key = "bwajes-plus-key";

    $encryption = openssl_encrypt($string, $ciphering,$encryption_key, $options,$encryption_iv);

    return $encryption;
}

function decryption($encryption)
{
    $ciphering = "AES-128-CTR";

    $decryption_iv = '1234567891011121';
    $options = 0;

    $decryption_key = "bwajes-plus-key";
        
    // encryption will be gotten from get super global
    $decryption=openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

    return $decryption;
}

function fetch_unsubscribed_people($table_name)
{
    $db = new dbase();

    $query = "SELECT * FROM $table_name WHERE unsubscribed = 1 AND DATEDIFF(NOW(), unsubscribed_date) >= 30";

    $db->prep($query);
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function fetch_users()
{
    $db = new dbase();

    $query = "SELECT * FROM users";

    $db->prep($query);
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function fetch_last_post_count($user_id)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM posts WHERE DATEDIFF(NOW(), created_at) >= 7 AND  user_id = :user_id ORDER BY id DESC LIMIT 1";

    // $query = "SELECT COUNT(*) FROM posts WHERE (DATEDIFF(NOW(), created_at) >= 7 OR DATEDIFF(NOW(), updated_at) >= 7) AND  user_id = :user_id ORDER BY id DESC LIMIT 1";

    $db->prep($query);

    $db->bindvalue(':user_id', $user_id, 'int');


    $count = $db->fetchCol();
    return $count;
}

function fetch_users_not_login()
{
    $db = new dbase();

    $query = "SELECT * FROM users WHERE id NOT IN (SELECT user_id FROM user_statistics) AND password IS NOT NULL AND DATEDIFF(NOW(), created_at) >= 1";

    $db->prep($query);
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function fetch_users_with_uncomplete_registration()
{
    $db = new dbase();

    $query = "SELECT * FROM users WHERE password IS NULL AND DATEDIFF(NOW(), created_at) >= 1";

    $db->prep($query);
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function fetch_users_login_with_no_posts()
{
    $db = new dbase();

    $query = "SELECT * FROM user_statistics WHERE DATEDIFF(NOW(), created_at) >= 3 AND user_id NOT IN (SELECT user_id FROM posts)";

    $db->prep($query);
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function fetch_single_row($value, $table_name, $column_name = 'id', $type='int')
{
    $db = new dbase();

    $query = "SELECT * FROM $table_name WHERE $column_name = :value";
    $db->prep($query);
    $db->bindvalue(':value', $value, $type);
    $row = $db->fetchSingle();
    return $row;
}

function fetch_users_from_payment_subscriptions()
{
    $db = new dbase();

    $query = "SELECT * FROM payment_subscriptions";

    $db->prep($query);

    $row = $db->fetchMultiple();

    return $row;
}

?>