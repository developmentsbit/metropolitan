

<?php
	error_reporting(1);
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");

	$db = new database();

	

if(isset($_POST["Submit"]))
{

$select="SELECT `student_id`,`class_id`,`year`,`class_roll`,`group_id`,`section_id` FROM `running_student_info`";
$selectdata=$db->select_query($select);

while($fetch=$selectdata->fetch_array())
{

	$sql ="INSERT INTO `student_academic_record` (`student_id`,`class_id`,`year`,`class_roll`,`groupID`,`section`) VALUES('$fetch[0]','$fetch[1]','$fetch[2]','$fetch[3]','$fetch[4]','$fetch[5]')";
	
	$result=$db->insert_query($sql);
		
	


}





 }




?>

<!DOCTYPE html>
<html>
<head>
	<title> </title>
</head>
<body>
<form method="post">

	<input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>