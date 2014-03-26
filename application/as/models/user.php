<?php
class User extends Dao {
    protected $table = 'users' ;    
    
 	
    public function login($username,$password){
    	if('md5'==Setting::$encrp){
    		$user = new User(array('username'=>$username,'password'=>md5($password)));
    	}    	
    	if($user->id!=null){
    		AppGlobal::setVar('uid',$user->id);
    		return true;
    	}
    	return false;
    }
    
    public function changePassword($uid,$password,$password2){
    	if($password!=$password2||$password==null){
    		return false;
    	}else{
    		$user = new User($uid);
    		if('md5'==Setting::$encrp){
	    		$user->password = md5($password);
	    		$user->save();
	    		return true;
    		}
    	}
    }

}
?>