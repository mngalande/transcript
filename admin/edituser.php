<?php
	require "../common/connect.php";
	require "../common/user.php";
	require "../layout/header.php";
	require "../layout/sidebar.php";
	
	$oldusername = '';
	if(isset($_GET['edituser'])){
		$oldusername = mysql_real_escape_string(strip_tags($_GET['edituser']));
		if(User::userExists($oldusername)){
			$user = new User($oldusername);
		}
		else{
			header("Location: users.php");
		}
	}
	$feedback = '';

	if(isset($_POST['submit'])){
		//check if all fields are not empty
		if(!empty($_POST['firstname']) && !empty($_POST['surname']) && !empty($_POST['username']) && !empty($_POST['usertype'])  && !empty($_POST['oldusername'])){
			$oldusername = mysql_real_escape_string(strip_tags($_POST['oldusername']));
			if(User::userExists($oldusername)){
				$firstname = mysql_real_escape_string(strip_tags($_POST['firstname']));
				$surname = mysql_real_escape_string(strip_tags($_POST['surname']));
				$username = mysql_real_escape_string(strip_tags($_POST['username']));
				$usertype = mysql_real_escape_string(strip_tags($_POST['usertype']));
				
				if($username == $oldusername){
					$user = new User();

					if($user->updateUser($firstname, $surname, $username, $oldusername, $usertype)){
						//log the action
						header("Location: users.php");
						$feedback = "<font color='green'>New user successfully created!</font>";
					}
					else{
						$feedback = "<font color='red'>There was a problem updating the selected user</font>";
					}
				}
				elseif(User::usernameIsAvailable($username)){
					$user = new User();

					if($user->updateUser($firstname, $surname, $username, $oldusername, $usertype)){
						//log the action
						header("Location: users.php");
						$feedback = "<font color='green'>New user successfully created!</font>";
					}
					else{
						$feedback = "<font color='red'>There was a problem updating the selected user</font>";
					}	
				}
				else{
					$feedback = "<font color='red'>The username is already taken</font>";
				}
			}
			else{
				header("Location: users.php");
			}
		}
		else{
			$feedback = "<font color='red'>Please fill in all the fields</font>";
		}
	}

?>

<div class='panel panel-primary'>
	<div class='panel-heading'>
		<h2 class='panel-title'>Edit User</h3>
	</div>
	<div class='panel-body'>
		<p class='col-sm-offset-1'><?php echo $feedback ?></p>
		<form method="POST" action="edituser.php" accept-charset="UTF-8" class="form-horizontal">
			<div class='form-group'>
				<label for='firstname'  class='col-sm-1 control-lable'>Firstname</label>
				<div class='col-sm-6'>
					<input type='text' name='firstname' value="<?php echo (isset($_POST['firstname']))?$_POST['firstname']: $user->getFirstName(); ?>" id='firstname' placeholder='Firstname' class='form-control'>
				</div>
			</div>

			<div class='form-group'>
				<label for='surname'  class='col-sm-1'>Surname</label>
				<div class='col-sm-6'>
					<input type='text' name='surname' value="<?php echo (isset($_POST['surname']))?$_POST['surname']: $user->getSurname(); ?>" id='surname' placeholder='Surname' class='form-control'>
				</div>
			</div>

			<div class='form-group'>
				<label for='username'  class='col-sm-1'>Username</label>
				<div class='col-sm-6'>
					<input type='text' name='username' value="<?php echo (isset($_POST['username']))?$_POST['username']:$oldusername; ?>" id='username' placeholder='Username' class='form-control'>
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
				<div class='col-sm-offset-1 col-sm-6'>
					<input type='submit' name='submit' value='Update User' class='btn btn-default'/>
					<a href='users.php' class='btn btn-default'>Cancel</a>
				</div>
			</div>
			<input type='hidden' name='oldusername' value="<?php echo $oldusername; ?>">
		</form>
	</div>
</div>
<?php	require "../layout/footer.php"; ?>