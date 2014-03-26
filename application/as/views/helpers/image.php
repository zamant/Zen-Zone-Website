<?php
class Image extends Helper{
	
	
	public function addFile($file){
		return $this->fullPath.'/views/images/'.$file;
	}
	
}