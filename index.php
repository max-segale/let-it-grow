<?php
	require '../admin/functions.php';
	require 'header.php';

	$sql = "SELECT title, text FROM updates ORDER BY date DESC LIMIT 1";
	$result = sqlQuery($sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $updateTitle = $row['title'];
	$updateText = $row['text'];
?>
	<div id="page_pad">
		<h1><?= $updateTitle ?></h1>
		<hr class="bl">
		<img class="p_img" src="http://img.letitgrownj.com/farm-to-jar-products-1.jpg" style="width: initial;">
		<p><?= nl2br($updateText) ?></p>
		<hr>
		<div style="height:280px;overflow:hidden;margin:40px 0;position:relative;">
      <img class="home_img" src="http://img.letitgrownj.com/farm-to-jar-products-2.jpg" style="position:absolute;left:0;top:0;">
			<img class="home_img" style="margin:0 auto;" src="http://img.letitgrownj.com/farm-to-jar-products-3.jpg">
			<img class="home_img" src="http://img.letitgrownj.com/farm-to-jar-products-4.jpg" style="position:absolute;right:0;top:0;">
      <!--
			<img class="home_img" src="img/lig_comb.jpg" style="position:absolute;left:0;top:0;">
			<img class="home_img" style="margin:0 auto;" src="img/lig_tomato.jpg">
			<img class="home_img" src="img/lig_chicken.jpg" style="position:absolute;right:0;top:0;">
      -->
		</div>
    <h1>Join Our Mailing List</h1>
    <hr class="bl">
    <p>Stay up to date with the latest news from <?= $farmName ?>.</p>
    <form id="mailing_list_form" onsubmit="return newMailingSubmit();">
      <table class="spread_sheet">
        <tr>
          <th>
            Your Name
          </th>
          <th>
            Your Email
          </th>
          <th>
            Your Town/City
          </th>
        </tr>
        <tr>
          <td>
            <input class="text" name="name" type="text">
          </td>
          <td>
            <input class="text" name="email" type="text">
          </td>
          <td>
            <input class="text" name="location" type="text">
          </td>
        </tr>
      </table>
      <input class="submit" type="submit" value="Sign Up">
    </form>
    <!--
		<h1><?= $thisSeason ?> CSA Membership</h1>
		<hr class="bl">
		<p><b>CSA (Community Supported Agriculture)</b> members pay for an entire season of produce up front. This early bulk payment allows us to plan for the season, purchase new seed, make equipment repairs, and more. CSA members share in the ups and downs of our seasons and play an integral role in allowing our farm to develop. By purchasing a share you will be given access to our freshest highest quality produce at a discounted price. We take care of our members because we appreciate their support.</p>
		<p><b><a class="txt_link" href="csa.php">Sign Up for the <?= $thisSeason ?> CSA</a></b></p>
    -->
	</div>
<?
	require "footer.php"
?>
