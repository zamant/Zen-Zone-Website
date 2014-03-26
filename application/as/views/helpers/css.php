<?php
class Css extends Helper{
	
	
	public function addFile($file){
		$cssDir = $this->fullPath.'/views/styles/';
		
		
		
		if (strpos($file,'../')===0)
		{
			for ($i=0;$i<2 && strlen($cssDir)>2;$i++)
			{
				$index = strrpos(substr($cssDir,0,strlen($cssDir)-1),'/');
				if ($index!==false)
				{
					$cssDir = substr($cssDir,0,$index+1);
					//echo 'cssDir became: '.$cssDir;
				}
				else
					break;
			}
			
		}
		
		while (strpos($file,'../')===0)
		{
			$index = strrpos(substr($cssDir,0,strlen($cssDir)-1),'/');
			if ($index!==false)
			{
				$file=substr($file,3); // remove the beginning '../'.
				$cssDir = substr($cssDir,0,$index+1);
				//echo 'cssDir became: '.$cssDir;
				// remove the last directory from $cssDir.
			}
			else
				break; // break while loop.
		}
		return '<link href="'.$cssDir.$file.'" rel="stylesheet" type="text/css">';
	}
	
}