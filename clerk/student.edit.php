<?php

//  require "../common/access.php";
//    require "../common/authorise.php";
	require "../layout/header.php";
	require "../layout/sidebar.php";
	require "../common/student.class.php";

?>

<div class="panel blue-backround">
	<div  class="content-title panel-heading">
		Student Grades
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
		<b>RegistrationNumber</b>
        <input type="text" class="form-control" name="RegistrationNumber" id="form1" value="" placeholder="Enter Registration Number">
		<br />
		<b>Student Name</b>
		<input type="text" class="form-control" name="StudentName" id="form2" value="" placeholder="Enter Student Name">
		<br />
		<b>Title</b>
		<input type="text" class="form-control" name="Title" id="form3" value="" placeholder="Enter Title">
		<br />
		<b>EnterYear</b>
		<input type="text" class="form-control" name="EnterYear" id="form4" value="" placeholder="Enter Enter Year">
		<br />
		<b>Programme Name</b>
		<input type="text" class="form-control" name="ProgrammeName" id="form5" value="" placeholder="Enter Programme Name">
		<br />
		<b>Grading System Name</b>
		<input type="text" class="form-control" name="GradingSystemName" id="form6" value="" placeholder="Enter Grading System Name">
        <br />
        <b>Entry Type</b>
        <input type="text" class="form-control" name="EntryType" id="form7" value="" placeholder="Enter Entry Type">
        <br />
        <b>Cummulative GPA</b>
        <input type="text" class="form-control" name="CummulativeGPA" id="form8" value="" placeholder="Enter Cummulative GPA">
		<br />
		<b>Award</b>
		<input type="text" class="form-control" name="Award" id="form9" value="" placeholder="Enter Award">
		<br />
		<b>Award Year</b>
		<input type="text" class="form-control" name="AwardYear" id="form10" value="" placeholder="Enter Award Year">
		<br />
		<b>Sex</b>
		<input type="text" class="form-control" name="Sex" id="form11" value="" placeholder="Enter Sex">

		<input type="hidden" class="form-control" name="hideme" value="" id="hideme" />

      </div>
      <div class="modal-footer">
      <h4><span id="load" class="pull-left"></span></h4>
        <button type="button" class="btn btn-default" id="dismis" data-dismiss="modal">Close</button>
        <button type="button" id="send" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Edit</th>
      <th>Registration Number</th>
      <th>Full Name</th>
      <th>Title</th>
      <th>Enter Year</th>
      <th>Programme</th>
      <th>Grading System</th>
      <th>Enter Type</th>
      <th>Cummulative GPA</th>
      <th>Award</th>
      <th>Award Year</th>
      <th>Sex</th>
    </tr>
    
    <?php foreach(Student::getAllStudents()->fetchAll() as $row){ ?>
    <tr>
    
		<?php $var = substr($row['RegistrationNumber'], 
	                (strlen($row['RegistrationNumber']) - 8), 2) . 
	                 substr($row['RegistrationNumber'], 
	                (strlen($row['RegistrationNumber']) - 5), 2) . 
	                 substr($row['RegistrationNumber'], 
	                (strlen($row['RegistrationNumber']) - 2), 2); 
	                /*
	                show<?= $row['RegistrationNumber'] ?>
	                */
	    ?>
    
      <td><a href="#" data-toggle="modal" id="modalV<?php echo substr($row['RegistrationNumber'], 
	                (strlen($row['RegistrationNumber']) - 8), 2) . substr($row['RegistrationNumber'], 
	                (strlen($row['RegistrationNumber']) - 5), 2) . 
	                 substr($row['RegistrationNumber'], 
	                (strlen($row['RegistrationNumber']) - 2), 2); ?>" data-target="#myModal" rel="<?= $row['RegistrationNumber'] 
	                ?>;show1<?= $var ?>;show2<?= $var ?>;show3<?= $var ?>;show4<?= $var ?>;show5<?= $var 
	                ?>;show6<?= $var ?>;show7<?= $var ?>;show8<?= $var ?>;show9<?= $var ?>;show10<?= $var ?>;show11<?= $var 
	                ?>">Edit</a></td>

      <td><span id="show1<?= $var ?>"><?= $row['RegistrationNumber'] ?></span></td>
      <td><span id="show2<?= $var ?>"><?= $row['StudentName'] ?></span></td>
      <td><span id="show3<?= $var ?>"><?= $row['Title'] ?></span></td>
      <td><span id="show4<?= $var ?>"><?= $row['EnterYear'] ?></span></td>
      <td><span id="show5<?= $var ?>"><?= $row['ProgrammeName'] ?></span></td>
      <td><span id="show6<?= $var ?>"><?= $row['GradingSystemName'] ?></span></td>
      <td><span id="show7<?= $var ?>"><?= $row['EntryType'] ?></span></td>
      <td><span id="show8<?= $var ?>"><?= $row['CummulativeGPA'] ?></span></td>
      <td><span id="show9<?= $var ?>"><?= $row['Award'] ?></span></td>
      <td><span id="show10<?= $var ?>"><?= $row['AwardYear'] ?></span></td>
      <td><span id="show11<?= $var ?>"><?= $row['Sex'] ?></span></td>
    </tr>  
    <?php } ?>
  </table>
</div>

<?php
$var = null;

	require "../layout/footer.php";

?>

<script type="text/javascript">
$(function(){
	
		$('#dismis').click(function(e){
			$('#load').html('')
		})
	/*
		$('#myModal').on('dismiss', function () {
  			$('#load').html('')
		}) */
	
		$('#send').click(function(e){
		e.preventDefault();	

		$.ajax({
		url: '../common/script_students.php',
		type: 'POST',
		data: {
		'form1': $('#form1').val(), 
		'form2': $('#form2').val(),
		'form3': $('#form3').val(),
		'form4': $('#form4').val(), 
		'form5': $('#form5').val(),
		'form6': $('#form6').val(),
		'form7': $('#form7').val(), 
		'form8': $('#form8').val(),
		'form9': $('#form9').val(),
		'form10': $('#form10').val(),
		'form11': $('#form11').val()
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
		// $('#myModal').modal('hide')
		// alert(data[0].val);
		
		var datav = ($('#hideme').val()).split(';')
		var datav2 = datav.slice(1, 12)
		
		var id = datav[0];

		$.get('../common/ajax_load_students.php?', 
	    { pn1: id }, function(result){		
		$('#' + datav[1]).html(result)
		}); 
		$.get('../common/ajax_load_students.php', 
		{ pn2: id }, 
		function(result) {
		$('#' + datav[2]).html(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn3: id }, 
		function(result) {
		$('#' + datav[3]).html(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn4: id }, 
		function(result) {
		$('#' + datav[4]).html(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn5: id }, 
		function(result) {
		$('#' + datav[5]).html(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn6: id }, 
		function(result) {
		$('#' + datav[6]).html(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn7: id }, 
		function(result) {
		$('#' + datav[7]).html(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn8: id }, 
		function(result) {
		$('#' + datav[8]).html(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn9: id }, 
		function(result) {
		$('#' + datav[9]).html(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn10: id }, 
		function(result) {
		$('#' + datav[10]).html(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn11: id }, 
		function(result) {
		$('#' + datav[11]).html(result)
		}); 
			
		}
		if(data[0].val == "Successful")
		$('#load').html("<b>" + data[0].val + "</b>");
		//$('#load').fadeOut(4000)
		}
		})
		})
	
	    <?php foreach(Student::getAllStudents()->fetchAll() as $row){  ?>
	    // modalVOM0110
	    
		<?php $var = substr($row['RegistrationNumber'], 
	                (strlen($row['RegistrationNumber']) - 8), 2) . 
	                 substr($row['RegistrationNumber'], 
	                (strlen($row['RegistrationNumber']) - 5), 2) . 
	                 substr($row['RegistrationNumber'], 
	                (strlen($row['RegistrationNumber']) - 2), 2); 
	    ?>
		$('<?php echo '#modalV'. $var; ?>').click(function(e){
		e.preventDefault();
		
		var msg = $(this).attr('rel')

		$.get('../common/ajax_load_students.php', 
		{ pn1: '<?= $row['RegistrationNumber'] ?>' }, 
		function(result) {		
		$('#form1').val(result)
		});
		// 
		$.get('../common/ajax_load_students.php', 
		{ pn1: '<?= $row['RegistrationNumber'] ?>' }, 
		function(result) {		
		$('#hideme').val(msg)
		});
		
		$.get('../common/ajax_load_students.php', 
		{ pn2: '<?= $row['RegistrationNumber'] ?>' }, 
		function(result) {
		$('#form2').val(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn3: '<?= $row['RegistrationNumber'] ?>' }, 
		function(result) {
		$('#form3').val(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn4: '<?= $row['RegistrationNumber'] ?>' }, 
		function(result) {
		$('#form4').val(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn5: '<?= $row['RegistrationNumber'] ?>' }, 
		function(result) {
		$('#form5').val(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn6: '<?= $row['RegistrationNumber'] ?>' }, 
		function(result) {
		$('#form6').val(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn7: '<?= $row['RegistrationNumber'] ?>' }, 
		function(result) {
		$('#form7').val(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn8: '<?= $row['RegistrationNumber'] ?>' }, 
		function(result) {
		$('#form8').val(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn9: '<?= $row['RegistrationNumber'] ?>' }, 
		function(result) {
		$('#form9').val(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn10: '<?= $row['RegistrationNumber'] ?>' }, 
		function(result) {
		$('#form10').val(result)
		});
		$.get('../common/ajax_load_students.php', 
		{ pn11: '<?= $row['RegistrationNumber'] ?>' }, 
		function(result) {
		$('#form11').val(result)
		});
	
		});
		
		<?php } ?>
});
</script>