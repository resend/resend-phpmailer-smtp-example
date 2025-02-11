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

    // Log the successfully sent message
    echo 'Email successfully sent';
} catch (Exception $e) {
    // Log the detailed error for debugging
    error_log('Mailer Error: ' . $mail->ErrorInfo);
    // Show a generic error message to the user
    echo 'There was an error sending the email.';
}
