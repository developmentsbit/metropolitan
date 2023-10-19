    <?php
        error_reporting(1);
        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        date_default_timezone_set("Asia/Dhaka");
        $db = new database();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="all_image/shortcurt_iconSDMS2015.png" />
    <title>Question Paper</title>

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


function checkExamType()
{
        

    $('#examType').html("");
    var checkExam="checkExam";
    var className = $('#className').val();
    var subjectName = $('#subjectName').val();


        $.post("check_online_exam_sub.php", { className: className,subjectName:subjectName,checkExam:checkExam},
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#examType').html(result);
   
                   
                }
                else
                {
                
                    $('#examType').html("");
          
                }                 
        });

}



function viewQuestionReport()
{
  var examType = $('#examType').val();
    var className = $('#className').val();
    var subjectName = $('#subjectName').val();

       if(examType != "" )
        {
           var viewExamQuestionReport = "viewExamQuestionReport";
            $.ajax({
                url:"questionReport.php",
                type:"POST",
                data :{className:className,subjectName:subjectName,viewExamQuestionReport:viewExamQuestionReport,examType:examType},
                cache:false,
                success:function(data)
                {
                    $('#viewQuestionReport').html(data);
                }
                
            });
        }



}

function AnswerSheet()
{
  var examType = $('#examType').val();
    var className = $('#className').val();
    var subjectName = $('#subjectName').val();

       if(examType != "" )
        {
           var viewAnswerSheet = "viewAnswerSheet";
            $.ajax({
                url:"questionReport.php",
                type:"POST",
                data :{className:className,subjectName:subjectName,viewAnswerSheet:viewAnswerSheet,examType:examType},
                cache:false,
                success:function(data)
                {
                    $('#viewQuestionReport').html(data);
                }
                
            });
        }



}


</script>
    
<style type="text/css">
  
    @media print{
      .print{
        display:none;
      }

</style>
 </head>

  <body>

    <div class="col-sm-12 col-xs-12 print" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Question Paper</b></div>
  
  <div class="panel-body">

<form>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail4">Select Class</label>
        <select class="form-control" name="className" id="className">
          <?php 
              if($selectQuestion)
                {
                   ?>
                      <option value="<?php echo $fetchData[1] ?>"><?php echo $fetchData[4];?></option>
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
        
    <select name="subjectName" id="subjectName" class="form-control" onchange="return checkExamType()">
 
    </select>
    </div>
  </div>

    <div class="form-row">
    <div class="form-group col-md-12">
      <label>Select Exam Type : </label>

        <select name="examType" id="examType" class="form-control">
         
    </select>


    </div>
 
  </div>


  <div class="form-row">

    <div class="form-group col-md-12 ">
     
       
      

          <label><input type="button" name="button" value="Question" class="btn btn-primary" style="border-radius:0px;" onclick="AnswerSheet()" ></label>

          <label><input type="button" name="AnswerSheet " value="Answer Sheet" class="btn btn-primary" style="border-radius:0px;" onclick="viewQuestionReport()" ></label>



         <label > <div class="form-row" id="result" style="font-size: 16px;">
    
    </div></label>
    </div>
  </div> 


  
  </div>
</form>


</div>
</div>

    


</div>


<div class="container" id="viewQuestionReport" > 


</div>




 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>



















