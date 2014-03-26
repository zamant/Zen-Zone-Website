<?php
class Booker extends Dao{
    protected $table = 'bookers' ;    
	
    public function validBooker(){
    	if($this->name==null
    		||$this->email==null
    			||$this->contact==null
    				||$this->message==null){
    					return false;
    				}
    	
    				
    	if(!$this->checkPhoneNumber($this->contact)){
    		return false;
    	}
    	
    	if(!$this->isEmail($this->email)){
    		return false;
    	}
    	
    	
    	return true;
    }
    
    public function isBlocked($date,$from,$to){
    	$block = new Block(array('date'=>$date));
    	return $block->id!=null;
    }
    
    public function checkPhoneNumber($number){ 
    	if( $this->isNumber($number)) {
			return true;
		}
		return false;
    }
   
    public function createBooking($data){
    	unset($data['post']);
		unset($data['x']);
		unset($data['y']);
		foreach($data as $index=>$value){
			$this->$index=$value;
		}
    
    	if($this->validBooker()){
    		$block = new Block();
			//create booking
			$booking = new Booking();
			$booking->date = isset($_SESSION['date'])?$_SESSION['date']:null;
			$booking->time_from = isset($_SESSION['time_from'])?$_SESSION['time_from']:null;
			$booking->time_to = isset($_SESSION['time_to'])?$_SESSION['time_to']:null;
			$booking->status = AppGlobal::$bookingStatus['WAITING'];
			//make sure session is not deleted when saving
			if($booking->validTimeDuration($booking->time_from ,$booking->time_to)
				&&$booking->validDate($booking->date)
					&&!$block->isBlock($booking->date,$booking->time_from ,$booking->time_to)){
						//validate before creating the booker
						$this->save();	
						$booking->booker_id =$this->id;
						
						$booking->save();
						
						//email admin 
						$msg  = 'Name: '.$this->name."\r\n";
						$msg .= 'Email: '.$this->email."\r\n";
						$msg .= 'Contact: '.$this->contact."\r\n";
						$msg .= 'Message: '.$this->message."\r\n";
						$this->_emailAdmin($msg);
						return true;
			}			
    	}
    	return false;
    }
    
    private function _emailAdmin($msg){
    	    $admin  = new User(AppGlobal::getVar('uid'));
    		$to= $admin->email;
			$subject = 'Booking';
			$message = $msg;
			$headers = 'From: donotreply@thedilab.com'. "\r\n";
			
			$mail = Mail::factory('Phpmail');
			$mail->send($to, $subject, $message, $headers);	
    }
}
?>