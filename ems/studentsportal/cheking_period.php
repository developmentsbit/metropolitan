

<?php

	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();

	if(isset($_POST["periodshow"]))
	{
	   	$insert="SELECT * FROM `add_period` WHERE `class_id`='".$_POST['className']."'";
	    $r=$db->link->query($insert);
	    while($fetch_info=$r->fetch_array())
	    {
	    	print "<option value='$fetch_info[0]'>$fetch_info[2]</option>";
	    }
	}

	if(isset($_POST["add"]))
	{
			// data :{selectUser:selectUser,className:className,groupname:groupname,section:section,add:add,period:period},
		$group=explode("and",$_POST["groupname"]);
		$section=explode("and",$_POST["section"]);
		$sql="INSERT INTO `subject_priority_att`(`user`,`class`,`group`,`section`,`subjectName`,`SubjectPart`) VALUES('".$_POST["selectUser"]."','".$_POST["className"]."','".$group[0]."','".$section[0]."','".$_POST["period"]."','Null')";
		$result=$db->link->query($sql);
		if($result)
		{
			print "Save Successfully!!";
		}
		else
		{
			print "Save Unsuccessfully!!";
		}

	}


	if(isset($_POST["view"]))
	{
		$sql=$db->link->query("SELECT `teachers_information`.`teachers_name`,`add_class`.`class_name`,`add_group`.`group_name`,`add_section`.`section_name`,`add_period`.`period_name`,`add_period`.`subject_name`,`subject_priority_att`.`id` FROM `subject_priority_att`
INNER JOIN `teachers_information` ON `teachers_information`.`teachers_id`=`subject_priority_att`.`user`
INNER JOIN `add_period` ON `add_period`.`id`=`subject_priority_att`.`subjectName`
INNER JOIN `add_class` ON `add_class`.`id`=`subject_priority_att`.`class`
INNER JOIN `add_section` ON `add_section`.`id`=`subject_priority_att`.`section`
INNER JOIN `add_group` ON `add_group`.`id`=`subject_priority_att`.`group`  WHERE `subject_priority_att`.`user`='".$_POST["selectUser"]."'");

?>
		<table class="table table-bordered table-striped">
			<tr>
					<td>Sl</td>
					<td>Name</td>
					<td>Class</td>
					<td>Group</td>
					<td>Section</td>
					<td>Period</td>
					<td>Subject</td>
					<td>Action</td>
			</tr>

			<?php 
			$i=1;
				while($fetch=$sql->fetch_array())
				{
					?>

				<tr>
					<td><?php print $i++?></td>
					<td><?php print $fetch[0];?></td>
					<td><?php print $fetch[1];?></td>
					<td><?php print $fetch[2];?></td>
					<td><?php print $fetch[3];?></td>
					<td><?php print $fetch[4];?></td>
					<td><?php print $fetch[5];?></td>
					
					<td><input type="button" class="btn btn-danger" name="del" value="Delete" onclick="return confirmDelete('<?php print $fetch[6];?>')" ></td>
			</tr>

				<?php
				}
			?>


		</table>
<?php

	}


if(isset($_POST["del"]))
{

      $delete="DELETE FROM `subject_priority_att` WHERE `id`='".$_POST['id']."'";
	  $db->link->query($delete);
	  print "Delete Successfully!!";
}


if(isset($_POST["SearchSection"]))
{
	

      $select="SELECT * FROM `add_section` WHERE `class_id`='".$_POST['className']."' AND `group_id`='".$_POST['groupName']."'";
	  $sql=$db->link->query($select);
	  
	  while($fetch=$sql->fetch_array())
	  {
	  	print "<option value='$fetch[0]'>".$fetch[3]."</option>";
	  		
	  }
	
}
?>


