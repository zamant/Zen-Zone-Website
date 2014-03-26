<?php 
/**
*@author  			The-Di-Lab
*@email   			thedilab@gmail.com
*@website 			www.the-di-lab.com
*@version           1.0
**/
class Validator {

        /**
         * Constructor
         */
        public function __construct(){}

        /**
         * Destructor
         */
        public function __destruct(){}

        /********************* PROPERTY ********************/

        /**
         * Description
         *
         * @access private
         * @var type $_private_property
         */
        private $_private_property;

        /**
         * Description
         *
         * @access protected
         * @var type
         */
        protected $protected_property;
        
        /**
         * Description
         *
         * @access public
         * @var type
         */
        public $public_property;

        /********************* PRIVATE *********************/

        /**
         * Method description
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              private
         * @param              type $parameter
         * @return               type
         */
        private function privateMethod($parameter){}
        
        /********************* PROTECTED *********************/

        /**
         * Method description
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              protected
         * @param               type $parameter
         * @return              type
         */
        protected function protectedMethod($parameter){}

        /********************* PUBLIC **********************/

        /**
         * Method validate an email address
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              public
         * @param               string $parameter
         * @return              bool
         */
        public function isEmail($parameter){
        	if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$parameter)){
        		return true;
        	}
        	return false;
        }
        
        /**
         * Method validate a number
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              public
         * @param               string $parameter
         * @return              bool
         */
        public function isNumber($parameter){
        	if(is_numeric ($parameter)){
        		return true;
        	}
        	return false;
        }

        /**
         * Method validate an url
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              public
         * @param               string $parameter
         * @return              bool
         */
        public function isUrl($parameter){
        	if(preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $parameter)){
        		return true;
        	}
        	return false;
        }
        
        /**
         * Method validate a date
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              public
         * @param               string $parameter
         * @return              bool
         */
        public function isDate($parameter){
        	$stamp = strtotime( $parameter );
 
		  	if (!is_numeric($stamp)) {
		     	return false;
		  	}
		  	$month = date( 'm', $stamp );
		  	$day   = date( 'd', $stamp );
		  	$year  = date( 'Y', $stamp );
		 
		  	if (checkdate($month, $day, $year)){
		     return true;
		  	}
		 
		  	return false; 
        }  
	
        /**
         * Method validate an timeStrnig ('00:00:00')
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              public
         * @param               string $parameter
         * @return              bool
         */        
		public function validTimeString($timeString){    	 
		    if (preg_match("/^([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $timeString)){ 
		        return true;
		    } 
	    	return false;
    	}
    	
        /**
         * Method validate an timeStrnig ('00:00:00')
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              public
         * @param               string $parameter ('00:00:00')
         * @param               string $parameter ('10:00:00')
         * @return              bool
         */   		
	    public function validTimeDuration($timeFrom,$timeTo){
	    	if($timeFrom!=null
	    		&&$timeTo!=null
	    		 &&$this->validTimeString($timeFrom)
	    		 	&&$this->validTimeString($timeTo)
	    				&&(strtotime($timeFrom)<strtotime($timeTo))){
	    		return true;
	    	}
	    	return false;
	    }
}
?>