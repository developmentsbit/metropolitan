
<?php
@error_reporting(1);
require_once("../db_connect/config.php");
  require_once("../db_connect/conect.php");
    $db = new database();
     $x=explode("-", $_GET["date"]);
      $date=$x[2]."-".$x[1]."-".$x[0];
      $sqlProjectInfo="SELECT * FROM `project_info`";
      $result_query=$db->select_query($sqlProjectInfo);
      if($result_query){
          $fetch_query=$result_query->fetch_array();
      }

      $lastClose=$_GET['lastClose'];
      $from=$_GET['from'];
      $to=$_GET['to'];

      $totalIncome=0;
      $totalCash=0;
    ?>
    
<style type="text/css">
.style2 {color: #333333;font-size:14px;font-family:Arial, Helvetica, sans-serif; padding-left:10px;}
.style3 {color: #333333;font-size:14px;font-family:Arial, Helvetica, sans-serif; padding-left:10px;}
.style5 {color: #000000;font-size:14px;font-family:Arial, Helvetica, sans-serif;text-decoration:overline;}

li{list-style:none}
.style7 {color: #000033;font-weight:bold;font-size:12px;font-family:Arial, Helvetica, sans-serif}
.style8 {color: #000066;font-size:14px;font-family:Arial, Helvetica, sans-serif}
</style>
<style>
  @media print{
      .print{
        display:none;
      }


    </style>

     <table  width="100%"  border="0"  cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"  align="center">
    <tr >

      <td style="border-bottom:1px solid #333333" height="50" colspan="4" align="center" >
    <ul style=" padding-top:5px">
    
    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:32px;"><?php print $fetch_query['bninstituteName']?></li>
   <li><p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_query['LocationbAngla']?> </p></li>
    <li style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_query['phone_number']?>,<?php print $fetch_query['email']?> </li>
     </ul>     


      </td>

    </tr>

</table>

  <table  width="960"  border="0"  cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"  align="center" style=" margin-top: 20px;">
    
        <tr>
             <td align="center" style="border-bottom: 1px #000 solid; " colspan="2">
             <h3> <u>আয়-ব্যয় বিবরণী </u></h3>
             
          <h3 style="float: left; clear: right;">
             <?php
             if(isset($_GET["date"]))
            {
             ?>
            Date : <?php print $_GET["date"]; 
            } 
            ?>
            
            Duration: '<?php print $from; ?>' to '<?php print $to; ?>'
          </h3>
           <h3 style="float: right;">  Print Date : <?php print date('d-m-Y') ?>  </h3>
          </td>
              
  </tr>

        <tr>
            <td align="center"style="border-right:1px #000 solid; " >
                <table style="width: 100%;">
                    <tr>
                           <td style=" border-left: 1px #000 solid; border-bottom: 1px #000 solid; text-align: center;  border-right: 1px #000 solid; ">
                          আয় বিবরণী
                        </td>
                               
                           <td style=" border-left: 1px #000 solid;border-bottom: 1px #000 solid; text-align: center; " > 
                            ব্যয় বিবরণী
                            </td>
                                
                  </tr>    

                  <tr>
                         


                        <td style="border-bottom: 1px #000 solid; text-align: left;  border-left: 1px #000 solid;" valign="top"> 
                          
                          <table class="table table-bordered">
                          
                              <tr>
                                <td colspan="3" align="left" style="border-bottom: 1px #000 solid;" >
                               ছাত্র-ছাত্রী থেকে আদায় : </td>
                              </tr>

                            <?php

                              $query="SELECT * FROM `coloumn_setup`  ";
                              $result=$db->select_query($query);
                              if($result)
                              {
                                $i=1;
                                  while($fetch_coloum=$result->fetch_array())
                                  {

                                      $totalAmount=$db->select_query("SELECT `columnwisefeesetupforstd`.`fk_column_id`,SUM(`student_paid_table`.`paid_amount`) FROM `columnwisefeesetupforstd` INNER JOIN `student_paid_table` ON `student_paid_table`.`fk_fee_id`=`columnwisefeesetupforstd`.`fk_fee_id` WHERE `columnwisefeesetupforstd`.`fk_column_id`='$fetch_coloum[0]' AND `student_paid_table`.`date` BETWEEN '$from' AND '$to' ");
                                    

                                      if($totalAmount)
                                      {
                                         $fetch_amount=$totalAmount->fetch_array();

                                      
                                        if($fetch_amount[1]=="")
                                        {
                                          $fetch_amount[1]=0;
                                        }


                                    ?>

                                    <tr>
                                          <td width="15%"><?php print $i++?></td>
                                          <td width="80%"><?php print $fetch_coloum[1]?></td>
                                          <td width="20%" align="right">
                                            
                                              <?php print $fetch_amount[1] ?>
                                          </td>
                                    </tr>
                                <?php
                              
                                     
                                  }
                                }

                              }
   

                            ?>

                        <tr>
                              <td colspan="2" align="right" style="border-top: 1px #000 solid;" >মোট :</td>
                              <td  align="right" style="border-top: 1px #000 solid;" >

                              <?php
                                $selectTotal=$db->select_query("SELECT SUM(`student_paid_table`.`paid_amount`) FROM `student_paid_table` WHERE `student_paid_table`.`date` BETWEEN '$from' AND '$to'");
                                      if($selectTotal)
                                      {
                                         $fetch_total_amount=$selectTotal->fetch_array();
                                         print $fetch_total_amount[0];
                                         $totalIncome=$totalIncome+$fetch_total_amount[0];
                                       }
                                       ?>

                               </td>
                        </tr>


                             <tr>
                                <td colspan="3" align="left" style="border-bottom: 1px #000 solid;" ><br>অন্যান্য আয় : </td>
                              </tr>

                        <?php

                              $query="SELECT * FROM `income_coloumn`  ";
                              $result=$db->select_query($query);
                              if($result)
                              {
                                $i=1;
                                  while($fetch_coloum=$result->fetch_array())
                                  {

                                      $totalAmount=$db->select_query("SELECT `colume_wise_others_income`.`fk_column_id`,
SUM(`other_income`.`amount`) FROM `colume_wise_others_income` 
INNER JOIN `other_income` ON `other_income`.`title`=`colume_wise_others_income`.`fk_fee_id`
WHERE `colume_wise_others_income`.`fk_column_id`='$fetch_coloum[0]' AND `other_income`.`date`
BETWEEN '$from' AND '$to'");
                                    

                                      if($totalAmount)
                                      {
                                         $fetch_amount=$totalAmount->fetch_array();

                                    if($fetch_amount[1]=="")
                                        {
                                          $fetch_amount[1]=0;
                                        }


                                    ?>

                                    <tr>
                                          <td width="15%"><?php print $i++?></td>
                                          <td width="80%"><?php print $fetch_coloum[1]?></td>
                                          <td width="20%" align="right">
                                            
                                              <?php print $fetch_amount[1] ?>
                                          </td>
                                    </tr>
                                <?php
                               
                                     
                                  }
                                }

                              }
   

                            ?>

                                <tr>
                              <td colspan="2" align="right" style="border-top: 1px #000 solid;" >মোট :</td>
                              <td  align="right" style="border-top: 1px #000 solid;" >

                              <?php
                           //   echo "SELECT SUM(`other_income`.`amount`) FROM `other_income` WHERE `other_income`.`EntryDate` BETWEEN '$from' AND '$to'";
                              
                                $selectTotal=$db->select_query("SELECT SUM(`other_income`.`amount`) FROM `other_income` WHERE `other_income`.`date` BETWEEN '$from' AND '$to'");
                                      if($selectTotal)
                                      {
                                         $fetch_total_amount=$selectTotal->fetch_array();
                                         print $fetch_total_amount[0];
                                         $totalIncome=$totalIncome+$fetch_total_amount[0];
                                       }
                                       ?>

                               </td>
                        </tr>

                          <tr>
                              <td colspan="2" align="right" style="border-top: 1px #000 solid;" > সর্বমোট আয় :</td>
                              <td  align="right" style="border-top: 1px #000 solid;" >
                              <?php
                                print $totalIncome;
                                $totalCash=$totalCash+$totalIncome;
                              ?>
                               </td>
                        </tr>


                        <tr>
                              <td colspan="2" align="right" style="border-top: 1px #000 solid;" > 
         


                              আগত তহবিল :

                              </td>
                              <td  align="right" style="border-top: 1px #000 solid;" >
                              <?php
                                $cashcloseinfo=$db->select_query("SELECT * FROM `hand_in_cash` where `date`='$lastClose'");
                  if($cashcloseinfo)
                  {
                          $fetchinfo=$cashcloseinfo->fetch_array();     
                          $x=$fetchinfo['TotalBankBalance']+$fetchinfo['hend_in_cash'];
                          print $x;
                          $totalCash=$totalCash+$x;

                        
                  }
                              ?>
                               </td>
                        </tr>

                         <tr>
                              <td colspan="2" align="right" style="border-top: 1px #000 solid;" > সর্বমোট :</td>
                              <td  align="right" style="border-top: 1px #000 solid;" >
                              <?php 
                                print $totalCash;
                   

        ?>
                               </td>
                        </tr>



                            </table>

                        </td>
                              

                           <td style=" border-left: 1px #000 solid;border-bottom: 1px #000 solid; text-align: center; "  > 
                           <table class="table table-bordered">

                            <?php

                              $query="SELECT * FROM `expense_coloumn_setup`";
                              $result=$db->select_query($query);
                              if($result)
                              {
                                $i=1;
                                  while($fetch_coloum=$result->fetch_array())
                                  {

                                      $totalAmount=$db->select_query("SELECT `colume_wise_expense`.`fk_column_id`, SUM(`other_cost`.`amount`) FROM `colume_wise_expense` INNER JOIN `other_cost` ON `other_cost`.`title`=`colume_wise_expense`.`fk_fee_id` WHERE `colume_wise_expense`.`fk_column_id`='$fetch_coloum[0]' AND `other_cost`.`date` BETWEEN '$from' AND '$to'");


                                    

                                      if($totalAmount)
                                      {
                                         $fetch_amount=$totalAmount->fetch_array();

                                      
                                        if($fetch_amount[1]=="")
                                        {
                                          $fetch_amount[1]=0;
                                        }


                                    ?>

                                    <tr>
                                          <td width="15%"><?php print $i++?></td>
                                          <td width="80%"><?php print $fetch_coloum[1]?></td>
                                          <td width="20%" align="right">
                                            
                                              <?php print $fetch_amount[1] ?>
                                          </td>
                                    </tr>
                                <?php
                              
                                     
                                  }
                                }

                              }
   

                            ?>



                            </table>
<br><br><br>
                        <table width="100%">
                              <tr>
                              <td align="right" style="border-top: 1px #000 solid;" > সর্বমোট ব্যয় :</td>
                              <td  align="right" style="border-top: 1px #000 solid; width: 20%" >
                        
                              <?php
                                $selectTotal=$db->select_query("SELECT SUM(`other_cost`.`amount`) FROM `other_cost` WHERE `other_cost`.`date` BETWEEN '$from' AND '$to'");
                                      if($selectTotal)
                                      {
                                         $fetch_total_amount=$selectTotal->fetch_array();
                                         print $fetch_total_amount[0];
                                         $cashinhend=$totalCash-$fetch_total_amount[0];
                                       }
                                      

                               // print $totalIncome.'.00';
                              ?>
                               </td>
                              </tr>

                               <tr>
                              <td align="right" style="border-top: 1px #000 solid;" > উদ্বৃত্ত  :</td>
                              <td  align="right" style="border-top: 1px #000 solid; width: 20%" >
                        
                              <?php
                               print $cashinhend;
                              ?>
                               </td>
                              </tr>

                                <tr>
                              <td  align="right" style="border-top: 1px #000 solid;" > সর্বমোট :</td>
                              <td  align="right" style="border-top: 1px #000 solid;" >
                              <?php
                                print $cashinhend+$fetch_total_amount[0];
                              ?>
                               </td>
                        </tr>

                        </table>

                            </td>
                                
                  </tr>
                  </table>
                
   </tr>

   <tr style="border-bottom: 1px #fff solid;" >
    <td  style="border-bottom: 1px #fff solid;" colspan="2" align="left"> 
        

        <table width="60%" class="table table-bordered">
        <tr>
            <td colspan="3">উদ্বৃত্তের বিবরণ</td>
        </tr>
       
          <tr>
              <td>ব্যাংক </td>
              <td>: </td>
              <td> </td>
          </tr> 

          <tr>
              <td>হাতে নগদ </td>
              <td>: </td>
              <td> </td>
          </tr> 

            <tr>
              <td>সর্বমোট  </td>
              <td>: </td>
              <td>  </td>
          </tr>
        </table>
    </td>

   </tr>

 
 <tr>

<td  style="border-top: 1px #000 solid;" colspan="2" align="center"  > 
<table width="100%" style="margin-top:200px;">
  
  <tr>
      <td height="70" valign="bottom" align="center">


    

      </td>
      <td valign="bottom">
          ..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">
অফিস  সহকারী
        
        </p>
      </td>
      <td colspan="2" align="center" valign="bottom"><p style="margin-top:3px;"></p></td>
  <td valign="bottom" align="center"><p style="font-weight: bold;; font-size: 12px;">Developed By: SBIT (www.sbit.com.bd)</p></td>
      <td align="right" valign="bottom" style="">
        <br>
        <br>
..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-right:60px; ">

        প্রধান শিক্ষক
        </p>

         </td>
    </tr>
</table>
    
</td>
</tr>

</table> 
</td>
                
        </tr>

  </table>

 <br>
<center> 
<input type="button" name="print" value="Print" class="print" style="height: 30px; width: 150px; background: GREEN; color: #fff; border: 0px;" 
onclick="window.print()">
</center>
