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
			conn::$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
			conn::$con->setAttribute(PDO::ATTR_PERSISTENT, true);
		}
		
		return conn::$con;
	} 
	
	public static function error($e){
		die($e->getMessage() . '<br />' . $e->getTraceAsString());
	}
	
	public static function query($var)
	{
		$sql = conn::db()->prepare($var['query']);
		$sql->execute($var['args']);
		
		return $sql;
	}
}

?>