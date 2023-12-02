<?php
	error_reporting(1);
	@session_start();

	if($_SESSION["logstatus"] === "Active")
	{	

			require_once("../db_connect/config.php");
		    require_once("../db_connect/conect.php");
			date_default_timezone_set("Asia/Dhaka");
			$db = new database();

			if(isset($_POST["resultgenerate"]))
			{

				  $lower=$_POST['lower'];
				  $upper=$_POST['upper'];
				  $sub_name=$_POST['sub_name'];
				  $part_name=$_POST['part_name'];
				  $examtype=$_POST['examtype'];
				  $onlineExam=$_POST['onlineExam'];
				  $session=$_POST['session'];
				  $ex=explode("and",$examtype);

				  $selectMarks="SELECT `num_question` FROM `examsetup` WHERE `id`='$onlineExam'";
				  $selectMarks=$db->link->query($selectMarks);
				  $fetchResult=$selectMarks->fetch_array();
				  $totalMarks=$fetchResult[0];

			$sql=" SELECT `subject_registration_table`.`std_id`,`running_student_info`.`class_roll`,`running_student_info`.`class_id`,
`running_student_info`.`group_id`,`online_result`.`Marks` FROM `subject_registration_table`
 INNER JOIN `running_student_info` ON `running_student_info`.`student_id`=`subject_registration_table`.`std_id`
 INNER JOIN `online_result` ON `online_result`.`ID`=`subject_registration_table`.`std_id`
 WHERE `subject_id`='".$_POST['sub_name']."' AND `online_result`.`examID`='".$_POST['onlineExam']."'  ORDER BY `running_student_info`.`student_id` ASC LIMIT $lower,$upper";
		// print $sql;

		$query=$db->link->query($sql);
		if($query->num_rows>0)
		{
			print "Total Student : ".$query->num_rows.'<br>';
			while($fetch=$query->fetch_array())
			{

						 if($fetch[4]>=(80*$totalMarks)/100 && $fetch[4]<=100*$totalMarks/100)
						{
								$p='5.00';
								$g='A+';
						}
						else if($fetch[4]>=70*$totalMarks/100 && $fetch[4]<=79*$totalMarks/100)
						{
								$p='4.00';
								$g='A';
						}
						else if($fetch[4]>=60*$totalMarks/100 && $fetch[4]<=69*$totalMarks/100)
						{
								$p='3.50';
								$g='A-';
						}
						else if($fetch[4]>=50*$totalMarks/100 && $fetch[4]<=59*$totalMarks/100)
						{
								$p='3.00';
								$g='B';
						}
						else if($fetch[4]>=40*$totalMarks/100 && $fetch[4]<=49*$totalMarks/100)
						{
								$p='2.00';
								$g='C';
						}
						else if($fetch[4]>=33*$totalMarks/100 && $fetch[4]<=39*$totalMarks/100)
						{
								$p='1.00';
								$g='D';
						}
						else
						{
								$p='0.00';
								$g='F';
						}


        
						$insertMarks="UPDATE `marksheet` set `Mcq`='$fetch[4]' where `STudentID`='$fetch[0]' and `ClassId`='$fetch[2]' and `GroupID`='$fetch[3]' and `ExamId`='$ex[0]' and `SubjectId`='$sub_name' and `SubjectPartID`='$part_name'"; 
					//	$insertMarks="INSERT INTO `marksheet` (`STudentID`,`StudentRoll`,`ClassId`,`GroupID`,`ExamId`,`SubjectId`,`SubjectPartID`,`Session`,`Count_Ass`,`Creative`,`Mcq`,`Practical`,`obtainMark`,`LetterGrade`,`GradePoint`)VALUES('$fetch[0]','$fetch[1]','$fetch[2]','$fetch[3]','$ex[0]','$sub_name','$part_name','$session','0','0','$fetch[4]','0','$fetch[4]','$g','$p')"; 
					//	print $insertMarks.'<br>';
						$db->link->query($insertMarks);
						

			}

			print "Insert Successfully!!";


		}

 	}

	
	}

?>