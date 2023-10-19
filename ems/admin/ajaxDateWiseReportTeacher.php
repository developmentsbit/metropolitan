
<?php

	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
  error_reporting(0);
	
  if(isset($_POST["teacherAttendance"]))
  {

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title> Teacher's Attendance </title>
  </head>
  <body>
 <table width="100%">
                      <tr>
  <td height="50" align="center" style="">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>

      <td style="" height="50"  align="center" >
  
    
    <p style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    Al Helal Academy</p>

 <p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"> Main Road, Sonagazi, Feni.       </p>

    <p style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif">01728563480 ,alhelalacademy.edu.bd@gmail.com  </p><h4>Date wise Teacher's Attendance - <?php print $_POST['example1']?> To <?php print $_POST['example2']?></h4>
         </td>

           <td height="50" width="76" align="center" style="">

 

  </td>
     </tr>

  </table>

  		<table class="table">
      
  		
  		<tr>
  					 <th width="50" style="border-left:1px #000 solid;border-top:1px #000 solid; ">Sl</th>
  	
  					<th style="border-left:1px #000 solid;border-top:1px #000 solid; border-right:1px #000 solid;">Teacher's Name</th>
            <!-- <th>Designation</th> -->
  					<?php

  							$selectDate=$db->link->query("SELECT `attend_date` FROM `teacher_attend` WHERE `attend_date` BETWEEN '".$_POST["example1"]."' AND '".$_POST["example2"]."' GROUP BY `attend_date` ORDER BY `attend_date` ASC ");
  						while($fetch_date=$selectDate->fetch_array())
  						{?>
  								<th style="border-left:1px #000 solid;border-top:1px #000 solid; border-right:1px #000 solid;"><?php $d=explode('-',$fetch_date['attend_date']); 

                  echo $d[2].'/'.$d[1]?></th>
  						
  						<?php }

  					?>
  					
  					
  		</tr>

  <?php
  $i=1;
$sql=$db->link->query("SELECT * FROM `teachers_information` WHERE `Type`='Teacher' ORDER BY `index_no` ASC  ");
while($fetch_info=$sql->fetch_array())
{

  ?>
  			<tr>
  					<td style="border-left:1px #000 dotted;border-top:1px #000 dotted; "><?php print $i++;?></td>
  	
  					<td style="border-left:1px #000 dotted;border-top:1px #000 dotted; border-right:1px #000 dotted;  text-transform: uppercase; text-align: left;"><?php print $fetch_info[2];?></td>
            <!-- <td><?php print $fetch_info[3];?></td> -->
  					
  					<?php
  					
  						$selectDate=$db->link->query("SELECT `attend_date` FROM `teacher_attend` WHERE `attend_date` BETWEEN '".$_POST["example1"]."' AND '".$_POST["example2"]."' GROUP BY `attend_date` ORDER BY `attend_date` ASC ");
  						

  						while($fetch_date=$selectDate->fetch_array())
  						{?>
  								<td style="border-left:1px #000 dotted;border-top:1px #000 dotted; border-right:1px #000 dotted; text-align: center;">

  									<?php 

  											$selectAttendance=$db->link->query("SELECT * FROM `teacher_attend` WHERE `teacher_id`='".$fetch_info[0]."' AND `attend_date`='".$fetch_date[0]."'");

  											$fetch_att=$selectAttendance->fetch_array();
  											if($fetch_att['attendance']==0)
  											{
  													print '<span style="color: #ff0000">'."A".'</span>';
  												//echo $fetch_att['attendance'];
  											}
  											else if($fetch_att['attendance']==1)
  											{
  												print '<span style="color: #000">'."P".'</span>';
  											}

  											else if($fetch_att['attendance']==2)
  											{
  												print '<span style="color: GREEN">'."L".'</span>';
  											}

  									 ?>
  										


<span style="color: GREEN"></span>


  									</td>
  						
  						<?php 
  					   }

  					?>
  					
  			</tr>
<?php
	}
?>


  <?php
 
$sql=$db->link->query("SELECT * FROM `teachers_information` WHERE `Type`='Stuff' ORDER BY `index_no` ASC  ");
while($fetch_info=$sql->fetch_array())
{

  ?>
        <tr>
            <td  style="border-left:1px #000 dotted;border-bottom:1px #000 dotted; "><?php print $i++;?></td>
    
            <td style="border-left:1px #000 dotted;border-bottom:1px #000 dotted; border-right:1px #000 dotted;  text-transform: uppercase; text-align: left;"><?php print $fetch_info[2];?></td>
            <!-- <td><?php print $fetch_info[3];?></td> -->
            
            <?php
            
              $selectDate=$db->link->query("SELECT `attend_date` FROM `teacher_attend` WHERE `attend_date` BETWEEN '".$_POST["example1"]."' AND '".$_POST["example2"]."' GROUP BY `attend_date` ORDER BY `attend_date` ASC ");
              

              while($fetch_date=$selectDate->fetch_array())
              {?>
                  <th style="border-left:1px #000 dotted;border-bottom:1px #000 dotted; border-right:1px #000 dotted; text-align: center;">

                    <?php 

                        $selectAttendance=$db->link->query("SELECT * FROM `teacher_attend` WHERE `teacher_id`='".$fetch_info[0]."' AND `attend_date`='".$fetch_date[0]."'");

                        $fetch_att=$selectAttendance->fetch_array();
                        if($fetch_att['attendance']==0)
                        {
                            print '<span style="color: #ff0000">'."A".'</span>';
                          //echo $fetch_att['attendance'];
                        }
                        else if($fetch_att['attendance']==1)
                        {
                          print '<span style="color: #000">'."P".'</span>';
                        }

                        else if($fetch_att['attendance']==2)
                        {
                          print '<span style="color: GREEN">'."L".'</span>';
                        }





                     ?>
                      


<span style="color: GREEN"></span>


                    </th>
              
              <?php 
               }

            ?>
            
        </tr>
<?php
  }
?>


		</table>  
    <table> 
<tr id="notprint">
    <td  ><input type="button" name="print" value="print" onclick="window.print()" style="background: #ff0000; color: #fff; border-radius: 10px; height: 35px; width: 120px;"></td>
  </tr>
</table>
  </body>
</html>

<?php
}






  if(isset($_POST["dailyAttendanceTeacher"]))
  {

  
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title> Teacher's Attendance </title>
  </head>
  <body>


      <table class="table ">
      
      <tr>
        <td colspan="6">
          <table width="100%">
                      <tr>
  <td height="50" align="center" style="">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>

      <td style="" height="50"  align="center" >
  
    
    <p style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    Al Helal Academy</p>

 <p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"> Main Road, Sonagazi, Feni.       </p>

    <p style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif">01728563480 ,alhelalacademy.edu.bd@gmail.com  </p><h4>Daily Teacher's Attendance - <?php print $_POST['example1']?></h4>
         </td>

           <td height="50" width="76" align="center" style="">

 

  </td>
     </tr>

  </table>
</td>
      </tr>
      <tr>
            <th width="50" style="border-left:1px #000 solid;border-top:1px #000 solid; border-right:1px #000 solid;">Sl</th>
    
            <th width="300" style="border-top:1px #000 solid; border-right:1px #000 solid;">Teacher's Name</th>
            <th width="150" style="border-top:1px #000 solid; border-right:1px #000 solid;">Designation</th>
            <th width="100" style="border-top:1px #000 solid; border-right:1px #000 solid;">Incoming Time</th>
            <th width="200" style="border-top:1px #000 solid; border-right:1px #000 solid;">Gap Time</th>
            <th width="100" style="border-top:1px #000 solid; border-right:1px #000 solid;">Leaving Time</th>
            
            
            
      </tr>

  <?php
  $i=1;
$sql=$db->link->query("SELECT * FROM `teachers_information` WHERE `Type`='Teacher' ORDER BY `index_no` ASC  ");
while($fetch_info=$sql->fetch_array())
{

  ?>
        <tr>
            <td style="border-left:1px #000 dotted;border-top:1px #000 dotted; border-right:1px #000 dotted;"><?php print $i++;?></td>
    
            <td  style="border-left:1px #000 dotted;border-top:1px #000 dotted; "><?php print $fetch_info[2];?></td>
            <td style="border-left:1px #000 dotted;border-top:1px #000 dotted; "><?php print $fetch_info[3];?></td>
            
            <td style="border-left:1px #000 dotted;border-top:1px #000 dotted; ">
                <?php 
                    $selectAttendance=$db->link->query("SELECT * FROM `teacher_attend` WHERE `teacher_id`='".$fetch_info[0]."' AND `attend_date`='".$_POST['example1']."' AND `attendance`='1'");
                   // echo $selectAttendance;
                    $fetch_att=$selectAttendance->fetch_array();
                    print  $fetch_att[1];
                ?>
            </td>
            <td style="border-left:1px #000 dotted;border-top:1px #000 dotted; ">
                <?php
                    $getTime=$db->link->query("SELECT * FROM `teacher_gap_time` WHERE  `teacher_id`='".$fetch_info[0]."' AND `attend_date`='".$_POST['example1']."'");
                    $fetch_gap_time=$getTime->fetch_array();
                    print  $fetch_gap_time[2].' - '.$fetch_gap_time[3];
                ?>
                           
            </td>
            <td style="border-left:1px #000 dotted;border-top:1px #000 dotted; border-right:1px #000 dotted;"><?php  print  $fetch_att[2]; ?> </td>

        </tr>
<?php
  }
?>


  <?php
 
$sql=$db->link->query("SELECT * FROM `teachers_information` WHERE `Type`='Stuff' ORDER BY `index_no` ASC  ");
while($fetch_info=$sql->fetch_array())
{

  ?>
      

 <tr>
            <td style="border-left:1px #000 dotted;border-top:1px #000 dotted; border-right:1px #000 dotted;"><?php print $i++;?></td>
    
            <td  style="border-left:1px #000 dotted;border-top:1px #000 dotted; "><?php print $fetch_info[2];?></td>
            <td  style="border-left:1px #000 dotted;border-top:1px #000 dotted; "><?php print $fetch_info[3];?></td>
            
           
            <td  style="border-left:1px #000 dotted;border-top:1px #000 dotted; ">

                    <?php 

                        $selectAttendance=$db->link->query("SELECT * FROM `teacher_attend` WHERE `teacher_id`='".$fetch_info[0]."' AND `attend_date`='".$_POST['example1']."'");

                        $fetch_att=$selectAttendance->fetch_array();
                          print  $fetch_att[1];

                     ?>
                    


                    </td>
                          <td style="border-left:1px #000 dotted;border-top:1px #000 dotted; "><?php
                                $getTime=$db->link->query("SELECT * FROM `teacher_gap_time` WHERE  `teacher_id`='".$fetch_info[0]."' AND `attend_date`='".$_POST['example1']."'");
                                  $fetch_gap_time=$getTime->fetch_array();
                                 print  $fetch_gap_time[2].' - '.$fetch_gap_time[3];

                          ?></td>
                        <td  style="border-left:1px #000 dotted;border-top:1px #000 dotted;border-right:1px #000 dotted; "><?php  print  $fetch_att[2]; ?> </td>
              
             
            
        </tr>


<?php
  }
?>
<tr id="notprint">
    <td colspan="6" ><input type="button" name="print" value="print" onclick="window.print()" style="background: #ff0000; color: #fff; border-radius: 10px; height: 35px; width: 120px;"></td>
  </tr>
    </table>  


  </body>
</html>

<?php
}

?>
