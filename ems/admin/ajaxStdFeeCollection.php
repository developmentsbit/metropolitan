<?php
	date_default_timezone_set("Asia/Dhaka");
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    error_reporting(0);
	$db = new database();

	$selApp="select * from project_info";
	$queApp=$db->select_query($selApp);
	$fetchApp=mysqli_fetch_assoc($queApp);

		if(isset($_POST["stdFeeCollection"]))
		{
			
			$class=explode('and',$_POST['select_class']);
			$fromdate=$_POST['fromdate'];
			$todate=$_POST['todate'];

			$fd=explode('-',$_POST['fromdate']);
			$td=explode('-',$_POST['todate']);
		$fdate=$fd[2].'-'.$fd[1].'-'.$fd[0];
		$tdate=$td[2].'-'.$td[1].'-'.$td[0];

$dailyAmmount = "SELECT * FROM `student_paid_table` WHERE `defult_Date` BETWEEN '$fdate' AND '$tdate' AND `class_id`='$class[0]'  GROUP BY `voucher` ORDER BY `voucher` ASC ";


$resultAmmount = $db->select_query($dailyAmmount);
if($resultAmmount->num_rows  > 0){
						
?>

<table style="font-size: 14px;" align="center">
	<tr>
		<td colspan="7">
			<table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border:0px; ">
        	<tr>
        		<td  height="50" colspan="4" align="center">
      				<span style="float: left;">  
      					<img src="all_image/logoSDMS2015.png" width="76" height="74" style="" />
      				</span>

    			<ul style=" padding-top:5px">
    				<li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px; list-style: none;"><?php echo $fetchApp["institute_name"]?></li>
   					<li style="list-style: none;"><p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["location"]?></p></li>
    				<li style=" list-style: none; margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["phone_number"].','.$fetchApp["email"];?></li>

    				<li style="list-style: none;"><h4>Student Fee Collection Report</h4></li>

    				

     			</ul>     
      			</td>
				<td style="border-bottom:1px solid #333333"></td>
    		</tr>
			</table>

		</td>
	</tr>
				<tr>
					<td width="24" colspan="7" style="border-top: 1px #000 solid;border-left: 1px #000 solid;border-right: 1px #000 solid; " >
						<span style="padding:20px; font-size: 14px; font-weight: bold;"> Class:<?php print $class[1]; ?> </span>
    					<span style="padding:20px; font-size: 14px; font-weight: bold;">Duration : <?php print $fromdate; ?> - <?php print $todate; ?><span>
    				</td>
				</tr>

				<tr>
					<td width="24" style="border-left:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; padding: 5px; font-weight: bold;">SL</td>
					<td width="100"style="border-left:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;padding: 5px;  font-weight: bold;">Voucher No.</td>
					<td width="150"style="border-left:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; padding: 5px; font-weight: bold;">Date</td>
					<td width="100"style="border-left:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;padding: 5px;  font-weight: bold;">Student ID</td>
					<td width="100"style="border-left:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;padding: 5px;  font-weight: bold;">Roll No.</td>
					<td width="350" style="border-left:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; padding: 5px; font-weight: bold;">Student Name</td>
					
					<td width="100"style="border-left:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;border-right:1px #000 solid; padding: 5px; font-weight: bold;" >Paid Amount</td>
				
				</tr>


				<?php   
						$sl=0;
						$total = 0;
						while($fetchDailyAmmount = $resultAmmount->fetch_array()){
						$sl++;
						$totalpaidamoutbyvou="SELECT SUM(`paid_amount`) FROM `student_paid_table` WHERE `student_id`='$fetchDailyAmmount[student_id]' and voucher='$fetchDailyAmmount[voucher]'";
						$excresult = $db->select_query($totalpaidamoutbyvou)->fetch_array();
					    $total = $total+$excresult[0];
						?>
				<tr>
					<td style="border-left:1px #000 dotted;  border-bottom:1px #000 dotted; padding: 2px;" ><label><?php echo $sl;?> </label>
					</td>
					<td width="106" style="border-left:1px #000 dotted; border-bottom:1px #000 dotted; padding: 2px; ">


						<a target="_blank" href='student_print_vaocher.php?id="<?php echo $fetchDailyAmmount["student_id"];?>"&&Lid="dddd"&&year="<?php print $fd[2]; ?>"&&date="<?php print $tdate; ?>"&&clas="<?php echo $fetchDailyAmmount["class_id"].'and'.'name';?>"&&last_id="<?php echo $fetchDailyAmmount["voucher"];?>"'>
							<?php echo $fetchDailyAmmount["voucher"];?></a>

					</td>
					
					<td style="border-left:1px #000 dotted; border-bottom:1px #000 dotted; padding: 2px; " >
						<?php 
							$ex=explode('-',$fetchDailyAmmount['defult_Date']);
					
							echo  $ex[2].'-'.$ex[1].'-'.$ex[0];
							?>
						

					</td>
					<td style="border-left:1px #000 dotted; border-bottom:1px #000 dotted; padding: 2px; "><?php print $fetchDailyAmmount["student_id"]; ?></td>

				
						<?php
							$forStudentNameAnoroll="SELECT `student_academic_record`.`class_roll`,`student_personal_info`.`student_name` FROM `student_personal_info`
LEFT JOIN `student_academic_record` ON `student_academic_record`.`student_id`=`student_personal_info`.`id`
WHERE `student_academic_record`.`year`='$fd[2]' AND `student_personal_info`.`id`='".$fetchDailyAmmount["student_id"]."'";


							$resulforStudent=$db->select_query($forStudentNameAnoroll);
								if($resulforStudent->num_rows > 0){
								
								$fetcForstudent =$resulforStudent->fetch_array();
								

					 ?>
					 <td style="border-left:1px #000 dotted; border-bottom:1px #000 dotted; padding: 2px; "><?php print $fetcForstudent["class_roll"];?></td>
					 <td  style="border-left:1px #000 dotted; border-bottom:1px #000 dotted; padding: 2px; text-transform: uppercase; "align="left" ><?php echo $fetcForstudent["student_name"];?></td>
					 
					<td style="border-left:1px #000 dotted; border-bottom:1px #000 dotted;border-right:1px #000 dotted; padding: 2px; "  align="right"><?php echo  @$db->my_money_format($excresult[0]);?></td>
				
					<?php
				}
					?>
				</tr>
				<?php }?>
				<tr>
					<td colspan="6"  align="right" style="border-left:1px #000 solid; border-bottom:1px #000 solid; padding: 2px; "><strong>Total Received Amount : </strong></td>
					<td align="right" style="border-left:1px #000 solid; border-bottom:1px #000 solid; border-right:1px #000 solid; padding: 2px; "><strong><?php echo @$db->my_money_format($total);?>/=</strong></td>
				
				</tr>
				<tr>
					<td  colspan="6" align="center">
						
						<input type="button" name="print" value="Print" style="height: 35px; width: 120px; background: #ff0000; color: #fff; " class="print" onclick="window.print()">
					</td>
					
				</tr>

				<?php } else { ?>
				<tr>
					<td  colspan="6" align="right">
						<span><strong class="text-danger">No Data Have Found !!!</strong></span>
					</td>
					
				</tr>
				<?php } ?>
			</table>
		
			<?php
		}


?>