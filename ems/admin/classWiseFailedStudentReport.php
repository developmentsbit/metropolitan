<!-- //showClassWiseMeriteList.php -->

  <?php
error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
		$clId=$_GET["clID"];
		$examId=$_GET["exId"];
		$session=$_GET["session"];
			$sqlProjectInfo="SELECT * FROM `project_info`";
			$result_query=$db->select_query($sqlProjectInfo);
			if($result_query){
					$fetch_query=$result_query->fetch_array();
				
			}
	
		$sql_2="SELECT `result`.*,`add_class`.`class_name`,`exam_type_info`.`exam_type` FROM `result`
JOIN `add_class` ON `add_class`.`id`=`result`.`classId` JOIN `exam_type_info` ON `exam_type_info`.`exam_id`=`result`.`examId`  WHERE `result`.`classId`='$clId'  AND `result`.`examId`='$examId' AND `result`.`session`='$session'";	
//	print $sql_2;
		$resultSql=$db->select_query($sql_2);
		if($resultSql){
				$fetchsql=$resultSql->fetch_array();
		}
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Class Wise Failed Student Merit List</title>

	<script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
	
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<style>
	@media print{
			.noneBtnForprin{
				display:none;
			}
			.not{
				display:none;
			}
			#dont{
				display:none;
			}
			.dontPritntd{
			display:none;
			}
			@page 
			{
				size:  auto;   /* auto is the initial value */
				margin: 0mm;  /* this affects the margin in the printer settings */
			}
		
			html
			{
				background-color: #FFFFFF; 
				margin: 0px;  /* this affects the margin on the html before sending to printer */
			}
		
			body
			{
				border: solid 0px blue ;
				margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
			}
		}
</style>
</head>

	<body>
  	<form name="teacherinfo" action="" method="post"  enctype="multipart/form-data" class="form-horizontal marksEditEntry" >
            <div class="col-md-10 col-md-offset-1"  style="border:2px #CCCCCC solid; margin-top:10px;"><br/> <br/>
                <span class="text-justify text-uppercase text-warning" style="font-weight: bold; padding-top: 15px; font-size: 18px;"><strong style="padding-left:5px"></strong></span><br/>
			
                <table cellpadding="0" cellspacing="0"  class="table table-responsive table-hover " style="margin-top:0px;">					
                			<tr style="border:1px #CCCCCC solid">
									<td align="center"><img src="all_image/logoSDMS2015.png" style="height:80px; padding-left:5px; padding-top:2px;"/></td>
										<td align="center" colspan="11">
												<span class="text-justify text-info" style="font-size:24px;"><strong> <?php echo $fetch_query["institute_name"];?> </strong></span><br/>
								<span class="text-justify text-info" style="font-size:15px; "><strong><?php echo $fetch_query["location"];?> </strong></span><br/>
									<span class="text-justify text-info" style="font-size:20px; "><strong><?php if($resultSql){echo $fetchsql["class_name"];}else{echo "";}?> </strong></span><br/>	
										</td>
							</tr>
							
							<tr style="border:1px #CCCCCC solid" class="warning">
									<td align="left" colspan="4"><span class="text-justify text-info" style="font-size:14px;"><strong> Exam Type 	: 	<?php if($resultSql){ echo $fetchsql["exam_type"];}else {echo "";}?> </strong></span></td>
									<td align="center" colspan="4"><span class="text-justify text-info" style="font-size:14px;"><strong>  	Session 	: 	<?php if($resultSql){ echo $session;}else {echo "";}?> </strong></span></td>
									<td align="right" colspan="4"></td>
							</tr>
							<tr class="" style="border:1px #CCCCCC solid">
									<td colspan="11" align="center"><span class="text-justify text-danger" style="font-size:16px;"><strong>  Class Wise Failed Student  Merit List </strong></span> </td>
							</tr>
							
							
							<tr align="center">
								<td style="border:1px #999999 solid; width: 60px;">Merit Position</td>
								<td style="border:1px #999999 solid; width: 60px;">Roll No.</td>
								<td style="border:1px #999999 solid; width: 60px;">ID</td>
								<td style="border:1px #999999 solid;text-align: left;">Student's Name</td>
								<td style="border:1px #999999 solid;text-align: left;">Father's Name </td>
								<td style="border:1px #999999 solid;text-align: left;">Mother's Name </td>
								<td style="border:1px #999999 solid;text-align: left;">Gender</td>

								

								
								<td style="border:1px #999999 solid;">GPA</td>
								<td style="border:1px #999999 solid;">Failed Subject</td>
								<td style="border:1px #999999 solid;text-align: center;">Total Marks </td>
								<td style="border:1px #999999 solid;text-align: center;">Comments </td>
							</tr>
							
							<?php 
							
				$totalPassedStudent="SELECT COUNT(*) AS 'total' FROM `result`  WHERE  `result`.`classId`='$clId' AND `result`.`session`='$session' AND `result`.`examId`='$examId' AND  `result`.`CGPA` !='0.00'";
			//	echo $totalPassedStudent;
				$selectTotalPassedStudent=$db->select_query($totalPassedStudent);
				if($selectTotalPassedStudent)
				{
				    $merit=$selectTotalPassedStudent->fetch_array();
				    $sl=$merit[0];
				}
							
						$select="SELECT `totalFailSub` FROM `result` WHERE `result`.`classId`='$clId' AND `result`.`session`='$session' AND `result`.`examId`='$examId' AND  `result`.`CGPA` ='0.00' GROUP BY `totalFailSub` ORDER BY `totalFailSub` ASC";

						$resultquery=$db->select_query($select);
						if($resultquery)
						{
							while($fetch_gpa=$resultquery->fetch_array())
							{
							    if($fetch_gpa[0]!=0)
							    {
							        
							    

							$sql1= "SELECT `totalMarks` FROM `result` WHERE `result`.`classId`='$clId' AND `result`.`session`='$session' AND `result`.`examId`='$examId' AND `result`.`totalFailSub`=$fetch_gpa[0] GROUP BY `totalMarks` ORDER BY `totalMarks` DESC";
//echo $sql1;
							$totalMarks=$db->select_query($sql1);
						
							
							//print $sql1."<br><<br>";

							if($totalMarks){
						
								while($fetchTotalMarks=$totalMarks->fetch_array()){


									$selectResultOnRoll="SELECT `result`.*,`student_personal_info`.`student_name`,`father_name`,`mother_name`,`gender` FROM `result`
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`result`.`STD_ID`  WHERE `result`.`classId`='$clId'  AND `result`.`session`='$session'  AND `result`.`examId`='$examId' AND `result`.`totalFailSub`=$fetch_gpa[0] AND `totalMarks`=$fetchTotalMarks[0]  ORDER BY `std_roll` ASC  ";

							$selectRoll=$db->select_query($selectResultOnRoll);
							if($selectRoll){
						
								while($fetchAll=$selectRoll->fetch_array())
							    {
								$sl++;


								$updateMeritPosition="UPDATE `result` SET `meritPosition`='$sl'   WHERE `result`.`classId`='$clId' AND `result`.`session`='$session' AND `result`.`examId`='$examId' AND `result`.`STD_ID`='$fetchAll[0]'";
								$db->select_query($updateMeritPosition);


								//$totalMarks="SELECT SUM(`obtainMark`) FROM `marksheet` WHERE `STudentID`='".$fetchAll[0]."' AND `ExamId`='$examId' AND `Session`='$session'";
							//	$fetch_marks=$db->select_query($totalMarks);
							//	$marks[0]=0;
							//	if($fetch_marks)
							//	{
									//$marks=$fetch_marks->fetch_array();
							//	}



							?>


							<tr align="center" class="">
								<td style="border:1px #999999 solid;"><?php echo $sl; ?></td>
								<td style="border:1px #999999 solid;"><?php echo $fetchAll["std_roll"]; ?></td>
								<td style="border:1px #999999 solid;"><?php echo $fetchAll[0]; ?></td>

								<td style="border:1px #999999 solid;text-align: left; text-transform: uppercase;"><?php echo $fetchAll["student_name"]; ?></td>
								<td style="border:1px #999999 solid;text-align: left; text-transform: uppercase;"><?php echo $fetchAll["father_name"]; ?></td>
								<td style="border:1px #999999 solid;text-align: left; text-transform: uppercase;"><?php echo $fetchAll["mother_name"]; ?> </td>
								<td style="border:1px #999999 solid;text-align: left;"><?php echo $fetchAll["gender"]; ?> </td>
							
								<td style="border:1px #999999 solid;"><?php echo $fetchAll["CGPA"]; ?></td>
									<td style="border:1px #999999 solid;"><?php echo $fetch_gpa[0]; ?></td>

									<td style="border:1px #999999 solid;"><?php echo $fetchTotalMarks[0]; ?></td>

									<td style="border:1px #999999 solid; width: 100px;"></td>
							</tr>
							
						<?php
								}
							}



							 } }
							}
							}
							} 

							?>
							
							<tr class="active" style="border:1px #CCCCCC solid">
									<td colspan="9" align="center" class="dontPritntd"><input type="button" name="print" id="print" value="Print"  onClick="window.print()" class="btn btn-danger btn-sm noneBtnForprin"/> </td>
							</tr>
				</table>
					
				
					
							
                </div>
				
				
		
     </form>
 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
