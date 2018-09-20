<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
// Create the email and send the message
$to = 'princeraju7777@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "princeraju.com Contact Form:  $name";
$email_body = "You have received a new message from your website contact form at princeraju.com.\n\n"."Here are the details:\n\nName: $name\nEmail: $email_address\nPhone: $phone\nMessage:\n$message";
$email_body.="\n\nUser Agent: ".$_SERVER['HTTP_USER_AGENT'];
$email_body.="\nIP Address: ".$_SERVER['REMOTE_ADDR'];
//$email_body.="\nCountry: ".geoip_country_name_by_name ( $_SERVER['REMOTE_ADDR'] );
$headers = "From: noreply@princeraju.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	

if( mail($to, $email_subject, $email_body, $headers) ){
   return true;			
}
else{
   return false;
}
?>