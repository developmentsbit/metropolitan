<?php
	error_reporting(1);
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
	
	if(isset($_POST["stotalstd"])){
		$ClassId=explode('and',$_POST["ClassId"]);
		//print_r($ClassId);
		$ExamId=explode('and',$_POST["ExamId"]);
		$Session=$db->escape($_POST["Session"]);
		$sql="SELECT *  FROM `gnerate_marks` WHERE `ClassID`='$ClassId[0]' AND `ExamID`='$ExamId[0]' AND `session`='$Session' GROUP BY `studentID`";
		$result=$db->select_query($sql);
		if($result){
				$rows=$result->num_rows;
				print "Total Student &nbsp;=&nbsp;".$rows;
		}
	}
	
	if(isset($_POST["resultGen"])){
			$ClassId=explode('and',$_POST["ClassId"]);
		//print_r($ClassId);
		$ExamId=explode('and',$_POST["ExamId"]);
		$Session=$db->escape($_POST["Session"]);
		
			$exam_sub="SELECT `compulsory_subject` FROM `exam_type_info` WHERE `exam_id`='$ExamId[0]'";
		$selectexam_sub=$db->select_query($exam_sub);
		if($selectexam_sub){
				$total_exam_sub=$selectexam_sub->fetch_array();
			
			
		}		
		
	   $marks_entry_sub="SELECT `SubjectId` FROM `marksheet` WHERE `ExamId`='$ExamId[0]' AND `ClassId`='$ClassId[0]' AND `Session`='$Session' GROUP By `SubjectId`";
	  // echo $marks_entry_sub;
		$select_marks_entry_sub=$db->select_query($marks_entry_sub);
		if($select_marks_entry_sub){
				$total_marks_entry_sub=$select_marks_entry_sub->num_rows;
				

		}
		
// 		if($total_exam_sub[0]!=$total_marks_entry_sub)
// 		{
// 		    	print "Total Compulsory Subject : $total_exam_sub[0] <br> Total Marks Entry:$total_marks_entry_sub <br> You can not able to generate GPA.<br>";
// 		}
		
	
		
// 		if($total_exam_sub[0]==$total_marks_entry_sub)
// 		{
		
		if(isset($ClassId) && $ClassId != "Select One" && isset($ExamId) && $ExamId != "Select Exam Name" && isset($Session) && !empty($Session))
		{
				$sqlg="SELECT *  FROM `gnerate_marks` WHERE `ClassID`='$ClassId[0]' AND `ExamID`='$ExamId[0]' AND `session`='$Session' GROUP BY `studentID`";
		$result=$db->select_query($sqlg);
		if($result){
						$rows=$result->num_rows;
						print "<input type='hidden' value='$rows' id='tstd' />";
				}
		
				$from=$db->escape($_POST["from"]);
				$to=$db->escape($_POST["to"]);
				if(isset($from) && $from != "" && isset($to) && $to != ""){
						$countStudent="SELECT * FROM `gnerate_marks` WHERE `ClassID`='$ClassId[0]' AND `ExamID`='$ExamId[0]' AND `session`='$Session'  GROUP BY `studentID` ORDER BY `studentRoll` ASC LIMIT $_POST[from],$_POST[to]";
						//print $countStudent;
						$countStudent=$db->select_query($countStudent);
						if($countStudent){
								while($fetch_student=$countStudent->fetch_array()){
								$delet="DELETE FROM `result` WHERE `STD_ID`='$fetch_student[studentID]' AND `classId`='$fetch_student[ClassID]' AND `session`='$fetch_student[session]' AND `examId`='$fetch_student[ExamID]'";
								$db->delete_query($delet);
										$sqlCountSubject="SELECT `add_subject_info`.`subject_name`,`select_subject_type`,`gnerate_marks`.* FROM `gnerate_marks` 
INNER JOIN `add_subject_info` ON `add_subject_info`.`id`=`gnerate_marks`.`subjectID`
WHERE `gnerate_marks`.`studentID`='$fetch_student[studentID]' AND `gnerate_marks`.`ClassID`='$fetch_student[ClassID]' AND `gnerate_marks`.`ExamID`='$fetch_student[ExamID]' AND `gnerate_marks`.`session`='$fetch_student[session]'";
//print $sqlCountSubject;

										$flag=0;
										$total_sub=0;
										$total_grade=0;
										$cgpa=0;
										$withOutOp=0;
										$failsubcount=0;
										$resultCSubje=$db->select_query($sqlCountSubject);
										if($resultCSubje){
										
										
											while($fetchCsub=$resultCSubje->fetch_array()){
											
												if($fetchCsub["select_subject_type"] == 'OptionalSubject')
												{
														if($fetchCsub['gradePoint']>2)
														$total_grade=($total_grade+($fetchCsub['gradePoint']-2));
														//print $total_grade;
												
												}
												else
											 {
													
												
														if($fetchCsub['letterGrade']=='F' &&  $fetchCsub["select_subject_type"] != 'OptionalSubject')
															{
																$flag=1;
																 $failsubcount=$failsubcount+1;		
																//print $flag;
															}
															
														
															$withOutOp=$withOutOp+$fetchCsub['gradePoint'];
															//print $withOutOp;
														
															 $total_sub++;
															$total_grade=$total_grade+$fetchCsub['gradePoint'];		
															 								//print $total_grade;
												}
												
											
											}//2nd loop
									//	echo 'Entry :'.$total_sub,', Total sub: '.$total_exam_sub[0];
												if($total_grade>0 && $total_sub==$total_exam_sub[0])
												{

													$cgpa=$total_grade/$total_sub;

													$cgp=substr($cgpa,0,4);
													 $extra=substr($cgpa,4,1);

													 if($extra>=5)
													 {
													 	$cgpa=$cgp+.01;
													 }
												}
												//print $cgpa;
//echo "Total Sub :".$total_sub."->".$total_exam_sub[0];
													
													
													if($withOutOp>0 and $total_sub==$total_exam_sub[0])
													{

														$wopcgpa=$withOutOp/$total_sub;
														$wcgp=substr($wopcgpa,0,4);
														 $extra=substr($wopcgpa,4,1);

														 if($extra>=5)
														 {
														 	$wopcgpa=$wcgp+.01;
														 }

													}
													
													if($total_sub!=$total_exam_sub[0])
													{
													    	$flag=1;
													    
													}
													
												//print $wopcgpa;
												
													$wgpa=$wopcgpa;
													$gpa=$cgpa;
													//	echo "Total Subject".$total_exam_sub[0];
													//print $gpa;
													if($flag==1)
													{
														$wgpa="0.00";
														$gpa="0.00";
													}
													
													if($gpa > 5.00)
													{
														$gpa = 5.00;
													
													}
													
													
													$insertSql="INSERT INTO `result` (`STD_ID`,`std_roll`,`classId`,`GroupID`,`session`,`examId`,`CGPA`,`witoutOptional`,`totalFailSub`,`Year`) 
													VALUES('$fetch_student[studentID]','$fetch_student[studentRoll]','$fetch_student[ClassID]',$fetch_student[GroupID],'$fetch_student[session]','$fetch_student[ExamID]','$gpa','$wgpa','$failsubcount','')";
													$db->insert_query($insertSql);
										}
								
								}//1st loop
								if(isset($db->sms)){echo $db->sms;}
						}
				}
				else {
				
					print "Please Enter the Limit";
				}
		}
		
		else {
			print "Please Fill Up All Fields";
		}
	}
 
?>