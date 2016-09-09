<?php

	require "../layout/header.php";
	require "../layout/sidebar.php";
	require "../common/grade.class.php";

?>


<div class="container">
<div class="page-header">
<h2> Add Student Course </h2>
</div>
</div>
<?php

require ('config.php');
 
// Escape user inputs for security
$CourseCode = mysqli_real_escape_string($link, $_POST['coursecode']);
$CourseVersion = mysqli_real_escape_string($link, $_POST['courseversion']);//need to work on course version
$CourseName = mysqli_real_escape_string($link, $_POST['coursename']);
$CreditHours = mysqli_real_escape_string($link, $_POST['credithours']);
$CourseYearOffered = mysqli_real_escape_string($link, $_POST['courseyearoffered']);
 
//Insertion query
$sql = "INSERT INTO tblCourses (CourseCode, CourseVersion, CourseName,CreditHours, CourseYearOffered) VALUES ('$CourseCode', '$CourseVersion', '$CourseName','$CreditHours','$CourseYearOffered')";
if(mysqli_query($link, $sql)){
   	echo "<div class='container'><p class='text-justfy' >Course Added Successfully!!</p></div>";
	
} else{
    	echo "<div class='container'><p class='text-justfy'>Fields empt!! No course added!!</p></div>";
}
 
// close connection
mysqli_close($link);
?>
<div class="container">
     <ul class="pager">
    <li class="previous" ><a href="Test.html">Go Back</a></li>
    </ul>
</div>

<?php

	require "../layout/footer.php";
