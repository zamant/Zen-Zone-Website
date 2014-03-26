<?php
class AppGlobal {
   public static $bookingStatus=array(
   		'APPROVE'=>'APPROVE',
   		'WAITING'=>'WAITING',
   		'REJECT'=>'REJECT'
   );
   
   public static $templateTypes = array(
   		'APPROVE'=>'APPROVE',
  		'REJECT'=>'REJECT',
   );
   
   public static $emailTags = array(
   		'{NAME}'=>'name',
   		'{EMAIL}'=>'email',
   		'{DATE}'=>'date',
   		'{TIME_FROM}'=>'time_from',
   		'{TIME_TO}'=>'time_to',
   		'{CONTACT}'=>'contact',
  		'{MESSAGE}'=>'message'
   );
   
   public static function deleteVar($name){
  		 if(isset($_SESSION[$name])){
   			unset($_SESSION[$name]);
   		}
   }
   
   public static function setVar($name,$value){
 		if($name!=null){
 			$_SESSION[$name]=$value;
 		}	
   }
   
   public static function getVar($name){
   		if(isset($_SESSION[$name])){
   			return $_SESSION[$name];
   		}
   		return null;
   }

}

