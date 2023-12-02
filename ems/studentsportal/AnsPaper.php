<?php
// error_reporting(1);
    
  require_once("../db_connect/config.php");
  require_once("../db_connect/conect.php");
  date_default_timezone_set("Asia/Dhaka");
  $db = new database();
  
if(isset($_GET["examID"]))
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


    $select="SELECT * FROM `questionadd` INNER JOIN `questionpaper` ON `questionpaper`.`QuestionID`=`questionadd`.`id` WHERE `questionpaper`.`ExamTypeID`='".$_GET["examID"]."' ORDER BY `questionadd`.`id` ASC  ";
    $r=$db->link->query($select);
    if($r)
    {
        ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="all_image/shortcurt_iconSDMS2015.png" />
    <title>Result Sheet</title>

    <script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
  
    @media print{
      .print{
        display:none;
      }

</style>
    </head>
    <body>




             <div class="container-fluid">

             <table width="100%" style="  padding: 0px; " align="center" >
        <tr>    
                <td width="10%"></td>
                <td>
                      <!--   <div style="float: left; clear: right; width: 15%; text-align: center;  ">  
                            <img src="../admin/all_image/logoSDMS2015.png" style="max-width: 150px; max-height: 100px; " /> 
                        </div> -->
                            

                        <div style="float: left; clear: right; text-align: center; width: 100% ">   
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
      <td colspan="5">
                                                
      <?php  $SelectExam="SELECT `examsetup`.`question_title`,`examsetup`.`time`,`examsetup`.`num_question`,`add_class`.`class_name`,`onlineexamsubject`.`Subject_Name` FROM `examsetup` 
INNER JOIN `add_class` ON `add_class`.`id` = `examsetup`.`Class_id`
INNER JOIN `onlineexamsubject` ON `onlineexamsubject`.`Subject_ID`=`examsetup`.`Subject_id`
WHERE `examsetup`.`id`='".$_GET["examID"]."'";
           
            $queryexamType=$db->link->query($SelectExam);
            $queryExam=$queryexamType->fetch_array();
    
             
            
            

             ?>
                                                
                                                    <table class="table table-hover table-bordered">
                                                        <tr>
                                                                <td><?php print "Class : ".$queryExam['3']; ?></td>
                                                                <td> Subject : <?php  
            print  $queryExam[4];

             ?></td>
             
                                               <td> Exam Type : <?php  
            print  $queryExam[0];

             ?></td>
             
             
                                                                

                                                        </tr>
                                                    </table>
                                     </td>
                            </tr>

                            <tr>
                                  <td colspan="5">
                                    

                                     <table class="table table-hover table-bordered">
                                                        <tr>
                                                        <td>
                                                        <?php
            $std="SELECT `student_personal_info`.`student_name`,`running_student_info`.`class_roll` FROM `student_personal_info` 
INNER JOIN  `running_student_info` ON `running_student_info`.`student_id`=`student_personal_info`.`id`
WHERE `student_personal_info`.`id`='".$_GET['StdID']."'";
            $stdQuery=$db->link->query($std);
          
                $stdfetchinfo=$stdQuery->fetch_array();
                print "<b> Student Name : ".$stdfetchinfo[0].'</b>';
               
             
            
        ?>
</td>
                                                            <td>

                                                            <?php  print "<b>Student Roll : ".$stdfetchinfo[1].'</b>';?> </td>
                                                        </tr>

                                                        </table>
                                  </td>
                            </tr>


</table>
             <?php
             $i=1;
                while($fetch=$r->fetch_array())
                {

                  $ans="SELECT *  FROM `answer_sheet`  WHERE `Exam_ID`='".$_GET["examID"]."' AND `Student_ID`='".$_GET["StdID"]."' AND `Qiestion_ID`='$fetch[0]'";
                  $qans=$db->link->query($ans);
                  $fetchAns=$qans->fetch_array();

                 


             ?> 
    <div class="form-group col-md-6 col-xs-6 col-sm-6" style="min-height: 50px; padding: 0px;" >

        <div  class="col-md-12" style="font-size: 14px;"><label style="font-size: 16px;"><?php  echo  $sl=numberSystem($i++); ?>.</label> <label><?php print $fetch[3];?>  </label> <label>   </div> 
        <div  class="col-md-6 col-xs-6 col-sm-6 " style="min-height: 30px;">


<label>  <input type="radio" name="<?php print $fetch[0];?>" 
<?php if($fetchAns[5]=="A"){?>
 checked="checked" 
 <?php
}
else
{
  ?>
 disabled="disabled"
 <?php
}
 ?>

 ></input> </label> 


<label> <?php print $fetch[4];?> <?php if($fetch[8]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?> </label>
        </div>

        <div  class="col-md-6 col-xs-6 col-sm-6" style="min-height: 30px;">

<label>  <input type="radio" name="<?php print $fetch[0];?>" 
<?php if($fetchAns[5]=="B"){?>
 checked="checked" 
 <?php
}
else
{
  ?>
 disabled="disabled"
 <?php
}
 ?>

 ></input> </label> 





<label> <?php print $fetch[5];?><?php if($fetch[9]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?></label>

       </div>
        <div  class="col-md-6 col-xs-6 col-sm-6" style="min-height: 30px;">


<label>  <input type="radio" name="<?php print $fetch[0];?>" 
<?php if($fetchAns[5]=="C"){?>
 checked="checked" 
 <?php
}
else
{
  ?>
 disabled="disabled"
 <?php
}
 ?>

 ></input> </label> 

<label> <?php print $fetch[6];?> <?php if($fetch[10]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?></label>

      </div>
        <div  class="col-md-6 col-xs-6 col-sm-6" style="min-height: 30px;">

<label>  <input type="radio" name="<?php print $fetch[0];?>" 
<?php if($fetchAns[5]=="D"){?>
 checked="checked" 
 <?php
}
else
{
  ?>
 disabled="disabled"
 <?php
}
 ?>

 ></input> </label> 



<label> <?php print $fetch[7];?> <?php if($fetch[11]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?></label>
    </div>

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

    </body>
 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>




        <?php
    }
    else
    {
        print "<span style='color:green; font-size:18px;'> Data Not Available!!</span>";
    }



}


?>

