<?php
class Email extends Dao {
    protected $table = 'emails' ;    
    
    public function getAll($assciate=false,$conditional=array()){
    	$connection = db::factory('mysql');
		$sql = "select * from {$this->table} where ";
		
    	$qualifier = '1';		
		foreach ($conditional as $column=>$value) {
			if (!empty($qualifier)) { 
				$qualifier .= ' and ';
			}
			$qualifier .= "`{$column}`='" . $connection->clean($value) . "' ";
		}
		$sql .= $qualifier;
		
		
		
		$valueArray = $connection->getArray($sql);
		if(!$assciate){
			return $valueArray;	 
		}else{
			$valueAssociate=array();
			foreach($valueArray as $value){
				    $vKey = current(array_keys($assciate));
				    $vVal = current(array_values($assciate));
					$valueAssociate[$value[$vKey]]=$value[$vVal];
			}
			return $valueAssociate;
		}
    }
    
    public function valid(){
    	if($this->name!=null&&$this->type!=null&&$this->content!=null){
    		return true;
    	}
    	return false;    	
    }

		
}
?>