<?php

require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();



if(!empty($_POST["selectClass"]))
{
            $selectClass = $_POST['selectClass'];
           // echo $_POST['examtype'];
            $examtype = explode('and',$_POST['examtype']);
            $session = $_POST['session'];
            $year = $_POST['year'];;

$select="SELECT * FROM `add_class` WHERE `add_class`.`id`='".$_POST["selectClass"]."'  ";

$table='<table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;">';
$result=$db->link->query($select);
if($fetch=$result->fetch_array())
{
		$table.="<tr><td colspan='12' style='border-left:1px #000 solid; text-align:center' align='center'> <h3> Student's Information ,  Class : ".$fetch['class_name']." </h3></td></tr>";
		$i=1;

			$table.="<tr><td style='border-left:1px #000 solid; text-align:center; width:50px;'>SL</td> <td class='print'>Admit Card</td> <td>ID</td> <td>Roll</td>   <td>Group</td> <td>Name</td> <td>Phone</td>     <td>Gender</td> <td>Student's Signature </td>  </tr>";

				$selectclass="SELECT * FROM `running_student_info`
				INNER JOIN `examinee_reg` on `examinee_reg`.`student_id`=`running_student_info`.`student_id`
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

                        

						
						
			    
                        $table.="<tr><td style='border-left:1px #000 solid; text-align:center'> $i</td><td class='print'> <a href='admit/admit.php?clID=$selectClass&exId=$examtype[0]&session=$session&gpna=$fetch_std[3]&stdRoll=$fetch_std[0]' target='_blank' ><lable><input type='checkbox'></lable> <lable> Admid Card</lable></a></td>  <td align='center'>$fetch_std[0]</td>    <td align='center' >$fetch_std[2]</td> <td>$fetch_std[group_name]</td>  <td style='text-transform: uppercase;'>$fetch_info[0] </td>  <td>0$fetch_info[5]</td>  <td>$fetch_info[3]</td> <td></td>  </tr>";

			    
			    	$i++;
		}
	
}

$table.="</table>";

$table.='<table width="100%" class="print">
	<tr>
		<td align="center">  
		<input type="submit" value="Print" name="print" class="print" style="height: 30px; width: 150px; background: red; color: #fff;" onclick="window.print()">  


	
		</td>
	</tr>
</table>';

print $table;
 

}


?>