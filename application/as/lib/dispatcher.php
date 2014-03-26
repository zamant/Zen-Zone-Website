<?php
class dispatcher
{
    protected $parts;
    protected $urlString;
    public $params;
    
	public function __construct($urlString){
		$this->urlString = $urlString;
			
		$urlString = strtolower($urlString);
		
		if (substr($urlString, -1, 1) == '/') {
			$urlString = substr($urlString, 0, strlen($urlString) - 1);
		}
		
		$parts = explode('/', $urlString);
		if (empty($parts[0])) {
			$parts[0] = 'homes';
		}
		if (empty($parts[1])) {
			$parts[1] = 'index';
		}
		
		$this->parts = $parts;
		array_shift($parts);
		array_shift($parts); 
		$this->params = $parts;		
	}	
	
		
	public function dispatch(){
		
		if('views'==$this->parts[0]){
				include ROOT.'/'.$this->urlString; 		
				//include $this->urlString; 		
		}else{
			$cClass = ucfirst($this->parts[0]);
			$controller =new $cClass;
			
			call_user_func_array(array($controller,$this->parts[1]),$this->params);
			
			if($controller->autoRender){
				$controller->setView(ROOT.'/views/'.$this->parts[0].'/'.$this->parts[1].'.php');
				//$controller->setView($this->parts[0].'/'.$this->parts[1].'.php');
				$controller->render();
			}	
		}
	}
	
}
?>