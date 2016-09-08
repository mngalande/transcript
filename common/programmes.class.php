<?php 

require "../common/connect.php";

class Programmes {
	public static function addProgramme($ProgrammeName, $EntryRequirements, $Duration)
	{
		$q = conn::db()->prepare('INSERT INTO tblprogrammes SET 
							   	        ProgrammeName = ?,
							            EntryRequirements = ?, 
							            Duration = ?
							           ');
	    $q->execute(array($ProgrammeName, $EntryRequirements, $Duration));
	    
	    return true;
	}
	
	public static function viewProgramme(){
		return conn::query("SELECT * FROM tblprogrammes", array());
	}
	
	public static function selectProgramme($id){
		return conn::query("SELECT * FROM tblprogrammes WHERE ProgrammeID = ?", array($id));
	}
	
}