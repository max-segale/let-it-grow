<?php 
	require "../admin/functions.php";

	$memberId = $_REQUEST["id"];

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=840">
		<meta name="description" content="Let it Grow Organik was founded in 2010 with a plot of land, some pocket change, and a bit of know how. Our mission was, and still is to produce great tasting, healthy, organic produce with minimal impact on the environment.">
		<meta name="keywords" content="organic,local,farm,new jersey">
		<meta name="robots" content="index,follow">
		<title>Let It Grow Organik</title>
		<link type="image/x-icon" href="img/lig_fav_16.png" rel="icon">
		<link rel="apple-touch-icon-precomposed" href="img/lig_fav_57.png"/>  
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/lig_fav_72.png"/>  
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/lig_fav_114.png"/>  
		<link rel="stylesheet" type="text/css" href="plain_style.css">
	</head>
	<body>
		<div id="container">
			<div style="height:200px;">
				<img id="logo" src="img/lig_logo_color.png">
			</div>
			<div id="page">
				<h1>Thank You</h1>
				<hr class="bl">
				<p>Thank you for signing up for the 2014 CSA. We appreciate your support.<br>
					Please follow the instructions below regarding your membership payment.</p>
<?
	$csaList=getDataArray("csa_list.php");
	for($i=0;$i<count($csaList);$i++){
		if($csaList[$i]["member_id"]==$memberId){

			$season=$csaList[$i]["season"];
			$memberName=$csaList[$i]["name"];
			$memberEmail=$csaList[$i]["email"];
			$sharetype=$csaList[$i]["share_type"];
			$eggOption=$csaList[$i]["eggs"];
			$payType=$csaList[$i]["pay_type"];

			$shareArray = explode(":",$sharetype);
			$shareTxt = $shareArray[0]." share";
			$sharePrice = $shareArray[1];
			$totalPrice = $sharePrice;
			if ($eggOption) {
				$totalPrice += $eggOption;
				$shareTxt .= " w/ eggs";
			}
			$shareTxt .= " - ".$memberName;

?>
				<div style="padding:10px 20px;border:1px solid #cccccc;text-transform:capitalize;font-size:16px;">
					Your Order: <b><?= $shareTxt ." - $". $totalPrice .".00" ?></b>
				</div>
				<table id="pay_opt_table">
					<tr>
<?
	if ($payType == "online") {
		renderPaymentForm($shareTxt,$totalPrice,true);
	}
?>
						<td>
<?
	if ($payType == "online"){
		echo "If you are unable to make an online payment, please mail a check to the following address:<br><br>";
	}
	else{
		echo "Please mail your payment to the following address:<br><br>";
	}
?>
							
							<b>P.O. Box 127<br>
							Chester, NJ 07930</b><br><br>
							Checks should be made payable to <b>Joshua Chaffee</b> with “CSA Share” on the memo line.
						</td>
<?
	if ($payType !== "online") {
		renderPaymentForm($shareTxt,$totalPrice,false);
	}
?>
					</tr>
				</table>
<?
		}
	}
?>
				<div style="padding:20px;">
					Email us with any questions you may have: <b><a href="mailto:letitgroworganik@gmail.com">letitgroworganik@gmail.com</a></b>
				</div>
			</div>
			<div style="padding:10px;text-align:right;font-size:10pt;">
				<a href="index.php">return to letitgroworganik.com</a>
			</div>
		</div>
	</body>
</html>
<?
	function renderPaymentForm($shareTxt,$totalPrice,$isChoice){
?>
	<td>
<?
	if ($isChoice == true) {
		echo "Make your payment online with debit/credit or Paypal.<br>";
	}
	else{
		echo "You may also make your payment online with debit/credit or Paypal.<br>";
	}
?>
		<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
		    <input type="hidden" name="cmd" value="_xclick">
		    <input type="hidden" name="business" value="letitgroworganik@gmail.com">
		    <input type="hidden" name="currency_code" value="USD">
		    <input type="hidden" name="item_name" value="CSA membership - <?= $shareTxt ?>">
		    <input type="hidden" name="amount" value="<?= $totalPrice ?>">
		    <input id="payment_btn" type="submit" value="Make Payment">
		</form>
		<div style="font-size:10pt;padding:10px;background-color:#eeeeee;border-radius:5px;">
			If you do not have a Paypal account, select the <i>Pay with debit or credit</i> option once you begin the checkout prosses
		</div>
	</td>
<?
	}
?>