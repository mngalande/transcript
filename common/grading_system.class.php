<?php 

require_once "../common/connect.php";

class GradingSystem {
	public static function getAllGradingSystems(){
		$sql = conn::db()->prepare("SELECT * FROM tblGradingSystems");
		$sql->execute();
		return $sql;
	}
}

