<?php

include_once '../common/connect.php';

class Validator{
	
	private $val = null;
	private $date = '^\\d{1,2}/\\d{2}/\\d{4}^';
	private $integer = '/^[0-9]+$/';
	private $whiteSpace = '/\s/';
	private $alphaNumeric = '/\W/';
	public $result = null;
	
	public function __construct($array){
		if(!$this->val){
			$this->val = $array;
		}
	}
	
	public function test(){
		if(isset($this->val['date'])){
			if(!preg_match($this->date, $this->val['date']) || !preg_match($whiteSpace, $this->val['date']))
				$this->result[] = "Please enter a valid date where required";	
		}
		if(isset($this->val['spaces'])){
			if(!preg_match($this->whiteSpace, $this->val['spaces']))
				$this->result[] = "Spaces between words are not allowed";			
		}
		if(isset($this->val['numbers'])){
			if(!preg_match($this->integer, ((count($this->val['numbers']) > 0) ? $this->val['numbers'][0] : $this->val['numbers'])))
				$this->result[] = "Please enter a valid input." . 
							 ((count($this->val['numbers']) > 0) ? "Only numbers are allowed on " . $this->val['numbers'][1] . " field." : "");
		}
		if(isset($this->val['length'])){
			if(strlen($this->val['length'][1]) != $this->val['length'][0])
				$this->result[] = "Please enter the required text length" . 
							 ((count($this->val['length']) > 2) ? " on " . $this->val['length'][3] . " field." : "");
		}
		if(isset($this->val['password'])){
			if(!preg_match($this->alphaNumeric, $this->val['password']))
				$this->result[] = "Please enter a valid password format.";
		}
	}
}


/* 

//Example code

$val = new Validator(array('date' => '234/333/333', 'length' => array('myname', 3), 'password' => 'hello', 'numbers' => 
                     array('here', 'Duration'), 'spaces' => '  jk'));
$val->test();
if(!$val->result)
	echo "Everything alright";
else 
	var_dump($val->result);
	
*/

?>