<?php
        //error_reporting(1);
		@session_start();
if($_SESSION["logstatus"] === "Active")	{
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();
    
$sql="SELECT `running_student_info`.`student_id`,`class_roll`,`student_personal_info`.`student_name`,`father_name`,`mother_name`,`add_class`.`class_name`,`add_group`.`group_name`,`add_section`.`section_name` FROM `running_student_info` 
LEFT JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id`
LEFT JOIN `add_class` ON `add_class`.`id`=`running_student_info`.`class_id`
LEFT JOIN `add_group` ON `add_group`.`id`=`running_student_info`.`group_id`
LEFT JOIN `add_section` ON `add_section`.`id`=`running_student_info`.`section_id`
WHERE `running_student_info`.`class_roll`='".$_GET['stdRoll']."' AND `running_student_info`.`class_id`='".$_GET['clID']."'";

$query=$db->link->query($sql);
if($query)
{
   $fetch=$query->fetch_array(); 
   //print_r($fetch);
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Cover Page</title>
	<style type="text/css">
		
		*{
			padding: 0px; margin: 0px;
		}
		.main{
			height:1123px;
			width:794px;
			background: #fff; 
			margin: auto;
			border: 1px #ccc solid;
		}		


		.title{ font-size: 45px; text-align: center; font-family: sans-serif; padding-top: 30px; letter-spacing: 2px; word-spacing: 5px; text-shadow: 0px 3px 3px #ccc; color: blue; text-transform: uppercase;}
		.subtitle{ font-size: 25px; text-align: center; font-family: sans-serif;  }
		.logo{
			text-align: center; padding-top: 20px;
		}
		.img{height: 100px; box-shadow: 0px 2px 2px #ccc; padding: 10px; background: #fff; border-radius: 10px;}
		.document-title{
			font-size: 30px; text-align: center; font-family: sans-serif; padding-top: 30px; letter-spacing: 1px; word-spacing: 2px; text-shadow: 0px 3px 3px #ccc; color: green; font-weight: bold;
		}
		.examtype{
				font-size: 20px; text-align: center; font-family: sans-serif; padding-top: 10px;
		}
		.image{
			text-align: center; padding-top: 30px;
		}
		

		.pic{
			height: 150px; box-shadow: 0px 2px 2px #ccc; padding: 10px; background: #fff; border-radius: 10px;
		}
		.stdid{
		    text-align:center; padding:10px;
		}

	</style>
</head>
<body>

<div class="main">
	
			<p class="title">Al Helal Academy</p>
			<p class="subtitle">Sonagazi, Feni.</p>
			<p class="logo"> <img src="all_image/logoSDMS2015.png" class="img"></p>

			<p class="document-title">Academic Transcript</p>
			<p class="examtype"><?php print $_GET['exId']?></p>
<?php
$img="../other_img/".$fetch['student_id'].".jpg";
if(file_exists($img))
{
?>
			<p class="image"><img src="<?php print $img?>" class="pic"> </p>
<?php
}
else
{?>
    	<p class="image"><img src="../other_img/std.png" class="pic"> </p>
  
  <?php  
}
?>
			<p class="stdid">Student ID: <?php  print $fetch['student_id']?></p>

			<p class="student_info">
				<table cellpadding="0" cellspacing="0" width="100%" style="padding: 20px;">
					<tr>
						<td width="50"></td>
						<td height="40" align="left">Student's Name </td>
						<td>&nbsp; :&nbsp;</td>
						<td>&nbsp; <?php  print $fetch['student_name']?> &nbsp;</td>


					</tr>
					<tr>
						<td width="50"></td>
						<td height="40" align="left">Father's Name </td>
						<td>&nbsp; :&nbsp;</td>
						<td>&nbsp; <?php  print $fetch['father_name']?> &nbsp;</td>
					</tr>					

					<tr>
						<td width="50"></td>
						<td align="left" height="40">Mother's Name </td>
						<td>&nbsp; :&nbsp;</td>
						<td>&nbsp; <?php  print $fetch['mother_name']?> &nbsp;</td>
					</tr>	

					<tr>
						<td width="50"></td>
						<td align="left" height="40">Class </td>
						<td>&nbsp; :&nbsp;</td>
						<td>&nbsp; <?php  print $fetch['class_name']?> &nbsp;</td>
					</tr>	
					<tr>
						<td width="50"></td>
						<td align="left" height="40">Group </td>
						<td>&nbsp; :&nbsp;</td>
						<td>&nbsp; <?php  print $fetch['group_name']?> &nbsp;</td>
					</tr>					

					<tr>
						<td width="50"></td>
						<td height="40" align="left">Roll </td>
						<td>&nbsp; :&nbsp;</td>
						<td>&nbsp; <?php  print $fetch['class_roll']?> &nbsp;</td>
					</tr>

					<tr>
						<td width="50" height="40"></td>
						<td  align="left">Section </td>
						<td>&nbsp; :&nbsp;</td>
						<td>&nbsp; <?php  print $fetch['section_name']?> &nbsp;</td>


					</tr>


					

					<tr>
						<td width="50"></td>
						<td  align="left" height="40">Obtained Result </td>
						<td>&nbsp; :&nbsp;</td>
						<td>&nbsp; ....................... &nbsp;</td>
					</tr>		
				</table>
<br><br>
				<table cellpadding="0" cellspacing="0" width="100%">
						<tr>
						<td width="50"></td>
						<td  align="left" height="40">Class Teacher </td>
						<td>&nbsp; :&nbsp;</td>
						<td>&nbsp; <?php print $_GET['tn']?> &nbsp;</td>

						<td width="50"></td>
						<td  align="left" height="40">Mobile </td>
						<td>&nbsp; :&nbsp;</td>
						<td>&nbsp; <?php print $_GET['tp']?> &nbsp;</td>

					</tr>	
				</table>

			</p><br>

		<p style="text-align: center; padding: 20px; background: #fff; box-shadow: 0px 2px 2px #ccc; vertical-align:bottom;  background: #24A9E3; color: #fff; font-size: 18px;">
			

			www.alhelalacaemy.edu.bd, Email: alhelalacademysonagazifeni@gmail.com, Mobile: 01728563480
			
		</p>

</div>

</body>
</html>
<?php
}
?>