
<?php
//error_reporting(1);
session_start();
date_default_timezone_set("Asia/Dhaka");
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();

 require "barcode/vendor/autoload.php";
  $Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
  $barcode = $Bar->getBarcode($_GET["last_id"], $Bar::TYPE_CODE_128);

	
	
$id =json_decode($_GET["id"]);
$vou =json_decode($_GET["Lid"]);
$year =json_decode($_GET["year"]);
$date =json_decode($_GET["date"]);
$clas =json_decode($_GET["clas"]);
 $last_id =json_decode($_GET["last_id"]);
$explodecl = explode('and',$clas);


$selApp="select * from project_info";
$queApp=$db->select_query($selApp);
$fetchApp=mysqli_fetch_assoc($queApp);



  $qurRun="SELECT `student_paid_table`.*,`student_personal_info`.`student_name`,`student_academic_record`.`class_roll`,`add_class`.`class_name` 
FROM `student_paid_table` INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`student_paid_table`.`student_id` 
INNER JOIN `student_academic_record` ON `student_academic_record`.`student_id`=`student_paid_table`.`student_id`  INNER JOIN `add_class` ON `add_class`.`id`=`student_paid_table`.`class_id` WHERE `student_paid_table`.`student_id`='$id' AND
`student_paid_table`.`year`='$year' AND `student_paid_table`.`class_id`='$explodecl[0]' AND `student_paid_table`.`voucher`='$last_id' AND `student_academic_record`.`year`='$year' GROUP BY `student_paid_table`.`student_id`";

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
	<style type="text/css">
		
		@media print{
			.print{
				display:none;
			}

			a[href]:after {
    content: none !important;
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

<div style="width: 1100px;  background: #fff; padding:20px;">
    
<!--.....................................................................................................................-->
<div style=" width: 520px; background: #fff; float: left; clear: right;  padding-right:20px;"> 
 
  <table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
    <tr>
            <td  align="center" style="border-bottom:1px solid #333333;" width="70">
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
                    প্রতি চলতি মাসের ০৭তারিখের মধ্যে ঐ মাসের বেতন-ফী পরিশোধ করতে অনুরোধ করা যাচ্ছে।
            </td>
    </tr>
    </table>
    
  <table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
                <tr>
                    <td colspan="9" align="center" >  
                        <span class="style3" style="float: left; clear: right;"> Print Date & Time : <?php print date(" Y-m-d  h:i:sa")?></span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> [School Copy] </span> 
                    </td>
                </tr>
               <tr>
                  <td  width="89"><span class="style3">Receipt </span></td>
                  <td width="9" align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["voucher"] ?></td>
                  <td ><span class="style3">ID</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif;font-weight: bold;"><?php echo $fetchRun["student_id"]?></td>
                 
                  <td width="117"><span class="style2"> Date</span></td>
                  <td width="16" align="center">:</td>
                  <td width="77" style="font-size:11px;font-family:Arial, Helvetica, sans-serif">      <?php  $d=explode('-',$fetchRun["date"]);  echo $d[2].'-'.$d[1].'-'.$d[0]; ?></td>
                </tr>
                <tr>
                  <td  ><span class="style3">Name</span></td>
                  <td align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php  echo $fetchRun["student_name"]?></td>
            
                <td><span class="style2">Class</span></td>
                <td align="center">:</td>
                <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["class_name"]?></td>
                <td><span class="style2">Roll</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["class_roll"]?></td>
                </tr>
            </table>
     
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333" style="border-top:1px solid #333333; font-size:12px;">
            <tr>
              <td  width="10"  align="center"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; ">SL</td>
              <td width="100" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333">Fee Title </td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Amount </span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Disc.</span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Previous Paid</span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7"> Paid</span></td>
            </tr>
<?php

$sqls="SELECT `student_paid_table`.*,`add_fee`.`title`,`amount`,`Common_Exceptional`,`student_account_info`.`AmountExceptional` FROM `student_paid_table`  INNER JOIN `add_fee` ON `add_fee`.`id`=`student_paid_table`.`fk_fee_id` INNER JOIN `student_account_info` ON `student_account_info`.`fee_id`=`student_paid_table`.`fk_fee_id` WHERE `student_paid_table`.`class_id`='$explodecl[0]' AND `student_paid_table`.`year`='$year' AND `student_paid_table`.`student_id`='$id' AND `student_paid_table`.`voucher`='$last_id' AND `student_account_info`.`studentID`='$id'";
//echo $sqls;

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
 while ($fetcRow=$querys->fetch_array()) {
 $s ++;
 //echo $fetcRow[0];
 
      $forDis= "SELECT * FROM `add_discount` WHERE `student_id`='$id' AND `year`='$year' AND `class_id`='$explodecl[0]' and feeid='$fetcRow[fk_fee_id]'";

              $resDist = $db->select_query($forDis);
                if($resDist->num_rows > 0){
                    $fetchdis=$resDist->fetch_array();
                  $discount = $fetchdis["discount"];
                }else{
                $discount = "";
                }
            $paidAmmount = "SELECT SUM(`paid_amount`) AS 'total',`admin_id` FROM `student_paid_table` WHERE `fk_fee_id`='$fetcRow[fk_fee_id]' AND `student_id`='$id' AND `class_id`='$explodecl[0]' AND `year`='$year' ";
            $RelpaidAmmount = $db->select_query($paidAmmount);
            if($RelpaidAmmount->num_rows > 0){
                $fetchPaidAmount=$RelpaidAmmount->fetch_array();
                $padiAMmount = $fetchPaidAmount["total"];
                $adminName="SELECT * FROM  `admin_users` WHERE `id`='$fetchPaidAmount[1]'";
                $regadminName = $db->select_query($adminName);
                $fetchAdminName=$regadminName->fetch_array();
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
                      }?>&nbsp;
                      </td>
        <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333;"><?php echo @$db->my_money_format($discount); ?>&nbsp; </td>
        <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($padiAMmount-$fetcRow['paid_amount']); ?> &nbsp;</td>
        <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($fetcRow['paid_amount']); ?>&nbsp; </td>
       </tr>
<?php
 }
 
?>  

   <tr>
          <td height="10"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;" colspan="5" align="right">

          Total : </td>
          <td style="border-bottom:1px solid #333333;border-right:1px solid #333333;" align="right"><?php echo @$db->my_money_format($totalPaid);?></td>
  </tr>
  
   <tr>
           <td  colspan="6" align="left" style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; padding-left:10px;">(In word): Tk. <?php 
              print convertNumberToWord($totalPaid);
           ?> Only &nbsp;

           </td>
          
        </tr>
        
  
    <tr>
        <td align="left" style=" padding-top:10px;" colspan="6">
        <table style="border: 1px #000 solid; margin-right:2px; font-size:12px;  "  width="100%">
                <tr>
                      <td>Total Amount   </td>
                      <td>  :  </td>
                      <td> <?php
                      
                      $mo=date('m');
                           $totalPaid_amount=$db->select_query("SELECT SUM(`add_fee`.`amount`) as 'common', SUM(`student_account_info`.`AmountExceptional`) as 'exceptional' FROM `add_fee` INNER JOIN `student_account_info` ON `student_account_info`.`fee_id`=`add_fee`.`id` WHERE `student_account_info`.`studentID`='$id'  AND `student_account_info`.`year`='$year' AND `student_account_info`.`class_id`='$explodecl[0]' AND `add_fee`.`fk_month_id` BETWEEN '01' AND '$mo'");
                          // echo "SELECT SUM(`add_fee`.`amount`) as 'common', SUM(`student_account_info`.`AmountExceptional`) as 'exceptional' FROM `add_fee` INNER JOIN `student_account_info` ON `student_account_info`.`fee_id`=`add_fee`.`id` WHERE `student_account_info`.`studentID`='$id'  AND `student_account_info`.`year`='$year' AND `student_account_info`.`class_id`='$explodecl[0]' AND `add_fee`.`fk_month_id` BETWEEN '01' AND '$mo'";
                          
							if($totalPaid_amount)
							{
							    $fetch_paid_Amount=$totalPaid_amount->fetch_array();
							    $totalAmount=$fetch_paid_Amount[0]+$fetch_paid_Amount[1];
							}
							
							echo @$db->my_money_format($totalAmount);?>
                   
                      </td>
                             <td>Total Discount   </td>
                      <td>  :  </td>
                      <td> <?php
                      
                      $mo=date('m');
                           	$select_dis_amount="SELECT SUM(`add_discount`.`discount`) FROM `add_discount`
INNER JOIN `add_fee` ON `add_fee`.`id`=`add_discount`.`feeid` 
WHERE `add_discount`.`student_id`='$id' AND `add_discount`.`class_id`='".$explodecl[0]."' AND `add_discount`.`year`='".$year."' AND `add_fee`.`fk_month_id` BETWEEN '01' AND '$mo'";
			
			//echo $select_dis_amount; 
			$fetch_dis_amount=$db->select_query($select_dis_amount);
			if($fetch_dis_amount)
			{
				$fetch_fee_dis_amount=$fetch_dis_amount->fetch_array();
			   
			}
			
					echo @$db->my_money_format($fetch_fee_dis_amount[0]);
			
			?>
                      
                      </td>
                      </tr>
                      
                      <tr>
                      
                      
                      <td>Total Paid   </td>
                      <td>  :  </td>
                      
                      <td><?php
                      

                       $totalPaid_amount=$db->select_query("SELECT SUM(`paid_amount`) FROM `student_paid_table` WHERE `student_id`='$id'  AND `class_id`='$explodecl[0]' AND `year`='$year'");
	  
							if($totalPaid_amount)
							{
							    $fetch_paid_Amount=$totalPaid_amount->fetch_array();
							}
							
							echo @$db->my_money_format($fetch_paid_Amount[0]);?>

                      </td>

                       <td>Due Amount    </td>
                      <td>  :  </td>
                      <td><?php
                      
                      $dueAmount=$totalAmount-($fetch_fee_dis_amount[0]+$fetch_paid_Amount[0]);
                      
                      echo @$db->my_money_format($dueAmount);?></td>

                </tr>
               
          </table>
        </td>
    </tr>
    </table>
<table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0">
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
         <td align="center" colspan="2" style="font-size:13px;"> Developed By: SBIT </td>
    </tr>
</table>

  <?php
}
  ?>
  
</div>

<!--.....................................................................................................................-->

<div style=" width: 520px; background: #fff; float: right;  "> 
 
   
  <table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
    <tr>
            <td  align="center" style="border-bottom:1px solid #333333;" width="70">
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
                    প্রতি চলতি মাসের ০৭তারিখের মধ্যে ঐ মাসের বেতন-ফী পরিশোধ করতে অনুরোধ করা যাচ্ছে।
            </td>
    </tr>
    </table>
    
  <table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
                <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Print Date & Time : <?php print date(" Y-m-d  h:i:sa")?></span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> [Student Copy] </span> 
                    </td>
                </tr>
               <tr>
                  <td height="15" width="89"><span class="style3">Receipt </span></td>
                  <td width="9" align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["voucher"] ?></td>
                  <td ><span class="style3">ID</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif;font-weight: bold;"><?php echo $fetchRun["student_id"]?></td>
                 
                  <td width="117"><span class="style2"> Date</span></td>
                  <td width="16" align="center">:</td>
                  <td width="77" style="font-size:11px;font-family:Arial, Helvetica, sans-serif">      <?php  $d=explode('-',$fetchRun["date"]);  echo $d[2].'-'.$d[1].'-'.$d[0]; ?></td>
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
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchRun["class_roll"]?></td>
                </tr>
            </table>
     
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333" style="border-top:1px solid #333333; font-size:12px;">
            <tr>
              <td  width="10"  align="center"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; ">SL</td>
              <td width="100" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333">Fee Title </td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Amount </span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Disc.</span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Previous Paid</span></td>
              <td width="20" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7"> Paid</span></td>
            </tr>
<?php

$sqls="SELECT `student_paid_table`.*,`add_fee`.`title`,`amount`,`Common_Exceptional`,`student_account_info`.`AmountExceptional` FROM `student_paid_table`  INNER JOIN `add_fee` ON `add_fee`.`id`=`student_paid_table`.`fk_fee_id` INNER JOIN `student_account_info` ON `student_account_info`.`fee_id`=`student_paid_table`.`fk_fee_id` WHERE `student_paid_table`.`class_id`='$explodecl[0]' AND `student_paid_table`.`year`='$year' AND `student_paid_table`.`student_id`='$id' AND `student_paid_table`.`voucher`='$last_id' AND `student_account_info`.`studentID`='$id'";
//echo $sqls;

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
 while ($fetcRow=$querys->fetch_array()) {
 $s ++;
 //echo $fetcRow[0];
 
      $forDis= "SELECT * FROM `add_discount` WHERE `student_id`='$id' AND `year`='$year' AND `class_id`='$explodecl[0]' and feeid='$fetcRow[fk_fee_id]'";

              $resDist = $db->select_query($forDis);
                if($resDist->num_rows > 0){
                    $fetchdis=$resDist->fetch_array();
                  $discount = $fetchdis["discount"];
                }else{
                $discount = "";
                }
            $paidAmmount = "SELECT SUM(`paid_amount`) AS 'total',`admin_id` FROM `student_paid_table` WHERE `fk_fee_id`='$fetcRow[fk_fee_id]' AND `student_id`='$id' AND `class_id`='$explodecl[0]' AND `year`='$year' ";
            $RelpaidAmmount = $db->select_query($paidAmmount);
            if($RelpaidAmmount->num_rows > 0){
                $fetchPaidAmount=$RelpaidAmmount->fetch_array();
                $padiAMmount = $fetchPaidAmount["total"];
                $adminName="SELECT * FROM  `admin_users` WHERE `id`='$fetchPaidAmount[1]'";
                $regadminName = $db->select_query($adminName);
                $fetchAdminName=$regadminName->fetch_array();
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
                      }?>&nbsp;
                      </td>
        <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333;"><?php echo @$db->my_money_format($discount); ?>&nbsp; </td>
        <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($padiAMmount-$fetcRow['paid_amount']); ?> &nbsp;</td>
        <td align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><?php echo @$db->my_money_format($fetcRow['paid_amount']); ?>&nbsp; </td>
       </tr>
<?php
 }
 
?>  
  
  <tr>
          <td height="10"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;" colspan="5" align="right">

          Total : </td>
          <td style="border-bottom:1px solid #333333;border-right:1px solid #333333;" align="right"><?php echo @$db->my_money_format($totalPaid);?></td>
  </tr>
     <tr>
           <td  colspan="6" align="left" style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; padding-left:10px;">(In word): Tk. <?php 
              print convertNumberToWord($totalPaid);
           ?> Only &nbsp;

           </td>
          
        </tr>
  
    <tr>
        <td align="left" style=" padding-top:10px;" colspan="6">
        <table style="border: 1px #000 solid; margin-right:2px; font-size:12px;  "  width="100%">
                <tr>
                      <td>Total Amount   </td>
                      <td>  :  </td>
                      <td> <?php
                      
                      $mo=date('m');
                           $totalPaid_amount=$db->select_query("SELECT SUM(`add_fee`.`amount`) as 'common', SUM(`student_account_info`.`AmountExceptional`) as 'exceptional' FROM `add_fee` INNER JOIN `student_account_info` ON `student_account_info`.`fee_id`=`add_fee`.`id` WHERE `student_account_info`.`studentID`='$id'  AND `student_account_info`.`year`='$year' AND `student_account_info`.`class_id`='$explodecl[0]' AND `add_fee`.`fk_month_id` BETWEEN '01' AND '$mo'");
                          // echo "SELECT SUM(`add_fee`.`amount`) as 'common', SUM(`student_account_info`.`AmountExceptional`) as 'exceptional' FROM `add_fee` INNER JOIN `student_account_info` ON `student_account_info`.`fee_id`=`add_fee`.`id` WHERE `student_account_info`.`studentID`='$id'  AND `student_account_info`.`year`='$year' AND `student_account_info`.`class_id`='$explodecl[0]' AND `add_fee`.`fk_month_id` BETWEEN '01' AND '$mo'";
                          
							if($totalPaid_amount)
							{
							    $fetch_paid_Amount=$totalPaid_amount->fetch_array();
							    $totalAmount=$fetch_paid_Amount[0]+$fetch_paid_Amount[1];
							}
							
							echo @$db->my_money_format($totalAmount);?>
                   
                      </td>
                             <td>Total Discount   </td>
                      <td>  :  </td>
                      <td> <?php
                      
                      $mo=date('m');
                           	$select_dis_amount="SELECT SUM(`add_discount`.`discount`) FROM `add_discount`
INNER JOIN `add_fee` ON `add_fee`.`id`=`add_discount`.`feeid` 
WHERE `add_discount`.`student_id`='$id' AND `add_discount`.`class_id`='".$explodecl[0]."' AND `add_discount`.`year`='".$year."' AND `add_fee`.`fk_month_id` BETWEEN '01' AND '$mo'";
			
			//echo $select_dis_amount; 
			$fetch_dis_amount=$db->select_query($select_dis_amount);
			if($fetch_dis_amount)
			{
				$fetch_fee_dis_amount=$fetch_dis_amount->fetch_array();
			   
			}
			
					echo @$db->my_money_format($fetch_fee_dis_amount[0]);
			
			?>
                      
                      </td>
                      </tr>
                      
                      <tr>
                      
                      
                      <td>Total Paid   </td>
                      <td>  :  </td>
                      
                      <td><?php
                      

                       $totalPaid_amount=$db->select_query("SELECT SUM(`paid_amount`) FROM `student_paid_table` WHERE `student_id`='$id'  AND `class_id`='$explodecl[0]' AND `year`='$year'");
	  
							if($totalPaid_amount)
							{
							    $fetch_paid_Amount=$totalPaid_amount->fetch_array();
							}
							
							echo @$db->my_money_format($fetch_paid_Amount[0]);?>

                      </td>

                       <td>Due Amount    </td>
                      <td>  :  </td>
                      <td><?php
                      
                      $dueAmount=$totalAmount-($fetch_fee_dis_amount[0]+$fetch_paid_Amount[0]);
                      
                      echo @$db->my_money_format($dueAmount);?></td>

                </tr>
               
          </table>
        </td>
    </tr>
    </table>
<table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0">
        
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
         <td align="center" colspan="2" style="font-size:13px;"> Developed By: SBIT </td>
    </tr>
</table>

  <?php
}
  ?>
    </div>
    
    
</div>

<center > <input type="button" value="Print" style="background:#ff0000; color:#fff; height:35px; width:100px; margin-top:20px; border-radious:10px;" onclick='window.print()' class="print"> </center>


