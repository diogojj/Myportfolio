<?php
  	require 'assets/sendgrid-php/sendgrid-php.php';
	$Name = $_POST["name"];
	$FromEmail = $_POST["email"];
	$message = $_POST["message"];
	// $message = str_replace("\n.", "\n..", $message);
	$EmailTo = "diogo.av.justino@gmail.com"; 
	$Subject = "Portfolio CV/Resume";
	 
	// prepare email body text
	
	$Body .= "Name: ";
	$Body .= $name;
	$Body .= "\n"; 
	 
	$Body .= "Email: ";
	$Body .= $email;
	$Body .= "\n";
	 
	$Body .= "Message: ";
	$Body .= $message;
	$Body .= "\n";
	// send email
	echo 'test1';
	$email->new \SendGrid\Mail\Mail();
	$email->setFrom($FromEmail, $name);
	$email->setSubject($Subject);
	$email->addTo($EmailTo, "Diogo");
	$email->addContent($Body);
	echo 'test2';
	$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
	try {
    	$response = $sendgrid->send($email);
    	echo $response->statusCode() . "\n";
    	echo ($response->headers());
    	echo $response->body() . "\n";
	} catch (Exception $e) {
    	echo 'Caught exception: '. $e->getMessage() ."\n";
	}
?>


