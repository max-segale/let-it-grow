<?php
	include '../admin/functions.php';

	if (!$_POST['agreement_terms']) {
		header('Location:csa.php?f=1#f_msg');
		exit();
	}

	$season=$_POST['season'];
	$memberName=$_POST['name'];
	$memberAddress=$_POST['address'];
	$memberPhone=$_POST['phone'];
	$memberEmail=$_POST['email'];
	$sharetype=$_POST['share_type'];
	$eggOption=$_POST['eggs'];
	$specialRequest=$_POST['special_request'];
	$pickUp=$_POST['pick_up'];
	$payType=$_POST['pay_type'];

	$cutFlowers = $_POST['cut_flowers'];
	$jarClub = $_POST['jar_club'];
	$mailingList = $_POST['mailing_list'];

	$shareArray = explode(':',$sharetype);
	$shareTypeTxt = $shareArray[0];
	$sharePrice = $shareArray[1];
	$totalPrice = $sharePrice;

	$shareSize = 0;
	if ($shareTypeTxt == 'full') {
		$shareSize = 1;
	} else if ($shareTypeTxt == 'half') {
		$shareSize = 0.5;
	}

	if ($shareTypeTxt !== '') {
		$shareTypeTxt .= ' share';
	}

	if ($pickUp !== '') {
		$shareTypeTxt .= " $pickUp";
	}

	if ($totalPrice === '') {
		$totalPrice = 0;
	}

	if ($eggOption) {
		$totalPrice += $eggOption;
		$eggs = 'yes';
		$eggVal = true;
	}

	if ($cutFlowers) {
		$totalPrice += $cutFlowers;
		$shareTypeTxt .= ' and cut flowers';
	}

	if ($jarClub) {
		$totalPrice += $jarClub;
		$shareTypeTxt .= ' and jar club';
	}

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
	$message .= "<tr><td>share</td><td>".$shareTypeTxt."</td></tr>";
	if ($eggs) {
		$message .= "<tr><td>eggs</td><td>$".$eggs."</td></tr>";
	}
	$message .= "<tr><td>total</td><td>$".$totalPrice."</td></tr>";
	if ($specialRequest) {
		$message .= "<tr><td>requests</td><td>".$specialRequest."</td></tr>";
	}
	$message .= "<tr><td>pick-up</td><td>".$pickUp."</td></tr>";
	$message .= "<tr><td>payment</td><td>".$payType."</td></tr>";
	$message .= "</table></body></html>";

	mail($to,$subject,$message,$headers);

	$newGUID = GUID();
	$theNow = date("Y-m-d H:i:s");

	$sql = "INSERT INTO csa_members (member_id, season, name, address, phone, email, share_type, share_size, total, request, payment, joined)
		VALUES ('". $newGUID ."','". $season ."','". $memberName ."','". $memberAddress ."','". $memberPhone ."','". $memberEmail ."','". $shareTypeTxt ."','". $shareSize ."','". $totalPrice ."','". $specialRequest ."','" . $payType ."','". $theNow ."')";
	$result = sqlQuery($sql);

	if ($mailingList) {
		$mailGUID = GUID();
		$theNow = date("Y-m-d H:i:s");
		$newStatus = "NEW";
		$sql = "INSERT INTO mailing_list (id, email, name, location, status, joined)
			VALUES ('$mailGUID', '$memberEmail', '$memberName', '$memberAddress', '$newStatus', '$theNow')";
		$result = sqlQuery($sql);
	}

	header("Location:confirm.php?id=".$newGUID);

?>
