<?php
/**
*@author  				The-Di-Lab
*@email   				thedilab@gmail.com
*@website 				www.the-di-lab.com
*@version              1.0
**/
class Time {

        /**
         * Constructor
         */
        public function __construct(){
        	$this->_meta['instance']='time';
        	$this->_meta['class']='time';
        }

      
        /********************* PROPERTY ********************/

        /**
         * Description
         *
         * @access private
         * @var type $_private_property
         */
        private $_meta;

        /********************* PRIVATE *********************/

        /**
         * Create a hour selectbox
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              private
         * @param              type $parameter
         * @return               type
         */
        private function _hour($currentTime=false){
        	return $this->_selectbox(0,23,false,$this->_meta['instance'].'-'.'time-hour',
        										$this->_meta['instance'].'-'.'time-hour',
        										$this->_meta['class']);
        }

        /**
         * Create a min selectbox
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              private
         * @param              type $parameter
         * @return               type
         */
        private function _min($currentTime=false){
        	return $this->_selectbox(0,59,false,$this->_meta['instance'].'-'.'time-min',
        									    $this->_meta['instance'].'-'.'time-min',
        									    $this->_meta['class']);
        }
        
        /**
         * Create a sec selectbox
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              private
         * @param              type $parameter
         * @return               type
         */
        private function _sec($currentTime=false){
        	return $this->_selectbox(0,59,false,$this->_meta['instance'].'-'.'time-sec',
        										$this->_meta['instance'].'-'.'time-sec',
        										$this->_meta['class']);
        }
        
        /**
         * Method description
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              private
         * @param              type $parameter
         * @return               type
         */
        private function _selectbox($start,$end,$currentTime=false,$id=false,$name=false,$class=false){
        	$select = '<select class="'.$class.'" id="'.$id.'" name="'.$name.'">';
        	for($i=$start;$i<=$end;$i++){
        		$extra='';
        		$option='<option id="'.$id.'-'.sprintf("%02d", $i).'" value="'.sprintf("%02d", $i).'">'.
        					sprintf("%02d", $i).'</option>';
        		
        		$select.=$option;
        	}
        	$select.='</select>';
        	return $select;
        }        
       
        /********************* PUBLIC **********************/

        /**
         * Method description
         *
         * @author              The-Di-Lab <thedilab@gmail.com>
         * @access              public
         * @param               type $parameter
         * @return               type
         */
        public function show($meta=array()){        
        	$this->_meta=array_merge($this->_meta,$meta);	
        	return $this->_hour().$this->_min().$this->_sec();
        }

}