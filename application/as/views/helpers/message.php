<?php
class Message {
	public $flash=null;
	
	public function getMsg(){
		return isset($_SESSION['flash'])?$_SESSION['flash']:null;
	}
	
	public function resetMsg(){
		unset($_SESSION['flash']);
	}
	
	public function showMessage(){
		$this->flash=$this->getMsg();
		
		
		if(null!=$this->flash){
			$msg =  '<div class="'.$this->flash['type'].'">';
			if(is_array($this->flash['msg'])){
				foreach($this->flash['msg'] as $mg){
					$msg.='<span>'.$mg.'</span>';
				}
			}else{
				$msg.=$this->flash['msg'];
			}
			$msg.='</div>';
			echo $msg;
			$this->resetMsg();
		}
		
	}
}