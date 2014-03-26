<?php
/**
*@author  The-Di-Lab
*@email    thedilab@gmail.com
*@website http://www.the-di-lab.com
**/
abstract class Helper {
    /*************** PROPERTY **********/
    protected $fullPath;
    
	/*************** PUBLIC METHODS **********/
	public function __construct() {
		$this->fullPath=PROTOCOL.'://'.WEB_ROOT;
	}
	
}