<?php

error_reporting(1);
@session_start();

require_once("../../db_connect/conect.php");
$db = new database();

require_once(__DIR__."/lib/AdnSmsNotification.php");
use AdnSms\AdnSmsNotification;

if (isset($_POST["sendGuardianMessage"])) 
{
	$type=$_POST["type"];
	$message=$_POST["details"];
	$lower=$_POST["lower"];
	$upper=$_POST["upper"]-1;

	$q = "SELECT `running_student_info`.`student_id`,`running_student_info`.`class_id`,`student_guardian_information`.`guardian_contact`,`running_student_info`.`class_roll` FROM `running_student_info`
INNER JOIN `student_guardian_information` ON `running_student_info`.`student_id`=`student_guardian_information`.`id`  WHERE `running_student_info`.`class_id`='$type' ORDER BY `running_student_info`.`class_roll` ASC ";

	$s=$db->select_query($q);
	$r=$s->num_rows;

	if($lower>$r)
	{
		print "<span style='color:#ff0000;'><h1> Student Limit Exist</h1> </span>";
		
	}
	

	$table="<table class='table table-hover'>";
	$table.="<tr><td colspan='4' align='center'> <span style='color:green;'><h1> Message sent successful!!</h1> </span> </td> </tr>";
	$table.="<tr><td>  Roll </td><td>  Mobile </td> <td> Message </td><td> Action </td> </tr>";

	$query = "SELECT `running_student_info`.`student_id`,`running_student_info`.`class_id`,`student_guardian_information`.`guardian_contact`,`running_student_info`.`class_roll`,`student_personal_info`.`student_name` FROM `running_student_info`
INNER JOIN `student_guardian_information` ON `running_student_info`.`student_id`=`student_guardian_information`.`id` INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id`  WHERE `running_student_info`.`class_id`='$type' AND `running_student_info`.`class_roll` BETWEEN $lower AND $upper ORDER BY `running_student_info`.`class_roll` ASC ";

$roll="";
$phoneNo="";
	$sql=$db->select_query($query);
	if($sql)
	{
     		while($fetch = $sql->fetch_array())
     		{
     				$CustomMessage="AL HELAL ACADEMY. Dear $fetch[4] (Student ID: $fetch[0], Password: 123).";

     				$msg=$message;

				if(isset($fetch["guardian_contact"]) && $fetch["guardian_contact"]!="")
				{
					 $recipient  = "880".$fetch["guardian_contact"];     
					 $requestType = 'SINGLE_SMS';    
					 $messageType = 'TEXT';       
					 $num=intval($fetch["guardian_contact"]);
					
					 if($num>9)
					 {
					 	$phoneNo=$phoneNo.'0'.$fetch["guardian_contact"].',';
					 	$roll=$roll.$fetch[3].',';
					 	$succ='<span style="color:green;">Success</span>';
					 	
					 	
						$sms = new AdnSmsNotification();
						$sms->sendSms($requestType, $msg, $recipient, $messageType);
						
					 $smsSent="INSERT INTO `sms_history` (`Student_id`,`Class`,`Group`,`sms_title`,`Message`,`Date`) VALUES('".$fetch[0]."','$type','$date','".$recipient."','$msg','".date('Y-m-d')."')";
		            // print $smsSent;
		              $db->select_query($smsSent);
		              
					 }
					 else
					 {
					 	 $succ='<span style="color:#ff0000;">Unsuccess</span>';
					 }
					 
					  	$table.="<tr><td>  $fetch[3] </td><td>  $recipient </td> <td> $msg </td> <td> $succ </td> </tr>";
					 

					
				}
		    }

		    	$m="AL HELAL ACADEMY <br> Dear [STUDENT NAME] (Student ID: ......... , Password: ......)<br>".$message;

		   // $smsSent="INSERT INTO `sms_sent_tab` (`date`,`Roll`,`Number`,`Message`,`Admin`) VALUES('".date('Y-m-d')."','$roll','$phoneNo','$m','".$_SESSION["name"]."')";
		  //  $db->select_query($smsSent);


	}
			$table.="</table>";
			print 	$table;

}
	

?>