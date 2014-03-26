<?php

require_once('session.php');
require_once('connect.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ZenZone</title>
<meta name="keywords" content="" />
<meta name="description" content="" />


<!--CSS-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="css/sliding-flexible-menu.css" />

<!--jQuery--
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>-->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

<!--Fade Slide Show-->
<script type="text/javascript" src="js/fadeslideshow.js"></script>

<!--Menu-->
<script type="text/javascript" src="js/jquery.sliding-flexible-menu.js"></script>

<!--ddsmoothmenu--
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>-->

<!--Preview - Remove it
<script type="text/javascript" src="js/preview.js"></script>
-->


	<script language="javascript" type="text/javascript">
	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}
	</script>
	
	
	<script language="javascript" type="text/javascript">
	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}
	</script>
	
	
	
</head>

<body>

<div id="header_wrapper">
    <div id="header">
        <div id="site_title"><a href="index.php">ZEN <span>ZONE</span></a></div>
		
		<div id="menu" class="menu-horizontal">
		<?php
		$base_url = '/homeopathy/realwork/';
		?>
				<ul>
					<li><a href="<?php echo $base_url; ?>index.php" class="active">Home</a></li>
					<li><a href="<?php echo $base_url; ?>page1.php">About Homoeopathy</a>
					<ul>
						<li><a href="page1.php">Homoeopathy 1</a></li>
						<li><a href="page1.php">Homoeopathy 2</a></li>
						<li><a href="page1.php">Homoeopathy 3</a></li>
					</ul>
					</li>
					<li><a href="<?php echo $base_url; ?>page1.php">About Hypnosis</a>
						<ul>
							<li><a href="page1.php">Hypnosis 1</a></li>
							<li><a href="page1.php">Hypnosis 2</a></li>
							<li><a href="page1.php">Hypnosis 3</a></li>
						</ul>

					</li>
					<li><a href="<?php echo $base_url; ?>page1.php">About Strategy Training</a>
						<ul>
							<li><a href="page1.php">Strategy Training 1</a></li>
							<li><a href="page1.php">Strategy Training 2</a></li>
							<li><a href="page1.php">Strategy Training 3</a></li>
						</ul>
					</li>
					<?php 
					if (isset($_SESSION['user_id']))
					{
						echo '<li><a href="'.$base_url.'application/as/">Book Now</a></li>';
						echo '<li><a href="'.$base_url.'signout.php">Sign Out</a></li>';
					}
					else
					{
						echo '<li><a href="'.$base_url.'registration.php">Login/Register</a></li>';
					}
					?>
					<li><a href="<?php echo $base_url; ?>contact.php">Contact Us</a></li>
				</ul>
				</div>
  <!--      <div id="menu" class="ddsmoothmenu">
            <ul>
                <li><a href="index.html" class="selected">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of menu -->
    </div> <!-- END of header -->
</div>