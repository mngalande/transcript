<?php 

require "../layout/header.php";
require "../common/programmes.class.php"; 

require "../layout/sidebar.php";

?>

<div class="panel blue-backround">
	<div  class="content-title panel-heading">
		Edit programmes <span id="load" class="pull-right"></span>
	</div>
</div>

<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Programme name : </th>
      <th>Entry requirement : </th>
      <th>Duration : </th>
      <th></th>
    </tr>
<?php foreach(Programmes::getAllProgramme()->fetchAll() as $row){ ?>
    <tr>
      <td><span id="edtP1<?= $row['ProgrammeID'] ?>"><?= $row['ProgrammeName'] ?></span></td>
      <td><span id="edtP2<?= $row['ProgrammeID'] ?>"><?= $row['EntryRequirements'] ?></span></td>
      <td><span id="edtP3<?= $row['ProgrammeID'] ?>"><?= $row ['Duration'] ?></span></td>
	  <td><span id="form<?= $row['ProgrammeID'] ?>"><a href="#" rel="<?= $row['ProgrammeID'] ?>" id="editP<?= $row['ProgrammeID'] ?>">Edit</a></span></td>
    </tr>
<?php } ?>  
  </table>
</div>


<?php

require "../layout/footer.php";

?>

<script type="text/javascript">
$(function(){
	<?php foreach(Programmes::getAllProgramme()->fetchAll() as $row){ ?>
	
	    $('<?php echo '#editP' . $row['ProgrammeID']; ?>').click(function(e){
		e.preventDefault();
		
		$('<?php echo '#edtP1' . $row['ProgrammeID']; ?>').html
		(
		'<input type="text" class="form-control" name="ProgrammeName" id="form1<?php 
		echo $row['ProgrammeID']; ?>" value="<?php 
		echo $row['ProgrammeName']; ?>" placeholder="Enter Programme name">'
		)
		$('<?php echo '#edtP2' . $row['ProgrammeID']; ?>').html
		(
		'<input type="text" class="form-control" name="EntryRequirements" id="form2<?php 
		echo $row['ProgrammeID']; ?>" value="<?php 
		echo $row['EntryRequirements']; ?>" placeholder="Enter entry requirement">'
		)
		$('<?php echo '#edtP3' . $row['ProgrammeID']; ?>').html
		(
		'<input type="text" class="form-control" name="Duration" id="form3<?php 
		echo $row['ProgrammeID']; ?>" value="<?php 
		echo $row['Duration']; ?>" placeholder="Enter duration">'
		)
		$('<?php echo '#form' . $row['ProgrammeID']; ?>').html
		(
		'<input type="hidden" class="form-control" name="form4" id="form4<?php 
		echo $row['ProgrammeID']; ?>"'+
		' value="<?php echo $row['ProgrammeID']; ?>" >'
		+
		'<button type="submit" name="send" id="send<?php echo $row['ProgrammeID']; 
		?>" class="btn btn-primary">Submit</button>'
		)
		
		$('<?php echo '#send' . $row['ProgrammeID']; ?>').click(function(e){
		e.preventDefault();	
		
		$.ajax({
		url: '../common/script.php',
		type: 'POST',
		data: {
		'form1': $('<?php echo '#form1'. $row['ProgrammeID']; ?>').val(), 
		'form2': $('<?php echo '#form2'. $row['ProgrammeID']; ?>').val(),
		'form3': $('<?php echo '#form3'. $row['ProgrammeID']; ?>').val(),
		'form4': $('<?php echo '#form4'. $row['ProgrammeID']; ?>').val()
		} ,
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
		$('<?php echo '#edtP1' . $row['ProgrammeID']; 
		?>').load('../common/ajax_load_programmes.php?pn&pn1=<?php 
		echo $row['ProgrammeID']; ?>');
		$('<?php echo '#edtP2' . $row['ProgrammeID']; 
		?>').load('../common/ajax_load_programmes.php?er&er1=<?php 
		echo $row['ProgrammeID']; ?>');
		$('<?php echo '#edtP3' . $row['ProgrammeID']; 
		?>').load('../common/ajax_load_programmes.php?d&d1=<?php 
		echo $row['ProgrammeID']; ?>');
		
		//$('<?php echo '#form' . $row['ProgrammeID']; ?>').show()
		$('<?php echo '#form' . $row['ProgrammeID']; ?>').html('<a href="#" rel="<?= $row['ProgrammeID'] ?>" id="editPP<?= $row['ProgrammeID'] ?>">Edit</a>');
		}
		}
		})
		})
	})
// 	
	
	<?php } ?>
	
});
</script>
</form>