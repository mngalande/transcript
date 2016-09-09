<?php
//  require "../common/access.php";
	require "../layout/header.php";
	require "../layout/sidebar.php";
	require "../common/grade.class.php";
	
?>


<div class="panel blue-backround">
	<div  class="content-title panel-heading">
		Add Student Course
	</div>
</div>

<form class="form-horizontal" action="AddCourse.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="coursecode">Course Code</label>
    <div class="col-sm-10">
      <input type="text" name ="coursecode" class="form-control" id="coursecode" placeholder="Enter Course Code">
    </div>
	</div>	
  <div class="form-group">
    <label class="control-label col-sm-2" for="courseversion">Course Version:</label>
    <div class="col-sm-10">
      <input type="text" name ="courseversion" class="form-control" id="courseversion" placeholder="Enter Course Version">
    </div>	
	</div>
	<div class="form-group">
    <label class="control-label col-sm-2" for="coursename">Course Name:</label>
    <div class="col-sm-10">
    <input type="text" name="coursename" class="form-control" id="coursename" placeholder="Enter Course Name">
    </div>
	</div>
	<div class="form-group">
    <label class="control-label col-sm-2" for="credithours">Credit Hours:</label>
    <div class="col-sm-10">
      <input type="text" name="credithours" class="form-control" id="credithours" placeholder="Enter Course Credit Hours">
    </div>
	</div>
	<div class="form-group">
    <label class="control-label col-sm-2" for="courseyearOffered">Course Year Offered:</label>
    <div class="col-sm-10">
      <input type="text" name="courseyearoffered" class="form-control" id="courseyearOffered" placeholder="Enter Course Year Offered">
    </div>
	</div>
	<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" value= "submit" class="btn btn-default formbutton">Submit</button>
    </div>  
	</div>
	</form>
<?php

	require "../layout/footer.php";