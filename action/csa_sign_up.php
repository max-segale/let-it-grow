<?php 
	require "../../admin/functions.php";

	$fileName=$_REQUEST["file_name"];
	$destination=$_REQUEST["destination"];

	$season=$_REQUEST["season"];
	$memberName=$_REQUEST["name"];
	$memberAddress=$_REQUEST["address"];
	$memberPhone=$_REQUEST["phone"];
	$memberEmail=$_REQUEST["email"];
	$sharetype=$_REQUEST["share_type"];
	$eggOption=$_REQUEST["eggs"];
	$specialRequest=$_REQUEST["special_request"];
	$pickUp=$_REQUEST["pick_up"];
	$payType=$_REQUEST["pay_type"];
	$memberAgreement=$_REQUEST["member_agreement"];

	$shareArray = explode(":",$sharetype);
	$shareTypeTxt = $shareArray[0];
	$sharePrice = $shareArray[1];
	$totalPrice = $sharePrice;
	if ($eggOption) {
		$totalPrice += $eggOption;
	}
	$shareTypeTxtMail = $shareTypeTxt . " - $" . $sharePrice;
	$shareTypeTxtPay = $shareTypeTxt;

	$to="maxsegale@gmail.com";
	$subject="New CSA Member";
	$headers = "From: " . $memberEmail . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$message = "<html><body><table style='border-spacing:10px;'>";
	$message .= "<tr><td>season</td><td>".$season."</td></tr>";
	$message .= "<tr><td>name</td><td>".$memberName."</td></tr>";
	$message .= "<tr><td>address</td><td>".$memberAddress."</td></tr>";
	$message .= "<tr><td>phone</td><td>".$memberPhone."</td></tr>";
	$message .= "<tr><td>email</td><td>".$memberEmail."</td></tr>";
	$message .= "<tr><td>share</td><td>".$shareTypeTxtMail."</td></tr>";
	if ($eggOption) {
		$message .= "<tr><td>eggs</td><td>$".$eggOption."</td></tr>";
		$message .= "<tr><td>total</td><td>$".$totalPrice."</td></tr>";
	}
	if ($specialRequest) {
		$message .= "<tr><td>requests</td><td>".$specialRequest."</td></tr>";
	}
	$message .= "<tr><td>pick-up</td><td>".$pickUp."</td></tr>";
	$message .= "<tr><td>payment</td><td>".$payType."</td></tr>";
	$message .= "</table></body></html>";

	mail($to,$subject,$message,$headers);

	if($fileName){
		if ($_POST) {
		  $kv = array();
		  foreach ($_POST as $key => $value) {
		    if($key !== "file_name" && $key !== "destination"){
		    	$kv[] = "$key=>$value";
		    }
		  }
		}
		else {
		  //$query_string = $_SERVER['QUERY_STRING'];
		}
		$returnData=addArrayEntry($fileName,$kv);
	}

	if($destination){
		header("Location:".$destination."?r=".$returnData);
	}

?>