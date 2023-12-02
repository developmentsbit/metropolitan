<?php
	session_start();
	error_reporting(1);
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
    
    <title>Attendance Subject Priority</title>

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
        });
    
         $('#groupname').change(function()
        {
            $('#check_section').html(checking_html);
                chek_subject_Type();
                check_period();

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
                check_subject_code();
               

        });

      $('#part_name').change(function()
        {
            $('#check_part_code').html(checking_html);
           

                check_subject_part_code();

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

} 


  $(document).ready(function()
  {
        var checking_html = '<img src="search_group/loading.gif" /> Checking...';

         $('#groupname').change(function()
        {

            $('#check_section').html(checking_html);
                check_section_name();
               

        }); 
  });



function check_section_name()
{
        var class_name = $('#className').val();
        var group_name = $('#groupname').val();
        //alert(group_name);
        $.post("check_section_name.php", { className: class_name,groupName:group_name },
            function(result){
                //if the result is 1
                if(result != 0 )
                {
                    //show that the username is available
                    $('#section').html(result);
             

                }
                else
                {
                  
                    $('#section').html('');
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
          
        $.post("priority_checking_subject_part_name.php", { className: class_name, groupName: group_name, sub_type: sub_type, sub_name: sub_name,examtype: examtype },

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

function check_period()
{
        var class_name = $('#className').val();
        var periodshow = "periodshow";
      
        $.post("cheking_period.php", { className: class_name,periodshow: periodshow},

            function(result){
                //if the result is 1
                if(result != 0 )
                {
                    //show that the username is available
                   $('#period').html(result);
                    $('#chek_type').html("");
                   

                }
                else
                {
                    
                    $('#period').html("");
                   
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




function AddattendancePirority()
{
		var selectUser = $('#selectUser').val();
		var className = $('#className').val();
		var groupname = $('#groupname').val();
        var period = $('#period').val();
        if(groupname==null || groupname=="Select Group" )
        {
            alert("Select Group");
            return ;
        }
        var section = $('#section').val();

        if(section==null || section=="Select Section")
        {
            alert("Select Section");
            return ;
        }
	   var add="add";
		if(className != "Select One" && groupname != null  && section!=null )
		{
			$.ajax({
				url:"cheking_period.php",
				type:"POST",
				data :{selectUser:selectUser,className:className,groupname:groupname,section:section,add:add,period:period},
				cache:false,
				success:function(data)
				{
                   //alert(data);
                    viewSubject();
				}
			});
		}
		else 
		{
			alert("Please Fill Up Important Fields");
		}
}  



function viewSubject()
{
        var selectUser = $('#selectUser').val();
        var view="view";
        
        if(selectUser != "Select One")
        {
            $.ajax({
                url:"cheking_period.php",
                type:"POST",
                data :{selectUser:selectUser,view:view},
                cache:false,
                success:function(data)
                {
                    //alert(data);
                    $('#AddMarksStep2').html(data);
                }
                
            });
        }
        else 
        {
            alert("Please Fill Up All Fields");
        }
} 


function confirmDelete(id)
{
   var result = confirm("Are you sure, you want to delete data?");
    if (result==true) 
    {

        deleteSection(id);
    }
    else
    {
        return false;
    }

}


function deleteSection(id)
{
       
            var del="del";
            $.ajax({
                url:"cheking_period.php",
                type:"POST",
                data :{id:id,del:del},
                cache:false,
                success:function(data)
                {
                    //alert(data);
                    //$('#AddMarksStep2').html(data);
                     viewSubject();
                }
                
            });
        
        
} 







function ShowBack(){
			$('#AddMarksStep1').show();
			$('#AddMarksStep2').hide();
			//$('#showChekView').hide();
}
  function GoBackPage(){
	  		ShowBack();
	  }



    </script>
	
    </head>

  <body>
  	<form name="teacherinfo" action="" method="post"  enctype="multipart/form-data" class="form-horizontal marksInsertFrom" >
            <div class="col-md-8 col-md-offset-2" id="AddMarksStep1"><br/> <br/>
                
    <table class="table table-responsive table-hover table-bordered" 
                style="margin-top:10px;">

                		<tr>
                				<td colspan="3" align="center"> <h3> Attendance Subject Priority </h3> </td>
                		</tr>


                			<tr>
                    	<td>
                    		<strong><span class="text-success" style="font-size: 15px;">Select Teacher</span></strong></td>
                        <td><div class="col-md-8">
                        <select class="form-control" name="selectUser" id="selectUser" style="width:280px; border-radius:0px;" onchange="return viewSubject()">
                        <option>Select Teacher</option>
                        <?php 
                            $selectUser="SELECT * FROM `teachers_information` WHERE `Type`='Teacher' ORDER BY `index_no` ASC  ";
                            $check_query_user=$db->select_query($selectUser);
                            if($check_query_user){
                                while($fetch_user=$check_query_user->fetch_array())
                                {
                        ?>
                        <option value="<?php echo "$fetch_user[0]"?>"><?php echo $fetch_user[2];?></option><span id="item_result"></span>
                        <?php } } else {?>
                        <option></option>
                        <?php } ?>
                        </select></div>
                    </tr>


                    <tr>
                    	<td><strong><span class="text-success" style="font-size: 15px;">Select Class</span></strong></td>
                        <td>
                        	<div class="col-md-8">
                        <select class="form-control" name="className" id="className" style="width:280px; border-radius:0px;">
                        <option>Select One</option>
                        <?php 
                            $select_class="SELECT * FROM `add_class`  ORDER BY `index` ASC";
                            $check_query=$db->select_query($select_class);
                            if($check_query){
                                while($fetch_class=$check_query->fetch_array())
                                {
                        ?>
                        <option value="<?php echo "$fetch_class[0]"?>"><?php echo $fetch_class[2];?></option><span id="item_result"></span>
                        <?php } } else {?>
                        <option></option>
                        <?php } ?>
                        </select></div>
                    </tr>

                <tr>
                        <td ><strong><span class="text-success" style="font-size: 15px;">Select Group</span></strong></td>
                        <td ><div class="col-md-8"><select class="form-control" name="groupname" id="groupname" style="width:280px; border-radius:0px;">
                        </select>
                        </div>
                        </td>
                </tr>


                    <tr>
                        <td><strong><span class="text-success" style="font-size: 15px;">Section </span></strong></td>
                        <td><div class="col-md-8">
                            <select name="section" id="section" class="form-control" style="width:280px; border-radius:0px;"></select>

                        </div>
                        </td>
                    </tr>

                     <tr>
                        <td ><strong><span class="text-success" style="font-size: 15px;">
                      Select Period </span></strong></td>
                        <td><div class="col-md-8">
                            <select class="form-control" id="period" name="period" style="width:280px; border-radius:0px;">
                        </select>

                        </div>
                        </td>
                </tr>
               
                <tr><td colspan="2" align="center">

                <input type="button" name="submit" value="Add" class="btn btn-danger btn-md" onClick="return AddattendancePirority()"  style="width: 90px">

    <input type="button" name="view" value="View" class="btn btn-danger btn-md" onClick="return viewSubject()"  style="width: 90px">


                </td></tr>
                </table>
                </div>
		<div class="col-md-12" id="AddMarksStep2" style="text-align: center;">
			

		</div>
		
     </form>
 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
