<?php
//  require "../common/access.php";
  require "../common/authorise.php";
  require "../layout/header.php";
  require "../layout/sidebar.php";
  require "../common/programmes.class.php";
  require_once "../common/student.class.php";
  require "../common/grading_system.class.php";

  $programmes_array = Programmes::getAllProgramme()->fetchAll(PDO::FETCH_COLUMN, 1);
  $grading_systems_array = GradingSystem::getAllGradingSystems()->fetchAll(PDO::FETCH_COLUMN, 1);

  $field_errors = array();
  $registrationNumber = $fullName = $title = $enterYear = $programme = $entryType = $award = $awardYear = $gradingSystem = $other = '';

  if (isset($_POST['submit'])) {
    $registrationNumber = strip_tags($_POST['registrationNumber']);
    $fullName = strip_tags($_POST['fullName']);
    $title = strip_tags($_POST['title']);
    $enterYear = strip_tags($_POST['enterYear']);
    $programme = strip_tags($_POST['programme']);
    $entryType = strip_tags($_POST['entryType']);
    $award = strip_tags($_POST['award']);
    $awardYear = strip_tags($_POST['awardYear']);
    $gradingSystem = strip_tags($_POST['gradingSystem']);
    if ($title == 'Other') {
      $other = strip_tags($_POST['other']);
    }

    if (!empty($registrationNumber)) {
      if (Student::registrationNumberExists($registrationNumber) == false) {
        if (!empty($fullName)) {
          if (!empty($title)) {
            if (($title == 'Other' and !empty($other)) or $title != 'Other') {
              if (!empty($enterYear)) {
                if ( is_numeric($enterYear) and $enterYear >= 1965 and $enterYear <= 2014) {
                  if (!empty($programme)) {
                    if (in_array(strtolower($programme), array_map('strtolower', $programmes_array))) {
                      if(!empty($entryType)) {
                        if ($entryType == 'Mature' or $entryType == 'Normal') {
                          if (!empty($award)) {
                            if (in_array($award, ['Distinction','Credit','Pass','First_Class','Upper_Second','Lower_Second','Third_Class','Fail'])) {
                              if(!empty($awardYear)) {
                                if ( is_numeric($awardYear) and $awardYear >= 1965 and $awardYear <= 2014) {
                                  if (!empty($gradingSystem)) {
                                    if (in_array(str_replace("_"," ", $gradingSystem), $grading_systems_array)) {
                                     $new_student_details = array(
                                        'registrationNumber' =>  $registrationNumber,
                                        'fullName' =>  $fullName,
                                        'title' =>  $title,
                                        'enterYear' =>  $enterYear,
                                        'programme' =>  $programme,
                                        'entryType' =>  $entryType,
                                        'award' =>  $award,
                                        'awardYear' =>  $awardYear,
                                        'gradingSystem' =>  $gradingSystem
                                      );
                                      if ($title == 'Other') {
                                        $new_student_details['other'] =  $other;
                                      }
                                      @session_start();
                                      $_SESSION['new_student_details'] = $new_student_details;
                                      header("location: grades.php");
                                    } else {
                                      $field_errors = array('gradingSystem' => 'The grading system you have entered does not exist.');
                                    }
                                  } else {
                                    $field_errors = array('gradingSystem' => 'Grading system is required.');
                                  }
                                } else {
                                  $field_errors = array('awardYear' => 'Award year should be between 1965 and 2014.');
                                }
                              } else {
                                $field_errors = array('awardYear' => 'The award year is required.');
                              }
                            } else {
                              $field_errors = array('award' => 'The award you have entered doesnot exist.');
                            }
                          }else {
                            $field_errors = array('award' => 'Award is required.');
                          }
                        } else {
                          $field_errors = array('entryType' => 'The entry type you have entered does not exist.');
                        }
                      } else {
                        $field_errors = array('entryType' => 'The entry type is required.');
                      }
                    } else {
                      $field_errors = array('programme' => 'The programme you have entered does not exist.');
                    }
                  } else {
                    $field_errors = array('programme' => 'Programme is required.');
                  }
                } else {
                  $field_errors = array('enterYear' => 'Enter year should be between 1965 and 2014.');
                }
              } else {
                $field_errors = array('enterYear' => 'Enter year is required.');
              }
            } else {
              $field_errors = array('other' => 'Specify title.');
            }
          } else {
            $field_errors = array('title' => 'Title is required.');
          }       
        } else {
          $field_errors = array('fullName' => 'Full name is required.');
        }
      } else {
        $field_errors = array('registrationNumber' => 'Registration number already exists.'); 
      }
    } else {
      $field_errors = array('registrationNumber' => 'Registration number is required.');
    }
  }
?>

<div class="panel blue-backround">
  <div  class="content-title panel-heading">
    Student Details
  </div>
</div>

<form method="post" class="form-horizontal">
  <div class="form-group">
    <label for="registrationNumber" class="col-sm-2 control-label">Registration Number</label>
    <div class="col-sm-10">
      <input value="<?php echo $registrationNumber;?>" type="text" class="form-control" name="registrationNumber" id="registrationNumber" placeholder="Registration Number">
      <?php if (array_key_exists("registrationNumber",$field_errors)) { echo $field_errors["registrationNumber"]; }?>
    </div>
  </div>
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Full Name</label>
    <div class="col-sm-10">
      <input value="<?php echo $fullName;?>" type="text" class="form-control" name="fullName" id="fullName" placeholder="Full Name">
       <?php if (array_key_exists("fullName",$field_errors)) { echo $field_errors["fullName"]; }?>
    </div>
  </div>
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <select class="form-control" name="title" id="title">
        <option <?php if ($title == '') { echo 'selected';}?> value=''></option>
        <option <?php if ($title == 'Mr.') { echo 'selected';}?> value='Mr.'>Mr.</option>
        <option <?php if ($title == 'Mrs.') { echo 'selected';}?> value='Mrs.'>Mrs.</option> 
        <option <?php if ($title == 'Miss.') { echo 'selected';}?> value='Miss.'>Miss.</option> 
        <option <?php if ($title == 'Dr.') { echo 'selected';}?> value='Dr.'>Dr.</option> 
        <option <?php if ($title == 'Prof.') { echo 'selected';}?> value='Prof.'>Prof.</option>
        <option <?php if ($title == 'Other') { echo 'selected';}?> value='Other'>Other</option>   
      </select>
      <?php if (array_key_exists("title",$field_errors)) { echo $field_errors["title"]; }?>
      <?php
        if ($title == 'Other') {
          echo "<input type='text' value='$other' class='form-control top-margin' name='other' id='other' placeholder='Specify'>";
          if (array_key_exists("other",$field_errors)) { 
            echo "<span id='other_error'>".$field_errors["other"]."</span>";
          }
        }
      ?>
      
    </div>
  </div>
  <div class="form-group">
    <label for="enterYear" class="col-sm-2 control-label">Enter Year</label>
    <div class="col-sm-10">
      <input value="<?php echo $enterYear;?>"type="text" class="form-control" name="enterYear" id="enterYear" placeholder="Enter Year">
      <?php if (array_key_exists("enterYear",$field_errors)) { echo $field_errors["enterYear"]; }?>
    </div>
  </div>
  <div class="form-group">
    <label for="programme" class="col-sm-2 control-label">Programme</label>
    <div class="col-sm-10">
      <input  autocomplete="off" value="<?php echo $programme;?>" type="text" class="form-control" name="programme" id="programme" placeholder="programme">
      <?php if (array_key_exists("programme",$field_errors)) { echo $field_errors["programme"]; }?>
    </div>
  </div>
  <div class="form-group">
    <label for="entryType" class="col-sm-2 control-label">Entry Type</label>
    <div class="col-sm-10">
      <select class="form-control" id="entryType" name="entryType">
        <option <?php if ($entryType == '') { echo 'selected';}?> value=""></option>
        <option <?php if ($entryType == 'Normal') { echo 'selected';}?> value="Normal">Normal</option>
        <option <?php if ($entryType == 'Mature') { echo 'selected';}?> value="Mature">Mature</option>
      </select>
      <?php if (array_key_exists("entryType",$field_errors)) { echo $field_errors["entryType"]; }?>
    </div>
  </div> 
  <div class="form-group">
    <label for="award" class="col-sm-2 control-label">Award</label>
    <div class="col-sm-10">
      <select class="form-control" id="award" name="award">
        <option value=""></option>
        <option <?php if ($award == 'Distinction') { echo 'selected';}?> value="Distinction">Distinction</option>
        <option <?php if ($award == 'Credit') { echo 'selected';}?> value="Credit">Credit</option>
        <option <?php if ($award == 'Pass') { echo 'selected';}?> value="Pass">Pass</option>
        <option <?php if ($award == 'First_Class') { echo 'selected';}?> value="First_Class">First Class (1)</option>
        <option <?php if ($award == 'Upper_Second') { echo 'selected';}?> value="Upper_Second">Upper Second Class (2:1)</option>
        <option <?php if ($award == 'Lower_Second') { echo 'selected';}?> value="Lower_Second">Lower Second Class (2:2)</option>
        <option <?php if ($award == 'Third_Class') { echo 'selected';}?> value="Third_Class">Third Class (3)</option>
        <option <?php if ($award == 'Fail') { echo 'selected';}?> value="Fail">Fail</option>
      </select>
      <?php if (array_key_exists("award",$field_errors)) { echo $field_errors["award"]; }?>
    </div>
  </div>
  <div class="form-group">
    <label for="awardYear" class="col-sm-2 control-label">Award Year</label>
    <div class="col-sm-10">
      <input value="<?php echo $awardYear;?>" type="text" class="form-control" name="awardYear" id="awardYear" placeholder="Award Year">
      <?php if (array_key_exists("awardYear",$field_errors)) { echo $field_errors["awardYear"]; }?>
    </div>
  </div>
  <div class="form-group">
    <label for="gradingSystem" class="col-sm-2 control-label">Grading System</label>
    <div class="col-sm-10">
      <select class="form-control" name='gradingSystem' id="gradingSystem" name="gradingSystem">
        <option value=""></option>
        <?php
          for ($i = 0; $i < count($grading_systems_array); $i++) {
            $option_value = str_replace(" ","_", $grading_systems_array[$i]);
            if (str_replace("_"," ", $gradingSystem) == $grading_systems_array[$i]) {
              echo "<option selected value='$option_value'>$grading_systems_array[$i]</option>";
            } else {
              echo "<option value='$option_value'>$grading_systems_array[$i]</option>";
            }
          }
        ?>
      </select>
      <?php if (array_key_exists("gradingSystem",$field_errors)) { echo $field_errors["gradingSystem"]; }?>
    </div>
  </div>  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-default formbutton" name="submit" type="submit">Next >></button>
    </div>
  </div>
</form>


<?php
  require "../layout/footer.php";
?>
  <script type="text/javascript">
    $(document).ready(function() {
      $("select#title").change(function() {
        var title = $(this).val();
        if (title == 'Other') {
          if (!$('input#other').length) {
            $(this).after("<input type='text' class='form-control top-margin' name='other' id='other' placeholder='Specify'>");
          }
        } else {
          $('input#other').remove();
          $('span#other_error').remove();
        }
      });
    });
  </script>
              

<script>
<!--
$(function()
{
  var programmes = [<?php 
    for ( $i = 0; $i < count($programmes_array); $i++) { 
    echo "{value: '$programmes_array[$i]', data: '$programmes_array[$i]'},"; 
  } ?>];
        
    $('#programme').autocomplete(
    {
      lookup: programmes,
      onSelect: function (suggestion) {}
    });
});
-->
</script>
