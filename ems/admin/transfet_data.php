

<?php
	error_reporting(1);
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");

	$db = new database();
	$prefix=date("y"."m"."d");
	

if(isset($_POST["Submit"]))
{


$select="SELECT * FROM `add_fee`  WHERE `year`='2023' AND `class_id`='311609230007' ";
$selectdata=$db->select_query($select);

while($fetch=$selectdata->fetch_array())
{
	$id=$db->withoutPrefix('add_fee','id',"34".$prefix,'12');
	// print "<pre>";
	// print_r($fetch);

	$sql ="INSERT INTO `add_fee`(`id`, `title`, `details`, `amount`, `class_id`, `year`, `fk_month_id`, `Common_Exceptional`, `index`) VALUES ('$id','$fetch[1]','$fetch[2]','$fetch[3]','312301060013','2023','$fetch[6]','$fetch[7]','$fetch[8]')";
//	print $sql;

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
	<input type="text" name="year" >
	<input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>