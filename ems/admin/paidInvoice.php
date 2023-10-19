
<?php
@error_reporting(1);
session_start();
date_default_timezone_set("Asia/Dhaka");
  require_once("../db_connect/config.php");
  require_once("../db_connect/conect.php");
  $db = new database();
 
    require_once(__DIR__."/sms/lib/AdnSmsNotification.php");
    use AdnSms\AdnSmsNotification;

  require "barcode/vendor/autoload.php";
  $Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
  $code = $Bar->getBarcode($_GET["last_id"], $Bar::TYPE_CODE_128);



$id =$_GET["id"];
$year =$_GET["year"];
$date =$_GET["date"];
$clas =$_GET["clas"];
$last_id =$_GET["last_id"];
$classID =$_GET["clas"];

   $selectClas="SELECT `index` FROM `add_class` WHERE `id`='$classID'";
  if($invalue=$db->select_query($selectClas)->fetch_array())
  {
        if($invalue[0]==6 or $invalue[0]==7 or $invalue[0]==8 or $invalue[0]==9)
          {
              $invalue[0]='0'.$invalue[0];
          }
              
          $y=date('y').$invalue[0];
  }



if(isset($_POST["sms"]))
{
    	         
					 
    
}



    
if(isset($_POST["confirm"]))
{
     $paid=$db->escape($_GET['last_id']);
     $ID=$db->voucherID('student_paid_table','voucher',$y,'8',$classID);
       
                    $recipient  = "880".$_POST['phone'];  
					$requestType = 'SINGLE_SMS';    
					$messageType = 'TEXT';     
					$msg="Dear ".$_POST['name']." You Have Paid TK. ".$_POST['paid']." Receipt No. ".$ID." Due Balance ".$_POST['due']." Thanks.";
					 //$recipient=intval($recipient);
					 
    				//$sms = new AdnSmsNotification();
    				//$sms->sendSms($requestType, $msg, $recipient, $messageType);
    				//$succ='<span style="color:green;">Success</span>';
    				
    				
     

        $q="UPDATE `student_dues` SET `status`='1'  WHERE `invoice_id`='$paid'";
        $db->link->query($q); 

        $query="SELECT * FROM `due_invoice` WHERE `voucher`='$paid'";
        $query=$db->link->query($query);



        while($fetch=$query->fetch_array())
        {
     
          $db->link->query("INSERT INTO `student_paid_table`(`student_id`,`voucher`,`class_id`,`paid_amount`,`date`,`admin_id`,`month`,`year`,`fk_fee_id`,`defult_Date`) VALUES('$fetch[0]','$ID','$fetch[2]','$fetch[3]','".date('Y-m-d')."','".$_SESSION["id"]."','".date('m')."','".date('Y')."','$fetch[8]','".date('Y-m-d')."')");

        }

       print "<script>alert('Invoice has paid.');</script>";

     echo "<script>window.close();</script>";
          			 
					 
}



$selApp="select * from project_info";
$queApp=$db->select_query($selApp);
$fetchApp=mysqli_fetch_assoc($queApp);



  $qurRun="SELECT `due_invoice`.*,`student_personal_info`.`student_name`,`running_student_info`.`class_roll`,`add_class`.`class_name`,`student_guardian_information`.`guardian_contact`  FROM `due_invoice`
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`due_invoice`.`student_id` INNER JOIN `running_student_info` ON `running_student_info`.`student_id`=`due_invoice`.`student_id` 
INNER JOIN `student_guardian_information` ON `student_guardian_information`.`id`=`due_invoice`.`student_id`
INNER JOIN `add_class` ON `add_class`.`id`=`due_invoice`.`class_id` WHERE `due_invoice`.`student_id`='$id' AND
`due_invoice`.`year`='$year' AND `due_invoice`.`class_id`='$classID' AND `due_invoice`.`voucher`='$last_id' GROUP BY `due_invoice`.`student_id`";

//echo $qurRun;

$SqlRun=$db->select_query($qurRun);
$fetchRun=mysqli_fetch_assoc($SqlRun);





?>
<style type="text/css">
<!--
.style2 {color: #333333;font-size:14px;font-family:Arial, Helvetica, sans-serif; padding-left:10px;}
.style3 {color: #333333;font-size:14px;font-family:Arial, Helvetica, sans-serif; padding-left:10px;}
.style5 {color: #000000;font-size:14px;font-family:Arial, Helvetica, sans-serif;text-decoration:overline;}
-->
li{list-style:none}
.style7 {color: #000033;font-weight:bold;font-size:12px;font-family:Arial, Helvetica, sans-serif}
.style8 {color: #000066;font-size:14px;font-family:Arial, Helvetica, sans-serif}
@media print{
  .print{display: none;}
}
</style>

<?php
function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );


    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}

/*$a=0;
for ($j=0; $j <2 ; $j++)
 { 

$a++;*/

?>

 	<style type="text/css">
		
		@media print{
			.print{
				display:none;
			}

			a[href]:after {
    content: none !important;
  }

	</style>

<div style="float:left;  clear:right; margin: auto; width: 760px; border:1px #000 solid; margin:5px;">
  <table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
    <tr >
  <td height="60" align="center" style="border-bottom:1px solid #333333">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>
      <td style="border-bottom:1px solid #333333" height="60" colspan="4" align="center" >
    <ul style=" padding-top:5px">
    
    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    <?php echo $fetchApp["institute_name"]?></li>
   <li><p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["location"]?></p></li>
    <li style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["phone_number"].', '.$fetchApp["webAddress"];?></li>

      


     </ul>      </td>
<td style="border-bottom:1px solid #333333" width="220" align="center"> <?php print  $code;?> &nbsp;</td>
    </tr>
    

    
     <tr>
        <td colspan="6" align="center"> 

<table width="100%">

    <tr>
        <td colspan="9" align="center">  <span class="style3" style="float: left; clear: right;"> Print Date & Time : <?php print date(" Y-m-d  h:i:sa")?></span>  <span class="style3" style="  font-weight: bold; float: right;">  </span> </td>
    </tr>


   <tr>
      <td width="89" height="27"><span class="style3">Receipt </span></td>
      <td width="9" align="center">:</td>
      <td width="205" style="font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["voucher"] ?></td>

<td height="20"><span class="style3">ID</span></td>
      <td align="center">:</td>
      <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;font-weight: bold;"><?php echo $fetchRun["student_id"]?></td>


    
      <td width="117"><span class="style2">Expire Date:</span></td>
      <td width="16" align="center">:</td>
      <td width="77" style="font-size:14px;font-family:Arial, Helvetica, sans-serif">  <?php  $d=explode('-',$_GET['date']);  echo $d[2].'-'.$d[1].'-'.$d[0]; ?>

          </td>
    </tr>



    <tr>
    

      <td height="20"><span class="style3">Name</span></td>
      <td align="center">:</td>
      <td width="205" style="font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php  echo $fetchRun["student_name"]?></td>

        <td><span class="style2">Class</span></td>
      <td align="center">:</td>
      <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["class_name"]?></td>


      <td><span class="style2">Roll</span></td>
      <td align="center">:</td>
      <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["class_roll"]?></td>
    </tr>
      
</table>

         </td>
    </tr>




   

      <tr>
      <td  colspan="6">


    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333" style="border-top:1px solid #333333">


        <tr >
          <td  width="20"  align="center"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; ">SL</td>

          <td width="150" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333">Fee Title </td>

          <td width="80" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Amount </span></td>
              <td width="80" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Disc.</span></td>
          <td width="80" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Net Amount</span></td>
          <td width="80" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Previous Paid</span></td>
           <td width="80" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7"> Paid</span></td>
          <td width="80" align="center" style="border-bottom:1px solid #333333;">
          <span class="style7">Dues</span> </td>
        </tr>

<?php


$sqls="SELECT `due_invoice`.*,`add_fee`.`title`,`amount`,`Common_Exceptional`,`student_account_info`.`AmountExceptional` FROM `due_invoice`  INNER JOIN `add_fee` ON `add_fee`.`id`=`due_invoice`.`fk_fee_id` INNER JOIN `student_account_info` ON `student_account_info`.`fee_id`=`due_invoice`.`fk_fee_id` WHERE `due_invoice`.`class_id`='$classID' AND `due_invoice`.`year`='$year' AND `due_invoice`.`student_id`='$id' AND `due_invoice`.`voucher`='$last_id' AND `student_account_info`.`studentID`='$id'";



$querys=$db->select_query($sqls);
if ($querys) 
{
  $totalAmmount =0;
  $totalDiscoutn=0;
  $total=0;
  $dis=0;
  $totalPaid=0;
  $totalDues=0;
  $s = 0;
 while ($fetcRow=mysqli_fetch_assoc($querys)) {
 $s ++;
 
 
      $forDis= "SELECT * FROM `add_discount` WHERE `student_id`='$id' AND `year`='$year' AND `class_id`='$classID' and feeid='$fetcRow[fk_fee_id]'";


              $resDist = $db->select_query($forDis);
                if($resDist){
                    $fetchdis=$resDist->fetch_array();
                  $discount = $fetchdis["discount"];
                }else{
                $discount = "";
                }
                

                $paidAmmount = "SELECT SUM(`paid_amount`) AS 'total',`admin_id`
FROM `due_invoice` WHERE `fk_fee_id`='$fetcRow[fk_fee_id]' AND `student_id`='$id' AND `class_id`='$classID' AND `year`='$year' ";



                
                $RelpaidAmmount = $db->select_query($paidAmmount);
                if($RelpaidAmmount->num_rows > 0){


                    $fetchPaidAmount=$RelpaidAmmount->fetch_array();
                    $padiAMmount = $fetchPaidAmount["total"];
                
                  //  $adminName="SELECT * FROM  `admin_users` WHERE `id`='$fetchPaidAmount[1]'";

                    // $regadminName = $db->select_query($adminName);
                     //$fetchAdminName=$regadminName->fetch_array();



                    $totalPaid = $totalPaid + $fetcRow['paid_amount'];
                }else {
                $padiAMmount = "";
                }
                
                
                
                if($fetcRow['Common_Exceptional']=="Common")
                      {
                        $netAmmount =  $fetcRow["amount"] - $discount;
                      }
                      else
                      {
                            
                            $netAmmount =  $fetcRow["AmountExceptional"] - $discount;

                      }


              
                
                $dueAmmount = $netAmmount-$padiAMmount;
                
                $totalDues = $totalDues+  $dueAmmount;
                

  if($fetcRow['Common_Exceptional']=="Common")
                      {
                          $totalAmmount = $totalAmmount +  $fetcRow["amount"];
                      }
                      else
                      {
                            
                            $totalAmmount =  $totalAmmount+$fetcRow["AmountExceptional"];

                      }

              
                


                $totalDiscoutn = $totalDiscoutn + $discount;
                
                

?>
        <tr>
          <td height="10" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333">

          <?php echo $s; ?> </td>

          <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo $fetcRow["title"]; ?> </td>
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php 



  if($fetcRow['Common_Exceptional']=="Common")
                      {
                            echo @$db->my_money_format($fetcRow["amount"]); 
                      }
                      else
                      {
                            
                               echo @$db->my_money_format($fetcRow["AmountExceptional"]); 

                         

                      }


       



          ?>&nbsp;</td>
             <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333;"><?php echo @$db->my_money_format($discount); ?>&nbsp; </td>
          <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($netAmmount); ?>&nbsp; </td>

          

          <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($padiAMmount-$fetcRow['paid_amount']); ?> &nbsp;</td>



          <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($fetcRow['paid_amount']); ?>&nbsp; </td>
          <td align="right" style="border-bottom:1px solid #333333;"><?php echo @$db->my_money_format($dueAmmount); ?>&nbsp; </td>

        </tr>
<?php
 }
 
?>  
  
    <tr>
        <td align="right" style=" padding-top:10px;" colspan="8">
            

            <table style="border: 1px #000 solid; margin-right:2px; width: 600px;  " >
                <tr>
                      <td>Total Amount   </td>
                      <td>  :  </td>
                      
                      <td><?php echo @$db->my_money_format($totalAmmount);?></td>

              
                      <td>Total Discount     </td>
                      <td>  :  </td>
                      <td><?php echo @$db->my_money_format($totalDiscoutn);?></td>


                
                       <td>Paid Amount </td>
                      <td>  :  </td>
                      <td><?php echo @$db->my_money_format($totalPaid);?></td>

                </tr>
               
                

                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                      <td >Previous Paid      </td>
                      <td>  :  </td>
                      <td><?php
                       $previousPaidAmount=$totalAmmount-($totalPaid+$totalDues);
                        echo @$db->my_money_format($previousPaidAmount);?></td>

                         <td>Due Amount    </td>
                      <td>  :  </td>
                      <td><?php echo @$db->my_money_format($totalDues);?></td>

                </tr>


           
              
              
              

          </table>
        </td>
    </tr>

 

          <?php 




  ?>
  <tr>
    <td colspan="8">

<table width="100%">
  
  <tr>
      <td height="70" valign="bottom" align="center">
<form  method="POST">
<?php
$sql=$db->link->query("SELECT * FROM  `student_dues` WHERE `invoice_id`='".$_GET["last_id"]."' AND `status`='0'");
if($sql->num_rows>0)
{?>

<input type="hidden" value="<?php echo $fetchRun["student_id"]?>" name="id">
<input type="hidden" value="<?php  echo $fetchRun["student_name"]?>" name="name">
<input type="hidden" value="<?php  echo $fetchRun["guardian_contact"]?>" name="phone">
<input type="hidden" value="<?php echo $totalPaid;?>" name="paid">
<input type="hidden" value="<?php echo $totalDues;?>" name="due">

<input type="submit" class="print"  style="height: 35px; width: 140px; color: #fff; border-radius:10px; background: #ff0000; font-size: 18px; " value="Confirm"  name="confirm"> </input>


<?php

}
?>

    
      <!--<input type="submit"  class="print"  style="height: 35px; width: 140px; color: #fff; border-radius:10px; background: #ff0000; font-size: 18px; "  value="sms"  name="sms"> </input>-->



    </form>

      </td>
      <td valign="bottom">
         
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">

         

        </p>
      </td>
      <td colspan="2" align="center" valign="bottom"><p style="margin-top:3px;"></p></td>
  <td valign="bottom" align="center"><p style="font-weight: bold;; font-size: 14px;"> Developed By: SBIT (www.sbit.com.bd)</p></td>
      <td align="right" valign="bottom" style="">
        <br>
        <br>
<p style=" text-align:center;"> 

<?php // print $fetchAdminName[1];;?> 

</p>

        
..................................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px;  text-align: center; ">

       Approved By
        </p>

         </td>
    </tr>
</table>
    
</td>
</tr>

    

</table>


  <?php
}
  ?>




