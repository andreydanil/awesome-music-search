<?php 
include('includes/config.php');
?>
<!DOCTYPE html>
<!--
Papu Music Search Engine Script
Author: papu
URI: http://zeetmarket.com/author/papu/
-->
<?php
  // Match instant play requests
  $uri = trim($_SERVER['REQUEST_URI'], '/');
?>
<html>
<head>
  <title><?php echo $sitetitle; ?></title>
  <base href="http://<?= $_SERVER['HTTP_HOST'] ?>"/>
  <link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo $app_path ?>/papumusic.css">
  <link rel="shortcut icon" href="<?php echo $app_path ?>/favicon.ico">

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.1/underscore-min.js"></script>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.1/backbone-min.js"></script>
  <script type="text/javascript" src="<?php echo $app_path ?>/papumusic.js"></script>
</head>
<body class="centered">
<div class="container">
  <table class="table"><tr><td class="search">
    <form id="qform">
      <h1 class="pagetitle"><a href="<?php echo $app_path ?>/">
        <?php echo $sitename; ?>
      </a></h1>
      <div class="tagline"><?php echo $sitetagline; ?></div>
      <input id="q" value="<?php echo $inputvalue; ?>"/><input type="submit" value="Search Music"/>
      <? if(rand(0, 10) < 5) {
 ?>
      <? } else { ?>
	 
      <div class="tip">
  <br/>
<?php 
include('includes/advertisement.php');
?><br/>
      </div>
      <? } ?>
      <div class="logos">
       <h3><?php echo $copyright; ?> </h3>
      </div>
      <div class="details">
        <a href="<?php echo $feedbacklink; ?>">Feedback</a> &nbsp;
        
		    <a href="<?php echo $fbpaget; ?>"><img src="<?php echo $app_path ?>/images/facebookicon.png"></a> &nbsp;
			 <a href="<?php echo $twitterlink; ?>"><img src="<?php echo $app_path ?>/images/twittericon.png"></a>
      </div>
    </form>
  </td></tr></table>
  <div class="content">
<br/><?php 
include('includes/advertisement.php');
?><br/>
    <div id="service">This is old version it doesn't work, please buy new version <a href="http://zeetmarket.com/downloads/Papu-Music-Search-Engine-Script/">Buy Now $5</a> </div>

    <div class="footer">
<br/><?php 
include('includes/advertisement.php');
?><br/><br/>
		<?php echo $copyright; ?> 
    </div>
    <div class="playContainerSpacer"></div>
  </div>
  <div class="playContainer">
    <div class="playHeader">
      <span class="info"></span>
      <span class="minimizeButton"><img src="<?php echo $app_path ?>/images/minimize.png" width="30" height="30"></span>
      <span class="closeButton"><img src="<?php echo $app_path ?>/images/close.png" width="30" height="30"></span>
    </div>
    <iframe class="playFrame" name="playFrame"></iframe>
    <!-- Spotify protocol uri target iframe, workaround to prevent Grooveshark onbeforeunload -->
    <iframe class="spotifyTarget" name="spotifyTarget"></iframe>
  </div>
</div>
<!-- Templates -->
<script type="text/template" id="tpl-track">
  <li>
    <a href="{{ url }}" data-autoplayurl="{{ autoPlayUrl }}" target="m">{% if (artist) { %}{{ artist }} - {% } %}{{ track }}</a>
    {% if (popularity !== undefined) { %}
    <span class="album withPopularity">{{ album }}</span>
    <span class="popularity"><span class="popularityValue" style="width: {{ popularity }}%"></span></span>
    {% } else { %}
    <span class="album">{{ album }}</span>
    {% } %}
  </li>
</script>
<script type="text/template" id="tpl-service">
  <div class="col" id="{{ apiName }}">
    <h2>
    <a href="{{ apiURL }}" target="_blank"><img src="images/{{ apiName }}.png" class="logo"></a>
    {{ apiNiceName }} <span class="num-results"></span></h2>
    <div class="loading">
      <img class="spinner" src="<?php echo $app_path ?>/images/spinner.gif">
      <div class="refresh">Refresh <img src="<?php echo $app_path ?>/images/refresh.png"></div>
    </div>
    <div class="note">{{ note }}</div>
    <div class="results"></div>
    <div class="toggleMore">More</div>
  </div>
</script>
<script type="text/template" id="tpl-playheader">
  {% if (artist) { %}{{ artist }} - {% } %}{{ track }}
</script>
</body>
</html>