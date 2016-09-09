 <div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li class="active"><a href=''>Menu</a></li>
    <?php
    	@session_start();
    	if($_SESSION['usertype'] == 'clerk' or $_SESSION['usertype'] == 'admin'){
    		echo "
    			<li><a href='../clerk/'>New Student</a></li>
    			<li><a href='../clerk/programmes.php'>Programmes</a></li>
    			<li><a href='../clerk/course.php'>Courses</a></li>
    		";
    	}
    	if($_SESSION['usertype'] == 'validator' or $_SESSION['usertype'] == 'admin'){
    		echo "
    			<li><a href='../validator/index.php'>Validations</a></li>
    		";
    	}
    	if($_SESSION['usertype'] == 'admin'){
    		echo "<li><a href='../admin/''>System Users</a></li>";
    	}

    ?>
  </ul>
</div>
