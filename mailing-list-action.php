<?php
	include '../admin/functions.php';

	$name = $_POST['name'];
  $email = $_POST['email'];
  $location = $_POST['location'];

	$to = "letitgroworganik@gmail.com";
	$subject = "New Mailing List Member";
	$headers = "From: $email \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$message = "<html><body>$name<br>$email<br>$location</body></html>";

	mail($to, $subject, $message, $headers);

	$newGUID = GUID();
	$theNow = date("Y-m-d H:i:s");
  $newStatus = "NEW";

	$sql = "INSERT INTO mailing_list (id, email, name, location, status, joined)
		VALUES ('$newGUID', '$email', '$name', '$location', '$newStatus', '$theNow')";
	$result = sqlQuery($sql);
?>
