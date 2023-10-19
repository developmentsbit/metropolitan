<?php
	error_reporting(1);
	@session_start();

	if($_SESSION["logstatus"] === "Active")
	{	

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
    
    <title>Result Generate</title>

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
               Check_exam_type();
               check_subject_online();
        });
    
         $('#groupname').change(function()
        {
            $('#check_section').html(checking_html);
                chek_subject_Type();

        }); 


     $('#subject_type').change(function()
        {
            $('#chek_type').html(checking_html);
                chek_subname();

        }); 
     $('#sub_name').change(function()
        {
            $('#check_sub_name').html(checking_html);
                chek_subject_part();
               check_subject_section();
               

        });
      $('#part_name').change(function()
        {
            $('#check_part_code').html(checking_html);
           
           
            check_subject_section_part();
               

        });
 });

         //function to check username availability   
function check_availability()
{
        var class_name = $('#className').val();
        $.post("check_grou_name.php", { className: class_name },
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#groupname').html(result);
                    $('#item_result').html("");
                    $('#category_result').html('');
                }
                else
                {
                    //show that the username is NOT available
                    document.getElementById('category_result').style.color='RED';
                    $('#category_result').html('No Group Name Found');
                    $('#item_result').html("");
                    $('#groupname').html('');
                }
                
                $('#subject_type').html("");
                $('#sub_name').html("");
                $('#part_name').html('');
                $('#subjectcode').val('');
                 
        });

}
//function to check exam type availability  
function Check_exam_type()
{
        var class_name = $('#className').val();
        $.post("Check_exam_type.php", { className: class_name },
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#examtype').html(result);
                    $('#checkingGroup').html("");
                    $('#category_result').html('');
                }
                else
                {
                    //show that the username is NOT available
                    $('#checkingGroup').html('No Exam  Name Found');
                    $('#item_result').html("");
                    $('#examtype').html('');
                }

        });

         var Checksubject="Checksubject";
          var res = class_name.split("and");
         // alert(res[0]);
        
        $.post("check_online_exam_sub.php", { className: res[0],Checksubject:Checksubject},
            function(result){
                if(result !=0 )
                {
                    $('#allsubject').html(result);
                }
                else
                {
                    $('#allsubject').html('');
                }                 
        });


} 
//function to check username availability   
function chek_subject_Type()
{
        var class_name = $('#className').val();
        var group_name = $('#groupname').val();
        $.post("chekingsubject_type.php", { className: class_name,groupName:group_name },
            function(result){
                //if the result is 1
                if(result != 0 )
                {
                    //show that the username is available
                    $('#subject_type').html(result);
                    $('#check_section').html("");
                   

                }
                else
                {
                    
                    $('#check_section').html("");
                    $('#subject_type').html('');
                }
                $('#sub_name').html("");
                $('#part_name').html('');
               $('#subjectcode').val('');
        });


} 

function chek_subname()
{
        var class_name = $('#className').val();
        var group_name = $('#groupname').val();
        var sub_type=$('#subject_type').val();

        $.post("cheking_subject_name.php", { className: class_name, groupName: group_name, sub_type:sub_type },

            function(result){
                //if the result is 1
                if(result != 0 )
                {
                    //show that the username is available
                    $('#sub_name').html(result);
                    $('#chek_type').html("");
                   
                    $("#generateMarks").prop('disabled', false); 
                }
                else
                {
                    
                    $('#chek_type').html("");
                    $('#sub_name').html('');
                }
        });

}              

function chek_subject_part()
{
        var class_name = $('#className').val();
        var group_name = $('#groupname').val();
        var sub_type=$('#subject_type').val();
        var sub_name=$('#sub_name').val();
		  var examtype=$('#examtype').val();
        $.post("checking_subject_part_name.php", { className: class_name, groupName: group_name, sub_type: sub_type, sub_name: sub_name,examtype: examtype },

            function(result){
                //if the result is 1
                if(result != 0 )
                {
                    //show that the username is available
                    $('#part_name').html(result);
                    $('#check_sub_name').html("");
                   

                }
                else
                {
                    
                    $('#check_sub_name').html("");
                    $('#part_name').html('');
                }
        });
}

function check_subject_section()
{
        var class_name = $('#className').val();
       // alert(class_name);
        var group_name = $('#groupname').val();
        var sub_type=$('#subject_type').val();
        var sub_name=$('#sub_name').val();
         
        $.post("priority_section.php", { className: class_name, groupName: group_name, sub_type:sub_type, subname: sub_name},

            function(result){
                //if the result is 1
                if(result != 0 )
                {
                    //show that the username is available
                    $('#section').html(result);
                    
                   

                }
                else
                {
                    
                    $('#section').html("");
                   
                }

        });

}   

function check_subject_section_part()
{
        var class_name = $('#className').val();
       // alert(class_name);
        var group_name = $('#groupname').val();
        var sub_type=$('#subject_type').val();
        var sub_name=$('#sub_name').val();
         var partName=$('#part_name').val();


        $.post("priority_section.php", { className: class_name, groupName: group_name, sub_type:sub_type, subname: sub_name,partName:partName },

            function(result){
                //if the result is 1
                if(result != 0 )
                {
                    //show that the username is available
                    $('#section').html(result);
                    
                   

                }
                else
                {
                    
                    $('#section').html("");
                   
                }

        });

}   

function check_subject_part_code()
{
        var class_name = $('#className').val();
        var group_name = $('#groupname').val();
        var sub_type=$('#subject_type').val();
        var sub_name=$('#sub_name').val();
        var sub_part_name=$('#part_name').val();
        $.post("cheking_part_code.php", { className: class_name, groupName: group_name, sub_type:sub_type, subname: sub_name, part_name: sub_part_name },

            function(result){
                //if the result is 1
                if(result != 0 )
                {
                    //show that the username is available
                    $('#subjectcode').val(result);
                    $('#chek_type').html("");
                }
                else
                {
                    $('#chek_type').html("");
                    $('#subjectcode').val('');
                }
        });

}     






function onlineExamTitle()
{
    
    var checkExam="checkExam";
    var className = $('#className').val();
     var res = className.split("and");

    var subjectName = $('#allsubject').val();


        $.post("check_online_exam_sub.php", { className: res[0],subjectName:subjectName,checkExam:checkExam},
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#onlineExam').html(result);
   
                   $("#generateMarks").prop('disabled', false); 
                }
                else
                {
                
                    $('#onlineExam').html("");
          
                }                 
        });

}


function gnarateMarks()
{

    $('#message').html("");
    $("#generateMarks").prop('disabled', true); 
    var examtype = $('#examtype').val();
    var part_name = $('#part_name').val();
    var session = $('#session').val();
    var sub_name = $('#sub_name').val();
    //alert(sub_name);
    var onlineExam = $('#onlineExam').val();

    var lower =parseFloat($('#lower').val()); 
    var upper =parseFloat($('#upper').val());  

    var low=lower+50;;
 
    var resultgenerate="resultgenerate";

  
    if(sub_name != null && sub_name != " " && onlineExam !=null  )
        {
        	 var con=confirm("Confirm Click?");
		      if(con==false)
		      {
		        return false;
		      }
           
            $.ajax({
                url:"onlineexamgnerate.php",
                type:"POST",
                data :{lower:lower,upper:upper,sub_name:sub_name,onlineExam:onlineExam,resultgenerate:resultgenerate,examtype:examtype,part_name:part_name,session:session},
                cache:false,
                success:function(data)
                {
                	$("#generateMarks").prop('disabled', false); 
                    $('#message').html(data);
                    $('#lower').val(low);
                  

                }
                
            });
        }


}




    </script>
	
    </head>

  <body>
  	<form name="teacherinfo" action="" method="post"  enctype="multipart/form-data" 
    class="form-horizontal marksInsertFrom" >
            <div class="col-md-8 col-md-offset-2" id="AddMarksStep1"><br/> <br/>
                <span class="glyphicon glyphicon-arrow-right text-justify text-uppercase text-warning" style="font-weight: bold; padding-top: 15px; font-size: 18px;"><strong style="padding-left:5px">Result Generate</strong></span><br/>
                <table class="table table-responsive table-hover table-bordered" style="margin-top:10px;">
                    <tr>
                    	<td ><strong><span class="text-success" style="font-size: 15px;">Select Class</span></strong></td>
                        <td ><div class="col-md-8">
                        <select class="form-control" name="className" id="className" style="width:380px; border-radius:0px;">
                        <option>Select One</option>
                        <?php 
                            $select_class="SELECT * FROM `add_class`  ORDER BY `index` ASC";
                            $check_query=$db->select_query($select_class);
                            if($check_query){
                                while($fetch_class=$check_query->fetch_array())
                                {
                        ?>
                        <option value="<?php echo "$fetch_class[0]and$fetch_class[2]"?>"><?php echo $fetch_class[2];?></option><span id="item_result"></span>
                        <?php } } else {?>
                        <option></option>
                        <?php } ?>
                        </select></div>
                    </tr>

                    <tr>
                        <td><strong><span class="text-success" style="font-size: 15px;">Exam Type</span></strong></td>
                        <td><div class="col-md-8"><select class="form-control" name="examtype" id="examtype" style="width:380px; border-radius:0px;" >
                        </select>
                        </div>
                        </td>
                    </tr>

                    <tr>
                        <td ><strong><span class="text-success" style="font-size: 15px;">Select Group</span></strong></td>
                        <td ><div class="col-md-8"><select class="form-control" name="groupname" id="groupname" style="width:380px; border-radius:0px;">
                        </select>
                        </div>
                        </td>
                </tr>

                 <tr>
                        <td ><strong><span class="text-success" style="font-size: 15px;">Select Subject Type</span></strong></td>
                        <td><div class="col-md-8">

                        <select class="form-control" id="subject_type" name="subject_type" style="width:380px; border-radius:0px;">
                        </select>
                        
                        </div>
                        </td>
                </tr>

                <tr>
                        <td ><strong><span class="text-success" style="font-size: 15px;"> Subject Name</span></strong></td>
                        <td><div class="col-md-8"><select class="form-control" id="sub_name" name="sub_name" style="width:380px; border-radius:0px;">
                        </select>
                        </div>
                        </td>
                </tr>
                <tr>
                        <td ><strong><span class="text-success" style="font-size: 15px;"> Part Name</span></strong></td>
                        <td><div class="col-md-8"><select class="form-control" id="part_name" name="part_name" style="width:380px; border-radius:0px;">
                        </select>
                        </div>
                        </td>
                </tr>
                <tr>
                    <td ><strong><span class="text-success" style="font-size: 15px;">Session</span></strong></td>
                        <td><div class="col-md-8"><select class="form-control" id="session" name="session" style="width:380px; border-radius:0px;">
                        <option>Select Session</option>
                       <?php 
								$sessionsql = "SELECT `session2` FROM `student_acadamic_information` GROUP BY `student_acadamic_information`.`session2` ORDER BY `student_acadamic_information`.`session2` DESC";
								$result = $db->select_query($sessionsql);
									if($result > 0){
										
										while($fetchsession = $result->fetch_array()){
										$str = strlen($fetchsession[0]);
											if($str >5){
						?>
								
								<option><?php print $fetchsession[0];?></option>
								<?php   } } } ?>
								
								<?php
											$sessionsql = "SELECT `session2` FROM `student_acadamic_information` GROUP BY `student_acadamic_information`.`session2` ORDER BY `student_acadamic_information`.`session2` DESC";
								$result = $db->select_query($sessionsql);
									if($result > 0){
										
										while($fetchsession = $result->fetch_array()){
										$str = strlen($fetchsession[0]);
											if($str ==4){
								?>
																<option><?php print $fetchsession[0];?></option>
								<?php   } } } ?>
                        </select>
                        </div>
                        </td>
                </tr>

                  <tr>
                        <td ><strong><span class="text-success" style="font-size: 15px;"> Section</span></strong></td>
                        <td><div class="col-md-8">
                        <select class="form-control" id="section" name="section" style="width:380px; border-radius:0px;">
                        </select>
                        </div>
                        </td>
                </tr>

                    <tr>
                        <td ><strong><span class="text-success" style="font-size: 15px;"> All Subject </span></strong></td>
                        <td><div class="col-md-8">
                        <select class="form-control" id="allsubject" name="allsubject" style="width:380px; border-radius:0px;" onchange="return onlineExamTitle()">
                        </select>
                        </div>
                        </td>
                </tr>

                 <tr>
                        <td ><strong><span class="text-success" style="font-size: 15px;">Online  Exam Select </span></strong></td>
                        <td><div class="col-md-8">
                        <select class="form-control" id="onlineExam" name="onlineExam" style="width:380px; border-radius:0px;">
                        </select>
                        </div>
                        </td>
                </tr>

                <tr>
                        <td colspan="3">
                        <center> 
                        <label> Limit : </label> 
                        <label> <input type="text" name="lower" id="lower" class="form-control" width="100" placeholder="0" value="0"></input></label>
                        <label> <input type="text" name="upper" id="upper" class="form-control"  width="100" placeholder="10" value="50"></input></label></center>

                        </td>
                </tr>
      


                <tr>

                <td colspan="2" align="center">

                <input type="button" name="submit" value="Submit" class="btn btn-success btn-md"   style="width: 90px" id="generateMarks" onclick="return gnarateMarks()">
                </input>

                <span id="message"></span>
                </div>

                </td></tr>


                </table>


		
     </form>
 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
