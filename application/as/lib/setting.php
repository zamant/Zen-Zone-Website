<?php
class Setting {
	public static $usr='root';
	public static $pwd='';
	public static $db='homeopathy';
	public static $host='localhost';	//normally it will be localhost
	public static $timezone ='America/Toronto'; //change your timezone if you wish
	public static $encrp = 'md5';    //leave this as it is
	
	public static $demo = 0;
}

error_reporting(E_ERROR | E_PARSE);
?>