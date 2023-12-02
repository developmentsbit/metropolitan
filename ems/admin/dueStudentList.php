

<?php
 error_reporting(1);
        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        date_default_timezone_set("Asia/Dhaka");
        $db = new database();
        if(isset($_POST["viewStudent"]))
        {

?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student List</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
     </head>

     <body>

                <table class="table table-hover">
                    <tr>
                            <td>SL</td>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Roll</td>
                            <td>Details</td>
                            <td>Due</td>
                    </tr>
              <?php
               // data :{className:className,month:month,lower:lower,upper:upper,year:year,date:date,viewStudent:viewStudent},
                    $low=$_POST['lower'];
                    $upper=$_POST['upper']-1;
                    $month=$_POST['month'];
      

                    $sql="SELECT `running_student_info`.`student_id`,`running_student_info`.`class_roll`,`student_personal_info`.`student_name` FROM `running_student_info` INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id` WHERE `running_student_info`.`class_id`='".$_POST['className']."' AND  `running_student_info`.`class_roll` BETWEEN $low AND $upper; ";
                    $query=$db->link->query($sql);
                    $i=1;
                    while($fetch=$query->fetch_array())
                    {

                        $fetchmarks[1]="";
                   $select="SELECT * FROM `previous_result` where `student_id`='$fetch[0]'";
                   $result=$db->link->query($select);
                   if($result)
                   {
                        $fetchmarks=$result->fetch_array();
                        if($fetchmarks[1]=='0.00')
                        {
                            $fetchmarks[1]="";
                        }

                   }


                    ?>

                        <tr>
                            <td> <label><input type="checkbox" name="studentID" class="studentID" value="<?php print $fetch[0]?>" checked="checked"></input></label> &nbsp; &nbsp; <label> <?php print $i++; ?> </label></td>
                            <td><?php print $fetch[0]?></td>
                            <td><?php print $fetch[2]?></td>
                            <td><?php print $fetch[1]?></td>
                            <td>
                                    <?php
                                        $sqldue="SELECT `student_account_info`.`studentID`,`fee_id`,`AmountExceptional`,`add_fee`.`title`,`amount` FROM `student_account_info` 
INNER JOIN `add_fee` ON `add_fee`.`id`=`student_account_info`.`fee_id`
WHERE `student_account_info`.`studentID`='$fetch[0]' AND `student_account_info`.`class_id`='".$_POST['className']."' AND `student_account_info`.`year`='".$_POST['year']."' AND `fk_month_id`  BETWEEN  01 AND $month";

                                        $totalDueAmount=0;
                                        $selectQuery=$db->link->query($sqldue);
                                        if($selectQuery)
                                        {
                                            while($fetch_fee=$selectQuery->fetch_array())
                                            {
                                                    $paidAmount="SELECT SUM(`paid_amount`) FROM `student_paid_table` WHERE `student_id`='$fetch[0]' AND `fk_fee_id`='$fetch_fee[1]' AND `year`='".$_POST['year']."'";

                                                    $dicountAmount=$db->link->query("SELECT SUM(`discount`) FROM `add_discount` WHERE `student_id`='$fetch[0]' AND `feeid`='$fetch_fee[1]' AND `year`='".$_POST['year']."'");

                                                  //  print $fetch_fee['title']."<br>";

                                                    $selectPaid=$db->link->query($paidAmount);
                                                    if($selectPaid)
                                                    {
                                                        $fetchpaidAmount=$selectPaid->fetch_array();

                                                         $fetchdicountAmount=$dicountAmount->fetch_array();


                                                        $totalFee=($fetch_fee['AmountExceptional']+$fetch_fee['amount'])-($fetchpaidAmount[0]+$fetchdicountAmount[0]);

                                                        if($totalFee>0)
                                                        {
                                                            ?>
                                                            <label><input type="checkbox" checked="checked" name='feeID[]' class="fees-<?php print $fetch[0];?>" value="<?php print $fetch_fee[1].'and'.$totalFee; ?>"> </input></label>  <label><?php print $fetch_fee['title']?>, <?php print $totalFee?>/- </label>
                                                            
                                                        <?php
                                                           
                                                            $totalDueAmount=$totalDueAmount+$totalFee;
                                                        }

                                                    }

                                            }
                                        }


                                    ?>

                                

                            </td>
                            <td> <?php print $totalDueAmount?></td>
                    </tr>
                    <?php
                }

                    ?>

                    <tr>
                            <td colspan="6" align="center">

                            <input type="button" name="add" id="Save" value="Save" class="btn btn-success" onclick="return studentDueInvoice()"> </input>

                            </td>
                        
                    </tr>

                </table>
 
 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
?>
