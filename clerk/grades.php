<?php
	require "../layout/header.php";
	require "../layout/sidebar.php";
?>

<div class="panel blue-backround">
	<div  class="content-title panel-heading">
		Student Grades
	</div>
</div>

<div class="table-responsive">
  <table class="table">
    <tr>
      <th>serial #</th>
      <th>Course Code</th>
      <th>Course Version</th>
      <th>Course Name</th>
      <th>Credit Hours</th>
      <th>Final Grade(%)</th>
      <th>&nbsp;</th>
    </tr>
    <tr>
      <td>1.</td>
      <td>HRM111</td>
      <td>2015</td>
      <td>Introduction to Human Resource Management Part 1</td>
      <td>3.0</td>
      <td>67</td>
      <td><a>Delete</a></td>
    </tr>
    <tr>
      <td>2.</td>
      <td>HRM121</td>
      <td>2015</td>
      <td>Introduction to Human Resource Management Part 2</td>
      <td>3.0</td>
      <td>54</td>
      <td><a>Delete</a></td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>
        <button type="button" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-default btn-circle btn-lg">
          <i class="glyphicon glyphicon-plus"></i>
        </button>
      </td>
    </tr>   
  </table>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Course Grade</h4>
    </div>

    <div class="modal-body">
<form method="post" class="form-horizontal">
  <div class="form-group">
    <label for="courseCode" class="col-sm-2 control-label">Course Code</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="courseCode" placeholder="Course Code">
    </div>
    <label for="courseVersion" class="col-sm-2 control-label">Course Version</label>
    <div class="col-sm-4">
      <select class="form-control">
        
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="courseName" class="col-sm-2 control-label">Course Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="courseName" placeholder="Course Name">
    </div>
  </div>

  <div class="form-group">
    <label for="grade" class="col-sm-2 control-label">Grade</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="grade" placeholder="Grade">
    </div>
  </div>

  <div class="form-group">
    <label for="academicYear" class="col-sm-2 control-label">Academic Year</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="academicYear" placeholder="Academic Year">
    </div>
  </div>

  <div class="form-group">
    <label for="yearOfStudy" class="col-sm-2 control-label">Year Of Study</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="yearOfStudy" placeholder="Year Of Study">
    </div>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php
	require "../layout/footer.php";
?>