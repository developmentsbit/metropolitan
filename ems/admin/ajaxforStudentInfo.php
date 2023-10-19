<?php

	error_reporting(1);
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();

	if(isset($_POST["studentinfo"]))
	{
		$stdid=$_POST["stdID"];
		$sql=$db->link->query("SELECT `student_name`,`father_name`,`mother_name`,`gender`,`date_of_brith`,`permanent_village`,`permanent_PO`,`permanent_upazila`,`permanent_distric` FROM `student_personal_info`
INNER JOIN `student_address_info` ON `student_address_info`.`id`=`student_personal_info`.`id` WHERE `student_personal_info`.`id`='$stdid'");
		

		$fetch=$sql->fetch_array();
		print $fetch[0]."&".$fetch[1]."&".$fetch[2]."&".$fetch[3]."&".$fetch[4]."&".$fetch[5]."&".$fetch[6]."&".$fetch[7]."&".$fetch[8];

		
	}


?>