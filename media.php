<?php
	require '../admin/functions.php';
	require 'header.php';

	$sql = "SELECT title, update_id FROM updates ORDER BY date";
	$result = sqlQuery($sql);
?>
	<div id="fb_panel">
		<div id="fb_title">
			Find Us On Facebook
		</div>
		<? renderLikeBox(); ?>
	</div>
	<div id="page_pad">
<?
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		$sql = "SELECT url, caption FROM update_photos WHERE update_id = '" . $row['update_id'] . "' ORDER BY photo_order";
		$updatePhotos = sqlQuery($sql);
		if (mysqli_num_rows($updatePhotos) > 0) {
?>
		<h1><?= $row['title'] ?></h1>
		<hr class="bl">
<?
			while ($photos = mysqli_fetch_array($updatePhotos, MYSQLI_ASSOC)) {
?>
		<div class="photo_box">
			<div class="caption_box">
				<?= $photos['caption'] ?>
			</div>
			<img class="media_photo" src="img/<?= $photos['url'] ?>">
		</div>
<?
			}
		}
	}
?>
	</div>
<?
	require "footer.php";
?>
