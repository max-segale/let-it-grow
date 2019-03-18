<?php
	require "header.php";

	$signUpOpen = false;
  $earlySignUpDiscount = false;
	$csaWeeks = 22;
  $fullShare = 800;
	$halfShare = 550;
	$cutFlowers = 110;
	$jarClubYear = 182;
  $earlyDisPercent = 5;

  if ($earlySignUpDiscount) {
    $fullShare = $fullShare - round(($fullShare * ($earlyDisPercent * 0.01)));
    $halfShare = $halfShare - round(($halfShare * ($earlyDisPercent * 0.01)));
  }
?>
	<div id="page_pad">
		<h1><?= $thisSeason ?> <?= $farmName ?> CSA Sign-Up</h1>
		<hr class="bl">
    <p><b>CSA (Community Supported Agriculture)</b> members pay for an entire season of produce up front. This early bulk payment allows us to plan for the season, purchase new seed, make equipment repairs, and more. CSA members share in the ups and downs of our season and play an integral role in allowing our farm to develop. By purchasing a share you will be given access to our freshest, highest-quality produce at a discounted price. We take care of our members because we appreciate their support.</p>
		<p>Members will receive fresh authentic produce over the course of <b><?= $csaWeeks ?> weeks!!!</b></p>
		<p>New Morristown Pickup Location!</p>
		<p>We are also proud to offer a <b>CUT-FLOWER</b> add-on to our CSA members!!! Cut Flower members will receive a total of 11 bouquets throughout the season (about one every other week).</p>
		<p>Weather permitting we hope to start the CSA in late May. The CSA will continue from that date for a total of <?= $csaWeeks ?> weeks. This year we will be offering a two options: <b>Pre-Packed</b> CSA bag, or <b>Market-Style</b></p>
		<table class="csa_table uneven">
			<tr>
				<td>
					<p><b><u>Pre-Packed</u></b><br>CSA members can pick up their bags on Tuesday each week at Let It Grow Farm or our new Morristown location. For a small fee, pre-packed bags can also be delivered to Chester, Mendham, Morristown, Madison, and Chatham. Please call to discuss delivery details.</p>
				</td>
				<td>
					<p><b><u>Market-Style</u></b><br>Market-Style CSA members will have a debit account with Let It Grow Farm. This allows for greater flexibility and customization - the CSA bags can be as small or as large as the member wants. While in session, they can visit the Chester Farmers Market, located at ADDRESS, every Sunday from 10-3 from June ? - October ? and customize their own bags. Before the Farmer’s Market begins and after it ends members can check our website for crop availability and call, text, or email their orders for pick up or delivery. Market Style members will always have the option of custom bag delivery for a small fee. Please call to discuss delivery details.</p>
				</td>
			</tr>
		</table>
		<p>We are pleased to announce 2018 will be the first year we are offering <b>PRIVATE PICK-YOUR-OWN OPEN ONLY TO CSA MEMBERS!!!</b> In the Spring and Fall members can make an appointment and enjoy a private pick-your-own experience without lines or entry fees. Members will receive updates regarding crop availability and picking times.</p>
		<p>There are a limited number of shares and eligibility will be determined on a first come first serve basis. Thanks for your support and we look forward to a great season!</p>
<?
    if ($earlySignUpDiscount) {
      echo '<p><b>Early Bird Discount</b> - Sign up now to get ' . $earlyDisPercent . '% off your share price. Offer ends March 1st.</p>';
    }
?>
		<div style="padding:10px 0 0 0;">
<?
	if ($_REQUEST['f']) {
?>
			<div id="f_msg">
				<p>Please review your information and try again.</p>
			</div>
<?
	}
	if ($signUpOpen == true) {
?>
			<form name="csa_form" action="csa_action.php" method="post" onsubmit="return checkForm();">
				<input type="hidden" name="season" value="<?= $thisSeason ?>">
				<div style="float:left;width:60%;">
					<div class="option_box">
						<b>Select Your CSA Share</b>
						<hr class="bl">
						<table class="csa_table">
							<tr>
								<td>
									<input id="full_share_option" type="radio" name="share_type" value="full:<?= $fullShare ?>" onchange="checkEle('share_type');">
                  <label for="full_share_option">
                    Full Share - $<?= $fullShare ?> <span class="s_i_txt">($<?= round($fullShare / $csaWeeks, 2) ?> per week)</span>
<?
    if ($earlySignUpDiscount) {
      echo '<span class="s_i_txt"> - Includes ' . $earlyDisPercent . '% discount</span>';
    }
?>
                  </label>
								</td>
							</tr>
							<tr>
								<td>
									<input id="half_share_option" type="radio" name="share_type" value="half:<?= $halfShare ?>" onchange="checkEle('share_type');">
                  <label for="half_share_option">
                    Half Share - $<?= $halfShare ?> <span class="s_i_txt">($<?= round($halfShare / $csaWeeks, 2) ?> per week)</span>
<?
    if ($earlySignUpDiscount) {
      echo '<span class="s_i_txt"> - Includes ' . $earlyDisPercent . '% discount</span>';
    }
?>
                  </label>
								</td>
							</tr>
						</table>
					</div>
					<div class="option_box">
						<b>Cut Flowers</b> - <i>Optional</i>
						<hr class="bl">
						<table id="cut_flowers_table" class="csa_table">
							<tr>
								<td>
									<input id="cut_flowers" type="checkbox" name="cut_flowers" value="<?= $cutFlowers ?>" onchange="checkEle('cut_flowers');">
									<label for="cut_flowers">
										Cut Flowers Add-On - $<?= $cutFlowers ?>
										<p>Cut Flower members will receive a total of 11 bouquets throughout the season (about one every other week).</p>
									</label>
								</td>
							</tr>
						</table>
					</div>
					<!--
          <div class="option_box">
						<b>Jar of the Month Club</b> - <i>Optional</i>
						<hr class="bl">
						<table id="jar_club_table" class="csa_table">
							<tr>
								<td>
									<input id="jar_club" type="checkbox" name="jar_club" value="<?= $jarClubYear ?>" onchange="checkEle('jar_club');">
									<label for="jar_club">
										1 Year Jar Club Membership - $<?= $jarClubYear ?>
										<p class="sub_txt">12 months of our "Farm to Jar" products delivered to your desired location! Each month our members get a new exciting flavor. You will receive our different jams, salsas, hot sauces, marinara, pestos, and more. The shipping cost is included in the price of membership.</p>
                    <p class="sub_txt">This is the perfect gift for friends, family, or yourself! Give the taste of chemical-free produce made into delicious goodies.</p>
									</label>
								</td>
							</tr>
						</table>
					</div>
					-->
					<div class="option_box">
						<b>Any Special Requests or Preferences?</b>
						<hr class="bl">
						<div class="b_box">
							<textarea name="special_request" onblur="checkEle('special_request');"></textarea>
						</div>
					</div>
          <div class="option_box">
						<b>Enter Your Contact Information</b>
						<hr class="bl">
						<table id="contact_table">
							<tr>
								<td style="width:20%;" class="contact_name_cell">
									Name
								</td>
								<td style="width:80%;">
									<input class="contact_info" type="text" name="name" value="" onblur="checkEle('name');">
								</td>
							</tr>
							<tr>
								<td class="contact_name_cell">
									Address
								</td>
								<td>
									<input class="contact_info" type="text" name="address" value="" onblur="checkEle('address');">
								</td>
							</tr>
							<tr>
								<td class="contact_name_cell">
									Phone
								</td>
								<td>
									<input class="contact_info" type="text" name="phone" value="" onblur="checkEle('phone');">
								</td>
							</tr>
							<tr>
								<td class="contact_name_cell">
									Email
								</td>
								<td>
									<input class="contact_info" type="text" name="email" value="" onblur="checkEle('email');">
								</td>
							</tr>
						</table>
					</div>
					<div class="option_box">
						<b>Choose Your Pick Up Style</b>
						<hr class="bl">
						<table class="csa_table">
							<tr>
								<td>
									<input id="pre_packed" type="radio" name="pick_up" value="pre-packed" onchange="checkEle('pick_up');"><label for="pre_packed"> Pre-Packed</label>
									<label for="pre_packed">
										<div class="pt_descrip">
											Tuesday each week at Let It Grow Farm or our new Morristown location.
										</div>
									</label>
								</td>
								<td>
									<input id="market_style" type="radio" name="pick_up" value="market-style" onchange="checkEle('pick_up');"><label for="market_style"> Market-Style</label>
									<label for="market_style">
										<div class="pt_descrip">
											Customized bags can be picked up at the farmer's market. Read more info above.
										</div>
									</label>
								</td>
							</tr>
						</table>
					</div>
					<!--
					<div class="option_box">
						<b>Choose Your Pick Up Day</b>
						<hr class="bl">
						<table class="csa_table">
							<tr>
								<td>
									<input id="tues_pickup" type="radio" name="pick_up" value="tuesday" onchange="checkEle('pick_up');"><label for="tues_pickup"> Tuesday</label>
								</td>
								<td>
									<input id="fri_pickup" type="radio" name="pick_up" value="friday" onchange="checkEle('pick_up');"><label for="fri_pickup"> Friday</label>
								</td>
							</tr>
						</table>
					</div>
					-->
					<div class="option_box">
						<b>Choose Your Payment Method</b>
						<hr class="bl">
						<table class="csa_table">
							<tr>
								<td>
									<input id="check_option" type="radio" name="pay_type" value="check" onchange="checkEle('pay_type');"><label for="check_option"> Write a Check</label>
									<label for="check_option">
										<div class="pt_descrip">
											Check and mailing info will be provided after this form is submitted.
										</div>
									</label>
								</td>
								<td>
									<input id="credit_option" type="radio" name="pay_type" value="online" onchange="checkEle('pay_type');"><label for="credit_option"> Debit / Credit / Paypal</label>
									<label for="credit_option">
										<div class="pt_descrip">
											Conveniently make your payment online after this form is submitted.
										</div>
									</label>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div style="float:right;width:37%;">
					<div class="option_box">
						<b>What to expect in the <?= $thisSeason ?> CSA</b>
						<hr class="bl">
						<ul>
							<li><?= $csaWeeks ?> weeks of the freshest produce around using no synthetic chemicals!</li>
							<li>Lettuce mix, mesclun mix, spinach or lettuce heads every week</li>
							<li>Herbs in every share</li>
							<li>Root vegetables in every share (lots of carrots!)</li>
							<li>We want to have between 7 and 10 different items in the CSA bags every week (peak season could have up to 12 items)</li>
							<li>Heirloom tomatoes!</li>
							<li>New varieties</li>
							<li>New veggies</li>
							<li>Specialty products in your bag 2 times throughout the season</li>
						</ul>
					</div>
					<!--
					<p style="font-size:10pt;font-style:italic;margin:5px 0 0 0;">A few examples of what to expect in your share</p>
					<p style="margin-bottom:30px; font-size: 12px; line-height: 20px;">
						<b>Spring</b><br>Head/leaf Lettuce, Swiss Chard, Beets, Carrots, Radishes, Kale, Broccoli, Peas, Spinach, Herbs, Salad Mix<br><br>
						<b>Summer</b><br>Tomatoes, Eggplant, Squash, Swiss Chard, Leaf Lettuce, Cucumbers, Melons, Basil, Edible/Cut Flowers, Other Fresh Herbs, Preserved and Pickled Goods
					</p>
					-->
					<b>Agreement Terms</b>
					<hr class="bl">
					<p style="font-size:10pt;line-height:16pt;">
						We all understand the various outside factors, which can affect crop shares such as: weather, pests, and disease especially when crops are grown naturally. By signing below you acknowledge the fact that your share may possibly be affected by these variables. You also assume responsibility for picking up your share on your allotted day unless you have made other arrangements. Leftover shares will be discarded if we are not given prior notification and will not be refunded. We will do our best to accommodate you if a situation arises where you cannot pick up your share, as long as we are notified in advance.
					</p>
					<div class="b_box rl_txt option_box">
						<input id="agreement_terms" type="checkbox" name="agreement_terms" value="yes" onchange="checkEle('agreement_terms');">
						<label for="agreement_terms">I agree with the terms above</label>
					</div>
					<div class="b_box rl_txt">
						<input id="mailing_list" type="checkbox" name="mailing_list" value="yes" onchange="checkEle('mailing_list');">
						<label for="mailing_list">Join our mailing list</label>
					</div>
				</div>
				<div style="clear:both;text-align:center;">
					<input id="sign_up_btn" type="submit" value="Sign Up">
				</div>
			</form>
<?
	} else {

?>
			<hr class="bl">
<?
    if (date('m') > 3) {
?>
			<p>
        <b>Sign-ups for the <?= $thisSeason ?> CSA membership have been closed.</b><br>
			  We would like to thank everyone who has joined. We look forward to another great season.
      </p>
<?
    } else {
?>
      <p>
        <b>Sign-ups for the <?= $thisSeason ?> CSA membership have not started yet.</b><br>
        Check back soon to claim your spot for the <?= $thisSeason ?> CSA!
      </p>
<?
    }
	}
?>
		</div>
	</div>
<?
	require "footer.php"
?>
