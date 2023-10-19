<?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{ 
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();
    global $msg;
   $fetch_zero[2]='';
   $fetch_zero[1]='';
   global $checked_query;
  $select="SELECT * FROM `auditoriaminfo`";
   $checked_query=$db->select_query($select);
   if($checked_query)
  	{
   		$fetch_zero=$checked_query->fetch_array();
   }

    if(isset($_POST['add']))
    {
      $title=$db->escape($_POST['title']);
      $about_school=$db->escape($_POST['Contact_Textarea']);
    	if(!empty($about_school) && !empty($title))
    	{
    	$insert="INSERT INTO `auditoriaminfo` VALUES('1','$title','$about_school')";
    	$db->insert_query($insert);
        $select="SELECT * FROM `auditoriaminfo`";
   $checked_query=$db->select_query($select);
   if($checked_query)
    {
      $fetch_zero=$checked_query->fetch_array();
   }
      
    }
    else{
    	$msg="<span class='text-center text-danger'>Please Fill Up TextField</span>";
    }
    }
   
  if(isset($_POST['Update']))
    {
    	

      $title=$db->escape($_POST['title']);
      $about_school=$db->escape($_POST['Contact_Textarea']);
      if(!empty($title) && !empty($about_school))
      {
      	$insert="REPLACE INTO `auditoriaminfo` VALUES('1','$title','$about_school')";
      	$db->update_query($insert);
          $select="SELECT * FROM `auditoriaminfo`";
   $checked_query=$db->select_query($select);
   if($checked_query)
    {
      $fetch_zero=$checked_query->fetch_array();
   }
       
      }
      else
      {
        $msg="<span class='text-center text-danger'>Please Fill Up TextField</span>";
      }
  } 

if(isset($_POST['Delete'])){
	$Delete="DELETE FROM `auditoriaminfo` WHERE `id`='1'";
	$db->delete_query($Delete);
  print "<script>location='AuditoriumInformation.php'</script>";
  
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
<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="lib/jquery-1.9.0.min.js"></script>


	<!-- Redactor is here -->
	<link rel="stylesheet" href="redactor/redactor.css" />
	<script src="redactor/redactor.min.js"></script>
<link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="../js/loading/pace.min.js">
<script src="textEdit/redactor/redactor.min.js"></script>
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
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Auditoriam Information</b></div>
  <div class="panel-body">
   <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
     <div class="col-md-9 col-md-offset-1" id="AddMarksStep1" style="margin-top: 20px;">



    <div class="form-group">
    <label >Title  :</label>
 <input type="text"  name="title" <?php if($checked_query){?> value="<?php echo $fetch_zero[1];?>"<?php } else {?> value="" <?php } ?> class="form-control" placeholder="Title" style="border-radius: 0px; height: 40px;" />
  </div>  


    <div class="form-group">
    <label >Details  :</label>
   <textarea name="Contact_Textarea" class="form-control"  id="redactor"><?php if($checked_query){ echo $fetch_zero[2];} else { echo "";}?></textarea>
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
          <input type="submit" value="Add" name="add" class="btn btn-info btn-sm" style="width:80px; border-radius: 0px;" />
          <?php } else {?>
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

	