<?php
	require "../common/connect.php";
	require "../common/user.php";
	require "../layout/header.php";
	require "../layout/sidebar.php";
	$feedback = '';

	if(isset($_POST['submit'])){
		//check if all fields are not empty
		if(!empty($_POST['firstname']) && !empty($_POST['surname']) && !empty($_POST['username']) && !empty($_POST['usertype']) && !empty($_POST['password']) && !empty($_POST['confirmpassword'])){
			if($_POST['password'] === $_POST['confirmpassword']){
				$firstname = mysql_real_escape_string(strip_tags($_POST['firstname']));
				$surname = mysql_real_escape_string(strip_tags($_POST['surname']));
				$username = mysql_real_escape_string(strip_tags($_POST['username']));
				$usertype = mysql_real_escape_string(strip_tags($_POST['usertype']));
				$password = mysql_real_escape_string(strip_tags($_POST['password']));

				if(User::usernameIsAvailable($username)){
					$user = new User();
					if($user->createUser($firstname, $surname, $username, $usertype, $password)){
						//log the action
						$feedback = "<font color='green'>New user successfully created!</font>";
					}
					else{
						$feedback = "<font color='red'>There was a problem creating the new user</font>";
					}
				}
				else{
					$feedback = "<font color='red'>The username is already taken</font>";
				}
			}
			else{
				$feedback = "<font color='red'>Passwords do not match</font>";
			}
		}
		else{
			$feedback = "<font color='red'>Please fill in all the fields</font>";
		}
	}
?>

<div class='panel panel-primary'>
	<div class='panel-heading'>
		<h2 class='panel-title'>Create New User</h3>
	</div>
	<div class='panel-body'>
		<p class='col-sm-offset-1'><?php echo $feedback ?></p>
		<form method="POST" action="adduser.php" accept-charset="UTF-8" class="form-horizontal">
			<div class='form-group'>
				<label for='firstname'  class='col-sm-1 control-lable'>Firstname</label>
				<div class='col-sm-6'>
					<input type='text' name='firstname' value="<?php if(isset($_POST['firstname']) && $feedback != "<font color='green'>New user successfully created</font>"){ echo $_POST['firstname']; } ?>" id='firstname' placeholder='Firstname' class='form-control'>
				</div>
			</div>

			<div class='form-group'>
				<label for='surname'  class='col-sm-1'>Surname</label>
				<div class='col-sm-6'>
					<input type='text' name='surname' value="<?php if(isset($_POST['surname']) && $feedback != "<font color='green'>New user successfully created</font>"){ echo $_POST['surname']; } ?>" id='surname' placeholder='Surname' class='form-control'>
				</div>
			</div>

			<div class='form-group'>
				<label for='username'  class='col-sm-1'>Username</label>
				<div class='col-sm-6'>
					<input type='text' name='username' value="<?php if(isset($_POST['username']) && $feedback != "<font color='green'>New user successfully created</font>"){ echo $_POST['username']; } ?>" id='username' placeholder='Username' class='form-control'>
				</div>
			</div>

			<div class='form-group'>
				<label for='usertype'  class='col-sm-1'>User Type</label>
				<div class='col-sm-6'>
					<select class='form-control' name='usertype'>
						<option value='data entry clerk'>Data Entry Clerk</option>
						<option value='validator'>Validator</option>
						<option value='administrator'>Administrator</option>
			      	</select>
				</div>
			</div>

			<div class='form-group'>
				<label for='password'  class='col-sm-1'>Password</label>
				<div class='col-sm-6'>
					<input type='password' name='password' id='password' class='form-control'>
				</div>
			</div>

			<div class='form-group'>
				<label for='confirmpassword'  class='col-sm-1'>Confirm Password</label>
				<div class='col-sm-6'>
					<input type='password' name='confirmpassword' id='confirmpassword' class='form-control'>
				</div>
			</div>
			
			<div class='form-group'>
				<div class='col-sm-offset-1 col-sm-6'>
					<input type='submit' name='submit' value='Create User' class='btn btn-default'/>
					<input type='reset' value='Clear' class='btn btn-default' />
				</div>
			</div>
		</form>
	</div>
</div>
<?php
	require "../layout/footer.php";
?>