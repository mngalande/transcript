<?php
	require "../common/access.php";
	require "../common/authorise.php";
	require "../common/connect.php";
	require "../common/user.php";
	require "../layout/header.php";
	require "../layout/sidebar.php";
	
	$oldusername = '';
	if(isset($_GET['edituser'])){
		$oldusername = strip_tags($_GET['edituser']);
		if(User::userExists($oldusername)){
			$user = new User($oldusername);
		}
		else{
			header("Location: index.php");
		}
	}
	$feedback = '';

	if(isset($_POST['submit'])){
		//check if all fields are not empty
		if(!empty($_POST['firstname']) && !empty($_POST['surname']) && !empty($_POST['username']) && !empty($_POST['usertype'])  && !empty($_POST['oldusername'])){
			$oldusername = strip_tags($_POST['oldusername']);
			if(User::userExists($oldusername)){
				$firstname = strip_tags($_POST['firstname']);
				$surname = strip_tags($_POST['surname']);
				$username = strip_tags($_POST['username']);
				$usertype = strip_tags($_POST['usertype']);
				$user = new User();

				if($username == $oldusername){
					if($user->updateUser($firstname, $surname, $username, $oldusername, $usertype)){
						//log the action
						header("Location: index.php");
						$_SESSION['feedback'] = "<font color='green'>User successfully updated!</font>";
					}
					else{
						$feedback = "<font color='red'>There was a problem updating the selected user</font>";
					}
				}
				elseif(User::usernameIsAvailable($username)){
					if($user->updateUser($firstname, $surname, $username, $oldusername, $usertype)){
						//log the action
						header("Location: index.php");
						$_SESSION['feedback'] = "<font color='green'>User successfully updated!</font>";
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
				$feedback = "<font color='red'>Username not found.</font>";
			}
		}
		else{
			$feedback = "<font color='red'>Please fill in all the fields</font>";
		}
	}

?>

<div class='panel blue-backround'>
	<div class='panel-heading'>
		<h2 class='panel-title'>Edit User</h2>
	</div>
</div>
	
<p class='col-sm-offset-1'><?php echo $feedback ?></p>
<form method="POST" action="edituser.php" accept-charset="UTF-8" class="form-horizontal">
	<div class='form-group'>
		<label for='firstname'  class='col-sm-2 control-label'>Firstname</label>
		<div class='col-sm-10'>
			<input type='text' name='firstname' value="<?php echo (isset($_POST['firstname']))?$_POST['firstname']: $user->getFirstName(); ?>" id='firstname' placeholder='Firstname' class='form-control'>
		</div>
	</div>

	<div class='form-group'>
		<label for='surname'  class='col-sm-2 control-label'>Surname</label>
		<div class='col-sm-10'>
			<input type='text' name='surname' value="<?php echo (isset($_POST['surname']))?$_POST['surname']: $user->getSurname(); ?>" id='surname' placeholder='Surname' class='form-control'>
		</div>
	</div>

	<div class='form-group'>
		<label for='username'  class='col-sm-2 control-label'>Username</label>
		<div class='col-sm-10'>
			<input type='text' name='username' value="<?php echo (isset($_POST['username']))?$_POST['username']:$oldusername; ?>" id='username' placeholder='Username' class='form-control'>
		</div>
	</div>

	<div class='form-group'>
		<label for='usertype'  class='col-sm-2 control-label'>User Type</label>
		<div class='col-sm-10'>
			<select class='form-control' name='usertype'>
				<option value='clerk' <?php if($user->getUserType() ==  'data entry clerk') {echo 'selected=selected';}?>>Data Entry Clerk</option>
				<option value='validator' <?php if($user->getUserType() ==  'validator') {echo 'selected=selected';}?>>Validator</option>
				<option value='admin' <?php if($user->getUserType() ==  'admin') {echo 'selected=selected';}?>>Administrator</option>
	      	</select>
		</div>
	</div>
	
	<div class='form-group'>
		<div class='col-sm-offset-2 col-sm-10'>
			<input type='submit' name='submit' value='Update User' class='btn btn-default formbutton'/>
			<a href='index.php' class='btn btn-default formbutton'>Cancel</a>
		</div>
	</div>
	<input type='hidden' name='oldusername' value="<?php echo $oldusername; ?>">
</form>

<?php	require "../layout/footer.php"; ?>