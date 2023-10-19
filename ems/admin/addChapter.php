    <?php
    error_reporting(1);
    

        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        date_default_timezone_set("Asia/Dhaka");
        $db = new database();
    
        if(isset($_GET["EditID"]))
        {
                $select="SELECT `addchapter`.*,`add_class`.`class_name`,`onlineexamsubject`.`Subject_Name` FROM `addchapter`INNER JOIN `add_class` ON `add_class`.`id`=`addchapter`.`class_id` INNER JOIN `onlineexamsubject` ON `onlineexamsubject`.`Subject_ID`=`addchapter`.`subject_id` WHERE `addchapter`.`id`='".$_GET["EditID"]."'";
                $selectQuestion=$db->link->query($select);
                if($selectQuestion)
                {
                    $fetchData=$selectQuestion->fetch_array();
                }
        }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="all_image/shortcurt_iconSDMS2015.png" />
    <title>Add Chapter</title>

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


function addChapter(){
        $('#result').html("");
        var className = $('#className').val();
        var subjectName = $('#subjectName').val();
        var chapter = $('#chapter').val();
        var addChapter ="addChapter";

        
        if(className != "Select One" && subjectName != "" && chapter != "" )
        {
           
            $.ajax({
                url:"ajaxAddQuestion.php",
                type:"POST",
                data :{className:className,subjectName:subjectName,chapter:chapter,addChapter:addChapter},
                cache:false,
                success:function(data)
                {
                    $('#result').html(data);
                    $('#chapter').val("");
                   viewChapter();
                }
                
            });
        }
        else 
        {
            alert ("Please Fill Up All Fields");
        }
        
}  



function editChapter(editid){
        $('#result').html("");
        var className = $('#className').val();
        var subjectName = $('#subjectName').val();
        var chapter = $('#chapter').val();
        var editChapter ="editChapter";
  
   var con=confirm("Are you sure to Edit Chapter Name?");
      if(con==false)
      {
        return false;
      }
      

        
        if(className != "Select One" && subjectName != "" && chapter != "" )
        {
           
            $.ajax({
                url:"ajaxAddQuestion.php",
                type:"POST",
                data :{editid:editid,className:className,subjectName:subjectName,chapter:chapter,editChapter:editChapter},
                cache:false,
                success:function(data)
                {
                     alert(data);

                   location='addChapter.php';
                }
                
            });
        }
        else 
        {
            alert ("Please Fill Up All Fields");
        }
        
}  




function deleteChapter(chID)
{
    var con=confirm("Are you sure to Delete Chapter?");
      if(con==false)
      {
        return false;
      }
      
     var chDel ="chDel";
      if(chID!= "" )
        {
           
            $.ajax({
                url:"ajaxAddQuestion.php",
                type:"POST",
                data :{chDel:chDel,chID:chID},
                cache:false,
                success:function(data)
                {
                    $('#viewAllQuestion').html(data);
                    viewChapter();
                }
                
            });
        }
        else 
        {
            alert ("Please Fill Up all Fields");
        }
        

    
}


function viewChapter(){

   $('#viewAllQuestion').html("");

        var className = $('#className').val();
        var subjectName = $('#subjectName').val();
        var viewChapter = "viewChapter";
        if(className=="Select One" ||  subjectName == "" )
        {
                alert("Please Select Class & Subject");
        }

        if(className != "Select One" && subjectName != "" )
        {
           
            $.ajax({
                url:"ajaxAddQuestion.php",
                type:"POST",
                data :{className:className,subjectName:subjectName,viewChapter:viewChapter},
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

    <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Add Chapter </b></div>
  
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
        
    <select name="subjectName" id="subjectName" class="form-control">
          <?php 
                 if($selectQuestion)
                {
                   ?>
                      <option value="<?php echo $fetchData[2];?>"><?php echo $fetchData[5];?></option>
                   <?php
                }
        ?>
    </select>
    </div>
  </div>

    <div class="form-row">
    <div class="form-group col-md-12">
      <label>Chapter Name</label>

       <textarea class="form-control" id="chapter" rows="3" name="chapter"><?php 
                if($selectQuestion)
                {
                    print $fetchData[3];
                } ?>  
        </textarea>


    </div>
 
  </div>


  <div class="form-row">

    <div class="form-group col-md-12 ">
     
       
        <label ><input type="button" name="button" value="Add Chapter" class="btn btn-success" style="border-radius:0px;"  onclick="return addChapter()"></label>  

          <label><input type="button" name="button" value="View Chapter" class="btn btn-primary" style="border-radius:0px;"  onclick="return viewChapter()"></label>

        <label><input type="button" name="button" value="Edit" class="btn btn-info" style="border-radius:0px;"  onclick="return editChapter('<?php echo $fetchData[0];?>')"></label>


         <label > <div class="form-row" id="result" style="font-size: 16px;">
    
    </div></label>
    </div>
  </div> 


  
  </div>
</form>


</div>
</div>

    <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">
 <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>View All Chapter </b>
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



















