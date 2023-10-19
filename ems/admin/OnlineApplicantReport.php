<?php
error_reporting(1);
	@session_start();
	
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
	

	$select_school="select * from project_info";
$cheke_school=$db->select_query($select_school);
if($cheke_school)
{
		$fetch_school_information=$cheke_school->fetch_array();
}?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Applicant List</title>

<style>
  @media print{
      .print{
        display:none;
      }


    </style>
	 </head>
	 <body>

	<table width="1200" align="center" style="border: 1px #000 solid; height: 80px; ">
		<tr>	
				<td width="10%" style="border: 0px;"></td>
				<td style="border: 0px;">
						<div style="float: left; clear: right; width: 15%; text-align: center;  ">  
							<img src="all_image/logoSDMS2015.png" style="max-width: 150px; max-height: 100px; " /> 
						</div>
							

						<div style="float: left; clear: right; text-align: center; width: 70% ">   
								<ul>
				    
							    <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:30px; list-style: none;"><?php print $fetch_school_information['institute_name']?></li>

							   <li style="list-style: none; ">

							   		<p style="font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_school_information['location']?> 
   								</p>

							   	</li>

							    <li style=" list-style: none; font-size:14px;font-family:Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold;">Successful Applicant List</li>
							 </ul> 

				      </div>

				      <div style="float: right;  width: 15%; text-align: center;  ">  
							
						</div>
				</td>
				<td width="10%" style="border: 0px;" ></td>
		</tr>
		</table>
	<br>
	<style type="text/css">
			td{ border-right: 1px #000 solid; border-top: 1px #000 solid; }
	</style>



<?php


	
	
				
				 $sql_session="SELECT `reg_student_passward`.*,`reg_student_acadamic_information`.*,`reg_student_address_info`.*,`reg_student_guardian_information`.*,`reg_student_personal_info`.*,`reg_student_previous_result`.* FROM `reg_student_passward` 
INNER JOIN `reg_student_acadamic_information`ON `reg_student_passward`.`studentId`=`reg_student_acadamic_information`.`id` 
INNER JOIN `reg_student_address_info` ON `reg_student_address_info`.`id`=`reg_student_passward`.`studentId` 
INNER JOIN `reg_student_guardian_information` ON `reg_student_guardian_information`.`id`=`reg_student_passward`.`studentId` 
INNER JOIN `reg_student_personal_info` ON `reg_student_personal_info`.`id`=`reg_student_passward`.`studentId` 
INNER JOIN `reg_student_previous_result`ON `reg_student_previous_result`.`id`=`reg_student_passward`.`studentId`
INNER JOIN `student_form_info` ON `student_form_info`.`form_ID`=`reg_student_passward`.`studentId` WHERE `student_form_info`.`status`='1'
GROUP BY `reg_student_personal_info`.`email` ";
				$resultSession  = $db->select_query($sql_session);
					if($resultSession->num_rows > 0){
					?>	<table width="1200" align="center" cellpadding="0" cellspacing="0">
						<tr>
								
							<td align="center" style="border-left: 1px #000 solid">SL NO.</td>
								<td align="center">Student ID</td>
								<td align="center">Password</td>
								<td align="left">&nbsp;Student's Name</td>
								<td align="left">&nbsp;Father's Name</td>
								<td align="left">&nbsp;Mother's Name</td>
								<td align="left" width="100">Date of Birth</td>
								<td align="left" width="100">Gender</td>
								<td align="left" width="100">Group</td>
								<td align="center">Mobile</td>
								<td align="center">TrxID</td>
								<td align="center">Image</td>
								<td align="center"> Roll</td>
								
							</tr>
				<?php		while($fetchSEssion = $resultSession->fetch_array()){
				?>
				
							<tr>
								<td align="center" colspan="13" style="border-left: 1px #000 solid"> <span class="text-success" style="font-size:18px;"><?php echo $fetchSEssion["email"];?></span>
								</td>
							</tr>
							<?php 
$sqlForClass = "SELECT `reg_student_acadamic_information`.*,`add_class`.`class_name` FROM `reg_student_acadamic_information` 
INNER JOIN `add_class` ON `add_class`.`id`=`reg_student_acadamic_information`.`admission_disir_class`
INNER JOIN `reg_student_personal_info` ON `reg_student_personal_info`.`id`=`reg_student_acadamic_information`.`id`
WHERE `reg_student_personal_info`.`email`='$fetchSEssion[email]' GROUP BY `reg_student_acadamic_information`.`admission_disir_class` 
ORDER BY `reg_student_acadamic_information`.`admission_disir_class` ASC";
 									$resultForClass = $db->select_query($sqlForClass);	
									if($resultForClass->num_rows > 0) {
										while($fetchForClass = $resultForClass->fetch_array()){
							?>
							<tr>
								<td align="center" colspan="13" style="border-left: 1px #000 solid; background: #f4f4f4;height: 30px;"><span class="text-info" style="font-size:18px; font-weight: bold; "><?php echo $fetchForClass["class_name"];?> </span>
								</td>
							</tr>
						
							<?php 
	$sqlfordetails  = " SELECT `reg_student_personal_info`.*,`reg_student_acadamic_information`.*,`reg_student_passward`.*,`add_group`.`group_name`,`reg_student_guardian_information`.*,`student_form_info`.*  FROM `reg_student_personal_info` 
 INNER JOIN `reg_student_acadamic_information` ON `reg_student_acadamic_information`.`id`=`reg_student_personal_info`.`id` 
 INNER JOIN `reg_student_guardian_information` ON `reg_student_guardian_information`.`id`=`reg_student_personal_info`.`id` 
 INNER JOIN `reg_student_passward` ON `reg_student_passward`.`studentId`=`reg_student_personal_info`.`id` 
 INNER JOIN `add_group` ON `add_group`.`id`=`reg_student_acadamic_information`.`admission_disir_group` 
 INNER JOIN `student_form_info` ON `student_form_info`.`form_ID`=`reg_student_personal_info`.`id` 
 WHERE `reg_student_personal_info`.`email`='".$fetchSEssion['email']."' AND `reg_student_acadamic_information`.`admission_disir_class`='".$fetchForClass["admission_disir_class"]."' AND `student_form_info`.`status`='1'
 ORDER BY `reg_student_personal_info`.`id` ASC";





 								$resultFordetails = $db->select_query($sqlfordetails);
										if($resultFordetails->num_rows > 0){
										    $sl=0;
											while($fetchfordetails =$resultFordetails->fetch_array()){
											    $sl++;
								
							?>
							<tr>
							
							    <td align="center" style="border-left: 1px #000 solid"><?php echo $sl;?></td>
							    <td align="center"><?php echo $fetchfordetails["studentId"];?></td>
							    <td align="center"><?php echo $fetchfordetails["passward"];?></td>


								<td align="left" style="text-transform: uppercase;">&nbsp; <?php echo $fetchfordetails["student_name"];?></td>
							    <td align="left" style="text-transform: uppercase;">&nbsp;<?php echo $fetchfordetails["father_name"];?></td>
								<td align="left" style="text-transform: uppercase;">&nbsp;<?php echo $fetchfordetails["mother_name"];?></td>
								
								<td align="left">&nbsp;<?php echo $fetchfordetails["date_of_brith"];?></td><td align="left">&nbsp;<?php echo $fetchfordetails["gender"];?></td>

                                <td align="left">&nbsp;<?php echo $fetchfordetails["group_name"];?></td>
								
								
								<td align="center">0<?php echo $fetchfordetails["guardian_contact"];?> </td>		
								<td align="center">

								<?php echo $fetchfordetails["TrxId"];?> </td>
								
								<td align="center"> <a href="../OnlineRegistration/img/<?php echo $fetchfordetails["studentId"];?>.jpg" download="<?php echo $fetchfordetails["studentId"];?>"> <img src="../OnlineRegistration/img/<?php echo $fetchfordetails["studentId"];?>.jpg" style="height:100px; width:120px"></a> </td>
                                <td align="center" width="150"> </td>
							</tr>
							<?php } } } } } ?>

								<tr>
								<td align="center" colspan="12" style="border-right: 0px;">

								<br>
								<center><input type="submit" value="Print" id="print" value="Print" onclick="window.print()"  style="height: 30px; width: 150px; background: #ff0000; color: #fff;" class="print" />
 </center>

								</td>
							</tr>
					</table>
				<?php
	
	}
	
	?>
		 </body>

	</html>
