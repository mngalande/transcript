<?php

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
        <label for="exampleInputEmail1">Name : </label>
        <input type="text" name="" class="form-control" id="" placeholder="Enter Student name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Registration number : </label>
        <input type="text" name="" class="form-control" id="" placeholder="Enter registration number">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">award year : </label>
        <input type="text" name="" class="form-control" id="award year" placeholder="Enter award year">
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1">Grading system : </label>
        <select class="form-control" name="title" id="title">
        	<option value=""></option>
        </select class="form-control">
      </div>
	  <div class="form-group">
        <label for="exampleInputPassword1">Entry type : </label>
        <select class="form-control" name="entrytype" id="title">
        	<option value=""></option>
        </select class="form-control">
      </div>
	  <div class="form-group">
        <label for="exampleInputPassword1">Award : </label>
        <select class="form-control" name="award" id="title">
        	<option value=""></option>
        </select class="form-control">
      </div>
	  <div class="form-group">
        <label for="exampleInputPassword1">Award : </label>
        <select class="form-control" name="award" id="">
        	<option value=""></option>
        </select class="form-control">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Course code : </label>
        <input type="text" name="" class="form-control" id="" placeholder="Enter course code">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Course name : </label>
        <input type="text" name="" class="form-control" id="" placeholder="Enter course name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Course grade : </label>
        <input type="text" name="" class="form-control" id="" placeholder="Enter course grade">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Academic year : </label>
        <select class="form-control" name="academicyear" id="">
        	<option value=""></option>
        </select class="form-control">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Year of study : </label>
        <select class="form-control" name="yearofstudy" id="">
        	<option value=""></option>
        </select class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <br /><br />
		</form>
	</div>
	  </div>
    </div>


<?php

	require "../layout/footer.php";
	
	