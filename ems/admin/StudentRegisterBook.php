
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
    <title>Student's Demand Register </title>
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
  var showdatarigister = "studentLeadgerBook";
  var stdId = 	$('#stdId').val();
  var year = 	$('#year').val();
  var className = 	$('#className').val();
  var stdroll = 	$('#stdroll').val();
  

  //alert(stdId);
		$.ajax({
				url:"showstudentAccountrecord.php",
				type:"POST",
				data:{showdatarigister:showdatarigister,stdId:stdId,year:year,stdroll:stdroll,className:className},
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
 Student's Demand Register (Running Class)  </span> </td>
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
						<input type="button" name="submit" value="Submit"  style="display:inline; border-radius:0px;" class="btn btn-danger btn-sm" onclick="return showIdby()" />
					</div>
				 </td>
            </tr>			
			</table>
			</div>	
			</div>
	<div>
			<span id="showdata" >
				


			</span>
			
	</div>
			
	</form>
	  </body>
    </html>
		    					

		    					<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
