<?php
	session_start();
	if(isset($_SESSION['username']) && isset($_SESSION['usertype'])){
	
	}
	else{
		header("Location: ../index.php");
	}

?>