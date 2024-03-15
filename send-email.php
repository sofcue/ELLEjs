<?php

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

require(vendor/autoload.php);


$mail = new PHPMailer(true);


$mail-> SMTPDebug = SMTP::DEBUG_SERVER;

$mail ->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'smtp.gmail.com';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "sofcue97@gmail.com";
$mail->Password = "sztphtskfzyeextz";

$mail->setFrom($email, $name);
$mail->addAddress("elviss@ellejs.com", "Elviss Medina");

$mail->Subject = "{$name} Cleaning Request";
$mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

$mail->send();

header("Location: sentmail.html");

