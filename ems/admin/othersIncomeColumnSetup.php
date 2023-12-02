<?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");

	$db = new database();
	global $msg;
	global $table;
	
	
	
	$fetch[1]='';
	$fetch[2]='';
	$fetch[8]='';
	$fetch[4]='';
	$fetch[3]='';
	$fetch[5]="";
	$prefix=date("y"."m"."d");
	$fetch[0]=$db->withoutPrefix('colume_wise_others_income','id',$prefix,'10');
	
	global $chek;

//add dat......................................
if(isset($_POST['add']))
	{

		$id = $db->escape($_POST['id']);
		$title = $db->escape($_POST['columnId']);
	
		$year=$db->escape($_POST['checkbox']);
		//print_r($exploide_gropu);

		
		if(!empty($_POST['checkbox']) && !empty($title) )
		{
			 $countFees = count($_POST['checkbox']);
			 for($x = 0 ;$x < $countFees ; $x++){
			 
			  $query="INSERT INTO `colume_wise_others_income` VALUES ('".$fetch[0]."','$title','".$_POST['checkbox'][$x]."')";
			 // print $query;

			$resultisnsert=$db->insert_query($query);
			$fetch[0]=$db->withoutPrefix('colume_wise_others_income','id',$prefix,'10');

			 
			 }
			

		}
		else
		{
			$msg="<span class='text-center text-danger glyphicon glyphicon-remove'><strong>&nbsp;Please Fill Up TextField</strong></span>";
		}
	}
	//end add data.........................
//post delete data......................................


if(isset($_POST['Delete']))
	{
		$id=$db->escape($_POST['id']);
		$query="DELETE FROM `add_fee` WHERE `id`='$id'";
		$delete=$db->delete_query($query);
		$fetch[0]=$db->withoutPrefix('colume_wise_others_income','id',$prefix,'10');
		print "<script>location='othersIncomeColumnSetup.php'</script>";
		
	}
//post end delete data.........................................

//post update data..........................................
if(isset($_POST['Update']))
	{
		$id = $db->escape($_POST['id']);
		$title = $db->escape($_POST['title']);
	
		$year=$db->escape($_POST['year']);
		//print_r($exploide_gropu);
		
		if(!empty($id) && !empty($year) && !empty($title) )
		{
			$query="REPLACE  INTO `coloumn_setup` VALUES ('".$_POST["id"]."','$title','$year')";
			$resultisnsert=$db->update_query($query);
			//print_r($query);
				$src_text=$db->escape($_POST['id']);
		$query="SELECT * FROM `coloumn_setup` WHERE `id`='".$_POST["id"]."'";
		$chek=$db->select_query($query);
		if($chek)
			{
				$fetch=$chek->fetch_array();
			}


		}
		else
		{
			$msg="<span class='text-center text-danger glyphicon glyphicon-remove'><strong>&nbsp;Please Fill Up TextField</strong></span>";
		}
	}
//end post update data...........................
//view data...............................	
	if(isset($_POST['View']))
	{
		$query=" SELECT * FROM `income_coloumn` ORDER BY `sl`  ASC ";
		$result=$db->select_query($query);
		if($result)
		{
		
		
		$table="<div class='col-md-10 col-md-offset-1' style='margin-top:30px'>"."<table class='table table-responsive table-hover table-bordered' align='center' style='margin-top:-20px;'>";
        $table.="<tr class='warning' >"."<td align='left' colspan='4'>"."<a href='othersIncomeColumnSetup.php' class='btn btn-primary'>"."<span class='link text-center'>Back<span>"."</a>"."<span class='text-success' style='font-size:18px; padding-left:380px; font-weight:blod;'>Column Wise Expense Title</span>"."</td>"."</tr>";
			
					
					
			while($fetchColoumName=$result->fetch_array())
			{

	$table.="<tr>"."<td colspan='4' align='center'>"."<span class='text-Warning' style='font-size:15px; font-weight:blod;'>".$fetchColoumName['Name']."</span>"."</td>"."</tr>";
	$table.="<tr>"."<td>SL</td> "."<td>Fee Title </td>"."<td>Action</td>"."</tr>";	

 $selectFeeName = "SELECT `colume_wise_others_income`.`id`,`income_expense_title`.`title` FROM `colume_wise_others_income` 
INNER JOIN `income_expense_title` ON `income_expense_title`.`id`=`colume_wise_others_income`.`fk_fee_id`
WHERE `colume_wise_others_income`.`fk_column_id`='$fetchColoumName[0]'";

$resuFe=$db->select_query($selectFeeName);
		if($resuFe)
		{
				$j=0;
						
						while($fetch_all=$resuFe->fetch_array()){
							$j++;
						$table.="<tr>";
						
						$table.="<td>".$j."</td>";
						$table.="<td>".$fetch_all['title']."</td>";
							
							
						
						$table.="<td>";
						$table.="<a href='?dlt=$fetch_all[0]'class='btn btn-primary print' onclick='return confirm_click()' style='width:80px'>Delete</a>"."</td>";
									
						$table.="</tr>";
						
						
						
					}
				}
				
			}
			
				
				$table.="</table>"."<div>";
			
			
			}
		
		
		
	}

//end view data.....................................

//link edit data...................................	

//end link edit data..........................
	//link dlt data.....................................
	if(isset($_GET['dlt']))
	{
		$linid=$db->escape($_GET['dlt']);
		$query="DELETE FROM `colume_wise_others_income` WHERE `id`='$linid'";
		$delete=$db->delete_query($query);
		$fetch[0]=$db->withoutPrefix('colume_wise_others_income','id',$prefix,'10');
		print "<script>location='othersIncomeColumnSetup.php'</script>";

	}
//end link delete data........................

	if(isset($_POST['Exit']))
	{
		print exit();
	}

	if(isset($_POST['Clear']))
	{
		print "<script>location='othersIncomeColumnSetup.php'</script>";
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title></title>
    
	<link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
	<link rel="stylesheet" href="textEdit/redactor/redactor.css" />
	<script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
	<script src="textEdit/redactor/redactor.min.js"></script>

	 <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">

   <style type="text/css">

   		@media print{
   			.print{
   				display: none;
   			}
   		}
   </style>
     <script src="datespicker/bootstrap-datepicker.js"></script>

    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
    	  $(document).ready(function () {
    	  	showFee();
                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });

    	    $(document).ready(function () {
                
                $('#example2').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });

    	$(document).ready(
		function()
		{
			$('#radactor').redactor();
		}
	);

    	function confirm_click()
    	{
    		$confirm_click=confirm('Are You Confirm Update');
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
    		$confirm_click=confirm('Are You Confirm Delete');
    		if($confirm_click===true)
    		{
    			return true;
    		}
    		else
    		{
    			return false;
    		}
    	}
 



function showFee(){
		var id =$('#stdId').val();
		var showDataforcolum="feesss";
		var ClassId=$('#className').val();
		var groupID=$('#groupname').val();
		var year=$('#year').val();
		
		 $.ajax({
                    type: "POST",
                    url: "ajaxForaddFee.php",
                    data: {id:id,showDataforcolum:showDataforcolum,ClassId:ClassId,groupID:groupID,year:year},
                    cache: false,
                    success: function(data) {
                  //  alert(data);
						$('#showFees').html(data);
						}
                    });
	
    }
	
	
	
</script>
  </head>
	
  <body>
  	<form name="" action="" method="post"  enctype="multipart/form-data" class="form-horizontal">		<?php 
		if(isset($_POST["View"]))
		{
			if($result)
			{
				echo $table;
			}
			else
			{
				 echo "<span class='text-danger' style='font-size:22px;'>"."<strong>"."No Record  Found"."<a href='Columnwisefeesetup.php'>"."Go Back"."</a>"."<strong>"."</span>";
			}
		}
		else
		{
?>

  	<div class="has-feedback col-xs-12 col-sm-8 col-lg-8 col-md-8 col-sm-offset-2 col-md-offset-2">
  	<table align="center" class="table table-responsive box" cellpadding="0" cellspacing="0" style="border:1px #CCCCCC solid; margin-top:30px; color: #000;">
  			<tr>
  				<td colspan="3" align="center"><br>
				<span style="font-size:22px; color:#333; display:block;">Column wise Others Income Setup </span>  <br>	
				</td>			
			</tr>
			
			
						
					
			<tr>
				<td width="19%" height="51" class="info">Select Column</td>
				<td width="0%" class="info">:</td>
				<td width="81%" class="info">
					<div class="col-lg-6 has-warning">
							<select name="columnId"  class="form-control" style="border-radius:0px;">
								<option value="" >Select One</option>
								<?php 
								$selMonth = "SELECT * FROM `income_coloumn` ORDER BY `sl` ASC";
								$checkMont=$db->select_query($selMonth);
								if($checkMont)
								{
									while($fetmonth=$checkMont->fetch_array())
								{
										if($fetch[6] != $fetmonth[0] ){
							?>
							<option value="<?php echo "$fetmonth[0]"?>"><?php echo $fetmonth[1];?></option>
							<?php }  }  } ?>
								</select>
						<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
						
					</div>
			  </td>
				
			</tr>	
				
				
			
	
						


			<tr>
				<td class="info" colspan="5" >
					<?php

					$expenseTitle = " SELECT * FROM `income_expense_title` WHERE `type`='Income' AND `id` NOT IN (SELECT `fk_fee_id` FROM `colume_wise_others_income`) ORDER BY `index` ASC  ";
					
					$queryExpense= $db->select_query($expenseTitle);
					if($queryExpense){
					while($fetch_expense=$queryExpense->fetch_array())
					{	
		
						?>		
					
						<input type="checkbox" name="checkbox[]" value="<?php echo $fetch_expense['id'];?>" /> &nbsp;&nbsp;<?php echo $fetch_expense['title'];?>&nbsp;&nbsp;
							
							<?php } } ?>
						


				</td>
				
				
				
			</tr>
			
			<tr>	
  				<td class="danger" colspan="3" bgcolor="#dddddd" align="center"><span>
  					<?php 
  						if(isset($msg))
  						{
  							echo "<strong>".$msg."</strong>";
  						}
  						else 
  						{
  							 echo "<strong>".$db->sms."<strong>";
  						}



  					?>

  				</span> </td>
  			</tr>
			<tr>
  				<td bgcolor="#f4f4f4" class="warning" colspan="3"align="center" >
				<?php 
					if(!$chek)
					{
				?>
					<input type="submit" value="Add" name="add" class="btn btn-primary btn-sm" style="width:80px;" />
					<?php } else {?>
					<input type="submit" value="Update" name="Update" onClick="return confirm_click()" class="btn btn-primary btn-sm" style="width:80px;"/>
					<?php } ?>
					<input type="submit" value="View" name="View" class="btn btn-primary btn-sm" style="width:80px;"/>
								
					<input type="submit" value="Clear" name="Clear" class="btn btn-primary btn-sm" style="width:80px;"/>
					<input type="submit" value="Exit" name="Exit" class="btn btn-primary btn-sm" style="width:80px;"/>
				</td>
  			</tr>
  	</table>
	
	</div>
  	
	<?php } ?>
	</form>
  
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
