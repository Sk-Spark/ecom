<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function sendMail($mailTo, $sub, $msg)
{
    $mail = new PHPMailer(true); 
    try {
        //Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587; // Gmail's port
        // $mail->Host = 'smtp.mail.yahoo.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kabhimiliomuje@gmail.com';
        $mail->Password = 'spark1@google';
        $mail->SMTPSecure = 'tls';
        // $mail->Port = 465;
    
        $mail->setFrom('kabhimiliomuje@gmail.com', 'ecom.com');
        $mail->addAddress($mailTo);
    
        //Attachments
        // $mail->addAttachment('/backup/myfile.tar.gz');
    
        //Content
        $mail->isHTML(true); 
        $mail->Subject = $sub;
        $mail->Body    = $msg;

        $mail->Debugoutput = 'debugLog' ;    
        $mail->send();
        // echo 'Message has been sent';
        
        return true;
    } 
    catch (Exception $e) 
    {
        // echo 'Message could not be sent.';
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
        $error = $mail->ErrorInfo;
        $logFile = fopen("mail.log","a") or die("Unable to open file.");
        fwrite($logFile,"ERROR: ".$error);
        // fwrite($logFile, "---------***-------------\n");
        fclose($myfile);

        return false;
    }
}

function debugLog($log, $level)
{
    $logFile = fopen("mail.log","a") or die("Unable to open file.");
    fwrite($logFile,$log);
    // fwrite($logFile, "---------***-------------\n");
    fclose($myfile);
}

?>