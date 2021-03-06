<?php
// Check for empty fields
    if(empty($_POST['name'])  		||
        empty($_POST['firstname'])  ||
        empty($_POST['email']) 		||
        empty($_POST['phone']) 		||
        empty($_POST['message'])    ||
        !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            echo "Champ(s) non rempli(s) !";
            return false;
        }

$name = strip_tags(htmlspecialchars($_POST['name']));
$firstname = strip_tags(htmlspecialchars($_POST['firstname']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'depresles.nicolas@gmail.com';
$email_subject = "Website Contact Form: $firstname $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nFirst name: $firstname\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@project5.nicolasdep.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
