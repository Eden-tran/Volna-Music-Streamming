<?
include  "system/core/library/PHPMailer/src/PHPMailer.php";
include  "system/core/library/PHPMailer/src/Exception.php";
include  "system/core/library/PHPMailer/src/OAuth.php";
include  "system/core/library/PHPMailer/src/POP3.php";
include  "system/core/library/PHPMailer/src/SMTP.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($info, $passcode)
{
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = MAIL_USER;                 // SMTP username
        $mail->Password = MAIL_PASS;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom(MAIL_USER, 'Mailer');
        // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress($info['Email']);               // Name is optional
        $mail->addAddress('tranngocquang13199@gmail.com');               // Name is optional

        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Activation code: ' . $passcode . '';
        $mail->Body    = '<h1>Hello ' . $info['ArtName'] . '.</h1>';
        $mail->Body .= '<h2>Welcom to Volna.</h2>';
        $mail->Body .= 'Your Acvtivation code is: ' . $passcode . '.Enter your passcode to comple your registration<br>';
        $mail->Body .= 'Thank You!!!';

        // $mail->AltBody = "Y";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}