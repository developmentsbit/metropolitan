<?php

	session_start();
    error_reporting(1);
	if($_SESSION["logstatus"] === "Active")
	{ 
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");

	$db = new database();
	global $msg;
	global $table;
	global $chek;

	$fetch[0]=$db->autogenerat('other_cost','id',date('y'),'9');

//add dat......................................
if(isset($_POST['add']))
	{
		$id=$db->escape($_POST['id']);
		$title=$db->escape($_POST['title']);
		$description=$db->escape($_POST['description']);
		$amount=$db->escape($_POST['Amount']);
		$adminame=$db->escape($_POST['Adminname']);
		$date=$db->escape($_POST['date']);
		$receiver=$db->escape($_POST['receiver']);
		$address=$db->escape($_POST['address']);


		$ex=explode("-",$date);
		$d=$ex[2]."-".$ex[1]."-".$ex[0];

       

		if(!empty($id) && !empty($date) && !empty($title) && !empty($amount))
		{
			$query_ass="INSERT INTO `other_cost` (`id`,`date`,`title`,`description`,`amount`,`admin_id`,`Entry_Date`,`receiver`,`address`) VALUES ('$id','$d','$title','$description','$amount','$adminame','".$d."','$receiver','$address')";
			print "<script>location='ExpenseVoucher.php?id=$id'</script>";
			//echo $query_ass;
			$result_query=$db->insert_query($query_ass);
			//print_r($query);
			$fetch[0]=$db->autogenerat('other_cost','id',date('y'),'9');

		}
		else
		{
			$msg="<span class='text-center text-danger glyphicon glyphicon-remove'><strong>&nbsp;Please Fill Up TextField</strong></span>";
		}
	}
	//end add data.........................
//post delete data......................................
if(isset($_POST['Delete']))
	{
		$id=$db->escape($_POST['id']);
		$query="DELETE FROM `other_cost` WHERE `id`='$id'";
		$delete=$db->delete_query($query);
		$fetch[0]=$db->autogenerat('other_cost','id',date('y'),'9');
		print "<script>location='ExpenseEntry.php'</script";

	}
//post end delete data.........................................
	//post update data..........................................
if(isset($_POST['Update']))
	{
		$id=$db->escape($_POST['id']);
		$title=$db->escape($_POST['title']);
		$description=$db->escape($_POST['description']);
		$amount=$db->escape($_POST['Amount']);
		$adminame=$db->escape($_POST['Adminname']);
		$date=$db->escape($_POST["date"]);
		$ex=explode("-",$date);
		$d=$ex[2]."-".$ex[1]."-".$ex[0];


		if(!empty($id) && !empty($date) && !empty($title) && !empty($amount) && !empty($adminame))
		{
			$query_ass="REPLACE INTO `other_cost` (`id`,`date`,`title`,`description`,`amount`,`admin_id`,`Entry_Date`,`receiver`,`address`) VALUES ('$id','$d','$title','$description','$amount','$adminame','".date('Y-m-d')."','$receiver','$address')";
			$result_query=$db->update_query($query_ass);
			print "<script>alert('Edit Successfully!!')</script>";
			print "<script>location='ExpenseEntry.php'</script";
		}
		else
		{
			$msg="<span class='text-center text-danger glyphicon glyphicon-remove'><strong>&nbsp;Please Fill Up TextField</strong></span>";
		}
	}
//end post update data...........................
//view data...............................	
	if(isset($_POST['View']))
	{
	     $adminType=$db->link->query("SELECT `type` FROM `admin_users` WHERE `id`='".$_SESSION[id]."'");
       
        $fetch_admin=$adminType->fetch_array();
        
		$query="SELECT other_cost.`id`,`other_cost`.`date`,`income_expense_title`.`title`,`other_cost`.`description`,`other_cost`.`amount`,`other_cost`.`Entry_Date` FROM other_cost INNER JOIN `income_expense_title`
ON `income_expense_title`.`id`= other_cost.`title` WHERE `income_expense_title`.`type`='Expense' ORDER BY other_cost.`id` DESC ";
		$result=$db->select_query($query);
		
		$table="<table class='table table-responsive table-hover table-bordered' align='center'>"."<tr class='success'>"."<td >ID </td>"."<td>Date</td>"."<td >Title </td>"."<td >Description</td>"."<td >Amount</td>"."<td>Entry Date</td><td>Report</td><td>Edit Or Delete</td>"."</tr>";
		if($result)
		{
		$num_fields=mysqli_num_fields($result);
		while($a=$result->fetch_array())
		{
			$table.="<tr>";
			for($i=0;$i<$num_fields;$i++)
			{
				$table.="<td>".$a[$i]."</td>";

			}
			$table.="<td align='center'>";
			$table.="<a style='width:80px; margin-top:2px;'href='ExpenseVoucher.php
?id=$a[0]' class='btn btn-success' target='_blank'>Report</a>";
			$table.="</td>";


			$table.="<td align='center'>";
			if($fetch_admin[0]=="Main Admin")
			{
			   	$table.="<a href='?edit=$a[0]'class='btn btn-primary'onclick='return confirm_click()' style='width:80px'>Edit</a><a style='width:80px; margin-top:2px; ' href='?dlt=$a[0]' class='btn btn-danger' onclick='return confirm_delete()'>Delete</a>";
			}

			
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
	
		$query="SELECT `other_cost`.*, `income_expense_title`.`title` FROM `other_cost`
INNER JOIN `income_expense_title` ON `income_expense_title`.`id`=`other_cost`.`title`
WHERE `other_cost`.`id`='$src_text'";
		$chek=$db->select_query($query);
		if($chek)
			{
				$fetch=$chek->fetch_array();

				$ex=explode("-",$fetch[1]);
		        $d=$ex[2]."-".$ex[1]."-".$ex[0];

			}
	}
//end link edit data..........................
	//link dlt data.....................................
	if(isset($_GET['dlt']))
	{
		$linid=$db->escape($_GET['dlt']);
		$query="DELETE FROM `other_cost` WHERE `id`='$linid'";
		$delete=$db->delete_query($query);
		$fetch[0]=$db->autogenerat('other_cost','id','OTC-','9');
		print "<script>location='ExpenseEntry.php'</script";

	}
//end link delete data........................

	if(isset($_POST['Exit']))
	{
		print exit();
	}
	if(isset($_POST['Clear']))
	{
		print "<script>location='ExpenseEntry.php'</script";
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title></title>
	<link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
	<link rel="stylesheet" href="textEdit/redactor/redactor.css" />
	<script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
	<script src="textEdit/redactor/redactor.min.js"></script>

	  <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">

   
     <script src="datespicker/bootstrap-datepicker.js"></script>

    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">

    	    $(document).ready(function () {
                
                $('#example2').datepicker({
                    format: "dd-mm-yyyy"
                });  
            
            });

    	$(document).ready(
		function()
		{
			$('#radactor').redactor();
		}
	);
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
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Expense Entry </b></div>
  <div class="panel-body">
  <form name="" action="" method="post"  enctype="multipart/form-data" class="form-horizontal" >
  	 <div class="col-md-7 col-md-offset-2" id="AddMarksStep1" style="margin-top: 20px;">



  	<div class="form-group">
    <label >Date :</label>
    <input type="hidden" name="id" value="<?php echo $fetch[0];?>" />

	 <input type="text" autocomplete="off" id="example2"  style="border-radius: 0px; height: 40px;" class="form-control" name="date"<?php if($chek){?> value="<?php echo $d;?>" <?php }else { 
	 print 'value="'.date('d-m-Y').'"'; } ?> />
						
  </div>  



  <div class="form-group">
    <label >Title  :</label>
   
						<select class="form-control" name="title">
					
					<?php
						
						if ($chek) 
						{?>
	                           <option value="<?php echo $fetch[2];?>"><?php echo $fetch[9];?></option>  
	                             
                        <?php }
                        
								$sql="SELECT * FROM `income_expense_title` WHERE `type`='Expense' ORDER BY `index` ASC";
								$query=$db->select_query($sql);
								if($query)
								{
									while($fetchTilte=$query->fetch_array())
									{?>

											<option value="<?php print $fetchTilte[0];?>"> <?php print $fetchTilte[1];?> </option>

									<?php
								   }
								}
							?>
								
						</select>



  </div> 




  <div class="form-group">
    <label >Details   :</label>
    <textarea  style="border-radius: 0px;" class="form-control" name="description" id="radactor"><?php if ($chek) {?>
	<?php echo $fetch[3];?>
	<?php 
	} ?></textarea>


  </div> 




  <div class="form-group">
    <label >Amount  :</label>
   <input type="text" placeholder="Amount" autocomplete="off" style="height: 40px; border-radius: 0px;" class="form-control" name="Amount" <?php if($chek){?> value="<?php echo $fetch[4];?>" <?php } ?> />


  </div>  

  <div class="form-group">
    <label >Receiver  :</label>
   <input type="text" placeholder="Receiver Name" autocomplete="off" style="height: 40px; border-radius: 0px;" class="form-control" name="receiver" <?php if($chek){?> value="<?php echo $fetch['receiver'];?>" <?php } ?> />


  </div>  <div class="form-group">
    <label >Address  :</label>
   <input type="text" placeholder="Receiver Address" autocomplete="off" style="height: 40px; border-radius: 0px;" class="form-control" name="address" <?php if($chek){?> value="<?php echo $fetch['address'];?>" <?php } ?> />


  </div> 



  	<input type="hidden" placeholder="Admin Name" class="form-control" name="Adminname" value="<?php print $_SESSION[id]; ?>" />




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
					<input type="submit" value="Delete" name="Delete" class="btn btn-danger btn-sm" style="width:80px; border-radius: 0px;"  onclick='return confirm_delete()'/>					
					<input type="submit" value="Clear" name="Clear" class="btn btn-primary btn-sm" style="width:80px; border-radius: 0px;"/>
					<input type="submit" value="Exit" name="Exit" class="btn btn-warning btn-sm" style="width:80px; border-radius: 0px;"/>


</div>
</form>

</div>
</div>
</div>

<?php echo $table;?>








 
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
