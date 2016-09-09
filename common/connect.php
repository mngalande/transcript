<?php

set_exception_handler('conn::error');

class conn 
{
	
	private static $con = null;
	
	public static function db()
	{
		if(conn::$con == null)
		{

			conn::$con = new PDO('mysql:host=localhost;dbname=transcript', 'root', '');

			conn::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			conn::$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
			conn::$con->setAttribute(PDO::ATTR_PERSISTENT, true);
			conn::$con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}
		
		return conn::$con;
	} 
	
	public static function error($e){
		die($e->getMessage() . '<br />' . $e->getTraceAsString());
	}
	
	public static function update($var, $params){
		$sql = conn::db()->prepare($var);
		$sql->execute($params);
		
		return true;
	}
	
	public static function query($var, $params)
	{
		$sql = conn::db()->prepare($var);
		$sql->execute($params);
		
		return $sql;
	}
}

/*

Examples

// remember to include on your script: require_once "../common/connect.php";

$sql = conn::update("INSERT INTO tblprogrammes SET 
					 ProgrammeID = ProgrammeID = ?", 
					 array($_POST['ProgrammeID']));
					 
if($sql)
	"Successfully updated";

$sql = conn::query("SELECT * FROM tblprogrammes 
					WHERE ProgrammeID = :ProgrammeID", 
					array(':ProgrammeID' => 1));

while($row = $sql->fetch())
	echo $row['programmename'];
*/

?>
