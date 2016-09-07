<?php

require "../layout/header.php";
require "../common/programmes.class.php"; 

require "../layout/sidebar.php";

$suc = "";
$succ = false;

if(isset($_POST['send']))
{
	if(Programmes::addProgramme($_POST['ProgrammeName'], $_POST['EntryRequirements'], $_POST['Duration']))
	{
		$suc = "Data was successfully submitted";
		$succ = true;
	} 
	else 
	{
		$suc = "Ooops. something went wrong";
	}
}

?>

	<div class="panel blue-backround">
	<div  class="content-title panel-heading">
		Enter programmes
	</div>
	</div>

     <div class="col-sm-11">
	  	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Programme name : </label>
        <input type="text" class="form-control" name="ProgrammeName" id="" placeholder="Enter Programme name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Entry requirement : </label>
        <input type="text" class="form-control" name="EntryRequirements" id="" placeholder="Enter entry requirement">
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1">Duration : </label>
        <input type="text" class="form-control" name="Duration" id="" placeholder="Enter duration">
      </div>
      <button type="submit" name="send" class="btn btn-primary">Submit</button>
		</form>
	  <div class="form-group">
	    <br />
		<?php if($suc != "" && $succ == true){ ?>
			<div class="alert alert-success" role="alert"><?php echo $suc; ?></div>
		<?php } else { ?>
			<div class="alert alert-warning" role="alert"><?php echo $suc; ?></div>
		<?php } ?>
      </div>
	</div>


<?php

	require "../layout/footer.php";
	
	