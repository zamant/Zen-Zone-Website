<?php
abstract class Mail
{
	public static function factory($type)
	{
		$class = ucfirst($type);
	    return new $class;
	}
	
	abstract public function send($to, $subject, $message, $headers);

}
?>