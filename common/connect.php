 <?php

 class conn {

	public static function db() {
		$servername = "localhost";
		$username = "root";
		$password = "personal";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=transcript", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
		    echo "Connection failed: " . $e->getMessage();
		    exit;
		}
		return $conn;
	}

}

?> 
