<?php
	require "../common/connect.php";
	require "../common/user.php";
	require "../layout/header.php";
	require "../layout/sidebar.php";


	$users = User::getusers();
	if($users){
		echo "
		<table class='table table-stripped'>
			<thead>
				<tr>
					<th>First Name</th>
					<th>Surname</th>
					<th>Username</th>
					<th>User Type</th>
					<th>Edit User</th>
					<th>Delete User</th>
				</tr>
			</thead>
			<tbody>
			
			</tbody>
		</table>";
	}
	else{
		echo "There are no users to display";
	}




	require "../layout/footer.php";
?>