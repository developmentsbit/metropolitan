  <?php
    error_reporting(0);
        @session_start();
        if($_SESSION["logstatus"] === "Active")
        {
        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        date_default_timezone_set("Asia/Dhaka");
        $db = new database();
    
        if(isset($_GET["EditID"]))
        {
                $select="SELECT `questionadd`.*,`add_class`.`class_name`,`onlineexamsubject`.`Subject_Name` FROM `questionadd`INNER JOIN `add_class` ON `add_class`.`id`=`questionadd`.`class` INNER JOIN `onlineexamsubject` ON `onlineexamsubject`.`Subject_ID`=`questionadd`.`subject` WHERE `questionadd`.`id`='".$_GET["EditID"]."'";
                $selectQuestion=$db->link->query($select);
                if($selectQuestion)
                {
                    $fetchData=$selectQuestion->fetch_array();
                } 

                $selectChap="SELECT * FROM `addchapter` WHERE `id`='$fetchData[12]'";
                $chapterSelect=$db->link->query($selectChap);
                if($chapterSelect)
                {
                    $chapterName=$chapterSelect->fetch_array();
                }
        }


        if(isset($_POST["newQuestionAdd"]))
        {
            print "<script>location='QuestionAdd.php'</script>";
        } 

        if(isset($_POST["exit"]))
        {
            print exit();
        }
 
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="all_image/shortcurt_iconSDMS2015.png" />
    <title>Add Question</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



<link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="../js/loading/pace.min.js"></script>


    <script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
     <script type="text/javascript">

     $(document).ready(
        function()
        {
            $('#Question').redactor();
            $('#Option1').redactor();
            $('#Option2').redactor();
            $('#Option3').redactor();
            $('#Option4').redactor();
        }
    );

// 
// 


        $(document).ready(function()
          {


                var checking_html = '<img src="search_group/loading.gif" /> Checking...';
                $('#className').change(function()
                {
                    $('#item_result').html(checking_html);
                        check_availability();
                       
                });

                $('#subjectName').change(function()
                {
                   
                        check_chapter();
                       
                });

            
         });

         //function to check username availability   
         function newQuestion()
        {
            $('#result').html("");

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

function  check_chapter()
{

        var class_name = $('#className').val();
        var subjectName = $('#subjectName').val();
        var checkChapter="checkChapter";



        $.post("check_online_exam_sub.php", { className: class_name,subjectName:subjectName,checkChapter:checkChapter },
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#chapter').html(result);
                    $('#item_result').html("");
                   
                }
                else
                {
                
                    $('#item_result').html("");
                    $('#chapter').html('');
                }                 
        });

}


function AddQuestion(){

        var add ="add";

        var className = $('#className').val();
        if(className == "Select One")
        {
            alert("Select Class");
            return;

        }
      

        var subjectName = $('#subjectName').val();
        if(subjectName == " ")
        {
            alert("Select Subject");
            return;

        }


        var Question = $('#Question').val();
          if(Question == " ")
        {
            alert("Add Question");
            return;

        }

        var chapter = $('#chapter').val();
        if(chapter == "")
        {
            alert("Chapter Field Empty");
           
            chapter="Unfixed Chapter";
        }

        var questionType = $('#questionType').val();
        if(questionType == " ")
        {
            alert("Select Knowledge Type");
            return;

        }
        var Option1 = $('#Option1').val();
        if(Option1 == " ")
        {
            alert("Add Option1");
            return;

        }

        var Option2 = $('#Option2').val();
        if(Option2 == " ")
        {
            alert("Add Option2");
            return;

        }

        var Option3 = $('#Option3').val();
        if(Option3 == " ")
        {
            alert("Add Option3");
            return;

        }

        var Option4 = $('#Option4').val();
        if(Option4 == " ")
        {
            alert("Add Option4");
            return;

        }
        var f=0,t=0;

        var Answer1 = $('#Answer1').val();
        if(Answer1=="False")
        {
            f++;
        }
        else
        {
            t++;
        }
        var Answer2 = $('#Answer2').val();
        if(Answer2=="False")
        {
            f++;
        }
        else
        {
            t++;
        }
        var Answer3 = $('#Answer3').val();
         if(Answer3=="False")
        {
            f++;
        }
        else
        {
            t++;
        }
        var Answer4 = $('#Answer4').val();
         if(Answer4=="False")
        {
            f++;
        }
        else
        {
            t++;
        }

        if(f!=3 && t!=1)
        {
             alert("Please Check Answer");
             return;
        }
       
        
        if(className != "Select One" && subjectName != "" && Question != " " && Option1 != " " && Option2 != " " && Option3 != " " && Option4 != " " && f==3 && t==1 )
        {
           
            $.ajax({
                url:"ajaxAddQuestion.php",
                type:"POST",
                data :{add:add,className:className,subjectName:subjectName,Question:Question, Option1:Option1,Option2:Option2,Option3:Option3,Option4:Option4,Answer1:Answer1,Answer2:Answer2,Answer3:Answer3,Answer4:Answer4,chapter:chapter,questionType:questionType},
                cache:false,
                success:function(data)
                {
                    loadformat();
                  
                    $('#result').html(data);
                    $('#Question').val("");
                    $('#Option1').val("");
                    $('#Option2').val("");
                    $('#Option3').val("");
                    $('#Option4').val("");
                  
                    $("#Answer1").html('<option value="False">False</option><option value="True">True </option>');
                    $("#Answer2").html('<option value="False">False</option><option value="True">True </option>');
                    $("#Answer3").html('<option value="False">False</option><option value="True">True </option>');
                    $("#Answer4").html('<option value="False">False</option><option value="True">True </option>');
                }
                
            });
        }
        else 
        {
            alert ("Please Fill Up Important Fields");
        }
        
}  

function EditQuestion(qid)
{

   


    if(qid=="")
    {
         alert("Select Question");
         return;
    }
        var edit ="edit";
        var className = $('#className').val();
       
        if(className == "Select One")
        {
            alert("Select Class");
            return;

        }
      
        var subjectName = $('#subjectName').val();
        if(subjectName == "")
        {
            alert("Select Subject");
            return;

        }

            var questionType = $('#questionType').val();
        if(questionType == "")
        {
            alert("Select Knowledge Type");
            return;

        }

            var chapter = $('#chapter').val();
       if(chapter == "")
        {
            alert("Chapter Field Empty");
           
            chapter="Unfixed Chapter";
        }




         

        var Question = $('#Question').val();
        

          if(Question == " ")
        {
            alert("Add Question");
            return;

        }

        var Option1 = $('#Option1').val();

        if(Option1 == " ")
        {
            alert("Add Option1");
            return;

        }

        var Option2 = $('#Option2').val();

        if(Option2 == " ")
        {
            alert("Add Option2");
            return;

        }

        var Option3 = $('#Option3').val();

        if(Option3 == " ")
        {
            alert("Add Option3");
            return;

        }

        var Option4 = $('#Option4').val();

        if(Option4 == " ")
        {
            alert("Add Option4");
            return;

        }
        var f=0,t=0;

        var Answer1 = $('#Answer1').val();
        if(Answer1=="False")
        {
            f++;
        }
        else
        {
            t++;
        }
        var Answer2 = $('#Answer2').val();
        if(Answer2=="False")
        {
            f++;
        }
        else
        {
            t++;
        }
        var Answer3 = $('#Answer3').val();
         if(Answer3=="False")
        {
            f++;
        }
        else
        {
            t++;
        }
        var Answer4 = $('#Answer4').val();
         if(Answer4=="False")
        {
            f++;
        }
        else
        {
            t++;
        }

        if(f!=3 && t!=1)
        {
             alert("Please Check Answer");
             return;
        }
       
        var con=confirm("Are you sure to Edit Question?");
      if(con==false)
      {
        return false;
      }
      


        
        if(className != "Select One" && subjectName != "" && Question != " " && Option1 != " " && Option2 != " " && Option3 != " " && Option4 != " " && f==3 && t==1 )
        {
           
            $.ajax({
                url:"ajaxAddQuestion.php",
                type:"POST",
                data :{edit:edit,qid:qid,className:className,subjectName:subjectName,Question:Question, Option1:Option1,Option2:Option2,Option3:Option3,Option4:Option4,Answer1:Answer1,Answer2:Answer2,Answer3:Answer3,Answer4:Answer4,chapter:chapter,questionType:questionType},
                cache:false,
                success:function(data)
                {
                  
                   alert(data);

                   location='QuestionAdd.php';

                }
                
            });
        }
        else 
        {
            alert ("Please Fill Up Important Fields");
        }
}

function Clear()
{
     $('#viewAllQuestion').html("");
      $('#Question').val("");
                    $('#Option1').val("");
                    $('#Option2').val("");
                    $('#Option3').val("");

                    $('#Option4').val("");
                  
                    $("#Answer1").html('<option value="False">False</option><option value="True">True </option>');
                    $("#Answer2").html('<option value="False">False</option><option value="True">True </option>');
                    $("#Answer3").html('<option value="False">False</option><option value="True">True </option>');
                    $("#Answer4").html('<option value="False">False</option><option value="True">True </option>');
}


function viewQuestion(){

   $('#viewAllQuestion').html("");

        var className = $('#className').val();

        var subjectName = $('#subjectName').val();
        if(className=="Select One" ||  subjectName == "" )
        {
                alert("Please Select Class & Subject");
        }

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

function confirmDelete()
{
   
    var con=confirm("Are you sure to Delete Question?");
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

    <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Add Question </b></div>
  <div class="panel-body">

<form method="post">
<div class="container-fluid">
  <div class="form-row">

    <div class="form-group col-md-4">
        <label for="inputEmail4">Select Class</label>


        <select class="form-control" name="className" id="className" >

        <?php 
                 if($selectQuestion)
                {
                    

                   ?>
                      <option value="<?php echo $fetchData[1] ?>"><?php echo $fetchData[14];?></option>
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


  <div class="form-group col-md-4">
      <label for="inputPassword4">Subject Name</label>
        
    <select name="subjectName" id="subjectName" class="form-control" onchange=" return check_chapter()">
        <?php 
                 if($selectQuestion)
                {
                    

                   ?>
                      <option value="<?php echo $fetchData[2] ?>"><?php echo $fetchData[15];?></option>
                   <?php
                }
        ?>
    </select>
    </div>



  <div class="form-group col-md-4">
      <label for="inputPassword4">Chapter Name</label>
        
    <select name="chapter" id="chapter" class="form-control">
        <?php 
         
                 if($chapterSelect)
                {
                    

                   ?>
                      <option value="<?php echo $fetchData[12] ?>"><?php echo $chapterName[3];?></option>
                   <?php
                }
        ?>
    </select>
    </div>

  </div>
</div>

<div class="container-fluid" id="loadinfo">

 <div class="form-row">
    <div class="form-group col-md-12">
      <label>Question</label>
       <textarea class="form-control textarea" id="Question" rows="3" name="Question" onkeypress="return newQuestion()"><?php 
                if($selectQuestion)
                {
                    print $fetchData[3];
                }?></textarea>
    </div>
 
  </div>

  <div class="form-row">
    <div class="form-group col-md-8 ">
      <label>Option A</label>

        <textarea class="form-control textarea" id="Option1" name="Option1"> <?php 
                if($selectQuestion)
                {
                    print $fetchData[4];
                }  

      ?></textarea>

         

    </div>

    <div class="form-group col-md-4  ">
      <label>Answer</label>
      <select  class="form-control" name="Answer1" id="Answer1">
           <?php 
                 if($selectQuestion)
                {
                    if($fetchData[8]=="True")
                    {
                        
                       ?>
                          <option value="<?php echo $fetchData[8];?>"><?php echo $fetchData[8];?></option>
                       <?php
                    }
                }
        ?>

        <option  value="False"> False </option>
        <option value="True"> True </option>
      </select>
    </div>
 
  </div>

  <div class="form-row">
    <div class="form-group col-md-8 ">
      <label>Option B</label>


        <textarea class="form-control textarea" id="Option2" name="Option2"> <?php 
                if($selectQuestion)
                {
                     print $fetchData[5];
                }  

      ?></textarea>


    </div>
    <div class="form-group col-md-4 ">
      <label >Answer</label>
     <select  class="form-control" name="Answer2" id="Answer2">
   
     <?php 
                 if($selectQuestion)
                {
                    if($fetchData[9]=="True")
                    {
                        
                       ?>
                          <option value="<?php echo $fetchData[9];?>"><?php echo $fetchData[9];?></option>
                       <?php
                    }
                }
        ?>

        <option  value="False"> False </option>
        <option value="True"> True </option>
      </select>
    </div>
 
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-8 ">
         <label>Option C</label>

             <textarea class="form-control textarea" id="Option3" name="Option3"> <?php 
                if($selectQuestion)
                {
                     print $fetchData[6];
                }  

      ?></textarea>


        
    </div>
    <div class="form-group col-md-4 ">
      <label >Answer</label>
      <select  class="form-control " name="Answer3" id="Answer3">
        <?php 
                 if($selectQuestion)
                {
                    if($fetchData[10]=="True")
                    {
                        
                       ?>
                          <option value="<?php echo $fetchData[10];?>"><?php echo $fetchData[10];?></option>
                       <?php
                    }
                }
        ?>
        <option  value="False"> False </option>
        <option value="True"> True </option>
      </select>
    </div>
 
  </div>

  <div class="form-row">
    <div class="form-group col-md-8 ">
       <label>Option D</label>

          <textarea class="form-control textarea" id="Option4" name="Option4"> <?php 
                if($selectQuestion)
                {
                     print $fetchData[7];
                }  

      ?></textarea>


        
    </div>
    <div class="form-group col-md-4  ">
      <label >Answer</label>
      <select  class="form-control" name="Answer4" id="Answer4">
        <?php 
                 if($selectQuestion)
                {
                    if($fetchData[11]=="True")
                    {
                        
                       ?>
                          <option value="<?php echo $fetchData[11];?>"><?php echo $fetchData[11];?></option>
                       <?php
                    }
                }
        ?>
         <option  value="False"> False </option>
        <option value="True"> True </option>
      </select>
    </div>

 <div class="form-group col-md-4  ">
      <label>Knowledge Category</label>
      <select  class="form-control" name="questionType" id="questionType">
        <?php 
                 if($selectQuestion)
                {
                   
                        
                       ?>
                          <option value="<?php echo $fetchData[13];?>"><?php echo $fetchData[13];?></option>
                       <?php
                    
                }
        ?>
         <option  value="Knowledge"> Knowledge </option>
        <option value="Realization"> Realization </option>
        <option value="Usege"> Usege </option>
        <option value="Higher Efficiency"> Higher Efficiency  </option>
      </select>
    </div>

 
  </div>
</div>

<div class="container-fluid"> 

  <div class="form-row">
    <div class="form-group col-md-12 ">
     
       
       
         <label ><input type="button" name="button" value="Edit Question" class="btn btn-info" style="border-radius:0px;"  onclick="return EditQuestion('<?php echo $fetchData[0];?>')"></label>


         <label ><input type="submit" name="newQuestionAdd" value="New Question Add" class="btn btn-primary" style="border-radius:0px;"></label>

         <label ><input type="submit" name="exit" value="   Exit  " class="btn btn-danger" style="border-radius:0px;"  ></label>

         <label> <div class="form-row" id="result" style="font-size: 16px;">
    
    </div></label>
    </div>
  </div> 
</div>
  
  </div>
</form>
</div>
</div>

 <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="form-row">
    <label id="viewAllQuestion"> </label> 
</div>
</div>
</div>



<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>

  <script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

     
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>

    

















