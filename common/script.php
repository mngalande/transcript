<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../common/connect.php";
require_once "../common/validator.php";


$succ = false;

$val = new Validator(array(  
					'numbers' => array(
                      array($_POST['form3'], 'Duration')
                     ), 
                    'spaces' => array(
                      array($_POST['form3'], 'Duration')
                    ),
					'length' => array(
					  array($_POST['form1'], 1, 'max', 'Programme Name'),
					  array($_POST['form2'], 1, 'max', 'Entry requirements'),
					  array($_POST['form3'], 1, 'max', 'Duration')
					)							
                       ));
	 $val->test();
        if(!$val->result)
			$succ = true;
		else 
			$errors = $val->result;	
		
if($succ == true){
// ProgrammeID 	ProgrammeName 	EntryRequirements 	Duration
$sql = conn::update("UPDATE tblprogrammes SET
					 ProgrammeName = ?,
					 EntryRequirements = ?, 	
					 Duration = ?
					 WHERE ProgrammeID = ?
					", 
					array($_POST['form1'], 
					      $_POST['form2'], 
						  $_POST['form3'],
						  $_POST['form4']
						  ));
						  
if($sql == true)
	echo json_encode(array(array("val"=>"<b>Successful</b>"))); 
} else {
	echo json_encode(array(array("val"=>$errors)));
}



