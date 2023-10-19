




 <?php
 	 if(isset($_POST["smsReport"]))
 {
require_once("../../db_connect/conect.php");
$db = new database();


 
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="all_image/shortcurt_iconSDMS2015.png" />
    <title>SMS Sent Report</title>


    </head>
    <body>
    	

 <table class="table table-bordered">
 		<tr>
 				<td colspan="6" align="center"><h3>SMS Sent Report</h3></td>

 		</tr>

 		<tr>
 				<td colspan="3"><h3>Class : <?php

 						$s="SELECT * FROM `add_class` WHERE `id`='".$_POST['className']."'";
 						$q=$db->link->query($s);
 						$f=$q->fetch_array();
 						print $f[2];
 				?></h3></td>
 				<td colspan="3"><h3>Date : <?php print $_POST['selectDate']?></h3></td>

 		</tr>	

 		 		<tr>

 				<td>SL</td>
 				<td>Student ID</td>
 				<td>Roll</td>
 				<td>Phone</td>
 				<td>Name</td>
 				<td></td>
 		</tr>

	<tr>
 			<?php
 			$i=0;

 				$sql="SELECT `sms_history`.`sl`, `sms_history`.`Student_id`,`running_student_info`.`class_roll`,`student_personal_info`.`student_name`,`student_guardian_information`.`guardian_contact`,`sms_history`.`Message` FROM `sms_history`
INNER JOIN `running_student_info` ON `running_student_info`.`student_id`=`sms_history`.`Student_id`
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`sms_history`.`Student_id`
INNER JOIN `student_guardian_information` ON `student_guardian_information`.`id`=`sms_history`.`Student_id`
 WHERE `sms_history`.`Class`='".$_POST['className']."' and `sms_history`.`Date`='".$_POST['selectDate']."'";


 				$query=$db->link->query($sql);
 				while($fetch=$query->fetch_array())
 				{

 			

 						if(strlen($fetch[4])>9)
 						{
 						    	$i++;



 			?>
 		

 				<td><?php print $i; ?></td>
 				<td><?php print $fetch[1]?></td>
 				<td><?php print $fetch[2]?></td>
 				<td><?php print $fetch[4]?></td>
 				<td style="text-transform: uppercase;"><?php print $fetch[3]?></td>
 				<td><?php // print $fetch[5]?></td>
 				
 		
 				
 				
 	
 		<?php
 		
 		if($i%2==0)
 		{
 		    print "</tr><tr>";
 		}
 	}

 }

 	?>

	</tr>	



 </table>

     </body>
     </html>

     <?php

}
 ?>
 
 <input type="button" name="print" class='print' onclick="window.print()" style="background: #ff0000;
	color: #fff;
	height: 35px;
	width: 120px;" value="Print">