
<?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();
	
	?>
	<!DOCTYPE html>
	<html lang="en">
  	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student's Old Rigister Book</title>
    <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
    <link rel="stylesheet" href="textEdit/redactor/redactor.css" />
    <script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
    <script src="textEdit/redactor/redactor.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">
	<link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="../js/loading/pace.min.js"></script>
   

 

   <style type="text/css">
		
		@media print{
			.print{
				display:none;
			}
			.notPrint{
				display:none;
			}
}

    @media printt
    {
        a[href]:after {
        		content: none !important;
         }
    }

</style>



   


     <script src="datespicker/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
   
function showIdby(){
  var showdatarigister = "ddddddd";
  var stdId = 	$('#stdId').val();
  var year = 	$('#year').val();
  

  //alert(stdId);
		$.ajax({
				url:"showstudentAccountrecord.php",
				type:"POST",
				data:{showdatarigister:showdatarigister,stdId:stdId,year:year},
				cache:false,
				success:function(data){
					//alert(data);
					$('#showdata').html(data);
					
					
				
					
				}
			});
}


      </script>
	  
	
    </head>
    <body>
    <form name="notice" action="" method="post"  enctype="multipart/form-data" class="form-horizontal" >
	
	<div class="notPrint"> 
		<div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
              <table align="center" class="table table-responsive box noneBtnForprin" style="border:1px #CCCCCC solid; margin-top:30px; color: #000;">
                            <tr>
                <td  class="warning" colspan="3" align="center"><span style="font-size:22px; color:#333; display:block;">
 Student's Demand  Register   (Previous Class)  </span> </td>
            </tr>
			
              <tr>
                <td  class="warning" colspan="3" align="center">
				<div class="col-md-3" style="text-align:right">
				
								<input type="text" autocomplete="off" name="year" class="form-control" id="year" placeholder='<?php echo date('Y') ?>' value="<?php echo date('Y') ?>" style="border-radius:0px;"/>
								&nbsp; &nbsp; &nbsp; &nbsp; 
								
							
								
							
                </div>
                	<div class="col-md-3" style="text-align:right">
                	    
                	    <select class="form-control" name="className" id="className">
                        <option>Select Class</option>
                        <?php 
                            $select_class="SELECT * FROM `add_class` GROUP BY `id` order by `index` asc";
                            $check_query=$db->select_query($select_class);
                            if($check_query){
                                while($fetch_class=$check_query->fetch_array())
                                {
                        ?>
                        <option value="<?php echo $fetch_class[0]; ?>"><?php echo $fetch_class[2];?></option>
                        <?php } } else {?>
                        <option></option>
                        <?php } ?>
                        </select>
                        
                        
				
								
								
							
								
							
                </div>
				
				<div class="col-md-3" style="text-align:right">
				
								<input type="text" autocomplete="off" name="stdroll" class="form-control" id="stdroll" placeholder='Student Roll' style="border-radius:0px;"/>
								<input type="text" autocomplete="off" name="stdId" class="form-control" id="stdId" placeholder='Student ID' style="border-radius:0px;"/>
								&nbsp; &nbsp; &nbsp; &nbsp; 
				</div>
				
				
					<div class="col-md-3" style="text-align:left">
						<input type="submit" name="submit" value="Submit"  style="display:inline; border-radius:0px;" class="btn btn-danger btn-sm" />
					</div>
				 </td>
            </tr>			
			</table>
			</div>	
			</div>
	<div>
			<span id="showdata" >
				

		<!-- 		////////////////////////////////////////////////////////////////////// -->
<?php
		if(isset($_POST["submit"])){
		
		
		$projectinfo="SELECT  * FROM `project_info`";
		$result=$db->select_query($projectinfo);
		if($result>0){
			$fetch_result=$result->fetch_array();
		}
		
		if(!empty($_POST["stdId"]))
		{
		    
		
			$personalinformation = "SELECT `student_academic_record`.*,`add_class`.`class_name`,`student_personal_info`.`student_name`,`father_name`,
`mother_name`,`student_guardian_information`.`guardian_contact`,`student_address_info`.`present_village`,
`present_upazila`,`present_distric`,`add_group`.`group_name`
 FROM `student_academic_record` INNER JOIN 
`add_class` ON `add_class`.`id`=`student_academic_record`.`class_id`
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`student_academic_record`.`student_id`
INNER JOIN `student_guardian_information` ON `student_guardian_information`.`id`=
`student_academic_record`.`student_id`
INNER JOIN `add_group` ON `add_group`.`id`=`student_academic_record`.`groupID`
INNER JOIN `student_address_info` ON `student_address_info`.`id`=`student_academic_record`.`student_id`
WHERE `student_academic_record`.`student_id`='".$_POST["stdId"]."' AND `year`='".$_POST['year']."'";
//echo 	$personalinformation;
}

if(!empty($_POST["stdroll"]))
{
    

            			$personalinformation = "SELECT `student_academic_record`.*,`add_class`.`class_name`,`student_personal_info`.`student_name`,`father_name`,
`mother_name`,`student_guardian_information`.`guardian_contact`,`student_address_info`.`present_village`,
`present_upazila`,`present_distric`,`add_group`.`group_name`
 FROM `student_academic_record` INNER JOIN 
`add_class` ON `add_class`.`id`=`student_academic_record`.`class_id`
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`student_academic_record`.`student_id`
INNER JOIN `student_guardian_information` ON `student_guardian_information`.`id`=
`student_academic_record`.`student_id`
INNER JOIN `add_group` ON `add_group`.`id`=`student_academic_record`.`groupID`
INNER JOIN `student_address_info` ON `student_address_info`.`id`=`student_academic_record`.`student_id`
WHERE `year`='".$_POST['year']."' AND `student_academic_record`.`class_id`='".$_POST["className"]."' AND `student_academic_record`.`class_roll`='".$_POST["stdroll"]."'";
    
    
}


$resultinfo = $db->select_query($personalinformation)->fetch_array();

		?>
	
		
			<div class="col-xs-12 col-sm-12 col-lg-12 col-md-12 " style="border:1px #000000 solid;   margin: auto; ">
				<table width="100%"  >
						
						<tr style="border:1px #FFFFFF solid">
								
								<td colspan="3" style="border:1px #FFFFFF solid; text-align: center;">&nbsp;<b style="font-size:24px; letter-spacing:1px; font-family:Georgia, 'Times New Roman', Times, serif; text-align: center;"><?php echo $fetch_result['institute_name'];?></b></td>
						</tr>
					
						<tr style="border:1px #FFFFFF solid">
								<td colspan="3" style="border:1px #FFFFFF solid; text-align: center;">&nbsp;<span style="font-size:20px; letter-spacing:1px; font-family:Georgia, 'Times New Roman', Times, serif; text-align: center;">
									Student Ledger Book  - <?php print $_POST['year'];?>
								</span></td>
						</tr>
			</table>
				<table width="100%" >
					<tr  style="border:1px #FFFFFF solid">
								<td  style="border:1px #FFFFFF solid">Student's Name</td>
								<td align="center" style="border:1px #FFFFFF solid">:</td>
								<td  style="border:1px #FFFFFF solid">&nbsp;<?php echo $resultinfo["student_name"];?></td>
								
								<td  style="border:1px #FFFFFF solid">Father's Name</td>
								<td align="center" style="border:1px #FFFFFF solid">:</td>
								<td style="border:1px #FFFFFF solid">&nbsp;<?php echo $resultinfo["father_name"];?></td>

								<td style="border:1px #FFFFFF solid">Mother's Name</td>
								<td align="center" style="border:1px #FFFFFF solid">:</td>
								<td  style="border:1px #FFFFFF solid">&nbsp; <?php echo $resultinfo["mother_name"];?></td>
									
								
			</tr>
							
							
						
							
							
							
				</table>
				
				<table width="100%" >
				
								<tr>
									<td  style="border:1px #FFFFFF solid">Roll NO :</td>
									<td  style="border:1px #FFFFFF solid"><?php echo $resultinfo["class_roll"];?></td>
									<td   style="border:1px #FFFFFF solid">Class :</td>
									<td   style="border:1px #FFFFFF solid"><?php echo $resultinfo["class_name"];?></td>
									<td   style="border:1px #FFFFFF solid">Section :</td>
									<td  style="border:1px #FFFFFF solid"><?php echo $resultinfo["section_name"];?></td>
										<td  style="border:1px #FFFFFF solid">ID No :</td>
									<td  style="border:1px #FFFFFF solid"><?php echo $resultinfo["student_id"];?></td>
									<td  style="border:1px #FFFFFF solid">Group :</td>
									<td  style="border:1px #FFFFFF solid"><?php 
									
											if($resultinfo["group_name"]=="Null"){
												print "";
											}else {
												echo $resultinfo["group_name"];
											}
									?></td>
									
								</tr>	
							
				</table>
				
					
				
				<table width="100%" class="tblborder" >
						  <tr>
								
							<th width="6%"  class="heigh" valign="center" > &nbsp; <div class="rotate"  style=" ">মাস</div></th>
										<th width="9%" class="heigh"valign="center" ><div class="rotate">রশিদ নং</div></th>
										<th width="4%" class="heigh"valign="center" ><div class="rotate">বকেয়া</div></th>
										<?php
										
	$selectcou = "SELECT * FROM `coloumn_setup`";

												$resultcol = $db->select_query($selectcou);
													if(count($resultcol) >0)
													{
													while($fetchcol = $resultcol->fetch_array()){
														$explode = explode(' ',$fetchcol["Name"]);
													
															
										?>
							<th width="2%" >
								<div class="rotate">

								<?php echo implode('&nbsp;',$explode);?>
									


								</div></th>
										<?php
										}
										}
										?>
							<th width="14%" class="heigh" valign="center"><div class="rotate">Total</div></th>
							<th width="6%" class="heigh" valign="center"><div class="rotate">Discount </div></th>
							<th width="11%" class="heigh"valign="center" ><div class="rotate">Net&nbsp;Ammount </div></th>

							<th width="10%" class="heigh" valign="center" ><div class="rotate">Total&nbsp;Payment</div></th>
							<th width="12%" class="heigh" valign="center"><div class="rotate">Total&nbsp;Due</div></th>
						
										
										
										
						  </tr>
						  
						  	<?php
								$selMonth = "SELECT * FROM `month_setup` ORDER BY `id` ASC";
								$checkMont=$db->select_query($selMonth);
								if($checkMont)
								{


							
								$totalnetammout = 0;
								$totalpaidammoun = 0;
								$sumdeuammount=0;
								$net_total_Amount=0;
								$net_paid_amount=0;
								$net_discount_Amount=0;

								//Previous dues fixed dora hotaca.............................................
//

									$select_old_due="SELECT `add_fee`.*,`student_account_info`.`fee_id`,`student_account_info`.`AmountExceptional` FROM `add_fee`
								INNER JOIN `student_account_info` ON `add_fee`.`id`=`student_account_info`.`fee_id` WHERE `add_fee`.`title`='Previous dues' 
								AND `student_account_info`.`studentID`='$resultinfo[student_id]' AND `add_fee`.`year`='".$_POST["year"]."' AND `add_fee`.`class_id`='$resultinfo[class_id]'";

								//echo $select_old_due;
								$OlddueCheck=$db->select_query($select_old_due);
								if($OlddueCheck)
								{
									$fetmonth=$OlddueCheck->fetch_array();
									$previousdueamount =$fetmonth['AmountExceptional'];
								}
								else
								{
									$previousdueamount=0;
								}

//Previous dues fixed dora hotaca.............................................
//


						
							while($fetmonth=$checkMont->fetch_array())
								{
								
								
								 $totalammountformont="SELECT `student_account_info`.*,SUM(`add_fee`.`amount`) as montammount,SUM(`student_account_info`.`AmountExceptional`) AS 'exceptionalAmount' FROM `student_account_info`
INNER JOIN `add_fee` ON `add_fee`.`id`=`student_account_info`.`fee_id`
WHERE `student_account_info`.`studentID`='".$resultinfo["student_id"]."' AND `student_account_info`.`year`='".$_POST["year"]."'
AND `add_fee`.`fk_month_id`='$fetmonth[id]'";

//echo $totalammountformont;




	$totaldiscount ="SELECT SUM(`add_discount`.`discount`) AS sumdiscount,`add_fee`.`title` FROM `add_discount`
INNER JOIN `add_fee` ON `add_fee`.`id`=`add_discount`.`feeid`
WHERE `add_discount`.`student_id`='".$resultinfo["student_id"]."' AND `add_discount`.`year`='".$_POST["year"]."' AND `add_fee`.`fk_month_id`='$fetmonth[id]'";



											 $student_paid_ammount = "SELECT SUM(`student_paid_table`.`paid_amount`) as totapaid FROM `student_paid_table`
WHERE `student_paid_table`.`student_id`='".$resultinfo["student_id"]."' AND `student_paid_table`.`year`='".$_POST["year"]."' AND 
`student_paid_table`.`month`='$fetmonth[id]'";


$resultammountformont = $db->select_query($totalammountformont)->fetch_array();
$resultdiscountforma=$db->select_query($totaldiscount)->fetch_array();
$result_paid_ammount_mon = $db->select_query($student_paid_ammount)->fetch_array();


						 $netammount = ($resultammountformont['montammount']+$resultammountformont['exceptionalAmount'])-$resultdiscountforma['sumdiscount'];
						 
						 $netdueammount =  $netammount-$result_paid_ammount_mon['totapaid'];
					// .......................total ...........					


						 	$net_total_Amount=$net_total_Amount+$resultammountformont['montammount']+$resultammountformont['exceptionalAmount'];
						 	$net_discount_Amount=$net_discount_Amount+$resultdiscountforma['sumdiscount'];

						 

						 	$net_paid_amount=$net_paid_amount+$result_paid_ammount_mon['totapaid'];
					
					


						//.............................
								
	?>
						   <tr align="center">
								
								<td align="center"><?php echo $fetmonth[1];?></td>
								<td class="heigh2">
							<?php
								
								 $vourcerno = "SELECT `student_paid_table`.`voucher`,`student_paid_table`.`class_id`,`student_paid_table`.`date` FROM `student_paid_table`  
WHERE `student_paid_table`.`student_id`='".$resultinfo["student_id"]."' 
AND `student_paid_table`.`year`='".$_POST["year"]."' 
AND `student_paid_table`.`month`='$fetmonth[id]'  GROUP BY `student_paid_table`.`voucher`";



$resultvoucernow = $db->select_query($vourcerno);
		if(mysqli_num_rows($resultvoucernow) >0){
			while($fetchvou = $resultvoucernow->fetch_array()){?>

<style type="text/css">

	@media print {
    a[href]:after {
        content: none !important;
    }
}

</style>
				<a target="_blank" class="printt" href='student_print_vaocher.php?id="<?php print $_POST['stdId'] ?>"&Lid="dddd"&year="<?php print $_POST['year'] ?>"&date="<?php print $fetchvou[2];?>"&clas="<?php print $fetchvou[1];?>andNull"&last_id="<?php print $fetchvou[0];?>"'>



			<?php print $fetchvou[0]; ?> </a>

					<?php
			}
		}
								?>
								
								
								</td>
								<td> <?php 

								if($fetmonth['id']=='01')
								{
									echo $previousdueamount;
								}
								else
								{
									echo $sumdeuammount;
								}
									
									

								 ?></td>
								<?php
										$resultcosl = $db->select_query($selectcou);
											if(count($resultcosl) >0)
											{
											while($fetchcols = $resultcosl->fetch_array()){
											
											 $sqlyear="SELECT `columnwisefeesetupforstd`.*,`student_account_info`.*,SUM(`add_fee`.`amount`) AS totalammount,SUM(`student_account_info`.`AmountExceptional`) AS 'exceptionalAmount' FROM 
`student_account_info` INNER JOIN  `columnwisefeesetupforstd` ON  
`columnwisefeesetupforstd`.`fk_fee_id`=`student_account_info`.`fee_id`
INNER JOIN `add_fee` ON `add_fee`.`id`=`student_account_info`.`fee_id`
WHERE `student_account_info`.`studentID`='".$resultinfo["student_id"]."' AND `columnwisefeesetupforstd`.`fk_column_id`='".$fetchcols['id']."'
AND `student_account_info`.`year`='".$_POST["year"]."'  AND `add_fee`.`fk_month_id`='$fetmonth[id]'";

											$resultsql = $db->select_query($sqlyear)->fetch_array();
											
										?>
										<td width="2%"><?php $a=$resultsql['exceptionalAmount']+$resultsql['totalammount'];
										if($a!="0")
											{
												echo $a;
												}  ?></td>
										
										<?php 
										  }  }
										?>
										
										
								<td width="14%">
									<?php
											
												
												echo $sumdeuammount+$resultammountformont['montammount']+$resultammountformont['exceptionalAmount'];
									?>								</td>
								<td>
										<?php
											 
										echo $resultdiscountforma['sumdiscount'];

										?>
								</td>
								<td>
								<?php
										echo ($sumdeuammount+$resultammountformont['montammount']+$resultammountformont['exceptionalAmount'])-$resultdiscountforma['sumdiscount'];

										$sumdeuammount = $sumdeuammount+$netdueammount;

											
								?>
								</td>
								<td>
									<?php

										echo $result_paid_ammount_mon['totapaid'];
									?>
								
								</td>
								<td>
								
								<?php  	echo $sumdeuammount;?>
								</td>	
								
								
										
						  </tr>
						  	<?php
								}  }
								?>
								
					
				
							  
						  
						  
	
</table>


<table width="600" class="table table-responsive">
				
		<tr>
			<td width="15%" height="23"  style="border:1px #FFFFFF solid"> Net Total : <?php echo 
								@$db->my_money_format($net_total_Amount);?></td>
							

								<td width="18%"  style="border:1px #FFFFFF solid">Total Discount : <?php echo @$db->my_money_format($net_discount_Amount);?></td>



</tr>

<tr>
	<td width="18%"  style="border:1px #FFFFFF solid">Total Paid : <?php echo @$db->my_money_format($net_paid_amount);?></td>
							<td width="18%"  style="border:1px #FFFFFF solid">Total Due : <?php 
								$due=$net_total_Amount-($net_discount_Amount+$net_paid_amount);

							echo @$db->my_money_format($due)?></td></tr>
								
			  </table>

	<br>
	<center> 

	<input type="button" onclick="window.print()" value="Print" class="notPrint btn btn-large btn-danger" name="printdoc"></input>

	</center>


				<style type="text/css">  
			.rotate {
  display: inline-block;
  filter: progid: DXImageTransform.Microsoft.BasicImage(rotation=3);
  -webkit-transform: rotate(270deg);
  -ms-transform: rotate(270deg);
  transform: rotate(270deg);
   width: 40px;
   margin-top:100px; 
   margin-bottom:5px;



}

.rotate2{

  display: inline-block;
  filter: progid: DXImageTransform.Microsoft.BasicImage(rotation=3);
  -webkit-transform: rotate(270deg);
  -ms-transform: rotate(270deg);
  transform: rotate(270deg);
   width: 40px;
   margin-top:200px;
   
}
.tblborder,
.tblborder td,
.tblborder th {
  border-collapse: collapse;
  border: 1px solid #000;
}
.tblborder td,
.tblborder th {
  padding: 0px 0px;
  
}

.heigh{
		height:100px; 
	
}
			</style>
</div>
		<?php
		}	?>

				<!-- ////////////////////////////////////////////////////////////////////// -->
			</span>
			
	</div>
			
	</form>
	  </body>
    </html>
		    					

		    					<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
