<?php
error_reporting(1);
  @session_start();

  if($_SESSION["logstatus"] === "Active")
  { 
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
  $db = new database();
      if(isset($_POST["accountName"]))
      {

       $sql="SELECT SUM(`amount`) AS 'Balance' FROM `bank_transaction` WHERE `account_name`='".$_POST["accountName"]."'";
      

              $query=$db->link->query($sql);
              if($query)
              {
                  $fetch=$query->fetch_array();
                  print $fetch[0];
                  
              }
      } 	


      if(isset($_POST["feeTitle"]))
      {

          $className=$_POST["className"];
          $classId=explode('and', $className);
          $year=$_POST["year"];

       $sql="SELECT `add_fee`.*,`month_setup`.`name`  FROM `add_fee` INNER JOIN `month_setup` 
ON `month_setup`.`id`=`add_fee`.`fk_month_id` WHERE `class_id`='".$classId[0]."' and `year`='".$year."'  ORDER BY  `add_fee`.`fk_month_id` ASC ";
    

              $query=$db->link->query($sql);
              if($query)
              {
                  while($fetch=$query->fetch_array()){
                    print '<option value="'.$fetch[0].'and'.$fetch[1].'">'.$fetch[1].'</option>';
                  }
                  
                  
              }
      }


      if(isset($_REQUEST["ClassFee"]))
    	{

          $className=$_POST["className"];
          $classId=explode('and', $className);
          $year=$_POST["year"];
          $ClassFee=$_POST["ClassFee"];
          $feeId=explode('and',$ClassFee);
          
          $sql="SELECT  `student_paid_table`.`student_id`,`student_paid_table`.`admin_id`,`student_paid_table`.`paid_amount`,`student_paid_table`.`date`,`admin_users`.`Name`,`student_personal_info`.`student_name`  FROM `student_paid_table`
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`student_paid_table`.`student_id`
INNER JOIN `admin_users` ON `admin_users`.`id`=`student_paid_table`.`admin_id`
 WHERE `class_id`='$classId[0]' AND `fk_fee_id`='$feeId[0]' AND `year`='$year'";
  $query=$db->link->query($sql);

                  
                

          ?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Bank Transaction</title>

      <style>
  @media print{
      .print{
        display:none;
      }


    </style>
    </head>
    <br>
      <table  width="1000"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
    <tr >
  <td height="50" align="center" style="border-bottom:1px solid #333333">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>

      <td style="border-bottom:1px solid #333333" height="50"  align="center" >
  
    
    <p style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    Holy Crescent School</p>

 <p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif">Shahid Shahidullah Kaiser Shorok, Feni.   </p>

    <p style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif">01715023389,holycrescentschool@gmail.com</p>
         </td>

           <td height="50" width="76" align="center" style="border-bottom:1px solid #333333">

 

  </td>
     </tr>

     <tr>
          <td colspan="3">
            <br>
              <table width="100%" class="table table-hover table-bordered"> 
                 <tr>
                    <td width="20" align="center" colspan="6">
                       <table width="100%" class="table table-hover table-bordered"> 
                          <tr>
                              <td>Class : </td>
                              <td><?php print $classId[1]?></td>
                              <td>Fee Title :</td>
                              <td> <?php print $feeId[1]?></td>
                          </tr>
                       </table>

                    </td>
                
                  </tr>


                  <tr>
                    <td width="20" align="center">Sl</td>
                    <td width="50" align="center">Student ID</td>
                    <td width="50" align="center">Student Name</td>
                    <td width="50" align="center">Date</td>
                    <td width="100" align="left">Admin Name</td>  
                    <td width="100" align="center">Amount</td>

                  </tr>

<?php
$i=1;
   if($query)
     {
          while($fetch=$query->fetch_array()){


              if($fetch[2]!=0)
              {


      ?>

   

                 <tr>
                    <td width="20" align="center"><?php print $i++;?></td>
                    <td width="50" align="center"><?php print $fetch[0];?></td>
                    <td width="50" align="center"><?php print $fetch[4];?></td>
                      <td width="50" align="center"><?php print $fetch[5];?></td>
                    <td width="100" align="left"><?php print $fetch[3];?></td>  
                    <td width="100" align="center"><?php print $fetch[2];?></td>
                  </tr>

    <?php
    }
  }
  }
    ?>
                 

         </table>

          </td>

     </tr>

     </table>


<br>

<table width="1000" align="center">
  
  <tr>
      <td height="70" valign="bottom" align="center">


    

      </td>
      <td valign="bottom">
          ..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">

        Admin
        </p>
      </td>
      <td colspan="2" align="center" valign="bottom"><p style="margin-top:3px;"></p></td>
  <td valign="bottom" align="center"><p style="font-weight: bold;; font-size: 12px;">Developed By: SBIT (www.sbit.com.bd)</p></td>
      <td align="right" valign="bottom" style="">
        <br>
        <br>
..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-right:60px; ">

        Headmaster
        </p>

         </td>
    </tr>
</table>
<br>
<center> 
<input type="button" name="print" value="Print" class="print" style="height: 30px; width: 150px; background: GREEN; color: #fff; border: 0px;" 
onclick="window.print()">
</center>
       
    <body>
      
    </body>
    </html>

 




              <?php
    	}

} 

?>