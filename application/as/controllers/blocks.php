<?php
class Blocks extends controller{
   	
	public function index($month=null,$year=null){
		$this->setData('restrict',1);
		
		if(isset($_POST['post'])){
			if(isset($_POST['checkbox_date'])){
				$block = new Block();
				if(strtolower($_POST['action_type'])=='block'){
					//print_r($_POST['checkbox_date']);
					$block->blockDates($_POST['checkbox_date']);
				}else{
					$block->unblockDates($_POST['checkbox_date']);
				}
			}
		}
		
		
		//get blocks
		if(null==($year))
			$year =  date("Y",time());	

		if(null==($month))
			$month = date("m",time());
			
		$block = new Block();
		$blocks = $block->getBlocks($month,$year);
		$this->setData('blocks',$blocks);
		
		
		$this->setData('year',$year);
		$this->setData('month',$month);
	}
	
	public function summary($year=null,$month=null,$day=null) {
		$this->setData('restrict',1);
		
		//echo $year.$month.$day;
		if(null==$year||null==$month||null==$day){
			$this->redirect(array('controller'=>'blocks','action'=>'index'));
		}else{
			$date = $year.'-'.$month.'-'.$day;
			$blocks = new Block();
			$data = $blocks->getBlocksPerDay($day,$month,$year);
			$this->setData('data',$data);
			$this->setData('date',$date);
		}	
	}

	public function add($date=null) {
		$this->setData('restrict',1);
		if(isset($_POST['post'])){			
			$block = new Block();			
			$block->time_from = $_POST['from-time-hour'].':'.$_POST['from-time-min'].':'.$_POST['from-time-sec'];
			$block->time_to = $_POST['to-time-hour'].':'.$_POST['to-time-min'].':'.$_POST['to-time-sec'];
			$block->date =  $_POST['date'];
			if($block->isDate($block->date)&&$block->validTimeDuration($block->time_from,$block->time_to)){
				$block->save();
				$this->setFlashMsg('Record has been saved','message-box-side ok');		
			}else{
				$this->setFlashMsg('Please enter valid time','message-box-side error');
			}
			
			$this->redirect(array('controller'=>'blocks','action'=>'summary'),array(
															date('Y',strtotime($_POST['date'])),
															date('m',strtotime($_POST['date'])),
															date('d',strtotime($_POST['date']))));
		}		
		$this->setData('date',$date);
	}
	
	public function delete($id,$date){
		$this->setData('restrict',1);		
		$block = new Block();
		$block->id=$id;
		$block->delete();			
		$this->setFlashMsg('Record has been removed','message-box-side ok');
		
		$this->redirect(array('controller'=>'blocks','action'=>'summary'),array(
															date('Y',strtotime($date)),
															date('m',strtotime($date)),
															date('d',strtotime($date))));
	}
}
?>