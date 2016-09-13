<?php

require_once '../common/student.class.php'; 

if(isset($_GET['pn1']))
   echo Student::getStudent($_GET['pn1'])
   ->fetch()['RegistrationNumber']; 
elseif(isset($_GET['pn2']))
	echo Student::getStudent($_GET['pn2'])
	->fetch()['StudentName'];
elseif(isset($_GET['pn3']))
	echo Student::getStudent($_GET['pn3'])
	->fetch()['Title'];
elseif(isset($_GET['pn4']))
	echo Student::getStudent($_GET['pn4'])
	->fetch()['EnterYear'];
elseif(isset($_GET['pn5']))
	echo Student::getStudent($_GET['pn5'])
	->fetch()['ProgrammeName'];
elseif(isset($_GET['pn6']))
	echo Student::getStudent($_GET['pn6'])
	->fetch()['GradingSystemName'];
elseif(isset($_GET['pn7']))
	echo Student::getStudent($_GET['pn7'])
	->fetch()['EntryType'];
elseif(isset($_GET['pn8']))
	echo Student::getStudent($_GET['pn8'])
	->fetch()['CummulativeGPA'];
elseif(isset($_GET['pn9']))
	echo Student::getStudent($_GET['pn9'])
	->fetch()['Award'];
elseif(isset($_GET['pn10']))
	echo Student::getStudent($_GET['pn10'])
	->fetch()['AwardYear'];
elseif(isset($_GET['pn11']))
	echo Student::getStudent($_GET['pn11'])
	->fetch()['Sex'];
