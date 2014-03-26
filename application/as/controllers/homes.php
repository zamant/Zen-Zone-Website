<?php
class Homes extends controller{
   	
	public function index($month=null,$year=null){ 
		//save date
		if(isset($_POST['post'])){
			$booking = new Booking(); 
			$booking->date = isset($_POST['radio_date'])?$_POST['radio_date']:null;
			if($booking->validDate($booking->date)){
				$_SESSION['date']=$_POST['radio_date'];
				$this->redirect(array('controller'=>'homes','action'=>'step_two'));
			}else{
				$this->setFlashMsg('Please choose a correct date','message-box error');
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
	
	public function step_two(){		
		$block = new Block();
		//save time
		if(isset($_POST['post'])){
			$booking = new Booking();
			$booking->time_from = $_POST['from-time-hour'].':'.$_POST['from-time-min'].':'.$_POST['from-time-sec'];
			$booking->time_to = $_POST['to-time-hour'].':'.$_POST['to-time-min'].':'.$_POST['to-time-sec'];
					
			if($booking->validTimeDuration($booking->time_from,$booking->time_to)
			   &&!$block->isBlock($_SESSION['date'],$booking->time_from,$booking->time_to)){
				$_SESSION['time_from']=$booking->time_from;
				$_SESSION['time_to']=$booking->time_to;	
				$this->redirect(array('controller'=>'homes','action'=>'step_three'));
			}else{
				$this->setFlashMsg('Please enter valid time','message-box error');
			}
		}
		
		$date = $_SESSION['date'];
		$blocks = $block->getBlocksPerDay(date('d',strtotime($date)),
										  date('m',strtotime($date)),
										  date('Y',strtotime($date)));
		
		$this->setData('blocks',$blocks);
		$this->setData('date',$date);		
	}
	
	public function step_three(){
		//save booking
		if(isset($_POST['post'])){
				$booker = new Booker();		
				//create booker
				if($booker->createBooking($_POST)){	
					$this->setFlashMsg('Your booking is submitted, please check your email for confirmation.','message-box ok');
					$this->redirect(array('controller'=>'homes','action'=>'index'));
				}else{
					$this->setFlashMsg('Please enter valid information','message-box error');
				}
		}
	}
	
	public function index_ajax($month=null,$year=null){
		//save date
		if(isset($_POST['post'])){
			$booking = new Booking();
			$booking->date = isset($_POST['radio_date'])?$_POST['radio_date']:null;
			if($booking->validDate($booking->date)){
				$_SESSION['date']=$_POST['radio_date'];
				$this->redirect(array('controller'=>'homes','action'=>'step_two_ajax'));
			}else{
				$this->setFlashMsg('Please choose a correct date','message-box error');
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
	
	public function step_two_ajax(){	
		$block = new Block();	
		//save time
		if(isset($_POST['post'])){
			$booking = new Booking();			
			$booking->time_from = $_POST['from-time-hour'].':'.$_POST['from-time-min'].':'.$_POST['from-time-sec'];
			$booking->time_to = $_POST['to-time-hour'].':'.$_POST['to-time-min'].':'.$_POST['to-time-sec'];
			if($booking->validTimeDuration($booking->time_from,$booking->time_to)
				&&!$block->isBlock($_SESSION['date'],$booking->time_from,$booking->time_to)){
				$_SESSION['time_from']=$booking->time_from;
				$_SESSION['time_to']=$booking->time_to;
				$this->redirect(array('controller'=>'homes','action'=>'step_three_ajax'));
			}else{
				$this->setFlashMsg('Please enter valid time','message-box error');
			}
		}
		
		$date = $_SESSION['date'];
		$blocks = $block->getBlocksPerDay(date('d',strtotime($date)),
										  date('m',strtotime($date)),
										  date('Y',strtotime($date)));
		
		$this->setData('blocks',$blocks);
		$this->setData('date',$date);
		
	}
	
	public function step_three_ajax(){
		//save booking
		if(isset($_POST['post'])){
				$booker = new Booker();		
				//create booker
				if($booker->createBooking($_POST)){
					$this->setFlashMsg('Your booking is submitted, please check your email for confirmation.','message-box ok');
					$this->redirect(array('controller'=>'homes','action'=>'index_ajax'));
				}else{
					$this->setFlashMsg('Please enter valid information','message-box error');
				}
		}
	}
}
?>