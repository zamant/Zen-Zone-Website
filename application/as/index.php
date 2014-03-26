<?php
 error_reporting(E_ALL);
session_start();

define('PROTOCOL','HTTP');
// echo dirname(__FILE__);
define('ROOT',dirname(__FILE__));
// echo ROOT;
// echo 'root='.ROOT;

define('WEB_ROOT',dirname($_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']));

require 'lib/autoloader.php';
require 'lib/dispatcher.php';
require 'lib/singletoninterface.php';
require 'lib/setting.php';
require 'lib/app_global.php';

$dispatcher = new Dispatcher((!isset($_GET['url'])?'homes/index':$_GET['url']));
$dispatcher->dispatch();
?>