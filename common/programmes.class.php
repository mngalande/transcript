<?php 

require_once "../common/connect.php";

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
	
	public static function getAllProgramme(){
		return conn::query("SELECT * FROM tblProgrammes", array());
	}

	public static function getAllProgrammes(){
		$sql = conn::db()->prepare("SELECT * FROM tblProgrammes");
		$sql->execute();
		return $sql;
	}
	
	public static function selectProgramme($id){
		return conn::query("SELECT * FROM tblprogrammes WHERE ProgrammeID = ?", array($id));
	}
	
}

