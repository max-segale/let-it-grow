<?php

  $currentPage = $_SERVER[REQUEST_URI];
  $currentPage = substr($currentPage, 1);
  if ($currentPage === '') {
    $currentPage = 'index.php';
  }

  $navItems = array(
    array("home_nav", "index.php", "Home"),
    array("about_nav", "about.php", "About"),
    array("csa_nav", "csa.php", "CSA"),
    array("media_nav", "media.php", "Media"),
    array("store_nav", "store.php", "Store"),
    array("contact_nav", "contact.php", "Contact")
  );

  $farmName = 'Let It Grow Farm';
  $thisSeason = date('Y');
  $pageTitle = $farmName;
  $pageDescription = $farmName . ' was founded in 2010 with a mission to produce great tasting, healthy, authentic produce with minimal impact on the environment.';
  function renderLikeBox() {
?>
<div id="fb-root"></div>
<script>
  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<div class="fb-like-box" data-href="https://www.facebook.com/pages/Let-it-Grow-OrganiK/140895312599639" data-width="360" data-height="540" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="false"></div>
<?
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="author" content="<?= $farmName ?>">
    <meta name="description" content="<?= $pageDescription ?>">
    <meta name="robots" content="index, follow, all">
    <meta name="googlebot" content="index, follow, all">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $pageTitle ?></title>
    <link rel="icon" type="image/x-icon" href="img/lig_fav_16.png">
    <link rel="apple-touch-icon-precomposed" href="img/lig_fav_57.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/lig_fav_72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/lig_fav_114.png">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div id="all">
      <div id="main">
        <div id="top_box">
          <div id="header">
            <a href="index.php"><img id="logo" src="img/let_it_grow_logo.png"></a>
            <div id="top_area"></div>
            <div id="nav">
              <ul id="nav_list">
<?
  for ($n = 0; $n < count($navItems); $n++) {
?>
                <a id="<?= $navItems[$n][0] ?>" href="<?= $navItems[$n][1] ?>">
                  <li <? if ($currentPage == $navItems[$n][1]) {echo 'class="selected"';} ?> style="width: <?= 100 / count($navItems) ?>%;">
                    <div><?= $navItems[$n][2] ?></div>
                  </li>
                </a>
<?
  }
?>
              </ul>
            </div>
          </div>
        </div>
        <div id="container">
          <div id="page">
