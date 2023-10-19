
<?php
@error_reporting(1);
session_start();
date_default_timezone_set("Asia/Dhaka");
  require_once("../db_connect/config.php");
  require_once("../db_connect/conect.php");
  $db = new database();
	
  require "barcode/vendor/autoload.php";
  $Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
  $barcode = $Bar->getBarcode($_GET["last_id"], $Bar::TYPE_CODE_128);



$id =$_GET["id"];
$year =$_GET["year"];
$date =$_GET["date"];
$clas =$_GET["clas"];
$last_id =$_GET["last_id"];
$classID =$_GET["clas"];


$selApp="select * from project_info";
$queApp=$db->select_query($selApp);
$fetchApp=mysqli_fetch_assoc($queApp);

$qurRun="SELECT `due_invoice`.*,`student_personal_info`.`student_name`,`running_student_info`.`class_roll`,`add_class`.`class_name`  FROM `due_invoice`
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`due_invoice`.`student_id` INNER JOIN `running_student_info`
ON `running_student_info`.`student_id`=`due_invoice`.`student_id` INNER JOIN `add_class` ON `add_class`.`id`=`due_invoice`.`class_id` WHERE `due_invoice`.`student_id`='$id' AND
`due_invoice`.`year`='$year' AND `due_invoice`.`class_id`='$classID' AND `due_invoice`.`voucher`='$last_id' GROUP BY `due_invoice`.`student_id`";

//echo $qurRun;

$SqlRun=$db->select_query($qurRun);
$fetchRun=mysqli_fetch_assoc($SqlRun);

?>
<style type="text/css">
<!--
.style2 {color: #333333;font-size:11px;font-family:Arial, Helvetica, sans-serif; padding-left:10px;}
.style3 {color: #333333;font-size:11px;font-family:Arial, Helvetica, sans-serif; padding-left:10px;}
.style5 {color: #000000;font-size:11px;font-family:Arial, Helvetica, sans-serif;text-decoration:overline;}
-->
li{list-style:none}
.style7 {color: #000033;font-weight:bold;font-size:11px;font-family:Arial, Helvetica, sans-serif}
.style8 {color: #000066;font-size:11px;font-family:Arial, Helvetica, sans-serif}
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
    $list1 = array('', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven',
        'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'
    );
    $list2 = array('', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety', 'Hundred');
    $list3 = array('', 'Thousand', 'Million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
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
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '');
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

?>

 
   <style type="text/css">
		
		@media print{
			.print{
				display:none;
			}
			.notPrint{
				display:none;
			}
}

    @media printt
    {
        a[href]:after {
        		content: none !important;
         }
    }

</style>

<div style="width: 1100px; height: auto; background: #fff;">
    
<div style="height: 100%; width: 350px; background: #fff; float: left; clear: right; "> 

<table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
    <tr>
            <td  align="center" style="border-bottom:1px solid #333333;" width="50">
                    <img src="all_image/logoSDMS2015.png" style="height:70px; width:70px;"/>
            </td>
            <td style="border-bottom:1px solid #333333" align="center" >
                <ul style=" padding-top:5px">
                    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
                    <?php echo $fetchApp["institute_name"]?></li>
                    <li><p style="margin-top:-1px;font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["location"]?></p></li>
                    <li style="margin-top:-13px;font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["phone_number"].', '.$fetchApp["webAddress"];?></li>
                   <p style="width:50px; font-size:8px"> <?php echo $barcode;?></p> 
                    
                 </ul>      
            </td>
            
              <td  align="center" style="border-bottom:1px solid #333333; text-align:center; font-size:10px; padding-left:20px;" width="150" >
                  
            </td>
    </tr>
    </table>
    
  <table  width="350"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
                <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Deposit  Date : .........................</span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> [Bank Copy] </span> 
                    </td>
                </tr>
               
                
                
                 <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Bank: Islami Bank Bd Ltd.</span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> Branch: Sonagazi Bazar Upo Shaka </span> 
                         
                    </td>
                </tr>
                
                         
                 <tr>
                    <td colspan="9" align="center" height="15">  
                      
                      
                 <span class="style3" style="float: left; clear: right;">A/C :20506300200009309</span>  
                          <span class="style3" style=" float: right;"> </span> 
                    </td>
                </tr>
                
               
                
               <tr>
                  <td height="15" width="89"><span class="style3">Receipt </span></td>
                  <td width="9" align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["voucher"] ?></td>
                  <td ><span class="style3">ID</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif;font-size:15px;" colspan="4"><?php echo $fetchRun["student_id"]?></td>
                </tr>
                
                <tr>
                  <td height="15" ><span class="style3">Name</span></td>
                  <td align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php  echo $fetchRun["student_name"]?></td>
            
                <td><span class="style2">Class</span></td>
                <td align="center">:</td>
                <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["class_name"]?></td>
                <td><span class="style2">Roll</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif; font-size:15px"><?php echo $fetchRun["class_roll"]?></td>
                </tr>
                
            </table>
     
    <table width="350" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333" style="border-top:1px solid #333333; font-size:12px;">
            <tr>
              <td  width="10" height="35"  align="center"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; ">SL</td>
              <td width="100" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333">Fee Title </td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Amount </span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Disc.</span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Previous Paid</span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7"> Payable</span></td>
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
                $discount = "0";
        }

        $paidAmmount = "SELECT SUM(`paid_amount`) AS 'total',`admin_id` FROM `student_paid_table` WHERE `fk_fee_id`='$fetcRow[fk_fee_id]' AND `student_id`='$id' AND `class_id`='$classID' AND `year`='$year' ";


        $RelpaidAmmount = $db->select_query($paidAmmount);
        if($RelpaidAmmount->num_rows > 0){

                    $fetchPaidAmount=$RelpaidAmmount->fetch_array();
                    $padiAMmount = $fetchPaidAmount["total"];
                    $totalPaid = $totalPaid + $fetcRow['total'];
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
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          <?php echo $s; ?> </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;"> &nbsp;<?php echo $fetcRow["title"]; ?> </td>
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
             <td align="right" height="35" style="border-bottom:1px solid #333333;border-right:1px solid #333333;"><?php echo @$db->my_money_format($discount); ?>&nbsp; </td>
              <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($padiAMmount); ?> &nbsp;</td>
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($dueAmmount); ?>&nbsp; </td>

        </tr>
<?php
 }
 
?>  
  

    <tr>
          <td height="35"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;" colspan="5" align="right">

          Total : </td>
          <td style="border-bottom:1px solid #333333;border-right:1px solid #333333;" align="right"><?php echo @$db->my_money_format($totalDues);?></td>
  </tr>

           <tr>
           <td  colspan="6" height="35" align="left" style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; padding-left:10px;">(In word): Tk. <?php 
              print convertNumberToWord($totalDues); ?> Only &nbsp;

           </td>
          
        </tr>



    </table>
<table  width="350"  border="0" align="left" cellpadding="0" cellspacing="0">
 <td valign="bottom">
          .......................
        <p style="font-size:11px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:20px;">

        Student
        </p>
      </td>

      <td align="right" valign="bottom" style="font-size:13px;">
        
   <br>
        
        <?php  print $fetchAdminName[1];?> <br>

..........................
        <p style="font-size:11px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px;  text-align: right; padding-right:20px; ">

       Receiver
        </p>

         </td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="font-size:13px;"> Developed by : SBIT </td>
    </tr>
</table>



  <?php
}
  ?>


</div>
<!--.....................................................................................................School ...................................................-->


<div style="height: 100%;  width: 345px; background: #fff; float: left; clear: right; padding:0px 25px 0px 30px;  "> <table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
    <tr>
            <td  align="center" style="border-bottom:1px solid #333333;" width="50">
                    <img src="all_image/logoSDMS2015.png" style="height:70px; width:70px;"/>
            </td>
            <td style="border-bottom:1px solid #333333" align="center" >
                <ul style=" padding-top:5px">
                    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
                    <?php echo $fetchApp["institute_name"]?></li>
                    <li><p style="margin-top:-1px;font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["location"]?></p></li>
                    <li style="margin-top:-13px;font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["phone_number"].', '.$fetchApp["webAddress"];?></li>
                   <p style="width:50px; font-size:8px"> <?php echo $barcode;?></p> 
                    
                 </ul>      
            </td>
            
              <td  align="center" style="border-bottom:1px solid #333333; text-align:center; font-size:10px; padding-left:20px;" width="150" >
                  
            </td>
    </tr>
    </table>
    
  <table  width="350"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
                <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Deposit  Date : .........................</span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> [School Copy] </span> 
                    </td>
                </tr>
               
                
                
                 <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Bank: Islami Bank Bd Ltd.</span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> Branch: Sonagazi Bazar Upo Shaka </span> 
                         
                    </td>
                </tr>
                
                         
                 <tr>
                    <td colspan="9" align="center" height="15">  
                      
                      
                 <span class="style3" style="float: left; clear: right;">A/C :20506300200009309</span>  
                          <span class="style3" style="   float: right;"> </span> 
                    </td>
                </tr>
                
               
                
               <tr>
                  <td height="15" width="89"><span class="style3">Receipt </span></td>
                  <td width="9" align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["voucher"] ?></td>
                  <td ><span class="style3">ID</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif;font-size:15px" colspan="4"><?php echo $fetchRun["student_id"]?></td>
                </tr>
                
                <tr>
                  <td height="15" ><span class="style3">Name</span></td>
                  <td align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php  echo $fetchRun["student_name"]?></td>
            
                <td><span class="style2">Class</span></td>
                <td align="center">:</td>
                <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["class_name"]?></td>
                <td><span class="style2">Roll</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif;font-size:15px"><?php echo $fetchRun["class_roll"]?></td>
                </tr>
                
            </table>
     
    <table width="350" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333" style="border-top:1px solid #333333; font-size:12px;">
            <tr>
              <td  width="10" height="35" align="center"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; ">SL</td>
              <td width="100" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333">Fee Title </td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Amount </span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Disc.</span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Previous Paid</span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7"> Payable</span></td>
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

        $paidAmmount = "SELECT SUM(`paid_amount`) AS 'total',`admin_id` FROM `student_paid_table` WHERE `fk_fee_id`='$fetcRow[fk_fee_id]' AND `student_id`='$id' AND `class_id`='$classID' AND `year`='$year' ";

        $RelpaidAmmount = $db->select_query($paidAmmount);
        if($RelpaidAmmount->num_rows > 0){
                    $fetchPaidAmount=$RelpaidAmmount->fetch_array();
                    $padiAMmount = $fetchPaidAmount["total"];
                    $totalPaid = $totalPaid + $fetcRow['total'];
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
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          <?php echo $s; ?> </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;"> &nbsp;<?php echo $fetcRow["title"]; ?> </td>
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
              <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($padiAMmount); ?> &nbsp;</td>
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($dueAmmount); ?>&nbsp; </td>

        </tr>
<?php
 }
 
?>  
  

    <tr>
          <td height="35"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;" colspan="5" align="right">

          Total : </td>
          <td style="border-bottom:1px solid #333333;border-right:1px solid #333333;" align="right"><?php echo @$db->my_money_format($totalDues);?></td>
  </tr>

           <tr>
           <td  colspan="6" height="35" align="left" style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; padding-left:10px;">(In word): Tk. <?php 
              print convertNumberToWord($totalDues); ?> Only &nbsp;

           </td>
          
        </tr>



    </table>
<table  width="350"  border="0" align="left" cellpadding="0" cellspacing="0">
 <td valign="bottom">
          .......................
        <p style="font-size:11px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:20px;">

        Student
        </p>
      </td>

      <td align="right" valign="bottom" style="font-size:13px;">
        
   <br>
        
        <?php  print $fetchAdminName[1];?> <br>

..........................
        <p style="font-size:11px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px;  text-align: right; padding-right:20px; ">

       Receiver
        </p>

         </td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="font-size:13px;"> Developed by : SBIT </td>
    </tr>
</table>



  <?php
}
  ?>
</div>
<!--.....................................................................................................Student Copy...................................................-->

<div style="height: 100%;  width: 340px; background: #fff; float: right;  "> <table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
    <tr>
            <td  align="center" style="border-bottom:1px solid #333333;" width="50">
                    <img src="all_image/logoSDMS2015.png" style="height:70px; width:70px;"/>
            </td>
            <td style="border-bottom:1px solid #333333" align="center" >
                <ul style=" padding-top:5px">
                    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
                    <?php echo $fetchApp["institute_name"]?></li>
                    <li><p style="margin-top:-1px;font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["location"]?></p></li>
                    <li style="margin-top:-13px;font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["phone_number"].', '.$fetchApp["webAddress"];?></li>
                   <p style="width:50px; font-size:8px"> <?php echo $barcode;?></p> 
                    
                 </ul>      
            </td>
            
              <td  align="center" style="border-bottom:1px solid #333333; text-align:center; font-size:10px; padding-left:20px;" width="150" >
                  
            </td>
    </tr>
    </table>
    
  <table  width="350"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
                <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Deposit  Date : .........................</span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> [Student Copy] </span> 
                    </td>
                </tr>
               
                
                
                 <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Bank: Islami Bank Bd Ltd.</span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> Branch: Sonagazi Bazar Upo Shaka </span> 
                         
                    </td>
                </tr>
                
                         
                 <tr>
                    <td colspan="9" align="center" height="15">  
                      
                      
                 <span class="style3" style="float: left; clear: right;">A/C :20506300200009309</span>  
                          <span class="style3" style=" float: right;"> </span> 
                    </td>
                </tr>
                
               
                
               <tr>
                  <td height="15" width="89"><span class="style3">Receipt </span></td>
                  <td width="9" align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["voucher"] ?></td>
                  <td ><span class="style3">ID</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif; font-size:15px" colspan="4"><?php echo $fetchRun["student_id"]?></td>
                </tr>
                
                <tr>
                  <td height="15" ><span class="style3">Name</span></td>
                  <td align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php  echo $fetchRun["student_name"]?></td>
            
                <td><span class="style2">Class</span></td>
                <td align="center">:</td>
                <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["class_name"]?></td>
                <td><span class="style2">Roll</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif;font-size:15px"><?php echo $fetchRun["class_roll"]?></td>
                </tr>
                
            </table>
     
    <table width="350" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333" style="border-top:1px solid #333333; font-size:12px;">
            <tr>
              <td height="35" width="10"  align="center"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; ">SL</td>
              <td width="100" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333">Fee Title </td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Amount </span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Disc.</span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Previous Paid</span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7"> Payable</span></td>
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

        $paidAmmount = "SELECT SUM(`paid_amount`) AS 'total',`admin_id` FROM `student_paid_table` WHERE `fk_fee_id`='$fetcRow[fk_fee_id]' AND `student_id`='$id' AND `class_id`='$classID' AND `year`='$year' ";

        $RelpaidAmmount = $db->select_query($paidAmmount);
        if($RelpaidAmmount->num_rows > 0){
                    $fetchPaidAmount=$RelpaidAmmount->fetch_array();
                    $padiAMmount = $fetchPaidAmount["total"];
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
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          <?php echo $s; ?> </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;"> &nbsp;<?php echo $fetcRow["title"]; ?> </td>
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
              <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($padiAMmount); ?> &nbsp;</td>
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($dueAmmount); ?>&nbsp; </td>

        </tr>
<?php
 }
 
?>  
  

    <tr>
          <td height="35"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;" colspan="5" align="right">

          Total : </td>
          <td style="border-bottom:1px solid #333333;border-right:1px solid #333333;" align="right"><?php echo @$db->my_money_format($totalDues);?></td>
  </tr>

           <tr>
           <td  colspan="6" height="35" align="left" style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; padding-left:10px;">(In word): Tk. <?php 
              print convertNumberToWord($totalDues); ?> Only &nbsp;

           </td>
          
        </tr>



    </table>
<table  width="350"  border="0" align="left" cellpadding="0" cellspacing="0">
 <td valign="bottom">
          .......................
        <p style="font-size:11px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:20px;">

        Student
        </p>
      </td>

      <td align="right" valign="bottom" style="font-size:13px;">
        
   <br>
        
        <?php  print $fetchAdminName[1];?> <br>

..........................
        <p style="font-size:11px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px;  text-align: right; padding-right:20px; ">

       Receiver
        </p>

         </td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="font-size:13px;"> Developed by : SBIT </td>
    </tr>
</table>



  <?php
}
  ?>
</div>
</div>
	<br>
<center> <input type="button" value="Print" style="background:#ff0000; color:#fff; height:35px; width:100px; margin-top:20px; border-radious:10px;" onclick="window.print()" class="print"> </center>


