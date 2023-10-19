<?php
error_reporting(0);
@session_start();

@date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();

   
	$Name=$_POST["Name"];
	$Name_en=$_POST["Name_en"];
	$birth_nid_no=$_POST["birth_nid_no"];
	$studentMobile=$_POST["studentMobile"];
	//father_info
	$fathersName=$_POST["fathersName"];
	$fathers_name_en=$_POST["fathers_name_en"];
	$father_nid_no=$_POST["father_nid_no"];
	$father_education=$_POST["father_education"];
	$occupation=$_POST["occupation"];
	$job_location=$_POST["job_location"];
	$father_phone=$_POST["father_phone"];
	//mother_info
	$mothersName=$_POST["mothersName"];
	$mothers_name_en=$_POST["mothers_name_en"];
	$mothers_nid_no=$_POST["mothers_nid_no"];
	$mothers_edcuation=$_POST["mothers_edcuation"];
	$mothers_occupation=$_POST["mothers_occupation"];
	$mother_work_place=$_POST["mother_work_place"];
	$mother_mobile_number=$_POST["mother_mobile_number"];
	
	//guardian_info
	
	$guardian_name_bn=$_POST["guardian_name_bn"];
	$guardian_name_en=$_POST["guardian_name_en"];
	$guardian_nid_no=$_POST["guardian_nid_no"];
	$guardian_education=$_POST["guardian_education"];
	$guardian_occupation=$_POST["guardian_occupation"];
	$guardian_job_location=$_POST["guardian_job_location"];
	$guardianMobile=$_POST["guardianMobile"];
	
	//quota
	
	$quota = $_POST["quota"];
	
	//present adress
	$pa_home_name=$_POST["pa_home_name"];
	$pa_village=$_POST["pa_village"];
	$pa_post_office=$_POST["pa_post_office"];
	$pa_upazila=$_POST["pa_upazila"];
	$pa_district=$_POST["pa_district"];
	
	
	//permenant adress
	$ra_home_name=$_POST["ra_home_name"];
	$ra_village=$_POST["ra_village"];
	$ra_post_office=$_POST["ra_post_office"];
	$ra_upazila=$_POST["ra_upazila"];
	$ra_district=$_POST["ra_district"];
	
	$date_of_birth = $_POST["date_of_birth"];
	$nationality = $_POST["nationality"];
	$religion = $_POST["religion"];
	
// 	board_exam_info

    $board_exam_name = $_POST["board_exam_name"];
    $board_exam_passyear = $_POST["board_exam_passyear"];
    $board_exam_institute_name = $_POST["board_exam_institute_name"];
    $board_exam_reg_no = $_POST["board_exam_reg_no"];
    $board_exam_roll_no = $_POST["board_exam_roll_no"];
    $board_exam_session = $_POST["board_exam_session"];
    $board_exam_pass_gpa = $_POST["board_exam_pass_gpa"];
	
	
	// $roll=$_POST["roll"];
	// $regNumber=$_POST["regNumber"];
	$className=explode('and', $_POST["className"]);
	$groupname=explode('and', $_POST["groupname"]);
	$Session=$_POST["Session"];
	$count_subject=count($_POST["subject"]);
	$count_selective=count($_POST["selective"]);
	$optional_subject=$_POST["optional_subject"];
// 	$Name=$_POST["Name"];
	$daeanddTime=date("d-m-Y h:i:sa");
	$reg_phone=$_POST['reg_phone'];
	$fee='2600';
   // echo $_POST["selective"][0];
if(!empty($groupname[0]) && !empty($className[0]) && !empty($Name) && !empty($fathersName) && !empty($mothersName) && !empty($optional_subject) && !empty($guardianMobile) && $count_selective<=3 && $count_selective>=1 && !empty($board_exam_roll_no))
{

	if($groupname[0]=="321710120016")
	{
		//Business Studies

		$prefix=date('y').'6';
		$fee='2500';
	}
	else if($groupname[0]=="321710120017")
	{
		//Humanities
		$prefix=date('y').'1';
		$fee='2500';
	}	
	else if($groupname[0]=="321710120018")
	{
		//Science
		$prefix=date('y').'4';
		$fee='2600';
	}	
	else if($groupname[0]=="322309250032")
	{
		//Computerized Accounting System
		$prefix=date('y').'31';
		$fee='2600';
	}	
	else if($groupname[0]=="322309250034")
	{
		//andDigital-in-Technology
		$prefix=date('y').'33';
		$fee='2600';
	}	
	else if($groupname[0]=="322309250036")
	{
		//andE-Business 
		$prefix=date('y').'34';
		$fee='2600';
	}	
	else if($groupname[0]=="322309250033")
	{
		//andFinancial Practices
		$prefix=date('y').'32';
		$fee='2600';
	}
	else if($groupname[0]=="322309250035")
	{
		//andHuman Resource Development
		$prefix=date('y').'35';
		$fee='2600';
	}
	else
	{
		$prefix=date('y');
	}


  
 
    $id=$db->autogenerat('online_reg_std_info','id','23','8');
    $roll=$db->rollgenerate('online_reg_std_info','roll',$prefix,'6',$groupname[0]);


	$sql="INSERT INTO `online_reg_std_info` (`id`,`roll`,`reg_phone`,`name`,`name_en`,`birth_nid_no`,`fathers_name`,`fathers_name_en`,`father_nid_no`,`father_education`,`occupation`,`job_location`,`father_phone`,`mothers_name`,`mothers_name_en`,`mothers_nid_no`,`mothers_edcuation`,`mothers_occupation`,`mother_work_place`,`mother_mobile_number`,`std_mobile`,`guardian_name_bn`,`guardian_name_en`,`guardian_nid_no`,`guardian_education`,`guardian_occupation`,`guardian_job_location`,`guardian_mobile`,`quota`,`pa_home_name`,`pa_village`,`pa_post_office`,`pa_upazila`,`pa_district`,`ra_home_name`,`ra_village`,`ra_post_office`,`ra_upazila`,`ra_district`,`date_of_birth`,`nationality`,`religion`,`board_exam_name`,`board_exam_passyear`,`board_exam_institute_name`,`board_exam_reg_no`,`board_exam_roll_no`,`board_exam_session`,`board_exam_pass_gpa`,`class`,`group`,`session`,`date`,`reg`)
VALUES('$id','$roll','$reg_phone','$Name','$Name_en','$birth_nid_no','$fathersName','$fathers_name_en','$father_nid_no','$father_education','$occupation','$job_location','$father_phone','$mothersName','$mothers_name_en','$mothers_nid_no','$mothers_edcuation','$mothers_occupation','$mother_work_place','$mother_mobile_number','$studentMobile','$guardian_name_bn','$guardian_name_en','$guardian_nid_no','$guardian_education','$guardian_occupation','$guardian_job_location','$guardianMobile','$quota','$pa_home_name','$pa_village','$pa_post_office','$pa_upazila','$pa_district','$ra_home_name','$ra_village','$ra_post_office','$ra_upazila','$ra_district','$date_of_birth','$nationality','$religion','$board_exam_name','$board_exam_passyear','$board_exam_institute_name','$board_exam_reg_no','$board_exam_roll_no','$board_exam_session','$board_exam_pass_gpa','$className[0]','$groupname[0]','$Session','$daeanddTime','$fee')";

if ($db->link->query($sql) === TRUE) {
	$path='stdimage/'.$id.'.jpg';
	move_uploaded_file($_FILES['file']['tmp_name'],$path);


	for($a = 0; $a < count($_POST["subject"]);$a++){
			$explodecompulsarysubject=explode('codnumber', $_POST['subject'][$a]);
             $inser_compusaray_Subject="INSERT INTO `online_subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$id','".$className[0]."','".$groupname[0]."','".$explodecompulsarysubject[0]."')";
              $db->insert_query($inser_compusaray_Subject);
		}
		
		for($n=0; $n <count($_POST["selective"]); $n++ )
          {
                 $explopide_selective=explode("codenumber",$_POST['selective'][$n]);
                 $insert_select_subject="INSERT INTO `online_subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$id','".$className[0]."','".$groupname[0]."','".$explopide_selective[0]."')";
                   $db->insert_query($insert_select_subject);
          }
			
		if(!empty($_POST["optional_subject"]))
          {
                $insert_optional_Subject="INSERT INTO `online_subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$id','".$className[0]."','".$groupname[0]."','".$_POST["optional_subject"]."')";
                $db->insert_query($insert_optional_Subject);
          }
               $db->link->query("UPDATE `online_applicant_approval_list` SET `status`='1' WHERE `roll`='$board_exam_roll_no'");


          unset($_SESSION['reg_logstatus']);
          print $board_exam_roll_no;
   }
   else
   {
   		 print "0";
   }
}
else
{
	 print "0";
}


?>