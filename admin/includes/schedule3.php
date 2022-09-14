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

//---------------//
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
//schedule at custom interval

//users that have not logged in after a day of registration
function fetch_users_not_login()
{
    $db = new dbase();

    $query = "SELECT * FROM user_statistics WHERE last_login IS NULL AND DATEDIFF(NOW(), created_at) >= 1";

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

$users = fetch_users_not_login();
foreach($users as $user)
{
    $id = $user['user_id'];

    $value = fetch_single_row($id, 'users');

    $email = $value['email'];

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

    $subject = 'Got an [IDEA] to share?';
    $body = 'You are just one click away from sharing that wonderful idea to the world!. <a href="http://localhost:9090/bwajes/login" style="color: red;">GET STARTED NOW!</a>';
    $altbody = 'You are just one click away from sharing that wonderful idea to the world!. GET STARTED NOW!';

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