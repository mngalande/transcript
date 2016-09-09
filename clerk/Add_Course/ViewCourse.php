<html>
<body>
<?php
require('config.php');

$query1="select CourseCode, CourseVersion from tblCourses ";

$result = mysqli_query($link,$query1); //or die(mysql_error());

echo "<table><tr><td>CourseCode</td><td>CourseVersion</td><td></td><td></td>";
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//while($row=mysqli_fetch_array($result))
//while(mysqli_fetch_array($result))
/*{
echo "<tr><td>".$row["coursecode"]."</td>";
echo "<td>".$row["courseversion"]."</td>";
//echo "<td><a href='edit.php?id=".$query2['id']."'>Edit</a></td>";
//echo "<td><a href='delete.php?id=".$query2['id']."'>x</a></td><tr>";
}*/
   




mysqli_close($link);
?>
</table>
</body>
</html>