
<?php
	
		error_reporting(1);
		@session_start();
if($_SESSION["userlogin"]==1)
		{
		require_once("../db_connect/config.php");
		require_once("../db_connect/conect.php");
		date_default_timezone_set("Asia/Dhaka");
		$db = new database();
		$userID =$_SESSION["useridid"];
        $sms="";
			if(isset($_POST["changePass"]))
			{

					if($_POST["REnewPass"]==$_POST["newPass"])
					{
							if(!empty($_POST["REnewPass"]) && !empty($_POST["newPass"]))
							{
									$db->link->query("UPDATE `studentpassward` SET `passward`='".$_POST["newPass"]."' WHERE `id`='$userID'");
									print "UPDATE `studentpassward` SET `passward`='".$_POST["newPass"]."' WHERE `id`='$userID'";

									$sms='<span style="color: GREEN;">Update Successfully!!</span>';
							}
							else
							{
								   $sms='<span style="color: #ff0000;">Please fill out the all fields!!</span>';
							}

					}
					else
					{
						$sms='<span style="color: #ff0000;">Password Not Match!!!!</span>';
					}

			}


?>
	
		

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Change Password</title>

	<script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
	
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="../js/loading/pace.min.js"></script>
</head>

  <body>

  <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">
  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Change Password</b></div>
  <div class="panel-body">
   <form name="teacherinfo" action="" method="post"  enctype="multipart/form-data" class="form-horizontal marksEditEntry" >
   	 <div class="col-md-5 col-md-offset-4" id="AddMarksStep1" style="margin-top: 20px;">




   <div class="form-group">
    <label >User ID :</label>
  
    <input type="text"  name="UserID" id="UserID" class="form-control" style="border-radius: 0px; height: 40px;" value="<?php print $userID; ?>" readonly/>
	

  </div>  




        <div class="form-group">
    <label >New Password  :</label>
   <input type="password"  name="newPass" id="newPass" class="form-control" style="border-radius: 0px; height: 40px;" />


  </div>  





        <div class="form-group">
    <label >Confirm Password  :</label>
   <input type="password"  name="REnewPass" id="REnewPass" onKeyUp="return passMatch()"  class="form-control" style="border-radius: 0px; height: 40px;"/>
     <br/><br/>
	<span id="showMsg"></span>


  </div>  


<strong style="font-weight:bold; font-size:15px"><span id="updateSms" class="text-danger"></span></strong>

<input type="submit" name="changePass" value="Change Password" class="btn btn-info active"  style="width: 180px; border-radius: 0px;" ></input>


<br>
<?php
	print $sms;
?>

   	 </div>
   	</form>

  </div>
</div>
</div>












 <script src="../js/bootstrap.min.js"></script>
 	
 	<script>
		
		
		function passMatch(){
				$('#showMsg').show();
				var pass = $("#newPass").val();
				var repass = $("#REnewPass").val();
				//alert(repass);
				if(pass == ''){
						$('#showMsg').html("<strong class='glyphicon glyphicon-remove text-danger' style='font-size:15px;font-weight:bold'>&nbsp;Please Enter the passward..</strong>");
				}else {
						if(pass === repass){
								$('#showMsg').html("<strong class='glyphicon glyphicon-ok text-success' style='font-size:15px;font-weight:bold'>&nbsp;Passward  match..</strong>");
						}else {
							$('#showMsg').html("<strong class='glyphicon glyphicon-remove text-danger' style='font-size:15px;font-weight:bold'>&nbsp;Passward  don't match..</strong>");
						}
				}
				
				
		}
		
		

	</script>

  </body>
</html>
<?php
}
else
{
    print "<script>location='login.php'</script>";

}
?>
