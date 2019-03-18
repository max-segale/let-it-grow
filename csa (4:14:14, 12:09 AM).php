<?php
	require "header.php"
?>
	<div id="page_pad">
		<h1><?= $thisSeason ?> Let it Grow Organik CSA Sign-Up</h1>
		<hr class="bl">
		<p>Members will receive 20 shares of fresh organic produce over the course of 20 weeks.</p>
		<p>We have extended the CSA season for an extra 4 weeks this year! Weather Permitting we are aiming for the first pick up day to be the week of May 9th. The csa will continue from that date for a total of 20 weeks. Pickup will be on Tuesdays and Fridays each week in the Turkey Farm restaurant at 2 West Main St Chester, NJ. We are happy to be able to offer a wider variety of produce this year due to our recent farm improvements.</p>
		<p>Along with the produce we are also offering an egg option, which will add 6 farm fresh eggs a week to your existing share. Our chickens are pasture raised, supplemented with organic/non-GMO feed, and are hormone free.</p>
		<p>We are offering a discounted rate as a work share program, where the shareholder will help with tasks on the farm for around 15-20 hours throughout the CSA season. Tasks will be delegated by ability of individual and can be performed around a flexible schedule. Prior farm experience is most certainly not a prerequisite.</p>
		<p>There are a limited number of shares and eligibility will be determined on a first come first serve basis.</p>
		<div style="padding:10px 0 0 0;">
		<form name="csa_form" action="csa_action.php" method="post" onsubmit="return checkForm();">
			<input type="hidden" name="season" value="<?= $thisSeason ?>">
			<input type="hidden" name="file_name" value="csa_list.php">
			<input type="hidden" name="destination" value="confirm.php">
			<div style="float:left;width:60%;">
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
					<b>Select Your Share Options</b>
					<hr class="bl">
					<table class="csa_table">
						<tr>
							<td>			
								<input id="full_share_option" type="radio" name="share_type" value="full:675" onchange="getTotal();checkEle('share_type');"><label for="full_share_option"> Full Share - $675</label>
							</td>
							<td>
								<input id="full_work_option" type="radio" name="share_type" value="full work:575" onchange="getTotal();checkEle('share_type');"><label for="full_work_option"> Full Work Share - $575</label>
							</td>
						</tr>
						<tr>
							<td>
								<input id="half_share_option" type="radio" name="share_type" value="half:400" onchange="getTotal();checkEle('share_type');"><label for="half_share_option"> Half Share - $400</label>
							</td>
							<td>
								<input id="half_work_option" type="radio" name="share_type" value="half work:300" onchange="getTotal();checkEle('share_type');"><label for="half_work_option"> Half Work Share - $300</label>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input id="egg_option" type="checkbox" name="eggs" value="40" onchange="getTotal();checkEle('eggs');"><label for="egg_option"> Additional Egg Option - $40</label>
							</td>
						</tr>
							<tr>
							<td colspan="2" id="total_cell">
								Total: <span id="csa_total"></span>
							</td>
						</tr>
					</table>
				</div>
				<div class="option_box">
					<b>Any Special Requests or Preferences?</b>
					<hr class="bl">
					<div class="b_box">
						<textarea name="special_request" onblur="checkEle('special_request');"></textarea>
					</div>
				</div>
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
				<div class="option_box">
					<b>Choose Your Payment Method</b>
					<hr class="bl">
					<table class="csa_table">
						<tr>
							<td>
								<input id="check_option" type="radio" name="pay_type" value="check" onchange="checkEle('pay_type');"><label for="check_option"> Check</label>
								<label for="check_option">
									<div class="pt_descrip">
										<i>Make check payable to Joshua Chaffee with “CSA Share” on the memo line.</i>
									</div>
								</label>
							</td>
							<td>
								<input id="credit_option" type="radio" name="pay_type" value="online" onchange="checkEle('pay_type');"><label for="credit_option"> Debit / Credit</label>
								<label for="credit_option">
									<div class="pt_descrip">
										<i>Make your payment online with debit/credit or Paypal.</i>
									</div>
								</label>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div style="float:right;width:37%;">
				<p style="font-size:10pt;font-style:italic;margin:5px 0 0 0;">A few examples of what to expect in your share</p>
				<p>
					<b>Spring</b><br>Head/leaf Lettuce, Swiss Chard, Beets, Carrots, Radishes, Kale, Broccoli, Peas, Spinach, Herbs, Salad Mix<br><br>
					<b>Summer</b><br>Tomatoes, Eggplant, Squash, Swiss Chard, Leaf Lettuce, Cucumbers, Melons, Basil, Edible/Cut Flowers, Other Fresh Herbs, Preserved and Pickled Goods
				</p>
				<b>Agreement Terms</b>
				<hr class="bl">
				<p style="font-size:10pt;line-height:16pt;">
					We all understand the various outside factors, which can affect crop shares such as: weather, pests, and disease especially when crops are grown naturally. By signing below you acknowledge the fact that your share may possibly be affected by these variables. You also assume responsibility for picking up your share on your allotted day unless you have made other arrangements. Leftover shares will be discarded if we are not given prior notification and will not be refunded. We will do our best to accommodate you if a situation arises where you cannot pick up your share, as long as we are notified in advance.
				</p>
				<div class="b_box">
					<input id="agreement_terms" type="checkbox" name="agreement_terms" value="yes" onchange="checkEle('agreement_terms');">
					<div class="rl_txt">
						<label for="agreement_terms">I have read and agree with the terms above</label>
					</div>
					<hr>
				</div>
			</div>
			<div style="clear:both;text-align:center;">
				<input id="sign_up_btn" type="submit" value="Sign Up">
			</div>
		</form>
		</div>
	</div>
<?
	require "footer.php"
?>