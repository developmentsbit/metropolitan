<?php
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");

	$db = new database();
	
	if(isset($_POST["Checksubject"]))
	{
			$select="SELECT * FROM `onlineexamsubject` WHERE `Class_ID`='".$_REQUEST['className']."'";
			$chek_sub=$db->select_query($select);

			if($chek_sub)
			{
				print "<option value=''>Select Subject</option>";

				while($fetch=$chek_sub->fetch_array())
					{
						print "<option value='$fetch[0]'>".$fetch[2]."</option>";
					}
			}
		}

		if(isset($_POST["ViewquestionaddSub"]))
	{
			$select="SELECT * FROM `onlineexamsubject` 
INNER JOIN `questionadd` ON `questionadd`.`subject`=`onlineexamsubject`.`Subject_ID`
WHERE `questionadd`.`class`='".$_REQUEST['className']."' GROUP BY `questionadd`.`subject`";
			$chek_sub=$db->select_query($select);

			if($chek_sub)
			{
				print "<option value=''>Select Subject</option>";

				while($fetch=$chek_sub->fetch_array())
					{
						print "<option value='$fetch[0]'>".$fetch[2]."</option>";
					}
			}
		}


	if(isset($_REQUEST["checkChapter"]))
	{
			$select="SELECT * FROM `addchapter` WHERE `class_id`='".$_REQUEST['className']."' AND `subject_id`='".$_REQUEST['subjectName']."'";


			$chek_sub=$db->select_query($select);

			if($chek_sub)
			{
				

				while($fetch=$chek_sub->fetch_array())
					{
						print "<option value='$fetch[0]'>".$fetch[3]."</option>";
					}
			}
		}



	if(isset($_POST["checkExam"]))
	{
			$sql="SELECT * FROM `examsetup` WHERE `Class_id`='".$_POST["className"]."' AND `Subject_id`='".$_POST["subjectName"]."' ";
			$chek_sub=$db->select_query($sql);

			if($chek_sub)
			{
				while($fetch=$chek_sub->fetch_array())
					{
						print "<option value='$fetch[0]'>".$fetch[5]."</option>";
					}
			}
	}
?>