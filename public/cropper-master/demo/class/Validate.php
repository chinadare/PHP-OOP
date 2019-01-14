<?php
class Validate{
	private $_passed = false,
			$_errors = array(),
			$_db     = null;

	public function __contruct(){
		$this ->_db = DB:: getinstance();

	}

	public function check($source , $items= array()){
		foreach($items as $item=> $rules){
			foreach($rules as $rule => $rule_value){
				$value = $source[$item];
				if($rule === 'name'){
					$name = $rule_value;
				}
			 if($rule === 'required' && empty($value)){

			 	$this->addError("{$name} is required");
			 }else if(!empty($value)){
			 	switch ($rule) {
			 		case 'min':
						if(strlen($value)< $rule_value){
							$this->addError("{$name} must be a minimum of {$rule_value} characters.");
						}
						break;
					
					case 'max':
						if(strlen($value)> $rule_value){
							$this->addError("{$name} must be a maximum of {$rule_value} characters.");
						}
						break;
					
					case 'matches':
						if($value != $source[$rule_value]){
							$this->addError("{$name} must match {$rule_value}.");
						}
						break;
						
					case 'tpnumber':
						$rule = '/^\d{10}$/';
			 			if(!preg_match($rule,$value) ){
							$this->addError("{$name} should contain 10 numbers");
						}
						break;
						
					case 'unique':
						$check = $this->_db->get($rule_value, array($item, '=', $value));
						if($check -> count()){
							$this->addError("{$name} already exists.");
						}
						break;
					
			 		case 'RS':
			 			$rule = '/^[0-9]* $/';
			 			if(!preg_match($rule,$value) ){
			 				$this->addError("{$rule_value}RS ");
			 			}
			 			break;
			 		
			 		default:
			 			# code...
			 			break;
			 	}
			 }

			}
		}
		if(empty($this->_errors)){
			$this->_passed = true;
		}
		return $this;
	}

	private function addError($error){
		$this->_errors[] = $error;
	}
	public function error(){
		return $this->_errors;
	}
	public function passed(){
		return $this->_passed;
	}
}