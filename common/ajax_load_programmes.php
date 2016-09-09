<?php

require_once '../common/programmes.class.php'; 

if(isset($_GET['pn']))
   echo Programmes::selectProgramme($_GET['pn1'])->fetch()['ProgrammeName']; 
elseif(isset($_GET['er']))
	echo Programmes::selectProgramme($_GET['er1'])->fetch()['EntryRequirements'];
elseif(isset($_GET['d']))
	echo Programmes::selectProgramme($_GET['d1'])->fetch()['Duration'];

