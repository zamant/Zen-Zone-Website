<?php
class controller
{
    protected $parts;
    protected $view;
    public $data;
    public $autoRender=true;
    public $params;
    protected $restrict=false;
    
    public function __construct() {
		$this->checkAccess();
	}
	
	/*
	 * default action
	 */
	public function index(){
		
	}
	
	public function redirect($link,$params=null){
		if(is_array($params)){ 
			$url = 'Location: '.PROTOCOL.'://'.WEB_ROOT .'/'.$link['controller'].'/'.$link['action'].'/'.implode('/',$params);
			header($url);
			exit();
		}		
		header( 'Location: '.PROTOCOL.'://'.WEB_ROOT .'/'.$link['controller'].'/'.$link['action'].'/'.$params) ;
		exit();
	}
	
	public function setData($name,$value){
		$this->data[$name]=$value;
	}
	
  	public function render(){ 
		ob_start();
			sizeof($this->data)>0?extract($this->data):'';
	    	include($this->view);		
	    echo ob_get_clean();
	}
	
	public function setView($view){
		$this->view = $view;
	}
	
	public function setFlashMsg($msg,$type){
		$_SESSION['flash']['msg'] = $msg;
		$_SESSION['flash']['type'] = $type;
	}


	public function checkAccess(){
		if($this->restrict==true){
			if(null==AppGlobal::getVar('uid')){
				
			}
		}	
	}
}
?>