<?php

include_once 'connect.php';

class Student {
	public $registrationNumber = null;

	public function Student($registrationNumber = null) {
		$this->registrationNumber = $registrationNumber;
		//$sql = conn::db()->prepare("SELECT * FROM tblProgrammes WHERE ProgrammeID = :id");
		//$sql->execute(array(':id'=>1);
		//return $sql->fetch();
	}

	public function getRegistrationNumber() {
		return $this->getRegistrationNumber;
	}

	public static function registrationNumberExists($registrationNumber = null) {
		if ($registrationNumber == null) {
			$registrationNumber = $this->registrationNumber;
		}
		$sql = conn::db()->prepare("SELECT count(*) AS countReg FROM transcript.tblStudents WHERE RegistrationNumber = :registrationNumber");
		$sql->execute(array(':registrationNumber' => $registrationNumber));
		return $sql->fetchColumn(0);

		if ($sql->fetchColumn(0) == 0) {
			return false;
		}
		return true;
	}	
	//  
	public static function getAllStudents(){
		return conn::query("SELECT * FROM tblStudents AS st
						    INNER JOIN tblProgrammes AS pg ON
						    st.ProgrammeID = pg.ProgrammeID
						    INNER JOIN tblGradingSystems AS gs ON
						    st.GradingSystemID = gs.GradingSystemID", 
						    array());
	}
	
	public static function getStudent($id){
		return conn::query("SELECT * FROM tblStudents AS st
						    INNER JOIN tblProgrammes AS pg ON
						    st.ProgrammeID = pg.ProgrammeID
						    INNER JOIN tblGradingSystems AS gs ON
						    st.GradingSystemID = gs.GradingSystemID
						    WHERE st.RegistrationNumber = ?", 
						    array($id));
	}
}

//echo Student::registrationNumberExists('bsc/28/09');

?>