  <?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
	

 		if(isset($_POST["ResultGenerate"])){
			
			$year=$_POST["year"];
			if(!empty($year)){
					print "<script>location='ajaxForStudentOldRecord.php?year=$year'</script>";
			}else{
					print "<script>window.close();</script>";
			}
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
	 <script type="text/javascript">
             $(document).ready(function()
  {
        var checking_html = '<img src="search_group/loading.gif" /> Checking...';
        $('#className').change(function()
        {
            $('#item_result').html(checking_html);
                check_availability();
               Check_exam_type();
        });
    
 });

         //function to check username availability   
function check_availability()
{
        var class_name = $('#className').val();
        $.post("check_grou_name.php", { className: class_name },
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#groupname').html(result);
                    $('#item_result').html("");
                    $('#category_result').html('');
                }
                else
                {
                    //show that the username is NOT available
                    document.getElementById('category_result').style.color='RED';
                    $('#category_result').html('No Group Name Found');
                    $('#item_result').html("");
                    $('#groupname').html('');
                }
                
                $('#subject_type').html("");
                $('#sub_name').html("");
                $('#part_name').html('');
                $('#subjectcode').val('');
                 
        });

}
//function to check exam type availability  
function Check_exam_type()
{
        var class_name = $('#className').val();
        $.post("Check_exam_type.php", { className: class_name },
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#examtype').html(result);
                    $('#checkingGroup').html("");
                    $('#category_result').html('');
                }
                else
                {
                    //show that the username is NOT available
                    $('#checkingGroup').html('No Exam  Name Found');
                    $('#item_result').html("");
                    $('#examtype').html('');
                }

        });

} 
	
	
	
	
	
	
	
</script>
    </head>

  <body>
  	<form name="teacherinfo" action="" method="post"  enctype="multipart/form-data" class="form-horizontal marksEditEntry" >
            <div class="col-md-8 col-md-offset-2" id="AddMarksStep1"><br/> <br/>
                <span class="glyphicon glyphicon-arrow-right text-justify text-uppercase text-warning" style="font-weight: bold; padding-top: 15px; font-size: 18px;"><strong style="padding-left:5px">Ex-Student Record</strong></span><br/>
			
                <table class="table table-responsive table-hover table-bordered" style="margin-top:10px;">
                    <tr>
                    	<td ><strong><span class="text-success" style="font-size: 15px;">Select Year</span></strong></td>
                        <td >
                        <div class="col-md-8">
                        <select class="form-control" name="year" id="year" style="width:100%; border-radius:0px">
                        <option>Select One</option>
                        <?php
                            $sql="SELECT * FROM `exstudentreport`  GROUP BY `year`  ORDER BY `year` DESC ";
                            $r=$db->link->query($sql);
                            if($r->num_rows>0)
                            {
                                    while($fetch=$r->fetch_array())
                                    {
                                        print "<option>$fetch[year]</option>";

                                    }
                                    
                            }

                        ?>
                        
                        </select></div>
                    </tr>
					  
			
				
                <tr><td colspan="2" align="center"><input type="submit" name="ResultGenerate" value="Show Old Record" class="btn btn-success btn-md" style="width: 180px" formtarget="_blank"></input>
				<!--<input type="button" name="submit" value="Update Result" class="btn btn-danger btn-md"  style="width: 180px" onClick="return ResultGene()"></input>
				<input type="button" name="submit" value="Show Total Student" class="btn btn-danger btn-md"  style="width: 180px" onClick="return totalStudent()"></input>--></td></tr>
                </table>
							
      </div>
				
				
		
     </form>
 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
