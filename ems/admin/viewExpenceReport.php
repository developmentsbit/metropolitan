
<?php
@error_reporting(1);
@session_start();
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

     <table  width="960"  border="0"  cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"  align="center">
    <tr >
  <td height="50" align="center" style="border-bottom:1px solid #333333">

    <img src="all_image/logoSDMS2015.png" style="max-width: 200px; max-height: 100px;" />

  </td>
      <td style="border-bottom:1px solid #333333" height="50" colspan="4" align="center" >
    <ul style=" padding-top:5px">
    
    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;"><?php print $fetch_query['bninstituteName']?></li>
   <li><p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_query['LocationbAngla']?> </p></li>
    <li style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_query['phone_number']?>,<?php print $fetch_query['email']?> </li>
     </ul>      </td>
<td style="border-bottom:1px solid #333333" width="200"></td>
    </tr>

</table>




  <table  width="960"  border="0"  cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"  align="center" style=" margin-top: 20px;">
    
        <tr>
            <td align="center" style="border-bottom: 1px #000 solid; " colspan="2"><h3>  ব্যয় রিপোর্ট </h3>
                <h3 style="float: left; clear: right;">
             <?php
             if(isset($_GET["date"]))
            {
             ?>
             Entry Date : <?php print $_GET["date"]; 
            } 


 if(isset($_GET["SelectYear"]))
            {
             ?>
             Collection Year : <?php print $_GET["SelectYear"]; 
            } 


         if(isset($_GET["monthID"]))
          {
             ?>
              Month  : 
              <?php 
      $selMonth = "SELECT * FROM `month_setup` where  `id`='".$_GET["monthID"]."'";
      

    
      $checkMont=$db->select_query($selMonth);
      if($checkMont)
      {
        if($fetmonth=$checkMont->fetch_array())
          echo $fetmonth[1];
      }
    }


            ?>
          </h3>
           <h3 style="float: right;">  Print Date : <?php print date('d-m-Y') ?>  </h3>
          </td>
              
         

        </tr>


     
<!-- ///////////////////////Print Title/////////////// -->
        <tr>
            <td align="center"style="border-right:1px #000 solid; " >
                
                <table style="width: 100%;">
                    <tr>

                        <td style=" border-left: 1px #000 solid;border-bottom: 1px #000 solid; text-align: center;"> Expense Title</td>
                               
                    <?php
$query="SELECT * FROM `other_cost` WHERE `date` LIKE '%".$_GET["SelectYear"]."%'  GROUP BY `date` ORDER BY `date` ASC";
   
   
   
    
    if(isset($_GET["monthID"]))
    {

      $mo=$_GET["year"].'-'.$_GET["monthID"];

       
          $query="SELECT * FROM `other_cost` WHERE `date` LIKE '%$mo%'  GROUP BY `date` ORDER BY `date` ASC ";


    }
    
        $result=$db->select_query($query);
        if($result)
        {
$i=0;
            $count=mysqli_num_fields($result_all);
             while($fetch_all=$result->fetch_array())
             {
                            $i++; ?>
                        <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 2px; text-align: center;">
                            <?php $x=explode('-',$fetch_all[1]);
                            print $x[2].'-'.$x[1].'-'.$x[0]; ?> 
                        </td>
                <?php
            }
        }
        ?>

        <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 10px; text-align: center;">
                            মোট
                                
        </td>
                
   </tr>
       

     <!-- /////////////////End Title/////////////////
 -->

    <?php

  

    if(isset($_GET["monthID"]))
    {

      $mo=$_GET["year"].'-'.$_GET["monthID"];

       $class="SELECT  `other_cost`.`title`,`income_expense_title`.`id`,`income_expense_title`.`title` FROM `other_cost`
   INNER JOIN `income_expense_title` ON `income_expense_title`.`id`=`other_cost`.`title`
   WHERE  `income_expense_title`.`type`='Expense' and `other_cost`.`date` LIKE '%$mo%' GROUP BY `other_cost`.`title` ORDER BY `other_cost`.`title` ASC";


    }

   if(isset($_GET["SelectYear"]))
    {

      $mo=$_GET["SelectYear"];

       $class="SELECT  `other_cost`.`title`,`income_expense_title`.`id`,`income_expense_title`.`title` FROM `other_cost`
   INNER JOIN `income_expense_title` ON `income_expense_title`.`id`=`other_cost`.`title`
   WHERE  `income_expense_title`.`type`='Expense' and `other_cost`.`date` LIKE '%$mo%' GROUP BY `other_cost`.`title` ORDER BY `other_cost`.`title` ASC";


    }


  


       
$net_total_title_amount=0;
        $netTotal=0;
        $SelectClass=$db->select_query($class);
        if($SelectClass)
        {
$i=0;
            $count=mysqli_num_fields($SelectClass);
                        while($fetch_Class=$SelectClass->fetch_array()){

                          $total_title_amount=0;
                            $i++; ?>

                 <tr>
                        

                <td style=" border-left: 1px #000 solid; padding: 10px;border-bottom: 1px #000 solid;">
                            <?php print $fetch_Class[2]; ?>
                                
                </td>


<?php
  
    if(isset($_GET["monthID"]))
    {



      $mo=$_GET["year"].'-'.$_GET["monthID"];
       
      $selectTitle="SELECT * FROM `other_cost` WHERE `date` LIKE '%$mo%'  GROUP BY `date` ORDER BY `date` ASC ";

    }  

     if(isset($_GET["SelectYear"]))
    {



      $mo=$_GET["SelectYear"];
       
      $selectTitle="SELECT * FROM `other_cost` WHERE `date` LIKE '%$mo%'  GROUP BY `date` ORDER BY `date` ASC ";

    }

      $resultTitle=$db->select_query($selectTitle);
        if($resultTitle)
        {

        while($fetch_Date=$resultTitle->fetch_array()){


          $selectAmount="SELECT SUM(`amount`) AS 'Total' FROM `other_cost` WHERE `title`='$fetch_Class[0]' AND `date`='$fetch_Date[date]'";
//print  $selectAmount.'<br><br>';
  

          $result_total_amount=$db->select_query($selectAmount);


?>

                <td style=" border-left: 1px #000 solid; padding: 2px;border-bottom: 1px #000 solid; text-align: right;">
                           
                          <?php
                          if($result_total_amount)
                          {
                            $fetch_amount=$result_total_amount->fetch_array();
                            print $fetch_amount[0];
                            $total_title_amount=$total_title_amount+$fetch_amount[0];

                          }
                          ?>      
                </td>
<?php
  }
}




?>



 <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 10px; text-align: center;">
                            
                        <?php print $total_title_amount;
                           $net_total_title_amount=$net_total_title_amount+$total_title_amount;
                         ?>    
                         
    </td>
</tr>

<?php
            }
        }
        ?>

                    
            

                </tr>


     </tr>
<!-- 
///////////////////////////////////Total Title wise/////////////////// -->
     <tr>
            <td style=" border-left: 1px #000 solid; padding: 10px;">Total: </td>
            

<?php

$totalAmount=0;

$query="SELECT * FROM `other_cost` WHERE `date` LIKE '%".$_GET["SelectYear"]."%'  GROUP BY `date` ORDER BY `date` ASC";
   
    if(isset($_GET["monthID"]))
    {
      $mo=$_GET["year"].'-'.$_GET["monthID"];
      $query="SELECT * FROM `other_cost` WHERE `date` LIKE '%$mo%'  GROUP BY `date` ORDER BY `date` ASC ";
    }
    
        $result=$db->select_query($query);
        if($result)
        {
$i=0;
            $count=mysqli_num_fields($result_all);
             while($fetch_all=$result->fetch_array())
             {
                 


          $selectAmount="SELECT SUM(`amount`) AS 'Total' FROM `other_cost` WHERE  `date`='$fetch_all[date]'";
  



          $result_total_amount=$db->select_query($selectAmount);



                 ?>

      
     
                        <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 10px; text-align: right;">  
                        <?php if( $result_total_amount)
                        {
                            $fetch_amount=$result_total_amount->fetch_array();
                            print $fetch_amount[0];
                           // $totalAmount=$totalAmount+$fetch_amount[0];

                          }

                         


                      ?>     
                      </td>

       <?php
     }
     }

     ?>


<td style=" border-left: 1px #000 solid; padding: 10px; font-weight: bold; text-align: right;" ><?php echo @$db->my_money_format($net_total_title_amount);?>/=

<?php // print  "<br>".$totalAmount;?>
</td>

     </tr>

<!-- ///////////////////////////////////End Total Title wise///////////////////
 -->
                    
                    <!-- <tr>
                        <td colspan="2" style="border-top: 1px #000 solid; text-align: right;border-right: 1px #000 solid; ">Total</td>
                        
                        <td style="border-top: 1px #000 solid;">100</td>
                    </tr> -->

                </table>

            </td>
        

        </tr>


        <tr>
                <td  style="border-top: 1px #000 solid;" colspan="2" align="center"> 
<table width="100%">
  
  <tr>
      <td height="70" valign="bottom" align="center">


    

      </td>
      <td valign="bottom">
          ..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">

        Receiver
        </p>
      </td>
      <td colspan="2" align="center" valign="bottom"><p style="margin-top:3px;"></p></td>
  <td valign="bottom" align="center"><p style="font-weight: bold;; font-size: 16px;">Developed By: SBIT (www.sbit.com.bd)</p></td>
      <td align="right" valign="bottom" style="">
        <br>
        <br>
..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-right:60px; ">

        Principal
        </p>

         </td>
    </tr>
</table>
    
</td>
</tr>

    

</table> </td>
                
        </tr>

  </table>

 <br>
<center> 
<input type="button" name="print" value="Print" class="print" style="height: 30px; width: 150px; background: GREEN; color: #fff; border: 0px;" 
onclick="window.print()">
</center>
