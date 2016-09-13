<?php 

require_once "../common/connect.php";

class Grade {
	
	public static function getAllGrades(){
		return conn::query("SELECT * FROM tblCourses", array());
	}
	
	public static function getProgramme($id){
		return conn::query("SELECT * FROM tblCourses WHERE CourseCode = ?", array($id));
	}
}