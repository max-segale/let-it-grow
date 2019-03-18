<?php 
	require "../admin/functions.php";

	$fileName=$_POST["file_name"];
	$destination=$_POST["destination"];

	$season=$_POST["season"];
	$memberName=$_POST["name"];
	$memberAddress=$_POST["address"];
	$memberPhone=$_POST["phone"];
	$memberEmail=$_POST["email"];
	$sharetype=$_POST["share_type"];
	$eggOption=$_POST["eggs"];
	$specialRequest=$_POST["special_request"];
	$pickUp=$_POST["pick_up"];
	$payType=$_POST["pay_type"];
	$memberAgreement=$_POST["member_agreement"];

	$shareArray = explode(":",$sharetype);
	$shareTypeTxt = $shareArray[0];
	$sharePrice = $shareArray[1];
	$totalPrice = $sharePrice;
	if ($eggOption) {
		$totalPrice += $eggOption;
	}
	$shareTypeTxtMail = $shareTypeTxt . " - $" . $sharePrice;
	$shareTypeTxtPay = $shareTypeTxt;

	$to="letitgroworganik@gmail.com";
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
			$newGUID = GUID();
			$theNow = date("Y-m-d");
		  $kv = array();
		  $kv[] = 'member_id"=>"'.$newGUID;
		  foreach ($_POST as $key => $value) {
		    if($key !== "file_name" && $key !== "destination"){
		    	$kv[] = $key.'"=>"'.$value;
		    }
		  }
		  $kv[] = 'joined"=>"'.$theNow;
		}
		else {
		  //$query_string = $_SERVER['QUERY_STRING'];
		}

		$returnData=addArrayEntry($fileName,$kv);
	}

	if($destination){
		header("Location:".$destination."?id=".$newGUID);
	}

?>