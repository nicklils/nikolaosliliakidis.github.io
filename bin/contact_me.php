<?php
//email settings
ini_set('SMTP','smtp.gmail.com');
ini_set('smtp_port','587');
//ini_set('verify_peer','false');
 
// check if fields passed are empty
if(empty($_POST['name'])   ||
   //empty($_POST['phone']) ||
   empty($_POST['email']) ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
echo "No arguments Provided!";
return false;
   }
 
$name = $_POST['name'];
//$phone = $_POST['phone'];
$email_address = $_POST['email'];
$message = $_POST['message'];
 
// create email body and send it
$to = 'nickliliakides@gmail.com'; // PUT YOUR EMAIL ADDRESS HERE
$email_subject = "Website email from:  $name"; // EDIT THE EMAIL SUBJECT LINE HERE
$email_body = "You have received a new message from your website's contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: $email_address\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>