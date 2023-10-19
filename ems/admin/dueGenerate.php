

<?php
        //error_reporting(1);
        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        date_default_timezone_set("Asia/Dhaka");
        $db = new database();

        if(isset($_POST["viewStudent"]))
        {


                    $low=$_POST['lower'];
                    $upper=$_POST['upper']-1;
                    $clasId=explode('and',$_POST['className']);
                    $feeID=explode('and',$_POST['ClassFee']);
      // running_year:running_year,ClassFee:ClassFee

                    $sql="SELECT `running_student_info`.`student_id`,`running_student_info`.`class_roll`,`student_personal_info`.`student_name` FROM `running_student_info` INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id` WHERE `running_student_info`.`class_id`='".$clasId[0]."' AND  `running_student_info`.`class_roll` BETWEEN $low AND $upper; ";
                    $query=$db->link->query($sql);
                    $i=1;

                    if($query->num_rows>0)
                    {


                    while($fetch=$query->fetch_array())
                    {

                      $AcctotalAmount=0;
                 $sqldue="SELECT SUM(`student_account_info`.`AmountExceptional`) AS 'eXtOTAL',  SUM(`add_fee`.`amount`) AS 'FeTotal' FROM `student_account_info`
INNER JOIN `add_fee` ON `add_fee`.`id`=`student_account_info`.`fee_id`
 WHERE `student_account_info`.`studentID`='$fetch[0]' AND `student_account_info`.`year`='".$_POST['year']."'";

                            $totalDueAmount=0;
                            $selectQuery=$db->link->query($sqldue);
                            if($fetch_fee=$selectQuery->fetch_array())
                            {

                                $AcctotalAmount=$fetch_fee[0]+$fetch_fee[1];
                                            
                                $paidAmount=$db->link->query("SELECT SUM(`paid_amount`) AS 'total' FROM `student_paid_table` WHERE `student_id`='$fetch[0]' AND `year`='".$_POST['year']."'");
                                 $fetchpaidAmount=$paidAmount->fetch_array();

                                 $dicountAmount=$db->link->query("SELECT SUM(`discount`) FROM `add_discount` WHERE `student_id`='$fetch[0]' AND `year`='".$_POST['year']."'");
                                 $fetchdicountAmount=$dicountAmount->fetch_array();

                                 $totalDueAmount=$AcctotalAmount-($fetchpaidAmount[0]+$fetchdicountAmount[0]);
                                 //print "<br>".$totalDueAmount;

                                 if($totalDueAmount>0)
                                 {
                                        $result=$db->link->query("INSERT INTO `student_account_info`(`studentID`,`class_id`,`fee_id`,`year`,`admin_id`,`AmountExceptional`) VALUES('$fetch[0]','$clasId[0]','".$feeID[0]."','".$_POST['running_year']."','','$totalDueAmount')");
                                        if(!$result)
                                        {
                                                $db->link->query("REPLACE INTO `student_account_info`(`studentID`,`class_id`,`fee_id`,`year`,`admin_id`,`AmountExceptional`) VALUES('$fetch[0]','$clasId[0]','".$feeID[0]."','".$_POST['running_year']."','','$totalDueAmount')");
                                        }


                                 }

                                

                           }


                     }
                      print "<h3 style='float:right; color:green'>Successfully!! </h3>";
            }
            else
            {
                print "<h3 style='float:right; color:red'>Student Limit Exiest!! </h3>";
            }
        }

                ?>
