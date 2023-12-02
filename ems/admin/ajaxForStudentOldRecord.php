<?php

	error_reporting(1);
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");
    date_default_timezone_set('Asia/Dhaka');

	$db = new database();
	global $msg;
	
		
	$ProjectInfo="SELECT * FROM `project_info`";
		$resultProjectInfo = $db->select_query($ProjectInfo);
			if($resultProjectInfo->num_rows > 0){
					$fetchProjectInfo = $resultProjectInfo->fetch_array();
			}
?>
<style>
	@media print{
			.noneBtnForprin{
				display:none;
			}
			#dont{
				display:none;
			}
			.dontprint{
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
<table width="1200" height="193" border="1" cellpadding="0" cellspacing="0" align="center" style="margin-top:10px;">
  
  <tr>
  	
    <td height="76" colspan="13" align="center">&nbsp;
	<div align="center" style="margin-left:450px;">
	<div style="float:left; clear:right"><img src="all_image/logoSDMS2015.png" style="height:50px; width:50px; " /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
<center> 	<div style="float:left">
			<strong><span style="font-size:22px; font-family:Arial, Helvetica, sans-serif" class="text-success"><?php
				if(isset($fetchProjectInfo)){
					echo $fetchProjectInfo["institute_name"];
				}else {
					echo "";
				}
			?></span></strong><br/>
			<strong><span style="font-size:16px;" class="text-success"><?php
				if(isset($fetchProjectInfo)){
					echo $fetchProjectInfo["location"];
				}else {
					echo "";
				}
			?></span><br/></strong>
	<strong><span style="font-size:16px;" class="text-success">Ex-Student's List </span></strong></div>  </center></div>	</td>
   </tr>
 
  <tr align="center">
    <td width="84" height="24">SL</td>
    <td width="208" width="50">ID </td>
    <td width="208" width="100">Class </td>
    <td width="208" width="100">Session </td>
    <td width="208" width="50">Roll </td>
    <td width="202">Student's Name </td>
    <td width="208">Father's Name </td>
    <td width="208">Father's Name </td>
    
    <td width="96">Gender</td>
    <td width="66">Present Address </td>
    <td width="79">Picture</td>
    <td width="66">Year</td>
    <td width="60">Admin</td>
   
  </tr>
  <?php
  			$sql="SELECT `exstudentreport`.`Id`,`exstudentreport`.`classRoll`,`exstudentreport`.`session`,`exstudentreport`.`year`,`exstudentreport`.`admin`,`student_personal_info`.`student_name`,`student_personal_info`.`father_name`,`student_personal_info`.`mother_name`,`student_personal_info`.`gender`,`add_class`.`class_name`,`exstudentreport`.`session` FROM `exstudentreport`
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`exstudentreport`.`Id`
INNER JOIN `add_class` ON `add_class`.`id`=`exstudentreport`.`ClassId` WHERE `exstudentreport`.`year`='".$_GET["year"]."' order by `exstudentreport`.`ClassId` ASC";
$r=$db->link->query($sql);
if($r)
{
	$i=1;
	while($fetchpreRecord=$r->fetch_array())
	{

			
   
   ?>	
  <tr align="center">
    <td height="21"> <?php print $i++;  ?></td>

    <td> <?php if(isset($fetchpreRecord)) { 
	
	
	echo $fetchpreRecord["Id"]; } else { echo ""; }  ?></td>
    <td> <?php if(isset($fetchpreRecord)) { 
	
	
	echo $fetchpreRecord["class_name"]; } else { echo ""; }  ?></td>
	 <td><?php 
			if(isset($fetchpreRecord)){
				echo $fetchpreRecord['session'];
			}else {
				echo "";
			}
	?></td>
    <td><?php 
			if(isset($fetchpreRecord)){
				echo $fetchpreRecord[1];
			}else {
				echo "";
			}
	?></td>
	
   	
   
    <td align="left">   <?php 
			if(isset($fetchpreRecord)){
				echo $fetchpreRecord[5];
			}else {
				echo "";
			}
	?></td>
    <td align="left">  <?php 
			if(isset($fetchpreRecord)){
				echo $fetchpreRecord[6];
			}else {
				echo "";
			}
	?> </td>
    <td align="left">  <?php 
			if(isset($fetchpreRecord)){
				echo $fetchpreRecord[7];
			}else {
				echo "";
			}
	?></td>
    <td>    <?php if(isset($fetchpreRecord)) { 
	
	
	echo $fetchpreRecord[8]; } else { echo ""; }  ?></td>
	<?php 
												




												
											?>
    <td>&nbsp;</td>
    <td>&nbsp;<img src="../other_img/<?php echo $fetchpreRecord[0];?>.jpg" style=" height:50px; width: 50px;"></td>
    <td>&nbsp;<?php echo $fetchpreRecord[3];?></td>
    <td>&nbsp;<?php echo $fetchpreRecord[4];?></td>


  </tr>
  <?php 	}
}
	 ?>

   <tr class="noneBtnForprin">
  	
    <td height="33" colspan="13" align="center">&nbsp;
	<input type="button" class="btn btn-sm btn-danger" onclick="window.print()" value ="PRINT"/>	</td>
   </tr>
</table>

