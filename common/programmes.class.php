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
	public static function getProgrammes() {
		$q = conn::db()->prepare('SELECT distinct Programme from transcript.tblProgrammes');
	}
	
}