<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = testInput($_POST["Name"]);
      $phone = testInput($_POST["Phone"]);
      $email = testInput($_POST["Email"]);
      $option = testInput($_POST["Option"]);
      $message = testInput($_POST["Message"]);
    }

    function testInput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

	$formcontent="From: $name \n\n Phone Number: $phone \n\n Subject: $option \n\n Message: $message";
	$recipient = "justin@jroapps.tech";
	$subject = "Contact Form Submission";
	$mailheader = "From: $name <$email> \r\n";
	mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
	header("Location:https://jroapps.tech/success.html");
?>