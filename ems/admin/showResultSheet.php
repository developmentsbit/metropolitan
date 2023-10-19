  <?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
		$clId=$_GET["clID"];
		$gpId=$_GET["gpna"];
		$examId=$_GET["exId"];
		$session=$_GET["session"];
			$sqlProjectInfo="SELECT * FROM `project_info`";
			$result_query=$db->select_query($sqlProjectInfo);
			if($result_query){
					$fetch_query=$result_query->fetch_array();
				
			}
	
		$sql_2="SELECT `result`.*,`add_class`.`class_name`,`add_group`.`group_name`,`exam_type_info`.`exam_type` FROM `result`
JOIN `add_class` ON `add_class`.`id`=`result`.`classId` JOIN `add_group` ON `add_group`.`id`=`result`.`GroupID`
JOIN `exam_type_info` ON `exam_type_info`.`exam_id`=`result`.`examId`  WHERE `result`.`classId`='$clId' AND `result`.`GroupID`='$gpId' AND `result`.`session`='$session' AND `result`.`examId`='$examId' GROUP BY `result`.`session`";	
	//print $sql_2;
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
    
    <title>Show Result Sheet</title>
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
			.dontPrint{
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
	<script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
	
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

	<body>
  	<form name="teacherinfo" action="" method="post"  enctype="multipart/form-data" class="form-horizontal marksEditEntry" >
            <div class="col-md-10 col-md-offset-1"  style="border:2px #CCCCCC solid; margin-top:10px;"><br/> <br/>
                <span class="text-justify text-uppercase text-warning" style="font-weight: bold; padding-top: 15px; font-size: 18px;"><strong style="padding-left:5px"></strong></span><br/>
			
                <table cellpadding="0" cellspacing="0"  class="table table-responsive table-hover " style="margin-top:0px;">					
                			<tr style="border:1px #CCCCCC solid">
									<td align="center"><img src="all_image/logoSDMS2015.png" style="height:80px; padding-left:5px; padding-top:2px;"/></td>
										<td align="center" colspan="7">
												<span class="text-justify text-info" style="font-size:24px;"><strong> <?php echo $fetch_query["institute_name"];?> </strong></span><br/>
								<span class="text-justify text-info" style="font-size:15px; "><strong><?php echo $fetch_query["location"];?> </strong></span><br/>
									<span class="text-justify text-info" style="font-size:20px; "><strong><?php if($resultSql){echo $fetchsql["class_name"];}else{echo "";}?> </strong></span><br/>	
										</td>
							</tr>
							
							<tr style="border:1px #CCCCCC solid" class="warning">
									<td align="left" colspan="3"><span class="text-justify text-info" style="font-size:14px; padding-left:5px;"><strong>  Group 	: <?php if($resultSql){ echo $fetchsql["group_name"];}else{echo "";}?></strong></span></td>
									<td align="center" colspan="3"><span class="text-justify text-info" style="font-size:14px;"><strong> Exam Type 	: 	<?php if($resultSql){ echo $fetchsql["exam_type"];}else {echo "";}?> </strong></span></td>
									<td align="right" colspan="2"><span class="text-justify text-info" style="font-size:14px;"><strong>  	Session 	: 	<?php if($resultSql){ echo $session;}else {echo "";}?> </strong></span></td>
							</tr>
							<tr  style="border:1px #CCCCCC solid">
									<td colspan="8" align="center"><span class="text-justify text-danger" style="font-size:16px;"><strong>  Result Sheet </strong></span> </td>
							</tr>
							
							
							<tr align="center">
								<td style="border:1px #999999 solid; width: 70px;">Student ID</td>
								<td style="border:1px #999999 solid; width: 70px;">Roll No.</td>
								<td style="border:1px #999999 solid; text-align: left;">Student's Name</td>
								<td style="border:1px #999999 solid;text-align: left;">Father's Name </td>
								<td style="border:1px #999999 solid;text-align: left;">Mother's Name </td>

								<td style="border:1px #999999 solid;text-align: center;">Total Marks </td>
								<td style="border:1px #999999 solid;">GPA (Without Optional)</td>
								<td style="border:1px #999999 solid;">GPA(With Optional)</td>
							</tr>
							
							<?php 
						
						
						$sql1= "SELECT `result`.*,`student_personal_info`.`student_name`,`father_name`,`mother_name`  FROM `result`
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`result`.`STD_ID`  WHERE `result`.`classId`='$clId' AND `result`.`session`='$session' AND `result`.`GroupID`='$gpId' AND `result`.`examId`='$examId'  ORDER BY `result`.`std_roll` ASC";
						
					//	echo $sql1;
						
							$result1=$db->select_query($sql1);
							if($result1){
						
								while($fetchAll=$result1->fetch_array()){
								$sl++;

								$totalMarks="SELECT SUM(`obtainMark`) FROM `marksheet` WHERE `STudentID`='".$fetchAll[0]."' AND `ExamId`='$examId' AND `Session`='$session'";
								$fetch_marks=$db->select_query($totalMarks);
								$marks[0]=0;
								if($fetch_marks)
								{
									$marks=$fetch_marks->fetch_array();
									
									$totalMarks="UPDATE `result` SET `totalMarks`='$marks[0]' WHERE `result`.`classId`='$clId' AND `result`.`session`='$session' AND `result`.`examId`='$examId' AND `result`.`STD_ID`='$fetchAll[0]'";
							     	$db->select_query($totalMarks);

								}
							?>
							<?php 
									if($fetchAll["CGPA"] !="0.00"){
								?>
							<tr align="center" class="">
								<td style="border:1px #999999 solid;"><?php echo $fetchAll[0]; ?></td>
								<td style="border:1px #999999 solid; text-align: center;"><?php echo $fetchAll["std_roll"]; ?></td>
								<td style="border:1px #999999 solid; text-align: left;"><?php echo $fetchAll["student_name"]; ?></td>
								<td style="border:1px #999999 solid;text-align: left;"><?php echo $fetchAll["father_name"]; ?></td>
								<td style="border:1px #999999 solid;text-align: left;"><?php echo $fetchAll["mother_name"]; ?> </td>

								<td style="border:1px #999999 solid;"><?php echo $marks[0]; ?></td>

								<td style="border:1px #999999 solid;"><?php echo $fetchAll["witoutOptional"]; ?></td>

								<td style="border:1px #999999 solid;"><?php echo $fetchAll["CGPA"]; ?></td>
							</tr>
							<?php } else {?>
							<tr align="center" class="danger">
								<td style="border:1px #999999 solid;"><?php echo $fetchAll[0]; ?></td>
								<td style="border:1px #999999 solid;"><?php echo $fetchAll["std_roll"]; ?></td>
								<td style="border:1px #999999 solid;text-align: left; text-transform: uppercase;"><?php echo $fetchAll["student_name"]; ?></td>
								<td style="border:1px #999999 solid;text-align: left; text-transform: uppercase;"><?php echo $fetchAll["father_name"]; ?></td>
								<td style="border:1px #999999 solid;text-align: left; text-transform: uppercase;"><?php echo $fetchAll["mother_name"]; ?> </td>
								<td style="border:1px #999999 solid;"><?php echo $marks[0]; ?></td>
								<td style="border:1px #999999 solid;"><?php echo $fetchAll["witoutOptional"]; ?></td>
								<td style="border:1px #999999 solid;"><?php echo $fetchAll["CGPA"]; ?></td>
							</tr>
							<?php } ?>
							<?php } } ?>
							
							<tr  class="active " style="border:1px #CCCCCC solid">
									<td colspan="8" align="center"> Total Students' : <?php print $sl?> </td>
							</tr>	

							<tr  class="active " style="border:1px #CCCCCC solid">
									<td colspan="8" align="center" class="dontPrint"><input type="button" name="print" id="print" value="Print"  onClick="window.print()" class="btn btn-danger btn-sm noneBtnForprin"/> </td>
							</tr>
				</table>
					
						<ul class="pager not" >
						<?php echo $pagenationCtrl;?>
						</ul>
					
							
                </div>
				
				
		
     </form>
 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
