<?php
  error_reporting(1);
  @session_start();
  
  if(isset($_POST["logOUt"]))
  {
    unset($_SESSION["logstatus"]);
  }
  
  if($_SESSION["logstatus"] === "Active")
  {

require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();


    
  if(isset($_POST["registration"]))
    {
         $count=count($_POST['stdidd']);
         if($count>1)
         {
                      $selectClass=$_POST['selectClass'];
                        $db->link->query("DELETE FROM `examinee_reg` WHERE `class_id`='$selectClass'");
         }

         
         $examtype=explode('and',$_POST['examtype']);
         $session=$_POST['session'];
		 $year =$_POST['year'];
		
         for($j=0;$j<$count;$j++)
         {
            $query = "INSERT INTO `examinee_reg`(`student_id`, `class_id`, `exam_id`, `session`, `year`) VALUES ('".$_POST['stdidd'][$j]."','$selectClass','$examtype[0]','$session','$year')";
			$db->insert_query($query);
         }
         
         
    }
    
    


?>

<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Examinee Report  </title>
<link rel="shortcut icon" href="admin/all_image/shortcurt_iconSDMS2015.png" />
  <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
<link rel="stylesheet" href="frontend/css/bootstrap-theme.min.css">
<script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
 <script type="text/javascript">
 
    $(document).ready(function()
        {
        var checking_html = 'Checking...';
        $('#className').change(function()
        {
            $('#item_result').html(checking_html);
             
               Check_exam_type();
        });
    
     
        
        });
        
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
                    $('#item_result').html("");
                   
                }
                else
                {
                    
                    $('#examtype').html('');
                }

        });

} 


    
        function showStudent()
        {
             var selectClass = $('#className').val();
             var examtype = $('#examtype').val();
             var session = $('#session').val();
             var year = $('#year').val();
            $.ajax({
                url:"AjaxSelectedExamineeReport.php",
                type:"POST",
                data :{selectClass:selectClass,examtype:examtype,session:session,year:year},
                cache:false,
                success:function(data)
                {
                  
                    $('#loadStudentInfo').html(data);
                    
                }
                
            });
        }
    
        
        
</script>
<script type="text/javascript">

    function condel()
    {
      var con=confirm("Do you want to delete data?");
      if(con==true)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    function Click_edit()
    {
      var con=confirm("do you want to edit?");
      if(con==true)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

  </script>


<style type="text/css">
	   @media print{
      .print{
        display:none;
      }
  }

      td{
      	
      	border-right:1px #000 solid; 
      	border-top:1px #000 solid;
      	padding: 5px;
      }

.top_table{margin-top:15px};
</style>
<form  method="post">
	


<table  width="100%" class="print">
    <tr>
        <td colspan="4" align="center"> <h3>Selected Examinee Report</h3> </td>
       
    </tr>
	<tr>
	
	<td align="center" > 
	<label> 
	<select name="selectClass" id="className" class="form-control" style="width:300px; height: 30px; " >
			<option value=""> Select Class </option>
			<?php
				$selectclassname="SELECT * FROM `running_student_info`
INNER JOIN `add_class` ON `add_class`.`id`=`running_student_info`.`class_id`
GROUP BY `class_id` ASC  ";
			$resultClassName=$db->link->query($selectclassname);
			while($fetchClassName=$resultClassName->fetch_array())
			{?>
				<option value='<?php print $fetchClassName[1]; ?>'> <?php print $fetchClassName[9]; ?> </option>;
			<?php 
			    
			}

 
			?>
	 </select> 
	 </label> <label id="item_result"> </label>
	 </td>
	 

	 <td>
	     <select class="form-control" id="session" name="session" style="width:280px; border-radius:0px;" >
                        <option>Select Session</option>
                       <?php 
								$sessionsql = "SELECT `session2` FROM `student_acadamic_information` GROUP BY `student_acadamic_information`.`session2` ORDER BY `student_acadamic_information`.`session2` DESC";
								$result = $db->select_query($sessionsql);
									if($result > 0){
										
										while($fetchsession = $result->fetch_array()){
										$str = strlen($fetchsession[0]);
											if($str >5){
						?>
								
								<option><?php print $fetchsession[0];?></option>
								<?php   } } } ?>
								
								
								<?php
											$sessionsql = "SELECT `session2` FROM `student_acadamic_information` GROUP BY `student_acadamic_information`.`session2` ORDER BY `student_acadamic_information`.`session2` DESC";
								$result = $db->select_query($sessionsql);
									if($result > 0){
										
										while($fetchsession = $result->fetch_array()){
										$str = strlen($fetchsession[0]);
											if($str ==4){
								?>
																<option><?php print $fetchsession[0];?></option>
								<?php   } } } ?>
                        </select>
	 </td>
	 <td>
	     <input type="text" name="year" class="form-control" value="<?php print date('Y')?>">
	 </td>
	 	 <td>
	     
	     
	     <label>
	          <select name="examtype" id="examtype" class="form-control" style="width:300px; height: 30px; " onchange="return showStudent()">
	            </select> 
	 
	 </label> <label id="item_result"> </label>
	 
	 
	 
	     
	 </td>
	

	</tr>
</table>
<span id="loadStudentInfo"></span>

	
	
 </form>

</head>
</html>
<?php
}
?>