<?php

try{
$db = new PDO('mysql:host=localhost;dbname=transcript', 'root', 'personal');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $db->prepare("SELECT * FROM `tblProgrammes` ORDER BY `tblProgrammes`.`ProgrammeID` ASC "); 
// NUM // ASSOC // BOTH // FETCH_LAZY // FETCH_OBJECT // FETCH_UNIQUE
$query->execute();

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	echo $row['ProgrammeID'] . '<br />' . $row['ProgrammeName'];
}

$query->closeCursor();

} catch(PDOException $e){
	var_dump($e);
}
