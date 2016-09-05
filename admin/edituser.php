<?php
	require "../common/connect.php";
	require "../layout/header.php";
	require "../layout/sidebar.php";
?>

<form action="" method="">
	<div class='form-group'>
		<lable for='surname'  class='col-md-1'>Surname</lable>
		<div class='col-md-6'>
			<input type='text' name='surname' value="" id='surname' placeholder='surname' class='form-control'>
		</div>
	</div>
	<div class='form-group'>
		<lable for='username'  class='col-md-1'>Username</lable>
		<div class='col-md-6'>
			<input type='text' name='username' value="" id='username' placeholder='Username' class='form-control'>
		</div>
	</div>
</form>

<?php
	require "../layout/footer.php";
?>