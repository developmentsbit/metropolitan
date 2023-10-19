    <?php
        error_reporting(1);
        require_once("../../db_connect/config.php");
        require_once("../../db_connect/conect.php");
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
    <title>SMS Sent Report</title>

    <script type="text/javascript" src="../../js/vendor/jquery-1.11.3.min.js"></script>

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

function showReport()
{
 
    var className = $('#className').val();
    var selectDate = $('#selectDate').val();
    var smsReport="smsReport";

       if(className != "" && selectDate!="")
        {
          
            $.ajax({
                url:"smsSentReport.php",
                type:"POST",
                data :{className:className,selectDate:selectDate,smsReport:smsReport},
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
<style>
    
    <style type="text/css">
  
    @media print{
      .print{
        display:none;
      }

</style>
</style>


<form method="POST"><table width="600" class="print">
    
    <tr>
        
        <td> <h3>Sent Message Report</h3></td>
        
    </tr>
    
        
    <tr>
        
        <td> Class</td>
        <td> :</td>
        <td> <select class="form-control" name="className" id="className" style="height:30px; width:220px;">
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
        </select></td>
        
    </tr>
    
        
    <tr>
        
        <td> Date</td>
        <td>:</td>
        <td>     <input type="text" value="<?php print date('yy-m-d');?>" name='selectDate'  id='selectDate' style="height:30px; width:220px;" ></input> </td>
        
    </tr>
    
        <tr>
        
        <td colspan="3">   <label><input type="button" name="button" value="Show Report" class="btn btn-primary" style="border-radius:0px;" onclick="showReport()" ></label></td>
     
    </tr>
    
</table>
      
      
      



<div class="container" id="viewQuestionReport" > 


</div>




 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>



















