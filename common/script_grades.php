<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../common/connect.php";
require_once "../common/validator.php";

$succ = false;

$val = new Validator(array(  
					'numbers' => array(
                      array($_POST['form2'], 'Course Version')
                     ), 
					'length' => array(
					  array($_POST['form2'], 1, 'max', 'Course Version'),
					  array($_POST['form3'], 1, 'max', 'Course Name'),
					  array($_POST['form4'], 1, 'max', 'Course Hours'),
					  array($_POST['form1'], 1, 'max', 'Credit Code')
					)							
                       ));
	 $val->test();
        if(!$val->result)
			$succ = true;
		else 
			$errors = $val->result;	
		
if($succ == true){ 
//  CourseCode 	CourseVersion 	CourseName 	CreditHours 	CourseYearOffered 

$sql = conn::update("UPDATE tblcourses SET
					 CourseVersion = ?,
					 CourseName = ?, 	
					 CreditHours = ?
					 WHERE CourseCode = ?
					", 
					array($_POST['form2'], 
					      $_POST['form3'], 
						  $_POST['form4'],
						  $_POST['form1']
						  ));
						  
if($sql == true)
	echo json_encode(array(array("val"=>"<b>Successful</b>")));  
} else {
	echo json_encode(array(array("val"=>$errors)));
} 



