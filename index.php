<?php

// Include Composer autoload file to load PHPMailer classes
require __DIR__ . '/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.resend.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'resend';
    $mail->Password = 're_123456789';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    
    // Set email format to HTML
    $mail->isHTML(true);

    $mail->setFrom('onboarding@resend.dev');
    $mail->addAddress('delivered@resend.dev');
    $mail->Subject = 'Hello World';
    $mail->Body = '<strong>It works!</strong>';

    $mail->send();

    // Log the successlly sent message
    echo 'Email successlly sent';
}
    // Catch any errors during sending
    catch (Exception $e) {
    echo 'Message could not be sent. ';
    echo ' Error: ' . $mail->ErrorInfo;
}