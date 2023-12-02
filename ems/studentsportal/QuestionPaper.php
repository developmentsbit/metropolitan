
<?php
@session_start();
date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database(); 

$selectExam="SELECT * FROM `examsetup`  WHERE `id`='".$_GET['exam']."' AND `Status`='Active'";
$queryExam=$db->link->query($selectExam);
if($queryExam->num_rows>0)
{
  $fetch_exam=$queryExam->fetch_array();


  $endtime=$fetch_exam['Month'].' '.$fetch_exam['Day'].', '.$fetch_exam['Year'].' '.$fetch_exam['EndHour'].':'.$fetch_exam['EndMinute'].':00';



  $startTime=$fetch_exam['Month'].' '.$fetch_exam['Day'].', '.$fetch_exam['Year'].' '.$fetch_exam['Hour'].':'.$fetch_exam['Minute'].':00';




  // if($_GET["exam"]=="Ex-000000003" || $_GET["exam"]=="Ex-000000011"  || $_GET["exam"]=="Ex-000000019"   || $_GET["exam"]=="Ex-000000037"  || $_GET["exam"]=="Ex-000000041" || $_GET["exam"]=="Ex-000000038" || $_GET["exam"]=="Ex-000000054" || $_GET["exam"]=="Ex-000000061" || $_GET["exam"]=="Ex-000000058")
        // {


          

?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compitable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Dashboard</title>
    <!--Bootstarp-->
    <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
    <link rel="stylesheet" href="textEdit/redactor/redactor.css" />
    <link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.x-git.min.js"></script>
    <script src="textEdit/redactor/redactor.min.js"></script>
    <script type="text/javascript" src="../js/loading/pace.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<body>

<style>
p {
  text-align: center;
  font-size: 20px;
  margin-top: 0px;
}
</style>
</head>
<body>

<p id="demo"></p>

<p id="demo3"></p>

<p id="demo5">
    <table class='table table-hover'>
        <tr>
        <td  align="center" style="font-size:20px;">
            <label> 
            <?php  $SelectExam="SELECT `examsetup`.`question_title`,`examsetup`.`time`,`examsetup`.`num_question`,`add_class`.`class_name`,`onlineexamsubject`.`Subject_Name` FROM `examsetup` 
INNER JOIN `add_class` ON `add_class`.`id` = `examsetup`.`Class_id`
INNER JOIN `onlineexamsubject` ON `onlineexamsubject`.`Subject_ID`=`examsetup`.`Subject_id`
WHERE `examsetup`.`id`='".$_GET["exam"]."'";
           
            $queryexamType=$db->link->query($SelectExam);
            $queryExam=$queryexamType->fetch_array();
    
             
            print "Class : ".$queryExam['3'];
            

             ?>,

             </label>

            <label> Subject : <?php  
            print  $queryExam[4];

             ?>,  </label>
            <label> Exam Title : <?php  
            print  $queryExam[0];

             ?></label>
        </td>
 
        </tr>
        
          <tr>
        <td align="center"> 
        <?php
            $std="SELECT `student_personal_info`.`student_name`,`running_student_info`.`class_roll` FROM `student_personal_info` 
INNER JOIN  `running_student_info` ON `running_student_info`.`student_id`=`student_personal_info`.`id`
WHERE `student_personal_info`.`id`='".$_GET['StdID']."'";
            $stdQuery=$db->link->query($std);
            if($stdQuery)
            {
                $stdfetchinfo=$stdQuery->fetch_array();
                print "<b> <label><h3>Student Name : ".$stdfetchinfo[0].', </h3></label></b>';
                print "<b> <label><h3>Student Roll : ".$stdfetchinfo[1].'</h3></label></b>';
             
            }
        ?>

            <hr style="border: 1px #000 dotted;">
        </td>
 
        </tr>
    </table>
</p>
 


<script>
// Set the date we're counting down to
  var now = new Date().getTime();
var counttime = new Date('<?php print $endtime;?>').getTime();

if(counttime>now)
{

var countDownDate = new Date('<?php print $startTime;?>').getTime();
var x = setInterval(function() {
$('#questionID').hide();
  // Get today's date and time
  var now = new Date().getTime();
      //location.reload();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML ='<div class="container-fluid"><h1>আল হেলাল একাডেমী, সোনাগাজী </h1> <br> www.alhelalacademy.edu.bd <br> 01728563480, info@alhelalacademy.edu.bd <br>'+"পরীক্ষা শুরুর সময় <br> <h1>"+ days + " Day " + hours + " Hour " + minutes + " Minute  " + seconds + " Second"+"</div>";
  //alert("ccccccc");
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    //document.getElementById("demo").innerHTML = "EXPIRED";
  
    $('#questionID').show();
    $('#demo').hide();
    $('#demo5').hide();
    
    ExamTimeStart();
    

  }
}, 1000);


function ExamTimeStart()
{
    var sbit = setInterval(function() {
     var now = new Date().getTime();
      

     var distance = counttime - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
      // Output the result in an element with id="demo"
      document.getElementById("demo1").innerHTML =" <h4> পরীক্ষার সমাপ্তি সময় <p style='color:#ff0000;'>"+ minutes + " Minute  " + seconds +" Second </p></h4>";

      if (distance < 0) {
        clearInterval(sbit);

          $('#questionID').hide();
           $('#demo1').hide();
          
           location.reload();
      }

    }, 1000);
}
   
}
else
{
    document.getElementById("demo3").innerHTML =" <h3> পরীক্ষার সময় শেষ <br> <a href='result.php?examID=<?php print $_GET['exam']?>' target='_blank' >Exam Result </a> <h3><br>";    
}


// onselectstart="return false";
//  oncontextmenu="return false";
//   ondragstart="return false";


function SelectedAns(ans)
{
        

        var val = $('#'+ans).val();
        var exam = $('#exam').val();
        var StdID = $('#StdID').val();
         
        var answer="answer";
        
        if(val !="")
        {
            $.ajax({
                url:"ajaxAddAns.php",
                type:"POST",
                data :{answer:answer,val:val,exam:exam,StdID:StdID},
                cache:false,
                success:function(data)
                {

                }
                
            });
        }


         
}

</script>

</body>
</html>


<?php




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


    $select="SELECT * FROM `questionadd` INNER JOIN `questionpaper` ON `questionpaper`.`QuestionID`=`questionadd`.`id` WHERE `questionpaper`.`ExamTypeID`='".$_GET["exam"]."' order by rand() ";
  //  print  $select;

    $r=$db->link->query($select);
    if($r)
    {
        ?>

        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compitable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Question Paper</title>
    <!--Bootstarp-->
  <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
    <link rel="stylesheet" href="textEdit/redactor/redactor.css" />
    <link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.x-git.min.js"></script>
    <script src="textEdit/redactor/redactor.min.js"></script>
    <script type="text/javascript" src="../js/loading/pace.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<body>

             <div class="container-fluid" id="questionID" style="display: none;">

             <input type="hidden" value="<?php print $_GET["exam"]?>" name="exam" id="exam"></input>
             <input type="hidden" value="<?php print $_GET["StdID"]?>" name="StdID" id="StdID"></input>

        <table width="100%" style="  padding: 0px; " align="center" >
        <tr>    
               
                <td>
                        

                        <div class="container-fluid txt-center" >   
                                <ul style="text-align: center">
                    
                                <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:24px; list-style: none;">আল হেলাল একাডেমী, সোনাগাজী </li>

                               <li style="list-style: none; ">

                                 <!--    <p style="font-size:16px;font-family:Arial, Helvetica, sans-serif">মেইন রোড, সোনাগাজী, ফেনী। 
                                </p> -->

                                </li>

                                <li style=" list-style: none; font-size:14px;font-family:Arial, Helvetica, sans-serif">www.alhelalacademy.edu.bd<br>01728563480, info@alhelalacademy.edu.bd  </li>
                             </ul> 

                      </div>

                     
                </td>
            
        </tr>
        <tr>
            
            <td> <p id="demo1"></p></td>
        </tr>

          
   <tr>
        <td  align="center">
            <label> 
            <?php  $SelectExam="SELECT `examsetup`.`question_title`,`examsetup`.`time`,`examsetup`.`num_question`,`add_class`.`class_name`,`onlineexamsubject`.`Subject_Name` FROM `examsetup` 
INNER JOIN `add_class` ON `add_class`.`id` = `examsetup`.`Class_id`
INNER JOIN `onlineexamsubject` ON `onlineexamsubject`.`Subject_ID`=`examsetup`.`Subject_id`
WHERE `examsetup`.`id`='".$_GET["exam"]."'";
           
            $queryexamType=$db->link->query($SelectExam);
            $queryExam=$queryexamType->fetch_array();
    
             
            print "Class : ".$queryExam['3'];
            

             ?>,

             </label>

            <label> Subject : <?php  
            print  $queryExam[4];

             ?>,  </label>
            <label> Exam Title : <?php  
            print  $queryExam[0];

             ?></label>
        </td>
 
        </tr>

         <tr>
        <td align="center">
            <label> 
            Time : <?php  print    $queryExam[1];

             ?>,

             </label>
            <label> Marks : <?php  print   $queryExam[2];


             ?> </label>
        </td>
 
        </tr>




        <tr>
        <td align="center"> 
        <?php
            $std="SELECT `student_personal_info`.`student_name`,`running_student_info`.`class_roll` FROM `student_personal_info` 
INNER JOIN  `running_student_info` ON `running_student_info`.`student_id`=`student_personal_info`.`id`
WHERE `student_personal_info`.`id`='".$_GET['StdID']."'";
            $stdQuery=$db->link->query($std);
            if($stdQuery)
            {
                $stdfetchinfo=$stdQuery->fetch_array();
                print "<b> <label><h3>Student Name : ".$stdfetchinfo[0].', </h3></label></b>';
                print "<b> <label><h3>Student Roll : ".$stdfetchinfo[1].'</h3></label></b>';
             
            }
        ?>
          <h3 style="color: #ff0000; text-align: center;" >    (সঠিক উত্তরের বৃত্তটিতে ক্লিক কর) </h3>

            <hr style="border: 1px #000 dotted;">
        </td>
 
        </tr>

    

</table>


             <?php
             $i=1;
                while($fetch=$r->fetch_array())
                {
             ?>
    
    <div class="form-group col-md-6 " style="min-height: 50px;">

        <div  class="col-md-12" style="font-size: 14px;"><label style="font-size: 16px; vertical-align: top;"><?php  echo  $sl=numberSystem($i++); ?>.</label>  <label><?php print $fetch[3];?>  </label>   </div> 

        <div  class="col-md-6" style="min-height: 30px;"> <label>

        <input type="radio" value="<?php print $fetch[0].'and'.$fetch[8].'and'.'A';?>" name="<?php print $fetch[0];?>" id="<?php print $fetch[0].'1';?>"  onclick="return SelectedAns('<?php print $fetch[0].'1';?>')"  style='height:18px; width:18px;  border: 3px #000 solid;'>
        </input>&nbsp;&nbsp;</label>

       <label>ক)  <?php print $fetch[4];?>   </label> </div>

        <div  class="col-md-6 " style="min-height: 30px;"><label>

        <input type="radio" value="<?php print $fetch[0].'and'.$fetch[9].'and'.'B';?>" name="<?php print $fetch[0];?>" id="<?php print $fetch[0].'2';?>" onclick="return SelectedAns('<?php print $fetch[0].'2';?>')"  style='height:18px; width:18px;  border: 3px #000 solid;'></input>&nbsp;&nbsp;</label>
 <label>  খ)  <?php print $fetch[5];?> </label></div>

        <div  class="col-md-6 " style="min-height: 30px;"><label>

        <input type="radio" value="<?php print $fetch[0].'and'.$fetch[10].'and'.'C';?>" name="<?php print $fetch[0];?>" id="<?php print $fetch[0].'3';?>" onclick="return SelectedAns('<?php print $fetch[0].'3';?>')" style='height:18px; width:18px;  border: 3px #000 solid;'></input>&nbsp;&nbsp;</label>
 <label>  গ)  <?php print $fetch[6];?> </label></div>

        <div  class="col-md-6 " style="min-height: 30px;"><label>

        <input type="radio" value="<?php print $fetch[0].'and'.$fetch[11].'and'.'D';?>" name="<?php print $fetch[0];?>"  id="<?php print $fetch[0].'4';?>" onclick="return SelectedAns('<?php print $fetch[0].'4';?>')" style='height:18px; width:18px;  border: 3px #000 solid;'></input>&nbsp;&nbsp;</label>
   <label>  ঘ)  <?php print $fetch[7];?> </label></div>


    </div>
 <?php
}
?>


  <div class="form-row">
    <div class="form-group col-md-12 text-center">
          <label>
          <input type="button" name="Submit" value="Submit" class="btn btn-success " style="width: 200px;">

          </label>
         
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
        else
        {
              print "<script>alert('Invlide Exam. Please Check Your Link!!')</script>";
            print "<script>location='../'</script>";
        }
        
   
        
        ?>
