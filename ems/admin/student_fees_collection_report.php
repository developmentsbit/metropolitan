<?php
@session_start();
date_default_timezone_set("Asia/Dhaka");
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();

	if(isset($_POST["feeCollectionReport"]))
	{
		$class=explode('and', $_POST['ClassId']);
		
		$selApp="select * from project_info";
		$queApp=$db->select_query($selApp);
		$fetchApp=mysqli_fetch_assoc($queApp);


		?>

		<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fees Collection Report</title>
    </head>
    <body>
    		<table class="table table-bordered">
    			<tr>
    				
    										<td align="center"><h1><?php echo $fetchApp["institute_name"]?></h1><h3>Student Wise Collection Report</h3> 
    										<h3>Class :<?php print $class[1];?>, Year : <?php print $_POST['Session'];?> </h3> </td>
    							
    			</tr>

    		
    			<tr>
    				<td>
    					
    							<table class="table table-bordered">
	    							<tr>
	    									<td style="border-right: 1px #000 solid; border-top: 1px #000 solid;  border-left: 1px #000 solid;  "><b>SL</b></td>
	    									<td style="border-right: 1px #000 solid;border-top: 1px #000 solid; "><b>ID</b></td>
	    									<td style="border-right: 1px #000 solid;border-top: 1px #000 solid;  "><b>Present Class</b></td>
	    									<td style="border-right: 1px #000 solid;border-top: 1px #000 solid;  "><b>Present Roll</b></td>
	    									<td style="border-right: 1px #000 solid;border-top: 1px #000 solid;  "><b>Previous Roll</b></td>
	    									<td style="border-right: 1px #000 solid;border-top: 1px #000 solid;  "><b>Name</b></td>
	    									<td style="border-right: 1px #000 solid;border-top: 1px #000 solid;  "><b>Father's Name</b></td>
	    									<td style="border-right: 1px #000 solid;border-top: 1px #000 solid;  "><b>Total Fees</b></td>
	    									<td style="border-right: 1px #000 solid;border-top: 1px #000 solid;  "><b>Discount</b></td>
	    									<td style="border-right: 1px #000 solid;border-top: 1px #000 solid;  "><b>Paid</b></td>
	    									<td style="border-right: 1px #000 solid;border-top: 1px #000 solid;  "><b>Dues</b></td>
	    							</tr>	

	 <?php

$i=0;

$totalPayableFees=0;
$totalDiscountFees=0;
$totalPaidFees=0;
$totalDueFees=0;


	 	$sql="SELECT `student_id`,SUM(`paid_amount`) AS 'total',`year`,`add_class`.`class_name` FROM `student_paid_table` INNER JOIN `add_class` ON `add_class`.`id`=`student_paid_table`.`class_id`
WHERE `year`='".$_POST['Session']."' AND `class_id`='".$class[0]."' GROUP BY `student_id` ORDER BY `student_id` ASC";
$query=$db->link->query($sql);
while($fetch=$query->fetch_array())
{

$i++;

if($_POST['Session']==date('Y'))
{
	$year=$_POST['Session']-1;
}
else
{
	$year=$_POST['Session'];
}

$previousRoll=$db->link->query("SELECT `class_roll` FROM `student_academic_record` WHERE `student_id`='$fetch[0]' and `year`='$year'");

if($previousRoll)
{
	$fetch_roll=$previousRoll->fetch_array();
	$roll=$fetch_roll[0];
}
else
{
	$roll="";
}


$pRoll=$db->link->query("SELECT `class_roll`,`class_name` FROM `running_student_info` 
INNER JOIN `add_class` ON `add_class`.`id`=`running_student_info`.`class_id`
WHERE `running_student_info`.`student_id`='$fetch[0]'");

if($pRoll)
{
	$fetch_present_roll=$pRoll->fetch_array();
	$PresentRoll=$fetch_present_roll[0];
	$PresentClass=$fetch_present_roll[1];

}
else
{
	$PresentRoll="";
	$PresentClass="";

}


$infoStd=$db->link->query("SELECT `student_name`,`father_name` FROM  `student_personal_info` where `id`='$fetch[0]'");
if($infoStd)
{
    $fetch_std_info=$infoStd->fetch_array();
	$name=$fetch_std_info[0];
	$fatherName=$fetch_std_info[1];
}
else
{
	$name="";
	$fatherName="";
}


$Fees=$db->link->query(" SELECT SUM(`AmountExceptional`) AS 'ExFees', SUM(`amount`) AS 'CommonFees' FROM `student_account_info`
INNER JOIN `add_fee` ON `add_fee`.`id`=`student_account_info`.`fee_id`
 WHERE `student_account_info`.`studentID`='$fetch[0]' AND `student_account_info`.`year`='".$_POST['Session']."' AND `student_account_info`.`class_id`='".$class[0]."'");

if($Fees)
{
	$fetch_Fees=$Fees->fetch_array();
	$TotalFees=$fetch_Fees[0]+$fetch_Fees[1];
	
}
else
{
	$TotalFees="0";
	
}


$discount=$db->link->query("SELECT SUM(`discount`) FROM `add_discount` WHERE `student_id`='$fetch[0]' AND `year`='".$_POST['Session']."' AND `class_id`='$class[0]'");

if($discount)
{
	$fetch_discount=$discount->fetch_array();
	$discountAmount=$fetch_discount[0];
}
else
{
	$discountAmount="0";
}
 

 $totalDue=$TotalFees-($discountAmount+$fetch[1]);

$totalPayableFees=$totalPayableFees+$TotalFees;
$totalDiscountFees=$totalDiscountFees+$discountAmount;
$totalPaidFees=$totalPaidFees+$fetch[1];
$totalDueFees=$totalDueFees+$totalDue;
 ?>
	    							<tr>
	    				<td align="left" style="border-right: 1px #000 solid; border-bottom: 1px #000 solid; border-top: 1px #000 solid;  border-left: 1px #000 solid;    "><?php print $i;?></td>
	    									<td align="left" style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;  "><?php print $fetch['0'];?></td>
	    									<td align="left" style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;  "><?php print $PresentClass;?></td>
	    									<td align="left" style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;  "><?php print $PresentRoll;?></td>
	    									<td align="left" style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;  "><?php print $roll;?></td>
	    									<td align="left" style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;  "><?php print $name;?></td>
	    									<td align="left" style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;  "><?php print $fatherName;?></td>
	    									<td align="left" style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;  "><?php print $TotalFees;?></td>
	    									<td align="left" style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;  "><?php print $discountAmount;?></td>
	    									<td align="left" style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;  "><?php print $fetch[1];?></td>
	    									<td align="left" style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;  "><?php print  $totalDue;?></td>
	    							</tr>
	    							<?php
	    						}
	    						?>
	    						<tr>
	    							<td colspan="7" align="right" style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;border-left: 1px #000 solid;font-size: 19px; font-weight: bold;">Total : </td>
	    							<td align="right" style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;font-size: 19px; font-weight: bold;"><?php print $totalPayableFees?></td>
	    							<td align="right"style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;font-size: 19px; font-weight: bold;"><?php print $totalDiscountFees?></td>
	    							<td align="right"style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;font-size: 19px; font-weight: bold;"><?php print $totalPaidFees?></td>
	    							<td align="right"style="border-right: 1px #000 solid;border-bottom: 1px #000 solid;font-size: 19px; font-weight: bold;"><?php print $totalDueFees?></td>
	    						</tr>
    							 </table>
    				</td>
    				<tr>
    					<td align="center"> <input type="button" class="btn btn-danger" name="Print" onclick="window.print()" value="Print" id="print">  </input> </td>
    				</tr>
    			</tr>
    		</table>
    </body>
    </html>

<?php
	}

?>


