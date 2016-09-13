<?php 

require_once "../common/connect.php";

class Programmes { 
	public static function addProgramme($ProgrammeName, $EntryRequirements, $Duration)
	{
		$q = conn::db()->prepare('INSERT INTO tblProgrammes SET 
							   	  ProgrammeName = ?,
							      EntryRequirements = ?, 
							      Duration = ?
							     ');
	    $q->execute(array($ProgrammeName, $EntryRequirements, $Duration));
	    
	    return true;
	}
	
	public static function getAllProgramme(){
		return conn::query("SELECT * FROM tblProgrammes", array());
	}
	
	public static function selectProgramme($id){
		return conn::query("SELECT * FROM tblProgrammes 
		                    WHERE ProgrammeID = ?", 
		                    array($id));
	}
	
	public static function getProgrammeIdByName($id){
		return conn::query("SELECT * FROM tblProgrammes 
		                    WHERE ProgrammeName = ?", 
		                    array($id))
		                    ->fetchColumn(0);
	}
	
}