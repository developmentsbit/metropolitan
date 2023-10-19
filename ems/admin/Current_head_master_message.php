<?php	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();
    global $msg;
   $fetch_zero[1]='';
   $fetch_zero[2]='';
   $fetch_zero[3]='';
   	$select="SELECT * FROM `message_from_head_teacher`";
   	$checked_query=$db->select_query($select);
   	if($checked_query)
   	{
   		$fetch_zero=$checked_query->fetch_array();
   }

    if(isset($_POST['add']))
    {
      $name=$db->escape($_POST['name']);
      $title=$db->escape($_POST['title']);
      $about_school=$db->escape($_POST['Contact_Textarea']);
    	if(!empty($name) && !empty($title) && !empty($about_school))
    	{

    	$insert="INSERT INTO `message_from_head_teacher` VALUES('1','$name','$title','$about_school')";
     
    	$chek=$db->insert_query($insert);
      
      $path="../other_img/Principle.jpg";
      move_uploaded_file($_FILES['file']['tmp_name'],$path);
    
		$select="SELECT * FROM `message_from_head_teacher`";
		$checked_query=$db->select_query($select);
		if($checked_query)
		{
			$fetch_zero=$checked_query->fetch_array();
	   }
    }
    else{
    	$msg="<div style='margin-bottom:-26px;' class='alert alert-danger' role='alert'>
                             <b style='text-align:center;'>Please Fill Up Text Field.</b>
                          </div>";
    }
    }
   
  if(isset($_POST['Update']))
    {
    	
      $name=$db->escape($_POST['name']);
      $title=$db->escape($_POST['title']);
      $about_school=$db->escape($_POST['Contact_Textarea']);
    	if(!empty($name) && !empty($title) && !empty($about_school))
      {
        $insert="REPLACE INTO `message_from_head_teacher` VALUES('1','$name','$title','$about_school')";
      	$db->update_query($insert);
       $path="../other_img/Principle.jpg";
      move_uploaded_file($_FILES['file']['tmp_name'],$path);
	  $select="SELECT * FROM `message_from_head_teacher`";
		$checked_query=$db->select_query($select);
		if($checked_query)
		{
			$fetch_zero=$checked_query->fetch_array();
	   }
    }else
    {
      $msg="<div style='margin-bottom:-26px;' class='alert alert-danger' role='alert'>
                             <b style='text-align:center;'>Please Fill Up Text Field.</b>
                          </div>";
    }
  }


if(isset($_POST['Delete'])){
	$Delete="DELETE FROM `message_from_head_teacher` WHERE `id`='1'";
	$db->delete_query($Delete);
  @unlink("../other_img/Principle.jpg");
  print "<script>location='Current_head_master_message.php'</script>";

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


<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="lib/jquery-1.9.0.min.js"></script>


<link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="../js/loading/pace.min.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">
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
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Principle Message</b></div>
  <div class="panel-body">
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="col-md-8 col-md-offset-2" id="AddMarksStep1" style="margin-top: 20px;">



      <div class="form-group">
    <label >Title :</label>
   <input type="text" name="title" value="<?php echo $fetch_zero[2];?>" style="height: 40px; border-radius: 0px;" class="form-control" placeholder="Title" />


  </div>  




      <div class="form-group">
    <label > Name  :</label>
    <input type="text" name="name" value="<?php echo $fetch_zero[1];?>" style="height: 40px; border-radius: 0px;" class="form-control" placeholder="Name" />


  </div>  




      <div class="form-group">
    <label >Message  :</label>
    <textarea name="Contact_Textarea"  style="border-radius: 0px;" class="form-control textarea"><?php echo $fetch_zero[3];?></textarea>


  </div>  





      <div class="form-group">
    <label >Picture  :</label>
   <input type="file" class="filestyle" class="" name="file" accept="image/*"  onChange="return viewShowImage(this)"/> <br/><br/>
    <?php if($checked_query){?> <img src="../other_img/Principle.jpg" class='img-responsive img-thumbnail' height='90' width='90' id="preview" style='margin-top: -33px;
    margin-left: 2px;' /><?php } ?>


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

        <?php if(!$checked_query){?>
          <input type="submit" value="Add" name="add" class="btn btn-info btn-sm" style="width:80px; border-radius: 0px; margin-top: 50px;" /><?php } else {?>

          <input type="submit" value="Update" name="Update" onClick="return confirm_click()" class="btn btn-primary btn-sm" style=" margin-top: 50px; width:80px;"/>

        <?php } ?>
          <input type="submit" value="Delete" name="Delete" class="btn btn-danger btn-sm" style="width:80px; border-radius: 0px; margin-top: 50px;"  onclick='return confirm_delete()'/> 
                
          <input type="submit" value="Exit" name="Exit" class="btn btn-warning btn-sm" style="width:80px; margin-top: 50px; border-radius: 0px;"/>
       







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

	 
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>

	