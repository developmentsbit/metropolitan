<?php

	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();


if(isset($_POST["viewQuestionReport"]))
{
   	$select="SELECT * FROM `questionadd` WHERE `class`='".$_POST["className"]."' AND `subject`='".$_POST["subjectName"]."'  AND `id` NOT IN (SELECT `QuestionID` FROM `questionpaper` WHERE `ExamTypeID`='".$_POST["examType"]."')";

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
    <div class="form-group col-md-6" style="min-height: 100px;">

        <div  class="col-md-12" style="font-size: 14px;"><label><input type="checkbox" class="questionNo" name="questionNo[]" value="<?php print $fetch[0];?>" checked="checked"></input></label> &nbsp; <label>Q<?php print $i++;?>.</label> <label><?php print $fetch[3];?>  </label> <label>   </div> 
        <div  class="col-md-6" style="min-height: 30px;">A)  <?php print $fetch[4];?> <?php if($fetch[8]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?> </div>
        <div  class="col-md-6" style="min-height: 30px;">B)  <?php print $fetch[5];?><?php if($fetch[9]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?> </div>
        <div  class="col-md-6" style="min-height: 30px;">C)  <?php print $fetch[6];?> <?php if($fetch[10]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?></div>
        <div  class="col-md-6" style="min-height: 30px;">D)  <?php print $fetch[7];?> <?php if($fetch[11]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?></div>

    </div>
    <?php
}
?>


  <div class="form-row">

    <div class="form-group col-md-12 text-center">
     
          <label>

          <input type="button" name="button" value="Save" class="btn btn-primary"onclick="qusAdd()" style="width: 200px;">

          </label>
         <label> 
    </div>
  </div> 



    </div>
        <?php
    }
    else
    {
    	print "<span style='color:green; font-size:18px;'> Data Not Available!!</span>";
    }
}



if(isset($_POST["viewQuestionPaper"]))
{

    $select="SELECT `questionpaper`.*,`questionadd`.`question` FROM `questionpaper` 
INNER JOIN `questionadd` ON `questionadd`.`id`=`questionpaper`.`QuestionID`
WHERE `ExamTypeID`='".$_POST["examType"]."'";

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
    <div class="form-group col-md-12" >

        <div  class="col-md-12" style="font-size: 14px;"><input type="checkbox" class="qusID" name="qusID[]" value="<?php print $fetch[0];?>"></input></label> &nbsp;  <label>Q<?php print $i++;?>.</label> <label><?php print $fetch[3];?>  </label>  </div> 
        
    </div>
    <?php
}
?>
    </div>

     <div class="form-row">

    <div class="form-group col-md-12 text-center">
     
          <label>

          <input type="button" name="button" value="Delete" class="btn btn-danger"onclick="delExamQuestion()" style="width: 200px;">

          </label>
         <label> 
    </div>
  </div> 



        <?php
    }
    else
    {
        print "<span style='color:green; font-size:18px;'> Data Not Available!!</span>";
    }
}


if(isset($_POST["saveQuestion"]))
{

    $qus = count($_POST["questionNo"]);
    for($i=0;$i<$qus;$i++)
    {
           
        $select="INSERT INTO `questionpaper`(`ExamTypeID`,`QuestionID`) VALUES('".$_POST["examType"]."','".$_POST["questionNo"][$i]."')";
        $db->link->query($select);

    }


}


if(isset($_POST["delquestion"]))
{

    $qus = count($_POST["qusID"]);
    for($i=0;$i<$qus;$i++)
    {
           
        $select="DELETE FROM `questionpaper` WHERE `SL`='".$_POST["qusID"][$i]."'";
        $db->link->query($select);

    }


}




if(isset($_POST["viewExamQuestionReport"]))
{


 function numberSystem($x)
        {
            switch($x){
                        
                        case"0":return"০";
                        case"1":return"০১";
                        case"2":return"০২";
                        case"3":return"০৩";
                        case"4":return"০৪";
                        case"5":return"০৫";
                        case"6":return"০৬";
                        case"7":return"০৭";
                        case"8":return"০৮";
                        case"9":return"০৯";
                        case"10":return"১০";
                        case"11":return"১১";
                        case"12":return"১২";
                        case"13":return"১৩";
                        case"14":return"১৪";
                        case"15":return"১৫";
                        case"16":return"১৬";
                        case"17":return"১৭";
                        case"18":return"১৮";
                        case"19":return"১৯";
                        case"20":return"২০";
                        case"21":return"২১";
                        case"22":return"২২";
                        case"23":return"২৩";
                        case"24":return"২৪";
                        case"25":return"২৫";
                        case"26":return"২৬";
                        case"27":return"২৭";
                        case"28":return"২৮";
                        case"29":return"২৯";
                        case"30":return"৩০";
             }
        }


    $select="SELECT * FROM `questionadd` INNER JOIN `questionpaper` ON `questionpaper`.`QuestionID`=`questionadd`.`id` WHERE `questionpaper`.`ExamTypeID`='".$_POST["examType"]."' ";
    $r=$db->link->query($select);
    if($r)
    {
        ?>
             <div class="form-row">

             <table width="100%" style="  padding: 0px; " align="center" >
        <tr>    
                <td width="10%"></td>
                <td>
                        <div style="float: left; clear: right; width: 15%; text-align: center;  ">  
                            <img src="all_image/logoSDMS2015.png" style="max-width: 150px; max-height: 100px; " /> 
                        </div>
                            

                        <div style="float: left; clear: right; text-align: center; width: 70% ">   
                                <ul>
                    
                                <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:30px; list-style: none;">আল হেলাল একাডেমী, সোনাগাজী </li>

                               <li style="list-style: none; ">

                                 <!--    <p style="font-size:16px;font-family:Arial, Helvetica, sans-serif">মেইন রোড, সোনাগাজী, ফেনী। 
                                </p> -->

                                </li>

                                <li style=" list-style: none; font-size:14px;font-family:Arial, Helvetica, sans-serif">www.alhelalacademy.edu.bd<br>01728563480, info@alhelalacademy.edu.bd  </li>
                             </ul> 

                      </div>

                      <div style="float: right;  width: 15%; text-align: center;  ">  
                            
                        </div>
                </td>
                <td width="10%"></td>
        </tr>

          
   <tr>
        <td colspan="3" align="center">
            <label> 
            Class : <?php  $SelectclassName="SELECT * FROM `add_class` WHERE `id`='".$_POST["className"]."'";

            $queryClass=$db->link->query($SelectclassName);
            $queryClass=$queryClass->fetch_array();
            print  $queryClass[2];

             ?>,

             </label>
            <label> Subject : <?php  $SelectSubJect="SELECT * FROM `onlineexamsubject` WHERE `Subject_ID`='".$_POST["subjectName"]."'";
           
            $querysub=$db->link->query($SelectSubJect);
            $querysub=$querysub->fetch_array();
            print  $querysub[2];

             ?>,  </label>
            <label> Exam Title : <?php  $SelectExam="SELECT * FROM `examsetup` WHERE `id`='".$_POST["examType"]."'";
           
            $queryexamType=$db->link->query($SelectExam);
            $queryExam=$queryexamType->fetch_array();
            print  $queryExam[5];

             ?></label>
        </td>
 
        </tr>

         <tr>
        <td colspan="3" align="center">
            <label> 
            Time : <?php  print  $queryExam[4];
             ?>,

             </label>
            <label> Marks : <?php  print  $queryExam[3];

             ?> </label>
        </td>
 
        </tr>




        <tr>
        <td colspan="3" align="center">
            <span style="font-size: 16px; text-align: center;"> ....................................................................................................................................................................... </span>
        </td>
 
        </tr>
    

</table>
             <?php
             $i=1;
                while($fetch=$r->fetch_array())
                {
             ?>
    <div class="form-group col-md-6 col-xs-6 col-sm-6" style="min-height: 70px;">

        <div  class="col-md-12" style="font-size: 14px;"><label style="font-size: 16px;"><?php  echo  $sl=numberSystem($i++); ?>.</label> <label><?php print $fetch[3];?>  </label> <label>   </div> 
        <div  class="col-md-6 col-xs-6 col-sm-6 " style="min-height: 30px;">A)  <?php print $fetch[4];?> <?php if($fetch[8]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?> </div>
        <div  class="col-md-6 col-xs-6 col-sm-6" style="min-height: 30px;">B)  <?php print $fetch[5];?><?php if($fetch[9]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?> </div>
        <div  class="col-md-6 col-xs-6 col-sm-6" style="min-height: 30px;">C)  <?php print $fetch[6];?> <?php if($fetch[10]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?></div>
        <div  class="col-md-6 col-xs-6 col-sm-6" style="min-height: 30px;">D)  <?php print $fetch[7];?> <?php if($fetch[11]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?></div>

    </div>
    <?php
}
?>


  <div class="form-row">

    <div class="form-group col-md-12 text-center">
     
          <label>

          <input type="button" name="button" value="Print" class="btn btn-primary print" style="width: 200px;" onclick="window.print()">

          </label>
         <label> 
    </div>
  </div> 



    </div>
        <?php
    }
    else
    {
        print "<span style='color:green; font-size:18px;'> Data Not Available!!</span>";
    }



}




if(isset($_POST["viewAnswerSheet"]))
{


 function numberSystem($x)
        {
            switch($x){
                        
                        case"0":return"০";
                        case"1":return"০১";
                        case"2":return"০২";
                        case"3":return"০৩";
                        case"4":return"০৪";
                        case"5":return"০৫";
                        case"6":return"০৬";
                        case"7":return"০৭";
                        case"8":return"০৮";
                        case"9":return"০৯";
                        case"10":return"১০";
                        case"11":return"১১";
                        case"12":return"১২";
                        case"13":return"১৩";
                        case"14":return"১৪";
                        case"15":return"১৫";
                        case"16":return"১৬";
                        case"17":return"১৭";
                        case"18":return"১৮";
                        case"19":return"১৯";
                        case"20":return"২০";
                        case"21":return"২১";
                        case"22":return"২২";
                        case"23":return"২৩";
                        case"24":return"২৪";
                        case"25":return"২৫";
                        case"26":return"২৬";
                        case"27":return"২৭";
                        case"28":return"২৮";
                        case"29":return"২৯";
                        case"30":return"৩০";
             }
        }


    $select="SELECT * FROM `questionadd` INNER JOIN `questionpaper` ON `questionpaper`.`QuestionID`=`questionadd`.`id` WHERE `questionpaper`.`ExamTypeID`='".$_POST["examType"]."' ";
    $r=$db->link->query($select);
    if($r)
    {
        ?>

        <h3>www.alhelalacademy.edu.bd/exam/qspaper.php?exid=<?php print $_POST["examType"]?> </h3>
             <div class="form-row">

             <table width="100%" style="  padding: 0px; " align="center" >
        <tr>    
                <td width="10%"></td>
                <td>
                        <div style="float: left; clear: right; width: 15%; text-align: center;  ">  
                            <img src="all_image/logoSDMS2015.png" style="max-width: 150px; max-height: 100px; " /> 
                        </div>
                            

                        <div style="float: left; clear: right; text-align: center; width: 70% ">   
                                <ul>
                    
                                <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:30px; list-style: none;">আল হেলাল একাডেমী, সোনাগাজী </li>

                               <li style="list-style: none; ">

                                 <!--    <p style="font-size:16px;font-family:Arial, Helvetica, sans-serif">মেইন রোড, সোনাগাজী, ফেনী। 
                                </p> -->

                                </li>

                                <li style=" list-style: none; font-size:14px;font-family:Arial, Helvetica, sans-serif">www.alhelalacademy.edu.bd<br>01728563480, info@alhelalacademy.edu.bd  </li>
                             </ul> 

                      </div>

                      <div style="float: right;  width: 15%; text-align: center;  ">  
                            
                        </div>
                </td>
                <td width="10%"></td>
        </tr>

          
   <tr>
        <td colspan="3" align="center">
            <label> 
            Class : <?php  $SelectclassName="SELECT * FROM `add_class` WHERE `id`='".$_POST["className"]."'";

            $queryClass=$db->link->query($SelectclassName);
            $queryClass=$queryClass->fetch_array();
            print  $queryClass[2];

             ?>,

             </label>
            <label> Subject : <?php  $SelectSubJect="SELECT * FROM `onlineexamsubject` WHERE `Subject_ID`='".$_POST["subjectName"]."'";
           
            $querysub=$db->link->query($SelectSubJect);
            $querysub=$querysub->fetch_array();
            print  $querysub[2];

             ?>,  </label>
            <label> Exam Title : <?php  $SelectExam="SELECT * FROM `examsetup` WHERE `id`='".$_POST["examType"]."'";
           
            $queryexamType=$db->link->query($SelectExam);
            $queryExam=$queryexamType->fetch_array();
            print  $queryExam[5];

             ?></label>
        </td>
 
        </tr>

         <tr>
        <td colspan="3" align="center">
            <label> 
            Time : <?php  print  $queryExam[4];
             ?>,

             </label>
            <label> Marks : <?php  print  $queryExam[3];

             ?> </label>
        </td>
 
        </tr>




        <tr>
        <td colspan="3" align="center">
            <span style="font-size: 16px; text-align: center;"> ....................................................................................................................................................................... </span>
        </td>
 
        </tr>
    

</table>
             <?php
             $i=1;
                while($fetch=$r->fetch_array())
                {
             ?>
    <div class="form-group col-md-6 col-xs-6 col-sm-6" style="min-height: 70px;">

        <div  class="col-md-12" style="font-size: 14px;"><label style="font-size: 16px;"><?php  echo  $sl=numberSystem($i++); ?>.</label> <label><?php print $fetch[3];?>  </label> <label>   </div> 
        <div  class="col-md-6 col-xs-6 col-sm-6 " style="min-height: 30px;">A)  <?php print $fetch[4];?> </div>
        <div  class="col-md-6 col-xs-6 col-sm-6" style="min-height: 30px;">B)  <?php print $fetch[5];?> </div>
        <div  class="col-md-6 col-xs-6 col-sm-6" style="min-height: 30px;">C)  <?php print $fetch[6];?> </div>
        <div  class="col-md-6 col-xs-6 col-sm-6" style="min-height: 30px;">D)  <?php print $fetch[7];?> </div>

    </div>
    <?php
}
?>


  <div class="form-row">

    <div class="form-group col-md-12 text-center">
     
          <label>

          <input type="button" name="button" value="Print" class="btn btn-primary print" style="width: 200px;" onclick="window.print()">

          </label>
         <label> 
    </div>
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

