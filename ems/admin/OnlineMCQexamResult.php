    <?php
    error_reporting(1);
    

        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        date_default_timezone_set("Asia/Dhaka");
        $db = new database();
    
     


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="all_image/shortcurt_iconSDMS2015.png" />
    <title>Result Sheet</title>

    <script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <table class="table table-hover">
                <tr>
                        <td colspan="5">        

                        <table width="100%" style="  padding: 0px; " align="center" >
        <tr>    
                <td width="10%"></td>
                <td>
                        <div style="float: left; clear: right; width: 15%; text-align: center;  ">  
                            <img src="all_image/logoSDMS2015.png" style="max-width: 150px; max-height: 100px; " /> 
                        </div>
                            

                        <div style="float: left; clear: right; text-align: center; width: 70% ">   
                                <ul>
                    
                                <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:30px; list-style: none;">Al Helal Academy</li>

                               <li style="list-style: none; ">

                                    <p style="font-size:16px;font-family:Arial, Helvetica, sans-serif">মেইন রোড, সোনাগাজী, ফেনী। 
                                </p>

                                </li>

                                <li style=" list-style: none; font-size:14px;font-family:Arial, Helvetica, sans-serif">www.alhelalacademy.edu.bd<br>01728563480, info@alhelalacademy.edu.bd  </li>
                             </ul> 

                      </div>

                      <div style="float: right;  width: 15%; text-align: center;  ">  
                            
                        </div>
                </td>
                <td width="10%"></td>
        </tr>
    

</table>

</td>
    </tr>

                              <tr>
                                    <td colspan="5" align="center">
                                                
                                                <h3>Online Exam Result</h3>
                                     </td>
                            </tr>


                            <tr>
                                    <td colspan="5">
                                                
                                                    <table class="table table-hover table-bordered">
                                                        <tr>
                                                                <td> Class : Ten</td>
                                                                <td> Subject : MATHEMATICS</td>
                                                                <td> Held in the Exam  : 15-07-2020</td>

                                                        </tr>
                                                    </table>
                                     </td>
                            </tr>

                          




                            <tr>
                                    <td style="border-left: 1px #000 solid; border-right: 1px #000 solid; border-top: 1px #000 solid; border-bottom: 1px #000 solid; text-align: center"><b>SL</b></td>
                                    <td style="border-right: 1px #000 solid; border-top: 1px #000 solid; border-bottom: 1px #000 solid; text-align: center " ><b>ID</b></td>
                                    <td style="border-right: 1px #000 solid; border-top: 1px #000 solid; border-bottom: 1px #000 solid; "><b>Roll</b></td>
                                    <td style="border-right: 1px #000 solid; border-top: 1px #000 solid; border-bottom: 1px #000 solid; "><b>Name</b></td>
                                    <td style="border-right: 1px #000 solid; border-top: 1px #000 solid; border-bottom: 1px #000 solid; border-right: 1px #000 solid;"><b>Result</b></td>
                            </tr>

                                <?php

                            $sql="SELECT `answer_sheet`.`Student_ID`,`running_student_info`.`class_roll`,`student_personal_info`.`student_name` FROM `answer_sheet` 
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`answer_sheet`.`Student_ID`
INNER JOIN `running_student_info` ON `running_student_info`.`student_id`=`answer_sheet`.`Student_ID`
GROUP BY `answer_sheet`.`Student_ID` ORDER BY `running_student_info`.`class_roll` ASC ";
$query=$db->link->query($sql);
$i=1;
while($fetch=$query->fetch_array())
{



                                ?>

                             <tr>
                                    <td style="border-left: 1px #000 solid; border-right: 1px #000 solid; border-top: 1px #000 solid; border-bottom: 1px #000 solid; text-align: center "><?php print $i++ ?></td>
                                    <td style="border-right: 1px #000 solid; border-top: 1px #000 solid; border-bottom: 1px #000 solid; text-align: center " ><?php print $fetch[0]; ?></td>
                                    <td style="border-right: 1px #000 solid; border-top: 1px #000 solid; border-bottom: 1px #000 solid; "><?php print $fetch[1]; ?></td>
                                    <td style="border-right: 1px #000 solid; border-top: 1px #000 solid; border-bottom: 1px #000 solid; "><?php print $fetch[2]; ?></td>
                                    <td style="border-right: 1px #000 solid; border-top: 1px #000 solid; border-bottom: 1px #000 solid; border-right: 1px #000 solid;"><b>
                                        
                                            <?php

                                                $marks="SELECT COUNT(*) AS 'Total'  FROM `answer_sheet` WHERE `Student_ID`='$fetch[0]' AND `Answer`='True'";
                                                $count=$db->link->query($marks);
                                                $fetch=$count->fetch_array();

                                                print $fetch[0];

                                            ?>

                                    </b></td>
                            </tr>

    <?php
}

?>

         </table>

</body>
 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

