<?php

require "../layout/header.php";
require "../common/programmes.class.php"; 
require "../common/validator.php";

require "../layout/sidebar.php";

$suc = "";
$succ = false;
$errors = null;

if(isset($_POST['send']))
{
     $val = new Validator(array(  
						   'numbers' => array(
                             array($_POST['Duration'], 'Duration')
                            ), 
                           'spaces' => array(
                             array($_POST['Duration'], 'Duration')
                            ),
						   'length' => array(
						   					 array($_POST['ProgrammeName'], 1, 'max', 'Programme Name'),
						   					 array($_POST['EntryRequirements'], 1, 'max', 'Entry requirements'),
											 array($_POST['Duration'], 1, 'max', 'Duration')
						                    )							
                            ));
	 $val->test();
        if(!$val->result)
			$succ = true;
		else 
			$errors = $val->result;
	
	if(Programmes::addProgramme($_POST['ProgrammeName'], 
	                            $_POST['EntryRequirements'], 
								$_POST['Duration']) 
								&& 
							    $errors == null)
	{
		$suc = "Data was successfully submitted";
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

	<div>
	<?php if($errors != null){ ?>
	<div class="alert alert-danger" role="alert">
	<?php foreach($errors as $list) { ?>
		 	<?php echo $list; ?><br />
		<?php } ?>
	</div>
	<?php } ?>
	</div>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal">
	<div class="form-group">
		<label for="ProgrammeName" class="col-sm-2 control-label">Programme name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="ProgrammeName" name="ProgrammeName" value="<?= (($errors != null) ? @$_POST['ProgrammeName'] : "") ?>" id="" placeholder="Enter Programme name">
		</div>
	</div>

	<div class="form-group">
		<label for="EntryRequirements" class="col-sm-2 control-label">Entry requirement</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="EntryRequirements" name="EntryRequirements" value="<?= (($errors != null) ? @$_POST['EntryRequirements'] : "") ?>" id="" placeholder="Enter entry requirement">
		</div>
	</div>

	<div class="form-group">
		<label for="Duration" class="col-sm-2 control-label">Duration</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="Duration" id="Duration" value="<?= (($errors != null) ? @$_POST['Duration'] : "") ?>" placeholder="Enter duration">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="send" class="btn btn-default formbutton">Submit</button>
		</div>
	</div>
</form>


	  <div class="form-group">
	    <br />
		<?php if($errors == null){ if($suc != "" && $succ == true){ ?>
			<div class="alert alert-success" role="alert"><?php echo $suc; ?></div>
		<?php } else { ?>
			<div class="alert alert-warning" role="alert"><?php echo $suc; ?></div>
		<?php } } ?>
      </div>


<?php

	require "../layout/footer.php";
	
	