<?php

require_once('includes/session.php');
unset($_SESSION['user_id']);

$previous_url='index.php';
if (isset($_SERVER['HTTP_REFERER'])):
	$previous_url=$_SERVER['HTTP_REFERER'];
endif;

header('Location: '.$previous_url);
