<?php
	error_reporting(1);
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");
	$db = new database();
	//$id=$db->autogenerat('running_student_info','student_id','std-','10');
	$y ='2022';
	$name  = $_POST["name"];
	$session = $_POST["session"];
	$date = date('d/m/Y');
	$roll = $_POST["roll"];
	$className=explode('and',$_POST["class_name"]);
	$group_name = explode('and',$_POST["group_name"]);
	//print_r($group_name) ;
	//$count=;
	$section = explode('and',$_POST["section"]);
	$id =$_POST["id"];


	$ss="SELECT `running_student_info`.*,`student_acadamic_information`.`session2` FROM `running_student_info` INNER JOIN 
`student_acadamic_information` ON `student_acadamic_information`.`id`=`running_student_info`.`student_id` WHERE `running_student_info`.`student_id`='$id'";
	$result = $db->select_query($ss);

	if($result)
	{
	$fetch= $result->fetch_array();
	
	if(!empty($className) and !empty($group_name)){

		$sql2= "INSERT INTO `student_academic_record` (`student_id`,`class_id`,`session`,`year`,`class_roll`,`groupID`) VALUES ('".$fetch[0]."','".$fetch[1]."','".$fetch[7]."','".$fetch[6]."','".$fetch[2]."','".$fetch[3]."')";
		
			$db->insert_query($sql2);
			$sql3="DELETE FROM `running_student_info` WHERE `student_id`='".$fetch[0]."'";

			$db->delete_query($sql3);
			$sql4="DELETE FROM `subject_registration_table` WHERE `std_id`='".$fetch[0]."'";
			$db->delete_query($sql4);

			$sql5="DELETE FROM `running_student_info`  WHERE `class_id`='".$fetch[1]."' AND `class_roll`='$roll'";
			$db->delete_query($sql5);

			 //$sql5="DELETE FROM `marksheet` WHERE `STudentID`='".$fetch[0]."' AND `ClassId`='".$fetch[1]."' AND `GroupID`='$fetch[3]'";
			// $db->delete_query($sql5);

			// $sql6="DELETE FROM `gnerate_marks` WHERE `STudentID`='".$fetch[0]."' AND `ClassID`='".$fetch[1]."' AND `GroupID`='".$fetch[3]."'";
			// $db->delete_query($sql6);

			// $sql7="DELETE FROM `result` WHERE `STD_ID`='".$fetch[0]."' AND `classId`='".$fetch[1]."' AND `GroupID`='".$fetch[3]."'";
			// $db->delete_query($sql7);

			
		for($a = 0; $a < count($_POST["cmsubject"]);$a++){
			$explodecompulsarysubject=explode('codnumber', $_POST['cmsubject'][$a]);
             $inser_compusaray_Subject="INSERT INTO `subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$id','".$className[0]."','".$group_name[0]."','".$explodecompulsarysubject[0]."')";
              $r_compul=$db->insert_query($inser_compusaray_Subject);
		}
		
		for($n=0; $n <count($_POST["slsubject"]); $n++ )
          {
                 $explopide_selective=explode("codenumber",$_POST['slsubject'][$n]);
                 $insert_select_subject="INSERT INTO `subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$id','".$className[0]."','".$group_name[0]."','".$explopide_selective[0]."')";
                         $check_Selctive=$db->insert_query($insert_select_subject);
          }
			
		if(!empty($_POST["opsubject"]))
          {
                $insert_optional_Subject="INSERT INTO `subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$id','".$className[0]."','".$group_name[0]."','".$_POST["opsubject"]."')";
                $check_optionale_Subejct=$db->insert_query($insert_optional_Subject);
          }
		
		
		 $updatesql="UPDATE `student_acadamic_information` SET `admission_disir_class`='".$className[0]."',`admission_disir_group`='".$group_name[0]."',`session2`='".$session."' WHERE `id`='".$id."'";
		$db->update_query($updatesql);
		
		$sql = "INSERT INTO `running_student_info` (`student_id`,`class_id`,`class_roll`,`group_id`,`section_id`,`datev`,`year`) VALUES ('$id','".$className[0]."','$roll','".$group_name[0]."','".$section[0]."','$date','$y')";
			//print_r($sql);
		$db->insert_query($sql);
		
		if(isset( $db->sms))
			{
				echo $db->sms;
			}
				
		}	
		
	}
	else 
	{
	if(!empty($className) and !empty($group_name)){
	
	
			
	
		for($a = 0; $a < count($_POST["cmsubject"]);$a++){
			$explodecompulsarysubject=explode('codnumber', $_POST['cmsubject'][$a]);
             $inser_compusaray_Subject="INSERT INTO `subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$id','".$className[0]."','".$group_name[0]."','".$explodecompulsarysubject[0]."')";
                        //print_R($inser_compusaray_Subject);
              $r_compul=$db->insert_query($inser_compusaray_Subject);
		}
		
		for($n=0; $n <count($_POST["slsubject"]); $n++ )
          {
                        $explopide_selective=explode("codenumber",$_POST['slsubject'][$n]);
                       
                        $insert_select_subject="INSERT INTO `subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$id','".$className[0]."','".$group_name[0]."','".$explopide_selective[0]."')";
                         $check_Selctive=$db->insert_query($insert_select_subject);
            }
			
			if(!empty($_POST["opsubject"]))
                    {
                        $insert_optional_Subject="INSERT INTO `subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$id','".$className[0]."','".$group_name[0]."','".$_POST["opsubject"]."')";
                         $check_optionale_Subejct=$db->insert_query($insert_optional_Subject);
                    }
		
		 $updatesql="UPDATE `student_acadamic_information` SET `admission_disir_class`='".$className[0]."',`admission_disir_group`='".$group_name[0]."',`session2`='".$session."' WHERE `id`='".$id."'";
$db->update_query($updatesql);
		
		$sql22 = "INSERT INTO `running_student_info` (`student_id`,`class_id`,`class_roll`,`group_id`,`section_id`,`datev`,`year`) VALUES ('$id','".$className[0]."','$roll','".$group_name[0]."','".$section[0]."','$date','$y')";
			//print_r($sql);
		$result=$db->insert_query($sql22);
		
			
		if(isset($db->sms))
			{
				echo $db->sms;
			}
			}
	}
		
?>