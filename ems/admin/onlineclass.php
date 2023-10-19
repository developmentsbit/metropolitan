<?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{	
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();
    global $msg;
    global $table;
    global $chek_query;
	$prefix=date("y"."m"."d");
	$fetch_query[0]=$db->withoutPrefix('online_lecture','id',"PID-",'10');
    
    
	if(isset($_POST["add"]))
    {   
        $className=$db->escape($_POST["className"]);

        $cls=explode("and", $className);
        $groupname=$db->escape($_POST["groupname"]);
         $group=explode("and", $groupname);

        $sub_name=$db->escape($_POST["sub_name"]);
        $sub=explode("and", $sub_name);

        $title=$db->escape($_POST["title"]);

        $detaile=$db->escape(isset($_POST["descreption"])?$_POST["descreption"]:"");
        $videoUrl=$db->escape($_POST["videoUrl"]);
        $teacherName=$db->escape($_POST["teacherName"]);
        $date=$db->escape($_POST["date"]);
    
        if(!empty($title)) 
        {

        @$file_name = $_FILES['file']['name'];
        @$file_size =$_FILES['file']['size'];
        @$file_tmp =$_FILES['file']['tmp_name'];
        @$file_type=$_FILES['file']['type'];  

        @$file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

        @$inserquery="INSERT INTO `online_lecture` (`id`,`Class_Name`,`class_ID`,`group_Name`,`Group_ID`,`subject_Name`,`subject_Id`,`title`,`details`,`video_url`,`pdf`,`Teacher_Name`,`date`,`admin`) VALUES('".$fetch_query[0]."','$cls[1]','$cls[0]','$group[1]','$group[0]','$sub[1]','$sub[0]','$title','$detaile','$videoUrl','$file_ext','$teacherName','$date','admin')";
       
                  
     @move_uploaded_file($file_tmp,"../onlineClass/".$fetch_query[0].'.'.$file_ext);
            
        @$chek_insert=$db->insert_query($inserquery);
                    //print_r($inserquery);
        $fetch_query[0]=$db->withoutPrefix('notice','Notice_id',"3".$prefix,'10');     
        }
        else
        {
            $msg="<span class='text-center text-danger glyphicon glyphicon-remove'><strong>&nbsp;Please Fill Up TextField</strong></span>";
        }
      } 
      
if(isset($_POST["view"]))
{
     $query="SELECT `id`,`Class_Name`,`group_Name`,`subject_Name`,`title`,`video_url`,`Teacher_Name`,`date` FROM `online_lecture` ORDER BY `id` DESC";
        $result=$db->select_query($query);
        $table="<div class='col-md-12' style='margin-top:30px'>"."<table class='table table-responsive table-hover table-bordered' align='center' style='margin-top:-20px;'>";
        $table.="<tr>"."<td align='left'>"."<a href='onlineclass.php' class='btn btn-primary'>"."<span class='link text-center'>Back<span>"."</a>"."</td>".
        "<td colspan='13' align='center'>"."<span class='text-success' style='font-size:18px; font-weight:blod;'>Daily Class Upload </span>"."</td>"."</tr>";
        if($result){
            $table.="";
            $count=mysqli_num_fields($result);
                while($fetch_All=$result->fetch_array())
                {
                   $table.="<tr>";
                    for ($i=1; $i <$count ; $i++) { 
                        $table.="<td>".$fetch_All[$i]."</td>";
                    }
                    
                   
                        $table.="<td>";
                         $table.="";
                        $table.="<a style='width:80px; margin-left:5px; margin-top:2px;' href='?dlt=$fetch_All[0]&ext=$fetch_All[10]' class='btn btn-danger' onclick='return confirm_delete()'>Delete</a>";
                        $table.="</td>";
                 $table.="</tr>";
                   

                }
        }

        $table.="</table>"."</div>";
}

if(isset($_GET["dlt"]))
{
    $Delete="DELETE FROM `online_lecture` WHERE `id`='".$_GET["dlt"]."'";
    $db->delete_query($Delete);
        @unlink("../onlineClass/".$_GET['dlt'].".".$_GET['ext']."");
    //print "<script>location='onlineclass.php'</script>";

    $query="SELECT `id`,`Class_Name`,`group_Name`,`subject_Name`,`title`,`video_url`,`Teacher_Name`,`date` FROM `online_lecture` ORDER BY `id` DESC";
        $result=$db->select_query($query);
        $table="<div class='col-md-12' style='margin-top:30px'>"."<table class='table table-responsive table-hover table-bordered' align='center' style='margin-top:-20px;'>";
        $table.="<tr>"."<td align='left'>"."<a href='onlineclass.php' class='btn btn-primary'>"."<span class='link text-center'>Back<span>"."</a>"."</td>".
        "<td colspan='13' align='center'>"."<span class='text-success' style='font-size:18px; font-weight:blod;'>Daily Class Upload </span>"."</td>"."</tr>";
        
        if($result){
            $table.="";
            $count=mysqli_num_fields($result);
                while($fetch_All=$result->fetch_array())
                {
                   $table.="<tr>";
                    for ($i=1; $i <$count ; $i++) { 
                        $table.="<td>".$fetch_All[$i]."</td>";
                    }
                    
                    if($fetch_All[4]=="")

                    {$table.="<td>".'<a href="../other_img/'.$fetch_All[0].'.'.$fetch_All[3].'" class="btn btn-primary" target="_blank">Download</a>'."</td>";}
                    else
                    {
                        $table.="<td>".$fetch_All[4]."</td>";
                    }
                        $table.="<td>";
                         $table.="";
                        $table.="<a style='width:80px; margin-left:5px; margin-top:2px;' href='?dlt=$fetch_All[0]&ext=$fetch_All[10]' class='btn btn-danger' onclick='return confirm_delete()'>Delete</a>";
                        $table.="</td>";
                 $table.="</tr>";
                   

                }
        }

        $table.="</table>"."</div>";


}


     
    
      if (isset($_POST["Exit"])) {
            print exit;
      }
    ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Daily Class Upload</title>
        
     <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
  
  
    <link rel="stylesheet" href="textEdit/redactor/redactor.css" />
    <script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
    <script src="textEdit/redactor/redactor.min.js"></script>
	
	
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">

   
    <script src="datespicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
    $(document).ready(
        function()
        {
            $('#redactor').redactor();

            var checking_html = '<img src="search_group/loading.gif" /> Checking...';
            $('#className').change(function()
            {
                $('#item_result').html(checking_html);
                    check_availability();
                   Check_exam_type();
            });

        $('#groupname').change(function()
        {
           
               chek_subname();

        }); 
        }


    );
    
    	function confirm_click()
    	{
    		$confirm_click=confirm('Are You Confirm Update');
    		if($confirm_click===true)
    		{
    			return true;
    		}
    		else
    		{
    			return false;
    		}
    	}

    	function confirm_delete()
    	{
    		$confirm_click=confirm('Are You Confirm Delete');
    		if($confirm_click===true)
    		{
    			return true;
    		}
    		else
    		{
    			return false;
    		}
    	}
          $(document).ready(function () {
                    
                    $('#example1').datepicker({
                        format: "dd/mm/yyyy"
                    });  
                
                });

 
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


function chek_subname()
{
        var class_name = $('#className').val();
        var group_name = $('#groupname').val();
      

        $.post("cheking_subject_name_onlineClass.php", { className: class_name, groupName: group_name},

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

      </script>
    </head>
    <body>
    <form name="notice" action="" method="post"  enctype="multipart/form-data" class="form-horizontal" >
    <?php if(isset($_POST["view"]) or isset($_GET["dlt"]))
    {
        if(!$result)
        {
            echo "<span class='text-danger' style='font-size:22px;'>"."<strong>"."No Notice  Found"."<a href='Notice.php'>"."Go Back"."</a>"."<strong>"."</span>";
        }
        else
        {
                echo $table;
        }
    }
    else
    {?>
        <div class="has-feedback col-xs-12 col-sm-8 col-lg-8 col-md-8 col-sm-offset-2 col-md-offset-2">
            <table align="center" class="table table-responsive box" style="border:1px #CCCCCC solid; margin-top:30px; color: #000;">
                            <tr>
                <td  class="warning" colspan="3" align="center"><span style="font-size:22px; color:#333; display:block;">
Daily Class Upload </span> </td>
            </tr>
         <tr class="info">
        <td align="right">Date&nbsp;</td>
        <td>:</td>
        <td>
        
          <input type="text" name="date" class="form-control" id="example1" style="width:280px; border-radius:0px;" placeholder="Date" autocomplete="off" value="<?php print date('d-m-Y')?>" />
     
          </td>
      </tr>

      <tr class="info">
            <td align="right" width="180"> Select Class &nbsp; </td>
            <td>:</td>
            <td>
             <select class="form-control" name="className" id="className" style="width:280px; border-radius:0px;">
                        <option>Select One</option>
                        <?php 
                            $select_class="SELECT * FROM `add_class`  ORDER BY `index` ASC";
                            $check_query=$db->select_query($select_class);
                            if($check_query){
                                while($fetch_class=$check_query->fetch_array())
                                {
                        ?><option value="<?php echo "$fetch_class[0]and$fetch_class[2]"?>"><?php echo $fetch_class[2];?></option>
                        <?php }}?>
             
             </select>
            
            </td>
          </tr>  


                    <tr class="info" >
                        <td align="right">Select Group</td>
                        <td>:</td>
                        <td >
                        <select class="form-control" name="groupname" id="groupname" style="width:280px; border-radius:0px;">
                       </select>
                        </td>
                </tr>  


                <tr class="info" >
                        <td align="right">Select Subject</td>
                        <td>:</td>
                        <td >
                        <select class="form-control" id="sub_name" name="sub_name" style="width:280px; border-radius:0px;">
                        </select>
                       
                        </td>
                </tr>   

                 <tr class="info">
                        <td align="right">Video Url</td>
                        <td>:</td>
                        <td >
                        <input type="text" class="form-control" autocomplete="off"   name="videoUrl" style=" border-radius:0px;" >
                        
                       
                        </td>
                </tr>

                 <tr class="info">
                        <td align="right">Teacher's Name</td>
                        <td>:</td>
                        <td >
                        <input type="text" class="form-control" autocomplete="off"   name="teacherName" style=" border-radius:0px;">
                        
                       
                        </td>
                </tr>

               

      <tr class="info">
        <td align="right">Title &nbsp;</td>
        <td>:</td>
        <td>
             <input type="text" name="title"  class="form-control" placeholder="৭ম শ্রেণির গণিত ১.১ সম্পূর্ণ |মূলদ ও অমূলদ সংখ্যা| পাটিগণিত | Class 7 Math 1.1 (complete)" autocomplete="off"  />
             
          </td>
      </tr>

   

    <tr class="info">
        <td align="right">  
Details &nbsp;</td>
        <td>:</td>
         <td>
           
            <textarea  name="descreption" class="form-control"  id="redactor"> </textarea>
           
            </td>

    </tr>

  




    <tr class="info">
            <td align="right" width="180"> File Upload &nbsp; </td>
            <td>:</td>
            <td><input type="file" name="file" accept="image/*"  />
            
            </td>
          </tr>  
    <tr>
                <td class="danger" colspan="3" align="center"><span>
                    <?php 
                        if(isset($msg))
                        {
                            echo "<strong>".$msg."</strong>";
                        }
                        else
                        {
                             echo "<strong>".$db->sms."</strong>";
                        }

                    ?>

                </span> </td>
            </tr>
          
    <tr>
                <td bgcolor="#f4f4f4" class="warning" colspan="3"align="center" >
                <?php if(!$chek_query){ ?>
                    <input type="submit" value="Add" name="add" class="btn btn-primary btn-sm" style="width:80px;" />
                    <?php } else {?>
                    <input type="submit" value="Update" name="Update" onClick="return confirm_click()" class="btn btn-primary btn-sm" style="width:80px;"/>
                    <?php } ?>
                    
                    <input type="submit" value="View" name="view" class="btn btn-primary btn-sm" style="width:80px;"/>
                                 
                    <input type="submit" value="Exit" name="Exit" class="btn btn-primary btn-sm" style="width:80px;"/>
               
                </td>
            </tr>
            </table>
        </div>
        <?php 
        } ?>
    </form>
    </body>
    </html>
    	<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>


<BR><BR>