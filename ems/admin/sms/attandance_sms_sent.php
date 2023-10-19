<?php

error_reporting(1);
@session_start();

require_once("../../db_connect/conect.php");
$db = new database();

require_once(__DIR__."/lib/AdnSmsNotification.php");
use AdnSms\AdnSmsNotification;

if (isset($_POST["attendance"])) 
{
	$type=$_POST["type"];
	$month='01';
	$message=$_POST["details"];
	$lower=$_POST["lower"];
	$upper=$_POST["upper"]-1;

	$q = "SELECT `running_student_info`.`student_id`,`running_student_info`.`class_id`,`student_guardian_information`.`guardian_contact`,`running_student_info`.`class_roll` FROM `running_student_info`
INNER JOIN `student_guardian_information` ON `running_student_info`.`student_id`=`student_guardian_information`.`id`  WHERE `running_student_info`.`class_id`='$type' ORDER BY `running_student_info`.`class_roll` ASC ";
echo $q;
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

     			$due=0;
     				$sqltotal="SELECT SUM(`add_fee`.`amount`) AS 'common_total',SUM(`student_account_info`.`AmountExceptional`) AS 'Ex_total' FROM `add_fee` INNER JOIN `student_account_info` ON `student_account_info`.`fee_id`=`add_fee`.`id` WHERE `add_fee`.`fk_month_id` BETWEEN '01' AND '$month' AND `student_account_info`.`studentID`='$fetch[0]'  AND `student_account_info`.`year`='".date('Y')."' AND `student_account_info`.`class_id`='$type'";
     				
     				$selectAmount=$db->select_query($sqltotal);
     				if($selectAmount)
     				{
     						$fetch_amount=$selectAmount->fetch_array();
     				


     				$sqltotaldis="SELECT SUM(`add_discount`.`discount`) FROM `add_discount` 
INNER JOIN `add_fee` ON `add_fee`.`id`=`add_discount`.`feeid` 
WHERE `add_discount`.`student_id`='$fetch[0]' AND `add_discount`.`class_id`='$type' AND `add_discount`.`year`='".date('Y')."' AND `add_fee`.`fk_month_id` BETWEEN '01' AND '$month'";
     				$selectdis=$db->select_query($sqltotaldis);
     				if($selectdis)
     				{
     						$fetchdis=$selectdis->fetch_array();
     				}
     						
     			$sqltotalPaid="SELECT SUM(`student_paid_table`.`paid_amount`) FROM `student_paid_table` 
INNER JOIN `add_fee` ON `add_fee`.`id`=`student_paid_table`.`fk_fee_id` 
WHERE `student_paid_table`.`student_id`='$fetch[0]' AND `student_paid_table`.`year`='".date('Y')."' AND `student_paid_table`.`month`  BETWEEN '01' AND '$month'";
     				$selectPaid=$db->select_query($sqltotalPaid);
     				if($selectPaid)
     				{
     						$fetch_Paid=$selectPaid->fetch_array();
     				}


     				$totalFee=$fetch_amount[0]+$fetch_amount[1];

     				$PaidDis=$fetchdis[0]+$fetch_Paid[0];
     				$due=$totalFee-$PaidDis;



     			}

     				$CustomMessage="Dear $fetch[4], $message : $due/-";
     			// 	.' উক্ত বকেয়া দ্রুত পরিশোধ করতে নির্দেশ দেওয়া যাচ্ছে । ';

     				$msg=$CustomMessage;

				if(isset($fetch["guardian_contact"]) && $fetch["guardian_contact"]!="")
				{
					 $recipient  = "880".$fetch["guardian_contact"];     
					 $requestType = 'SINGLE_SMS';    
					 $messageType = 'TEXT';       
					 $num=intval($fetch["guardian_contact"]);
					
					 if($num>9 && $due>0)
					 {
					 	$phoneNo=$phoneNo.'0'.$fetch["guardian_contact"].',';
					 	$roll=$roll.$fetch[3].',';
					 	$succ='<span style="color:green;">Success</span>';
					 	
					 //	print $msg;
					//	$sms = new AdnSmsNotification();
					//	$sms->sendSms($requestType, $msg, $recipient, $messageType);
						
				//	 $smsSent="INSERT INTO `sms_history` (`Student_id`,`Class`,`Group`,`sms_title`,`Message`,`Date`) VALUES('".$fetch[0]."','$type','$date','".$recipient."','$msg','".date('Y-m-d')."')";
		            // print $smsSent;
		          //    $db->select_query($smsSent);
		              
					 }
					 else
					 {
					 	 $succ='<span style="color:#ff0000;">Unsuccess</span>';
					 }
					 
					  	$table.="<tr><td>  $fetch[3] </td><td>  $recipient </td> <td> $msg </td> <td> $succ </td> </tr>";
					 

					
				}
		    }

		    	$m=$msg;

		   // $smsSent="INSERT INTO `sms_sent_tab` (`date`,`Roll`,`Number`,`Message`,`Admin`) VALUES('".date('Y-m-d')."','$roll','$phoneNo','$m','".$_SESSION["name"]."')";
		  //  $db->select_query($smsSent);


	}
			$table.="</table>";
			print 	$table;

}
	

?>