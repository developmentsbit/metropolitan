<?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
     require_once("../db_connect/config.php");
     require_once("../db_connect/conect.php");
     $db = new database();

     unset($_SESSION["class"]);
     unset($_SESSION["groupname"]);
     unset($_SESSION["Session1"]);

   
?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title></title>
            
    <script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
            
    <link rel="stylesheet" href="datespicker/datepicker.css">
     <script src="datespicker/bootstrap-datepicker.js"></script>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
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

         $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });

         $(document).ready(function () {
                
                $('#example2').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
         $(document).ready(function () {
                
                $('#academicdate').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });

         //check group name 
  $(document).ready(function()
  {
        var checking_html = '<img src="search_group/loading.gif" /> Checking...';
        $('#className').change(function()
        {
            $('#item_result').html(checking_html);
                check_availability();
        }); 
  });

//function to check username availability   
function check_availability()
{
    
        var class_name = $('#className').val();
        $.post("check_grou_name.php", { className: class_name },
            function(result){
                //if the result is 1
                if(result !=1 )
                {
                    //show that the username is available
                    $('#groupname').html(result);
                    $('#item_result').html("");
                    $('#category_result').html('');
                }
                else
                {
                    //show that the username is NOT available
                    $('#category_result').html('No Group Name Found');
                    $('#item_result').html("");
                    $('#groupname').html('');
                }
        });

}  

    </script>
  </head>
	
  <body>
  	<form name="" action="addStudentInfo.php" method="post"  enctype="multipart/form-data" class="form-horizontal" >
      
    <table align="center" class="table table-bordered bg-info" style=" max-width: 800px;">
            <tr>
                <td bgcolor="#f4f4f4" class="warning"  colspan="2"  bgcolor="#dddddd" align="center">

                <span style="font-size:22px; color:#333; display:block;"><STRONG class='text-success'>Student Information</STRONG></span> </td>
            </tr>
              
            <tr>
                <td width="250">

                <STRONG class='text-info'>Admission Desire( Class):</STRONG></span></td>
                <td >
              

                    <select name="className" id="className" class="form-control" onchange="check_availability()">
                       
                       <?php
					   		if($check_Student){
							?>
							 <option value="<?php echo "$fetch_Student[admission_disir_class]and$fetch_Student[class_name]"?>"><?php echo $fetch_Student["class_name"];?></option>
							<?php
							}else {
					   
					   ?>
					   
					   <option >Select One</option>
					   <?php } ?>
					   <?php 
                                $select_section = "SELECT * FROM `add_class`";
                                $cheked_query=$db->select_query($select_section);
                                if($cheked_query)
                                {
                                    while($fetchsection=$cheked_query->fetch_array())
                                {
									if($fetch_Student["admission_disir_class"] != $fetchsection[0] ){
                            ?>
                            <option value="<?php echo "$fetchsection[0]and$fetchsection[2]"?>"><?php echo $fetchsection[2];?></option>
                            <?php } }  } ?>
                    </select>
                  

                </td>
            </tr>


            <tr>
                <td ><STRONG class='text-info'>Admission Desire(Group):</STRONG></span></td>
                <td >
           
                    <select name="groupname" id="groupname" class="form-control">
                             <?php
					   		if($check_Student){
							?>
							 <option value="<?php echo "$fetch_Student[admission_disir_group]and$fetch_Student[group_name]"?>"><?php echo $fetch_Student["group_name"];?></option>
							<?php
							}
					   
					   ?>
                        </select>
             
                </td>
            </tr>
            
			
			<tr>
                
		
				 
				 
				 <td >Session.</td>
                <td>
				
				   
				   	<select name="Session1" class="form-control">
					<?php if (isset($check_Student)) {?>
					<option><?php echo $fetch_Student[63]?></option>
					<?php } else {?>
							<option>Select One</option>
						        <?php } ?>
								  <?php 
								$y=date('Y')+1;
								$previous=$y-5;
								for($year = $y; $year >= $previous;  $year--)
								{?>
								
								<option><?php print $year-1;?>-<?php print $year;?></option>
								
								<?php }
								$y=date('Y')+1;
								$previous=$y-5;
								for($year = $y; $year >= $previous;  $year--)
								{
							?>
							<option><?php print $year;?></option>
							<?php  } ?>
					</select>
					
					
				
</td>
</tr>
		
			
        
             <tr>
                <td bgcolor="#f4f4f4" class="warning" colspan="2" align="center" >
                   

                    <input type="submit" value="Submit" name="add" class="btn btn-primary btn-sm" style="width:120px;" />

                    
                </td>
            </tr>
            </table>
        </div>


 </form>

    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
