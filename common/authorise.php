<?php
	@session_start();
	//get user type
	$usertype = strtolower($_SESSION['usertype']);

	//get request url
	$url = strtolower($_SERVER['REQUEST_URI']);

	//extract the folder name from url
	$urlchunks = explode('/', $url);

	//pare folder name with folder //grant or deny access
	if(in_array($usertype, $urlchunks) or $usertype == 'admin'){

	}
	else{
		$_SESSION['logout'] = "<font color=red>You have been logged out because of an illegal activity.</font>";

		header("Location: ../logout.php");
	}

?>