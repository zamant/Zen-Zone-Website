<?php

require_once('includes/header.php');

// if sending a letter:
if (isset($_POST['content'])&&isset($_POST['subject'])):

	echo 'sending email';
	$from = 'ritavs@sympatico.ca';
	$subject=$_POST['subject'];
	$message=$_POST['content'];
	$headers='From: '.$from. "\r\n" .
    'Reply-To: ' .$from. "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	$res = mysql_query("select * from newsletter_email");
	
	// loop through all newsletter email recipients.
	while ($row=mysql_fetch_assoc($res)):
		$to = $row['email'];
		if (!@mail($to,$subject,$message,$headers)):
			$msg='Failed to send email to '.$to;
		endif;
	endwhile;
	
	if ($res)
		mysql_free_result($res); // free memory associated with the query.
	
endif;

if (isset($msg)):
	?><p><?php
	echo htmlspecialchars($msg);
	?></p><?php
endif;
?><form method="post" action="newsletter_sending.php">
<table>
 <tr>
	<td>Subject</td>
	<td><input type="text" name="subject" value="" /></td>
	<td></td>
 </tr>
 <tr>
	<td>Content</td>
	<td><textarea name="content" rows="5" cols="50"></textarea></td>
	<td></td>
 </tr>
 <tr>
	<td colspan="3"><input type="submit" value="Send Email to All Newsletter Subscribers" /></td>
 </tr>
</table>
</form>

<?php

require_once("includes/footer.php");
