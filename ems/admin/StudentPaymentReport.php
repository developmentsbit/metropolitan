<?php
    error_reporting();
	@session_start();
	date_default_timezone_set("Asia/Dhaka");
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	$db = new database();

		if(isset($_GET["delVocher"]))
		{
				 
				 $delVoucher = "SELECT SUM(`paid_amount`),`student_id`,`voucher`,`class_id`,`date`,`admin_id`,`month`,`year`,`defult_Date` FROM `student_paid_table` WHERE  voucher='".$_GET['delVocher']."'";
			$resultVoucher = $db->select_query($delVoucher);
			if($resultVoucher)
			{
				$fetch=$resultVoucher->fetch_array();
				

				$insert="INSERT INTO `del_voucher`(`voucher`,`student_id`,`class_id`,`paid_amount`,`date`,`admin_id`,`month`,`year`,`defult_Date`,`del_Admin`)VALUES('$fetch[2]','$fetch[1]','$fetch[3]','$fetch[0]','$fetch[4]','$fetch[5]','$fetch[6]','$fetch[7]','$fetch[8]','".$_SESSION["id"]."')";


				$db->insert_query($insert);

				$del="DELETE FROM `student_paid_table` WHERE  voucher='".$_GET['delVocher']."'";
				$dell=$db->link->query($del);
				if($dell)
				{
					print "<script>alert('Delete Successfully!!')</script>";

					print "<script>location='StudentPaymentReport.php'</script>";
				}

				





			}
			

			



		}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title></title>

    	<style type="text/css">
		
		@media print{
			.print{
				display:none;
			}

			a[href]:after {
    content: none !important;
  }

	</style>

  <script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
	  <script src="textEdit/redactor/redactor.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">

   
     <script src="datespicker/bootstrap-datepicker.js"></script>




   
	<script>
	
	  $(document).ready(function () {
                
                $('#date').datepicker({
                    format: "dd-mm-yyyy"
					
                }).on('changeDate', function(e){
					$(this).datepicker('hide');
					ShowReportDaily();
				});  
            
            });
			 $(document).ready(function () {
                    
                    $('#example1').datepicker({
                        format: "dd-mm-yyyy"
                    }).on('changeDate', function(e){
					$(this).datepicker('hide');
					
				});   
                
                });
				
				   $(document).ready(function () {
                 
                    $('#example12').datepicker({
                        format: "dd-mm-yyyy"
                    }).on('changeDate', function(e){
					$(this).datepicker('hide');
					shwoMonthlyReport();
				}); 
				
				
                });
				
				/*<!-- $(document).ready(function () {
                 
                    $('#years').datepicker({
                         minViewMode: 2,
         format: 'yyyy'
                    }).on('changeDate', function(e){
					$(this).datepicker('hide');
					
				}); 
				
				
                });-->*/
				
				
				
				
				/*$("#example12").datepicker( {
					format: "yyyy",
					viewMode: "years", 
					minViewMode: "years"
				}).on('changeDate', function(e){
					$(this).datepicker('hide');
				});*/


			function ShowReportDaily(){
					var date = $('#date').val();
					var forDaily  = "ASDFADSFASDF";
			
							$.ajax({
										url : "showStudentPayment.php",
										data : {date:date,forDaily:forDaily},
										type : "POST",
										success:function(data){
													
												$('#showDailyreport').html(data);
										}
									});
					
					
			}
			
			function shwoMonthlyReport(){
					var frsdate  = $('#example1').val();
					var snddate  = $('#example12').val();
					var monthlyreport = "dd";
					
					if(frsdate !=''  &&  snddate !='' ){
					 	
						
							$.ajax({
										url : "showStudentPayment.php",
										data : {frsdate:frsdate,snddate:snddate,monthlyreport:monthlyreport},
										type : "POST",
										success:function(data){
												
													
												$('#showMonthlyreport').html(data);
										}
									});
										
					}else{
							alert('Please Select The Date !!');
					}
			}
			
			function showYearlyCost(){
					var showEarlypost = "ddd";
					var years =$('#years').val();
					if(years !=""){
						$.ajax({
										url : "showStudentPayment.php",
										data : {years:years,showEarlypost:showEarlypost},
										type : "POST",
										success:function(data){
												
													
												$('#showEarlyCost').html(data);
										}
									});
					
					}else{
							alert('Please Enter The Year !!');
					}
			}
			 
   
	</script>
	
	</head>
	
  <body>




  	  	    <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Student Payment Report</b></div>
  <div class="panel-body">

  	
  <form name="" action="#" method="post"  enctype="multipart/form-data" class="form-horizontal dataFrom">
  	<div class="has-feedback col-xs-12 col-sm-8 col-lg-10 col-md-10  col-md-offset-1 table-bordered" style="">

<ul class="nav nav-tabs print" style="margin-top:20px; ">
  <li class="active"><a data-toggle="tab" href="#home">Daily</a></li>
  <li><a data-toggle="tab" href="#menu1">Mothly</a></li>
  <li><a data-toggle="tab" href="#menu2">Yearly</a></li>
</ul>

<div class="tab-content" style="margin-top:20px;">
  <div id="home" class="tab-pane fade in active print" style="margin-bottom:10px;">
    			
					<span class="print" style="font-size:15px; padding-left:10px;"><strong>Select Date : </strong></span><br/>

						<input type="text" name="date" id="date" style="width: 300px; height:40px; margin-left:10px;" autocomplete="off" class="print"   / > 
						&nbsp;&nbsp;
						<input type="button" value="Show" class="print" style="border-radius: 0px; height: 40px; width: 100px;" name="Show" onClick="ShowReportDaily()" >
			
			
			
  	
  </div>

  <div id="showDailyreport" style="margin-top:20px;"></div>
  <div id="menu1" class=" print tab-pane fade " style="margin-bottom:20px; margin-top:20px; text-align:center">
  
  		
			<span class="print"><strong style="font-size:15px;">From Date</strong></span>&nbsp; &nbsp;<input type="text" class="FristDAte print" name="FristDAte" id="example1"/ style="height: 40px;">&nbsp; &nbsp;
								<span class="print"><strong style="font-size:15px;">&nbsp;&nbsp;  To Date </strong></span>&nbsp; &nbsp;<input type="text" style="height: 40px;" name="sndDAte" id="example12" class="sndDAte print"/>&nbsp;&nbsp;						
								<input  type="button" onClick="return shwoMonthlyReport()" class="print" style="border-radius: 0px; height: 40px; width: 100px;" name="submit" id="submit" value="Submit"  />
								
								
  
  
  </div>

  <div id="showMonthlyreport" style="margin-top:20px;"></div>
  <div id="menu2" class="tab-pane fade print" >
			   <span class="print" style="font-size:15px; padding-left:10px;"><strong>Select Year : </strong></span><br/>
								     <input type="text" name="years" id="years" style="width: 300px; height:40px; margin-left:10px;" onKeyUp="return showYearlyCost()" class="print" />

								     <input  type="button" onClick="return showYearlyCost()" class="print" style="border-radius: 0px; height: 40px; width: 100px;" name="submit" id="submit" value="Submit"  />

										
  </div>
  <div id="showEarlyCost" style="margin-top:20px;"></div>
  		
</div>

	
	</form>


 <center> 
    <input type="button" class="print" value="Print" name="Print" style="height: 30px; width: 150px; background: #ff0000; color: #fff;" onclick="window.print()" ></input>
    </center>


</div>
</div>
</div>






	<script src="../js/bootstrap.min.js"></script>
  </body>
</html>