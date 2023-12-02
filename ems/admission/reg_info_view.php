<?php
   error_reporting(0);
@session_start();

@date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();

    
    use AdnSms\AdnSmsNotification;
    require_once(__DIR__."/lib/AdnSmsNotification.php");
    $adnsms = new AdnSmsNotification();

    
    unset($_SESSION['stdid']);
    unset($_SESSION['stdPhone']);
    unset($_SESSION['reg_logstatus']);
    unset($_SESSION['name']);
    
			
	$msg="";		
    $select_school="select * from project_info";
    $cheke_school=$db->select_query($select_school);
    if($cheke_school)
    {
        $fetch_school_information=$cheke_school->fetch_array();
    }

        if(isset($_POST['submit']))
        {
            $sscroll=mysqli_real_escape_string($db->link,$_POST['sscroll']);
         
            
                if(!empty($sscroll))
                {
                   // echo "SELECT * FROM `online_applicant_approval_list` WHERE `roll`='$roll' AND `status`='0' ";
                    
                    $sql=$db->link->query("SELECT * FROM `online_reg_std_info` WHERE `board_exam_roll_no`='$sscroll'");
                    if($sql->num_rows>0)
                    {
                       
                        
                        if($fetch=$sql->fetch_array())
                        {
                        
                            print "<script>location='https://imc.edu.bd/studentportal/view_students_details.php?id=$sscroll'</script>";
                            
                        }
                        
                        
                    }
                    else
                    {
                        $msg='<div class="alert alert-danger" role="alert"><h3> Please Check Your Roll No. </h3></div>';
                    }
                }
                
            
        }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="<?php echo $fetch_school_information['meta_tag'] ?>" />
		<title><?php print $fetch_school_information['title'] ?></title>
		<link rel="shortcut icon" href="logo.jpg" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <title>HSC Students Admission Information Form</title>
    <style>
    body{
        
        font-family: 'Noto Serif Bengali', serif;
    }
    </style>

  </head>
  <body>
    <div class="jumbotron bg-success text-white" style="padding:10px;">
      <div class="container">
        <div class="row">
        <div class="col-md-1 col-3 bg-">
              <img src="logo.jpg" style="height: 100px; text-align: right;" class="img-responsive" >
       </div>

        <div class="col-md-10 col-9">
              
         <h4 style="text-shadow:  0px 3px 3px #999;"> <?php print $fetch_school_information['institute_name'] ?></h4>

         <h5 class="text-warning"> Students Information Form (HSC Admission-2023) </h5>
 
        </div>
        </div>

</div>
   </div>

<div class="container mt-2 shadow-sm p-3 mb-5  rounded">

	 
   <form  method="post">

	<div class="row justify-content-center">
					<div class="col-lg-6">
							<table class="table table-resposive table-bordered col-lg-offset-6" style="margin-top:50px; width:100%; background: #fff;" align="center">
									
									<tr align="center" class="success">
										<td colspan="3"> <h1 class="text-success"> Students Information Form (HSC Admission-2023) Print </h1></td>

								</tr>
								
								<tr>
										<td width="37%" align="center">Enter SSC Roll</td>
										<td width="3%" align="center">:</td>
										<td width="48%"><input type="text" name="sscroll" class="form-control" placeholder="Enter Your SSC Roll"  required> </td>
								</tr>
								
								
								<tr class="noneBtnForprin" align="center">
										<td  colspan="3">
									        <input type="submit" name="submit" class="btn btn-success" value="Submit"> 
											<p><?php echo $msg;?></p>
										</td>
								</tr>
							</table>
						</div>
				</div>
</form>
				<br>

 </div>

 <br>
  <div class="col-12  p-2 pt-3 " style="text-align: right; background: #f5f5f5">
     <h5> Developed by : &nbsp; <a href="https://sbit.com.bd" class="text-light" target="_blank"><img src="https://sbit.com.bd/public/setting/1696451508034923.png" class="img-fluid" style="height: 40px;"> </a></h5>
  </div>


  </body>
</html>

		