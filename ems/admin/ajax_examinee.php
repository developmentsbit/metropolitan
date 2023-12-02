<?php

require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();



if(!empty($_POST["selectClass"]))
{


$select="SELECT * FROM `add_class` WHERE `add_class`.`id`='".$_POST["selectClass"]."'  ";

$table='<table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;">';
$result=$db->link->query($select);
if($fetch=$result->fetch_array())
{
		$table.="<tr><td colspan='12' style='border-left:1px #000 solid; text-align:center' align='center'> <h3> Student's Information ,  Class : ".$fetch['class_name']." </h3></td></tr>";
		$i=1;

			$table.="<tr><td style='border-left:1px #000 solid; text-align:center; width:100px;'>SL</td> <td>ID</td> <td>Roll</td>   <td>Group</td> <td>Name</td>  <td>Father's Name</td> <td>Mother's Name </td> <td>Phone</td>     <td>Gender</td> <td>Religion</td>  </tr>";

				$selectclass="SELECT * FROM `running_student_info`  
INNER JOIN `add_group` ON `add_group`.`id`=`running_student_info`.`group_id`
WHERE `running_student_info`.`class_id`='$fetch[0]' ORDER BY `running_student_info`.`class_roll` ASC";
				$query=$db->link->query($selectclass);
				while($fetch_std=$query->fetch_array())
				{

							$std="SELECT `student_personal_info`.`student_name`,`student_personal_info`.`father_name`,`student_personal_info`.`mother_name`,`student_personal_info`.`gender`,`student_personal_info`.`religious`,`student_guardian_information`.`guardian_contact`,`student_personal_info`.`date_of_brith` 
FROM `student_personal_info`  INNER JOIN `student_guardian_information` ON `student_guardian_information`.`id`=`student_personal_info`.`id`
WHERE `student_personal_info`.`id`='$fetch_std[0]'";

								$query_info=$db->link->query($std);

								if($query_info)
								{
									$fetch_info=$query_info->fetch_array();
								}

                        

						
						
			    $deactiveid = "SELECT * FROM `examinee_reg` WHERE `student_id`='$fetch_std[0]'";
			   
			    $selectDactive=$db->link->query($deactiveid);
			    if($selectDactive->num_rows>0)
			    {
                        $table.="<tr><td style='border-left:1px #000 solid; text-align:center'> <input type='checkbox' checked='checked' name='stdidd[]' value='$fetch_std[0]'> $i</td>  <td align='center'>$fetch_std[0]</td>    <td align='center' >$fetch_std[2]</td> <td>$fetch_std[group_name]</td>  <td style='text-transform: uppercase;'>$fetch_info[0] </td>   <td style='text-transform: uppercase;'>$fetch_info[1]</td> <td style='text-transform: uppercase;'>$fetch_info[2] </td> <td>0$fetch_info[5]</td>  <td>$fetch_info[3]</td> <td>$fetch_info[4]</td>   </tr>";

			    }
			    else{
			        
			        	$table.="<tr><td style='border-left:1px #000 solid; text-align:center'> <input type='checkbox'  name='stdidd[]' value='$fetch_std[0]'> $i</td>  <td align='center'>$fetch_std[0]</td>    <td align='center' >$fetch_std[2]</td> <td>$fetch_std[group_name]</td>  <td style='text-transform: uppercase;'>$fetch_info[0] </td>   <td style='text-transform: uppercase;'>$fetch_info[1]</td> <td style='text-transform: uppercase;'>$fetch_info[2] </td> <td>0$fetch_info[5]</td> <td>$fetch_info[3]</td> <td>$fetch_info[4]</td>   </tr>";

			    }
			    	$i++;
		}
	
}

$table.="</table>";

$table.='<table width="100%" class="print">
	<tr>
		<td align="center">  
		<input type="submit" value="Registration" name="registration" class="print" style="height: 30px; width: 150px; background: red; color: #fff;">  


	
		</td>
	</tr>
</table>';

print $table;
 

}


?>