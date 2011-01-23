<?php
$sent = false;

if(isset($_POST['submitted'])) {

	if($_POST['email'] == '') {
		$emailError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", $_POST['email'])) {
		$emailError = true;
	}
	
	if($_POST['name'] == '') {
		$nameError = true;
	}
	
	if($_POST['subject'] == '') {
		$subjectError = true;
	}
	
	if($_POST['message'] == '') {
		$messageError = true;
	}


	if(!$emailError && !$nameError && !$subjectError && !$messageError ) {
		$email   = $_POST['email'];
		$name 	 = $_POST['name'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		
		$sent = true;	
		mail($emailTo, $subject, $name . " says:\n\r" . $message, "From: " . $email);
		echo "Your email was sent! We will respond shortly.";
	}
}

?>

