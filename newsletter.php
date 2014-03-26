<?php
// 2 basic steps:
// 1. insert new email address into database.
// 2. redirect to previous page.


// STEP 1:
// connect to database.
require_once("includes/connect.php");

if (isset($_POST['newsletter_email'])):

	// insert record into newsletter_email table of database.
	mysql_query("insert into newsletter_email(email) values('".
		mysql_real_escape_string($_POST['newsletter_email'])."')");
		
endif;

// STEP 2:

// default redirect page that is hopefully replaced by a better guess.
$previous_url='index.php';

// if a better guess exists, go there instead.
if (isset($_SERVER['HTTP_REFERER']))
	$previous_url=$_SERVER['HTTP_REFERER'];

// redirect to previous page.
header("Location: ".$previous_url);


