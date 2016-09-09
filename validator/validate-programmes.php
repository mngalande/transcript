<?php
  require "../common/access.php";
  require "../common/authorise.php";
	require "../layout/header.php";
	
?>

    <div class="container">
      <div class="row">
<?php 

require "../layout/sidebar.php";

?>
      </div>
	  <div>
        <div class="col-sm-11">
	  	<form action="" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Programme name : </label>
        <input type="text" class="form-control" name="" id="" placeholder="Enter Programme name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Entry requirement : </label>
        <input type="text" class="form-control" name="" id="" placeholder="Enter entry requirement">
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1">Duration : </label>
        <input type="text" class="form-control" name="" id="" placeholder="Enter duration">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	  </div>
    </div>


<?php

	require "../layout/footer.php";
	
	