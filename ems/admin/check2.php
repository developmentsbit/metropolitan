<?php
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");

	$db = new database();
	
	$paid="SELECT `id` FROM `student_personal_info`  WHERE  `id` NOT IN (SELECT `id` FROM `student_previous_result`) ";
	$result=$db->select_query($paid);

	if($result)
	{

			while($fetch=$result->fetch_array())
			{
			   // echo "INSERT INTO `student_guardian_information` (`id`) VALUES('$fetch[0]')";
		        $sql=$db->link->query("INSERT INTO `student_previous_result` (`id`) VALUES('$fetch[0]')");
		
			}
			
			
	}
	
	
	?>