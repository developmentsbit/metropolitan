
<?php

	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
	
		
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Daily Attendance Sheet </title>
  </head>
  <body>


  		<table class="table table-bordered border-primary">
  		
  		<tr>
  					<th>SL</th>
  					<th>Std ID</th>
  					<th>Roll</th>
  					<th>Student Name</th>
  					<?php

  							$selectDate=$db->link->query("SELECT `attend_date` FROM `attendance` WHERE `class_id`='".$_POST["selectClass"]."' AND `section_id`='".$_POST["section"]."' AND `period_id`='".$_POST["Period"]."' AND `attend_date` BETWEEN '".$_POST["example1"]."' AND '".$_POST["example2"]."' GROUP BY `attend_date`");
  						while($fetch_date=$selectDate->fetch_array())
  						{?>
  								<th><?php print $fetch_date['attend_date']; ?></th>
  						
  						<?php }

  					?>
  					
  					
  		</tr>
  <?php
  $i=1;
$sql=$db->link->query("SELECT `running_student_info`.`student_id`,`class_roll`,`student_personal_info`.`student_name` FROM `running_student_info` 
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id`
WHERE `class_id`='".$_POST["selectClass"]."' AND `group_id`='".$_POST["selectGroup"]."' AND `section_id`='".$_POST["section"]."' ORDER BY `class_roll`");
while($fetch_info=$sql->fetch_array())
{

  ?>
  			<tr>
  					<td><?php print $i++;?></td>
  					<td><?php print $fetch_info[0];?></td>
  					<td><?php print $fetch_info[1];?></td>
  					<td ><span style="text-transform: capitalize;"><?php print $fetch_info[2];?> </span></td>
  					<?php
  					
  						$selectDate=$db->link->query("SELECT `attend_date` FROM `attendance` WHERE `class_id`='".$_POST["selectClass"]."' AND `section_id`='".$_POST["section"]."' AND `period_id`='".$_POST["Period"]."' AND `attend_date` BETWEEN '".$_POST["example1"]."' AND '".$_POST["example2"]."' GROUP BY `attend_date`");
  						

  						while($fetch_date=$selectDate->fetch_array())
  						{?>
  								<th>

  									<?php 

  											$selectAttendance=$db->link->query("SELECT * FROM `attendance` WHERE `class_id`='".$_POST["selectClass"]."' AND `section_id`='".$_POST["section"]."' AND `period_id`='".$_POST["Period"]."' AND  `attend_date`='".$fetch_date['attend_date']."' AND `student_id`='$fetch_info[0]' ");

  											$fetch_att=$selectAttendance->fetch_array();
  											if($fetch_att['attendance']==0)
  											{
  													print "A";
  												//echo $fetch_att['attendance'];
  											}
  											else if($fetch_att['attendance']==1)
  											{
  												print "P";
  											}

  											else if($fetch_att['attendance']==2)
  											{
  												print "L";
  											}





  									 ?>
  										


  									</th>
  						
  						<?php 
  					   }

  					?>
  					
  			</tr>
<?php
	}
?>
		</table>  


  </body>
</html>


