<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mailTo = "mpastuszak5@gmail.com";
$headers = "Form: " .$name. "<" .$email. ">\r\n";

mail($mailTo, $subject, $message, $headers)
or die("Error");

echo "message sent";

?> . 