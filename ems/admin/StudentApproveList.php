<?php
	error_reporting(1);
	@session_start();
 
	if($_SESSION["logstatus"] === "Active")
	{

    date_default_timezone_set('Asia/Dhaka');
	  require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();
    if(isset($_GET['formid']))
    {

      $x=$_GET['formid'];
   

       print "<script>location='Student_information.php?formid=$x'</script>";
    }
    
    if(isset($_GET["del"]))
    {
        $db->link->query("DELETE from `admission_attendance` where `stdid`='".$_GET['del']."'");
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

<style type="text/css">
      @media print
      {
          .print{
            display: none;
          }
      }

</style>
</head>
<body>




 

 <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

 		<table class="table table-bordered table-hover">
		<tr>	
				<td width="10%"></td>
				<td>
						<div style="float: left; clear: right; width: 15%; text-align: center;  ">  
							<img src="all_image/logoSDMS2015.png" style="max-width: 150px; max-height: 100px; " /> 
						</div>
							

						<div style="float: left; clear: right; text-align: center; width: 70% ">   
								<ul>
				    
							    <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:30px; list-style: none;">Al Helal Academy</li>

							   <li style="list-style: none; ">

							   		<p style="font-size:16px;font-family:Arial, Helvetica, sans-serif">Main Road , Sonagazi, Feni. 
   								</p>

							   	</li>

							    <li style=" list-style: none; font-size:14px;font-family:Arial, Helvetica, sans-serif">www.alhelalacademy.edu.bd<br>01728563480, info@alhelalacademy.edu.bd  </li>
							 </ul> 

				      </div>

				      <div style="float: right;  width: 15%; text-align: center;  ">  
							
						</div>
				</td>
				<td width="10%"></td>
		</tr>
		</table>

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Admission Attendance Report</b></div>
  <div class="panel-body">
   <form action="" method="post" enctype="multipart/form-data" name="form1" id="uploadimage">
     <div class="col-md-12 " style="margin-top: 20px;">
    <div class="form-group">

        <table class="table table-hover table-bordered">
            <tr>
                <td>Action</td>
                <td>SL</td>
                <td>Date</td>
                <td>Class</td>
                <td>Student ID</td>
                <td>Student Name</td>
                <td>Phone</td>
                <td>Comments</td>
                <td class="print">Action</td>

               

            </tr>

              <?php
                  $selectstd="SELECT `admission_attendance`.`stdid`,`admission_attendance`.`date`,`student_form_info`.`student_name`,`student_form_info`.`class`, `student_form_info`.`phone` FROM `admission_attendance` 
INNER JOIN `student_form_info` ON `student_form_info`.`form_ID`=`admission_attendance`.`stdid` WHERE `admission_attendance`.`status`='1' ORDER BY `date` DESC ";
                 $checked_std=$db->select_query($selectstd);
                 if($checked_std)
                  {
                    $i=1;
                    while($fetch_zero=$checked_std->fetch_array())
                    {
                      

              ?>
            <tr>
                
                <td><input type="checkbox" name="stdid[]" value="<?php print $fetch_zero[0]; ?>" checked="checked"> </input></td>
                <td><?php print $i++; ?></td>
                <td><?php print $fetch_zero[1]; ?></td>
                <td><?php  $x=explode('and',$fetch_zero[3]); print $x[1]?></td>
                <td><?php print $fetch_zero[0]; ?></td>
                <td><?php print $fetch_zero[2]; ?></td>
                <td><?php print $fetch_zero[4]; ?></td>
                <td></td>
                <td class="print">
                <a href="StudentApproveList.php?formid=<?php print $fetch_zero[0]; ?>" formtarget="blank"  class="btn btn-success" >Registration</a>
               
                <a href="StudentApproveList.php?del=<?php print $fetch_zero[0]; ?>" formtarget="blank"  class="btn btn-danger" >Delete</a></td>
                

            </tr>

<?php
       }
                 }
?>
<tr class="print">
<td colspan="8" align="center" >

 <input type="button" class="btn btn-info" onclick="window.print()" value="Print"></input>

 </td>
 </tr>


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

	