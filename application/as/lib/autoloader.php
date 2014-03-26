<?php
class autoloader
{
	public static function loaderModels($class)
	{
		$path =  ROOT."/models/".strtolower($class).".php";		
		if (is_readable($path)) require $path;
	}
	
	public static function loaderControllers($class)
	{
		$path =  ROOT."/controllers/".strtolower($class).".php";		
		if (is_readable($path)) require $path;
	}
	
	public static function loaderHelpers($class)
	{
		$path =  ROOT."/views/helpers/".strtolower($class).".php";		
		if (is_readable($path)) require $path;
	}
	

}
spl_autoload_register('autoloader::loaderModels');
spl_autoload_register('autoloader::loaderControllers');
spl_autoload_register('autoloader::loaderHelpers');
?>