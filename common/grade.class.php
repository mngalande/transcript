<?php 

require_once "../common/connect.php";

class Grade {
	
	public static function getAllGrades(){
		return conn::query("SELECT * FROM tblcourses", array());
	}
	
	public static function getProgramme($id){
		return conn::query("SELECT * FROM tblcourses WHERE CourseCode = ?", array($id));
	}
	
}