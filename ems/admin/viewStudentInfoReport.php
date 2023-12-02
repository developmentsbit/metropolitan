<?php
session_start();
@error_reporting(1);
  require_once("../db_connect/config.php");
  require_once("../db_connect/conect.php");
  $db = new database();

   
  if($_SESSION["logstatus"] === "Active")
  {

	  $sqlProjectInfo="SELECT * FROM `project_info`";
	  $result_query=$db->select_query($sqlProjectInfo);
	  if($result_query){
	    $fetch_query=$result_query->fetch_array();
	  }

    ?>
    <!DOCTYPE html>
<html>
<head>
	<title>Student's Information</title>
	  <link rel="shortcut icon" href="all_image/shortcurt_iconSDMS2015.png" />
</head>
<body>

<table width="770" style=" border: 1px #000 solid; padding: 0px; " align="center" >
		<tr>	
				<td width="10%"></td>
				<td>
						<div style="float: left; clear: right; width: 20%; text-align: right;  ">  
							<img src="all_image/logoSDMS2015.png" style="max-width: 200px; max-height: 110px; margin-top: 5px;" /> 
						</div>
							

						<div style="float: right; text-align: left; width: 80% ">   
								<ul style=" padding-top:-10px">
				    
							    <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:30px; list-style: none;"><?php print $fetch_query['institute_name']?></li>

							   <li style="list-style: none; margin-top: -10px;">

							   		<p style="font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_query['LocationbAngla']?> </p>
							   	</li>

							    <li style=" list-style: none; margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_query['webAddress']?><br><?php print $fetch_query['phone_number']?>, <?php print $fetch_query['email']; ?> </li>
							 </ul> 

				      </div>
				</td>
				<td width="10%"></td>
		</tr>
	

</table>

<table width="770"  align="center" style="border:1px #000 solid; height: 30px; margin-top:10px;" >
		<tr>	
				<td align="center" bgcolor="#f4f4f4">
							<h3 style="padding: 0px; margin: 0px; ">Student's Information</h3>
				</td>
		</tr>
</table>

<table width="770"  align="center" style="border:1px #000 solid; height: 30px; margin-top:10px;" >
		<tr>	
				<td align="center" bgcolor="#f4f4f4">
						SL.
				</td>

				<td align="left" bgcolor="#f4f4f4">
						Class Name
				</td>

				

			
				
					<td align="left" bgcolor="#f4f4f4">
					 	Male
				</td>
					<td align="left" bgcolor="#f4f4f4">
					 	Female
				</td>
				
					<td align="left" bgcolor="#f4f4f4">
					 		Total Student
				</td>
				
		</tr>

<?php
$netTotal=0;
$male=0;
$totalfemale=0;
$sql=" SELECT `running_student_info`.`class_id`,`add_class`.`class_name`,`add_group`.`group_name`,`add_group`.`id` FROM `running_student_info`
INNER JOIN `add_class` ON `add_class`.`id`=`running_student_info`.`class_id`
INNER JOIN `add_group` ON `add_group`.`class_id`=`running_student_info`.`class_id`
WHERE `running_student_info`.`year`='".date('Y')."' GROUP BY `running_student_info`.`class_id` ORDER BY `add_class`.`index` ASC";
//echo $sql;

	  $r=$db->select_query($sql);
	  if($r){
                $i=1;
	    while($fetch_Info=$r->fetch_array())
	    {


?>
		<tr>
			<td style="border-bottom: 1px #000 solid;"><?php print $i++; ?></td>
			<td style="border-bottom: 1px #000 solid;"><?php print $fetch_Info[1]; ?></td>
			
			
			<td style="border-bottom: 1px #000 solid;">
			    
			    <?php
			   
			        	
					$totalStudentmale="SELECT COUNT(*) AS 'total' FROM `running_student_info` INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id`
					WHERE `class_id`='$fetch_Info[0]' AND `student_personal_info`.`gender`='Male'";
				

					

					$resultmale=$db->select_query($totalStudentmale);
					if($resultmale)
					{
						$fetchMale=$resultmale->fetch_array();
						echo $fetchMale[0];
                        $male=$male+$fetchMale[0];
					}
					
			    ?>
			</td>
			<td style="border-bottom: 1px #000 solid;">  <?php
			        	
					$totalStudentfemale="SELECT COUNT(*) AS 'total' FROM `running_student_info` INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id`
					WHERE `class_id`='$fetch_Info[0]' AND `student_personal_info`.`gender`='Female'";
				

					

					$resultfemale=$db->select_query($totalStudentfemale);
					if($resultfemale)
					{
						$fetchfeMale=$resultfemale->fetch_array();
						echo $fetchfeMale[0];
                        $totalfemale=$totalfemale+$fetchfeMale[0];
					}
					
			    ?></td>
			<td style="border-bottom: 1px #000 solid;" >

			<?php
			$totalStudent=0;
			
					 
					
					$totalStudent="SELECT COUNT(*) AS 'total' FROM `running_student_info` WHERE `class_id`='$fetch_Info[0]'";
				//	echo $totalStudent;

					

					$result=$db->select_query($totalStudent);
					if($result)
					{
						$fetch=$result->fetch_array();
						$totalStudent=$fetch[0];

					}

					print $totalStudent;
			        $netTotal=$netTotal+$totalStudent;

				?>
					</td>
				
		
		
	

			

		</tr>
<?php
   }
	  }
	  ?>

<tr>
		<td colspan="2" align="right">Total :</td>
		<td><?php print $male; ?></td>
		<td><?php print $totalfemale; ?></td>
		<td><?php print $netTotal; ?></td>
</tr>
	  	<tr>
			<td  colspan="6" style="border: 0px;" align="center">
					
	<style>
	@media print{
			.print{
				display:none;
			}


		</style>

				<input type="button" value="Print" align="center"  style="height: 40px; width: 150px; background: #ff0000; color: #fff;" class="print" onclick="window.print()"></input>
			</td>


		</tr>

</table>




</body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
