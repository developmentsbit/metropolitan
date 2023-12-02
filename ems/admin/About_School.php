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
   	$select="SELECT * FROM `about_school`";
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
    	$insert="INSERT INTO `about_school` VALUES('1','$title','$about_school')";
    	$db->insert_query($insert);
      $path="../other_img/AbouSchool.jpg";
      move_uploaded_file($_FILES['file']['tmp_name'],$path);
	  $select="SELECT * FROM `about_school`";
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
    	if(!empty($about_school) and !empty($title))
      {
        $insert="REPLACE INTO `about_school` VALUES('1','$title','$about_school')";
      	$db->update_query($insert);
        $path="../other_img/AbouSchool.jpg";
        move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$select="SELECT * FROM `about_school`";
		$checked_query=$db->select_query($select);
		if($checked_query)
		{
			$fetch_zero=$checked_query->fetch_array();
	   }
    }else
    {
      $msg="<span class='text-center text-danger'>Please Fill Up TextField</span>";
    }
  }

if(isset($_POST['Delete'])){
	$Delete="DELETE FROM `about_school` WHERE `id`='1'";
	$db->delete_query($Delete);
	  @unlink("../other_img/AbouSchool.jpg");
	  print "<script>location='About_School.php'</script>";

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


   <script src="../js/bootstrap.min.js"></script>
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
	</script>
<script type="text/javascript">
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
		function viewShowImage(e){
		var file = e.files[0];
			var imagefile = file.type;		
			var type = ["image/jpeg","image/png","image/jpg"];
			if(imagefile==type[0] || imagefile==type[1] || imagefile==type[2]){
				var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(e.files[0]);
			}else{
				alert("Please select a vild image");
			}
            function imageIsLoaded(e) {
                $("#file").css('border-color','GREEN');
				//$("#textt").text("Selected Image : ");
                $("#preview").attr('src',e.target.result);
				$("#preview").css('height','60px');
            }
			}
			
			$(":file").filestyle();
	</script>
</head>
<body>


      <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>About Us</b></div>
  <div class="panel-body">
   <form action="" method="post" enctype="multipart/form-data" name="form1" id="uploadimage">
     <div class="col-md-9 col-md-offset-1" id="AddMarksStep1" style="margin-top: 20px;">



    <div class="form-group">
    <label >Title  :</label>
   <input type="text" name="title" value="<?php echo $fetch_zero[1];?>" class="form-control" placeholder="Title" style="height: 40px; border-radius: 0px;" >
  </div>  



    <div class="form-group">
    <label >Details  :</label>
    <textarea name="Contact_Textarea" class="form-control"  id="redactor"><?php echo $fetch_zero[2];?></textarea>
  </div>  





    <div class="form-group">
    <label >Picture  :</label>
   <input type="file" class="filestyle" name="file" accept="image/*" id="file" onChange="viewShowImage(this)" /><br><br>
   <?php if($checked_query){?> <img id="preview" src="../other_img/AbouSchool.jpg" class='img-responsive img-thumbnail' height='90' width='90' style='margin-top: 5px; margin-left:15px;' /><?php } ?>
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
  <?php if(!$checked_query){?>
          <input type="submit" value="Add" name="add" class="btn btn-info btn-sm" style="width:80px; border-radius: 0px;" />
          <?php } else {?>
          <input type="submit" value="Update" name="Update" onClick="return confirm_click()" class="btn btn-success btn-sm" style="width:80px; border-radius: 0px;"/>
        <?php } ?>
          <input type="submit" value="Delete" name="Delete" class="btn btn-danger btn-sm" style="width:80px; border-radius: 0px;"  onclick='return confirm_delete()'/>       
          <input type="submit" value="Exit" name="Exit" class="btn btn-warning btn-sm" style="width:80px; border-radius: 0px;"/>





     </div>
   </form>


 </div>
</div>
</div>





	 
 
</body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>

	