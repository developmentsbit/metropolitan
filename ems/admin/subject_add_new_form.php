<?php
	error_reporting(1);
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");

	$db = new database();
	// 
	$sql=$db->link->query("SELECT `student_id`,`class_id`,`group_id` FROM `running_student_info` WHERE `class_id`='311609230007' AND `group_id`='321609230017'");
	while($fetch=$sql->fetch_array())
	{
	    $select="INSERT INTO `subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$fetch[0]','".$fetch[1]."','".$fetch[2]."','362112050543')";
	    //echo $select;
       // $db->insert_query($select);
	}
	



              
	?>