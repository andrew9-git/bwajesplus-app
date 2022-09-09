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
        $mail->Host       = 'andadel.com';//'smtp.gmail.com';//andadel.com
        $mail->SMTPAuth   = true;
        $mail->Username   = 'developer@andadel.com';//'myphptestemail@gmail.com';//developer@andadel.com
        $mail->Password   = '@Abletechservices9';//'@Deforce9';//@Abletechservices9
        $mail->SMTPSecure = 'ssl';//PHPMailer::ENCRYPTION_STARTTLS;//ssl
        $mail->Port       = 465;//587;//465

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

//schedule at custom interval

//people that have unsubscribed for the last 30 days
//and this should done for all (4) tables

function fetch_unsubscribed_people($table_name)
{
    $db = new dbase();

    $query = "SELECT * FROM $table_name WHERE unsubscribed = 1 AND DATEDIFF(NOW(), unsubscribed_date) >= 30";

    $db->prep($query);
    
    $rows = $db->fetchMultiple();

    return $rows;
}

$users = fetch_unsubscribed_people('users');
foreach($users as $user)
{
    $email = $user['email'];

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

    $tblname = encryption('users');

    $subject = '[IMPORTANT] UPDATE';
    $body = 'Don\'t miss out on any important update\r\nPlease kindly <a href="http://localhost:9090/bwajes/dz5445z/resubscribe/'.$tblname.'/'.$email.'">RESUBSCRIBE</a> to keep yourself updated on latest developments';
    $altbody = 'Don\'t miss out on any important update\r\nPlease kindly RESUBSCRIBE to keep yourself updated on latest developments';

    $body = email_template($body);

    $data = array(
        'subject' => $subject,
        'body' => $body,
        'altbody' => $altbody
    );

    send_mail($set_from, $add_address, $data);
}

$subscribers = fetch_unsubscribed_people('subscriber_list');
foreach($subscribers as $subscriber)
{
    $email = $subscriber['email'];

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

    $tblname = encryption('users');

    $subject = '[IMPORTANT] UPDATE';
    $body = 'Don\'t miss out on any important update\r\nPlease kindly <a href="http://localhost:9090/bwajes/dz5445z/resubscribe/'.$tblname.'/'.$email.'">RESUBSCRIBE</a> to keep yourself updated on latest developments';
    $altbody = 'Don\'t miss out on any important update\r\nPlease kindly RESUBSCRIBE to keep yourself updated on latest developments';

    $body = email_template($body);

    $data = array(
        'subject' => $subject,
        'body' => $body,
        'altbody' => $altbody
    );

    send_mail($set_from, $add_address, $data);
}

$comments = fetch_unsubscribed_people('comments');
foreach($comments as $comment)
{
    $email = $comment['email'];

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

    $tblname = encryption('users');

    $subject = '[IMPORTANT] UPDATE';
    $body = 'Don\'t miss out on any important update\r\nPlease kindly <a href="http://localhost:9090/bwajes/dz5445z/resubscribe/'.$tblname.'/'.$email.'">RESUBSCRIBE</a> to keep yourself updated on latest developments';
    $altbody = 'Don\'t miss out on any important update\r\nPlease kindly RESUBSCRIBE to keep yourself updated on latest developments';

    $body = email_template($body);

    $data = array(
        'subject' => $subject,
        'body' => $body,
        'altbody' => $altbody
    );

    send_mail($set_from, $add_address, $data);
}

$email_lists = fetch_unsubscribed_people('email_list');
foreach($email_lists as $email_list)
{
    $email = $email_list['email'];

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

    $tblname = encryption('users');

    $subject = '[IMPORTANT] UPDATE';
    $body = 'Don\'t miss out on any important update\r\nPlease kindly <a href="http://localhost:9090/bwajes/dz5445z/resubscribe/'.$tblname.'/'.$email.'">RESUBSCRIBE</a> to keep yourself updated on latest developments';
    $altbody = 'Don\'t miss out on any important update\r\nPlease kindly RESUBSCRIBE to keep yourself updated on latest developments';

    $body = email_template($body);

    $data = array(
        'subject' => $subject,
        'body' => $body,
        'altbody' => $altbody
    );

    send_mail($set_from, $add_address, $data);
}

//==============//

?>