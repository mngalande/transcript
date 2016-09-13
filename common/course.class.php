<?php

include_once '../common/connect.php';

class Course {
	//  CourseCode 	CourseVersion 	CourseName 	CreditHours 	CourseYearOffered
	public static function getAllCourses(){
		return conn::query("SELECT * FROM tblCourses",
		                   array());
	}
	
	public static function getCourseById($id){
		return conn::query("SELECT * FROM tblCourses WHERE CourseCode = ?",
		                   array($id));
	}
	
}

?>