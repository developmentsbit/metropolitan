<?php

	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();

	if(isset($_POST["add"]))
	{
		     

		$makeid=$db->withoutPrefix('questionadd','id','Q-','12');
	
	   	$insert="INSERT INTO `questionadd` (`id`,`class`,`subject`,`question`,`option1`,`option2`,`option3`,`option4`,`answer1`,`answer2`,`answer3`,`answer4`,`chapter_name`,`question_type`) VALUES('$makeid','".$_POST['className']."','".$_POST['subjectName']."','".$_POST['Question']."','".$_POST['Option1']."','".$_POST['Option2']."','".$_POST['Option3']."','".$_POST['Option4']."','".$_POST['Answer1']."','".$_POST['Answer2']."','".$_POST['Answer3']."','".$_POST['Answer4']."','".$_POST['chapter']."','".$_POST['questionType']."')";
	  
	   
	    $r=$db->link->query($insert);
	    if($r)
	    {
	    	print "<span style='color:green; font-size:18px;'> Successfully Added!!</span>";
	    }
	    else
	    {
	    	print "<span style='color:green; font-size:18px;'> Unsuccessfully !!</span>";
	    }
	}


	if(isset($_POST["addQuestionSetup"]))
	{
		         

		     
		$makeid=$db->withoutPrefix('examsetup','id','21','5');
	
	   	$insert="INSERT INTO `examsetup`(`id`,`Class_id`,`Subject_id`,`num_question`,`time`,`question_title`,`exam_type`,`Day`,`Month`,`Year`,`Hour`,`Minute`,`EndHour`,`EndMinute`,`Status`)
VALUES('$makeid','".$_POST['className']."','".$_POST['subjectName']."','".$_POST['num_of_question']."','".$_POST['time']."','".$_POST['title']."','".$_POST['type']."','".$_POST['Day']."','".$_POST['Month']."','".$_POST['Year']."','".$_POST['StartHour']."','".$_POST['StartMinute']."','".$_POST['EndHour']."','".$_POST['EndMinute']."','".$_POST['status']."')";
	  
	   
	    $r=$db->link->query($insert);
	    if($r)
	    {
	    	print "<span style='color:green; font-size:18px;'> Successfully Added!!</span>";
	    }
	    else
	    {
	    	print "<span style='color:green; font-size:18px;'> Unsuccessfully !!</span>";
	    }
	}

	   

	if(isset($_POST["editQuestionSetup"]))
	{
	
	
	   	$insert="REPLACE INTO `examsetup`(`id`,`Class_id`,`Subject_id`,`num_question`,`time`,`question_title`,`exam_type`,`Day`,`Month`,`Year`,`Hour`,`Minute`,`EndHour`,`EndMinute`,`Status`)
VALUES('".$_POST["editexamId"]."','".$_POST['className']."','".$_POST['subjectName']."','".$_POST['num_of_question']."','".$_POST['time']."','".$_POST['title']."','".$_POST['type']."','".$_POST['Day']."','".$_POST['Month']."','".$_POST['Year']."','".$_POST['StartHour']."','".$_POST['StartMinute']."','".$_POST['EndHour']."','".$_POST['EndMinute']."','".$_POST['status']."')";
	  

	    $r=$db->link->query($insert);
	    if($r)
	    {
	    	print "<span style='color:green; font-size:18px;'> Update Successfully!!</span>";
	    }
	    else
	    {
	    	print "<span style='color:green; font-size:18px;'> Unsuccessfully !!</span>";
	    }
	}




	if(isset($_POST["edit"]))
	{

	   	$insert="REPLACE INTO `questionadd` (`id`,`class`,`subject`,`question`,`option1`,`option2`,`option3`,`option4`,`answer1`,`answer2`,`answer3`,`answer4`,`chapter_name`,`question_type`) VALUES('".$_POST['qid']."','".$_POST['className']."','".$_POST['subjectName']."','".$_POST['Question']."','".$_POST['Option1']."','".$_POST['Option2']."','".$_POST['Option3']."','".$_POST['Option4']."','".$_POST['Answer1']."','".$_POST['Answer2']."','".$_POST['Answer3']."','".$_POST['Answer4']."','".$_POST['chapter']."','".$_POST['questionType']."')";
	   
	    $r=$db->link->query($insert);
	    if($r)
	    {
	    	print "Update Successfully!!";
	    }
	    else
	    {
	    	print "Update Unsuccessfully!!";
	    }
	}


if(isset($_POST["editChapter"]))
	{

	 	$insert="REPLACE INTO `addchapter` (`id`,`class_id`,`subject_id`,`chapter_name`) VALUE('".$_POST['editid']."','".$_POST['className']."','".$_POST['subjectName']."','".$_POST['chapter']."')";

	   
	    $r=$db->link->query($insert);
	    if($r)
	    {
	    	print "Update Successfully!!";
	    }
	    else
	    {
	    	print "Update Unsuccessfully!!";
	    }
	}




	if(isset($_POST["del"]))
	{
	    
	   	$insert="DELETE FROM `questionadd` WHERE `id`='".$_POST["question"]."'";
	   
	    $r=$db->link->query($insert);
	    if($r)
	    {
	    	print "<span style='color:green; font-size:18px;'> Delete Successfully !!</span>";
	    }
	    else
	    {
	    	print "<span style='color:green; font-size:18px;'> Unsuccessfully !!</span>";
	    }
	}



	if(isset($_POST["examdel"]))
	{
	    
	   	$insert="DELETE FROM `examsetup` WHERE `id`='".$_POST["examid"]."'";
	   	
	   
	    $r=$db->link->query($insert);
	    if($r)
	    {
	    	print "<span style='color:green; font-size:18px;'> Delete Successfully !!</span>";
	    }
	    else
	    {
	    	print "<span style='color:green; font-size:18px;'> Unsuccessfully !!</span>";
	    }
	}



	if(isset($_POST["chDel"]))
	{
	    
	   	$insert="DELETE FROM `addchapter` WHERE `id`='".$_POST["chID"]."'";
	   
	    $r=$db->link->query($insert);
	    if($r)
	    {
	    	print "<span style='color:green; font-size:18px;'> Delete Successfully !!</span>";
	    }
	    else
	    {
	    	print "<span style='color:green; font-size:18px;'> Unsuccessfully !!</span>";
	    }
	}



	if(isset($_POST["addChapter"]))
	{

		$makeid=$db->withoutPrefix('addchapter','id','Ch-','10');
	
	   	$insert="INSERT INTO `addchapter` (`id`,`class_id`,`subject_id`,`chapter_name`) VALUE('$makeid','".$_POST['className']."','".$_POST['subjectName']."','".$_POST['chapter']."')";


	  
	    $r=$db->link->query($insert);
	    if($r)
	    {
	    	print "<span style='color:green; font-size:18px;'> Successfully Added!!</span>";
	    }
	    else
	    {
	    	print "<span style='color:green; font-size:18px;'> Unsuccessfully !!</span>";
	    }
	}


if(isset($_POST["viewChapter"]))
	{

	$select="SELECT * FROM `addchapter` WHERE `class_id`='".$_POST["className"]."' AND `subject_id`='".$_POST["subjectName"]."'";
   
    $r=$db->link->query($select);
    if($r)
    {
    	?>
             <div class="form-row">
             <?php
             $i=1;
                while($fetch=$r->fetch_array())
                {


             ?>
    <div class="form-group col-md-3" style="min-height: 80px;">

        <div  class="col-md-12" style="font-size: 16px; font-weight: bold; min-height: 50px;"> <label>Q<?php print $i++;?>. <?php print $fetch[3];?>  </label> <label> <a href="addChapter.php?EditID=<?php print $fetch[0];?>" class="btn btn-info">Edit</a></label> <label><a href="#" onclick="deleteChapter('<?php print $fetch[0];?>')" class="btn btn-danger">Del</a></label>  </div> 
       


    </div>
    <?php
}
?>
    
    </div>


        <?php
    }
    else
    {
    	print "<span style='color:green; font-size:18px;'> Data Not Available!!</span>";
    }


}



if(isset($_POST["viewExamSetup"]))
	{

	$select="SELECT * FROM `examsetup` WHERE `Class_id`='".$_POST["className"]."' AND `Subject_id`='".$_POST["subjectName"]."'";
   
    $r=$db->link->query($select);
    if($r)
    {
    	?>
             <div class="container-fluid">
             <?php
             $i=1;
             ?>

               <div class="form-row" style="min-height: 80px; ">

             <?php
                while($fetch=$r->fetch_array())
                {


             ?>
  

        <div  class="col-md-4" style="font-size: 16px; font-weight: bold; min-height: 50px; background: #f4f4f4; padding: 5px;"> 

        <label>Title : <?php print $fetch[5];?>  </label> <br>
        <label>Time : <?php print $fetch[4];?> Minute ,  </label> 
        <label> Total Question : <?php print $fetch[3];?>  </label> 

        <label> <a href="SetupQuestionPaper.php?EditID=<?php print $fetch[0];?>" class="btn btn-info">Edit</a></label> 

        <label><a href="#" onclick="deleteExamType('<?php print $fetch[0];?>')" class="btn btn-danger">Del</a></label>  

        </div> 
       




    <?php
}
?>
    </div> 
    </div>


        <?php
    }
    else
    {
    	print "<span style='color:green; font-size:18px;'> Data Not Available!!</span>";
    }


}



?>