  <?php
	 error_reporting(1);
    session_start();
	if($_SESSION["logstatus"] === "Active")
	{
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();

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
    
    <title>Student Accounts</title>
	
	
	<style type="text/css">
		
		@media print{
			.print{
				display:none;
			}
			


	</style>
  <script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
	  <script src="textEdit/redactor/redactor.min.js"></script>
  
    <link rel="stylesheet" href="datespicker/datepicker.css">
    

   
     <script src="datespicker/bootstrap-datepicker.js"></script>
	 
	     <script src="../js/bootstrap.min.js"></script>
	 <script type="text/javascript">
	 
	 
	    $(document).ready(function () {
                    
                    $('#example1').datepicker({
                        format: "dd/mm/yyyy"
                    });  
                
                });
				
				
             $(document).ready(function()
  {
        var checking_html = '<img src="search_group/loading.gif" /> Checking...';
        $('#className').change(function()
        {
            $('#item_result').html(checking_html);
                check_availability();
               Check_exam_type();
        });
    
 });

         //function to check username availability   
function check_availability()
{
        var class_name = $('#className').val();
        $.post("check_grou_name.php", { className: class_name },
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#groupname').html(result);
                    $('#item_result').html("");
                    $('#category_result').html('');
                }
                else
                {
                    //show that the username is NOT available
                    document.getElementById('category_result').style.color='RED';
                    $('#category_result').html('No Group Name Found');
                    $('#item_result').html("");
                    $('#groupname').html('');
                }
                
                $('#subject_type').html("");
                $('#sub_name').html("");
                $('#part_name').html('');
                $('#subjectcode').val('');
                 
        });

}

	
		

</script>
    </head>
  <body>
  	<form name="teacherinfo" action="" method="post"  enctype="multipart/form-data" class="form-horizontal marksEditEntry" >
           
			
                <table  height="100" width="960" align="center" style="border:1px #000 solid;" class="print" bgcolor="#f4f4f4">
                    
                    <tr>
                    		<td  colspan="3"><h1> &nbsp; Due Report</h1></td>
                    </tr>

   					 <tr>
                    	
						<td><strong><span class="text-success" style="font-size: 15px;">Year</span></strong></td>
                        <td ><div class="col-md-8">
						 <input type="text"   class="form-control" name="year" style="width:280px; height: 25px; border-radius:0px;" placeholder="<?= date('Y');?>"  value="<?= date('Y');?>">
						 </div></td>
                    
					
					  </tr>
					

					<tr>
                    	<td >
                    		<strong><span class="text-success" style="font-size: 15px;">Select Class</span></strong></td>
                        <td ><div class="col-md-8">
                        <select class="form-control" name="className" id="className" style="width:285px; height: 30px;  font-size: 14px;">
                        <option>Select One</option>
                        <?php 
                            $select_class="SELECT * FROM `add_class`  ORDER BY `index` ASC";
                            $check_query=$db->select_query($select_class);
                            if($check_query){
                                while($fetch_class=$check_query->fetch_array())
                                {
                        ?>
                        <option value="<?php echo "$fetch_class[0]"?>"><?php echo $fetch_class[2];?></option><span id="item_result"></span>
                        <?php } } else {?>
                        <option></option>
                        <?php } ?>
                        </select></div>
                    </tr>


					<tr>
                    	<td >
                    		<strong><span class="text-success" style="font-size: 15px;">Select Class</span></strong></td>
                        <td ><div class="col-md-8">
                        
                        		<select class="form-control" name="selectMonth" id="month" style="width:285px; height: 30px;  font-size: 14px;">

                        		<option value="01">জানুয়ারি</option>
                        		<option value="02">ফেব্রুয়ারি</option>
                        		<option value="03">মার্চ</option>
                        		<option value="04">এপ্রিল</option>
                        		<option value="05">মে</option>
                        		<option value="06">জুন</option>
                        		<option value="07">জুলাই</option>
                        		<option value="08">আগস্ট</option>
                        		<option value="09">সেপ্টেম্বর</option>
                        		<option value="10">অক্টোবর</option>
                        		<option value="11">নভেম্বর</option>
                        		<option value="12">ডিসেম্বর</option>
                        		</select>


                        </div>
                    </tr>

					
					 <tr id="date">
                    	
						
					</tr>
					
					
				
					
                <tr>

                	<td colspan="2" align="left"><input type="submit" name="showdata" value="Show Data" class="btn btn-danger btn-md" style="width: 120px; margin-left: 300px; height: 30px;" onClick="return ShowReportDaily()"></input>
				</td>

			</tr>
                </table>
							
                
				
				 
     </form>
     <?php
     		if(isset($_POST["showdata"])){

     			$selectMonth=$_POST["selectMonth"];
     			//print $selectMonth;
     			


     				if($_POST["className"] != "Select One" and $_POST["year"] != ""){

     					 $sql = "SELECT `student_account_info`.*,`student_personal_info`.`student_name`,`running_student_info`.`class_roll`,`student_guardian_information`.`guardian_contact` FROM `student_account_info`
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`student_account_info`.`studentID`
INNER JOIN `running_student_info` ON `running_student_info`.`student_id`=`student_account_info`.`studentID`
 INNER JOIN `student_guardian_information` ON `student_guardian_information`.`id`=`student_account_info`.`studentID` 
WHERE `student_account_info`.`class_id`='".$_POST['className']."' AND `running_student_info`.`class_id`='".$_POST['className']."' AND student_account_info.`year`='".$_POST['year']."' GROUP BY `student_account_info`.`studentID`
 ORDER BY `running_student_info`.`class_roll` ASC";



			$resulsql = $db->select_query($sql);		
     		 ?>

     			
				 
				 	<table  cellspacing="0" cellpadding="0" align="center" width="960" style="margin-top:20px;" bgcolor="#fff">

<tr>
	<td colspan="10"  style="border-left: 1px #000 solid; border-top: 1px #000 solid;border-right: 1px #000 solid; font-weight: bold; height: 40px; width: 30px; "> 

 <table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
    <tr>

   

      <td  height="50" colspan="4" align="center" >
      	<span style="float: left; border-left: 1px #000 solid;">  <img src="all_image/logoSDMS2015.png" width="76" height="74" style="" /></span>
    <ul style=" padding-top:5px">
    
    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px; list-style: none;"><?php echo $fetchApp["institute_name"]?></li>
   <li style="list-style: none;"><p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["location"]?></p></li>
    <li style=" list-style: none; margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["phone_number"].','.$fetchApp["email"];?></li>
     </ul>      </td>
<td style="border-bottom:1px solid #333333"></td>
    </tr>

</table>

	</td>
</tr>
<tr>
	<td colspan="10"  style="border-left: 1px #000 solid; border-top: 1px #000 solid;border-right: 1px #000 solid; font-weight: bold; height: 40px; width: 30px; "> 
<h3 style="float: left; clear: right;">Month :  
     				  <?php 
			$selMonth = "SELECT * FROM `month_setup` where  `id`='".$selectMonth."'";
			$checkMont=$db->select_query($selMonth);
			if($checkMont)
			{
				if($fetmonth=$checkMont->fetch_array())
					echo $fetmonth[1];
			}

			


     				 
     				 ?>

     				 </h3>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <h2 style="float: left; margin-left: 40px;"> Class :<?php 

			$selMonth = "SELECT * FROM `add_class` where  `id`='".$_POST['className']."'";
			$checkMont=$db->select_query($selMonth);
			if($checkMont)
			{
				if($fetmonth=$checkMont->fetch_array())
					echo $fetmonth['class_name'];
			}

			


     				 
     				 ?></h2>
	</td>
	</tr>

				 					<tr>
				 						<td align="center" style="border-left: 1px #000 solid; border-top: 1px #000 solid;border-right: 1px #000 solid; font-weight: bold; height: 40px; width: 30px; ">SL.</td>
				 						<td align="center"style="border-top: 1px #000 solid;border-right: 1px #000 solid;font-weight: bold; width: 70px; ">ID</td>
				 						<td width="160" align="left"  style="border-top: 1px #000 solid;border-right: 1px #000 solid;font-weight: bold; ">Name</td>
				 						<td align="center" style="border-top: 1px #000 solid;font-weight: bold; border-right: 1px #000 solid; width: 35px;">Roll</td>
				 						<td align="center" style="border-top: 1px #000 solid;font-weight: bold; border-right: 1px #000 solid; width: 35px;">Phone</td>
				 						
				 						<td align="center" style="border-top: 1px #000 solid;font-weight: bold;border-right: 1px #000 solid; ">Amount</td>
				 						<td align="center" style="border-top: 1px #000 solid;font-weight: bold;border-right: 1px #000 solid; ">Discount</td>

				 						<td align="center" style="border-top: 1px #000 solid;font-weight: bold;border-right: 1px #000 solid; ">Paid</td>

				 						<td align="center" style="border-top: 1px #000 solid;font-weight: bold;border-right: 1px #000 solid; " >Due</td>
				 						<td align="center" style="border-top: 1px #000 solid;font-weight: bold;border-right: 1px #000 solid; " >Advance Paid</td>

				 						

				 					</tr>
				 					<?php
			if(count($resulsql)>0){
				$k=1;
				$NetAmount=0;
				$totalDiscount=0;
				$totalAmount=0;
				


				$totalDueAmount=0;
				$totalAdvanceAmount=0;
				


			while ($fetchsql = $resulsql->fetch_array()) {

				$totalfeeAmount=0;

				for($i=1;$i<=$selectMonth;$i++)
     			{
                  if($i<=9)
                    {
                        $mm='0'.$i;
                    }
                    else
                    {
                         $mm=$i;
                    }
			     		$select_amount="SELECT SUM(`add_fee`.`amount`) AS 'common_total',SUM(`student_account_info`.`AmountExceptional`) AS 'Ex_total' FROM `add_fee` 
			INNER JOIN `student_account_info` ON `student_account_info`.`fee_id`=`add_fee`.`id`
			WHERE `add_fee`.`fk_month_id`='$mm' AND `student_account_info`.`studentID`='$fetchsql[studentID]' AND `student_account_info`.`year`='".$_POST['year']."' AND 
			`student_account_info`.`class_id`='".$_POST['className']."'";
					$fetch_amount=$db->select_query($select_amount);
					if($fetch_amount)
					{
						$fetch_fee_amount=$fetch_amount->fetch_array();
						$totalfeeAmount=$totalfeeAmount+($fetch_fee_amount[0]+$fetch_fee_amount[1]);
					}
				}

			?>
									<tr>
										<td  align="center" style="border-left: 1px #000 solid; border-top: 1px #000 solid;border-right: 1px #000 solid; height: 30px; "> <?= $k++;?></td>
				 						<td align="center" style="border-top: 1px #000 solid;border-right: 1px #000 solid; "><?= $fetchsql["studentID"];?></td>

				 						<td align="left" style="border-top: 1px #000 solid;border-right: 1px #000 solid; padding-left:5px; " ><?= $fetchsql["student_name"];?></td>
				 						<td align="center" style="border-top: 1px #000 solid;border-right: 1px #000 solid; " ><?= $fetchsql["class_roll"];?></td>
				 						<td align="center" style="border-top: 1px #000 solid;border-right: 1px #000 solid; " >0<?= $fetchsql["guardian_contact"];?></td>

				 						<td align="right" style="border-top: 1px #000 solid;border-right: 1px #000 solid; ">

										<?php
											print $totalfeeAmount;
											$NetAmount=$NetAmount+$totalfeeAmount;
										?>

                                       </td>



				 						<td align="right" style="border-top: 1px #000 solid;border-right: 1px #000 solid; ">

				 						<?php
				 							$totaldiscountAmount=0;

				for($i=1;$i<=$selectMonth;$i++)
     			{
     			      if($i<=9)
                        {
                            $mm='0'.$i;
                        }
                        else
                        {
                             $mm=$i;
                        }

	     				$select_dis_amount="SELECT SUM(`add_discount`.`discount`) FROM `add_discount`
INNER JOIN `add_fee` ON `add_fee`.`id`=`add_discount`.`feeid` 
WHERE `add_discount`.`student_id`='$fetchsql[studentID]' AND `add_discount`.`class_id`='".$_POST['className']."' AND `add_discount`.`year`='".$_POST['year']."' AND `add_fee`.`fk_month_id`='$mm'";
			
			
			$fetch_dis_amount=$db->select_query($select_dis_amount);
			if($fetch_dis_amount)
			{
				$fetch_fee_dis_amount=$fetch_dis_amount->fetch_array();
				$totaldiscountAmount=$totaldiscountAmount+$fetch_fee_dis_amount[0];

			}
			

			}
     			print $totaldiscountAmount;
     			$totalDiscount=$totalDiscount+$totaldiscountAmount;
     			
			
			?>
		</td>
				 						<td align="right" style="border-top: 1px #000 solid;border-right: 1px #000 solid; ">
				 							


<?php

$totalPaidAmountStd=0;

for($i=1;$i<=$selectMonth;$i++)
    {
        if($i<=9)
        {
            $mm='0'.$i;
        }
        else
        {
             $mm=$i;
        }

			$paidAmount = "SELECT SUM(`student_paid_table`.`paid_amount`) FROM `student_paid_table`
INNER JOIN  `add_fee` ON `add_fee`.`id`=`student_paid_table`.`fk_fee_id`
WHERE `student_paid_table`.`student_id`='$fetchsql[studentID]' AND `student_paid_table`.`year`='".$_POST["year"]."' AND `student_paid_table`.`month`='$mm'";


			$selectPaidAmount=$db->select_query($paidAmount);
			if($selectPaidAmount)
			{
					if($fetchPaidAmount = $selectPaidAmount->fetch_array())
					{
						$totalPaidAmountStd=$totalPaidAmountStd+$fetchPaidAmount[0];

						
					}

			}
			else
			{
				$fetchPaidAmount[0]=0;
			}

}
print $totalPaidAmountStd;

			$totalAmount=$totalAmount+$totalPaidAmountStd;


		?>
				 				</td>

				 						<td  align="right" style="border-top: 1px #000 solid;border-right: 1px #000 solid; ">
				 							<?php
				 							
											$due=$totalfeeAmount-($totaldiscountAmount+$totalPaidAmountStd);
											if($due>0)
											{
												print $due;
												$totalDueAmount=$totalDueAmount+$due;
												
											}

				 						?>


				 						 &nbsp;</td>

				 						 <td  align="right" style="border-top: 1px #000 solid;border-right: 1px #000 solid; ">
				 							<?php
				 							
											$advance=($totaldiscountAmount+$totalPaidAmountStd)-$totalfeeAmount;
											if($advance>0)
											{
												print $advance;
												$totalAdvanceAmount=$totalAdvanceAmount+$advance;
											}
											
				 						?>


				 						 &nbsp;</td>

				 						 

				 						


				 					</tr>
				 					<?php

} ?>
				<tr>
					<td height="40" colspan="5" style=" border-top: 1px #000 solid;border-right: 1px #000 solid;border-left: 1px #000 solid; border-bottom: 1px #000 solid;" align="right">
						<b>Total </b> &nbsp;
					</td>
					
					<td align="right" style=" border-top: 1px #000 solid;border-right: 1px #000 solid; border-bottom: 1px #000 solid;font-weight: bold;">
						<?php print @$db->my_money_format($NetAmount);?>/=
						
					</td>
							<td align="right" style=" border-top: 1px #000 solid;border-right: 1px #000 solid; border-bottom: 1px #000 solid;font-weight: bold;">
						<?php print @$db->my_money_format($totalDiscount);?>/=
					
					</td>
						<td align="right" style=" border-top: 1px #000 solid;border-right: 1px #000 solid; border-bottom: 1px #000 solid;font-weight: bold;">
						<?php print @$db->my_money_format($totalAmount);?>/=
					
					</td>
						<td align="right" style=" border-top: 1px #000 solid;border-right: 1px #000 solid; border-bottom: 1px #000 solid;font-weight: bold;">
						<?php print @$db->my_money_format($totalDueAmount);?>/=
					
					</td>
						<td align="right"  style=" border-top: 1px #000 solid;border-right: 1px #000 solid; border-bottom: 1px #000 solid;font-weight: bold;">
						
						<?php print @$db->my_money_format($totalAdvanceAmount);?>/=
					</td>
						
				</tr>

				<tr>
						<td align="center" height="50" colspan="12" style="border-left: 1px #000 solid;border-right: 1px #000 solid; border-bottom: 1px #000 solid; font-weight: bold;"> <b>Developed by: Skill Based IT [SBIT]</b> </td>
				</tr>

				<tr>
						<td align="center" height="50" colspan="12">

							<input type="submit" value="print" name="print" class="print tn btn-large btn-danger" onclick="window.print()" style=" height: 35px; width: 120px; background: #ff0000; color: #fff;">
						 </td>
				</tr>
<?php

						} else {


							print  "<tr><td colspan='12'>No Data</td></tr>";

						}
				 					?>
				 			</table>
			
		
     		 <?php 	
 }  }
     ?>

  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
