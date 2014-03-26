<?php
class Html extends Helper{
	
	
	public function addLink($link,$params=null){
		if(is_array($params)){
			return $this->fullPath.'/'.$link['controller'].'/'.$link['action'].'/'.implode('/',$params);
		}
		return $this->fullPath.'/'.$link['controller'].'/'.$link['action'].'/'.$params;
	}
	
}