<?php
	
error_reporting(0);
@session_start();

@date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();

	@$explode=explode('and',$_REQUEST['className']);
	$select_group="SELECT * FROM `add_group` WHERE `class_id`='$explode[0]'";
	$chek_query=$db->select_query($select_group);

	if($chek_query->num_rows>0)
	{
		
			print '<option value="" disabled="" selected="">নির্বাচন করুন</option>';
		

		while($fetch=$chek_query->fetch_array())
			{
				print "<option value='$fetch[0]and$fetch[2]'>".$fetch[2]."</option>";
			}
	}
	else
	{
			print "<option value='NullandNull'>"."Null"."</option>";
	}
	




?>