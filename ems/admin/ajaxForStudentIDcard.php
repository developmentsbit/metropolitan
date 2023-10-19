  <?php
	@error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{	
		require_once("../db_connect/config.php");
	    require_once("../db_connect/conect.php");
	    require "barcode/vendor/autoload.php";
		date_default_timezone_set("Asia/Dhaka");
		$db = new database();
	

 		$select_school="select * from project_info";
		$cheke_school=$db->select_query($select_school);
		if($cheke_school)
		{
			$fetch_school_information=$cheke_school->fetch_array();
		}

		$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php print $fetch_school_information['title'] ?></title>
	<link rel="shortcut icon" href="all_image/<?php echo "shortcurt_iconSDMS2015";?>.png" />

	<style>
	*{padding:0px; margin:0px;}
			@media print{
			.noneBtnForprin{
				display:none;
			}
			#dont{
				display:none;
			}
			.dontprint{
			display:none;
			}
			

			.container{

				width: 800px; 
				height: auto;

				
			}

			.IdCard{
				float: left; clear: right;
	
				 width: 250px;
				 margin-top:30px;
			}
		}
	</style>
    </head>

  <body>

           <div style="width: 1125px; height: 780px; ">
					
					
					<?php
				 	$selecr_data="SELECT `running_student_info`.*,`student_personal_info`.`id`,`student_name`,`student_acadamic_information`.`session2`,
`add_class`.`class_name`,`add_group`.`group_name` FROM `running_student_info` INNER JOIN `student_personal_info`
ON `student_personal_info`.`id`= `running_student_info`.`student_id` INNER JOIN `student_acadamic_information`
ON `student_acadamic_information`.`id`=`running_student_info`.`student_id` INNER JOIN `add_class`
ON `add_class`.`id`=`running_student_info`.`class_id` INNER JOIN `add_group`
ON `add_group`.`id`=`running_student_info`.`group_id` WHERE `running_student_info`.`class_id`='".$_GET["clID"]."'
AND `running_student_info`.`group_id`='".$_GET["gpna"]."'  AND `student_acadamic_information`.`session2`='".$_GET["session"]."' AND `running_student_info`.`class_roll`  BETWEEN '".$_GET["stdRollfrom"]."' AND '".$_GET["stdRollto"]."' ORDER BY `running_student_info`.`class_roll` ASC";
				$result_data = $db->select_query($selecr_data);		
						if($result_data->num_rows > 0)	{
								while($fetch_Data = $result_data->fetch_array()){

								$code = $Bar->getBarcode($fetch_Data["student_id"], $Bar::TYPE_CODE_128);
					?>
						
	
	<div style="width: 358px; height: 246px; background: #986554; float: left; clear: right; margin: 7px; "> 

<div style="height:65px; background:#ff0000; width:100%"> 
        <table  width="100%" style=" border: 1px #000 solid;  padding: 0px; " align="center">
			<tr>	
				 <td>
					<div style="float: left; clear: right; width: 15%; text-align: right;  ">  
						<img src="all_image/logoSDMS2015.png" style="max-width: 50px; max-height: 50px; padding: 10px;" /> 
					</div>
							
                    <div style="float: left; clear: right; text-align: center; width: 70% ">   
							<ul>
							    <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:24px; list-style: none; "><?php print $fetch_school_information['institute_name']?></li>
							   <li style="list-style: none;">
							   	    <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_school_information['LocationbAngla']?> </p>
                                </li>
                               
							   <li style="list-style: none;">Mobile: <?php print $fetch_school_information['phone_number']?>  </li>
							 </ul> 
				    </div>
				     <div style="float: right;  width: 15%; text-align: center;  ">  
							
					</div>
				</td>
		    </tr>
        </table>
			</div>
			
			<div style="height: 181px; width: 100%; background: #f4f4f4;">
            <table cellspacing="0" cellpadding="0" height="100%" width="100%" style=" padding:5px;">
                <tr>
            			<td width="80%"></td>
            			<td width="20%"></td>
    	        </tr>
            	<tr>
            			<td><table cellspacing="0" cellpadding="0" height="100%" width="100%">
					<tr>
						<td colspan="3" align="center"><b>Md. Abdul Mannan</b></td>
					</tr>
					<tr>
						<td width="60">Class</td>
						<td>:</td>
						<td>Seven</td>
					</tr>					
					<tr>
						<td>Roll No.</td>
						<td>:</td>
						<td>Seven</td>
					</tr>					
					<tr>
						<td>Year</td>
						<td>:</td>
						<td>Seven</td>
					</tr>	

					<tr>
						<td>Address</td>
						<td>:</td>
						<td>Seven</td>
					</tr>
					<tr>
						<td>Mobile</td>
						<td>:</td>
						<td>Seven</td>
					</tr>
				</table></td>
				
				
            			<td valign="top" align="center"> <span style="padding:2px;"><b> ID:2019000019</b> </span> <p><img src="../other_img/<?php echo $fetch_Data["student_id"];?>.jpg" style=" height:110px; width:100px;"/></p> <p style="padding-top:20px;"><b> Headmaster</b> </p> </td>
            	</tr>	
            
            
            </table>
            </div>

							  
						</div>
							<?php  } 	

							} ?>
							<!--End for looop-->
						
				</div>

						<input type="submit" value="Print"  class="btn btn-block btn-success noneBtnForprin" style="margin-bottom:10px; border-radius:0px;" onClick="window.print()"/>
		


  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
