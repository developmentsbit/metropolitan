

<?php
session_start();
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");

	$db = new database();

	@$explode=explode('and',$_REQUEST['className']);
	@$explodegroup=explode('and',$_REQUEST['groupName']);
	
	if($_SESSION["type"]=="Main Admin")
	{
			$select_subject_name="SELECT * FROM `add_subject_info`  WHERE `class_id`='$explode[0]' AND `group_id`='$explodegroup[0]' GROUP BY `subject_name` ORDER BY `serial` ASC";
 

	}
	else
	{
		$select_subject_name="SELECT * FROM `add_subject_info`  WHERE `class_id`='$explode[0]' AND `group_id`='$explodegroup[0]' GROUP BY `subject_name` ORDER BY `serial` ASC";
	}

	
//	print $select_subject_name;

	$check_name=$db->select_query($select_subject_name);
	
	if($check_name)
	{
	if($check_name>0)
		{
			print '<option value="" disabled selected >Select Name</option>';
		}
		while($fetch_type=$check_name->fetch_array())
		{
			print "<option value='$fetch_type[0]and$fetch_type[3]'>".$fetch_type[3]."</option>";		
		}
	}
	else
	{
		print "<option value='NULL'>"."Null"."</option>";	
	}
	
	
	?>