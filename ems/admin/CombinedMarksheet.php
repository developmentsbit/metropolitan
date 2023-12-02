  <?php
error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
	
		if(isset($_POST["ResultGenerate"])){
			$classID=explode('and',$_POST["className"]);
			$examtype=explode('and',$_POST["examtype"]);
			$Session=$_POST["Session"];
			$groupname = explode('and',$_POST["groupname"]);
			$stdRoll=$_POST["stdId"];
			if(isset($classID) and $classID != "Select One" and isset($examtype) and $examtype != "Select Exam Name" and isset($Session) and $Session != "Select Session" and isset($stdRoll) and !empty($stdRoll)){
					print "<script>location='viewCombinedMarksheet.php?clID=$classID[0]&exId=$examtype[0]&session=$Session&gpna=$groupname[0]&stdRoll=$stdRoll'</script>";
			}else{
					print "<script>window.close();</script>";
			}
	}
 	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Show Result Sheet</title>

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
	
	
	
	$(document).ready(function(){
	$('#stdId').keyup(function(){
		var iddd = $(this).val();
		var forMisss = "dd";
		if(iddd != ""){
			$.ajax({
				url : "autoComSTd.php",
				data : {iddd:iddd,forMisss:forMisss},
				type : "POST",
				success:function(data){
					$('#idlist').fadeIn();
					$('#idlist').html(data);
				}
			});
		}
		
	});
	
		$(document).on('click','li',function(){
			$('#stdId').val($(this).text());
			$('#idlist').fadeOut();
			showIdby();
		});
});


</script>
	 <style>
	 
	.ui-autocomplete {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  float: left;
  display: none;
  min-width: 300px;
  _width: 160px;
  padding: 4px 0 0 5px;
  margin: 2px 0 0 15px;
  list-style: none;
  background-color: #ffffff;
  border-color: #ccc;
  border-color: rgba(0, 0, 0, 0.2);
  border-style: solid;
  border-width: 1px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  *border-right-width: 2px;
  *border-bottom-width: 2px;

  .ui-menu-item > a.ui-corner-all {
    display: block;
    padding: 3px 15px;
    clear: both;
    font-weight: normal;
    line-height: 18px;
    color: #555555;
    white-space: nowrap;

    &.ui-state-hover, &.ui-state-active {
      color: #ffffff;
      text-decoration: none;
      background-color: #0088cc;
      border-radius: 0px;
      -webkit-border-radius: 0px;
      -moz-border-radius: 0px;
      background-image: none;
    }
  }
}
 </style>

    </head>

  <body>


    <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: uppercase;"><b>Show Marksheet</b></div>
  <div class="panel-body">

    <form name="teacherinfo" action="" method="post"  enctype="multipart/form-data" class="form-horizontal marksEditEntry" >
      <div class="col-md-5 col-md-offset-4" id="AddMarksStep1" style="margin-top: 20px;">


    <div class="form-group">
    <label >Select Class :</label>
    <select class="form-control" name="className" id="className" style="border-radius: 0px; height: 40px;">
        <option>Select One</option>
                        <?php 
                            $select_class="SELECT * FROM `add_class` GROUP BY `id` ORDER BY `class_name` ASC";
                            $check_query=$db->select_query($select_class);
                            if($check_query){
                                while($fetch_class=$check_query->fetch_array())
                                {
                        ?>
                        <option value="<?php echo "$fetch_class[0]and$fetch_class[2]"?>"><?php echo $fetch_class[2];?></option><span id="item_result"></span>
                        <?php } } else {?>
                        <option></option>
                        <?php } ?>
    </select>

  </div> 


      <div class="form-group">
    <label >Group Name :</label>
    <select name="groupname" id="groupname" class="form-control" style="border-radius:0px; height: 40px;">
   </select>

  </div>  



      <div class="form-group">
    <label >Session :</label>

    <select class="form-control" id="Session" name="Session" style=" border-radius:0px; height: 40px;">
                        <option>Select Session</option>
                      <?php 
                $sessionsql = "SELECT `session` FROM `result` GROUP BY `result`.`session` ORDER BY `result`.`session` DESC";
                $result = $db->select_query($sessionsql);
                  if($result > 0){
                    
                    while($fetchsession = $result->fetch_array()){
                    $str = strlen($fetchsession[0]);
                      if($str >5){
            ?>
                
                <option><?php print $fetchsession[0];?></option>
                <?php   } } } ?>
                
                <?php
                      $sessionsql = "SELECT `session` FROM `result` GROUP BY `result`.`session` ORDER BY `result`.`session` DESC";
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


        <div class="form-group">
    <label >Student Roll  :</label>
    <input type="text" autocomplete="off" name="stdId" class="form-control" id="stdId" placeholder='Student Roll' style=" border-radius:0px; height: 40px;"/>
    <div id="idlist" class="ui-autocomplete" style="text-align:left"></div>

  </div>  



  <div class="form-group">
    <strong style="font-weight:bold; font-size:15px"><span id="showMsg" class="text-danger"></span></strong>
     <strong id="runnigmsg" class="text-danger" style="font-weight:bold; font-size:15px"></strong>
     <br>
     <center><input type="submit" name="ResultGenerate" value="Show Marksheet" class="btn btn-info btn-md" style="border-radius: 0px;" formtarget="_blank"></center>
    
  </div>



  </div>



     </form>



  </div>
</div>
  
</div>





 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
