
<?php
 error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
		require_once("../db_connect/config.php");
		require_once("../db_connect/conect.php");
		$db = new database();
		global $msg;
		global $table;
		$fetch[0]="";
		$fetch[1]="";
		$fetch[2]="";
		
		$fetch[3]="";
		$fetch[6]="";

 //add dat......................................
if(isset($_POST['add']))
{
	      

		$Date = $db->escape($_POST['date']);
		$sideNoteTitle = $db->escape($_POST['sideNoteTitle']);
		$Amount = $db->escape($_POST['Amount']);
		$Details = $db->escape($_POST['Details']);
		$id=$db->withoutPrefix('cash_received_withdraw','id','C','8');

		if(!empty($sideNoteTitle))
		{
		$query="INSERT INTO `cash_received_withdraw`(`id`,`date`,`supplier_id`,`payable_amount`,`Cash_payment`,`due_amount`,`details`,`entry_date`,`type`) VALUES('$id','$Date','$sideNoteTitle','$Amount','0','0','$Details','".date('Y-m-d')."','purchase')";
		 $result=$db->link->query($query);
			if($result)
			{
			
				$msg="<div style='margin-bottom:-26px;' class='alert alert-success' role='alert'><b style='text-align:center;'>Insert Successfully</b></div>";
			}
		}
		else
		{
				$msg="<div style='margin-bottom:-26px;' class='alert alert-danger' role='alert'><b style='text-align:center;'>Please Fill Up Text Field.</b></div>";
		}
}



if(isset($_POST['Update']))
	{
		$Date = $db->escape($_POST['date']);
		$sideNoteTitle = $db->escape($_POST['sideNoteTitle']);
		$Amount = $db->escape($_POST['Amount']);
		$Details = $db->escape($_POST['Details']);
		$id = $db->escape($_POST['id']);
		
		if(!empty($sideNoteTitle))
		{
	$query="REPLACE INTO `cash_received_withdraw`(`id`,`date`,`supplier_id`,`payable_amount`,`Cash_payment`,`due_amount`,`details`,`entry_date`,`type`) VALUES('$id','$Date','$sideNoteTitle','$Amount','0','0','$Details','".date('Y-m-d')."','purchase')";
	$result=$db->link->query($query);
			if($result)
			{
			
			print "<script>alert('Update Successfully!!');</script>";
			print "<script>location='cashDeposit.php'</script";
				
			}
		}
		else
		{
				$msg="<div style='margin-bottom:-26px;' class='alert alert-danger' role='alert'><b style='text-align:center;'>Please Fill Up Text Field.</b></div>";
		}

	}




if(isset($_POST['View']))
	{
		$query="SELECT `cash_received_withdraw`.`id`, `cash_received_withdraw`.`date`,`cash_receiver_info`.`name`,`cash_received_withdraw`.`payable_amount`,`cash_received_withdraw`.`details` FROM `cash_received_withdraw`
INNER JOIN `cash_receiver_info` ON `cash_receiver_info`.`id`=`cash_received_withdraw`.`supplier_id` where `type`='purchase' ORDER BY `cash_received_withdraw`.`id` ASC  ";


		$result=$db->select_query($query);

		$table.="<br><table class='table table-bordered'>"."<tr class='success'>"."<td >Date </td>"."<td >Name</td>"."<td >Details</td>" ."<td >Amount </td>"."<td>Action</td>"."</tr>";
		if($result)
		{
		$num_fields=mysqli_num_fields($result);
		while($a=$result->fetch_array())
		{
			   $table.="<tr>";
			
				$table.="<td>".$a['date']."</td>";
				$table.="<td>".$a['name']."</td>";
			
				$table.="<td>".$a['details']."</td>";
					$table.="<td>".$a['payable_amount']."</td>";
				

		
			$table.="<td align='center'>";
			$table.="<a href='?edit=$a[0]'class='btn btn-primary'onclick='return confirm_click()' style='width:80px'>Edit</a><a style='width:80px; margin-top:2px; margin-left:0px;' href='?dlt=$a[0]' class='btn btn-danger' onclick='return confirm_delete()	'>Delete</a>";
			$table.="</td>";
			$table.="</tr>";
		}
	}
		$table.="</table>";
	}

//end view data.....................................

//link edit data...................................	

	if(isset($_GET['edit']))
	{
		$src_text=$db->escape($_GET['edit']);
		$query="SELECT * FROM `cash_received_withdraw` WHERE `id`='$src_text'";
		$chek=$db->select_query($query);
		if($chek)
			{
				$fetch=$chek->fetch_array();
				
			}
	}
//end link edit data..........................
	//link dlt data.....................................
	if(isset($_GET['dlt']))
	{
		$linid=$db->escape($_GET['dlt']);
		$query="DELETE FROM `cash_received_withdraw` WHERE `id`='$linid'";
		$delete=$db->delete_query($query);
		
		print "<script>location='cashDeposit.php'</script";

	}
//end link delete data........................

	if(isset($_POST['Exit']))
	{
		print exit();
	}

	if(isset($_POST['Clear']))
	{
		print "<script>location='cashDeposit.php'</script";
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Cash Deposit</title>
    
	  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	  <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">

   
     <script src="datespicker/bootstrap-datepicker.js"></script>

    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
    	 

    	function confirm_click()
    	{
    		$confirm_click=confirm('Are You Confirm Update');
    		if($confirm_click===true)
    		{
    			return true;
    		}
    		else
    		{
    			return false;
    		}
    	}

    	function confirm_delete()
    	{
    		$confirm_click=confirm('Are You Confirm Delete');
    		if($confirm_click===true)
    		{
    			return true;
    		}
    		else
    		{
    			return false;
    		}
    	}
 



</script>
  </head>
  <body>



  	  <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Cash Deposit</b></div>
  <div class="panel-body">
  	<form name="" action="" method="post"  enctype="multipart/form-data" class="form-horizontal">
  	  <div class="col-md-7 col-md-offset-2" id="AddMarksStep1" style="margin-top: 20px;">


   


    <div class="form-group">
    <label >Date</label>
       <input type="hidden"  class="form-control" name="id" style="height: 40px; border-radius: 0px;" value="<?php echo $fetch[0];?>" />

    <input type="text" name="date" placeholder="Date" autocomplete="off"  style="height: 40px; border-radius: 0px;" value="<?php print date('d-m-Y');?>" class="form-control" value="<?php echo $fetch[1];?>" >
  </div>       

   <div class="form-group">
    <label > Select Cash Receiver</label>
    <select class="form-control" name="sideNoteTitle" style="height: 40px; border-radius: 0px;">

	    <option value="">Select Title</option>
	  <?php  
	  $sql=$db->link->query("SELECT * FROM `cash_receiver_info` ORDER BY `sl` ASC ");
	  while($fetch_id=$sql->fetch_array())
	  {
	  		?>
	  	<option value="<?php print $fetch_id[0];?>"><?php print $fetch_id[2]; ?></option>
	  		<?php
	  }
	  ?>
    	
    </select>
    

  </div>     




    <div class="form-group">
    <label> Amount  :</label>

	
	<input type="text"  placeholder="Amount" style="height: 40px; border-radius: 0px;" autocomplete="off" class="form-control" name="Amount" value="<?php echo $fetch[3];?>"  />
  </div>     




    <div class="form-group">
    <label >Details :</label>
    <textarea class="form-control textarea" style="height: 40px; border-radius: 0px;" name="Details" placeholder="Details"><?php echo $fetch[6];?></textarea>
  </div>     


              <span>
  					<?php 
  						if(isset($msg))
  						{
  							echo "<strong>".$msg."</strong>";
  						}
  						else 
  						{
  							 echo "<strong>".$db->sms."<strong>";
  						}



  					?>

  				</span> 

  				<br><br>

					<input type="submit" value="Add" name="add" class="btn btn-success btn-sm" style="width:80px; border-radius: 0px;" />
					<input type="submit" value="Update" name="Update" onClick="return confirm_click()" class="btn btn-info btn-sm" style="width:80px;"/>
					<input type="submit" value="View" name="View" class="btn btn-primary btn-sm" style="width:80px; border-radius: 0px;"/>
									
					<input type="submit" value="Clear" name="Clear" class="btn btn-primary btn-sm" style="width:80px; border-radius: 0px;"/>
					<input type="submit" value="Exit" name="Exit" class="btn btn-warning btn-sm" style="width:80px; border-radius: 0px;"/>

<center>	<?php echo $table;?>  </center>
</div>
</form>
</div>
</div>

</div>




<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>


  
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
