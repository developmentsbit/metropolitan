  <?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();



	if(isset($_POST["save"])){


				$countmainLink=count($_POST["linkID"]);
				//print $countmainLink."<br/>";
				$coutsublink=count($_POST["SublinkID"]);
				//print $coutsublink."<br/>";
					$allUpdateMainlink="UPDATE `main_link_info` SET `DashBoard`='0'";
					$db->update_query($allUpdateMainlink);

					
					for($x=0; $x<$countmainLink;$x++){

						$minInsert="UPDATE `main_link_info` SET `DashBoard`='1'  WHERE `Main_Link_Id`='".$_POST["linkID"][$x]."'";
						$db->update_query($minInsert);
					}
					
						$allUpdateSubLink="UPDATE `sub_link_info` SET `show`='0'";
						$db->update_query($allUpdateSubLink);



					for($z=0; $z<$coutsublink; $z++){

					
						$explodevale=explode('and',$_POST["SublinkID"][$z]);

				
							$insertsublink="UPDATE `sub_link_info` SET `show`='1' where `Sub_Link_Id`='$explodevale[1]'";
							

							$db->update_query($insertsublink);
					}

					print "<script>alert('Save Successfully!!')</script>";
			
			}
			
		


					?>
					<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Show Result Sheet</title>

	<script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
	
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="../js/loading/pace.min.js"></script>
    <script type="text/javascript">
    	
    		function check_all()
			{
			
			if($('#chkbx_all').is(':checked')){
				$('input.check_elmnt2').prop('disabled', false);
				$('input.check_elmnt').prop('checked', true);
				$('input.check_elmnt2').prop('checked', true);
			}else{
				$('input.check_elmnt2').prop('disabled', true);
				$('input.check_elmnt').prop('checked', false);
				$('input.check_elmnt2').prop('checked', false);
				}
		}	



			function chekMain(getID){
					
					if($('#linkID-'+getID).is(':checked')){
						$("input#sublinkID-"+getID).prop('disabled', false);
						$("input#sublinkID-"+getID).prop('checked', true);
					
					}else{
						$("input#sublinkID-"+getID).prop('disabled', true);
						$("input#sublinkID-"+getID).prop('checked', false);
					
					}
			
				}


    </script>
	 </head>

  <body>

<form method="POST"> 
					<div class="col-md-10 col-md-offset-1">
							
							<table class="table" style="margin-top:-20px; border:1px #333333 solid;">
							<tr>
											<td align="center"><h1>Dashboard Settings</h1><br><h3>Select to Show the Link with in Dashboard</h3></td>
								</tr>

								<tr>
											<td align="center"><input id="chkbx_all"  onclick="return check_all()" type="checkbox"  />&nbsp; <span><strong class="text-danger ">Select All</strong></span></td>
								</tr>
								
								<tr>
										<td>
											<?php 
											 
						if($_SESSION["id"]=="306"){
										$selecMain="SELECT `Main_Link_Id`,`Main_Link_Name` FROM `main_link_info`  ORDER BY `SLNO` ASC";
										$resultMain=$db->select_query($selecMain);
										if($resultMain){
											while($fetch_Main=$resultMain->fetch_array()){
									
									?><p style="background:#DEFADA"><input class="check_elmnt" id="linkID-<?php echo  $fetch_Main["Main_Link_Id"];?>" type="checkbox" name="linkID[]" value="<?php echo  $fetch_Main["Main_Link_Id"]?>" onclick="return chekMain('<?php echo  $fetch_Main["Main_Link_Id"];?>')"/> &nbsp;<strong class="text-success"><?php echo  $fetch_Main["Main_Link_Name"]?></strong><p>
								<?php 
									$subLink="SELECT * FROM `sub_link_info` WHERE `Main_Link`='$fetch_Main[Main_Link_Id]'";
									$result=$db->select_query($subLink);
									if($result){
										while($fetchSql=$result->fetch_array()){
								?>
											<span><input class="check_elmnt2" type="checkbox" id="sublinkID-<?php echo $fetch_Main["Main_Link_Id"];?>" name="SublinkID[]" value="<?php echo  "$fetchSql[Main_Link]and$fetchSql[Sub_Link_Id]"?>" disabled="disabled" /> &nbsp;<strong class="text-warning"><?php echo  $fetchSql["Sub_Link_Name"]?></strong></span>
											<?php } }?>
									
									<?php } }  } else {?>
									<?php
									
									$selecMain="SELECT `main_link_piority`.*,`main_link_info`.`Main_Link_Name`,`Page_Name` FROM `main_link_info` 
INNER JOIN `main_link_piority` ON `main_link_piority`.`Main_Link_id`=`main_link_info`.`Main_Link_Id`
WHERE `main_link_piority`.`adminId`='".$_SESSION["id"]."'  ORDER BY `main_link_info`.`SLNO` ASC";
										$resultMain=$db->select_query($selecMain);
										if($resultMain){
											while($fetch_Main=$resultMain->fetch_array()){
									
									?><p style="background:#DEFADA"><input class="check_elmnt" id="linkID-<?php echo  $fetch_Main["Main_Link_id"];?>" type="checkbox" name="linkID[]" value="<?php echo  $fetch_Main["Main_Link_id"]?>" onclick="return chekMain('<?php echo  $fetch_Main["Main_Link_id"];?>')"/> &nbsp;<strong class="text-success"><?php echo  $fetch_Main["Main_Link_Name"]?>
									
									<p>
								<?php 
									$subLink="SELECT `sublinkpeority`.*,`sub_link_info`.`Sub_Link_Name`,`Sub_Page_Name` FROM `sublinkpeority`
INNER JOIN `sub_link_info` ON `sub_link_info`.`Sub_Link_Id`=`sublinkpeority`.`sublinkId` WHERE 
`sublinkpeority`.`AdminId`='".$_SESSION["id"]."' AND `sub_link_info`.`Main_Link`='$fetch_Main[1]' GROUP BY `sub_link_info`.`Sub_Link_Id` ORDER BY `sub_link_info`.`Sl_No` ASC";
									$result=$db->select_query($subLink);
									if($result){
										while($fetchSql=$result->fetch_array()){
								?>
											<span>
											
											<input class="check_elmnt2" type="checkbox" id="sublinkID-<?php echo $fetch_Main["Main_Link_id"];?>" name="SublinkID[]" value="<?php echo  "$fetchSql[MainLinkID]and$fetchSql[sublinkId]"?>" disabled="disabled" />&nbsp;<strong class="text-warning"><?php echo  $fetchSql["Sub_Link_Name"];?></strong></span>
											<?php } }?>
									
									<?php } } ?></td>
								
									<?php }  ?>
								</tr>
								<tr>
									<td align="center">

									 <input type="submit" name="save" value="Save" id="save" class="btn btn-sm btn-danger" />

									 </td>
								</tr>
							</table>
</div>
				
		
			  </body>
</html>
</form>
	<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>

	