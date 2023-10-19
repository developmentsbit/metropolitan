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
		$duration="Select One";
		$type="Select Type";
		$fetch[1]="";
		$fetch[2]="";
		$fetch[4]="";
		$fetch[3]="";
		$fetch[5]="";
	

    //add dat......................................
    if(isset($_POST['add']))
	{
		
		$title = $db->escape($_POST['title']); 
		$detisls = $db->escape($_POST['details']);
		$mobile = $db->escape(isset($_POST['mobile']));
	
		
		if(!empty($title))
		{
			$query="INSERT INTO `incomeexpenseregister` (`Name`,`Address`,`Mobile`,`Admin`,`Date`) VALUES('$title','$detisls','$mobile','Admin','".date('d-m-Y')."')";
			$resultisnsert=$db->insert_query($query);
			//echo $query;
			
		}
		else
		{
			$msg="<div style='margin-bottom:-26px;' class='alert alert-danger' role='alert'>
                             <b style='text-align:center;'>Please Fill Up Text Field.</b>
                          </div>";
		}
    }
//end add data.........................
//post delete data......................................
if(isset($_POST['Delete']))
	{
		$id=$db->escape($_POST['id']);
		$query="DELETE FROM `incomeexpenseregister` WHERE `id`='$id'";
		$delete=$db->delete_query($query);
		
		print "<script>location='IncomeExpenseTitle.php'</script";
		
	}
//post end delete data.........................................
	//post update data..........................................
if(isset($_POST['Update']))
	{
		$id= $db->escape($_POST['id']);
	
		$title= $db->escape($_POST['title']); 
		$detisls= $db->escape($_POST['details']);
		$mobile = $db->escape(isset($_POST['mobile']));
	
		
		
		if(!empty($title))
		{
			$query="UPDATE `incomeexpenseregister` set `title`='$title',`details`='$detisls',`Mobile`='$mobile' where `id`='$id'";
			
			$resultisnsert=$db->update_query($query);
			//print_r($query);
			


		}
		else
		{
			$msg="<div style='margin-bottom:-26px;' class='alert alert-danger' role='alert'>
                             <b style='text-align:center;'>Please Fill Up Text Field.</b>
                          </div>";
		}
	}
//end post update data...........................
//view data...............................	
	if(isset($_POST['View']))
	{
		$query="SELECT * FROM income_expense_title ORDER BY `type` ASC ";
		$result=$db->select_query($query);
		
		$table.="<table class='table table-responsive table-hover table-bordered'>"."<tr class='success'>"."<td >Name </td>"."<td >Address</td>"."<td >Mobilr</td>" ."<td >Date </td>"."<td>Edit Or Delete</td>"."</tr>";
		if($result)
		{
		$num_fields=mysqli_num_fields($result);
		while($a=$result->fetch_array())
		{
			   $table.="<tr>";
			
				$table.="<td>".$a['Name']."</td>";
				$table.="<td>".$a['Address']."</td>";
				$table.="<td>".$a['Mobile']."</td>";
				$table.="<td>".$a['Date']."</td>";
				

		
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
		$query="SELECT * FROM `income_expense_title` WHERE `id`='$src_text'";
		$chek=$db->select_query($query);
		if($chek)
			{
				$fetch=$chek->fetch_array();
				$duration=$fetch[3];
		        $type=$fetch[5];
			}
	}
//end link edit data..........................
	//link dlt data.....................................
	if(isset($_GET['dlt']))
	{
		$linid=$db->escape($_GET['dlt']);
		$query="DELETE FROM `income_expense_title` WHERE `id`='$linid'";
		$delete=$db->delete_query($query);
		
		print "<script>location='IncomeExpenseTitle.php'</script";

	}
//end link delete data........................

	if(isset($_POST['Exit']))
	{
		print exit();
	}

	if(isset($_POST['Clear']))
	{
		print "<script>location='IncomeExpenseTitle.php'</script";
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Income Expense</title>
    
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
    	  $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });

    	    $(document).ready(function () {
                
                $('#example2').datepicker({
                    format: "dd/mm/yyyy"
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
 
 //check group name 
  $(document).ready(function()
  {
		var checking_html = '<img src="search_group/loading.gif" /> Checking...';
		$('#className').change(function()
		{
			$('#item_result').html(checking_html);
				check_availability();
		});	
  });

//function to check username availability	
function check_availability()
{
		var class_name = $('#className').val();
		$.post("check_grou_name.php", { className: class_name },
			function(result){
				//if the result is 1
				if(result !=1 )
				{
					//show that the username is available
					$('#groupname').html(result);
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




</script>
  </head>
  <body>



  	  <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Income Expense Register</b></div>
  <div class="panel-body">
  	<form name="" action="" method="post"  enctype="multipart/form-data" class="form-horizontal">
  	  <div class="col-md-7 col-md-offset-2" id="AddMarksStep1" style="margin-top: 20px;">


   






    <div class="form-group">
    <label >Name :</label>
   <input type="hidden" readonly="" class="form-control" name="id" style="height: 40px; border-radius: 0px;" value="<?php echo $fetch[0];?>" />
						<input type="text"  placeholder="Title" style="height: 40px; border-radius: 0px;" autocomplete="off" class="form-control" name="title" value="<?php echo $fetch[1];?>"  />
  </div>     




    <div class="form-group">
    <label >Address :</label>
    <textarea class="form-control textarea" style="height: 40px; border-radius: 0px;" name="details" placeholder="Details"><?php echo $fetch[2];?></textarea>
  </div>     





    <div class="form-group">
    <label >Mobile :</label>
   <input type="text" placeholder="Amount" style="height: 40px; border-radius: 0px;" autocomplete="off" class="form-control" name="mobile" value="<?php echo $fetch[3];?>" />
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
					<input type="submit" value="Delete" name="Delete" class="btn btn-danger btn-sm" style="width:80px; border-radius: 0px;"  onclick='return confirm_delete()'/>					
					<input type="submit" value="Clear" name="Clear" class="btn btn-primary btn-sm" style="width:80px; border-radius: 0px;"/>
					<input type="submit" value="Exit" name="Exit" class="btn btn-warning btn-sm" style="width:80px; border-radius: 0px;"/>


</div>
</form>
</div>
</div>
</div>


	<?php echo $table;?> 

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
