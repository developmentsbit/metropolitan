
<?php
@session_start();
error_reporting(0);
@date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");

$db = new database();

$select_school="select * from project_info";
$cheke_school=$db->select_query($select_school);
if($cheke_school)
{
$fetch_school_information=$cheke_school->fetch_array();
}



if(isset($_POST['add']))
    {


        $stdpic=$_FILES["file"]["name"];
          
        $certificatee=$_FILES["certificatee"]["name"];
          
         if($stdpic=="")
         {
                 print "<script>alert('Please Upload Picture & Document')</script>";
         }
            
     //print $_POST['addmissiondate'];
        $classname=$db->escape(isset($_POST['className'])?$_POST['className']:"");
        @$explode_Class=explode("and",$classname);
        //print_r($explode_Class);
        $class_section=$db->escape(isset($_POST['groupname'])?$_POST['groupname']:"");
        @$exploide_gropu=explode("and",$class_section);

        $prefix=date("y");
        $fetch_Student[0]=$db->withoutPrefix('reg_student_personal_info','id',$prefix,'6');
       
        
        $c=substr($fetch_Student[0], "3");

        $d=base64_encode(date('s'));

        $p=substr($d, '0','2');

        $pp  = base64_encode($c);


        $passward=$pp.$p;
      


        //print_r($exploide_gropu);
        if(!empty($_POST["studentname"]) && !empty($_POST["gender"]) && !empty($_POST["fathername"]) && !empty($_POST["mothersname"]) && !empty($_POST["GuardianContactNo"]) && !empty($_POST["GuardianName"]) && !empty($_POST["prehouseno"]) && $explode_Class[1]!="" && $stdpic!="" )
        {

                $file_name = $_FILES['file']['name'];
                $file_size =$_FILES['file']['size'];
                $file_tmp =$_FILES['file']['tmp_name'];
                $file_type=$_FILES['file']['type']; 
                  
                $file_ext=@strtolower(end(explode('.',$file_name)));
                
                $expensions= array("jpeg","jpg","png",'PNG',"JPG"); 
                if(in_array($file_ext,$expensions) == false && $file_size > 360000){
                    //$msg="<span class='text-center text-danger'>extension not allowed, and check your image less then 360kb.</span>";
            print "<script>alert('extension not allowed, and check your image less then 360kb')</script>";
                }   else {  
         @$personal_insert_query="INSERT INTO `reg_student_personal_info` (`id`,`addmission_date`,`student_name`,`father_name`,`mother_name`,`gender`,
     `date_of_brith`,`religious`,`meritial_status`,`blood_group`,`nationality`,`contact_no`,`email`) VALUES('".$fetch_Student[0]."','".$_POST['addmissiondate']."','".$_POST['studentname']."','".$_POST['fathername']."','".$_POST['mothersname']."','".$_POST['gender']."','".$_POST['dateofbrith']."','".$_POST['religious']."','".$_POST['meritelstutas']."','".$_POST['blood']."','".$_POST['Nationality']."','".$_POST['Contactno']."','".date('Y')."')";
       
      $previousresult_insert_query="INSERT INTO reg_student_previous_result 
        (id,psc_board, psc_institute, psc_registration,  psc_Year, psc_roll, psc_group, psc_GPA, psc_passing_year,jsc_board,jsc_institute,jsc_registration,jsc_Year,jsc_roll, jsc_group, jsc_GPA, jsc_passing_year,  ssc_board, ssc_institute, ssc_registration, ssc_Year, ssc_roll, ssc_group, ssc_GPA, ssc_passing_year) values ('".$fetch_Student[0]."','".$_POST['selectClass']."','".$_POST['pscinstitute']."','".$_POST['pscregno']."','".$_POST['pscyear']."','".$_POST['pscroll']."','".$_POST['pscgroup']."','".$_POST['pscgradepoint']."','".$_POST['pscpassingyear']."','".$_POST['jscboard']."','".$_POST['jscinstitute']."','".$_POST['jscregno']."','".$_POST['jscyear']."','".$_POST['jscroll']."','".$_POST['jscgroup']."','".$_POST['jscgradepoint']."','".$_POST['jscpassingyear']."','".$_POST['sscboard']."','".$_POST['sscinstitue']."','".$_POST['sscregno']."','".$_POST['sscyear']."','".$_POST['sscroll']."','".$_POST['sscgroup']."','".$_POST['ssgradepoint']."','".$_POST['sscpassingyear']."')";

        $studentaddress_insert_query="INSERT INTO reg_student_address_info (id, present_house_name, present_village, present_PO, present_post_code, present_upazila, present_distric,permanent_house_name, permanent_village, permanent_PO, permanent_post_code, permanent_upazila, permanent_distric)VALUES('".$fetch_Student[0]."','".$_POST['prehouseno']."','".$_POST['previlll']."','".$_POST['prepo']."','".$_POST['prepostcode']."','".$_POST['preupazilla']."','".$_POST['predistric']."','".$_POST['parhose']."','".$_POST['parvill']."','".$_POST['parpo']."','".$_POST['parpostcode']."','".$_POST['parupazilla']."','".$_POST['pardistric']."')";
        
        @$student_gurdient_informaiton="INSERT INTO `reg_student_guardian_information` (`id`,`guardian_name`,`guardian_house_name`,`guardian_village`,`guardian_po`,`guardian_postCode`,`guardian_upazila`,`guardian_distric`,`relation_with_student`,`guardian_contact`,`guardian_email`) VALUES ('".$fetch_Student[0]."','".$_POST['GuardianName']."','".$_POST['grahouseno']."','".$_POST['gravilll']."','".$_POST['grapo']."','".$_POST['grapostcode']."','".$_POST['graupazilla']."','".$_POST['gradistrict']."','".$_POST['RelationWithStudent']."','".$_POST['GuardianContactNo']."','".$_POST['GuardianEmail']."')";

        

        @$student_academic_information="INSERT INTO reg_student_acadamic_information (id, admission_disir_class, admission_disir_group, regular_iregular, caues, session2, tc_orderNo, date) VALUES ('".$fetch_Student[0]."','$explode_Class[0]','$exploide_gropu[0]','".$_POST['regularirregular']."','".$_POST['Cause']."','".$_POST['Session1']."','".$_POST['tcorderno']."','".$_POST['academicdate']."')";
        
    $studnetPasswardInfor="INSERT INTO `reg_student_passward`(`studentId`,`passward`,`status`) VALUES('".$fetch_Student[0]."','$passward','Deactive')";
    /*}*/
  $strfimg="../other_img/".$fetch_Student[0].".jpg";
  @move_uploaded_file($_FILES["file"]["tmp_name"],$strfimg);
        @chmod($strfimg,0644);

    $tcimg="../other_img/".$fetch_Student[0]."tc.jpg";
  @move_uploaded_file($_FILES["certificatee"]["tmp_name"],$tcimg);
        @chmod($tcimg,0644);
    
    
    $db->insert_query($student_academic_information);
        $db->insert_query($student_gurdient_informaiton);
        $db->insert_query($studentaddress_insert_query);
        $db->insert_query($personal_insert_query);
        $db->insert_query($previousresult_insert_query);
     $db->insert_query($studnetPasswardInfor);
       
     print "<script>location='student_Login_ID_Password.php?id=$fetch_Student[0]'</script>";
         $fetch_Student[0]=$db->withoutPrefix('reg_student_personal_info','id',$prefix,'6');
      //  $strfimg=
    //print "../../other_img/".$fetch_Student[0].".jpg";
      
    
}

    
  
  }
    else
    {
        print "<script>alert('Please Fill Up TextField')</script>";
    }
    }
    

if(isset($_POST['Preview']))
    {


       
          
     //print $_POST['addmissiondate'];
        $classname=$db->escape(isset($_POST['className'])?$_POST['className']:"");
        @$explode_Class=explode("and",$classname);
        //print_r($explode_Class);
        $class_section=$db->escape(isset($_POST['groupname'])?$_POST['groupname']:"");
        @$exploide_gropu=explode("and",$class_section);

        $prefix=date("y");
        $fetch_Student[0]=$db->withoutPrefix('preview_reg_student_personal_info','id',$prefix,'6');
        
         $pass=date('s');
         $passward  = base64_encode($pass);
      


        //print_r($exploide_gropu);
        if(!empty($_POST["studentname"]))
        {

                $file_name = $_FILES['file']['name'];
                $file_size =$_FILES['file']['size'];
                $file_tmp =$_FILES['file']['tmp_name'];
                $file_type=$_FILES['file']['type']; 
                  
                $file_ext=@strtolower(end(explode('.',$file_name)));
                
                $expensions= array("jpeg","jpg","png",'PNG',"JPG"); 
                if(in_array($file_ext,$expensions) == false && $file_size > 360000){
                    //$msg="<span class='text-center text-danger'>extension not allowed, and check your image less then 360kb.</span>";
            print "<script>alert('extension not allowed, and check your image less then 360kb')</script>";
                }   else {  
                    
                    @$personal_insert_query=" INSERT INTO `preview_reg_student_personal_info`(`id`, `addmission_date`, `student_name`, `father_name`, `mother_name`, `gender`, `date_of_brith`, `religious`, `meritial_status`, `blood_group`, `nationality`, `contact_no`, `email`) 
                    VALUES ('".$fetch_Student[0]."','".$_POST['addmissiondate']."','".$_POST['studentname']."','".$_POST['fathername']."','".$_POST['mothersname']."','".$_POST['gender']."','".$_POST['dateofbrith']."','".$_POST['religious']."','".$_POST['meritelstutas']."','".$_POST['blood']."','".$_POST['Nationality']."','".$_POST['Contactno']."','".date('Y')."')";
       
       
      @$previousresult_insert_query="INSERT INTO `preview_reg_student_previous_result`(`id`, `psc_board`, `psc_institute`, `psc_registration`, `psc_Year`, `psc_roll`, `psc_group`, `psc_GPA`, `psc_passing_year`, `jsc_board`, `jsc_institute`, `jsc_registration`, `jsc_Year`, `jsc_roll`, `jsc_group`, `jsc_GPA`, `jsc_passing_year`, `ssc_board`, `ssc_institute`, `ssc_registration`, `ssc_Year`, `ssc_roll`, `ssc_group`, `ssc_GPA`, `ssc_passing_year`) values ('".$fetch_Student[0]."','".$_POST['selectClass']."','".$_POST['pscinstitute']."','".$_POST['pscregno']."','".$_POST['pscyear']."','".$_POST['pscroll']."','".$_POST['pscgroup']."','".$_POST['pscgradepoint']."','".$_POST['pscpassingyear']."','".$_POST['jscboard']."','".$_POST['jscinstitute']."','".$_POST['jscregno']."','".$_POST['jscyear']."','".$_POST['jscroll']."','".$_POST['jscgroup']."','".$_POST['jscgradepoint']."','".$_POST['jscpassingyear']."','".$_POST['sscboard']."','".$_POST['sscinstitue']."','".$_POST['sscregno']."','".$_POST['sscyear']."','".$_POST['sscroll']."','".$_POST['sscgroup']."','".$_POST['ssgradepoint']."','".$_POST['sscpassingyear']."')";


        @$studentaddress_insert_query="INSERT INTO `preview_reg_student_address_info`(`id`, `present_house_name`, `present_village`, `present_PO`, `present_post_code`, `present_upazila`, `present_distric`, `permanent_house_name`, `permanent_village`, `permanent_PO`, `permanent_post_code`, `permanent_upazila`, `permanent_distric`) VALUES('".$fetch_Student[0]."','".$_POST['prehouseno']."','".$_POST['previlll']."','".$_POST['prepo']."','".$_POST['prepostcode']."','".$_POST['preupazilla']."','".$_POST['predistric']."','".$_POST['parhose']."','".$_POST['parvill']."','".$_POST['parpo']."','".$_POST['parpostcode']."','".$_POST['parupazilla']."','".$_POST['pardistric']."')";
   
        @$student_gurdient_informaiton="INSERT INTO `preview_reg_student_guardian_information`(`id`, `guardian_name`, `guardian_house_name`, `guardian_village`, `guardian_po`, `guardian_postCode`, `guardian_upazila`, `guardian_distric`, `relation_with_student`, `guardian_contact`, `guardian_email`)  VALUES ('".$fetch_Student[0]."','".$_POST['GuardianName']."','".$_POST['grahouseno']."','".$_POST['gravilll']."','".$_POST['grapo']."','".$_POST['grapostcode']."','".$_POST['graupazilla']."','".$_POST['gradistrict']."','".$_POST['RelationWithStudent']."','".$_POST['GuardianContactNo']."','".$_POST['GuardianEmail']."')";

     

        @$student_academic_information="INSERT INTO preview_reg_student_acadamic_information (id, admission_disir_class, admission_disir_group, regular_iregular, caues, session2, tc_orderNo, date) VALUES ('".$fetch_Student[0]."','$explode_Class[0]','$exploide_gropu[0]','".$_POST['regularirregular']."','".$_POST['Cause']."','".$_POST['Session1']."','".$_POST['tcorderno']."','".$_POST['academicdate']."')";
        
    $studnetPasswardInfor="INSERT INTO `preview_reg_student_passward`(`studentId`,`passward`,`status`) VALUES('".$fetch_Student[0]."','$passward','Deactive')";
    /*}*/
  $strfimg="../other_img/".$fetch_Student[0].".jpg";
  @move_uploaded_file($_FILES["file"]["tmp_name"],$strfimg);
        @chmod($strfimg,0644);

    $tcimg="../other_img/".$fetch_Student[0]."tc.jpg";
  @move_uploaded_file($_FILES["certificatee"]["tmp_name"],$tcimg);
        @chmod($tcimg,0644);
    
    
    $db->insert_query($student_academic_information);
        $db->insert_query($student_gurdient_informaiton);
        $db->insert_query($studentaddress_insert_query);
        $db->insert_query($personal_insert_query);
        $db->insert_query($previousresult_insert_query);
     $db->insert_query($studnetPasswardInfor);
       
         print "<script>location='preview.php?id=$fetch_Student[0]'</script>";
         //$fetch_Student[0]=$db->withoutPrefix('preview_reg_student_personal_info','id',$prefix,'6');
  
      
      //  $strfimg=
    //print "../../other_img/".$fetch_Student[0].".jpg";
      
    
}

    
  
  }
    else
    {
        print "<script>alert('Please Fill Up TextField')</script>";
    }
    }
    


  
    
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <meta name="Description" content="<?php echo $fetch_school_information['meta_tag'] ?>" />
     <title><?php print $fetch_school_information['title'] ?></title>
    <link rel="shortcut icon" href="../../admin/all_image/<?php echo "shortcurt_iconSDMS2015";?>.png" />

  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  
  
   <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">

   
     <script src="datespicker/bootstrap-datepicker.js"></script>
    <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
   
  <script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script type="text/javascript" src="js/jquery.multipurpose_tabcontent.js"></script>
    <script type="text/javascript">
       function  confirmClick()
        {
            var con=confirm("Are you sure you will submit finally? After submission you can't change any information.");
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
     $(document).ready(function()
  {
        var checking_html = '<img src="search_group/loading.gif" /> Checking...';
        $('#className').change(function()
        {
            $('#item_result').html(checking_html);
                check_availability();
        }); 
  });

//function to check username availability   
function check_availability()
{
  // alert('ddd');
        var class_name = $('#className').val();
        $.post("check_grou_name.php", { className: class_name },
            function(result){
                //if the result is 1
                if(result !=1 )
                {
                    //show that the username is available
          //alert(result);
                    $('#groupname').html(result);
                    $('#item_result').html("");
                    $('#category_result').html('');
                }
                else
                {
                    //show that the username is NOT available
                    $('#category_result').html('No Group Name Found');
                    $('#item_result').html("");
                    $('#groupname').html('');
                }
        });

}  

 $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
          
                }).on('changeDate', function(e){
          $(this).datepicker('hide');
          
        });  
            
            });
  </script>

  <script type="text/javascript">





  function sameAddress()
  {

      var checkBox = document.getElementById("check");

      var prehouseno = $('#prehouseno').val();
      var previlll = $('#previlll').val();
      var prepo = $('#prepo').val();
      var prepostcode = $('#prepostcode').val();
      var preupazilla = $('#preupazilla').val();
      var predistric = $('#predistric').val();

      if (checkBox.checked == true)
        {
                $('#parhose').val(prehouseno);
                $('#parvill').val(previlll);
                $('#parpo').val(prepo);
                $('#parpostcode').val(prepostcode);
                $('#parupazilla').val(preupazilla);
                $('#pardistric').val(predistric);
        } 
        else 
        {
              $('#parhose').val("");
              $('#parvill').val("");
              $('#parpo').val("");
              $('#parpostcode').val("");
              $('#parupazilla').val("");
              $('#pardistric').val("");
        }

  }
      
    
















  </script>
<style>
body {
  margin: 0;
  padding: 0;
  font-family: 'Open Sans', sans-serif;
  font-size: 14px;
  overflow-x: hidden;
}

.wrapper {
  max-width: 1200px;
  margin: 150px auto;
  margin-top:20px;
}

.wrapper > h1 { text-align: center; }

.wrapper > h1 span {
  border-bottom: 2px solid #49a4d9;
  display: inline-block;
  padding: 0 10px 10px;
  color: #49a4d9;
  transition: all 0.5s linear;
}

ul, li {
  margin: 0;
  padding: 0;
  list-style: none;
}

@media only screen and (max-device-width: 480px) {
.formediaFrast {
        height:1800px;
}
  }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        
        $(".first_tab").champ({
                plugin_type :  "tab",
                side : "",
                active_tab : "1",
                controllers : "true",
                ajax : "true",
                show_ajax_content_in_tab : "5",
          content_path : "html.php"
      });
        
      

      $(".accordion_example").champ({
                plugin_type :  "accordion",
                side : "left",
                active_tab : "3",
                controllers : "true"
      });

      $(".second_tab").champ({
                plugin_type :  "tab",
                side : "right",
                active_tab : "1",
                controllers : "false"
      });

      $(".third_tab").champ({
                plugin_type :  "tab",
                side : "",
                active_tab : "5",
                controllers : "true",
                ajax : "true",
                show_ajax_content_in_tab : "5",
                content_path : "html.txt"
      });
        
    });
    

    


    function viewShowImage(e){
    var file = e.files[0];
      var imagefile = file.type;    
      var type = ["image/jpeg","image/png","image/jpg"];
      if(imagefile==type[0] || imagefile==type[1] || imagefile==type[2]){
        var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(e.files[0]);
      }else{
        alert("Please select a vild image");
      }
            function imageIsLoaded(e) {
                $("#file").css('border-color','GREEN');
        //$("#textt").text("Selected Image : ");
                $("#preview").attr('src',e.target.result);
        $("#preview").css('height','60px');
            }
      }
      $(":file").filestyle();


      function viewShowImage2(e){
    var file = e.files[0];
      var imagefile = file.type;        
      var type = ["image/jpeg","image/png","image/jpg"];
      if(imagefile==type[0] || imagefile==type[1] || imagefile==type[2]){
        var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(e.files[0]);
      }else{
        alert("Please select a vild image");
      }
            function imageIsLoaded(e) {
                $("#certificate").css('border-color','GREEN');
        //$("#textt").text("Selected Image : ");
                $("#preview2").attr('src',e.target.result);
        $("#preview2").css('height','60px');
            }
      }
      $(":file").filestyle2();

  </script>
</head>

<body>

  <div class="jumbotron bg-primary">
  <div class="container  ">
        <label class="checkbox-inline">
          <img src="../admin/all_image/logoSDMS2015.png" style="height: 60px; text-align: right;" class="img-responsive" >
        </label>
  <label class="checkbox-inline">
  <h4 style="text-shadow:  0px 3px 3px #999;">  <?php print $fetch_school_information['institute_name'] ?></h4>

            
  <h5>          
    (Application Form)</h5>
    </label>
  </div>
   </div>
  <div class="container" style="">
      <form name="signfrom"  method="post" class="form-horizontal" enctype="multipart/form-data" >


    <div class="tab_wrapper first_tab">
      <ul class="tab_list">
        <li class="active">Personal Information</li>
        <li>Academic Information</li>
        <li>Address</li>
        <li>Guardian's Information</li>
      </ul>
    <div class="content_wrapper">
      <div class="tab_content active formediaFrast" style="min-height:500px;max-height:1000px;">

          <progress style="width:100%; background:#F1123F; height:10px;" class="progress progress-striped progress-success"  role="progressbar" value="25" max="100"></progress>
              
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 table-bordered" style="border-top:0px;">
                  <table  class="table" style="min-height: 400px; ">
                      <tr>
                          <td>

                    <div class="form-group">
                            <label >Apply Date :</label>  <strong class="text-danger">  </strong>
                           <input type="text" class="form-control"  placeholder="dd-mm-yy" id="example1" name="addmissiondate"  value="<?php print date('d-m-Y'); ?>" readonly />
                          

                    </div>



                     <div class="form-group">
                        <label >Student's Name :</label><strong class="text-danger"> ** </strong>

                              <input type="text"  placeholder="Student's Name"  name="studentname" class="form-control"   <?php if (isset($_POST["studentname"])) {?>
                                    value='<?php echo $_POST["studentname"];?>' <?php  } ?>  /> 
                      </div>


 <div class="form-group">
    <label >Gender :</label><strong class="text-danger"> ** </strong>

<br>
<label class="radio-inline">
  <input type="radio" name="gender" class="radio-inline" value="Male"  <?php if (isset($_POST["gender"])) {
                    if($_POST["gender"]=="Male"){?>
                checked="checked"
            <?php  } } ?> /> Male
</label>


<label class="radio-inline">
  <input type="radio" name="gender" class="radio-inline" value="Female" <?php if (isset($_POST["gender"])) {
                    if($_POST["gender"]=="Female"){?>
                checked="checked"
            <?php  } } ?> /> Female 
</label>



          
                        
  </div>


<div class="form-group">
  
     <label> Religion : </label><strong class="text-danger"> ** </strong>

<select  class="form-control"  name="religious">
                    <?php if (isset($_POST["religious"])) {?>
                <option><?php echo $_POST["religious"];?></option>
            <?php  } ?> 
                    
                        <option>Select One</option>
                        <option>Islam</option>
                        <option>Hindu</option>
                        <option>Buddha</option>
                        <option>Christian</option>
                        
                        <option>Other</option>
                    </select>

</div>


<div class="form-group">
      <label>Blood Group :</label>

<select class="form-control" name="blood">
                     <?php if (isset($_POST["blood"])) {?>
                <option><?php echo $_POST["blood"];?></option>
            <?php  } ?> 
                    
                        <option>Select One</option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>O+</option>
                        <option>O- </option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                    </select>

                    <input type="hidden" name="meritelstutas" class="radio-inline" value="unmarried"> 

</div>
 






          </td> 
      </table>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 table-bordered"  style="border-top:0px;">
              
            <table  class="table" style="min-height: 400px;" >
              <tr>
                <td>



 <div class="form-group" >
    <label >Father's Name :</label> <strong class="text-danger" >**</strong>
  
    <input type="text" class="form-control" placeholder="Father's Name" name="fathername" style="height:30px; width:100%; margin-top:5px;" <?php if (isset($_POST["fathername"])) {?>
                value='<?php echo $_POST["fathername"];?>'
            <?php  } ?>  />

  </div>


 <div class="form-group" >
    <label >Mother's Name :</label> <strong class="text-danger" >**</strong>
  
    <input type="text" class="form-control" placeholder="Mother's Name" name="mothersname"  style="height:30px; width:100%; margin-top:5px;"  <?php if (isset($_POST["mothersname"])) {?>
                value='<?php echo $_POST["mothersname"];?>'
            <?php  } ?>  />

  </div>

 <div class="form-group" >
    <label >Date of birth :</label> <strong class="text-danger" >**</strong>
  
  <input type="date" class="form-control" placeholder="dd-mm-yy" name="dateofbrith" style="height:30px; width:100%; margin-top:5px;" id="example2" <?php if (isset($_POST["dateofbrith"])) {?>
                value='<?php echo $_POST["dateofbrith"];?>'
            <?php  } ?>  />

  </div>


<input type="hidden" placeholder="Nationality" name="Nationality" value="Bangladeshi"/>
<input type="hidden" class="form-control" placeholder="example@gmail.com" name="Email">
<input type="hidden" class="form-control" placeholder="Contact No." name="Contactno">




  <div class="form-group">
    <label> Image :</label>
<br>
<label style="float: left; clear: right;">
    <input  type="file" class="filestyle" name="file" accept="image/*" id="file" onChange="viewShowImage(this)"></input>
    </label>
    <label>
    <img src="../admin/all_image/Noimage.png" class='img-thumbnail img-responsive' style="height:100px; width:100px;" id="preview"  />
    </label>
</div>




                              
                          </td>
                      </tr> 
                        
                      
                  </table>
              
              </div>
          
          
          </div>

        
        
        
        <div class="tab_content" style="min-height:1250px;">
        <progress style="Width:100%;background:#F0A924; height:10px;" class="progress progress-striped progress-success" value="50" max="100"></progress>
          
          <div class="table-bordered col-lg-12  col-md-12 col-xs-12" style="min-height:1150px; ">
            

      <h2 style=" display: block; padding:5px 0px 5px 10px;">
      Admission Desire(Class):</h2>

          
<hr>


<div class="col-lg-12  col-md-12 col-xs-12"  style="padding-top: 10px;">
              
              <div class="form-group col-lg-4 col-md-4">
                <label >Select Class :</label> <strong class="text-danger"> ** </strong>
          

                   <select name="className" class="form-control" id="className" style="max-width: 300px;">

                                  <?php if (isset($_POST["className"])) {?>
                <option value="<?php echo $_POST["className"];?>"><?php
                 $x=explode('and', $_POST["className"]); print $x[1]; ?></option>
            <?php  } ?> 

                       <option >Select One</option>
                       <?php 
                                $select_section = "SELECT * FROM `add_class` order by `index` ASC ";
                                $cheked_query=$db->select_query($select_section);
                                if($cheked_query)
                                {
                                    while($fetchsection=$cheked_query->fetch_array())
                                {
                            ?>
                            <option value="<?php echo "$fetchsection[0]and$fetchsection[2]"?>"><?php echo $fetchsection[2];?></option>
                            <?php }  } ?>
                    </select>

              </div>

              <div class="form-group col-lg-4 col-md-4">
                <label >Group :</label><strong class="text-danger"> ** </strong>
                


   <select name="groupname" id="groupname" class="form-control" style="max-width: 300px;" >
                                   <?php if (isset($_POST["groupname"])) {?>
                <option value="<?php echo $_POST["groupname"];?>"><?php
                 $x=explode('and', $_POST["groupname"]); print $x[1]; ?></option>
            <?php  } ?> 

                        </select>

                  


              </div>
              <div class="form-group col-lg-4 col-md-4">
                <label >Session :</label><strong class="text-danger"> ** </strong>
                

                  <select name="Session1" class="form-control" style="max-width: 300px;">
                                             <?php if (isset($_POST["Session1"])) {?>
                <option><?php echo $_POST["Session1"];?></option>
            <?php  } 

        


                             
                                $y=date('Y')+1;
                                $previous=$y-2;
                                for($year = $y; $year >= $previous;  $year--)
                                {?>
                                
                                <option><?php print $year-1;?>-<?php print $year;?></option>
                                
                                <?php }
                                $y=date('Y')+1;
                                $previous=$y-2;
                                for($year = $y; $year >= $previous;  $year--)
                                {
                            ?>
                            <option><?php print $year;?></option>
                            <?php  } ?>
                ?>



  
              
          </select>

              </div>

            


            </div>
            <br>
            <h2 style="display: block; padding:5px 0px 5px 10px;">Previous Result:</h2>
          <hr>


          <div class=" col-md-12 col-xs-12  col-sm-12 col-xs-12">
              <div class="form-group col-lg-12 col-md-12">
                 
                <label >Select Class :</label>
                
                <select class="form-control" name="selectClass" style="max-width: 300px;"> 

         
                                  <?php if (isset($_POST["selectClass"])) {?>
                <option><?php
                 $x=explode('and', $_POST["selectClass"]); print $x[1]; ?></option>
            <?php  } ?> 

                       <option >Select One</option>
                       <?php 
                                $select_section = "SELECT * FROM `add_class` order by `index` ASC";
                                $cheked_query=$db->select_query($select_section);
                                if($cheked_query)
                                {
                                    while($fetchsection=$cheked_query->fetch_array())
                                {
                            ?>
                            <option value="<?php echo "$fetchsection[0]and$fetchsection[2]"?>"><?php echo $fetchsection[2];?></option>
                            <?php }  } ?>


                             
                

                </select>
                </div>
              </div>


            <div class="col-lg-12  col-md-12 col-xs-12"  style="padding-top: 10px;">
              
              <div class="form-group col-lg-4 col-md-4">
                <label >Institute Name :</label>
               

                <input type="text" class="form-control" placeholder="Institute Name" name="pscinstitute" style="max-width: 300px;" <?php 
                            if(isset($_POST['pscinstitute'])) {?>
                value='<?php echo $_POST['pscinstitute'];?>'
            <?php  } ?> >

              </div>

              <div class="form-group col-lg-4 col-md-4">
                <label> Board Roll  :</label>
        

                   <input type="text" class="form-control" name="pscroll"  placeholder="Roll" style="max-width: 300px;" <?php 
                            if(isset($_POST['pscroll'])) {?>
                value='<?php echo $_POST['pscroll'];?>'
            <?php  } ?>>

              </div>
              <div class="form-group col-lg-4 col-md-4">
                <label for="exampleInputPassword1">Reg. :</label>
                

                <input type="text" class="form-control" placeholder="Reg. No." style="max-width: 300px;" name="pscregno"  <?php 
                            if(isset($_POST['pscregno'])) {?>
                value='<?php echo $_POST['pscregno'];?>'
            <?php  } ?> >

              </div>

              <div class="form-group col-lg-4 col-md-4">
                <label>
Group :</label>
    
   


<select class="form-control" name="pscgroup"   style="max-width: 300px;" >
     <?php if (isset($_POST['pscgroup'])) 
         {?>
                <option><?php echo $_POST['pscgroup'];?></option>
            <?php  } ?>

    <option>Null</option>
    <option>Science</option>
    <option>Humanities</option>
    <option>Business Studies</option>

</select>



              </div>

              <div class="form-group col-lg-4 col-md-4">
                <label for="exampleInputPassword1">
Passing Year :</label>
            


                 <input type="text" class="form-control" name="pscpassingyear"   placeholder="Passing Year" style="max-width: 300px;" 
        <?php 
                            if(isset($_POST['pscpassingyear'])) {?>
                value='<?php echo $_POST['pscpassingyear'];?>'
            <?php  } ?>  >


              </div>
              <div class="form-group col-lg-4 col-md-4">
                <label for="exampleInputPassword1">
GPA :</label>
 <input type="text" name="pscgradepoint" class="form-control"  placeholder="GPA/Total Marks" style="max-width: 300px;"    <?php 
                            if(isset($_POST['pscgradepoint'])) {?>
                value='<?php echo $_POST['pscgradepoint'];?>'
            <?php  } ?>  >

              </div>


 <div class="form-group col-lg-12 col-md-12">
                <label>
<h4 style="color: #ff0000;">Attach Certificate/ Marksheet/ Testimonial/T.C (any One).</h4></label>
<br>

<label style="float: left; clear: right;">
  <input  type="file" class="filestyle2" name="certificatee" accept="image/*" id="certificate" onChange="viewShowImage2(this)"></input>
  </label>
  <label>
  <img src="../admin/all_image/Noimage.png" class='img-thumbnail' style="height:0px; width:80px;" id="preview2"  />
  </label>

              </div>



            </div>
        


          </div>
          
          
        </div>

<!--  ................................. Address ................................-->

        <div class="tab_content" style="min-height:1300px;">
        <progress style="width:100%; background:#3FDE16; height:10px;" class="progress progress-striped progress-success" value="75" max="100"></progress>
        <!--  .....Parmanenet Address...................... -->
      
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-bordered">


  
<!--  .....Present  Address...................... -->



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

              
      <h2 style=" display: block; padding:2px 0px 5px 10px;">Present Address:</h2>
            <hr style="padding: 0px; margin: 0px;">
            

         <div class="form-group col-lg-4 col-md-4">
       <label> House No./Name:</label>  
       

             <input type="text" name="prehouseno" id="prehouseno" class="form-control"  style="max-width:300px;" placeholder="House No." <?php 
                            if(isset($_POST['prehouseno'])) {?>
                value='<?php echo $_POST['prehouseno'];?>'
            <?php  } ?>  > 

         </div> 


   <div class="form-group col-lg-4 col-md-4">
       <label> Vill. :</label>  
       

             <input type="text"  id="previlll" name="previlll" class="form-control"  style="max-width:300px;" placeholder="Vill. " <?php 
                            if(isset($_POST['previlll'])) {?>
                value='<?php echo $_POST['previlll'];?>'
            <?php  } ?>  > 

  </div>  


   <div class="form-group col-lg-4 col-md-4">
       <label> P.O. :</label> 
       

             <input type="text" name="prepo" id="prepo" class="form-control"  style="max-width:300px;" placeholder="P.O. " <?php 
                            if(isset($_POST['prepo'])) {?>
                value='<?php echo $_POST['prepo'];?>'
            <?php  } ?>  > 

  </div>  


   <div class="form-group col-lg-4 col-md-4">
       <label> Post Code:</label> 
       

             <input type="text" name="prepostcode" id="prepostcode" class="form-control"  style="max-width:300px;" placeholder="Post Code " <?php 
                            if(isset($_POST['prepostcode'])) {?>
                value='<?php echo $_POST['prepostcode'];?>'
            <?php  } ?>  > 

  </div>  

   <div class="form-group col-lg-4 col-md-4">
       <label> Upazila :</label>  
       

             <input type="text" name="preupazilla" id="preupazilla" class="form-control"  style="max-width:300px;" placeholder="Upazila "<?php 
                            if(isset($_POST['preupazilla'])) {?>
                value='<?php echo $_POST['preupazilla'];?>'
            <?php  } ?>  > 

  </div>  

      
         <div class="form-group col-lg-4 col-md-4">
       <label> District :</label> 
       

             <input type="text" name="predistric" id="predistric" class="form-control"  style="max-width:300px;" placeholder="District " <?php 
                            if(isset($_POST['predistric'])) {?>
                value='<?php echo $_POST['predistric'];?>'
            <?php  } ?>  > 

  </div>    

    </div>

    <h2 style=" display: block; padding:0px 0px 5px 10px;">Permanent Address:</h2><hr>
    <hr style="padding: 0px; margin: 0px;">
    

<label> 
 <input type="checkbox"   id="check" onclick="sameAddress()" style="height: 20px; width: 20px;"> </input>

 </label>
 <label style="margin: -5px;"> &nbsp; &nbsp;
      If both address are same, Click the check box.
 </label>
   
    <div class="col-lg-12  col-md-12 col-xs-12"  style="padding-top: 10px;">
         <div class="form-group col-lg-4 col-md-4">
                 <label> House No./Name :</label>   
                    <input type="text" name="parhose" id="parhose" class="form-control"  style="max-width:300px;" placeholder="House Name" <?php 
                                if(isset($_POST['parhose'])) {?>
                    value='<?php echo $_POST['parhose'];?>'
                <?php  } ?>  > 
        </div>
                            

     <div class="form-group col-lg-4 col-md-4">
             <label> Vill. :</label>    
            

            <input type="text" name="parvill"  id="parvill"  class="form-control"  style="max-width:300px;" placeholder="Vill." <?php 
                            if(isset($_POST['parvill'])) {?>
                value='<?php echo $_POST['parvill'];?>'
            <?php  } ?>  > 
    </div>
c

         <div class="form-group col-lg-4 col-md-4">
             <label> P.O. :</label> 
             

             <input type="text" name="parpo"  id="parpo" class="form-control"  style="max-width:300px;" placeholder="P.O." <?php 
                            if(isset($_POST['parpo'])) {?>
                value='<?php echo $_POST['parpo'];?>'
            <?php  } ?>  > 

    </div>

        
             <div class="form-group col-lg-4 col-md-4">
             <label> Post Code:</label> 
                <input type="text" name="parpostcode"  id="parpostcode" class="form-control"  style="max-width:300px;" placeholder="Post Code "<?php 
                            if(isset($_POST['parpostcode'])) {?>
                value='<?php echo $_POST['parpostcode'];?>'
            <?php  } ?>  > 
    </div>
                        

     <div class="form-group col-lg-4 col-md-4">
             <label> Upazila :</label>  
            

            <input type="text" name="parupazilla"  id="parupazilla"  class="form-control"  style="max-width:300px;" placeholder="Upazila" <?php 
                            if(isset($_POST['parupazilla'])) {?>
                value='<?php echo $_POST['parupazilla'];?>'
            <?php  } ?>  > 
    </div>


         <div class="form-group col-lg-4 col-md-4">
             <label> District:</label>  
             

             <input type="text" name="pardistric" id="pardistric" class="form-control"  style="max-width:300px;" placeholder="District" <?php 
                            if(isset($_POST['pardistric'])) {?>
                value='<?php echo $_POST['pardistric'];?>'
            <?php  } ?>  > 

    </div>                      
                                
</div>

        </div>



    </div>



        <div class="tab_content" style="min-height:400px;">
        <progress style="width:100%; background:green; height:10px" class="progress progress-striped progress-success" value="100" max="100"></progress>
        
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-bordered">
          
   <div class="form-group col-lg-6 col-md-6">
       <label> Guardian's Name :</label>  <strong class="text-danger"> ** </strong>
          
            <input type="text" name="GuardianName" class="form-control"  style="max-width:400px;" placeholder=" Guardian's Name " <?php 
                            if(isset($_POST['GuardianName'])) {?>
                value='<?php echo $_POST['GuardianName'];?>'
            <?php  } ?>  > 
        
        </div>

           <div class="form-group col-lg-6 col-md-6">
       <label>Relation With Student :</label> 
          
          
            
            <select  name="RelationWithStudent" class="form-control"  style="max-width:400px;"><?php
                if(isset($_POST['RelationWithStudent'])) {?>
                <option><?php echo $_POST['RelationWithStudent'];?> </option>
            <?php  } ?>
            <option>Father</option>
            <option>Mother</option>
            <option>Other</option>
            
            </select>
        
        </div>

         <div class="form-group col-lg-6 col-md-6">
       <label> Guardian's Contact No. :</label> <strong class="text-danger"> ** </strong>
          
            <input type="number" name="GuardianContactNo" class="form-control"  style="max-width:400px;" placeholder="Guardian's Contact No. : "<?php 
                            if(isset($_POST['GuardianContactNo'])) {?>
                value='<?php echo $_POST['GuardianContactNo'];?>'
            <?php  } ?>  > 
        
        </div>

           <div class="form-group col-lg-6 col-md-6">
       <label>Guardian's Email :</label>  
          
            <input type="text" name="GuardianEmail" class="form-control"  style="max-width:400px;" placeholder=" Guardian's Email  : " <?php 
                            if(isset($_POST['GuardianEmail'])) {?>
                value='<?php echo $_POST['GuardianEmail'];?>'
            <?php  } ?>  > 
        
        </div>

      
        <div class="form-group col-lg-12 col-md-12  ">
          <p style="text-align: right;">

                   


          
                        &nbsp;&nbsp;
                        <label>
                              <input type="submit" name="Preview" value="Review" class="btn btn-large btn-success"  
                        style="height: 40px; width: 150px; float: right;" formtarget="_blank" />
                        </label>

                          <label>
                            <input type="submit" name="add" value=" Final Submit" class="btn btn-large btn-danger"  style="height: 40px; width: 150px; float: right;" onclick=" return confirmClick()" /> 
                        </label>
                      

          </p>
        </div>
        </form>
      </div>



    </div>
  </div>
   <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>