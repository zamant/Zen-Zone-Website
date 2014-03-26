<?php
class Emails extends controller{
   	
	public function index($month=null,$year=null){
			$this->setData('restrict',1);
		
			$email = new Email();
			$data = $email->getAll();
			$this->setData('data',$data);
	}
	
	public function template($bookerId=null,$emailId=null){
			$this->setData('restrict',1);
			
			$content='';
			if(is_numeric($bookerId)&&is_numeric($emailId)){
				$booking = new Booking();
				$thisBooking = current($booking->getBookings(array('booker_id'=>$bookerId)));
				$email = new Email($emailId);
				$thisEmail = ($email->values);
				$content = $thisEmail['content'];
				foreach(AppGlobal::$emailTags as $tagTemp=>$tagDb){
					$content = str_replace($tagTemp,$thisBooking[$tagDb],$content);
				}
			}
			$this->setData('content',$content);
	}
	
	public function add(){
			$this->setData('restrict',1);
			
		if(isset($_POST['post'])){
			if(Setting::$demo){
				$this->setFlashMsg('Demo mode, operation is disabled','message-box-side error');		
				$this->redirect(array('controller'=>'emails','action'=>'index'));
			}
			
			$email = new Email();			
			$email->name=$_POST['name'];
			$email->type=$_POST['type'];
			$email->content=$_POST['content'];	
			if($email->valid()){
				$email->save();		
				$this->setFlashMsg('Record has been saved','message-box-side ok');		
				$this->redirect(array('controller'=>'emails','action'=>'index'));
			}else{
				$this->setFlashMsg('Please fill in required fields','message-box-side error');
			}
		}
	}
	
	public function edit($id=null){
			$this->setData('restrict',1);
			
		if(isset($_POST['post'])){
			if(Setting::$demo){
				$this->setFlashMsg('Demo mode, operation is disabled','message-box-side error');		
				$this->redirect(array('controller'=>'emails','action'=>'index'));
			}
			
			$email = new Email();
			$email->id=$_POST['id'];
			$email->name=$_POST['name'];
			$email->type=$_POST['type'];
			$email->content=$_POST['content'];	
			if($email->valid()){
				$email->save();				
				$this->setFlashMsg('Record has been saved','message-box-side ok');
				$this->redirect(array('controller'=>'emails','action'=>'index'));
			}else{
				$this->setFlashMsg('Please fill in required fields','message-box-side error');
				$this->redirect(array('controller'=>'emails','action'=>'edit'),$_POST['id']);
			}
		}else{
			$data = new Email($id);
			$this->setData('data',$data);
		}
	}
	
	public function delete($id){
		$this->setData('restrict',1);
		
		if(Setting::$demo){
			$this->setFlashMsg('Demo mode, operation is disabled','message-box-side error');		
			$this->redirect(array('controller'=>'emails','action'=>'index'));
		}else{
			$email = new Email();
			$email->id=$id;
			$email->delete();
			
			$this->setFlashMsg('Record has been removed','message-box-side ok');
			$this->redirect(array('controller'=>'emails','action'=>'index'));
		}
	}

	
}
?>