<?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{

    date_default_timezone_set('Asia/Dhaka');
	  require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();
    global $msg;

    if(isset($_POST['Save']))
    {
      $stdID=$db->escape($_POST['stdID']);
      $date=$db->escape($_POST['date']);
    
    	if(!empty($stdID) && !empty($date))
    	{

      	$insert="INSERT INTO `admission_attendance`( `stdid`, `date`, `status`) VALUES('$stdID','$date','0')";
      	$r=$db->link->query($insert);
        if($r)
        {
            $msg="<div style='margin-bottom:-26px;' class='alert alert-success' role='alert'>
                             <b style='text-align:center;'>Save Successfully</b>
                          </div>";

           
        }
        else
        {
            $db->sms="<span style='color:#ff0000; font-size:20px;'> Already Added </span>";
        }

    }
    else{
    	$msg="<div style='margin-bottom:-26px;' class='alert alert-danger' role='alert'>
                             <b style='text-align:center;'>Please Fill Up Text Field.</b>
                          </div>";
    }
    }
   


if(isset($_POST['Delete'])){

	$Delete="DELETE FROM `admission_attendance` WHERE `stdid`='1'";
	$db->delete_query($Delete);
	print "<script>location='admissionAttendance.php'</script>";

  
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



<link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="../js/loading/pace.min.js"></script>
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
	</script>
</head>
<body>




      <div class="col-sm-6 col-xs-6" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Admission Attendance Entry</b></div>
  <div class="panel-body">
   <form action="" method="post" enctype="multipart/form-data" name="form1" id="uploadimage">
     <div class="col-md-12 " style="margin-top: 20px;">


    <div class="form-group">
    <label >Date  :</label>
     <input type="text" name="date" value="<?php echo date('Y-m-d  h:i:s');?>" class="form-control"   style="border-radius: 0px; height: 40px;">

   
  </div>  

    <div class="form-group">
    <label >Student's ID  :</label>
   <input type="text" name="stdID" value="<?php echo $fetch_zero[0];?>" tabindex='1' class="form-control" placeholder="Student's ID"  style="border-radius: 0px; height: 40px;">
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

          
          <input type="submit" value="Save" name="Save" class="btn btn-success btn-sm" style="width:80px; border-radius: 0px;" />

               
          





</div>
</form>
</div>
</div>
</div>

 <div class="col-sm-6 col-xs-6" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Admission Attendance View</b></div>
  <div class="panel-body">
   <form action="" method="post" enctype="multipart/form-data" name="form1" id="uploadimage">
     <div class="col-md-12 " style="margin-top: 20px;">
    <div class="form-group">

        <table class="table table-hover table-bordered">
            <tr>
                <td>SL</td>
                <td>Date</td>
                <td>Class</td>
                <td>Student ID</td>
                <td>Student Name</td>
               

            </tr>

              <?php
                  $selectstd="SELECT `admission_attendance`.`stdid`,`admission_attendance`.`date`,`student_form_info`.`student_name`,`student_form_info`.`class` FROM `admission_attendance` 
INNER JOIN `student_form_info` ON `student_form_info`.`form_ID`=`admission_attendance`.`stdid`
ORDER BY `date` DESC ";
                 $checked_std=$db->select_query($selectstd);
                 if($checked_std)
                  {
                    $i=1;
                    while($fetch_zero=$checked_std->fetch_array())
                    {
                      

              ?>
            <tr>
                
                <td><?php print $i++; ?></td>
                <td><?php print $fetch_zero[1]; ?></td>
                <td><?php  $x=explode('and',$fetch_zero[3]); print $x[1]?></td>
                <td><?php print $fetch_zero[0]; ?></td>
                <td><?php print $fetch_zero[2]; ?></td>
                

            </tr>

<?php
       }
                 }
?>


        </table>
        
 

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



	 
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>

	