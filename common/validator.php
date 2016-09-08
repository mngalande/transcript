<?php

include_once '../common/connect.php';

class Validator{
	
	private $val = null;
	private $date = '^\\d{2}/\\d{2}/\\d{4}^';
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
			for($c=0; $c < count($this->val['date']); $c++){
			if(!preg_match($this->date, $this->val['date'][$c][0]) 
			    || preg_match($this->whiteSpace, $this->val['date'][$c][0]))
				$this->result[] = "Please enter a valid date" . 
				((count($this->val['date'][$c]) > 1) ? " on <b>" . 
				$this->val['date'][$c][1] . "</b> field." : ".");	
			}	
		}
		if(isset($this->val['spaces'])){
			for($c=0; $c < count($this->val['spaces']); $c++){
			if(preg_match($this->whiteSpace, $this->val['spaces'][$c][0]))
				$this->result[] = "Spaces between words are not allowed" . 
				((count($this->val['spaces'][$c]) > 1) ? " on <b>" . 
				$this->val['spaces'][$c][1] . "</b> field." : ".");	
			}	
		}
		if(isset($this->val['numbers'])){
			for($c=0; $c < count($this->val['numbers']); $c++){
			if(!preg_match($this->integer, $this->val['numbers'][$c][0]))
				$this->result[] = "Please enter a valid input. only numbers are accepted" . 
							      ((count($this->val['numbers'][$c]) > 1) ? " on <b>" . 
							        $this->val['numbers'][$c][1] . "</b> field." : ".");								
			}
		}
		if(isset($this->val['length'])){
			for($c=0; $c < count($this->val['length']); $c++){
			if(count($this->val['length'][$c]) >= 3){
			 if(strlen($this->val['length'][$c][0]) < $this->val['length'][$c][1] 
			    && $this->val['length'][$c][2] == "max")
				$this->result[] = "Blank fields are not accepted " .  //Please enter minimum text length of
				                  // $this->val['length'][$c][1] . 
							       ((count($this->val['length'][$c]) > 3) ? " on <b>" . 
							       $this->val['length'][$c][3] . "</b> field." : ".");
			 elseif(strlen($this->val['length'][$c][0]) > $this->val['length'][$c][1] 
			        && $this->val['length'][$c][2] == "min")
				    $this->result[] = "Please enter maximum text length of " . 
				    $this->val['length'][$c][1] . 
					((count($this->val['length'][$c]) > 3) ? " on <b>" . 
					$this->val['length'][$c][3] . "</b> field." : ".");			 
			} else {
				$this->result[] = "The length parameter was wrongly entered";				
			}
			}
		}
		if(isset($this->val['password'])){
			foreach($this->val['password'] as $v){
			if(!preg_match($this->alphaNumeric, $v))
				$this->result[] = "Please enter a valid password format.";				
			}
		}
	}
}


/*

//Example code

$val = new Validator(array(
			'date' => array(
						array('04/33/3333', 'optional-parameter-can-be-ommited'), 
						array('4/33/3330', 'optional-parameter-can-be-ommited'),
						array('04/33/0333', 'optional-parameter-can-be-ommited')
						), 
			'length' => array(
						 array('uuhuy', 4, 'min', 'optional-parameter-can-be-ommited'),
						 array('u', 2, 'max', 'optional-parameter-can-be-ommited')
			),  
			'numbers' => array(
                          array('here', 'optional-parameter-can-be-ommited'),
                          array('zero', 'optional-parameter-can-be-ommited'), 
                          array('wax', 'optional-parameter-can-be-ommited')
                          ), 
            'spaces' => array(
                          array('   here', 'optional-parameter-can-be-ommited'),
                          array('zero', 'optional-parameter-can-be-ommited'), 
                          array('wax', 'optional-parameter-can-be-ommited')
                          ),
            'password' => array('hello')
            ));



/*
$val->test();
if(!$val->result)
	$errors = true;
else 
	$errors = $val->result;
	
	<div>
	<?php if($errors != true){ ?>
	<div class="alert alert-danger" role="alert">
	<?php foreach($errors as $list) { ?>
		 	<?php echo $list; ?><br />
		<?php } ?>
	</div>
	<?php } ?>
	</div>
*/


/*
$val->test();
if(!$val->result)
	echo "Everything alright";
else 
	var_dump($val->result);
	
*/

?>