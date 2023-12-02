<?php
session_start();
@error_reporting(1);
  require_once("../db_connect/config.php");
  require_once("../db_connect/conect.php");
  $db = new database();

   
  if($_SESSION["logstatus"] === "Active")
  {

	  $sqlProjectInfo="SELECT * FROM `project_info`";
	  $result_query=$db->select_query($sqlProjectInfo);
	  if($result_query){
	    $fetch_query=$result_query->fetch_array();
	  }

    ?>
    <!DOCTYPE html>
<html>
<head>
	<title>Teacher Information</title>
	  <link rel="shortcut icon" href="all_image/shortcurt_iconSDMS2015.png" />
</head>
<body>

<table width="770" style=" border: 1px #000 solid; padding: 0px; " align="center" >
		<tr>	
				<td width="10%"></td>
				<td>
						<div style="float: left; clear: right; width: 20%; text-align: right;  ">  
							<img src="all_image/logoSDMS2015.png" style="max-width: 200px; max-height: 110px; margin-top: 5px;" /> 
						</div>
							

						<div style="float: right; text-align: left; width: 80% ">   
								<ul style=" padding-top:-10px">
				    
							    <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:30px; list-style: none;"><?php print $fetch_query['institute_name']?></li>

							   <li style="list-style: none; margin-top: -10px;">

							   		<p style="font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_query['LocationbAngla']?> </p>
							   	</li>

							    <li style=" list-style: none; margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_query['webAddress']?><br><?php print $fetch_query['phone_number']?>, <?php print $fetch_query['email']; ?> </li>
							 </ul> 

				      </div>
				</td>
				<td width="10%"></td>
		</tr>
	

</table>

<table width="770"  align="center" style="border:1px #000 solid; height: 30px; margin-top:10px;" >
		<tr>	
				<td align="center" bgcolor="#f4f4f4">
							<h3 style="padding: 0px; margin: 0px; ">Teacher's Information</h3>
				</td>
		</tr>
</table>

<table width="770"  align="center" style="border:1px #000 solid; height: 30px; margin-top:10px;" >
		<tr>	
				<td align="center" bgcolor="#f4f4f4" style="border-right:1px #000 solid;">
						SL.
				</td>	
				
				<td align="center" bgcolor="#f4f4f4" style="border-right:1px #000 solid;">
						ID
				</td>

				<td align="left" bgcolor="#f4f4f4"  style="border-right:1px #000 solid;">
						Name
				</td>

				<td align="center" bgcolor="#f4f4f4"  style="border-right:1px #000 solid;">
						Designation
				</td>	

				<td align="center" bgcolor="#f4f4f4"  style="border-right:1px #000 solid;">
						Mobile
				</td>
				<td align="center" bgcolor="#f4f4f4"  style="border-right:1px #000 solid;">
						Address
				</td>
				
			
				<td align="center" bgcolor="#f4f4f4"  style="border-right:1px #000 solid;">
						Picture
				</td> 
		</tr>

<?php
		  $sql="SELECT `teachers_name`,`designation`,`mobile_no`,`present_address`,`gender`,`email`,`teachers_id` FROM `teachers_information` WHERE `Type`='Teacher' order by `index_no` ASC";
	  $r=$db->select_query($sql);
	  if($r){
$i=1;
	    while($fetch_Info=$r->fetch_array())
	    {


?>
		<tr>
			<td style="border-bottom: 1px #000 solid;border-right: 1px #000 solid;"><?php print $i++; ?></td>
			<td style="border-bottom: 1px #000 solid;border-right: 1px #000 solid;"><?php print $fetch_Info[6]; ?></td>
			<td style="border-bottom: 1px #000 solid; border-right: 1px #000 solid;"><?php print $fetch_Info[0]; ?></td>
			<td style="border-bottom: 1px #000 solid; border-right: 1px #000 solid;"><?php print $fetch_Info[1]; ?></td>
			<td style="border-bottom: 1px #000 solid; border-right: 1px #000 solid;"><?php print $fetch_Info[2]; ?></td>
			<td style="border-bottom: 1px #000 solid; border-right: 1px #000 solid;"><?php print $fetch_Info[3]; ?></td>
	
			
			
			<td style="border-bottom: 1px #000 solid;"><img  src="../other_img/<?php print $fetch_Info[5]; ?>.jpg" style="height: 80px; width: 80px;"></td>
			

		</tr>
<?php
   }
	  }
	  ?>

	  	<tr>
			<td  colspan="6" style="border: 0px;" align="center">
					
	<style>
	@media print{
			.print{
				display:none;
			}


		</style>

				<input type="button" value="Print" align="center"  style="height: 40px; width: 150px; background: #ff0000; color: #fff;" class="print" onclick="window.print()"></input>
			</td>


		</tr>

</table>




</body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
