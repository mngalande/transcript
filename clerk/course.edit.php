<?php 

//require "../common/access.php";
require "../common/authorise.php";
require "../layout/header.php";
require "../common/course.class.php"; 
require "../layout/sidebar.php";
//  CourseCode 	CourseVersion 	CourseName 	CreditHours 	CourseYearOffered
?>

<div class="panel blue-backround">
	<div  class="content-title panel-heading">
		Edit Courses <span id="load" class="pull-right"></span>
	</div>
</div>

<div class="table-responsive">
  <table class="table">
    <tr>
      <th>CourseCode </th>
      <th>Course Version </th>
      <th>Course Name </th>
      <th>CreditHours </th>
      <th>Course Year Offered </th>
      <th></th>
    </tr>
<?php foreach(Course::getAllCourses()->fetchAll() as $row){ ?>
    <tr>
      <td><span id="edtP1<?= $row['CourseCode'] ?>"><?= $row['CourseCode'] ?></span></td>
      <td><span id="edtP2<?= $row['CourseCode'] ?>"><?= $row['CourseVersion'] ?></span></td>
      <td><span id="edtP3<?= $row['CourseCode'] ?>"><?= $row ['CourseName'] ?></span></td>
      <td><span id="edtP4<?= $row['CourseCode'] ?>"><?= $row ['CreditHours'] ?></span></td>
      <td><span id="edtP5<?= $row['CourseCode'] ?>"><?= $row ['CourseYearOffered'] ?></span></td>
	  <td><span id="form<?= $row['CourseCode'] ?>"></span><a href="#" rel="<?= $row['CourseCode'] 
	  ?>" id="editP<?= $row['CourseCode'] ?>">Edit</a></td>
    </tr>
<?php } ?>  
  </table>
</div>


<?php

require "../layout/footer.php";

?>

<script type="text/javascript">
$(function(){
	<?php foreach(Course::getAllCourses()->fetchAll() as $row){ ?>
	
	    $('<?php echo '#editP' . $row['CourseCode']; ?>').click(function(e){
		e.preventDefault();
		
		$('<?php echo '#edtP1' . $row['CourseCode']; ?>').html
		(
		'<input type="text" class="form-control" name="CourseCode" id="form1<?php 
		echo $row['CourseCode']; ?>" value="<?php 
		echo $row['CourseCode']; ?>" placeholder="Enter Programme name">'
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
		echo $row['CreditHours']; ?>" placeholder="Enter Course Credit Hours">'
		)
		$('<?php echo '#edtP5' . $row['CourseCode']; ?>').html
		(
		'<input type="text" class="form-control" name="CourseYearOffered" id="form5<?php 
		echo $row['CourseCode']; ?>" value="<?php 
		echo $row['CourseYearOffered']; ?>" placeholder="Enter Course Year Offered">'
		)

		$('<?php echo '#editP' . $row['CourseCode']; ?>').hide()
		$('<?php echo '#form' . $row['CourseCode']; ?>').show()
		
		$('<?php echo '#form' . $row['CourseCode']; ?>').html
		(
		'<input type="hidden" class="form-control" name="form4" id="form4<?php 
		echo $row['CourseCode']; ?>"'+
		' value="<?php echo $row['CourseCode']; ?>" >'
		+
		'<button type="submit" name="send" id="send<?php echo $row['CourseCode']; 
		?>" class="btn btn-primary">Submit</button>'
		)
		
		$('<?php echo '#send' . $row['CourseCode']; ?>').click(function(e){
		e.preventDefault();	
		
		$.ajax({
		url: '../common/script_courses.php',
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
		?>').load('../common/ajax_load_Course.php?pn&pn1=<?php 
		echo $row['CourseCode']; ?>');
		$('<?php echo '#edtP2' . $row['CourseCode']; 
		?>').load('../common/ajax_load_Course.php?pn1&pn2=<?php 
		echo $row['CourseCode']; ?>');
		$('<?php echo '#edtP3' . $row['CourseCode']; 
		?>').load('../common/ajax_load_Course.php?pn2&pn3=<?php 
		echo $row['CourseCode']; ?>');
		$('<?php echo '#edtP4' . $row['CourseCode']; 
		?>').load('../common/ajax_load_Course.php?pn3&pn4=<?php 
		echo $row['CourseCode']; ?>');
		$('<?php echo '#edtP5' . $row['CourseCode']; 
		?>').load('../common/ajax_load_Course.php?pn4&pn5=<?php 
		echo $row['CourseCode']; ?>');
		
		$('<?php echo '#form' . $row['CourseCode']; ?>').hide()
		$('<?php echo '#editP' . $row['CourseCode']; ?>').show()
		
		}

		}
		})
		})
	})
// 	
	
	<?php } ?>
	
});
</script>
