
<?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
     require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();

if(isset($_POST['className']))
{
	$_SESSION["class"]=$_POST['className'];
	$_SESSION["group"]=$_POST['groupname'];
	$_SESSION["session"]=$_POST['Session1'];
	$limit=10;
}

if(isset($_POST["Add"]))
{
		$_POST["stdtotal"]=5;
		$count=count($_POST["stdName"]);

		$explode_Class=explode('and', $_SESSION["class"]);
		//print $explode_Class[1] ;
		$group=explode('and', $_SESSION["group"]);
		$session=$_SESSION["session"];




		
			
				if($explode_Class[1] == "One"){
					
						 $cls = "01";
					}
					else if($explode_Class[1] == "Two"){
					
						 $cls = "02";
					}else if($explode_Class[1] == "Three"){
					
						 $cls = "03";
					}else if($explode_Class[1] == "Four"){
					
						 $cls = "04";
					}
					else if($explode_Class[1] == "Five"){
					
						 $cls = "05";
					}	elseif($explode_Class[1] == "Six"){
					
						 $cls = "06";
					}

					else if($explode_Class[1] == "Seven"){
						 $cls = "07";
					}

					else if($explode_Class[1] == "Eight"){
						 $cls = "08";
					}

					else if($explode_Class[1] == "Nine"){
						 $cls = "09";
					}

					else if($explode_Class[1] == "Ten"){
						 $cls = "10";
					}

		  $substronly2 =  date('y'); 
   		 
		
			


		for($i=0;$i<$count;$i++)
		{
			if(isset($_POST["stdName"][$i]))
			{

			    $MakeID=$db->NeAdmisiion('student_personal_info','id',$substronly2.$cls,'8');
		

	   @$personal_insert_query="INSERT INTO `student_personal_info` (`id`,`addmission_date`,`student_name`,`father_name`,`mother_name`,`gender`,`date_of_brith`,`religious`) VALUES('".$MakeID."','".date('d-m-Y')."','".$_POST['stdName'][$i]."','".$_POST['stdFatherName'][$i]."','".$_POST['stdMotherName'][$i]."','".$_POST['gender'][$i]."','".$_POST['birth'][$i]."','".$_POST['Religion'][$i]."')";
         
         	//print $personal_insert_query.'<br>';		
 //
        
        @$previousresult_insert_query="INSERT INTO student_previous_result (`id`) VALUES ('".$MakeID."')";
    
// print "<br><br>".$previousresult_insert_query."<br>///////////////////////";
        @$studentaddress_insert_query="INSERT INTO student_address_info (id) VALUES('".$MakeID."')";
     //   print "<br><br>".$studentaddress_insert_query."<br>///////////////////////";
        
        @$student_gurdient_informaiton="INSERT INTO `student_guardian_information` (`id`,`guardian_contact`) VALUES ('".$MakeID."','".$_POST['phone'][$i]."')";
                //print "<br><br>".$student_gurdient_informaiton."<br>///////////////////////";

        @$student_academic_information="INSERT INTO student_acadamic_information (`id`,`admission_disir_class`,`admission_disir_group`,`session2`) VALUES ('".$MakeID."','$explode_Class[0]','$group[0]','".$session."')";
                    // print "<br><br>".$student_academic_information."<br>///////////////////////";
        
            $db->link->query($student_academic_information);
             $db->link->query($student_gurdient_informaiton);
             $db->link->query($studentaddress_insert_query);
              $db->link->query($personal_insert_query);
              $db->link->query($previousresult_insert_query);

             $$msg="Save Successfully!!";
		}
	}

		



}

if(isset($_POST["stdtotal"]))
		{
			$limit=$_POST["stdtotal"];

			
		}
		else
		{
			$limit=5;
		}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>   
    <script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
            
    <link rel="stylesheet" href="datespicker/datepicker.css">
     <script src="datespicker/bootstrap-datepicker.js"></script>

     <script type="text/javascript">
         $(document).ready(function()
          {
               document.getElementById("Add").disabled = false;
            
         });

      // function adddata()
      // {
      // 		document.getElementById("Add").disabled = true;
      // }

     </script>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <form method="post">

<table class="table table-hover  bg-danger">

		<tr>
			<td>Class </td>
			<td> : </td>
			<td> <?php  $c=explode('and', $_SESSION["class"]); print $c[1]; ?> </input> </td>

			<td>Group </td>
			<td> : </td>
			<td> <?php  $g=explode('and', $_SESSION["group"]); print $g[1]; ?>    </td>

			<td>Session </td>
			<td> : </td>
			<td> <?php print @$_SESSION["session"]; ?>  </td>


		</tr>

		<tr>
			<td colspan="9" align="center" class="bg-success"> <label> <input type="text" value="<?php print $limit;?>"  style="max-width: 200" class="form-control " name="stdtotal"></input></label> <label> <input type="submit" name="show" value="Show" class="btn btn-success"></input></label></td>
			


		</tr>


	
</table>

<table class="table table-bordered"> 
		<tr>
			<td>Name</td>
			<td>Father's Name</td>
			<td>Mother's Name</td>
		
			<td>Date of Birth</td>
			<td>Phone Number</td>
				<td>Gender</td>
			<td>Religion</td>
		</tr>

<?php

	
			for($i=0;$i<$limit;$i++)
			{

			

?>
		<tr>
			

			<td><input type="text" name="stdName[]" placeholder=" Student Name" class="form-control" autocomplete="off"></input>  </td>


			<td><input type="text" name="stdFatherName[]" placeholder=" Father's Name" class="form-control" autocomplete="off"></input>  </td>
			<td> <input type="text" name="stdMotherName[]" placeholder=" Mother's Name" class="form-control" autocomplete="off"></input> </td>
			


			<td><input type="text" name="birth[]" placeholder="Day-Month-Year" class="form-control" autocomplete="off"></input></td>
		

			<td><input type="text" name="phone[]" placeholder=" Phone " class="form-control" autocomplete="off"></input> 
			</td>

<td>
					<select name="gender[]" class="form-control"> 
					<option>Male</option>
					<option>Female</option>

					</select>
			</td>

			<td>
				<select name="Religion[]" class="form-control"> 
						<option>Islam</option>
                        <option>Hindu</option>
                        <option>Chiristian</option>
                        <option>Buddha  </option>
                        
				</select>
			</td>

		</tr>



<?php
}



?>

<tr>
		<td align="center" colspan="7"> <input type="submit" name="Add" value="Add" class="btn btn-success btn-large" style="width: 200px;" onclick="return adddata()" id="Add"></input></td>
</tr>

  <tr>
                <td class="danger" colspan="7" bgcolor="#dddddd" align="center"><span>
                    <?php 
                        if(isset($msg))
                        {
                            echo "<strong>".$msg."</strong>";
                        }
                       
                    ?>

                </span> </td>
            </tr>

</table>



</form>

    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
