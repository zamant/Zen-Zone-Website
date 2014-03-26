<?php
class Booking extends Dao {
    protected $table = 'bookings' ;    
    
    public function validDate($date){
    	return $this->isDate($date);
    }
    
    public function getComing(){
    	$connection = db::factory('mysql');
		
		$sql = "select * from bookings,bookers where ";
		$qualifier = ' bookings.booker_id = bookers.id AND status ="'.AppGlobal::$bookingStatus['APPROVE'].'"ORDER BY date DESC';
		$sql.=$qualifier;
		
		
		return  $valuearray = $connection->getArray($sql);
    	
    }
    
    public function getNumberOfBookings(){
    	$connection = db::factory('mysql');
		
		$sql = "select count(*) AS numbers from bookings";
		return $connection->getArray($sql);
    }
    
    public function getNumberOfWaitings(){
    	$connection = db::factory('mysql');
		$sql = "select count(*) AS numbers from bookings WHERE status = '".AppGlobal::$bookingStatus['WAITING']."'";
		return $connection->getArray($sql);
    }
    
    public function getWaitings(){
    	$connection = db::factory('mysql');
    	$sql='SELECT *,COUNT(*) AS numbers FROM bookings WHERE status = "'.AppGlobal::$bookingStatus['WAITING'].'"  GROUP BY date ORDER BY date DESC';
    	return $connection->getArray($sql);
    }
    
    public function getBookings($conditional){
    	$connection = db::factory('mysql');
		
		$sql = "select * from bookings,bookers where ";
		$qualifier = ' bookings.booker_id = bookers.id ';
		
		foreach ($conditional as $column=>$value) {
			if (!empty($qualifier)) { 
				$qualifier .= ' and ';
			}
			$qualifier .= "`{$column}`='" . $connection->clean($value) . "' ";
		}
		
		$sql .= $qualifier;
		return  $valuearray = $connection->getArray($sql);
    }
    
    public function deleteBooking($bookerId){
    	$booking = new Booking(array('booker_id'=>$bookerId));
    	$booking->delete();
    	
    	$booker = new Booker($bookerId);
    	$booker->delete();
    	
    }
	
    public function validateEmail($subject,$content){
    	if($subject==null||$content==null){
    		return false;
    	}
    	return true;
    }
    
	public function approveAppointment($bookerId,$emailInfo){
		$this->reset();
		$this->populate(array('booker_id'=>$bookerId));
		if($this->id!=null){
			$this->status = AppGlobal::$bookingStatus['APPROVE'];
			$this->save();
			
			$this->emailBooker($bookerId,$emailInfo['subject'],$emailInfo['preview']);
		}
	}
	
	public function rejectAppointment($bookerId,$emailInfo){
		$this->reset();
		$this->populate(array('booker_id'=>$bookerId));
		if($this->id!=null){
			$this->status = AppGlobal::$bookingStatus['REJECT'];
			$this->save();
			
			$this->emailBooker($bookerId,$emailInfo['subject'],$emailInfo['preview']);
		}		
	}
	
	public function emailBooker($bookerId,$subject,$content){
		$booker = new Booker($bookerId);
		$user  = new User(AppGlobal::getVar('uid'));
		if($booker->id!=null){
			$to      = $booker->email;
			$subject = $subject;
			$message = $content;
			$headers = 'From: '.$user->email . "\r\n";
			
			$mail = Mail::factory('Phpmail');
			$mail->send($to, $subject, $message, $headers);	
		}
	}
}
?>