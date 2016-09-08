<?php
require "../common/access.php";
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
        <label for="exampleInputEmail1">Course code : </label>
        <input type="text" class="form-control" name="" id="" placeholder="Enter Course code">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Course name : </label>
        <input type="text" class="form-control" name="" id="" placeholder="Enter Course name">
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1">Credit hours : </label>
        <input type="text" class="form-control" name="" id="" placeholder="Enter credit hours">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	  </div>
    </div>


<?php

require "../layout/footer.php";
	
	