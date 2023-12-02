
<?php
   error_reporting(0);
@session_start();

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


    $rn=base64_decode($_GET['RN']);
    $pn=base64_decode($_GET['VC']);
   
   if($_SESSION['reg_logstatus']==true)
   {
    

    

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <meta name="Description" content="<?php echo $fetch_school_information['meta_tag'] ?>" />
    <title><?php print $fetch_school_information['title'] ?></title>
    <link rel="shortcut icon" href="logo.jpg" />

    <title>HSC Students Admission Information Form</title>
    <style>
    body{
        
        font-family: 'Noto Serif Bengali', serif;
    }
    </style>

    <script type="text/javascript">
  $(document).ready(function()
  {
   
        var checking_html = '<img src="search_group/loading.gif" /> Checking...';
        $('#className').change(function()
        {
            $('#item_result').html(checking_html);
                check_availability();
        }); 

        $('#groupname').change(function()
        {
            $('#check_section').html(checking_html);
                check_compolsary_subject();
                check_selective_subject();
                check_optional_subject();
        }); 
  });

  function check_availability()
{
  
        var class_name = $('#className').val();
        $.post("check_grou_name.php", { className: class_name },
            function(result){
                if(result !=1 )
                {
                    $('#groupname').html(result);
                 
                }
                else
                {
                  
                    $('#groupname').html('');
                     $('#compolsarysubject').html('');
                        $('#selectivesubject').html('');
                     $('#select_optional_subject').html('');

                }
        });

}  


//function to check compolsary subject availability   
function check_compolsary_subject()
{
        var class_name = $('#className').val();
       var group_name = $('#groupname').val();
        $.post("check_compolsary_subject.php", { className: class_name, groupname:group_name},
            function(result){
                //if the result is 1
                if(result != 0 )
                {
                    //show that the username is available
                    $('#compolsarysubject').html(result);
                    
                    $('#check_compol_name').html('');

                }
                else
                {
                    //show that the username is NOT available
                    document.getElementById('check_compol_name').style.color='RED';
                    $('#check_compol_name').html('No Compolsary Subject Name Found');
                   
                    $('#compolsarysubject').html('');

                }
        });

}  
//function to check selective subject availability   
function check_selective_subject()
{
        var class_name = $('#className').val();
        var group_name = $('#groupname').val();
       
        $.post("check_selective_subject.php", { className: class_name,group_name:group_name},
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#selectivesubject').html(result);
                    
                    $('#check_selectivenae').html('');

                }
                else
                {
                    //show that the username is NOT available
                    document.getElementById('check_selectivenae').style.color='RED';
                    $('#check_selectivenae').html('No Group Subject Name Found');
                    
                    $('#selectivesubject').html('');

                }
        });

} 
//function to check selective subject availability   
function check_optional_subject()
{
        var class_name = $('#className').val();
        var group_name = $('#groupname').val();
       
        $.post("check_optional_subject.php", { className: class_name,group_name:group_name},
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#select_optional_subject').html(result);

                    $('#check_optional_name').html('');

                }
                else
                {
                    //show that the username is NOT available
                    document.getElementById('check_optional_name').style.color='RED';
                    $('#check_optional_name').html('No optional Subject Name Found');
                    
                    $('#select_optional_subject').html('');
                }
        });

}  


function sameAddress()
  {

    
    
    
    
    
    
    
    
    
    

      var checkBox = document.getElementById("check");

      var pa_home_name = $('#pa_home_name').val();
      var pa_village = $('#pa_village').val();
      var pa_post_office = $('#pa_post_office').val();
      var pa_upazila = $('#pa_upazila').val();
      var pa_district = $('#pa_district').val();
  

      if (checkBox.checked == true)
        {
                $('#ra_home_name').val(pa_home_name);
                $('#ra_village').val(pa_village);
                $('#ra_post_office').val(pa_post_office);
                $('#ra_upazila').val(pa_upazila);
                $('#ra_district').val(pa_district);
                
        } 
        else 
        {
              $('#ra_home_name').val("");
              $('#ra_village').val("");
              $('#ra_post_office').val("");
              $('#ra_upazila').val("");
              $('#ra_district').val("");
           
        }

  }



function saveInfo()
{
        var Name=$("#Name").val();
          if(Name=="")
          {
            alert("Enter Your Name");
            return 0;
          } 
        var Name_en=$("#Name_en").val();
          if(Name_en=="")
          {
            alert("Enter Your Name In English");
            return 0;
          } 

        


          var fathersName=$("#fathersName").val();
          if(fathersName=="")
          {
             alert("Enter Your Father's Name");
            return 0;
          }   
          var fathers_name_en=$("#fathers_name_en").val();
          if(fathers_name_en=="")
          {
             alert("Enter Your Father's Name In English");
            return 0;
          }   
          var occupation=$("#occupation").val();
          if(occupation=="")
          {
             alert("আপনার পিতার পেশা প্রদান করুন");
            return 0;
          }   
          var job_location=$("#job_location").val();
          if(job_location=="")
          {
             alert("আপনার পিতার কর্মস্থল প্রদান করুন");
            return 0;
          }   
          var father_phone=$("#father_phone").val();
          if(father_phone=="")
          {
             alert("আপনার পিতার নাম্বার প্রদান করুন");
            return 0;
          }   
              if(father_phone.length!=11)
                {
                    alert("পিতার মোবাইল নাম্বারটি ভুল হইছে");
                     return 0;
                
                }

          var mothersName=$("#mothersName").val();
          if(mothersName=="")
          {
             alert("Enter Your Mother's Name");
            return 0;
          } 
          var mothers_name_en=$("#mothers_name_en").val();
          if(mothers_name_en=="")
          {
             alert("আপনার মাতার নাম ইংরেজীতে প্রদান করুন");
            return 0;
          } 
          var mothers_name_en=$("#mothers_name_en").val();
          if(mothers_name_en=="")
          {
             alert("আপনার মাতার নাম ইংরেজীতে প্রদান করুন");
            return 0;
          } 
          var mothers_occupation=$("#mothers_occupation").val();
          if(mothers_occupation=="")
          {
             alert("আপনার মাতার পেশা প্রদান করুন");
            return 0;
          } 
          var mother_mobile_number=$("#mother_mobile_number").val();
          if(mother_mobile_number=="")
          {
             alert("আপনার মাতার মোবাইল নাম্বার প্রদান করুন");
            return 0;
          } 


        if(mother_mobile_number.length!=11)
        {
                    alert("মাতার মোবাইল নাম্বারটি ভুল হইছে");
                    return 0;
                
        }
          var mother_work_place=$("#mother_work_place").val();
       

         var studentMobile=$("#studentMobile").val();
          if(studentMobile=="")
          {
             alert("Enter Student Mobile Number");
            return 0;
          } 
         var pa_home_name=$("#pa_home_name").val();
          if(pa_home_name=="")
          {
             alert("আপনার স্থায়ী ঠিকানায় বাড়ীর নাম প্রদান করুন");
            return 0;
          } 
         var pa_village=$("#pa_village").val();
          if(pa_village=="")
          {
             alert("আপনার স্থায়ী ঠিকানায় গ্রামের নাম প্রদান করুন");
            return 0;
          } 
         var pa_post_office=$("#pa_post_office").val();
          if(pa_post_office=="")
          {
             alert("আপনার স্থায়ী ঠিকানায় ডাকঘর প্রদান করুন");
            return 0;
          } 
         var pa_upazila=$("#pa_upazila").val();
          if(pa_upazila=="")
          {
             alert("আপনার স্থায়ী ঠিকানায় উপজেলা প্রদান করুন");
            return 0;
          } 
         var pa_district=$("#pa_district").val();
          if(pa_district=="")
          {
             alert("আপনার স্থায়ী ঠিকানায় জেলা প্রদান করুন");
            return 0;
          } 
          
          
          
          
         var ra_home_name=$("#ra_home_name").val();
          if(ra_home_name=="")
          {
             alert("আপনার বর্তমান ঠিকানায় বাড়ীর নাম প্রদান করুন");
            return 0;
          } 
         var ra_village=$("#ra_village").val();
          if(ra_village=="")
          {
             alert("আপনার বর্তমান ঠিকানায় গ্রামের নাম প্রদান করুন");
            return 0;
          } 
         var ra_post_office=$("#ra_post_office").val();
          if(ra_post_office=="")
          {
             alert("আপনার বর্তমান ঠিকানায় ডাকঘর প্রদান করুন");
            return 0;
          } 
         var ra_upazila=$("#ra_upazila").val();
          if(ra_upazila=="")
          {
             alert("আপনার বর্তমান ঠিকানায় উপজেলা প্রদান করুন");
            return 0;
          } 
         var ra_district=$("#ra_district").val();
          if(ra_district=="")
          {
             alert("আপনার বর্তমান ঠিকানায় জেলা প্রদান করুন");
            return 0;
          } 

           
         var date_of_birth=$("#date_of_birth").val();
          if(date_of_birth=="")
          {
             alert("আপনার জন্ম তারিখ প্রদান করুন");
            return 0;
          } 
         var board_exam_passyear=$("#board_exam_passyear").val();
          if(board_exam_passyear=="")
          {
             alert("আপনার পাসের সনটি দিন");
            return 0;
          } 
         var board_exam_roll_no=$("#board_exam_roll_no").val();
          if(board_exam_roll_no=="")
          {
             alert("আপনার পাসকৃত শ্রেণীর বোর্ড রোলটি প্রদান করুন");
            return 0;
          } 
         var board_exam_institute_name=$("#board_exam_institute_name").val();
          if(board_exam_institute_name=="")
          {
             alert("আপনি যে প্রতিষ্ঠান থেকে পাস করেছেন তার তথ্য দিন");
            return 0;
          } 
         var board_exam_session=$("#board_exam_session").val();
          if(board_exam_session=="")
          {
             alert("আপনার শিক্ষাবর্ষটি প্রদান করুন");
            return 0;
          } 
         var board_exam_pass_gpa=$("#board_exam_pass_gpa").val();
          if(board_exam_pass_gpa=="")
          {
             alert("আপনার ফলাফল প্রদান করুন");
            return 0;
          } 

           

          //  var roll=$("#roll").val();
          // if(roll=="")
          // {
          //    alert("Enter You Roll No");
          //   return 0;
          // }    

          // var regNumber=$("#regNumber").val();
          // if(regNumber=="")
          // {
          //    alert("Enter You Reg. No");
          //   return 0;
          // } 

          var className=$("#className").val();
          if(className=="Select One")
          {
             alert("Select Your Class");
            return 0;
          }   

          var groupname=$("#groupname").val();
          if(groupname=="")
          {
             alert("Select Your Group");
            return 0;
          } 

          var Session=$("#Session").val();
          if(Session=="")
          {
             alert("Select Your Session");
            return 0;
          } 
          
       
              var guardian_name_bn=$("#guardian_name_bn").val();
              if(guardian_name_bn=="")
              {
                 alert("আাপনার অভিভাবকের নাম প্রদান করুন");
                return 0;
              } 
              var guardian_name_en=$("#guardian_name_en").val();
              if(guardian_name_en=="")
              {
                 alert("আাপনার অভিভাবকের নাম ইংরেজীতে প্রদান করুন");
                return 0;
              } 
              var guardian_occupation=$("#guardian_occupation").val();
              if(guardian_occupation=="")
              {
                 alert("আাপনার অভিভাবকের পেশা প্রদান করুন");
                return 0;
              } 
              var guardian_job_location=$("#guardian_job_location").val();
              if(guardian_job_location=="")
              {
                 alert("আাপনার অভিভাবকের পেশা কর্মস্থল প্রদান করুন");
                return 0;
              } 
              var guardianMobile=$("#guardianMobile").val();
              if(guardianMobile=="")
              {
                 alert("অভিবাবকের মোবাইল নাম্বারটি প্রদান করুন");
                return 0;
              }  
          
                if(guardianMobile.length!=11)
                {
                    alert("অভিবাবকের মোবাইল নাম্বারটি ভুল হইছে");
                     return 0;
                }


         
                 

 



    var cmsubject = [];
      $('.cmsub').each(function(){
        if($(this).is(":checked"))
        {
          cmsubject.push($(this).val());
        }
      
      });
      

      
      //var cmlent=$('.cmsub').length;
      //alert(cmlent);
      
 

       var slsubject = [];
      $('.slsub').each(function(){
        if($(this).is(":checked"))
        {
          slsubject.push($(this).val());
        }
      
      });

      if(className=="311611180001andEleven")
      {


      if(slsubject.length>3 || slsubject.length<3)
      {
        alert('Select Three Group  Subject');
        return;
      }

     }



       var optional_subject=$(".opSub").val();
          if(optional_subject=="")
          {
             alert("Select Optional Subject");
            return 0;
          } 

      var form = $('form')[0];
      var formData=new FormData(form);
      var files=$("#file")[0].files;
      if(files.length>0)
      {
        formData.append('file',files[0]);
      }
      
        $('#btnsave').attr('disabled','disabled');

       $.ajax({
              url:"save_reg_info.php",
              type:"POST",
              data:formData,
              contentType: false,
              processData: false,
              success:function(result){
              var r=parseInt(result);
              if(r==0)
              {
                alert ("Unsuccessfully");
                $('#btnsave').removeAttr('disabled');

              }
              else
              {
                 alert ("Successfully");

                    window.location.href = 'https://imc.edu.bd/studentportal/view_students_details.php?id='+r;
              }
                      
             

              }
          });


}

   </script>
  </head>
  <body>
    <div class="jumbotron bg-success text-white" style="padding:10px;">
      <div class="container">
        <div class="row">
        <div class="col-md-1 col-3 bg-">
              <img src="logo.jpg" style="height: 100px; text-align: right;" class="img-responsive" >
       </div>

        <div class="col-md-10 col-9">
              
         <h4 style="text-shadow:  0px 3px 3px #999;"> <?php print $fetch_school_information['institute_name'] ?></h4>

         <h5 class="text-warning"> Students Information Form (HSC Admission-2023) </h5>
 
        </div>
        </div>

</div>
   </div>


<div class="container mt-2 shadow-sm p-3 mb-5  rounded">


<form method="post" id="form" name="form" enctype="multipart/form-data">
    <div class="row">
        <input type="hidden" name="reg_phone" value="<?php echo $pn;?>">
    <div class="col-12">
         <b>শিক্ষার্থীর তথ্য:</b>
         <div class="row" style="border: 1px dashed lightgray;padding:10px;">
             <div class="col-6 mt-2">
                <label for="Name" class="form-label">ছাত্র/ছাত্রীর নাম (বাংলায়):</label>
                <input type="text" class="form-control form-control-sm" id="Name"  name="Name" autocomplete="off"/>
            </div>
             <div class="col-6 mt-2">
                <label for="Name_en" class="form-label">ছাত্র/ছাত্রীর নাম (ইংরেজীতে):</label>
                <input type="text" class="form-control form-control-sm" id="Name_en"  name="Name_en" autocomplete="off"  />
            </div>
             <div class="col-12 mt-2">
                <label for="birth_nid_no" class="form-label">ছাত্র/ছাত্রীর জন্ম নিবন্ধন/জাতীয় পরিচয় পত্র নং:</label>
                <input type="text" class="form-control form-control-sm" id="birth_nid_no"  name="birth_nid_no" autocomplete="off"/>
            </div>
            <div class="col-6 mt-2">
                <label for="studentMobile" class="form-label">ছাত্র/ছাত্রীর মোবাইল নং:</label>
                <input type="number" class="form-control form-control-sm" id="studentMobile" name="studentMobile" autocomplete="off" required="">
          </div>
            <div class="col-6 mt-2">
                <label for="file" class="form-label">ছাত্র/ছাত্রীর ছবি</label>
                <input type="file"  id="file"  name="file"  class="form-control form-control-sm">
          </div>
         </div>
    </div>
    
    <div class="col-12 mt-3">
        <b>পিতার তথ্য:</b>
        <div class="row" style="border : 1px dashed lightgray;padding:10px;">
            <div class="col-6 mt-2">
                <label for="fathersName" class="form-label">পিতার নাম (বাংলায়):</label>
                <input type="text" class="form-control form-control-sm" id="fathersName"  name="fathersName" autocomplete="off" required="">
          </div> 
            <div class="col-6 mt-2">
                <label for="fathers_name_en" class="form-label">পিতার নাম (ইংরেজীতে):</label>
                <input type="text" class="form-control form-control-sm" id="fathers_name_en"  name="fathers_name_en" autocomplete="off" required="">
          </div> 
            <div class="col-6 mt-2">
                <label for="father_nid_no" class="form-label">জাতীয় পরিচয় পত্র নং:</label>
                <input type="text" class="form-control form-control-sm" id="father_nid_no"  name="father_nid_no" autocomplete="off">
          </div> 
            <div class="col-6 mt-2">
                <label for="father_education" class="form-label">শিক্ষাগত যোগ্যতা:</label>
                <input type="text" class="form-control form-control-sm" id="father_education"  name="father_education" autocomplete="off">
          </div> 
            <div class="col-6 mt-2">
                <label for="occupation" class="form-label">পেশা:</label>
                <input type="text" class="form-control form-control-sm" id="occupation"  name="occupation" autocomplete="off">
          </div> 
            <div class="col-6 mt-2">
                <label for="job_location" class="form-label">কর্মস্থল:</label>
                <input type="text" class="form-control form-control-sm" id="job_location"  name="job_location" autocomplete="off">
          </div> 
            <div class="col-6 mt-2">
                <label for="father_phone" class="form-label">মোবাইল নাম্বার:</label>
                <input type="number" class="form-control form-control-sm" id="father_phone"  name="father_phone" autocomplete="off">
          </div> 
        </div>
    </div>
    
    <div class="col-12 mt-3" >
        <b>মাতার তথ্য:</b>
        <div class="row" style="border: 1px dashed lightgray;padding:10px;">
            <div class="col-6 mt-2" >
                <label for="mothersName" class="form-label">মাতার নাম (বাংলায়):</label>
                <input type="text" class="form-control form-control-sm" id="mothersName" name="mothersName" autocomplete="off" required="">
          </div>
            <div class="col-6 mt-2">
                <label for="mothers_name_en" class="form-label">মাতার নাম (ইংরেজীতে):</label>
                <input type="text" class="form-control form-control-sm" id="mothers_name_en" name="mothers_name_en" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="mothers_nid_no" class="form-label">জাতীয় পরিচয় পত্র নং:</label>
                <input type="text" class="form-control form-control-sm" id="mothers_nid_no" name="mothers_nid_no" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="mothers_edcuation" class="form-label">শিক্ষাগত যোগ্যতা:</label>
                <input type="text" class="form-control form-control-sm" id="mothers_edcuation" name="mothers_edcuation" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="mothers_occupation" class="form-label">পেশা:</label>
                <input type="text" class="form-control form-control-sm" id="mothers_occupation" name="mothers_occupation" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="mother_work_place" class="form-label">কর্মস্থল:</label>
                <input type="text" class="form-control form-control-sm" id="mother_work_place" name="mother_work_place" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="mother_mobile_number" class="form-label">মোবাইল নাম্বার:</label>
                <input type="number" class="form-control form-control-sm" id="mother_mobile_number" name="mother_mobile_number" autocomplete="off">
          </div>
        </div>
    </div>
        
    <!--<div class="col-12">-->
    <!--     <div class="form-check col-lg-2 col-12">-->
    <!--          <input class="form-check-input" type="checkbox" name="died" id="guardianDied" value="1">-->
    <!--          <label class="form-check-label" for="orphane">-->
    <!--          বাবা মা মৃত হলে টিক দিন-->
    <!--          </label>-->
    <!--    </div>-->
    <!--</div>-->
        
    <div class="col-12 mt-3">
       
        <div class="row" style="border: 1px dashed lightgray;padding:10px;">
            <div class="col-6 mt-2">
                <label for="guardian_name_bn" class="form-label">অভিভাবকের নাম (বাংলায়):</label>
                <input type="text" class="form-control form-control-sm" id="guardian_name_bn" name="guardian_name_bn" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="guardian_name_en" class="form-label">অভিভাবকের নাম (ইংরেজীতে):</label>
                <input type="text" class="form-control form-control-sm" id="guardian_name_en" name="guardian_name_en" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="guardian_nid_no" class="form-label">জাতীয় পরিচয় পত্র নং:</label>
                <input type="text" class="form-control form-control-sm" id="guardian_nid_no" name="guardian_nid_no" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="guardian_education" class="form-label">শিক্ষাগত যোগ্যতা:</label>
                <input type="text" class="form-control form-control-sm" id="guardian_education" name="guardian_education" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="guardian_occupation" class="form-label">পেশা:</label>
                <input type="text" class="form-control form-control-sm" id="guardian_occupation" name="guardian_occupation" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="guardian_job_location" class="form-label">কর্মস্থল:</label>
                <input type="text" class="form-control form-control-sm" id="guardian_job_location" name="guardian_job_location" autocomplete="off">
          </div>
         <div class="col-md-6 mt-2">
            <label for="guardianMobile" class="form-label">মোবাইল নাম্বার:</label>
            <input type="number" class="form-control form-control-sm" id="guardianMobile" name="guardianMobile" autocomplete="off" required="">
          </div>
        </div>
    </div>
    
    
    <div class="col-12">
        <b>সঠিক ঘরে টিক চিহ্ন দিন</b>
        <div class="row">
            <div class="form-check col-lg-2 col-12">
                  <input class="form-check-input" type="radio" name="quota" id="orphane" value="এতিম">
                  <label class="form-check-label" for="orphane">
                   এতিম
                  </label>
            </div>
            <div class="form-check col-lg-2 col-12">
                  <input class="form-check-input" type="radio" name="quota" id="autistick" value="প্রতিবন্ধী">
                  <label class="form-check-label" for="autistick">
                   প্রতিবন্ধী
                  </label>
            </div>
            <div class="form-check col-lg-2 col-12">
                  <input class="form-check-input" type="radio" name="quota" id="freedom_fighter_son" value="মুক্তিযোদ্ধার সন্তান">
                  <label class="form-check-label" for="freedom_fighter_son">
                   মুক্তিযোদ্ধার সন্তান
                  </label>
            </div>
            <div class="form-check col-lg-2 col-12">
                  <input class="form-check-input" type="radio" name="quota" id="river_break_son" value="নদীভাঙ্গন পরিবারের সন্তান">
                  <label class="form-check-label" for="river_break_son">
                   নদীভাঙ্গন পরিবারের সন্তান
                  </label>
            </div>
            <div class="form-check col-lg-2 col-12">
                  <input class="form-check-input" type="radio" name="quota" id="poor_family_son" value="দুস্থ পরিবারের সন্তান">
                  <label class="form-check-label" for="poor_family_son">
                   দুস্থ পরিবারের সন্তান
                  </label>
            </div>
            <div class="form-check col-lg-2 col-12">
                  <input class="form-check-input" type="radio" name="quota" id="others" value="অন্যান্য">
                  <label class="form-check-label" for="others">
                   অন্যান্য
                  </label>
            </div>
        </div>
    </div>

  
  <div class="col-12 mt-3">
        <b>ছাত্র/ছাত্রীর স্থায়ী ঠিকানা:</b>
        <div class="row" style="border: 1px dashed lightgray;padding:10px;">
            <div class="col-6 mt-2">
                <label for="pa_home_name" class="form-label">বাড়ীর নাম:</label>
                <input type="text" class="form-control form-control-sm" id="pa_home_name" name="pa_home_name" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="pa_village" class="form-label">গ্রাম:</label>
                <input type="text" class="form-control form-control-sm" id="pa_village" name="pa_village" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="pa_post_office" class="form-label">ডাকঘর:</label>
                <input type="text" class="form-control form-control-sm" id="pa_post_office" name="pa_post_office" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="pa_upazila" class="form-label">উপজেলা:</label>
                <input type="text" class="form-control form-control-sm" id="pa_upazila" name="pa_upazila" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="pa_district" class="form-label">জেলা:</label>
                <input type="text" class="form-control form-control-sm" id="pa_district" name="pa_district" autocomplete="off">
          </div>
        </div>
    </div>

    
  <div class="col-12 mt-3">
        <label> <b>ছাত্র/ছাত্রীর বর্তমান ঠিকানা:</b> </label><label> &nbsp;
 <input type="checkbox"   id="check" onclick="sameAddress()" style="height: 15px; width: 15px;"> </input>&nbsp;
</label>
        <label>বর্তমান ঠিকানা স্থায়ী ঠিকানার সমান হলে চেকবক্সে ক্লিক করুন</label>



        <div class="row" style="border: 1px dashed lightgray;padding:10px;">
            <div class="col-6 mt-2">
                <label for="ra_home_name" class="form-label">বাড়ীর নাম:</label>
                <input type="text" class="form-control form-control-sm" id="ra_home_name" name="ra_home_name" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="ra_village" class="form-label">গ্রাম:</label>
                <input type="text" class="form-control form-control-sm" id="ra_village" name="ra_village" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="ra_post_office" class="form-label">ডাকঘর:</label>
                <input type="text" class="form-control form-control-sm" id="ra_post_office" name="ra_post_office" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="ra_upazila" class="form-label">উপজেলা:</label>
                <input type="text" class="form-control form-control-sm" id="ra_upazila" name="ra_upazila" autocomplete="off">
          </div>
            <div class="col-6 mt-2">
                <label for="ra_district" class="form-label">জেলা:</label>
                <input type="text" class="form-control form-control-sm" id="ra_district" name="ra_district" autocomplete="off">
          </div>
        </div>
    </div>
    
    <div class="col-6 mt-3">
        <label for="date_of_birth" class="form-label">জন্ম তারিখ এস এস সি পরীক্ষার সনদ অনুযায়ী (মাস/দিন/বছর):</label>
        <input type="date" class="form-control form-control-sm" id="date_of_birth" name="date_of_birth" autocomplete="off" required="">
    </div>
    <div class="col-6 mt-3">
        <label for="nationality" class="form-label">জাতীয়তা:</label>
        <input type="text" class="form-control form-control-sm" id="nationality" name="nationality" autocomplete="off" required="">
    </div>
    <div class="col-6 mt-3">
        <label for="religion" class="form-label">ধর্ম:</label>
        <input type="text" class="form-control form-control-sm" id="religion" name="religion" autocomplete="off" required="">
    </div>
    
    <div class="col-12 mt-3">
        <b>বোর্ড পরীক্ষার ফলাফল (এস.এস.সি / দাখিল / সমমান):</b>
        <input type="hidden" name="board_exam_name" value="এস.এস.সি/দাখিল/সমমান">
        <div class="row " style="border: 1px dashed lightgray;padding:10px;">
                <div class="col-6 mt-2">
                <label for="board_exam_roll_no">বোর্ড রোল নং</label>
                <input type="number" id="board_exam_roll_no" name="board_exam_roll_no" class="form-control form-control-sm" required value="<?php print $rn;?>" readonly>
            </div>
               <div class="col-6 mt-2">
                <label for="board_exam_reg_no">রেজিঃ নং</label>
                <input type="number" id="board_exam_reg_no" name="board_exam_reg_no" class="form-control form-control-sm">
            </div>
            <div class="col-6 mt-2">
                <label for="board_exam_passyear">পাশের সন</label>
                <input type="number" id="board_exam_passyear" name="board_exam_passyear" class="form-control form-control-sm">
            </div>
            <div class="col-6 mt-2">
                <label for="board_exam_institute_name">শিক্ষা প্রতিষ্ঠানের নাম</label>
                <input type="text" id="board_exam_institute_name" name="board_exam_institute_name" class="form-control form-control-sm">
            </div>
         
        
            <div class="col-6 mt-2">
                <label for="board_exam_session">শিক্ষাবর্ষ</label>
                <input type="text" id="board_exam_session" name="board_exam_session" class="form-control form-control-sm">
            </div>
            <div class="col-6 mt-2">
                <label for="board_exam_pass_gpa">প্রাপ্ত জিপিএ</label>
                <input type="text" id="board_exam_pass_gpa" name="board_exam_pass_gpa" class="form-control form-control-sm">
            </div>
        </div>
    </div>

       



<!--   <div class="col-md-6 mt-3">
    <label for="roll" class="form-label">ক্লাস রোল নং:</label>
    <input type="number" class="form-control form-control-sm" id="roll" name="roll" autocomplete="off" required="">
  </div>
 <div class="col-md-6 mt-3">
    <label for="regNumber" class="form-label">রেজিষ্ট্রেশন নাম্বার:</label>
    <input type="number" class="form-control form-control-sm" id="regNumber" name="regNumber" autocomplete="off" required="">
  </div>
 -->


  <div class="col-md-4 mt-3">
    <label for="className" class="form-label">ক্লাস নির্বাচন করুন</label>
   
   <select name="className" id="className" class="form-control form-control-sm"> 
        <option>নির্বাচন করুন</option>
        <option value="311611180001andEleven">Eleven</option>
        <option value="312309250018andEleven BMT">Eleven BMT</option>
    </select>
  </div>

  <div class="col-md-4 mt-3">
    <label for="groupname" class="form-label">গ্রুপ নির্বাচন করুন</label>
    <select name="groupname" id="groupname" class="form-control form-control-sm">
      <option value="" disabled="" selected="">নির্বাচন করুন</option>
      
    </select>
  </div> 

  <div class="col-md-4 mt-3">
    <label for="Session" class="form-label">সেশন</label>
    <select id="Session" name="Session" class="form-select">
       <option>2023-2024</option>
    </select>
  </div>

<div class="col-md-4 mt-2">
    <strong>Compulsory Subject:</strong><br>
                
      <p id="compolsarysubject"></p> 


  </div>

  <div class="col-md-4 mt-2">
    <strong>Select Group Subject: (Group Science, Business, Humanities হলে  ৩টি বিষয় সিলেক্ট করুন  )</strong><br>
                
      <span id="selectivesubject"></span>


  </div>

  <div class="col-md-4 mt-2">
   <strong>Select Optional Subject &nbsp; : ১টি বিষয় সিলেক্ট করুন  </strong><br>
                
      <span id="select_optional_subject"></span>


  </div>

  <div class="col-12 "><br>
    <button type="button" class="btn btn-success" onclick="return saveInfo()" id="btnsave"> সাবমিট করুন </button>
  </div>
  </div>
</form>

 

 </div><br>
  <div class="col-12  p-2 pt-3 " style="text-align: right; background: #f5f5f5">
     <h5> Developed by : &nbsp; <a href="https://sbit.com.bd" class="text-light" target="_blank"><img src="https://sbit.com.bd/public/setting/1696451508034923.png" class="img-fluid" style="height: 40px;"> </a></h5>
  </div>


  </body>
</html>
<?php 
}
?>