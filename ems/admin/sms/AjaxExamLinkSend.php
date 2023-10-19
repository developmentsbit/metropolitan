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
	$smsTitle=$_POST["smsTitle"];
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

$count=count($_POST["stdid"]);
$i=0;
for($i=0;$i<$count;$i++)
{

	$query = "SELECT `running_student_info`.`student_id`,`running_student_info`.`class_id`,`student_guardian_information`.`guardian_contact`,`running_student_info`.`class_roll`,`student_personal_info`.`student_name` FROM `running_student_info`
INNER JOIN `student_guardian_information` ON `running_student_info`.`student_id`=`student_guardian_information`.`id` INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id`
  WHERE `running_student_info`.`student_id`='".$_POST["stdid"][$i]."' ";
  
//  $query="SELECT `running_student_info`.`student_id`,`running_student_info`.`class_id`,`student_guardian_information`.`guardian_contact`,`running_student_info`.`class_roll`,`student_personal_info`.`student_name` FROM `running_student_info`
// INNER JOIN `student_guardian_information` ON `running_student_info`.`student_id`=`student_guardian_information`.`id` 
// INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id` INNER JOIN `subject_registration_table` ON `subject_registration_table`.`std_id`=`running_student_info`.`student_id`
//   WHERE `running_student_info`.`student_id`='".$_POST["stdid"][$i]."' and `subject_registration_table`.`subject_id`='361711070063'";


$roll="";
$phoneNo="";
$date=date('Y-m-d');
$key = "encryption key";
	$sql=$db->select_query($query);
	if($sql)
	{
     		while($fetch = $sql->fetch_array())
     		{
     		    
     		    

                
                $stdNewID= bin2hex(openssl_encrypt($fetch[0],'AES-128-CBC', $key));


     			$CustomMessage="Sub: $smsTitle ";
     		
     			$msg=$CustomMessage.'<br> '.$message.'&std='.$stdNewID;

				if(isset($fetch["guardian_contact"]) && $fetch["guardian_contact"]!="")
				{
					 $recipient  = "880".$fetch["guardian_contact"];     
					 $requestType = 'SINGLE_SMS';    
					 $messageType = 'TEXT';       
					 $num=intval($fetch["guardian_contact"]);
					 if($num>9)
					 {
					 	
					 	$succ='<span style="color:green;">Success</span>';
					$sms = new AdnSmsNotification();
						$sms->sendSms($requestType, $msg, $recipient, $messageType);
						
						
	$smsSent="INSERT INTO `sms_history` (`Student_id`,`Class`,`Group`,`sms_title`,`Message`,`Date`) VALUES('".$fetch[0]."','$type','$date','".$recipient."','$msg','".date('Y-m-d')."')";
		              $db->select_query($smsSent);
		    
					 }
					 else
					 {
					 	 $succ='<span style="color:#ff0000;">Unsuccess</span>';
					 }
				$table.="<tr><td>  $fetch[3] </td><td>  $recipient </td> <td> $msg </td> <td> $succ </td> </tr>";

				}
		    }
	}

}


// $i=0;
// for($i=0;$i<$count;$i++)
// {

// 		$m=$message;
// 		 $smsSent="INSERT INTO `sms_history` (`Student_id`,`Class`,`Group`,`sms_title`,`Message`)
// VALUES('".$_POST["stdid"][$i]."','$type','".$_POST['groupname']."','".$_POST['smsTitle']."','$m')";
// 		    $db->select_query($smsSent);


// }


			$table.="</table>";
			print 	$table;

}


if (isset($_POST["showStudent"])) 
{
	$type=$_POST["type"];
	$message=$_POST["details"];
	$lower=$_POST["lower"];
	$upper=$_POST["upper"]-1;

	

	$table="<table class='table table-hover' style='max-width:1000px;' align='center'>";
	
	$table.="<tr><td> Action </td> <td> Group </td>  <td> ID </td> <td> Roll </td>  <td> Name </td> 
	<td>  Mobile  </td> </tr>";

	$query = "SELECT `running_student_info`.`student_id`,`running_student_info`.`class_id`,`student_guardian_information`.`guardian_contact`,`running_student_info`.`class_roll`,`student_personal_info`.`student_name`,`add_group`.`group_name` FROM `running_student_info`
INNER JOIN `student_guardian_information` ON `running_student_info`.`student_id`=`student_guardian_information`.`id` INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id`  INNER JOIN `add_group` ON `add_group`.`id`=`running_student_info`.`group_id` WHERE `running_student_info`.`class_id`='$type'  AND `running_student_info`.`group_id`='".$_POST['groupname']."' AND`running_student_info`.`class_roll`  BETWEEN $lower AND $upper ORDER BY `running_student_info`.`class_roll` ASC ";
//print 	$query;

$roll="";
$phoneNo="";
	$sql=$db->select_query($query);
	if($sql)
	{
		$i=0;
     		while($fetch = $sql->fetch_array())
     		{
     			$i++;
     			
				$table.="<tr><td> <input type='checkbox' checked='cheched' value='$fetch[0]' name='stdid[]' class='studentID'></input> </td> <td>$fetch[5]</td><td>$fetch[0]</td> <td>  $fetch[3] </td> <td>  $fetch[4] </td>  <td>$fetch[2] </td> <td> $msg </td> <td> $succ </td> </tr>";


				
		    }

		    	$table.="<tr><td colspan='6' align='center'> <input type='button' name='add' id='add' class='btn btn-success' style='width: 120px;'' value='Send SMS' onclick='return sendMessage()'></td> </tr>";



	}
			$table.="</table>";
			print 	$table;

}
	


	if(isset($_POST["showGroup"]))
	{
		
		$select_group="SELECT * FROM `add_group` WHERE `class_id`='".$_POST['className']."'";
		$chek_query=$db->select_query($select_group);


		if($chek_query>0)
		{
			print '<option value="" disabled selected >Select Group</option>';
		}

		while($fetch=$chek_query->fetch_array())
			{
				print "<option value='$fetch[0]'>".$fetch[2]."</option>";
			}


	}

?>

