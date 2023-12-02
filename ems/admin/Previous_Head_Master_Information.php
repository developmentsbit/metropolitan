	<?php
		error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{	require_once("../db_connect/config.php");
		require_once("../db_connect/conect.php");

		$db = new database();
	
		global $table;
		$fetch[4]="";
		$fetch[1]="";
		$fetch[2]="";
		$fetch[3]="";
		$fetch[5]="";
		$prefix=date("y"."m"."d");
	    $fetch[0]=$db->withoutPrefix('previous_principal','id',$prefix,'8');
		
		if(isset($_POST['add']))
		{
			                   
			$Type = $db->escape($_POST['title']);
			$slNo = $db->escape($_POST['slNo']);
			$name = $db->escape($_POST['name']);
			$academicQualification = $db->escape($_POST['academicQualification']);
			$mobile = $db->escape($_POST['mobile']);
			$address = $db->escape($_POST['address']);
			$FathersName = $db->escape($_POST['FathersName']);
			$MotersName = $db->escape($_POST['MotersName']);
			$Duration = $db->escape($_POST['Duration']);
			$profession=$db->escape($_POST['profession']);
			$Details=$db->escape($_POST['Details']);
			$designation = $db->escape($_POST['designation']);


		if($Type!="Select Type" && !empty($Type) && !empty($name))
		{
			$query="INSERT INTO `previous_principal` (`ID`,`SL`,`Type`,`Name`,`FatherName`,`MotherName`,`Address`,`MobileNo`,`AcademicQualification`,`Profession`,`Duration`,`DesignationInCommittee`,`Details`) VALUES ('$fetch[0]','$slNo','$Type','$name','$FathersName','$MotersName','$Details','$mobile','$academicQualification','$profession','$Duration','$designation','$Details')";
				//print_r($query);
				$resultisnsert=$db->insert_query($query);
				 $strfimg="../other_img/".$fetch[0].".jpg";
				// print  $strfimg;

                @move_uploaded_file($_FILES["file"]["tmp_name"],$strfimg);
                @chmod($strfimg,0644);
			}
			else
			{
				$msg="<span class='text-center text-danger glyphicon glyphicon-remove'>&nbsp;Please Fill Up TextField</span>";
			}
		}
		

		if(isset($_POST['srcbutton']))
		{
			//print "dsafa";
			$src_text=$db->escape($_POST['srctext']);
			if(!empty($src_text))
			{
				$query="SELECT * FROM `previous_principal` WHERE `id`='$src_text'";
				$cheked_query=$db->select_query($query);
				if($cheked_query)
					{
						$fetch=$cheked_query->fetch_array();
					}

			}
			else
			{
				$msg="<span class='text-center text-danger glyphicon glyphicon-remove'>&nbsp;Not Found !!</span>";
			}
		}


		if(isset($_POST['Update']))
		{
			
			$ptid=$db->escape($_POST['id']);
			$Type = $db->escape($_POST['title']);
			$slNo = $db->escape($_POST['slNo']);
			$name = $db->escape($_POST['name']);
			$academicQualification = $db->escape($_POST['academicQualification']);
			$mobile = $db->escape($_POST['mobile']);
			$address = $db->escape($_POST['address']);
			$FathersName = $db->escape($_POST['FathersName']);
			$MotersName = $db->escape($_POST['MotersName']);
			$Duration = $db->escape($_POST['Duration']);
			$profession=$db->escape($_POST['profession']);
			$Details=$db->escape($_POST['Details']);
			$designation = $db->escape($_POST['designation']);

			
			if($Type!="Select Type" && !empty($Type) && !empty($name))
			{
				$query="REPLACE INTO `previous_principal` (`ID`,`SL`,`Type`,`Name`,`FatherName`,`MotherName`,`Address`,`MobileNo`,`AcademicQualification`,`Profession`,`Duration`,`DesignationInCommittee`,`Details`) VALUES ('$ptid','$slNo','$Type ','$name','$FathersName','$MotersName','$address','$mobile','$academicQualification','$profession','$Duration','$designation','$Details')";
			
				$update=$db->update_query($query);	

				if(!empty($_FILES["file"]["tmp_name"]))
				{
					 $strfimg="../other_img/$ptid.jpg";
	                @move_uploaded_file($_FILES["file"]["tmp_name"], $strfimg);
	                @chmod($strfimg,0644);
				}
				print "<script>location='Previous_Head_Master_Information.php'</script>";
			   
			}


			else
			{
				$msg="<span class='text-center text-danger glyphicon glyphicon-remove'>&nbsp;Please Fill Up TextField</span>";	
			}
		}

		if(isset($_POST['Delete']))
		{
			$ptid=$db->escape($_POST['id']);
			$query="DELETE FROM `previous_principal` WHERE `id`='$ptid'";
			$delete=$db->delete_query($query);
			$fetch[0]=$db->withoutPrefix('previous_principal','id',$prefix,'10');
			print "<script>location='Previous_Head_Master_Information.php'</script>";

			
		}

		if(isset($_POST['View']))
		{

			
			$table="<div class='col-md-12' style='margin-top:30px'>"."<table class='table table-responsive table-hover table-bordered' align='center' style='margin-top:-20px;'>";


       		 $table.="<tr class='warning' >"."<td align='left' colspan='14'>"."<a href='Previous_Head_Master_Information.php' class='btn btn-primary'>"."<span class='link text-center'>Back<span>"."</a>"."</td>"."</tr>";



       		 $table.="<tr class='success' >"."<td align='center' colspan='14'>"." <h2>Al Helal Academy</h2><h4>Administration Information</h4></td>"."</tr>";




			$table.="<tr style='margin-top:10px;'>"."<td>SL</td><td>Type</td><td>Name</td>"."<td>Father's Name</td>"."<td>Mother's Name </td>"."<td>Address</td>"."<td>Mobile No</td>"."<td>Academic Qualification</td><td>Profession</td><td>Duration</td><td>Designation</td><td>Details</td>"."<td>Picture</td><td>Edit Or Delete</td>"."</tr>";


$q="SELECT `Type` FROM `previous_principal` GROUP BY `Type`";
$r=$db->select_query($q);
while($fr=$r->fetch_array())
{
	//print $fr[0];

 $table.="<tr class='success' >"."<td align='center' colspan='14'>".$fr[0]."</tr>";

			$query="select `ID`,`SL`,`Type`,`Name`,`FatherName`,`MotherName`,`Address`,`MobileNo`,`AcademicQualification`,`Profession`,`Duration`,`DesignationInCommittee`,`Details` from previous_principal where `Type`='$fr[0]' order by `SL` ASC";
		//	print $query;

			$result=$db->select_query($query);
			if($result){
				$num_fields=mysqli_num_fields($result);
			while($a=$result->fetch_array())
			{
				$table.="<tr class=''>";
				for($i=1;$i<$num_fields;$i++)
				{
					$table.="<td>".$a[$i]."</td>";

				}
				$table.='<td> <img src="../other_img/'.$a[0].'.jpg" style="height:50px; width:50px" </td>';

				$table.="<td align='center'>";
				$table.="<a href='Previous_Head_Master_Information.php?edit=$a[0]' class='btn btn-primary' style='width:80px' onclick='return confirm_click()'>Edit</a><br/><a style='width:80px; margin-top:2px;' href='Previous_Head_Master_Information.php?dlt=$a[0]' class='btn btn-danger' onclick='return confirm_delete()	'>Delete</a>";
				$table.="</td>";
				$table.="</tr>";
			} }
		}
			$table.="</table></div>";
		

}

		if(isset($_GET['edit']))
		{
			$src_text=$db->escape($_GET['edit']	);
			if(!empty($src_text))
			{
				$query="SELECT * FROM `previous_principal` WHERE `id`='$src_text'";
				$cheked_query=$db->select_query($query);
				if($cheked_query)
					{
						$fetch_info=$cheked_query->fetch_array();
					}

			}
			else
			{
				$msg="<span class='text-center text-danger glyphicon glyphicon-remove'>&nbsp;Not Found !!</span>";
			}
		}



		if(isset($_GET['dlt']))
		{
			$linid=$db->escape($_GET['dlt']);
			$query="DELETE FROM `previous_principal` WHERE `id`='$linid'";
			$delete=$db->delete_query($query);
			 $fetch[0]=$db->withoutPrefix('previous_principal','id',$prefix,'10');
			print "<script>location='Previous_Head_Master_Information.php'</script>";
			@unlink("../other_img/".$linid.".jpg");
			
		}

		if(isset($_POST['Exit']))
		{
			print exit();
		}

	?>


	<!DOCTYPE html>
	<html lang="en">
	  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	   
	    <title></title>
		
<link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="../js/loading/pace.min.js"></script>


		    <link href="../css/bootstrap.min.css" rel="stylesheet">

	    <link rel="stylesheet" href="datespicker/datepicker.css">
	    <link rel="stylesheet" href="datespicker/bootstrap.min.css">

	   <script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
	     <script src="datespicker/bootstrap-datepicker.js"></script>
	     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->


<!-- Latest compiled and minified JavaScript -->

	    
	    <script type="text/javascript">
	    	function confirm_click()
	    	{
	    		$confirm_click=confirm('Are You Confirm Update ');
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
	    		$confirm_click=confirm('Are You Confirm Delete ');
	    		if($confirm_click===true)
	    		{
	    			return true;
	    		}
	    		else
	    		{
	    			return false;
	    		}
	    	}

	    	// When the document is ready
	            $(document).ready(function () {
	                
	                $('#example1').datepicker({
	                    format: "dd/mm/yyyy"
	                });  
	            
	            });
	             // When the document is ready
	            $(document).ready(function () {
	                
	                $('#example2').datepicker({
	                    format: "dd/mm/yyyy"
	                });  
	            
	            });
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
	  	<form name="" action=""  method="post"  enctype="multipart/form-data" class="form-horizontal" >
		
		<?php 
			if(isset($_POST['View']))
		{
			if($result)
			{
				echo $table;
			}
			else
			{
				 echo "<span class='text-danger' style='font-size:22px;'>"."<strong>"."No Record  Found"."<a href='Previous_Head_Master_Information.php'>"."Go Back"."</a>"."<strong>"."</span>";
			}
		}else{
		?>
	  	<div class="has-feedback col-xs-12 col-md-8 col-sm-8 col-sm-offset-2 col-md-offset-2">
	  	<table align="center" class="table table-responsive" style="border:1px #CCCCCC solid; margin-top:30px; color: #000;">
	  			<tr>
	  				<td bgcolor="#f4f4f4" class="warning" colspan="4" bgcolor="#dddddd" align="center"><span style="font-size:22px; color:#333; display:block;">Administration Info</span> </td>
	  			</tr>
	  			 <input type="hidden" name="id" value="<?php echo @$fetch_info[0];?>" />

				<tr>
					<td class="info">Type </td>
					<td class="info">:</td>
					<td colspan="2" class="info">
						<div class="col-lg-10 col-sm-10 col-md-10 has-warning">
							<!-- <input type="text" name="title" class="form-control" value="<?php echo $fetch[1]; ?>" /> -->
							<select name="title" class="form-control">
							<?php
								if($fetch_info['Type']!="")
								{
									print "<option>".$fetch_info['Type']."</option>";
								}
							?>
							<option>Select Type</option>
								<option>Members Info</option>
								<option>Doner info</option>
								<option>Chairman</option>
								<option>Headmaster</option>
							</select>   <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
						</div>
					
					</td>
				</tr>

			<tr>
					<td class="info">SL </td>
					<td class="info">:</td>
					<td colspan="2" class="info">

						<div class="col-lg-10 col-sm-10 col-md-10 has-warning">
							<input type="text" name="slNo" class="form-control"  value="<?php print $fetch_info['SL']?>" />
	                          <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
						</div>
					</td>
				</tr>

				<tr>
					<td class="info">Name </td>
					<td class="info">:</td>
					<td colspan="2" class="info">
						<div class="col-lg-10 col-sm-10 col-md-10 has-warning">
							<input type="text" name="name" class="form-control" value="<?php print $fetch_info['Name']?>"  />  <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
	                          
						</div>
					</td>
				</tr>

					<tr>
					<td class="info">Father's Name </td>
					<td class="info">:</td>
					<td colspan="2" class="info">
						<div class="col-lg-10 col-sm-10 col-md-10 has-warning">
							<input type="text" name="FathersName" class="form-control"  value="<?php print $fetch_info['FatherName']?>" />
	                            
						</div>
					</td>
				</tr>

						<tr>
					<td class="info">Mother's Name </td>
					<td class="info">:</td>
					<td colspan="2" class="info">
						<div class="col-lg-10 col-sm-10 col-md-10 has-warning">
							<input type="text" name="MotersName" class="form-control"  value="<?php print $fetch_info['MotherName']?>"  />
	                            
						</div>
					</td>
				</tr>

				<tr>
					<td class="info">Address</td>
					<td class="info">:</td>
					<td colspan="2" class="info">
						<div class="col-lg-10 col-sm-10 col-md-10 has-warning">
							<textarea name="address" class="form-control"><?php print $fetch_info['Address']?> </textarea>  
						</div>
					</td>
				</tr>

				<tr>
					<td class="info">Mobile No. </td>
					<td class="info">:</td>
					<td colspan="2" class="info">
						<div class="col-lg-10 col-sm-10 col-md-10 has-warning">
							<input type="text" name="mobile" class="form-control" value="<?php print $fetch_info['MobileNo']?>" />
	                            
						</div>
					</td>
				</tr>


				<tr>
					<td class="info">Academic Qualification  </td>
					<td class="info">:</td>
					<td colspan="2" class="info">
						<div class="col-lg-10 col-sm-10 col-md-10 has-warning">
						<textarea class="form-control" name="academicQualification"><?php print $fetch_info['AcademicQualification']?>  </textarea>
	                            
						</div>
					</td>
				</tr>


					<tr>
					<td class="info">Profession </td>
					<td class="info">:</td>
					<td colspan="2" class="info">
						<div class="col-lg-10 col-sm-10 col-md-10 has-warning">
							<input type="text" name="profession" class="form-control" value="<?php print $fetch_info['Profession']?>" />
	                            
						</div>
					</td>
				</tr>

					<tr>
					<td class="info">Duration </td>
					<td class="info">:</td>
					<td colspan="2" class="info">
						<div class="col-lg-10 col-sm-10 col-md-10 has-warning">
							<input type="text" name="Duration" class="form-control" value="<?php print $fetch_info['Duration']?>" />
	                            
						</div>
					</td>
				</tr>


				<tr>
					<td colspan="1" class="info">Designation in Committee</td>
					<td class="info">:</td>
					<td colspan="2" class="info">
						<div class="col-lg-10 col-sm-10 col-md-10 has-warning">
							<input type="text"  class="form-control" name="designation" value="<?php print $fetch_info['DesignationInCommittee']?>" > </input>
							
						</div>
					</td>
				</tr>



				<tr>
					<td class="info">Details </td>
					<td class="info">:</td>
					<td colspan="2" class="info">
						<div class="col-lg-10 col-sm-10 col-md-10 has-warning">
						<textarea class="form-control" name="Details"> <?php print $fetch_info['Details']?></textarea>
	                            
						</div>
					</td>
				</tr>

				 <tr class="success">
                    <td align="left">
    	Picture(250*200)px
    </td>
                    <td>:</td>
                    <td colspan="2">
                       <div class="col-lg-8 col-md-8"><input type="file" class="filestyle" name="file" accept="image/*" id="file" onChange="viewShowImage(this)" /></div><br/><br>
					   <img src="all_image/Noimage.png" class='img-responsive img-thumbnail' height='90' width='90' id="preview" style='margin-top: 5px; margin-left:15px;' />
                    </td>
                   
                     
                </tr>






				<tr>
	  				<td class="danger" colspan="4" bgcolor="#dddddd" align="center"><span>
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

	  				</span> </td>
	  			</tr>
				<tr>
	  				<td bgcolor="#f4f4f4" class="warning" colspan="4"align="center" >
					
					<?php if(!$cheked_query){ ?>
						<input type="submit" value="Add" name="add" class="btn btn-primary btn-sm" style="width:80px;" />
						<?php } else { ?>
						<input type="submit" value="Update" name="Update" onClick="return confirm_click()" class="btn btn-primary btn-sm" style="width:80px;"/>
						<?php } ?>
						<input type="submit" value="View" name="View" class="btn btn-primary btn-sm" style="width:80px;"/>
						<input type="submit" value="Delete" name="Delete" onClick="return confirm_delete()" class="btn btn-primary btn-sm" style="width:80px;"/>
						
						<input type="submit" value="Exit" name="Exit" class="btn btn-primary btn-sm" style="width:80px;"/>
					</td>
	  			</tr>
	  	</table>
		
				</div>

	  	<?php } ?>
		</form>
	 
	    <script src="../js/bootstrap.min.js"></script>
	  </body>
	</html>
	<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
