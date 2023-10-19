<?php
error_reporting(1);
@session_start();
require_once("../../db_connect/conect.php");
$db = new database();

//print date('Y-m-d');



		

// 	$std='SELECT `contact_no`,`id` FROM `student_personal_info` WHERE `contact_no`!=""';
// 	$querystd=$db->link->query($std);
// 	while($fetchstd=$querystd->fetch_array())
// 	{
// 	    //print $fetchstd[0];
// 			$qcon="UPDATE `student_guardian_information` SET `guardian_contact`='$fetchstd[0]' WHERE `id`='$fetchstd[1]'";
// 			$db->link->query($qcon);
// 	}


	
	

$query="select * from add_class";
$sql=$db->select_query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bar counchil membar information</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="../../js/vendor/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		
function sendMessage(){
   
   $("#add").prop('disabled', true); 
   
    var type = $('#type').val();
    var month = $('#month').val();
    var lower =parseFloat($('#lower').val()); 
    var upper =parseFloat($('#upper').val());  

    var details = $('#details').val();
    var low=upper;
    var upr=upper+10;
    var dues = "dues";

  
    if(type != "Select One" && lower != "" && details != "" && details != "" )
        {
        	 var con=confirm("Confirm Click?");
		      if(con==false)
		      {
		        return false;
		      }
           
            $.ajax({
                url:"ajaxStudentdue.php",
                type:"POST",
                data :{type:type,month:month,lower:lower,upper:upper,details:details,dues:dues},
                cache:false,
                success:function(data)
                {
                	$("#add").prop('disabled', false); 
                    $('#message').html(data);
                    $('#lower').val(low);
                    $('#upper').val(upr);

                }
                
            });
        }
    }

	</script>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table class="table table-bordered" style="margin-top:15px;">
			<tr>
				<td>
					<span style="font-size: 20px;">Send Dues Massage</span>
				</td>
			</tr>
			<tr>
				<td>
					<table class=" table table-bordered" style="margin-bottom: 0px;">
						<tr>
							<td width="15%;">Select Class</td>
							<td>
								<select name="type" id="type"  class="form-control" required="">
								<option disabled="" selected="">Select Class</option>
									<?php
			while ($fetch=mysqli_fetch_assoc($sql))
			 {
			 	?>
				<option value="<?php  echo $fetch["id"]?>"><?php echo  $fetch["class_name"]?></option>
			<?php
			}
									?>
								</select>
							</td>
						</tr>

						<tr>
							<td width="15%;">Select Month</td>
							<td>
								
								

								<select class="form-control" name="selectMonth" id="month" >
								<option value="">Select Month</option>

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
							</td>
						</tr>



						



								<tr>
							<td width="15%;">Student Roll Range :  </td>
							<td>
							<label> <input type="number"  class="form-control" name="lower" id="lower" placeholder="Lower Limit (Student Roll ) : 0" value="1"></input></label>
							<label> To </label>
							<label> 	<input type="number"  class="form-control" name="upper" id="upper" placeholder="Upper  Limit (Student Roll ) : 0" value="10"></input> </label>

							
							</td>
						</tr>
		

							<tr>
							<td width="15%;">Massage</td>
							<td>
								<textarea class="form-control" name="details" id="details" style="height:300px"></textarea>
							</td>
						</tr>
					
						<tr>
							<td colspan="2" align="center">
                                    <input type="button" name="add" id="add" class="btn btn-success" style="width: 120px;" value="Send" onclick="return sendMessage()">
                                    <input type="submit" name="view" class="btn btn-danger" style="width: 120px;" value="Reset">
							</td>
						</tr>
						
						
					</table>
					
					
							<span id="message"></span>
						
				</td>
			</tr>
		</table>
	</div>




</form>
</body>
</html>