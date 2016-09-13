<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../common/connect.php";
require_once "../common/validator.php";
require_once "../common/grading_system.class.php";
require_once "../common/programmes.class.php";
require_once "../common/student.class.php";

$succ = false;
$flag = false;
$flag2 = false;
$flag3 = false;

$val = new Validator(array(  
					'numbers' => array(
                      array($_POST['form4'], 'EnterYear'),
                      array($_POST['form10'], 'AwardYear')
                     ), 
					 'decimal' => array(
                      array($_POST['form8'], 'CummulativeGPA')
                     ),
					'length' => array(
					  array($_POST['form1'], 1, 'max', 'RegistrationNumber'),
					  array($_POST['form2'], 1, 'max', 'Title'),
					  array($_POST['form3'], 1, 'max', 'StudentName'),
					  array($_POST['form4'], 4, 'max', 'EnterYear'),
					  array($_POST['form5'], 1, 'max', 'ProgrammeID'),
					  array($_POST['form6'], 1, 'max', 'GradingSystemID'),
					  array($_POST['form7'], 1, 'max', 'EntryType'),
					  array($_POST['form8'], 1, 'max', 'CummulativeGPA'),
					  array($_POST['form9'], 1, 'max', 'Award'),
					  array($_POST['form10'], 4, 'max', 'Award Year'),
					  array($_POST['form11'], 1, 'max', 'Sex')
					)							
                       ));
	 $val->test();
        if(!$val->result)
			$succ = true;
		else 
			$errors = $val->result;	
		
if($succ == true){ 

if(Programmes::getProgrammeIdByName($_POST['form5']) != ""){
	$flag = true;
	$programmeId = Programmes::getProgrammeIdByName($_POST['form5']);
}
if(GradingSystem::getGradingSystemByName($_POST['form6']) != ""){
	$flag2 = true;
	$gsID = GradingSystem::getGradingSystemByName($_POST['form6']);
}
if(Student::registrationNumberExists($_POST['form1'])){
	$flag3 = true;
}
	
if($flag3 && $flag2 && $flag){

try {
$sql = conn::db()->prepare("UPDATE tblStudents SET
					 		RegistrationNumber = ?, 	
					 		StudentName = ?,
					 		Title = ?,
					 		EnterYear = ?,
					 		ProgrammeID = ?,
					 		GradingSystemID = ?,
						 	EntryType = ?,
					 		CummulativeGPA = ?,
					 		Award = ?,
							AwardYear = ?,
					 		Sex = ?
					 		WHERE RegistrationNumber = ?"); 
	  $sql->execute(array($_POST['form1'], 
					      $_POST['form2'], 
						  $_POST['form3'],
						  $_POST['form4'], 
					      $programmeId,
					      $gsID, 
						  $_POST['form7'],
						  $_POST['form8'], 
						  $_POST['form9'],
						  $_POST['form10'],
						  $_POST['form11'],
						  $_POST['form1']
						  ));

if($sql == true)
	echo json_encode(array(array("val"=>"Successful")));  
} catch(PDOException $e){
	echo json_encode(array(array("val"=>$e->getMessage())));
}
} else {
	$ar[] = "Please ensure that your input on ProgrammeID and " .
	        "GradingSystemID and RegistrationNumber is correct";
	echo json_encode(array(array("val" => $ar)));
}

} else {
	echo json_encode(array(array("val"=>$errors)));
} 



