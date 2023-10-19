<?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");
	$db = new database();
	$selApp="select * from project_info";
	$queApp=$db->select_query($selApp);
	$fetchApp=mysqli_fetch_assoc($queApp);



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
            
    <link rel="stylesheet" href="datespicker/datepicker.css">
     <script src="datespicker/bootstrap-datepicker.js"></script>

</head>
<body>

<style>
	@media print{
			.notPrintHtml{
				display:none;
			}
			.printButton{
				display:none;
			}
			
			@page 
			{
				size:  auto;   /* auto is the initial value */
				margin: 0mm;  /* this affects the margin in the printer settings */
			}
		
			html
			{
				background-color: #FFFFFF; 
				margin: 0px;  /* this affects the margin on the html before sending to printer */
			}
		
			body
			{
				border: solid 0px blue ;
				margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
			}
		}
</style>

<script type="text/javascript">
	
	

  $(document).ready(function()
  {
        $('#className').change(function()
        {
                check_FeeTitle();
        }); 
  });

function check_FeeTitle()
{
          var year = $('#year').val();
          var className = $('#className').val();
          var feeTitle="show";

          $.post("CheckBalance.php", { year: year,className:className,feeTitle:feeTitle },
          function(result){
            if(result)
                {
                    $('#ClassFee').html(result);  
                }
                else
                {
                   $('#ClassFee').html("");
                }
        });
}  

</script>
<script type="text/javascript">
function ViewFeeCollection()
{
          var year = $('#year').val();
          var className = $('#className').val();
      
          var ClassFee = $('#ClassFee').val();

$('#viewReport').html("");

				$.ajax({
				url:"CheckBalance.php",
				type:"POST",
				data :{year: year,className:className,ClassFee:ClassFee},
				cache:false,
				success:function(data)
				{
					
					$('#viewReport').html(data);
				}
				

				
			});

       
}  



    

</script>

     <form method="POST"> 

<div class="col-md-10 col-md-offset-1  notPrintHtml" style="margin: auto;"> 



		
<div class="row">

					<div class="col-md-12" style="padding: 0px; margin: 0px; border-bottom: 2px solid #ccc; "> <h3 style="padding-left: 20px;"><br> Fee Title Wise Collection Report </h3><br></div>

					<div class="col-md-4" ><br>
						Year : &nbsp;
						<input type="text" id="year" value="<?php print date('Y') ?>" class="form-control" style="max-width: 300px;" name="year"></input>
				 </div>



				<div class="col-md-4">
				 <br>
					Select Class: 	 <select name="className" id="className" class="form-control" style="max-width: 300px;">
								

									<?php 
									if(isset($_POST["viewFee"]))
									{
											echo "<option value='".$_POST["ClassFee"]."'> $explode_Class[1]</option>";

									}?>


								<option value="All">All</option>
							<?php 
								$select_section = "SELECT * FROM `add_class` order by `index` asc ";
								$cheked_query=$db->select_query($select_section);
								if($cheked_query)
								{
									while($fetchsection=$cheked_query->fetch_array())
									{?>
							
							<option value="<?php echo "$fetchsection[0]and$fetchsection[2]"?>"><?php echo $fetchsection[2];?></option>


							<?php  }  } ?>
				</select>
			</div>
			<div class="col-md-4">
				 <br>
					Select Fee Title: 	
					 <select name="ClassFee" class="form-control"  id="ClassFee">
								

					</select>
			</div>


				<div class="col-md-12" style="text-align: center;">&nbsp;<br><br>

				<input type="button" name="viewFee" value="Show" class="btn btn-primary" style="  width: 200px;" onclick="return ViewFeeCollection()"> 


				<br>
<br>
 </div>

</div>
</div>

<span id="viewReport">

</span> 

</body>
</html>
<?php




 } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
