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
	

	global $chek;
//add dat......................................
if(isset($_POST['add']))
	{
		if(!empty($_POST["totalstd"]) && !empty($_POST["Department"]) && !empty($_POST["Teacher"]) && !empty($_POST["Staff"]))
		{
			$query="REPLACE INTO `schoolinf` (`student`,`teacher`,`department`,`staff`,`id`) VALUES ('".$_POST["totalstd"]."','".$_POST["Teacher"]."','".$_POST["Department"]."','".$_POST["Staff"]."','2')";
			$resultisnsert=$db->insert_query($query);
		

		}
		else
		{
			$msg="<span class='text-center text-danger glyphicon glyphicon-remove'><strong>&nbsp;Please Fill Up TextField</strong></span>";
		}
	}
	
	



$selecquery = "select * from schoolinf";
$resultquery = $db->select_query($selecquery);
	if($resultquery->num_rows > 0){
		$fetchQuery = $resultquery->fetch_array();
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title></title>

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
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>College Info </b></div>
  <div class="panel-body">
   	<form name="" action="" method="post"  enctype="multipart/form-data" class="form-horizontal" >
   <div class="col-md-5 col-md-offset-4" id="AddMarksStep1" style="margin-top: 20px;">



      <div class="form-group">
    <label >Total Student :</label>
    <input type="text" placeholder="Total Student" class="form-control" name="totalstd" value="<?php echo $fetchQuery[0];?>" style="border-radius:0px; height: 40px;" />


  </div>  


      <div class="form-group">
    <label >Total Department  :</label>
    <input type="text" placeholder="Total Department" class="form-control" name="Department" value="<?php echo $fetchQuery[2];?>" style="border-radius:0px; height: 40px;" />


  </div>  



      <div class="form-group">
    <label >Total Teacher :</label>
    <input type="text" placeholder="Total Teacher" class="form-control" name="Teacher" value="<?php echo $fetchQuery[1];?>" style="border-radius:0px; height: 40px;" />


  </div>  




      <div class="form-group">
    <label >Total Staff :</label>
    <input type="text" placeholder="Total Staff" class="form-control" name="Staff" value="<?php echo $fetchQuery[3];?>" style="border-radius:0px; height: 40px;" />


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

  <?php 
						if(!$resultquery)
						{
				?>
					<input type="submit" value="Add" name="add" class="btn btn-info btn-sm" style="width:80px; border-radius: 0px;" />
					<?php } else {?>
					<input type="submit" value="Update" name="add" onClick="return confirm_click()" class="btn btn-primary btn-sm" style="width:80px; border-radius: 0px;"/>
					<?php } ?>						
					<input type="submit" value="Clear" name="Clear" class="btn btn-warning btn-sm" style="width:80px; border-radius: 0px;"/>
			



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
