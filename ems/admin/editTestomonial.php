<?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{	
		require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
		//print $_GET["id"];
		
		$selecsql = "SELECT * FROM `statictestomonialinfo` WHERE `boardResultID`='".$_GET["id"]."'";
		$resultsql = $db->select_query($selecsql)->fetch_array();
		if(isset($_POST["update"])){
				
				 $update="UPDATE `statictestomonialinfo` SET `type`='".$_POST["Type"]."',`Title`='".$_POST["Title"]."' , `GroupName`='".$_POST["Group"]."' , `Session`='".$_POST["Session"]."' , `year`='".$_POST["Year"]."' ,
`RollNo`='".$_POST["RollNO"]."' , `RegNo`='".$_POST["RegNo"]."' , `GPA`='".$_POST["GPA"]."' , `studentName`='".$_POST["studentName"]."' , `fatherName`='".$_POST["fatherName"]."' , `motherName`='".$_POST["MotherName"]."' ,
`gender`='".$_POST["gender"]."',`v`='".$_POST["v"]."',`p`='".$_POST["p"]."',`u`='".$_POST["u"]."',`d`='".$_POST["d"]."',`bd`='".$_POST["bd"]."' WHERE `boardResultID`='".$_POST["id"]."'";
			$resultsql = $db->update_query($update);
		}
	?>
	<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Show Result Sheet</title>

            
    <script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
            
    <link rel="stylesheet" href="datespicker/datepicker.css">
     <script src="datespicker/bootstrap-datepicker.js"></script>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 </head>

  <body>
  	<form name="teacherinfo" action="" method="post"  enctype="multipart/form-data" class="form-horizontal" >
    
	<div class="col-md-10 col-md-offset-1">
							<table class="table table-responsive table-hover table-bordered "> 
									<tr>
											<td colspan="4" align="center"><strong class="text-success" style="font-size:15px; ">Edit Board Exam Result</strong></td>
									</tr>
									<tr>
											<td>Date</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
												<input type="text" placeholder="dd-mm-yy" id="example2" value="<?php echo date('d/m/Y');?>" name="dataTesto" class="form-control" />
											  	<input type="hidden" name="id" value="<?php echo $_GET["id"];?>" />
											  </div>
											</td>
									</tr>
									<tr>
											<td>Title</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<select id="Title" name="Title" class="form-control">														<optgroup label="Select Title">												
															<option><?php echo $resultsql["Title"];?></option>
															<option>SSC</option>
															
														</optgroup>
													</select>
											  </div>
											</td>
									</tr>
									<tr>
										<td>Group /Subject</td>
											<td>:</td>
											<td>
											<div class="col-md-8">

											<input type="text" id="Group" name="Group" class="form-control" value="<?php echo $resultsql["GroupName"];?>"> </input>

													
											  </div>
											</td>
									</tr>
									<tr>
										<td>Session</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
											<input type="text" name="Session" class="form-control" value="<?php echo $resultsql["Session"];?>"></input>


													
											  </div>
											</td>
									</tr>
									<tr>
										<td>Year</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
											<input id="Year" name="Year" class="form-control" value="<?php echo $resultsql["year"];?>"></input>
													
											  </div>
											</td>
									</tr>
									<tr>
										<td>Type</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<select id="Type" name="Type" class="form-control">																		
														<optgroup label="Select One">
																<option><?php echo $resultsql["type"];?></option>
															<option>Regular</option>
															<option>Irregular</option>
															
														</optgroup>
													</select>
											  </div>
											</td>
									</tr>
									<tr>
										<td>Student Name</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<input type="text" class="form-control" value="<?php echo $resultsql["studentName"];?>" name="studentName" id="studentName" placeholder="student  Name" />
											  </div>
											</td>
									</tr>
									
									<tr>
										<td>Father Name</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<input type="text" value="<?php echo $resultsql["fatherName"];?>"  class="form-control" name="fatherName" id="fatherName" placeholder="Father Name" />
											  </div>
											</td>
									</tr>
									
										<tr>
										<td>Mother Name</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<input type="text" value="<?php echo $resultsql["motherName"];?>" class="form-control" name="MotherName" id="MotherName" placeholder="Mother Name" />
											  </div>
											</td>
									</tr>
									<tr>
										<td>Gender</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<select id="gender" name="gender" class="form-control">																		
														<optgroup label="Select One">
															<option><?php echo $resultsql["gender"];?></option>
															<option>Male</option>
															<option>Female</option>
														</optgroup>
													</select>
											 </div>
											</td>
									</tr>
									
									<tr>
										<td>Roll No</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<input type="text" class="form-control" value="<?php echo $resultsql["RollNo"];?>" name="RollNO" id="RollNO" placeholder="Roll NO.." />
											  </div>
											</td>
									</tr>
									<tr>
										<td>Reg No</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<input type="text" value="<?php echo $resultsql["RegNo"];?>" class="form-control" name="RegNo" id="RegNo" placeholder="Reg No.." />
											  </div>
											</td>
									</tr>
										<tr>
										<td>GPA</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<input type="text" value="<?php echo $resultsql["GPA"];?>" class="form-control" name="GPA" id="GPA" placeholder="GPA.." />
											  </div>
											</td>
									</tr>
									<tr>
										<td>Village</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<input type="text" class="form-control" name="v" id="v" value="<?php echo $resultsql["v"];?>"  />
											  </div>
											</td>
									</tr>
									<tr>
										<td>PO</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<input type="text" class="form-control" name="p" id="p" value="<?php echo $resultsql["p"];?>"  />
											  </div>
											</td>
									</tr>
									
									<tr>
										<td>Upazilla</td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<input type="text" class="form-control" name="u" id="u" value="<?php echo $resultsql["u"];?>"  />
											  </div>
											</td>
									</tr>
										<tr>
										<td>District </td>
											<td>:</td>
											<td>
											<div class="col-md-8">
													<input type="text" class="form-control" name="d" id="d"  value="<?php echo $resultsql["d"];?>" />
											  </div>
											</td>
									</tr>	
									
									<tr>
										<td>Birth Date </td>
											<td>:</td>
											<td>
											<div class="col-md-8">
											 
													<input type="text" class="form-control" name="bd" id="d"  value="<?php echo $resultsql["bd"];?>" />
											  </div>
											</td>
									</tr>
										
										<tr>
										
											<td colspan="3" align="center">
													<input type="submit" value="Update" name="update" class="btn btn-sm btn-success" style="width:120px;" />
													<a href="StaticStudentTestomonial.php" target="adminbody"  class="btn btn-sm btn-success" style="width:120px;" />Show All</a>
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
											</td>
									</tr>
		</table>
		</div>
		</form>
		 </body>
</html>
	<?php
	}
?>