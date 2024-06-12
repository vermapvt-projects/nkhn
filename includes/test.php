<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);
function sendEmail($to, $toName, $subject, $body, $altBody) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                           
        $mail->Host       = 'eagle.mxlogin.com';                  
        $mail->SMTPAuth   = true;                                
        $mail->Username   = 'info@nkhn.nl';            
        $mail->Password   = 'Kgjgi0AO3p29dI05)5d5]CH2Z';               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      
        $mail->Port       = 587;                                 
        $mail->setFrom('info@nkhn.nl', 'NKHN Security');
        $mail->addAddress($to, $toName);                           // Add a recipient

        // Content
        $mail->isHTML(true);                                       // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $altBody;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

sendEmail("st981243@gmail.com", "Sandeep Verma", "Hello", "How are you?", "altbody");

?>