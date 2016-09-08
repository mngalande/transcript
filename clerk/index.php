<?php
	require "../layout/header.php";
	require "../layout/sidebar.php";

	$field_errors = array();
	if (isset($_POST['submit'])) {
		if (!empty($_POST['registrationNumber'])) {
			$registrationNumber = strip_tags($_POST['registrationNumber']);
		} else {
			$field_errors = array('registrationNumber' => 'Registration number is required.');
		}
	}
?>

<div class="panel blue-backround">
	<div  class="content-title panel-heading">
		Student Details
	</div>
</div>

<form method="post" class="form-horizontal">
  <div class="form-group">
    <label for="registrationNumber" class="col-sm-2 control-label">Registration Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="registrationNumber" id="registrationNumber" placeholder="Registration Number">
      <?php if (array_key_exists("registrationNumber",$field_errors)) { echo $field_errors["registrationNumber"]; }?>
    </div>
  </div>
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Full Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Full Name">
    </div>
  </div>
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <select class="form-control" name="title" id="title">
      	
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="enterYear" class="col-sm-2 control-label">Enter Year</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="enterYear" id="enterYear" placeholder="Enter Year">
    </div>
  </div>
  <div class="form-group">
    <label for="programme" class="col-sm-2 control-label">Programme</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="programme" id="programme" placeholder="programme">
    </div>
  </div>
  <div class="form-group">
    <label for="entryType" class="col-sm-2 control-label">Entry Type</label>
    <div class="col-sm-10">
      <select class="form-control" id="entryType" name="entryType">

      </select>
    </div>
  </div> 
  <div class="form-group">
    <label for="award" class="col-sm-2 control-label">Award</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="enterYear" id="enterYear" placeholder="Award">
    </div>
  </div>
  <div class="form-group">
    <label for="awardYear" class="col-sm-2 control-label">Award Year</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="awardYear" id="awardYear" placeholder="Award Year">
    </div>
  </div>
  <div class="form-group">
    <label for="gradingSystem" class="col-sm-2 control-label">Grading System</label>
    <div class="col-sm-10">
      <select class="form-control" name='gradingSystem' id="gradingSystem" name="gradingSystem">

      </select>
    </div>
  </div>  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
     	<button class="btn btn-default formbutton" name="submit" type="submit">Next >></button>
    </div>
  </div>
</form>


<?php
	require "../layout/footer.php";
?>