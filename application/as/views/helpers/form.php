<?php
class Form extends Helper {
    
	private $fields;
	
	public function addField($field){
		$this->fields[]=$field;	
	}
	
	public function start($attributes=null){
		return '<form class="'.(isset($attributes['class'])?$attributes['class']:'form').'"'.
					' id="'.( isset($attributes['id'])?$attributes['id']:'form').'"'.
					' method="'.( isset($attributes['method'])?$attributes['method']:'POST').'"'.
					'action="'.( isset($attributes['action'])?$attributes['action']:'#').'">';
	}
	
	public function end(){
		return '</form>';
	}
	
	public function show(){
		$content='';
		foreach ($this->fields as $field){
			switch (strtolower($field['type'])) {
				case 'text':
					$content.= $this->_text($field);
					break;
				case 'textarea':
					$content.= $this->_textarea($field);
					break;
				case 'select':
					$content.= $this->_select($field);
					break;
				default:
					case 'text':
					$content.= $this->_text($field);
			}
		}
		
		return $content;
	}
	
	private function _text($field){
			return '<div>'.
					  '<label>'.(isset($field['label'])?$field['label']:$field['name']).'</label>'.
						'<input id="'.(isset($field['id'])?$field['id']:$field['name']).'"
							value="'.(isset($field['value'])?$field['value']:'').
							'" name="'.$field['name'].'" type="'.
								(isset($field['type'])?$field['type']:'text').'"/>'.				
					  '</div>';
	}
	
	public function _textarea($field){
		    return '<div>'.
					  '<label>'.(isset($field['label'])?$field['label']:$field['name']).'</label>'.
						'<textarea id="'.(isset($field['id'])?$field['id']:$field['name']).'" name="'.$field['name'].'" type="'.
		    				(isset($field['type'])?$field['type']:'text').'">'.
		    					(isset($field['value'])?$field['value']:'').
		    						'</textarea>'.				
					  '</div>';
	}
	
	public function _select($field){
		     $content = '<div>'.
					  '<label>'.(isset($field['label'])?$field['label']:$field['name']).'</label>'.
						'<select id="'.(isset($field['id'])?$field['id']:$field['name']).'" name="'.$field['name'].'">';
						foreach($field['options'] as $key=>$value){
							$extra='';
							if(isset($field['value'])){
								$extra = (($field['value']==$key)?' SELECTED ':'');
							}							
							$content.=  '<option '.$extra.'value="'.$key.'">'.$value.'</option>';
						}					
					$content.='</select></div>';
			return $content;
	}
}