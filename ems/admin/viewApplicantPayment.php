<?php
    error_reporting(1);
	@session_start();
	
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
	

	$select_school="select * from project_info";
	$cheke_school=$db->select_query($select_school);
	if($cheke_school)
	{
			$fetch_school_information=$cheke_school->fetch_array();

	}

	$sql="SELECT * FROM `bank_information` WHERE `bankingType`='Bkash'";
	$query=$db->select_query($sql);
	if($query)
	{
			$fetch_Acc=$query->fetch_array();

	}



		if(isset($_POST['Approve']))
		{
			$txtID=count($_POST["form_ID"]);
		
		//print $txtID;
			for($x = 0;$x<$txtID ; $x++){

							if($_POST["form_ID"][$x]!="")
							{
								$sql="UPDATE `student_form_info` SET `status`='1' WHERE `form_ID`='".$_POST["form_ID"][$x]."'";
								//print $sql;
								$db->link->query($sql);
								print "<script>location='viewApplicantPayment.php'</script>";

							}
			}

			

		}


	if(isset($_GET['Approve_ID']))
		{

		
		
								$sql="UPDATE `student_form_info` SET `status`='1' WHERE `form_ID`='".$_GET["Approve_ID"]."'";
								//print $sql;
								$db->link->query($sql);
								print "<script>alert('Approve Successfully!!');</script>";
								print "<script>location='viewApplicantPayment.php'</script>";

			
			

		}	

		if(isset($_GET['del_ID']))
		{

		
		
								$sql="DELETE FROM `student_form_info`  WHERE `form_ID`='".$_GET["del_ID"]."'";
								//print $sql;
								$db->link->query($sql);

								 $db->link->query("DELETE FROM `reg_student_personal_info` WHERE `id`='".$_GET["del_ID"]."'");
                $db->link->query("DELETE FROM `reg_student_previous_result` WHERE `id`='".$_GET["del_ID"]."'");
                $db->link->query("DELETE FROM `reg_student_address_info` WHERE `id`='".$_GET["del_ID"]."'"); 
                $db->link->query("DELETE FROM `preview_reg_student_guardian_information` WHERE `id`='".$_GET["del_ID"]."'");
                $db->link->query("DELETE FROM `reg_student_acadamic_information` WHERE `id`='".$_GET["del_ID"]."'");
                $db->link->query("DELETE FROM `reg_student_passward` WHERE `id`='".$_GET["del_ID"]."'");


								print "<script>alert('Delete Successfully!!');</script>";
								print "<script>location='viewApplicantPayment.php'</script>";

			
			

		}
?>

	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Show Result Sheet</title>
	<script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
    	
	    function confirmClick()
	    {
	    	var x=confirm("are you sure approval  all? ");
	    	if(x==true)
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		return false;
	    	}

	    }   

	        function confirmClicksingle()
	    {
	    	var x=confirm("are you sure approval application? ");
	    	if(x==true)
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		return false;
	    	}

	    }  

	    function confirmClickForm()
	    {
	    	var x=confirm("are you confirm delete ?  ");
	    	if(x==true)
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		return false;
	    	}

	    }

    </script>

    <style type="text/css">
     @media print{
      .print{
        display:none;
      }

</style>
	 </head>
	 <body>
<form method="POST">
	 <table class="table table-bordered table-hover">
		<tr>	
				<td width="10%"></td>
				<td>
						<div style="float: left; clear: right; width: 15%; text-align: center;  ">  
							<img src="all_image/logoSDMS2015.png" style="max-width: 150px; max-height: 100px; " /> 
						</div>
							

						<div style="float: left; clear: right; text-align: center; width: 70% ">   
								<ul>
				    
							    <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:30px; list-style: none;"><?php print $fetch_school_information['institute_name']?></li>

							   <li style="list-style: none; ">

							   		<p style="font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_school_information['location']?> 
   								</p>

							   	</li>

							    <li style=" list-style: none; font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_school_information['webAddress']?><br><?php print $fetch_school_information['phone_number']?>, <?php print $fetch_school_information['email']; ?>  </li>
							    <li><b> Verify Applicant Payment</b></li>
							 </ul> 

				      </div>

				      <div style="float: right;  width: 15%; text-align: center;  ">  
							
						</div>
				</td>
				<td width="10%"></td>
		</tr>
		</table>

	<table class="table table-bordered table-hover">
					
						
							<tr>
								<td align="center">Select</td>
								<td align="center">SL NO.</td>
								<td align="center">Class</td>
								<td align="center">Student ID</td>
								<td align="center">Guardian Mobile</td>
								<td align="center">Student's Name</td>
								<td align="center">bKash Number</td>
								
								<td align="center">Appaly Date</td>
								<td align="center">TrxId</td>
								<td align="center" class="print">Action</td>
							</tr>
							<?php 
									$sqlfordetails  = "SELECT `form_ID`,`student_name`,`phone`,`class`,`bKash_number`,`TrxId`,`date`,`time` FROM `student_form_info` where `status`='0'";
									//print $sqlfordetails;

 								$resultFordetails = $db->select_query($sqlfordetails);
										if($resultFordetails->num_rows > 0){
										    $sl=0;
											while($fetchfordetails =$resultFordetails->fetch_array()){
											    $sl++;
								
							?>
							<tr>
							<td align="center"><input type="checkbox" name="form_ID[]" value="<?php print $fetchfordetails['form_ID']?>"></input> </td>
							    <td align="center"><?php echo $sl;?></td>
							    <td align="center"><?php  $x=explode("and",$fetchfordetails["class"]); print $x[1];?></td><td align="center"><?php echo $fetchfordetails["form_ID"];?></td>
								<td align="center"><?php echo $fetchfordetails["phone"];?>

								<input type="hidden" name="stdName[]" value="<?php echo $fetchfordetails["student_name"];?>"></input>
								<input type="hidden" name="invoice[]" value="<?php echo $fetchfordetails["form_ID"];?>"></input>

								</td>

								<td align="center"><?php echo $fetchfordetails["student_name"];?></td>
							    <td align="center"><?php echo $fetchfordetails["bKash_number"];?></td>
								
								<td align="center"><?php echo $fetchfordetails["date"].' '.$fetchfordetails["time"];?></td>
								<td align="center"><?php echo $fetchfordetails["TrxId"];?></td>
								<td align="center" class="print">

							

								<a href="viewApplicantPayment.php?Approve_ID=<?php print $fetchfordetails['form_ID']?>" class="btn btn-success"  onclick="return confirmClicksingle()"> Approve </a>
								<br><br>

	<a href="https://alhelalacademy.edu.bd/OnlineRegistration/viewDetails.php?id=<?php print $fetchfordetails['form_ID']?>" class="btn btn-success" target="_blank" > View </a><br>
	
									<a href="viewApplicantPayment.php?del_ID=<?php print $fetchfordetails['form_ID']?>" class="btn btn-danger"  onclick="return confirmClickForm()"> Delete </a>


							</td>
							</tr>
							<?php } }  ?>

								<tr class="print">
								<td align="left" colspan="10">

									<input type="submit" value="Approve" name="Approve" class="btn btn-large btn-info" onclick="return confirmClick()" />
									<input type="button" value="Print" name="print" class="btn btn-danger" onclick="window.print()"> </input>

								</td>
							</tr>
					</table>
					</form>
	
	
		 </body>

	</html>
