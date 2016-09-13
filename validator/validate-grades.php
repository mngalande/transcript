<?php
//  require "../common/access.php";
	require "../common/authorise.php";
	require "../layout/header.php";
	require "../layout/sidebar.php";
	require "../common/grade.class.php";
	
?>

<div class="panel blue-backround">
	<div  class="content-title panel-heading">
		Student Grades <span id="load" class="pull-right"></span>
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
<?php foreach(Grade::getAllGrades()->fetchAll() as $d){ //  CourseCode 	CourseVersion 	CourseName 	CreditHours 	CourseYearOffered ?>
    <tr>
      <td></td>
      <td><span id="edtP1<?= $d['CourseCode'] ?>"><?= $d['CourseCode'] ?></span></td>
      <td><span id="edtP2<?= $d['CourseCode'] ?>"><?= $d['CourseVersion'] ?></span></td>
      <td><span id="edtP3<?= $d['CourseCode'] ?>"><?= $d['CourseName'] ?></span></td>
      <td><span id="edtP4<?= $d['CourseCode'] ?>"><?= $d['CreditHours'] ?></span></td>
      <td></td>
      <td><span id="form<?= $d['CourseCode'] ?>"></span><a href="#" rel="<?= $d['CourseCode'] ?>" id="editP<?= $d['CourseCode'] ?>">Edit</a></td>
    </tr>
<?php } ?>
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
    <div class="modal-header blue-background">
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
        <button type="button" class="btn btn-default formbutton" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default formbutton"><span class='glyphicon glyphicon-floppy-save'></span> Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php
	require "../layout/footer.php";
	
	$rand = [];
	// $rand[] = rand(100, 1000000);
?>


<script type="text/javascript">
$(function(){
	<?php foreach(Grade::getAllGrades()->fetchAll() as $row){ ?>
	
	    $('<?php echo '#editP' . $row['CourseCode']; ?>').click(function(e){
		e.preventDefault();
		
		$('<?php echo '#edtP1' . $row['CourseCode']; ?>').html
		(
		'<input type="text" class="form-control" name="CourseCode" id="form1<?php 
		echo $row['CourseCode']; ?>" value="<?php 
		echo $row['CourseCode']; ?>" placeholder="Enter Course Code">'
		)
		$('<?php echo '#edtP2' . $row['CourseCode']; ?>').html
		(
		'<input type="text" class="form-control" name="CourseVersion" id="form2<?php 
		echo $row['CourseCode']; ?>" value="<?php 
		echo $row['CourseVersion']; ?>" placeholder="Enter Course Version">'
		)
		$('<?php echo '#edtP3' . $row['CourseCode']; ?>').html
		(
		'<input type="text" class="form-control" name="CourseName" id="form3<?php 
		echo $row['CourseCode']; ?>" value="<?php 
		echo $row['CourseName']; ?>" placeholder="Enter Course Name">'
		)
		$('<?php echo '#edtP4' . $row['CourseCode']; ?>').html
		(
		'<input type="text" class="form-control" name="CreditHours" id="form4<?php 
		echo $row['CourseCode']; ?>" value="<?php 
		echo $row['CreditHours']; ?>" placeholder="Enter Credit Hours">'
		)
		
		$('<?php echo '#editP' . $row['CourseCode']; ?>').hide()
		$('<?php echo '#form' . $row['CourseCode']; ?>').show()
		
		$('<?php echo '#form' . $row['CourseCode']; ?>').html
		(
		'<input type="hidden" class="form-control" name="form5" id="form5<?php 
		echo $row['CourseCode']; ?>"'+
		' value="<?php echo $row['CourseCode']; ?>" >'
		+
		'<button type="submit" name="send" id="send<?php echo $row['CourseCode']; 
		?>" class="btn btn-primary">Submit</button>'
		)
		
		$('<?php echo '#send' . $row['CourseCode']; ?>').click(function(e){
		e.preventDefault();	
		//  CourseCode 	CourseVersion 	CourseName 	CreditHours 	CourseYearOffered
		$.ajax({
		url: '../common/script_grades.php',
		type: 'POST',
		data: {
		'form1': $('<?php echo '#form1'. $row['CourseCode']; ?>').val(), 
		'form2': $('<?php echo '#form2'. $row['CourseCode']; ?>').val(),
		'form3': $('<?php echo '#form3'. $row['CourseCode']; ?>').val(),
		'form4': $('<?php echo '#form4'. $row['CourseCode']; ?>').val(),
		'form5': $('<?php echo '#form5'. $row['CourseCode']; ?>').val()
		},
		beforeSend: function(){
		$('#load').html('<b><style="color:red;">wait...script is loading</style></b>')
		}, 
		success: function(data) { 
		var f = "";
		if($.isArray(data[0].val) == true){
			for(var c = 0; c < (data[0].val).length; c++)
			f += data[0].val[c] + "\n";

			alert(f);
			
		} else {

		$('#load').html('')
		
		$('<?php echo '#edtP1' . $row['CourseCode']; 
		?>').load('../common/ajax_load_grades.php?pn&pn1=<?php 
		echo $row['CourseCode']; ?>');
		$('<?php echo '#edtP2' . $row['CourseCode']; 
		?>').load('../common/ajax_load_grades.php?er&er1=<?php 
		echo $row['CourseCode']; ?>');
		$('<?php echo '#edtP3' . $row['CourseCode']; 
		?>').load('../common/ajax_load_grades.php?d&d1=<?php 
		echo $row['CourseCode']; ?>');
		$('<?php echo '#edtP4' . $row['CourseCode']; 
		?>').load('../common/ajax_load_grades.php?d&e=<?php 
		echo $row['CourseCode']; ?>');
//

		$('<?php echo '#form' . $row['CourseCode']; ?>').hide()
		$('<?php echo '#editP' . $row['CourseCode']; ?>').show()

		}
		}
		})

		})	
		})
	<?php } ?>
});
</script>