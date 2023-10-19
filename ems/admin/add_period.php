<?php
error_reporting(1);
@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
	    
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");
	$db = new database();
	if(isset($_POST["add"]))
	{
	    $sql=$db->link->query("INSERT INTO `add_period`(`class_id`, `period_name`, `subject_name`) VALUES ('".$_POST["ClassName"]."','".$_POST["periodname"]."','".$_POST["subjectName"]."')");
	    //print "INSERT INTO `add_period`(`class_id`, `period_name`, `subject_name`) VALUES ('".$_POST["ClassName"]."','".$_POST["periodname"]."','".$_POST["subjectName"]."')";
	 
	   
	    if($sql)
	    {
	        print "Successfully";
	    }
	}	
	
	if(isset($_POST["Update"]))
	{
	    $id=$_GET["edit"];
	    $sql=$db->link->query("REPLACE INTO `add_period`(`id`,`class_id`, `period_name`, `subject_name`) VALUES ('$id','".$_POST["ClassName"]."','".$_POST["periodname"]."','".$_POST["subjectName"]."')");
	    //print "INSERT INTO `add_period`(`class_id`, `period_name`, `subject_name`) VALUES ('".$_POST["ClassName"]."','".$_POST["periodname"]."','".$_POST["subjectName"]."')";
	    if($sql)
	    {
	        print "Successfully";
	         print "<script>Location='add_period.php'</script>";
	    }
	}
	
	if(isset($_GET["del"]))
	{
	    $sql=$db->link->query("DELETE FROM `add_period` WHERE id='".$_GET['del']."'");
	    //print "INSERT INTO `add_period`(`class_id`, `period_name`, `subject_name`) VALUES ('".$_POST["ClassName"]."','".$_POST["periodname"]."','".$_POST["subjectName"]."')";
	 
	   
	    if($sql)
	    {
	        print "Successfully";
	        print "<script>Location='add_period.php'</script>";
	    }
	}
	
	if(isset($_GET["edit"]))
	{
	    $sql=$db->link->query("SELECT `add_period`.`id`,`class_id`,`period_name`,`subject_name`,`add_class`.`class_name` FROM `add_period` 
	    INNER JOIN `add_class` on `add_class`.`id`=`add_period`.`class_id` WHERE `add_period`.`id`='".$_GET['edit']."'");
  	    if($sql)
  	    { 
	        $fetch_data=$sql->fetch_array();
	        
  	    }
	}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Admin Panal || Al Helal Academy</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
	
  <body>
  	<form name="" action="" method="post"  enctype="multipart/form-data" class="form-horizontal" >

  	<div class="has-feedback col-xs-12 col-sm-8 col-lg-8 col-md-8 col-sm-offset-2 col-md-offset-2">
  	<table align="center" class="table table-responsive box" style="border:1px #CCCCCC solid; margin-top:30px; color: #000;">
  			<tr>
  				<td bgcolor="#f4f4f4" class="warning" colspan="4" bgcolor="#dddddd" align="center"><span style="font-size:22px; color:#333; display:block;">Add Period </span> </td>
  			</tr>
  			
			
						
			<tr>
				<td class="info"> Class Section  </td>
				<td class="info">:</td>
				<td class="info">
					<div class="col-lg-12 has-warning">
					<input type="hidden" readonly=""  name="id" value="" />
						<select name="ClassName" class="form-control">
						    
						
				<?php
					if(isset($_GET["edit"]))
	                {
	                    print "<option value='$fetch_data[1]'>$fetch_data[4]</option>";
	                }
	                
	    
	    
								$select_section = "SELECT * FROM `add_class` order by `index` asc ";
								$cheked_query=$db->select_query($select_section);
								if($cheked_query)
								{
									while($fetchsection=$cheked_query->fetch_array())
									{?>
							
							<option value="<?php echo "$fetchsection[0]"?>"><?php echo $fetchsection[2];?></option>


							<?php  }  } ?>
						
						</select>
					</div>
				</td>
				<td class='info'><span class="text-danger text-justify"><strong>*&nbsp;Try It English</strong></span></td>
			</tr>
			<tr>
				<td class="info"> Period Name  </td>
				<td class="info">:</td>
				<td class="info">
					<div class="col-lg-12 has-warning">
						<input type="text" placeholder="Period Name" class="form-control" name="periodname" value="<?php print $fetch_data[2]?>" />
						<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
					</div>
				</td>
				<td class='info'><span class="text-danger text-justify"><strong>*&nbsp;Try It English</strong></span></td>
			</tr>

				<tr>
				<td class="info">Subject  </td>
				<td class="info">:</td>
				<td class="info">
					<div class="col-lg-12 has-warning">
						<input type="text" placeholder="Subject Name" class="form-control" name="subjectName"  value="<?php print $fetch_data[3]?>" />
						<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
					</div>
				</td>
				<td class='info'><span class="text-danger text-justify"><strong>*&nbsp;Try It English</strong></span></td>
			</tr>


			
  				<td class="danger" colspan="4" bgcolor="#dddddd" align="center"><span>


  				</span> </td>
  			</tr>
			<tr>
  				<td bgcolor="#f4f4f4" class="warning" colspan="4"align="center" >
				
					<input type="submit" value="Add" name="add" class="btn btn-primary btn-sm" style="width:80px;" />
					<input type="submit" value="Update" name="Update" class="btn btn-primary btn-sm" style="width:80px;"/>
					<input type="submit" value="View" name="View" class="btn btn-primary btn-sm" style="width:80px;"/>
										
					<input type="submit" value="Clear" name="Clear" class="btn btn-primary btn-sm" style="width:80px;"/>
					<input type="submit" value="Exit" name="Exit" class="btn btn-primary btn-sm" style="width:80px;"/>
				</td>
  			</tr>
  	</table>
  	
  	<?php
  	
  	if(isset($_POST["View"]))
  	{
  	    
  	
  	?>
  	
  	<table class="table table-striped table-bordered"> 
  	
  	    <tr>
  	        <td>SL</td>
  	        <td>Class</td>
  	        <td>Period</td>
  	        <td>Subject</td>
  	        <td>Action</td>
  	    </tr>
  	    <?php 
  	    $i=0;
  	    
  	    $sql=$db->link->query("SELECT `add_period`.`id`,`class_id`,`period_name`,`subject_name`,`add_class`.`class_name` FROM `add_period` INNER JOIN `add_class` on `add_class`.`id`=`add_period`.`class_id` ORDER BY `class_id` ASC ");
  	    while($fetch_info=$sql->fetch_array())
  	    {
  	        $i++;
  	    
  	    ?>
  	    <tr>
  	        <td><?php print $i; ?></td>
  	        <td><?php print $fetch_info['class_name']?></td>
  	        <td><?php print $fetch_info[2]?></td>
  	        <td><?php print $fetch_info[3]?></td>
  	        <td>
  	            <a href="add_period.php?edit=<?php print $fetch_info[0]?>" class="btn btn-info"> Edit </a> 
  	            <a href="add_period.php?del=<?php print $fetch_info[0]?>" class="btn btn-danger"> Delete </a> 
  	        
  	        </td>
  	    
  	    </tr>
  	    <?php
  	    }
  	    ?>
  	</table>
<?php
}
?>
	</div>
  	</form>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php

}

?>