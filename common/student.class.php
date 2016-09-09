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
}

//echo Student::registrationNumberExists('bsc/28/09');

?>