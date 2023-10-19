
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
    
    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;"><?php print $fetch_query['bninstituteName']?></li>
   <li><p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_query['LocationbAngla']?> </p></li>
    <li style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_query['phone_number']?>,<?php print $fetch_query['email']?> </li>
     </ul>     


      </td>

    </tr>

</table>

  <table  width="960"  border="0"  cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"  align="center" style=" margin-top: 20px;">
	
		<tr>
     		<td align="center" style="border-bottom: 1px #000 solid; " colspan="2"><h3>  আয় রিপোর্ট </h3>
     			
     			<h3 style="float: left; clear: right;">        Collection Year : <?php print $_GET['year']; ?>

     				   </h3>
     			<h3 style="float: right;">  Print Date : <?php print date('d-m-Y') ?>   </h3>

     		</td>
     	</tr>

     	<tr>
     		<td align="center"style="border-right:1px #000 solid; " >
     			
     			<table style="width: 100%;">
     				<tr>

     					<td style=" border-left: 1px #000 solid;border-bottom: 1px #000 solid; text-align: center;"> মাস </td>
     				

     				
     <?php
        $query="select * from coloumn_setup order by `id` ASC ";
        $result=$db->select_query($query);
        if($result)
        {
$i=0;
            $count=mysqli_num_fields($result_all);
                        while($fetch_all=$result->fetch_array()){
                            $i++; ?>
                        <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 10px; text-align: center;">
                            <?php print $fetch_all[1]; ?>

                        </td>
                <?php
            }
        }
        ?>
    <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 10px; text-align: center;">
                                    মোট                 
                            </td>

                                <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 10px; text-align: center;">
                                        অন্যান্য আয়        
                            </td>
                               <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 10px; text-align: center;">
                                     সর্বমোট        
                            </td>

     </tr>
   

<?php
        $queryMonth="SELECT * FROM `month_setup` ORDER BY `id`  ASC ";
        $resultMonth=$db->select_query($queryMonth);
        if($resultMonth)
        {
        
        while($fetch_Month=$resultMonth->fetch_array()){
        ?>
     				
		<tr>
     					<td style=" border-left: 1px #000 solid; padding: 10px;border-bottom: 1px #000 solid;">
     					<?php print $fetch_Month['name']?>		
                        </td>
     				
     					

    <?php
        $query="select * from coloumn_setup order by `id` ASC ";
        $result=$db->select_query($query);
        
    
        $total=0;
        if($result)
        {
            $count=mysqli_num_fields($result_all);
            while($fetch_all=$result->fetch_array()){
            ?>
             <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 10px; text-align: right;">
                  <?php
                        $columeFeesColle=$db->link->query("SELECT SUM(`paid_amount`) AS 'total'  FROM `columnwisefeesetupforstd`
INNER JOIN `student_paid_table` ON `student_paid_table`.`fk_fee_id`=`columnwisefeesetupforstd`.`fk_fee_id`
 WHERE  `columnwisefeesetupforstd`.`fk_column_id`='$fetch_all[0]' AND `student_paid_table`.`month`='$fetch_Month[0]' and `student_paid_table`.`year`='".$_GET['year']."'");

                        if($columeFeesColle)
                        {
                            $fetch_fees=$columeFeesColle->fetch_array();
                            print $fetch_fees[0];

                        }

             ?>
            </td>
    <?php
            }
        }
    ?>
    <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 10px; text-align: right;background-color:hsla(9, 100%, 64%, 0.2)">
              <?php


$monthlyCollection=$db->link->query("SELECT SUM(`paid_amount`) FROM `student_paid_table` WHERE `student_paid_table`.`month`='$fetch_Month[0]' and `student_paid_table`.`year`='".$_GET['year']."'");
//print "SELECT SUM(`paid_amount`) FROM `student_paid_table` WHERE `date` LIKE '%$ym%'";
if($monthlyCollection)
{
    $fetch_amount=$monthlyCollection->fetch_array();
    
    echo @$db->my_money_format($fetch_amount[0]);

}


              ?>
        </td>   

        <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 10px; text-align: right;">
            
            <?php
$ym=$_GET['year'].'-'.$fetch_Month[0];

$othersCollectMonthly=$db->link->query("SELECT SUM(`amount`) FROM `other_income` WHERE `date` LIKE '%$ym%'");
//print "SELECT SUM(`paid_amount`) FROM `student_paid_table` WHERE `date` LIKE '%$ym%'";
if($othersCollectMonthly)
{
    $fetch_othersCollectMonthly=$othersCollectMonthly->fetch_array();
    
    echo @$db->my_money_format($fetch_othersCollectMonthly[0]);

}

 ?>

        </td>
        <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 10px; text-align: right;background-color:hsla(9, 100%, 64%, 0.3)">
            
            <?php 
                echo @$db->my_money_format($fetch_amount[0]+$fetch_othersCollectMonthly[0]);
            ?>


        </td>
     </tr>
<?php
}
}
?>

     <tr>
     		<td style=" border-left: 1px #000 solid; padding: 10px;">Total: </td>
     			
    <?php
        $query="select * from coloumn_setup order by `id` ASC ";
        $result=$db->select_query($query);
        $total=0;
        if($result)
        {
            $count=mysqli_num_fields($result_all);
                        while($fetch_all=$result->fetch_array()){
                    ?>
                <td style="border-bottom: 1px #000 solid; border-left: 1px #000 solid; padding: 10px; text-align: right;">
             <?php
           
                        $columeFeesColle=$db->link->query("SELECT SUM(`paid_amount`) AS 'total'  FROM `columnwisefeesetupforstd`
INNER JOIN `student_paid_table` ON `student_paid_table`.`fk_fee_id`=`columnwisefeesetupforstd`.`fk_fee_id`
 WHERE  `columnwisefeesetupforstd`.`fk_column_id`='$fetch_all[0]' AND `student_paid_table`.`year`='".$_GET['year']."' and `student_paid_table`.`year`='".$_GET['year']."'");
                        
                        if($columeFeesColle)
                        {
                            $fetch_fees=$columeFeesColle->fetch_array();
                           
                             echo @$db->my_money_format($fetch_fees[0]);

                        }

             ?>
            </td>

                <?php
            }
        }
        ?>

        <td style="border-left: 1px #000 solid; padding: 10px; text-align: right;" >
                
        <?php 
            $yearlyCollection=$db->link->query("SELECT SUM(`paid_amount`) FROM `student_paid_table` WHERE `year`='".$_GET['year']."'");
                    //print "SELECT SUM(`paid_amount`) FROM `student_paid_table` WHERE `date` LIKE '%$ym%'";
                    if($yearlyCollection)
                    {
                        $fetch_amount_yearly=$yearlyCollection->fetch_array();
                        
                        echo @$db->my_money_format($fetch_amount_yearly[0]);

                    }
        ?>
                </td>
                <td style="border-left: 1px #000 solid; padding: 10px; text-align: right;">
                        <?php
$y=$_GET['year'];

$othersCollectMonthly=$db->link->query("SELECT SUM(`amount`) FROM `other_income` WHERE `date` LIKE '%$y%'");
//print "SELECT SUM(`paid_amount`) FROM `student_paid_table` WHERE `date` LIKE '%$ym%'";
if($othersCollectMonthly)
{
    $fetch_othersCollectMonthly=$othersCollectMonthly->fetch_array();
    
    echo @$db->my_money_format($fetch_othersCollectMonthly[0]);

}

 ?>

                </td>
                <td style="border-left: 1px #000 solid; padding: 10px; text-align: right;"><?php
                            echo @$db->my_money_format($fetch_amount_yearly[0]+$fetch_othersCollectMonthly[0]);

                    ?>

                </td>
</tr>

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

        Office Assistant
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
