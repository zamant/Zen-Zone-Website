<?php
class Users extends controller{
   	
	public function index(){
		$this->setData('restrict',1);
		
		$booking = new Booking();
		$numOfBookings = $booking->getNumberOfBookings();
		$numOfBookings = $numOfBookings[0]['numbers'];	
		
		$numOfWaiting  = $booking->getNumberOfWaitings();
		$numOfWaiting  =$numOfWaiting[0]['numbers'];
		
		$waitings = $booking->getWaitings();
		$comings  = $booking->getComing();
		
		
		$this->setData('comings',$comings);
		$this->setData('numOfBookings',$numOfBookings);
		$this->setData('numOfWaiting',$numOfWaiting);
		$this->setData('waitings',$waitings);
		
	}
	
	public function login(){
		if(isset($_POST['post'])){
			$user = new User();
			if($user->login($_POST['username'],$_POST['password'])){
				$this->redirect(array('controller'=>'users','action'=>'index'));
			}else{
				$this->setFlashMsg('Invalid Username or Password','message-box error');
			}
		}
	}
	
	public function logout(){
		AppGlobal::deleteVar('uid');
		$this->redirect(array('controller'=>'users','action'=>'login'));
	}
	
	public function settings(){
		$this->setData('restrict',1);
		
		$uid = AppGlobal::getVar('uid');
		
		if(isset($_POST['post'])){
			if(Setting::$demo){
				$this->setFlashMsg('Demo mode, operation is disabled','message-box-side error');
			}else if('e'==$_POST['action']){
				$user = new User($uid);
				if($user->isEmail($_POST['email'])){
					$user->email = $_POST['email'];
					$user->save();
					$this->setFlashMsg('Email address has been updated','message-box ok');
				}else{
					$this->setFlashMsg('Invalid email address','message-box error');
				}
			}else if('p'==$_POST['action']){
				$user = new User($uid);
				if($user->changePassword($uid,$_POST['password'],$_POST['password2'])){
					$this->setFlashMsg('Password has been updated','message-box ok');
				}else{
					$this->setFlashMsg('Please try again','message-box error');
				}
			}
		}
		$user = new User($uid);
		$this->setData('email',$user->email);
	}
}
?>