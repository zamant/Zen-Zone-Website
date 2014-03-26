<?php

function db_connect()
{
	$user='root';
	$pw='';
	$host='localhost';
	$db_name='homeopathy';
	
	$conn = mysql_connect($host,$user,$pw);
	if (!$conn)
	{
		echo 'Unable to connect to database. '.mysql_error();
	}
	else
	{
		if (!mysql_select_db($db_name,$conn))
		{
			echo 'Connected to server but unable to connect to database. '.mysql_error();
		}
	}
}

db_connect();

?>