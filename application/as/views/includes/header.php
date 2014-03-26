<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Book Appointment</title>

<?php 
$css = new Css();
$image = new Image();
$html = new Html();
$calendar = new Calendar();
$msg = new Message();
$js = new Js();
$form = new Form();
$time = new Time();
echo $css->addFile('style_b.css');
echo $css->addFile('custom.css');
echo $css->addFile('../../css/style.css');
echo $js->addFile('jquery-1.4.4.min.js');
echo $js->addFile('app.js');
?>
</head>
<body>
<div id="header_wrapper">
    <div id="header">
        <div id="site_title"><a href="index.php">ZEN <span>ZONE</span></a></div>
		
		<div id="menu" class="menu-horizontal">
				<ul>
					<li><a href="../../index.php" class="active">Home</a></li>
					<li><a href="../../page1.php">About Homoeopathy</a>
						<ul>
								<li><a href="../../page1.php">Homoeopathy 1</a></li>
								<li><a href="../../page1.php">Homoeopathy 2</a></li>
								<li><a href="../../page1.php">Homoeopathy 3</a></li>
						</ul>
					</li>
					<li><a href="page1.php">About Hypnosis</a>
						<ul>
							<li><a href="../../page1.php">Hypnosis 1</a></li>
							<li><a href="../../page1.php">Hypnosis 2</a></li>
							<li><a href="../../page1.php">Hypnosis 3</a></li>
						</ul>
					</li>
					<li><a href="page1.php">About Strategy Training</a>
						<ul>
							<li><a href="../../page1.php">Strategy Training 1</a></li>
							<li><a href="../../page1.php">Strategy Training 2</a></li>
							<li><a href="../../page1.php">Strategy Training 3</a></li>
						</ul>
					</li>
					<?php 
					if (isset($_SESSION['user_id']))
					{
						echo '<li><a href="application/as/">Book Now</a></li>';
						echo '<li><a href="../../signout.php">Sign Out</a></li>';
					}
					else
					{
						echo '<li><a href="../../registration.php">Login/Register</a></li>';
					}
					?>
					<li><a href="../../contact.php">Contact Us</a></li>
				</ul>
				</div>
    </div> <!-- END of header -->
</div>
