<?php 

require_once "../common/connect.php";

class GradingSystem {
	public static function getAllGradingSystems(){
		$sql = conn::db()->prepare("SELECT * FROM tblGradingSystems");
		$sql->execute();
		return $sql;
	}
	// GradingSystemName
	public static function getGradingSystemByName($id){
		return conn::query("SELECT * FROM tblGradingSystems AS gs
						    INNER JOIN tblStudents AS st ON
						    gs.GradingSystemID = st.GradingSystemID
						    WHERE gs.GradingSystemName = ?",
						    array($id))->fetchColumn(0);
	}
}

