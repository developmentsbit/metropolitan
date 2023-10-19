<?php

require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();

  if(isset($_GET["del"]))
    {
      $db->insert_query($sql2);
      $sql3="DELETE FROM `running_student_info` WHERE `student_id`='".$_GET["del"]."'";
      $db->delete_query($sql3);
      $sql4="DELETE FROM `subject_registration_table` WHERE `std_id`='".$_GET["del"]."'";
      $db->delete_query($sql4);
      print "<script>location='classwiseregisteredStudent.php'</script>";
    }
    
    
  if(isset($_POST["Deactivate"]))
    {
        $query = "DELETE FROM deactivate_id WHERE `class`='".$_POST['hiddenClassid']."'";
		$db->link->query($query);
			
         $count=count($_POST['stdidd']);
		 $url ="Dues Student";
		 $hiddenClassid=$_POST['hiddenClassid'];
		 
         for($j=0;$j<$count;$j++)
         {
            $query = "INSERT INTO deactivate_id VALUES('".$_POST['stdidd'][$j]."','$hiddenClassid','$url')";
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
    <title>Registered Student List</title>
<link rel="shortcut icon" href="admin/all_image/shortcurt_iconSDMS2015.png" />
	<script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>

  

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

<script>
    
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


function check_section_name()
{
        var class_name = $('#className').val();
        var group_name = $('#groupname').val();
        //alert(group_name);
        $.post("check_section_name.php", { className: class_name,groupName:group_name },
            function(result){
                //if the result is 1
                if(result != 0 )
                {
                    //show that the username is available
                    $('#section').html(result);
             

                }
                else
                {
                  
                    $('#section').html('');
                }
        });

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
      	border-bottom:1px #000 solid;
      
      
      }

</style>
<form  method="post">
	


<table  width="100%" class="print">
	<tr>
	
	<td align="center" style=" border-bottom:1px #000 solid;"> 
		<label> 
	<select name="selectClass" id="className" class="form-control" style="width:300px; height: 30px; " onchange="return check_availability()">
			<option value=""> Select Class </option>
			<?php
				$selectclassname="SELECT * FROM `running_student_info`
INNER JOIN `add_class` ON `add_class`.`id`=`running_student_info`.`class_id`
GROUP BY `class_id` ASC  ";
			$resultClassName=$db->link->query($selectclassname);
			while($fetchClassName=$resultClassName->fetch_array())
			{?>


				<option value='<?php print $fetchClassName[1]; ?>'> <?php print $fetchClassName[9]; ?> </option>;
			<?php }

 
			?>
			

	 </select> </label> 
	</td> 
	<td>	 <lable>
	    <select class="form-control" name="groupname" id="groupname"  style="width:300px; height: 30px; " onchange="return check_section_name()" >
        </select>
	 </lable> </td>

	 

	 
	 <td>  	 <lable>
	    	 <select name="section" id="section" class="form-control" style="width:300px; height: 30px; "></select>
			</select>
	 </lable> </td>
	 
<td>
	 
	 	 <label>  <input type="submit" value="Show" class="btn btn-success" name="show" style="width: 120px; height: 30px; background: GREEN; color: #fff;"></input></label>
	 
	 </td>

	</tr>
</table>


<?php

if(isset($_POST["show"]))
{

if(!empty($_POST["selectClass"]) && !empty($_POST["groupname"]) && !empty($_POST["section"]))
{

$group=explode('and',$_POST["groupname"]);
$section=explode('and',$_POST["section"]);

$select="SELECT * FROM `add_class` WHERE `add_class`.`id`='".$_POST["selectClass"]."'  ";

$table='<table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;">';
$result=$db->link->query($select);
if($fetch=$result->fetch_array())
{
		$table.="<tr><td colspan='12' style='border-left:1px #000 solid; text-align:center' align='center'> Registered  Student List <br>  Class : ".$fetch['class_name'].", Group : $group[1] , Section : $section[1] </td></tr>";
		$i=0;

			$table.="<tr><td style='border-left:1px #000 solid; text-align:center; width:100px;'>SL</td> <td>ID</td> <td>Ex-Roll</td> <td>Present Roll</td>   <td>Group</td> <td>Name</td>  <td>Father's Name</td> <td>Mother's Name </td> <td>Phone</td>  <td>Date of Birth</td>   <td>Gender</td> <td>Religion</td>   <td class='print' width='250'>Action</td>  </tr>";

				$selectclass="SELECT * FROM `running_student_info`  
INNER JOIN `add_group` ON `add_group`.`id`=`running_student_info`.`group_id`
WHERE `running_student_info`.`class_id`='$fetch[0]' AND `group_id`='$group[0]' AND `section_id`='$section[0]'  ORDER BY `running_student_info`.`class_roll` ASC";
				$query=$db->link->query($selectclass);
				while($fetch_std=$query->fetch_array())
				{
				    
				    if($fetch_std['class_roll']>153)
				    {
				      // $db->link->query("UPDATE `running_student_info` SET `section_id`='331703040006' WHERE `student_id`='$fetch_std[0]'");
				    }

							$std="SELECT `student_personal_info`.`student_name`,`student_personal_info`.`father_name`,`student_personal_info`.`mother_name`,`student_personal_info`.`gender`,`student_personal_info`.`religious`,`student_guardian_information`.`guardian_contact`,`student_personal_info`.`date_of_brith` 
FROM `student_personal_info`  INNER JOIN `student_guardian_information` ON `student_guardian_information`.`id`=`student_personal_info`.`id`
WHERE `student_personal_info`.`id`='$fetch_std[0]'";

								$query_info=$db->link->query($std);

								if($query_info)
								{
									$fetch_info=$query_info->fetch_array();
								}
								
								
                        	$stdexroll="SELECT `class_roll` FROM  `student_academic_record` WHERE `student_id`='$fetch_std[0]' AND `year`='2022'";

								$query_exroll=$db->link->query($stdexroll);

								if($query_exroll)
								{
									$fetch_exRoll=$query_exroll->fetch_array();
								}

                        

						$i++;
						
			    $deactiveid = "SELECT * FROM deactivate_id WHERE id='".$fetch_std[0]."'";
			   
			    $selectDactive=$db->link->query($deactiveid);
			    if($selectDactive->num_rows>0)
			    {
			        	$table.="<tr><td style='border-left:1px #000 solid; text-align:center'> <input type='checkbox' checked='checked' name='stdidd[]' value='$fetch_std[0]'> $i</td>  <td align='center'>$fetch_std[0]</td>  <td align='center'>$fetch_exRoll[0]</td>    <td align='center' >$fetch_std[2]</td> <td>$fetch_std[group_name]</td>  <td style='text-transform: uppercase;'>$fetch_info[0] </td>   <td style='text-transform: uppercase;'>$fetch_info[1]</td> <td style='text-transform: uppercase;'>$fetch_info[2] </td> <td>0$fetch_info[5]</td><td>$fetch_info[6]</td>  <td>$fetch_info[3]</td> <td>$fetch_info[4]</td>   <td class='print'  height='50'>   <a href='viewStudentDetails.php?id=$fetch_std[0]' style='padding: 10px; background: #EFEFFB; height:30px; width:50px;  color: #000;' >View </a> &nbsp; <a href='student_resigtration.php?id=$fetch_std[0]&session=$fetch_info[6]&name=$fetch_info[0]&rel=$fetch_info[4]' style='padding: 10px; background: #EFF2FB; height:30px; width:50px;  color: #000;' >Reg </a> &nbsp; <a href='Student_information.php?edit=$fetch_std[0]' class='btn btn-warning'  style='padding: 10px; background: #F5ECCE; height:30px; width:50px;  color: #000;' onclick='return Click_edit()' >Edit </a> &nbsp;   <a href='classwiseregisteredStudent.php?del=$fetch_std[0]' style='padding: 10px; background: #ff0000; height:30px; width:50px;  color: #fff;' onclick='return condel()' >Delete </a> <br></td> </tr>";

			    }
			    else
			    {
			        	$table.="<tr><td style='border-left:1px #000 solid; text-align:center'> <input type='checkbox' name='stdidd[]' value='$fetch_std[0]'> $i</td>  <td align='center'>$fetch_std[0]</td>  <td align='center'>$fetch_exRoll[0]</td>   <td align='center' >$fetch_std[2]</td> <td>$fetch_std[group_name]</td>  <td style='text-transform: uppercase;'>$fetch_info[0] </td>   <td style='text-transform: uppercase;'>$fetch_info[1]</td> <td style='text-transform: uppercase;'>$fetch_info[2] </td> <td>0$fetch_info[5]</td><td>$fetch_info[6]</td>  <td>$fetch_info[3]</td> <td>$fetch_info[4]</td>   <td class='print'  height='50'>   <a href='viewStudentDetails.php?id=$fetch_std[0]' style='padding: 10px; background: #EFEFFB; height:30px; width:50px;  color: #000;' >View </a> &nbsp; <a href='student_resigtration.php?id=$fetch_std[0]&session=$fetch_info[6]&name=$fetch_info[0]&rel=$fetch_info[4]' style='padding: 10px; background: #EFF2FB; height:30px; width:50px;  color: #000;' >Reg </a> &nbsp; <a href='Student_information.php?edit=$fetch_std[0]' class='btn btn-warning'  style='padding: 10px; background: #F5ECCE; height:30px; width:50px;  color: #000;' onclick='return Click_edit()' >Edit </a> &nbsp;   <a href='classwiseregisteredStudent.php?del=$fetch_std[0]' style='padding: 10px; background: #ff0000; height:30px; width:50px;  color: #fff;' onclick='return condel()' >Delete </a> <br></td> </tr>";

			    }
			    
			
					
				}
	
}

$table.="</table>";

$table.='<table width="100%" class="print">
	<tr>
		<td align="center">  
		<input type="submit" value="Save Deactivate" name="Deactivate" class="print" style="height: 30px; width: 150px; background: red; color: #fff;">  <input type="button" value="Print" name="print" class="print" style="height: 30px; width: 120px; background: green; color: #fff;" onclick="window.print()"></input>
	
		</td>
	</tr>
</table>';

print $table;
 
}
}


?>

	<input type="hidden" name="hiddenClassid" value="<?php print $_POST['selectClass']?>">
	
 </form>

</head>
</html>