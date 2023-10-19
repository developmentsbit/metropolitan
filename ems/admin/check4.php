

<?php
	error_reporting(1);
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");

	$db = new database();

	

if(isset($_POST["Submit"]))
{

$select="SELECT `student_id` FROM `running_student_info` WHERE `class_id`='312301060012' and `group_id`='322301060031';";
$selectdata=$db->select_query($select);

while($fetch=$selectdata->fetch_array())
{

    
	 $insert_select_subject="INSERT INTO `subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$fetch[0]','312301060012','322301060031','362308100622')";
     $check_Selctive=$db->insert_query($insert_select_subject);
		

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