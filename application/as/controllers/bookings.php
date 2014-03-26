<?php
class Bookings extends controller{
   	
	public function index($month=null,$year=null){
		$this->setData('restrict',1);
		
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
		//	$this->redirect(array('controller'=>'bookings','action'=>'index'));
		}else{
			$date = $year.'-'.$month.'-'.$day;
			$booking = new Booking();
			$data = $booking->getBookings(array('date'=>$date));
			$this->setData('data',$data);
			$this->setData('date',$date);
		}	
	}
	
	public function approve($bookerId=null){
		$this->setData('restrict',1);
		
		$email = new Email();
		$emails = $email->getAll(array('id'=>'name'),array('type'=>AppGlobal::$templateTypes['APPROVE']));
		
		if(isset($_POST['post'])){
			$booking = new Booking();
		
			if($booking->validateEmail($_POST['subject'],$_POST['preview'])){
				$emailInfo['subject'] =$_POST['subject'];
				$emailInfo['preview'] =$_POST['preview'];
				
				$booking->approveAppointment($_POST['bookerId'],$emailInfo);
				
				$booking->reset();
				$booking->populate(array('booker_id'=>$_POST['bookerId']));
				
				$this->setFlashMsg('Appointment has been approved','message-box-side ok');
	    		$this->redirect(array('controller'=>'bookings','action'=>'summary'),array(
	    													date('Y',strtotime($booking->date)),
															date('m',strtotime($booking->date)),
															date('j',strtotime($booking->date))));
			}else{
				$this->setFlashMsg('Action failed, please try again','message-box-side error');
				$this->redirect(array('controller'=>'bookings','action'=>'approve'),$booking->bookerId);
			}
		}
		
		
		$this->setData('bookerId',$bookerId);
		$this->setData('emails',$emails);
	}
	
	public function reject($bookerId=null){
		$this->setData('restrict',1);
		
		$email = new Email();
		$emails = $email->getAll(array('id'=>'name'),array('type'=>AppGlobal::$templateTypes['REJECT']));

		if(isset($_POST['post'])){
			$booking = new Booking();
		
			if($booking->validateEmail($_POST['subject'],$_POST['preview'])){
				$emailInfo['subject'] =$_POST['subject'];
				$emailInfo['preview'] =$_POST['preview'];
				
				$booking->rejectAppointment($_POST['bookerId'],$emailInfo);
				
				$booking->reset();
				$booking->populate(array('booker_id'=>$_POST['bookerId']));
				
				$this->setFlashMsg('Appointment has been approved','message-box-side ok');
	    		$this->redirect(array('controller'=>'bookings','action'=>'summary'),array(
	    													date('Y',strtotime($booking->date)),
															date('m',strtotime($booking->date)),
															date('j',strtotime($booking->date))));
			}else{
				$this->setFlashMsg('Action failed, please try again','message-box-side error');
				$this->redirect(array('controller'=>'bookings','action'=>'reject'),$booking->bookerId);
			}
		}
		
		
		$this->setData('bookerId',$bookerId);
		$this->setData('emails',$emails);
	}
		
	public function delete($bookerId,$year=null,$month=null,$day=null){
		$this->setData('restrict',1);
		
		$booking = new Booking();
		//$booking->id=$id;
		$booking->deleteBooking($bookerId);
		
		
		$this->setFlashMsg('Record has been removed','message-box-side ok');
	    $this->redirect(array('controller'=>'bookings','action'=>'summary'),array($year,$month,$day));
	}
	
	
}
?>