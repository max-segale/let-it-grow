<?php 
	require "../admin/functions.php";

	$fileName=$_REQUEST["file_name"];
	$destination=$_REQUEST["destination"];
	$emailAddress=$_REQUEST["email_address"];

	$to="maxsegale@gmail.com";
	$subject="New Mailing List Member";
	$message="A new person has signed up for the Let It Grow Organik mailing list:\n\n".$emailAddress;
	$headers="From: ".$emailAddress;

	mail($to,$subject,$message,$headers);

	$entryFields=array($emailAddress);

	if($fileName){
		$returnData=addArrayEntry($fileName,$entryFields);
		echo $returnData;
		if($destination){
			header("Location:".$destination."?r=".$returnData);
		}
	}
?>