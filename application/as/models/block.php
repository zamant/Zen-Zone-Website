<?php
class Block extends Dao {
    protected $table = 'blocks' ;    
    private $defaultTimeFrom = '00:00:00';
    private $defaultTimeTo = '23:59:59';
	
    public function isBlock($date,$from,$to){
    	$connection = db::factory('mysql');
		$sql = 'select *  from blocks WHERE date LIKE "'.$connection->clean($date).'%"';
		$qualifier = ' AND time_from <= "'.$connection->clean($from).'"'.
		             ' AND time_to >= "'.$connection->clean($from).'"';
		$sql.=$qualifier;
		if(sizeof($connection->getArray($sql))>0){
			return true;
		}
		
    	$sql2 = 'select *  from blocks WHERE date LIKE "'.$connection->clean($date).'%"';
		$qualifier2 = ' AND time_from <= "'.$connection->clean($to).'"'.
		             ' AND time_to >= "'.$connection->clean($to).'"';
		$sql2.=$qualifier2;
		if(sizeof($connection->getArray($sql2))>0){
			return true;
		}
		
		return false;		
    }
    
    public function getBlocksPerDay($day,$month,$year){
    	$connection = db::factory('mysql');
		
		$sql = 'select *  from blocks WHERE date LIKE "'.$year.'-'.$month.'-'.$day.'%"';
		
		return $connection->getArray($sql);
    }
    
    public function getBlocks($month,$year){
    	$connection = db::factory('mysql');
		
		$sql = 'select *  from blocks WHERE date LIKE "'.$year.'-'.$month.'%"';
		
		return $connection->getArray($sql);
    }
    
 	public function blockDates($dates){
 		if(!is_array($dates)){
 			$data = array($dates);
 		}else{
 			$data = $dates;
 		}	
 		foreach($dates as $dt){ 			
 				$block = new Block();
 				$block->date = $dt;
	 			$block->time_from = $this->defaultTimeFrom;
	 			$block->time_to   = $this->defaultTimeTo;
	 			$block->save();
 		}
 	}   
 	
 	public function unblockDates($dates){
 		if(!is_array($dates)){
 			$data = array($dates);
 		}	
 		$data = $dates;
 		foreach($dates  as $dt){ 		
 			$blocksPerDay = $this->getBlocksPerDay(date('d',strtotime($dt)),
 									date('m',strtotime($dt)),
 									date('Y',strtotime($dt)));
 			foreach($blocksPerDay as $block){
 				$block = new Block($block['id']);
 				$block->delete();
 			}
 		}
 	}
 	
 	public function isInDb($date){
 		$this->populate(array('date'=>$date));
 		return ($this->id!=null);
 	}
 	
}
?>