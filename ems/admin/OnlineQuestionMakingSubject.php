  <?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
	$msg="";
	$editInfo[0]='';
	$editInfo[1]='';
	$editInfo[2]='';
	$editInfo[3]='';
	$editInfo[4]='';

if(isset($_POST['add']))
	{
		  
                    

		$className=$db->escape($_POST['className']);
		$subject=$db->escape($_POST['subject']);
		$slno=$db->escape($_POST['slno']);
		

		$makeID=$db->withoutPrefix('onlineexamsubject','Subject_ID',"sub-",'8');
		
		
		if(!empty($subject) && !empty($className) && !empty($slno) && $className!="Select Class")
		{
			$query="INSERT INTO `onlineexamsubject`(`Subject_ID`,`Class_ID`,`Subject_Name`,`Serial_No`)  VALUES('$makeID','$className','$subject','$slno')";
			$msg=$db->link->query($query);

			if($msg)
			{
				$msg="<span class='text-center text-success '><strong>&nbsp;Save Successfully!!</strong></span>";
			}
			else
			{
					$msg="<span class='text-center text-danger glyphicon glyphicon-remove'><strong>&nbsp;Save unsuccessfully!!</strong></span>";
			}

		}
		else
		{
			$msg="<span class='text-center text-danger glyphicon glyphicon-remove'><strong>&nbsp;Please Fill Up TextField</strong></span>";
		}
	}

	if(isset($_POST['Edit']))
	{
		             
		$className=$db->escape($_POST['className']);
		$subject=$db->escape($_POST['subject']);
		$slno=$db->escape($_POST['slno']);
		$hiddenID=$db->escape($_POST['hiddenID']);
		
		if(!empty($subject) && !empty($className) && !empty($slno) && !empty($hiddenID) && $className!="Select Class")
		{
			$query="REPLACE INTO `onlineexamsubject`(`Subject_ID`,`Class_ID`,`Subject_Name`,`Serial_No`)  VALUES('$hiddenID','$className','$subject','$slno')";
			$msg=$db->link->query($query);

			if($msg)
			{
				print "<script>location='ViewOnlineExamSubject.php'</script>";
			}
			else
			{
					$msg="<span class='text-center text-danger glyphicon glyphicon-remove'><strong>&nbsp;Save unsuccessfully!!</strong></span>";
			}

		}
		else
		{
			$msg="<span class='text-center text-danger glyphicon glyphicon-remove'><strong>&nbsp;Please Fill Up TextField</strong></span>";
		}
	}


   if(isset($_GET['id']))
    {
        $linid=$db->escape($_GET['id']);

        $query="SELECT * FROM `onlineexamsubject` WHERE `Subject_ID`='$linid'";
       $r=$db->link->query($query);
       if($r)
       {
       			$editInfo=$r->fetch_array();
       		//	print_r($fetch_sub);
       }
       


    }

 
 if(isset($_POST["View"]))
 {
 	print "<script>location='ViewOnlineExamSubject.php'</script>";
 }

 if(isset($_POST["Exit"]))
 {
 	print exit();
 }


 if(isset($_POST["AutoLoad"]))
 	{


 		  $del="DELETE FROM `onlineexamsubject`";
       	  $db->link->query($del);


 		  $q="SELECT `add_subject_info`.`class_id` FROM `add_subject_info` GROUP BY `add_subject_info`.`class_id`";
       	  $result=$db->link->query($q);
	      if($result)
	       {

	       			while($className=$result->fetch_array())
	       			{
	       				$slno=0;
	       				$sub="SELECT `subject_name` FROM `add_subject_info` WHERE `class_id`='$className[0]'  GROUP BY `subject_name` order by `serial` asc";

	       			

		       			$s=$db->link->query($sub);
		       			if($s)
		       			{
		       					while($subject=$s->fetch_array())
		       					{
		       						$slno++;

		       						$makeID=$db->withoutPrefix('onlineexamsubject','Subject_ID',"sub-",'8');
		       					  	$query="INSERT INTO `onlineexamsubject` (`Subject_ID`,`Class_ID`,`Subject_Name`,`Serial_No`) VALUES('$makeID','$className[0]','$subject[0]','$slno')";
									$db->link->query($query);

								

		       					}
		       		
		       			}

	       			}
	       		
	       }
 				

 	}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Online Question Making Subject</title>
	
	
	
  <script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
	  <script src="textEdit/redactor/redactor.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">

   
     <script src="datespicker/bootstrap-datepicker.js"></script>
	 
	     <script src="../js/bootstrap.min.js"></script>
	 <script type="text/javascript">
	 
	 
	    $(document).ready(function () {
                    
                    $('#example1').datepicker({
                        format: "dd-mm-yyyy"
                    });  
                
                });
				
				
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

	
		

</script>
   <script type="text/javascript">
    function Confirm_Click_Delete()
    {
      var con=confirm("Are you confirm Click?");
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

    </head>

  <body>
  	<form name="teacherinfo" action="" method="post"  enctype="multipart/form-data" class="form-horizontal marksEditEntry" >
            <div class="col-md-8 col-md-offset-2" id="AddMarksStep1"><br/> <br/>
                <span class="glyphicon glyphicon-arrow-right text-justify text-uppercase text-warning" style="font-weight: bold; padding-top: 15px; font-size: 18px;">
                <strong style="padding-left:5px; text-transform: capitalize;">Online Question Making Subject</strong></span><br/>
			
                <table class="table table-responsive table-hover table-bordered" style="margin-top:10px;">
                    <tr>
                    	<td ><strong><span class="text-success" style="font-size: 15px;">Select Class</span></strong></td>
                        <td ><div class="col-md-8">

                        		<input type="hidden" name="hiddenID" value="<?php print $editInfo[0];?>"></input>

                        <select class="form-control" name="className" id="className" style="width:280px; border-radius:0px;">
                       
                       		<?php
                       		if($editInfo[1]!="")
                        	{
                        		$s="SELECT `onlineexamsubject`.*,`add_class`.`class_name` FROM `onlineexamsubject`
INNER JOIN `add_class` ON `add_class`.`id`=`onlineexamsubject`.`Class_ID`
WHERE `Subject_ID`='$editInfo[0]'";
										$rr=$db->link->query($s);
										$fetch_subName=$rr->fetch_array();

                        		print "<option value='$editInfo[1]'>$fetch_subName[4]</option>";
                        	}
                        	else
                        	{
                        		print "<option>Select Class</option>";
                        	}

                       		?>
                        

                        <?php 
                        	
                            $select_class="SELECT * FROM `add_class` GROUP BY `id` ORDER BY `index` ASC";
                            $check_query=$db->select_query($select_class);
                            if($check_query){
                                while($fetch_class=$check_query->fetch_array())
                                {
                        ?>
                        <option value="<?php echo "$fetch_class[0]"?>"><?php echo $fetch_class[2];?></option><span id="item_result"></span>
                        <?php } } else {?>
                        <option></option>
                        <?php } ?>
                        </select></div>
                    </tr>

   					 <tr>
                    	
						<td ><strong><span class="text-success" style="font-size: 15px;">Subject Name</span></strong></td>
                        <td ><div class="col-md-8">
						 <input class="form-control" type="text" name="subject"  value="<?php print $fetch_subName[2]; ?>" style="width:280px; border-radius:0px;">
						 </div></td>
					</tr>
						 <tr>
                    	
						<td ><strong><span class="text-success" style="font-size: 15px;">SL. NO.</span></strong></td>
                        <td ><div class="col-md-8">
						 <input class="form-control" type="number" name="slno" value="<?php print $fetch_subName[3]; ?>"  style="width:280px; border-radius:0px;">
						 </div></td>
					</tr>
					
                <tr>
            
             <td colspan="2" align="left"><br>
                <br>

                <input type="submit" name="add" value="Add" class="btn btn-success btn-md" style="width: 150px" ></input>

                <input type="submit" name="Edit" value="Edit" class="btn btn-seconday btn-md" style="width: 150px" onclick="return Confirm_Click_Delete()" ></input>
                <input type="submit" name="View" value="View" class="btn btn-primary btn-md" style="width: 150px" formtarget="_blank" ></input>
                <input type="submit" name="AutoLoad" value="AutoLoad" class="btn btn-info btn-md" style="width: 150px" onclick="return Confirm_Click_Delete()" disabled></input>
                <input type="submit" name="Exit" value="Exit" class="btn btn-danger btn-md" style="width: 150px" 
                onclick="return Confirm_Click_Delete()"></input>


				</td></tr>
				
                </table>
							
                </div>
				
				 <div class="col-md-10 col-md-offset-1" id="showdata">
				 <?php print $msg; ?>
				 
				 </div>
		
     </form>

 
       



  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
