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
   
    <title></title>
<script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
  </head>
  <script type="text/javascript">
      function confirm_delete()
        {
            $confirm_click=confirm('Are You Confirm to Delete');
            if($confirm_click===true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
		
		function GoEX(){
		
						var GoEX = "444";
					
						var type = $('#className').val();
						//alert(type);
						if(type != 'Select One'){
					$.ajax({
					
									url:"ShowTeacherAndStruff.php",
									type:"POST",
									data:{GoEX:GoEX,type:type},
									cache:false,
									success:function(data){
										//alert('ddd');
										
												$('#AddMarksStep1').hide();
												$('#showExData').show();
												$('#showExData').html(data);
									}
								});
								
								}else {
								alert('Fill Up this Text');
							}
		
		}
		
			function deleteff2(getIDxxxx){
		
					$.ajax({
					
									url:"ShowTeacherAndStruff.php",
									type:"POST",
									data:{getIDxxxx:getIDxxxx},
									cache:false,
									success:function(data){
										//alert(data);
										
										 GoEX();
									
										
									}
								});
					
					
										
				}
				function Back2(){
									$('#showExData').hide();
									$('#AddMarksStep1').show();
									
			
			}
			
				
				
  </script>
  
  <style>
	@media print{
			.noneBtnForprin{
				display:none;
			}
			.not{
				display:none;
			}
			#dont{
				display:none;
			}
			.dontPrint{
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

  	   <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>View Teacher And Stuff</b></div>
  <div class="panel-body">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
   <div class="col-md-7 col-md-offset-2" id="AddMarksStep1" style="margin-top: 20px;">


      <div class="form-group">
    <label >Select Type  :</label>
    <select class="form-control" name="className" id="className" style=" height: 40px; border-radius:0px;">
                        <option>Select One</option>
                        <?php 
                            $select_class="SELECT `type` FROM `ex-teacher` GROUP BY `type`";
                            $check_query=$db->select_query($select_class);
                            if($check_query){
                                while($fetch_class=$check_query->fetch_array())
                                {
									if($fetch_class['type'] != ""){
                        ?>
                        <option value="<?php echo "$fetch_class[0]"?>"><?php echo $fetch_class[0];?></option><span id="item_result"></span>
                        <?php } } } ?>
                        </select>


  </div>  

  <input type="button" name="ResultGenerate" value="Go" class="btn btn-info btn-md" style="width: 100px;border-radius: 0px;" onClick="return GoEX()"></input>


   <div id="showExData"></div>


   </div>
</form>
</div>
</div>
</div>



    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
	<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
