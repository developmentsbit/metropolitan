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
    <title>View Question</title>

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
    var ViewquestionaddSub="ViewquestionaddSub";
        var class_name = $('#className').val();
        $.post("check_online_exam_sub.php", { className: class_name,ViewquestionaddSub:ViewquestionaddSub},
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




function viewQuestion(){

   $('#viewAllQuestion').html("");

        var className = $('#className').val();
        var subjectName = $('#subjectName').val();
        
        if(className != "Select One" && subjectName != "" )
        {
           
            $.ajax({
                url:"ajaxViewQuestionQuestion.php",
                type:"POST",
                data :{className:className,subjectName:subjectName},
                cache:false,
                success:function(data)
                {
                    $('#viewAllQuestion').html(data);
                }
                
            });
        }
        else 
        {
            alert ("Please Fill Up Important Fields");
        }
        
}  

function deleteQuestion(question)
{
    var con=confirm("Are you sure to Delete Question?");
      if(con==false)
      {
        return false;
      }
      
     var del ="del";
      if(question!= "" )
        {
           
            $.ajax({
                url:"ajaxAddQuestion.php",
                type:"POST",
                data :{del:del,question:question},
                cache:false,
                success:function(data)
                {
                    $('#viewAllQuestion').html(data);
                    viewQuestion();
                }
                
            });
        }
        else 
        {
            alert ("Please Fill Up all Fields");
        }
        

    
}


</script>
    

    </head>

  <body>

    <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Add Chapter </b></div>
  
  <div class="panel-body">

<form>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail4">Select Class</label>
        <select class="form-control" name="className" id="className" >
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
        
    <select name="subjectName" id="subjectName" class="form-control"  onchange="return newQuestion()" >
    </select>
    </div>
  </div>


  <div class="form-row">

    <div class="form-group col-md-12 ">
     
       
        <label ><input type="button" name="button" value="View Question" class="btn btn-primary" style="border-radius:0px;"  onclick="return viewQuestion()"></label>
         <label > <div class="form-row" id="result" style="font-size: 16px;">
    
    </div></label>
    </div>
  </div> 


  
  </div>
</form>


</div>
</div>

    <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">
 <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>View All Question </b>
 </div>
  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="form-row">
    <label id="viewAllQuestion"> </label> 
</div>
</div>
</div>

 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>



















