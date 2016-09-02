<?php

require "../layout/header.php";
require "../common/connect.php";
	
?>

    <div class="container">
      <div class="row">
<?php 

require "../layout/sidebar.php";

$suc = "";

if(isset($_POST['send']))
{
	if(db::addProgramme($_POST['ProgrammeName'], $_POST['EntryRequirements'], $_POST['Duration']))
	{
		$suc = "Data was successful submitted";
	} 
	else 
	{
		$suc = "Ooops. something went wrong";
	}
}

?>
      </div>
	  <div>
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
        <p id="message">
    	  <?php echo $suc; ?>
        </p>
      </div>
	</div>
	  </div>
    </div>


<?php

	require "../layout/footer.php";
	
	