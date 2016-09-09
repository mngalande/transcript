<?php

require_once '../common/grade.class.php';

//  CourseCode 	CourseVersion 	CourseName 	CreditHours 	CourseYearOffered
if(isset($_GET['pn']))
   echo Grade::getProgramme($_GET['pn1'])->fetch()['CourseCode']; 
elseif(isset($_GET['er']))
	echo Grade::getProgramme($_GET['er1'])->fetch()['CourseVersion'];
elseif(isset($_GET['d1']))
	echo Grade::getProgramme($_GET['d1'])->fetch()['CourseName'];
elseif(isset($_GET['e']))
	echo Grade::getProgramme($_GET['e'])->fetch()['CreditHours'];
elseif(isset($_GET['f']))
	echo Grade::getProgramme($_GET['f'])->fetch()['CourseYearOffered'];