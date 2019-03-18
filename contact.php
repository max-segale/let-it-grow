<?php
	require "header.php"
?>
	<div id="fb_panel">
		<div id="fb_title">
			Find Us On Facebook
		</div>
		<? renderLikeBox(); ?>
	</div>
	<div id="page_pad">
		<h1>Contact Us</h1>
		<hr class="bl">
		<p><b><?= $farmName ?></b><br>2 W Main St Chester NJ</p>
		<p><b>Mailing Address</b><br>P.O. Box 127<br>Chester, NJ 07930</p>
		<p>
			<b>Questions/Comments</b><br>
			908-888-2080<br>
			<a href="mailto:letitgroworganik@gmail.com">letitgroworganik@gmail.com</a><br>
		</p>
		<img style="margin:0 auto;padding:40px 0 0 0;" src="img/c_pics.jpg">
	</div>
<?
	require "footer.php"
?>
