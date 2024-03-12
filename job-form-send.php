<?php

$name = $_POST["name"];
$phoneNumber = $_POST["phoneNumber"];
$address = $_POST["address"];
$city = $_POST["inputCity"];
$state = $_POST["inputState"];
$zipCode= $_POST["inputZip"];
$wage = $_POST["wage"];
$emergencyContact = $_POST["EmergencyContact"];
$email = $_POST["email"];

$body= sprintf("%s%s\n%s%s\n%s%s\n%s%s\n%s%s\n%s%s\n%s%s\n%s%s\n%s%s",
    "Name: ", $name, "Phone Number: ", $phoneNumber, "Email: ", $email,
    "Address: ", $address, "City: ", $city, "State: ",$state, "Zip Code: ", $zipCode,
    "Wage: ", $wage, "Emergency Contact: ", $emergencyContact);


require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

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
$mail->addAddress("leonardo@ellejs.com", "Leonardo Medina");

$mail->Subject = "New {$name} Job Application";
$mail->Body = $body;

$mail->send();

header("Location: sentmail.html");

?>

