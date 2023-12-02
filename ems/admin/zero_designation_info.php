<?php
error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();
    global $msg;
    $title="Zero Designation Information";
   	$fetch_zero[1]='';
   	$select="SELECT * FROM `zero_designation_info`";
   	$checked_query=$db->select_query($select);
   	if($checked_query)
   	{
   		$fetch_zero=$checked_query->fetch_array();
   	}

    if(isset($_POST['add']))
    {
    	if(!empty($_POST['Contact_Textarea']))
    	{
    	$insert="INSERT INTO `zero_designation_info` VALUES('$title','".$_POST['Contact_Textarea']."')";
    	$db->insert_query($insert);
    }
    else{
    	$msg="<span class='text-center text-danger'>Please Fill Up TextField</span>";
    }
    }
   
    if(isset($_POST['Update']))
    {
    	if(!empty($_POST['Contact_Textarea']))
    	{
    	$insert="REPLACE INTO `zero_designation_info` VALUES('$title','".$_POST['Contact_Textarea']."')";
    	$db->update_query($insert);
    }
    else{
    	$msg="<span class='text-center text-danger'>Please Fill Up TextField</span>";
    }
}

if(isset($_POST['Delete'])){
	$Delete="DELETE FROM `zero_designation_info` WHERE `title`='$title'";
	$db->delete_query($Delete);
}
 if(isset($_POST['Exit']))
    {
        print exit;
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
<link rel="stylesheet" href="textEdit/redactor/redactor.css" />
<script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
<script src="textEdit/redactor/redactor.min.js"></script><br>
<link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="../js/loading/pace.min.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">
	$(document).ready(
		function()
		{
			$('#redactor').redactor();
		}
	);
	function confirm_click()
    	{
    		$confirm_click=confirm('Are You Confirm to Update');
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
	</script>
</head>
<body>

     <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Information vacant</b></div>
  <div class="panel-body">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
   <div class="col-md-8 col-md-offset-2" id="AddMarksStep1" style="margin-top: 20px;">



          <div class="form-group">
    <label >Details  :</label>
    <textarea name="Contact_Textarea" class="form-control"  id="redactor"><?php echo $fetch_zero[1];?></textarea>
  </div>  


  <span>
                    <?php 
                        if(isset($msg))
                        {
                            echo "<strong>".$msg."</strong>";
                        }
                        else
                        {
                             echo "<strong>".$db->sms."</strong>";
                        }

                    ?>

                </span>


        <br><br>

        <?php 
          if(!$checked_query){
        ?>
          <input type="submit" value="Add" name="add" class="btn btn-info btn-sm" style="width:80px; border-radius: 0px;" /><?php } else {?>
          <input type="submit" value="Update" name="Update" onClick="return confirm_click()" class="btn btn-primary btn-sm" style="width:80px; border-radius: 0px;"/>
      <?php } ?>  
          <input type="submit" value="Delete" name="Delete" class="btn btn-danger btn-sm" style="width:80px; border-radius: 0px;"  onclick='return confirm_delete()'/>       
          <input type="submit" value="Exit" name="Exit" class="btn btn-warning btn-sm" style="width:80px; border-radius: 0px;"/>







</div>
</form>
</div>
</div>
</div>


	 
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
	<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>

	