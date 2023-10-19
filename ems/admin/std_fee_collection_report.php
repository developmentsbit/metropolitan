<?php
    error_reporting();
	@session_start();
	date_default_timezone_set("Asia/Dhaka");
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
    <title>Student Fee Collection Report</title>
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
	  <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">
    <script src="datespicker/bootstrap-datepicker.js"></script>

	<script>
	  $(document).ready(function () {
                
                $('#fromdate').datepicker({
                    format: "dd-mm-yyyy"
					
                }).on('changeDate', function(e){
					$(this).datepicker('hide');
					ShowReportDaily();
				});  
            
            });


	  	 $(document).ready(function () {
                    
                    $('#todate').datepicker({
                        format: "dd-mm-yyyy"
                    }).on('changeDate', function(e){
					$(this).datepicker('hide');
					
				});   
                
                });

			function showCollection(){
					
					var select_class =$('#select_class').val();
					var fromdate =$('#fromdate').val();
					var todate =$('#todate').val();
					var stdFeeCollection = "stdFeeCollection";
					//alert(select_class);

					if(select_class !=""){
						$.ajax({
										url : "ajaxStdFeeCollection.php",
										data : {select_class:select_class,fromdate:fromdate,todate:todate,stdFeeCollection:stdFeeCollection},
										type : "POST",
										success:function(data){
												$('#feeCollectionshow').html(data);
										}
									});
					
					}else{
							alert('Select Class');
					}
			}

        </script>
</head>
<body>
	<form method="post">
			<table width="1200" cellpadding="0" cellspacing="0" align="center" bgcolor="#f4f4f4" style="margin-top:30px; background: #f4f4f4; padding: 30px; height: 150px;" class="print">
				<tr>
					<td width="10%" align="right"></td>
						<td>
							<select name="select_class" style="width: 250px; height: 35px;" id="select_class"> 
									<option value="" > Select Class </option>
									<?php
										$sql=$db->link->query("SELECT * FROM `add_class` order by `index` ASC ");
										while($fetch_class=$sql->fetch_array())
										{
											print '<option value="'.$fetch_class[0].'and'.$fetch_class[2].'">'.$fetch_class[2].'</option>';
										}
									?>
							</select>
					</td>
						<td align="right">
							<label>From:</label>
							<label><input type="text" name="fromdate" id="fromdate" style="height: 35px; width: 200px;"  value="<?php print date('d-m-Y');?>"></label>
						</td>	

						<td align="left">
							<label>To:</label>
							<label><input type="text" name="todate" id="todate" style="height: 35px; width: 200px;" value="<?php print date('d-m-Y');?>"></label>
						</td>
						<td align="left" >
							
							<input type="button" name="show" id="show" style="height: 33px; width: 80px; background: GREEN; color: #fff;" value="Show" onclick="return showCollection()">
						</td>
						<td width="10%"></td>
				</tr>
			</table>

			</form>

			<span id="feeCollectionshow">
				
			</span>
	
</body>
</html>