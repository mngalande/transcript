<?php
	require "../common/access.php";
	require "../common/connect.php";
	require "../common/user.php";

if(isset($_POST['username'])){
	$user = new User($_POST['username']);
	$user->deleteUser();
}
else{
	echo 'user not found';
}

?>