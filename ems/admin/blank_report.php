<?php
@session_start();

require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();
if(isset($_POST["submit"]))
{
    
     $date=$_POST['date'];
    $id=$_POST['id'];
    $sql=$db->link->query("SELECT * FROM `running_student_info` WHERE `student_id`='$id' ");
    
    if($sql->num_rows>0)
    {
          print "<script>location='blank_invoise.php?date=$date&id=$id'</script>";
    }
    else
    {
          print "<script>alert('Invalid ID')</script>";
    }
    
   
  
   
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title></title>
	<script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   	 <link rel="stylesheet" href="datespicker/datepicker.css">


     <script src="datespicker/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
    $(document).ready(function () {
                    
                    $('#example1').datepicker({
                        format: "dd-mm-yyyy"
                    });  
                
                });
    </script> 
	
	<style type="text/css">
@media print{
	#print{display: none;}
}
	</style>
  </head>
	
  <body>
  	<form  action="" method="POST"  enctype="multipart/form-data" class="form-horizontal addfee">
  	 <div class="col-md-8 col-md-offset-2" id="print" ><br/> <br/>
                <span class="glyphicon glyphicon-arrow-right text-justify text-uppercase text-warning" style="font-weight: bold; padding-top: 15px; font-size: 18px;"><strong style="padding-left:5px"> Blank Invoise  </strong></span><br/>
			
                <table class="table table-responsive table-hover table-bordered" style="margin-top:10px;">
                    <tr>
                    	<td ><strong><span class="text-success" style="font-size: 15px;"> Invoise Validity  Date:</span></strong></td>
                        <td ><div class="col-md-8">
                                 <input type="text" class="form-control" id="example1" autocomplete="off" value="<?php echo date('d-m-Y')?>" name="date" style="width:280px; border-radius:0px;">
                        </div>
                    </tr>

                   
                    
                <tr>
                    <td ><strong><span class="text-success" style="font-size: 15px;">Student ID</span></strong></td>
                        <td><div class="col-md-8">
                            <input type="text" class="form-control" autocomplete="off"    name="id" style="width:280px; border-radius:0px;">
                        </div>
                        </td>
                </tr>
				
				<tr>
					<td colspan="2" align="right">
								
					</td>
				</tr>
				
                <tr><td></td>
                		<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-info btn-md"  style="width: 180px;  border-radius:0px;" formtarget="_blcnk"  ></input>
			
				</td>

				</tr>
                </table>
							
                </div>

			
				</div>

	</form>
  
   
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>