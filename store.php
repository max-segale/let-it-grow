<?php
	require "../admin/functions.php";
	require "header.php";

	$sql = "SELECT * FROM products ORDER BY product_order";
	$productResult = sqlQuery($sql);

	$business = 'letitgroworganik@gmail.com';
	$currencyCode = 'USD';
	$imageURL = 'http://letitgrownj.com/img/let_it_grow_logo.png';
	$return = 'http://letitgrownj.com/thank-you.asp';

?>
	<div id="page_pad">
		<h1>Farm to Jar</h1>
		<hr class="bl">
		<p>Our specialty products are made with our own authentic produce. We NEVER use synthetics or GMOs and grow sustainably. Growing amazing produce and putting it into our specialty products is our passion and we want you to taste it!</p>
		<hr>
		<div id="products">
<?
	if (mysqli_num_rows($productResult) > 0) {
		while($product = mysqli_fetch_array($productResult, MYSQLI_ASSOC)) {
			$productId = $product['product_id'];
			$productName = $product['product_name'];
			$productTitle = $product['product_title'];
			$productDescription = $product['product_description'];
			$productStatus = $product['product_status'];
?>
			<div class="product_box">
				<div>
					<div class="product_title">
						<?= $productName ?>
					</div>
<?
			$photoResult = sqlQuery("SELECT * FROM product_photos WHERE product_id = '$productId'");
			while($photo = mysqli_fetch_array($photoResult, MYSQLI_ASSOC)) {
				$photoURL = $photo['url'];
?>
				<img class="product_photo" src="http://letitgrownj.com/img/<?= $photoURL ?>">
<?
			}
?>
				<p><b><?= $productTitle ?></b></p><p><?= $productDescription ?></p>
<?
			$sql = "SELECT * FROM product_options WHERE product_id = '$productId'";
			$optionResult = sqlQuery($sql);
			while($option = mysqli_fetch_array($optionResult, MYSQLI_ASSOC)) {
				$optionName = $option['option_name'];
				$optionPrice = $option['option_price'];
				$optionWeight = $option['option_weight'];
				$cartRef = "https://www.paypal.com/cart/add=1&business=$business&item_name=" . str_replace("'", "", "$productName - $optionName") . "&amount=$optionPrice&currency_code=$currencyCode";
				if ($optionWeight) {
					$cartRef .= "&weight=$optionWeight&weight_unit=lbs";
				}
?>
				<p><?= $optionName ?></p>
				<p>$<?= $optionPrice ?></p>
<?
				if ($productStatus == 'sold out') {
?>
				<div class="sold_out_icon">Sold Out</div>
<?
				} else {
?>
				<a target="paypal-cart" href="<?= $cartRef ?>">
					<div class="add_cart_btn">Add to Cart</div>
				</a>
<?
				}
			}
?>
				</div>
			</div>
<?
		}
	}
?>
		</div>
	</div>
<?
	require "footer.php"
?>
