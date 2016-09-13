<?php

require_once '../common/course.class.php'; 
	//  CourseCode 	CourseVersion 	CourseName 	CreditHours 	CourseYearOffered
if(isset($_GET['pn']))
   echo Course::getCourseById($_GET['pn1'])->fetch()['CourseCode']; 
elseif(isset($_GET['pn1']))
	echo Course::getCourseById($_GET['pn2'])->fetch()['CourseVersion'];
elseif(isset($_GET['pn2']))
	echo Course::getCourseById($_GET['pn3'])->fetch()['CourseName'];
elseif(isset($_GET['pn3']))
	echo Course::getCourseById($_GET['pn4'])->fetch()['CreditHours'];
elseif(isset($_GET['pn4']))
	echo Course::getCourseById($_GET['pn5'])->fetch()['CourseYearOffered'];

