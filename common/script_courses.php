<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../common/connect.php";
require_once "../common/validator.php";

$succ = false;

$val = new Validator(array(  
					'numbers' => array(
                      array($_POST['form2'], 'Course Version'),
                      array($_POST['form5'], 'Course Year Offered')
                     ),  
                     'decimal' => array(
                      array($_POST['form4'], 'Credit Hours')
                     ),
					'length' => array(
					  array($_POST['form1'], 1, 'max', 'Course Code'),
					  array($_POST['form2'], 1, 'max', 'Course Version'),
					  array($_POST['form3'], 1, 'max', 'Course Name'),
					  array($_POST['form4'], 1, 'max', 'Credit Hours'),
					  array($_POST['form5'], 1, 'max', 'Course Year Offered')
					)							
                       ));
	 $val->test();
        if(!$val->result)
			$succ = true;
		else 
			$errors = $val->result;	
		
if($succ == true){
//  CourseCode 	CourseVersion 	CourseName 	CreditHours 	CourseYearOffered
$sql = conn::update("UPDATE tblCourses SET
					 CourseCode = ?,
					 CourseVersion = ?, 	
					 CourseName = ?,
					 CreditHours = ?,
					 CourseYearOffered = ?
					 WHERE CourseCode = ?
					", 
					array($_POST['form1'], 
					      $_POST['form2'], 
						  $_POST['form3'],
						  $_POST['form4'],
						  $_POST['form5'],
						  $_POST['form1']
						  ));
						  
if($sql == true)
	echo json_encode(array(array("val"=>"Successful"))); 
} else { 
	echo json_encode(array(array("val"=>$errors)));
}