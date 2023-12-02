<?php

	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
	
		
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Teacher's Attendance</title>

	<script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
	
    <link href="../css/bootstrap.min.css" rel="stylesheet"></head>
	<script src="textEdit/redactor/redactor.min.js"></script>

	  <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">
     <script src="datespicker/bootstrap-datepicker.js"></script>
	 <script>
	 	  $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            }); 

             $(document).ready(function () {
                
                $('#example2').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
			
			function showData(){
				var dailyAttendanceTeacher="dailyAttendanceTeacher";
						$.ajax({
									url:"ajaxDateWiseReportTeacher.php",
									type:"POST",
									data:$(".addATeent").serialize() + "&dailyAttendanceTeacher=" + dailyAttendanceTeacher,
									success:function(text)
									{		
										//alert(text);
										$("#showData").html(text);
									}
									
							});	
			}
			
function check_availability()
{
		var class_name = $('#selectClass').val();
		$.post("check_grou_name.php", { className: class_name },
			function(result){
				//if the result is 1
				if(result != 1 )
				{
					//show that the username is available
					$('#selectGroup').html(result);
					$('#item_result').html("");
					$('#category_result').html('');
				}
				else
				{
					//show that the username is NOT available
					$('#category_result').html('No Group Name Found');
					$('#item_result').html("");
					$('#select').html('');
				}
		});

}  


function check_period()
{
        var class_name = $('#selectClass').val();
        var periodshow = "periodshow";
      
        $.post("cheking_period.php", { className: class_name,periodshow: periodshow},

            function(result){
                //if the result is 1
                if(result != 0 )
                {
                    //show that the username is available
                   $('#Period').html(result);
                    $('#chek_type').html("");
                   

                }
                else
                {
                    
                    $('#Period').html("");
                   
                }

        });

}  


	 </script>
	  <style>
	@media print{
			#notprint{
				display:none;
			}
			#trNotprint{
				display:none;
			}
			.dontPritntd{
			display:none;
			}
			@page 
			{
				size:  auto;   /* auto is the initial value */
				margin: 0mm;  /* this affects the margin in the printer settings */
			}
		
			html
			{
				background-color: #FFFFFF; 
				margin: 0px;  /* this affects the margin on the html before sending to printer */
			}
		
			body
			{
				border: solid 0px blue ;
				margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
			}
		}
</style>
	 
	 <body>
  	<form name="teacherinfo" action=""  method="post"  enctype="multipart/form-data" id="newFrom" class="form-horizontal addATeent" >
	 <div class="col-lg-12 col-md-12">
	  <table width="1075" id="notprint" class="table table-bordered table-responsive" style="margin-top:10px; margin-bottom:0px">
						 

						 


						   <tr>
							<td colspan="4" align="center">&nbsp;<span class="text-success" style="font-size:18px;"><strong>Teacher's Attendance</strong></span></td>
						  </tr>
						  
						   

						  	<tr>
						  	
						

						  	<td>From Date</td>
								<td><input type="text" name="example1" id="example1"  autocomplete="off" autocomplete="off" style="width:250px; padding-left:5px; height:30px;" value="<?php print date('Y-m-d')?>" /></td>  
						  
								

						  	</tr>
							
						<tr>
								<td colspan="6" align="center">
								<input type="button" name="submit" id="submit" value="Submit" onClick="return showData()" class="btn  btn-success" />
								</td>
						</tr>
						
				 </table>
				
						 
	 	</div>
		 <div class="col-lg-12 col-md-12 " id="showData"></div>
  </form>
 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>