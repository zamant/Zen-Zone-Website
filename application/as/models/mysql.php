<?php
class mysql extends db implements singletoninterface
{
	protected static $instance = null;
	protected $link;

	public static function getInstance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	protected function __construct()
	{
		$user = Setting::$usr;
		$pass = Setting::$pwd;
		$host = Setting::$host;
		$db = Setting::$db;

		$this->link = mysql_connect($host, $user, $pass);
		if (!$this->link) {
		    die('Could not connect: ' . mysql_error());
		}
		mysql_select_db($db, $this->link);
	}

	public function clean($string)
	{
		return mysql_real_escape_string($string, $this->link);
	}

	public function getArray($query)
	{	
		$result = mysql_query($query, $this->link);

		$return = array();

		if ($result) {
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$return[] = $row;
			}
		}
	
		return $return;
	}

	public function execute($query)
	{	
		if(!(mysql_query($query, $this->link))){
			 die('Invalid query: ' . mysql_error());
		}
	}

	public function insertGetId($query)
	{
		$this->execute($query);
		return mysql_insert_id($this->link);
	}
}
?>