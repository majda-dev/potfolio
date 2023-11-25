<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

$name = $_POST["nom"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Username = "ma.alaabouch23@gmail.com";
    $mail->Password = "fksibenzarybxzpw";

    // Use addReplyTo to set the reply-to address
    $mail->addReplyTo($email, $name);

    $mail->setFrom($email, $name);
    $mail->addAddress("ma.alaabouch23@gmail.com", "Majda");

    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
    echo "Ihre Nachricht wurde erfolgreich gesendet. Ich schätze Ihre Kontaktaufnahme";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

