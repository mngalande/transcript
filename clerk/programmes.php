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

	<div>
	<?php if($errors != null){ ?>
	<div class="alert alert-danger" role="alert">
	<?php foreach($errors as $list) { ?>
		 	<?php echo $list; ?><br />
		<?php } ?>
	</div>
	<?php } ?>
	</div>

	<div class="panel blue-backround">
	<div  class="content-title panel-heading">
		Enter programmes
	</div>
	</div>

     <div class="col-sm-11">
	  	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Programme name : </label>
        <input type="text" class="form-control" name="ProgrammeName" value="<?= 
		(($errors != null) ? @$_POST['ProgrammeName'] : "") ?>" id="" placeholder="Enter Programme name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Entry requirement : </label>
        <input type="text" class="form-control" name="EntryRequirements" value="<?= 
		(($errors != null) ? @$_POST['EntryRequirements'] : "") ?>" id="" placeholder="Enter entry requirement">
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1">Duration : </label>
        <input type="text" class="form-control" name="Duration" id="" value="<?= 
		(($errors != null) ? @$_POST['Duration'] : "") ?>" placeholder="Enter duration">
      </div>
      <button type="submit" name="send" class="btn btn-primary">Submit</button>
		</form>
	  <div class="form-group">
	    <br />
		<?php if($errors == null){ if($suc != "" && $succ == true){ ?>
			<div class="alert alert-success" role="alert"><?php echo $suc; ?></div>
		<?php } else { ?>
			<div class="alert alert-warning" role="alert"><?php echo $suc; ?></div>
		<?php } } ?>
      </div>
	</div>


<?php

	require "../layout/footer.php";
	
	