    <?php
      

       error_reporting(1);
        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        date_default_timezone_set("Asia/Dhaka");
        $db = new database();
    
        if(isset($_GET["EditID"]))
        {
                $select="SELECT `examsetup`.*,`add_class`.`class_name`,`onlineexamsubject`.`Subject_Name` FROM `examsetup`INNER JOIN `add_class` ON `add_class`.`id`=`examsetup`.`Class_id` INNER JOIN `onlineexamsubject` ON `onlineexamsubject`.`Subject_ID`=`examsetup`.`Subject_id` WHERE `examsetup`.`id`='".$_GET["EditID"]."'";
                $selectQuestion=$db->link->query($select);
                if($selectQuestion)
                {
                    $fetchData=$selectQuestion->fetch_array();
                }
        }

        if(isset($_POST["clear"]))
        {
          print "<script>location='SetupQuestionPaper.php'</script>";
        }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="all_image/shortcurt_iconSDMS2015.png" />
    <title>Question Setup</title>

    <script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
     <script type="text/javascript">
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
         function newQuestion()
        {
            $('#viewAllQuestion').html("");

        }
function check_availability()
{
    $('#result').html("");
    var Checksubject="Checksubject";
        var class_name = $('#className').val();
        $.post("check_online_exam_sub.php", { className: class_name,Checksubject:Checksubject},
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#subjectName').html(result);
                    $('#item_result').html("");
                   
                }
                else
                {
                
                    $('#item_result').html("");
                    $('#subjectName').html('');
                }                 
        });

}


function addQuestonSetup() {

$('#result').html("");
        var className = $('#className').val();
        var subjectName = $('#subjectName').val();
        var num_of_question = $('#num_of_question').val();
        var time = $('#time').val();
        var title = $('#title').val();
        var type = $('#type').val();
        var Day = $('#Day').val();
        var Month = $('#Month').val();
        var Year = $('#Year').val();
        var StartHour = $('#StartHour').val();
        var StartMinute = $('#StartMinute').val();
        var EndHour = $('#EndHour').val();
        var EndMinute = $('#EndMinute').val();
        var status = $('#status').val();

         

        var addQuestionSetup ="addQuestionSetup";

        if(className != "Select One" && subjectName != "" && time != "" && title != "" )
        {
           
            $.ajax({
                url:"ajaxAddQuestion.php",
                type:"POST",
                data :{className:className,subjectName:subjectName,num_of_question:num_of_question,time:time,title:title,type:type,addQuestionSetup:addQuestionSetup,Day:Day,Month:Month,Year:Year,StartHour:StartHour,StartMinute:StartMinute,EndHour:EndHour,EndMinute:EndMinute,status:status},
                cache:false,
                success:function(data)
                {
                    $('#result').html(data);
                    $('#title').val("");
                    $('#num_of_question').val("");
                    $('#Day').val("");
                    $('#Month').val("");
                    $('#Year').val("");
                    $('#StartHour').val("");
                    $('#StartMinute').val("");
                    $('#EndMinute').val("");
                   $('#time').val("");
                    $('#status').val("Select Status");
                    $('#type').val("Examination");

                  

                   viewExamSetup();
                }
                
            });
        }
        else 
        {
            alert ("Please Fill Up All Fields");
        }
}  



function editExamSetup(editexamId){


        $('#result').html("");

        var className = $('#className').val();
        var subjectName = $('#subjectName').val();
        var num_of_question = $('#num_of_question').val();
        var time = $('#time').val();
        var title = $('#title').val();
        var type = $('#type').val();
        var editQuestionSetup ="editQuestionSetup";
        var Day = $('#Day').val();
        var Month = $('#Month').val();
        var Year = $('#Year').val();
        var StartHour = $('#StartHour').val();
        var StartMinute = $('#StartMinute').val();
        var EndHour = $('#EndHour').val();
        var EndMinute = $('#EndMinute').val();
        var status = $('#status').val();

        if(className != "Select One" && subjectName != "" && time != "" && title != "" )
        {
           
            $.ajax({
                url:"ajaxAddQuestion.php",
                type:"POST",
                data :{editexamId:editexamId,className:className,subjectName:subjectName,num_of_question:num_of_question,time:time,title:title,type:type,editQuestionSetup:editQuestionSetup,Day:Day,Month:Month,Year:Year,StartHour:StartHour,StartMinute:StartMinute,EndHour:EndHour,EndMinute:EndMinute,status:status},
                cache:false,
                success:function(data)
                {
                    $('#result').html(data);
                    $('#title').val("");
                    $('#num_of_question').val("");
                    $('#Day').val("");
                    $('#Month').val("");
                    $('#Year').val("");
                    $('#StartHour').val("");
                    $('#StartMinute').val("");
                    $('#EndMinute').val("");
                   $('#time').val("");
                    $('#status').val("Select Status");
                    $('#type').val("Examination");


                   viewExamSetup();

                   location='SetupQuestionPaper.php';
                }
                
            });
        }
        else 
        {
            alert ("Please Fill Up All Fields");
        }
        
        
}  




function deleteExamType(examid)
{
    var con=confirm("Are you sure to Delete Chapter?");
      if(con==false)
      {
        return false;
      }
    
      
     var examdel ="examSetupDel";
      if(examid!= "" )
        {
           
            $.ajax({
                url:"ajaxAddQuestion.php",
                type:"POST",
                data :{examid:examid,examdel:examdel},
                cache:false,
                success:function(data)
                {
                    $('#viewAllQuestion').html(data);
                   viewExamSetup();
                }
                
            });
        }
        else 
        {
            alert ("Please Fill Up all Fields");
        }
        

    
}


function viewExamSetup(){

        $('#viewAllQuestion').html("");
        var className = $('#className').val();
        var subjectName = $('#subjectName').val();
        var viewExamSetup = "viewExamSetup";
        if(className=="Select One" ||  subjectName == "" )
        {
                alert("Please Select Class & Subject");
        }
        if(className != "Select One" && subjectName != "" )
        {
           
            $.ajax({
                url:"ajaxAddQuestion.php",
                type:"POST",
                data :{className:className,subjectName:subjectName,viewExamSetup:viewExamSetup},
                cache:false,
                success:function(data)
                {
                    $('#viewAllQuestion').html(data);
                }
                
            });
        }  
}  



</script>
</head>
  <body>

    <div class="container" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Exam Setup </b></div>
  <div class="panel-body">
  <form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail4">Select Class</label>
        <select class="form-control" name="className" id="className">
          <?php 
              if($selectQuestion)
                {
                   ?>
                      <option value="<?php echo $fetchData[Class_id] ?>"><?php echo $fetchData['class_name'];?></option>
                   <?php
                }
        ?>
                       <option>Select One</option>
                        <?php 
                            $select_class="SELECT * FROM `add_class` GROUP BY `id` ORDER BY `index` ASC";
                            $check_query=$db->select_query($select_class);
                            if($check_query){
                                while($fetch_class=$check_query->fetch_array())
                                {
                        ?>
                        <option value="<?php echo $fetch_class[0] ?>"><?php echo $fetch_class[2];?></option>
                        <span id="item_result"></span>
                        <?php } } else {?>
                        <option></option>
                        <?php } ?>
        </select>
    </div>
  <div class="form-group col-md-6">
    <label for="inputPassword4">Subject Name</label>
        
    <select name="subjectName" id="subjectName" class="form-control" onchange="return viewExamSetup()">
          <?php 
                 if($selectQuestion)
                {
                   ?>
                      <option value="<?php echo $fetchData[2];?>"><?php echo $fetchData['Subject_Name'];?></option>
                   <?php
                }
        ?>
    </select> 
    </div>
  </div>



  <div class="form-row">
    <div class="form-group col-md-12">
      <label>Exam Type</label>
      <select name="type" id="type" class="form-control">
          <?php 
                 if($selectQuestion)
                {
                   ?>
                      <option value="<?php echo $fetchData[6];?>"><?php echo $fetchData[6];?></option>
                   <?php
                }
        ?>
        <option value="Examination">Examination</option>
        <option value="Practice">Practice</option>
    </select>
    </div>
 
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Number of Question</label>
      <input type="text" name="num_of_question" id="num_of_question" class="form-control" value="<?php if($selectQuestion){ print $fetchData[3]; }?>" placeholder="30"></input>
    </div>

    <div class="form-group col-md-6">
      <label>Time (Minute)</label>
      <input type="text" name="time" id="time" class="form-control"  placeholder="30" value="<?php if($selectQuestion){ print $fetchData[4]; }?>"></input> 
    </div>
  </div>





  <div class="form-row">
    <div class="form-group col-md-12">
      <label>Exam Title</label>

        <input type="text" name="title" id="title" class="form-control"  placeholder="1st Tutorial (Bangla)" value="<?php if($selectQuestion){ print $fetchData[5]; }?>"></input> 
    </div>
 
  </div>



  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Day</label>
      <input type="text" name="Day" id="Day" class="form-control" value="<?php if($selectQuestion){ print $fetchData[Day]; }?>" placeholder="01"></input>
    </div>

    <div class="form-group col-md-4">
      <label>Month</label>
        <select name="Month" id="Month" class="form-control">
        <?php if($selectQuestion){ print "<option>".$fetchData['Month']."</option>"; }?>

            <option>Select Month</option>
            <option>January</option>
            <option>February</option>
            <option>March</option>
            <option>April</option>
            <option>May</option>
            <option>June</option>
            <option>July</option>
            <option>August</option>
            <option>September</option>
            <option>October</option>
            <option>November</option>
            <option>December</option>

        </select>
    </div>

        <div class="form-group col-md-4">
      <label>Year</label>
      <input type="text" name="Year" id="Year" class="form-control"  placeholder="2020" value="<?php if($selectQuestion){ print $fetchData[Year]; }?>"></input> 
    </div>
  </div>



<div class="form-row">
    <div class="form-group col-md-3">
      <label>Start Hour</label>
      <input type="text" name="StartHour" id="StartHour" class="form-control" value="<?php if($selectQuestion){ print $fetchData[Hour]; }?>" placeholder="15"></input>
    </div>

   <div class="form-group col-md-3">
      <label>Start Minute</label>
      <input type="text" name="StartMinute" id="StartMinute" class="form-control" value="<?php if($selectQuestion){ print $fetchData[Minute]; }?>" placeholder="00"></input>
    </div>


       <div class="form-group col-md-3">
      <label>End Hour</label>
      <input type="text" name="EndHour" id="EndHour" class="form-control" value="<?php if($selectQuestion){ print $fetchData[EndHour]; }?>" placeholder="15"></input>
    </div>

   <div class="form-group col-md-3">
      <label>End Minute</label>
      <input type="text" name="EndMinute" id="EndMinute" class="form-control" value="<?php if($selectQuestion){ print $fetchData[EndMinute]; }?>" placeholder="30"></input>
    </div>



  </div>
    <div class="form-row">
    <div class="form-group col-md-12">
      <label>Status</label>
        <select name="status" class="form-control" id="status">
         <?php if($selectQuestion){ print "<option>".$fetchData['Status']."</option>"; }?>

          <option>Select Status</option>
          <option>Active</option>
          <option>Deactivate</option>

        </select>
       
    </div>
 
  </div>





  <div class="form-row">

    <div class="form-group col-md-12 ">
     
       
        <label ><input type="button" name="button" value="Add" class="btn btn-success" style="border-radius:0px;"  onclick="return addQuestonSetup()"></label>  

          <label><input type="button" name="button" value="View" class="btn btn-primary" style="border-radius:0px;"  onclick="return viewExamSetup()"></label>

        <label><input type="button" name="button" value="Edit" class="btn btn-info" style="border-radius:0px;"  onclick="return editExamSetup('<?php echo $fetchData[0];?>')"></label>

          <label><input type="submit" name="clear" value="Clear" class="btn btn-danger" style="border-radius:0px;"></label>



         <label > <div class="form-row" id="result" style="font-size: 16px;">
    
    </div></label>
    </div>
  </div> 


  
  </div>
</form>

</div>
</div>

 <div class="container-fluid" style="margin-top: 30px;">
 <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>View All </b>
 </div>
  <div class="panel panel-default" style="border-radius: 0px;">
  <br>
  <span id="viewAllQuestion"> </span> 

</div>
</div>

 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>



















