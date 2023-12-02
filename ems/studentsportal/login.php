
<?php

error_reporting(0);
@session_start();

@date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();

if(isset($_GET["page"]))
{
	unset($_SESSION["userlogin"]);
	print "<script>location='../'</script>";
}
	$messaestd="";
	
$select_school="select * from project_info";
$cheke_school=$db->select_query($select_school);
if($cheke_school)
{
		$fetch_school_information=$cheke_school->fetch_array();
}

if(isset($_POST["login"])){
    
	$sqll = " SELECT * FROM `deactivate_id` WHERE `id`='".$_POST["ID"]."' ";
	$resultSqll = $db->select_query($sqll);
	if($resultSqll->num_rows > 0)
	{
            $messaestd="<h3 style='color: #ff0000; text-align: center'> Account Active করার জন্য স্কুল অফিসে যোগাযোগ করো । </h3>"; 
     }
	else
	{
	    
	
	    
	    
	if(!empty($_POST["ID"]))
	{       
	    
	$sql = " SELECT * FROM `studentpassward` WHERE `id`='".$_POST["ID"]."' AND `passward`='".$_POST['password']."' ";
	$resultSql = $db->select_query($sql);
	if($resultSql->num_rows > 0)
	{
					$_SESSION["userlogin"]=1;
				
	}
	
	$sql = "SELECT * FROM `studentpassward` WHERE `id`='".$_POST["ID"]."' AND `passward`='".$_POST['password']."'";
	$resultSql = $db->select_query($sql);
	if($resultSql->num_rows > 0)
	{
					$_SESSION["userlogin"]=1;
					session_start();
					
					$_SESSION["useridid"]=$_POST["ID"];
					$id=$_POST["ID"];
					$_SESSION["userlogin"]=1;
					print "<script>location='./index.php?id=$id'</script>";
					
	}
	else{
						
					  $messaestd="<h3 style='color: #ff0000; text-align: center'> তোমার আইডি এবং পাসওয়ার্ড সঠিকভাবে লিখ । </h3>"; 
					}			
}else{
			print "<script>alert('Please Enter The ID And Password');</script>";

		}
	}
	
		
		
}
?>

<!DOCTYPE html>
<html>
<head>
	 <title><?php print $fetch_school_information['title'] ?></title>
		<link rel="shortcut icon" href="../admin/all_image/<?php echo "shortcurt_iconSDMS2015";?>.png" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/css/uikit.min.css" />
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">


</head>
<body>

	<style>

		body{
			height: 100vh;
			font-family: 'Nunito', sans-serif;
		}

		.input-group input{
			height: 50px;
			border:none;
			border:1px solid lightgray;
			border-left: none;
		}

		.input-group input:focus{
			box-shadow: none;
		}

		.form{
			margin: 0 auto; 
			max-width: 480px; 
			padding-top: 120px;
		}

		.card{
			box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.10) !important;
			border:none;

		}

		.card-body{
			padding-top: 30px;
			padding-bottom: 20px;
		}

		.card-header{
			background:#fff;
			color: #000; 
			padding: 20px;
			font-size: 22px;
			letter-spacing: 0.5px;
			font-weight: bold;
			border-top: 4px solid #1dc68c;
			border-bottom: 1px dashed lightgray;
		}

		#login{
			background-color: #1dc68c; 
			color: #fff; 
			letter-spacing: 1px;
			border-radius: 5px;
			font-weight: bold;
			margin-top: 15px;
		}

		.input-group-text{
			background-color: #1dc68c;
			color: #fff;
		}




	</style>


	<div class="container">

		<form class="form" method="post">

			<div class="card">
				<div class="card-header">
					<center>Student Login</center>
				</div>

				<div class="card-body">

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><span uk-icon="icon: user; ratio: 1"></span></span>
						</div>
						<input type="text"  name="ID" class="form-control" placeholder="ID" required >
					</div>

		 		<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><span uk-icon="icon: unlock; ratio: 1"></span></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="Password" required >
					</div> 

					<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" id="login" type="submit" name="login">Login</button><br>
					<?php print $messaestd; ?>


				</div>
			</div>


		</form>




</p>
	</div>





	<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit-icons.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		AOS.init({
			once: true
		});     
	</script>
</body>
</html>
