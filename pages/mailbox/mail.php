<?php

require('../../conn.php');

if (isset($_POST['submit'])) {
	# code...
	require 'PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	$mail->SMTPDebug = 0;                                 // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com ';                     // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'revcollsystem@gmail.com';                 // SMTP username
	$mail->Password = 'moi.1984';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom($_SESSION['user'], $_SESSION['name']);
	$mail->addAddress('revcollsystem@gmail.com');     // Add a recipient   abisaiadvocates@gmail.com

	               // Name is optional
	$mail->addReplyTo($_SESSION['user']);
	

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $_POST['subject'];
	$mail->Body    = $_POST['message'];
	$mail->AltBody = $_POST['message'];

	if(!$mail->send()) {
	    
	    echo '<script type="text/javascript">';
		echo 'alert("Message could not be sent");';
	    echo 'window.location="/Revenue/pages/mailbox/compose.php";';
	    echo '</script>';

	} else {
	
		echo '<script type="text/javascript">';
		echo 'alert("Mail successfully sent");';
		if ($_SESSION['domain']=='0') {
			echo 'window.location="/Revenue/pages/mailbox/mailbox.php";';
		}else{
			echo 'window.location="/Revenue/pages/mailbox/compose.php";';
		}
	    
	    echo '</script>';
	}

}else die('Please select a file');


?>



