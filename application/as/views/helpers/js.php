<?php
class Js extends Helper{
	
	
	public function addFile($file){
		return '<script type="text/javascript" src="'.$this->fullPath.'/views/js/'.$file.'"></script>';
	}
	
}