<?php
 		error_reporting(1);
        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        date_default_timezone_set("Asia/Dhaka");
        $db = new database();
       
       		
        	   $className=$_POST["className"];
        	   $year=$_POST["year"];
        	   $date=$_POST["date"];
        	   $StudentID=$_POST["StudentID"];
	  		   $count=count($_POST["feesid"]);
	  		   	


				//$db->link->query("DELETE FROM `student_dues` WHERE `student_id`='$StudentID'  and `status`='0'");
				//$db->link->query("DELETE FROM  `due_invoice` WHERE  `student_id`='$StudentID'");

	  		   if(!empty($StudentID) && $count)
	  		   {

	  		   	$selectStudent=$db->link->query("SELECT `running_student_info`.`class_roll`,`running_student_info`.`class_id`,`add_class`.`class_name`,`student_personal_info`.`student_name`,`student_personal_info`.`father_name`,`student_personal_info`.`mother_name`,`student_guardian_information`.`guardian_contact` FROM `running_student_info` 
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id`
INNER JOIN `student_guardian_information` ON `student_guardian_information`.`id`=`running_student_info`.`student_id` INNER JOIN `add_class` ON `add_class`.`id`=`running_student_info`.`class_id` WHERE `running_student_info`.`student_id`='$StudentID'");
	  		
   //$invoiceID=$db->withoutPrefix('due_invoice','voucher',date('ymd'),'12');
  // print $invoiceID."<br>";
	  		   	if($selectStudent->num_rows>0)
	  		   	{
	  			
	  			if($count>0)
	  			{
	  				
	  				  $invoiceID=$StudentID.date('md');

						for($i=0;$i<$count;$i++)
						{
								$feeDues=explode('and',$_POST["feesid"][$i]);
								$totalamount=$totalamount+$feeDues[1];
								//print $feeDues[0];
								$sql=$db->link->query("INSERT INTO `due_invoice` (`student_id`,`voucher`,`class_id`,`paid_amount`,`date`,`admin_id`,`month`,`year`,`fk_fee_id`,`defult_Date`) VALUES('$StudentID','$invoiceID','$className','$feeDues[1]','$date','admin','".date('m')."','$year','$feeDues[0]','".date('Y-m-d')."')");
							
						}
						$info=$selectStudent->fetch_array();
						$query="INSERT INTO `student_dues`(`invoice_id`,`date`,`student_id`,`roll`,`name`,`father_name`,`mother_name`,`class_id`,`class_name`,`due`,`mobile_no`,`invoiceExpireDate`,`status`,`duration`,`updated_at`) VALUES('$invoiceID','".date('Y-m-d')."','$StudentID','$info[0]','$info[3]','$info[4]','$info[5]','$info[1]','$info[2]','$totalamount','$info[6]','$date','0','".$_POST['month']."','".date('Y-m-d')."')";
						$sql=$db->link->query($query);
					

						$count=0;

						print "<span style='color:green'><h3> Invoice Generate Successfully!!</h3></span>";


				}
			}
		}


?>