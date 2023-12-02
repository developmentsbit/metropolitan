<?php
	error_reporting(1);
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();

	if($_POST['type']=="All")
    {
    
       $table="<center> <h3> All Student Attendance Report (".$_POST['example1'].") </h3></center>";
    	$table.="<table class='table table-bordered table-striped'> <thead><tr><th> Class </th><th> Section </th><th> Total Student's </th><th> Present </th><th> Absent </th><th> Leave </th></tr></thead>";
		$table.="<tbody>";
		$selectSection=$db->link->query("SELECT `add_class`.`class_name`,`add_section`.`section_name`,`add_section`.`id` FROM `add_class` 
INNER JOIN `add_section` ON `add_section`.`class_id`=`add_class`.`id`
WHERE `add_class`.`id`='".$_POST['selectClass']."'");
		while($fetch=$selectSection->fetch_array())
		{
			$table.="<tr>";
				$table.="<td>$fetch[0]</td>";
				$table.="<td>$fetch[1]</td>";
				$table.="<td>";

					$totalStd=$db->link->query("SELECT COUNT(`student_id`) AS 'Total'  FROM `running_student_info` WHERE `class_id`='".$_POST['selectClass']."' AND `section_id`='".$fetch['2']."'");
					$fetch_TotalStd=$totalStd->fetch_array();

					$table.=$fetch_TotalStd[0];
				$table.="</td>";
			    $table.="<td>";

				$selectAttend=$db->link->query("SELECT COUNT(`student_id`) AS 'Total' FROM `attendance` WHERE `attend_date`='".$_POST['example1']."' AND `class_id`='".$_POST['selectClass']."' AND `section_id`='".$fetch['2']."' AND `period_id`='".$_POST['Period']."' AND `attendance`='1'");

				
					$fetch_selectAttend=$selectAttend->fetch_array();

					$table.=$fetch_selectAttend[0];
				$table.="</td>";

				$table.="<td>";

						$selectabsent=$db->link->query("SELECT COUNT(`student_id`) AS 'Total'  FROM `attendance` WHERE `attend_date`='".$_POST['example1']."' AND `class_id`='".$_POST['selectClass']."' AND `section_id`='".$fetch['2']."' AND `period_id`='".$_POST['Period']."' AND `attendance`='0'");

					$fetch_absent=$selectabsent->fetch_array();

					$table.=$fetch_absent[0];
				$table.="</td>";


				$table.="<td>";

						$selectleave=$db->link->query("SELECT COUNT(`student_id`) AS 'Total'  FROM `attendance` WHERE `attend_date`='".$_POST['example1']."' AND `class_id`='".$_POST['selectClass']."' AND `section_id`='".$fetch['2']."' AND `period_id`='".$_POST['Period']."' AND `attendance`='2'");

					$fetch_selectleave=$selectleave->fetch_array();

					$table.=$fetch_selectleave[0];
				$table.="</td>";

				
			$table.="</tr>";
		}
		$table.="</tbody>";
		$table.="</table>";
    print $table;
		
    }

	else if($_POST['type']=="Present")
    {
        
         $table="<center> <h3> Present Student's Attendance Report (".$_POST['example1'].") </h3></center>";
    	$table.="<table class='table table-bordered table-striped'> <thead><tr><th> SL </th> <th> Student ID </th><th> Name </th> <th> Roll </th><th>Phone </th><th>Status</th></tr></thead>";
		$table.="<tbody>";

		$selectSection=$db->link->query("SELECT `add_class`.`class_name`,`add_section`.`section_name`,`add_section`.`id` FROM `add_class` 
INNER JOIN `add_section` ON `add_section`.`class_id`=`add_class`.`id` WHERE `add_class`.`id`='".$_POST['selectClass']."'");
echo "SELECT `add_class`.`class_name`,`add_section`.`section_name`,`add_section`.`id` FROM `add_class` 
INNER JOIN `add_section` ON `add_section`.`class_id`=`add_class`.`id` WHERE `add_class`.`id`='".$_POST['selectClass']."'";

		while($fetch=$selectSection->fetch_array())
		{
		    $i=0;
		    $selectAttend=$db->link->query("SELECT `attendance`.`student_id`,`student_personal_info`.`student_name`,`student_personal_info`.`father_name`,`running_student_info`.`class_roll`,`student_guardian_information`.`guardian_contact` FROM `attendance`
INNER JOIN  `student_personal_info` ON `student_personal_info`.`id`=`attendance`.`student_id`
INNER JOIN  `running_student_info` ON `running_student_info`.`student_id`=`attendance`.`student_id`
INNER JOIN  `student_guardian_information` ON `student_guardian_information`.`id`=`attendance`.`student_id`
WHERE `attendance`.`attend_date`='".$_POST['example1']."' AND `attendance`.`class_id`='".$_POST['selectClass']."' AND `attendance`.`section_id`='".$fetch['2']."' AND `attendance`.`period_id`='".$_POST['Period']."' AND `attendance`.`attendance`='1'");
             while($fetch_selectAttend=$selectAttend->fetch_array())
            {
                
            $i++;
                
			$table.="<tr>";
				$table.="<td>$i</td>";
				$table.="<td>$fetch_selectAttend[0]</td>";
				$table.="<td>$fetch_selectAttend[1]</td>";
				$table.="<td>$fetch_selectAttend[3]</td>";
				$table.="<td>$fetch_selectAttend[4]</td>";
				$table.="<td>Present</td>";
			$table.="</tr>";
		}
		$table.="</tbody>";
		$table.="</table>";
print $table;
		
    }

    
    
	}

	if(isset($_POST["showStdAttendance"]))
	{
		$sql=$db->link->query("SELECT `student_personal_info`.`student_name`,`father_name`,`mother_name`,`gender`,`add_class`.`class_name`,`add_group`.`group_name`,`add_section`.`section_name`,`running_student_info`.`class_roll`,`student_guardian_information`.`guardian_contact`,`student_address_info`.`present_house_name`,`present_village`,`present_upazila`,`present_distric` FROM `running_student_info` 
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id`
INNER JOIN `add_class` ON `add_class`.`id`=`running_student_info`.`class_id`
INNER JOIN `add_group` ON `add_group`.`id`=`running_student_info`.`group_id`
INNER JOIN `add_section` ON `add_section`.`id`
INNER JOIN `student_guardian_information` ON `student_guardian_information`.`id`=`running_student_info`.`student_id` INNER JOIN `student_address_info` ON `student_address_info`.`id`=`running_student_info`.`student_id`
WHERE `running_student_info`.`student_id`='".$_POST["stdID"]."' GROUP BY `running_student_info`.`student_id`");
		$fetch=$sql->fetch_array();
			?>
						<table class="table table-striped table-border">
							<tr>
									<td colspan="4" align="center"><h3>Al Helal Academy</h3></td>
							</tr>							

							<tr>
									<td colspan="4" align="center"><h4>Single Student Report</h4></td>
							</tr>
							<tr>
									<td>Name : <?php print $fetch[0]?> </td>
									<td>Father's Name : <?php print $fetch[1]?> </td>
									<td>Mother's Name : <?php print $fetch[2]?> </td>
									<td>Gender: <?php print $fetch[3]?> </td>
							</tr>
							
							<tr>
									<td>Roll : <?php print $fetch[7]?> </td>
									<td>Class : <?php print $fetch[4]?> </td>
									<td>Group : <?php print $fetch[5]?> </td>
									<td>Section  : <?php print $fetch[6]?> </td>
									
							</tr>	
							<tr>
									<td>House : <?php print $fetch[9]?> </td>
									<td>Village : <?php print $fetch[10]?> </td>
									<td>Upazila : <?php print $fetch[11]?> </td>
									<td>Mobile  : 0<?php print $fetch[8]?> </td>
									
							</tr>

							<tr>
											<td colspan="4"> Attendance Duration: <?php print $_POST['example1']; ?> to  <?php print $_POST['example2'];?> </td>
											
							</tr>

								
							<tr>
									<td>Present Date: </td>
									<td colspan="3">	<?php

									$select=$db->link->query("SELECT * FROM `attendance` WHERE  `class_id`='".$_POST["selectClass"]."' AND `student_id`='".$_POST["stdID"]."' AND `attendance`='1' AND `period_id`='".$_POST['Period']."' AND `attend_date`  BETWEEN '".$_POST['example1']."' AND '".$_POST['example2']."'");


									if($select)
									{
										while($fetch_attendance=$select->fetch_array())
										{
											print $fetch_attendance['date'].'/'.$fetch_attendance['month'].' , ';
										}
									}


									?></td>
									
							</tr><tr>
									<td>Absent Date: </td>
									<td colspan="3"><?php

									$select=$db->link->query("SELECT * FROM `attendance` WHERE  `class_id`='".$_POST["selectClass"]."' AND `student_id`='".$_POST["stdID"]."' AND `attendance`='0' AND `period_id`='".$_POST['Period']."' AND `attend_date`  BETWEEN '".$_POST['example1']."' AND '".$_POST['example2']."'");


									if($select)
									{
										while($fetch_attendance=$select->fetch_array())
										{
											print $fetch_attendance['date'].'/'.$fetch_attendance['month'].' , ';
										}
									}


									?></td>
									
							</tr><tr>
									<td>Leave Date: </td>
									<td colspan="3"><?php

									$select=$db->link->query("SELECT * FROM `attendance` WHERE  `class_id`='".$_POST["selectClass"]."' AND `student_id`='".$_POST["stdID"]."' AND `attendance`='2' AND `period_id`='".$_POST['Period']."' AND `attend_date`  BETWEEN '".$_POST['example1']."' AND '".$_POST['example2']."'");


									if($select)
									{
										while($fetch_attendance=$select->fetch_array())
										{
											print $fetch_attendance['date'].'/'.$fetch_attendance['month'].' , ';
										}
									}


									?></td>
									
							</tr>



							<tr>
									<td colspan="4" align="center"><input type="button" name="button" class="btn btn-danger" onclick="window.print()" value="Print"></td>
							</tr>
						</table>


<?php

	}



	if(isset($_POST["teacherAttendance"]))
	{

		$sql=$db->link->query("SELECT * FROM `teachers_information` WHERE `teachers_id`='".$_POST["name"]."'");

		$fetch=$sql->fetch_array();
			?>
						<table class="table table-striped table-border">
							<tr>
									<td colspan="4" align="center">
										<table width="100%">
                      <tr>
  <td height="50" align="center" style="">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>

      <td style="" height="50"  align="center" >
  
    
    <p style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    Al Helal Academy</p>

 <p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"> Main Road, Sonagazi, Feni.       </p>

    <p style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif">01728563480 ,alhelalacademy.edu.bd@gmail.com  </p><h4>Single Teacher's Attendance - <?php print $_POST['example1']?> To <?php print $_POST['example2']?></h4>
         </td>

           <td height="50" width="76" align="center" style="">

 

  </td>
     </tr>

  </table>

									</td>
							</tr>							

						
							<tr>
									<td>Name : <?php print $fetch[2]?> </td>
									<td>Designation : <?php print $fetch[3]?> </td>
									<td>Mobile : <?php print $fetch[11]?> </td>
									<td>Gender: <?php print $fetch[5]?> </td>
							</tr>
							
							

								
							<tr>
									
									<td colspan="4">	

											<table width="100%" cellspacing="0" cellpadding="0">
												<tr>
											        <td colspan="6" bgcolor="#fff" style="border-bottom:1px #000 solid;  "><h4> &nbsp;Present Date</h4></td>
											    </tr> 
											    <tr>
											      <td width="10%" style="border-bottom:1px #000 solid;border-left:1px #000 solid; border-right:1px #000; border-right:1px #000 solid;font-weight: bold; ">&nbsp;Date</td>

											        <td width="20%" style="border-bottom:1px #000 solid;border-right:1px #000 solid; font-weight: bold;">&nbsp;Incoming Time</td>

											        <td width="30%" style="border-bottom:1px #000 solid;border-right:1px #000 solid; font-weight: bold; ">&nbsp; Gap Time</td>

											        <td width="20%" style="border-bottom:1px #000 solid; border-right:1px #000 solid; font-weight: bold;">&nbsp;Leaving Time</td>

											        <td width="20%" style="border-bottom:1px #000 solid;border-right:1px #000 solid; font-weight: bold; ">&nbsp;Comments</td>
											    </tr>
											</table>
										<?php

									$select=$db->link->query("SELECT * FROM `teacher_attend` WHERE `teacher_id`='".$_POST['name']."' AND `attendance`='1' AND `attend_date`  BETWEEN '".$_POST['example1']."' AND '".$_POST['example2']."'");
							//	echo "SELECT * FROM `teacher_attend` WHERE `teacher_id`='".$_POST['name']."' AND `attendance`='1' AND `attend_date`  BETWEEN '".$_POST['example1']."' AND '".$_POST['example2']."'";
									if($select)
									{
										while($fetch_attendance=$select->fetch_array())
										{
											$x=explode('-',$fetch_attendance['attend_date']);
										
											?>
											
		<table width="100%" cellspacing="0" cellpadding="0">							    
			<tr> 
				<td width="10%" style="border-left:1px #000 dotted;border-bottom:1px #000 dotted; "> &nbsp; <?php 	//echo $x[2].'/'.$x[1].' , '; 
				 echo $fetch_attendance['attend_date'];?> </td>
			<td style="border-left:1px #000 dotted; border-bottom:1px #000 dotted;" width="20%"> &nbsp;
                <?php 
                       $selectAttendance=$db->link->query("SELECT * FROM `teacher_attend` WHERE `teacher_id`='".$fetch_attendance[4]."' AND `attend_date`='".$fetch_attendance[3]."'");
                                                    $fetch_att=$selectAttendance->fetch_array();
                                                    print  $fetch_att[1];
                 ?>
                                            </td>

               <td width="30%" style="border-left:1px #000 dotted; border-bottom:1px #000 dotted; "> &nbsp;
                                                <?php
                                                    $getTime=$db->link->query("SELECT * FROM `teacher_gap_time` WHERE  `teacher_id`='".$fetch_attendance[4]."' AND `attend_date`='".$fetch_attendance[3]."'");
                                                    $fetch_gap_time=$getTime->fetch_array();
                                                    print  $fetch_gap_time[2].' - '.$fetch_gap_time[3];
                                                ?>
                                                           
                                            </td>
                                            <td width="20%" style="border-left:1px #000 dotted; border-bottom:1px #000 dotted;"> &nbsp;<?php 
                                            
                                                  print  $fetch_att[2]; 
                                            
                                            ?> </td> 
                                            
                                            <td width="20%" style="border-left:1px #000 dotted;border-right:1px #000 dotted; border-bottom:1px #000 dotted;"> &nbsp;<?php 
                                            
                                                  print  $fetch_att[6]; 
                                            
                                            ?> </td>
                                            </tr>
            
											</table>
											<?php
										}
									}


									?></td>
									
							</tr>

							<tr>
								
									<td colspan="4"  height="200">
	
			<table  cellpadding="0" cellspacing="0" width="100%" >
				<tr>
								 <td colspan="2" bgcolor="#fff" style="border-bottom:1px #000 solid; ">
								 	<b>Absent Date</b>
								 </td>
				</tr> 
											    
				<tr>
								<td width="30%" style="border-bottom:1px #000 solid;border-left:1px #000 solid; font-weight: bold;">&nbsp; Date</td>
											       
								<td width="70%" style="border-bottom:1px #000 solid; border-left:1px #000 solid; font-weight: bold; border-right:1px #000 solid;">&nbsp; Comments </td>
				</tr>

	


										<?php

									$select=$db->link->query("SELECT * FROM `teacher_attend` WHERE `teacher_id`='".$_POST['name']."' AND `attendance`='0' AND `attend_date`  BETWEEN '".$_POST['example1']."' AND '".$_POST['example2']."'");



									if($select)
									{
										while($fetch_attendance=$select->fetch_array())
										{
											$x=explode('-',$fetch_attendance['attend_date']);
										?>
											<tr> 
											    <td style="border-bottom:1px #000 dotted; border-left:1px #000 dotted; border-right:1px #000 dotted; " > &nbsp; <?php 
											    echo $fetch_attendance['attend_date'];
											    ?></td>

                                            <td style="border-bottom:1px #000 dotted;  border-right:1px #000 dotted;
                                            ">&nbsp; 
                                            	<?php 
                                                  print  $fetch_att[6]; 
                                            ?> </td>
                                            </tr>
										<?php
										}
									}


									?>

</table>
								</td>
									
							</tr>




	<tr>
								
									<td colspan="4"  height="200">
	
			<table  cellpadding="0" cellspacing="0" width="100%" >
				<tr>
								 <td colspan="2" bgcolor="#fff" style="border-bottom:1px #000 solid; ">
								 	<b>Leave Date</b>
								 </td>
				</tr> 
											    
				<tr>
								<td width="30%" style="border-bottom:1px #000 solid;border-left:1px #000 solid; font-weight: bold;">&nbsp; Date</td>
											       
								<td width="70%" style="border-bottom:1px #000 solid; border-left:1px #000 solid; font-weight: bold; border-right:1px #000 solid;">&nbsp; Comments </td>
				</tr>

	


										<?php

									$select=$db->link->query("SELECT * FROM `teacher_attend` WHERE `teacher_id`='".$_POST['name']."' AND `attendance`='2' AND `attend_date`  BETWEEN '".$_POST['example1']."' AND '".$_POST['example2']."'");



									if($select)
									{
										while($fetch_attendance=$select->fetch_array())
										{
											$x=explode('-',$fetch_attendance['attend_date']);
										
										?>
											<tr> 
											    <td style="border-bottom:1px #000 dotted; border-left:1px #000 dotted; border-right:1px #000 dotted; " > &nbsp; <?php 
											    echo $fetch_attendance['attend_date'];
											    ?></td>

                                            <td style="border-bottom:1px #000 dotted;  border-right:1px #000 dotted;
                                            ">&nbsp; 
                                            	<?php 
                                                  print  $fetch_att[6]; 
                                            ?> </td>
                                            </tr>
										<?php
										}
									}


									?>

</table>
								</td>
									
							</tr>

					


							<tr id="notprint">
									<td colspan="4" align="center"><input type="button" name="button" class="btn btn-danger" onclick="window.print()" value="Print"></td>
							</tr>
						</table>


<?php
	}

?>







