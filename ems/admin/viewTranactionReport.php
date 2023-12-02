<?php
  session_start();
  date_default_timezone_set("Asia/Dhaka");

  if($_SESSION["logstatus"] === "Active")
  { 
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();

       $projectinfo="SELECT * FROM project_info";
    $query=$db->select_query($projectinfo);
    if($query){
        $fetchinfo=$query->fetch_array();
    }


 
              $table="<table class=' table table-hover table-bordered ' style=' background-color:#fff;' align='center'>";
              $sql="SELECT `bank_transaction`.*,`bank_information`.`bank_name`,`bank_information`.`account_type` FROM `bank_transaction`
INNER JOIN `bank_information` ON `bank_information`.`account_number`=`bank_transaction`.`account_name`  ORDER BY `bank_transaction`.`id` DESC ";
              $query=$db->link->query($sql);
              if($query)
              {



              $table.="<tr class=' table table-bordered' style='background-color:#f4f4f4;' align='center'> 
              <td><b>Vouchar/ Cheque No.</b></td>
                        <td><b>Bank Name</b></td>
                         <td><b>Account Type</b></td>

                        <td><b>Account Name</b></td>
                        <td><b>Transaction Type</b></td>
                        
                        <td><b>Amount</b></td>
                        <td><b>Date</b></td>
                        <td><b>Admin</b></td>
                        <td><b>Entry Date</b></td>
                       
                        <td><b>Report</b></td>
                    </tr>";
              while($fetch=$query->fetch_array())
              {
                $table.="<tr> 
                <td>$fetch[3]</td>
                   <td>$fetch[9]</td>
                    <td>$fetch[10]</td>

                    <td>$fetch[1]</td>
                    <td>$fetch[2]</td>
                    
                    <td>$fetch[4]</td>
                    <td>$fetch[5]</td>
                    <td>$fetch[6]</td>
                    <td>$fetch[7]</td>
                   
                  
                    <td><a href='ShowBankTranactionReport.php?id=$fetch[0]' class='btn btn-success btn-sm'>Report </a></td>


                    </tr>";
              }  

            }

              $table.="</table>";
           
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
    </head>
      <table  width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
     <tr>
  <td height="50" align="center" style="border-bottom:1px solid #333333">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>

      <td style="border-bottom:1px solid #333333" height="50"  align="center" >
  
    
    <p style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    <?php print $fetchinfo['institute_name']?></p>

 <p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php print $fetchinfo['location']?>  </p>

    <p style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetchinfo['phone_number']?> ,<?php print $fetchinfo['email']?>  </p>
         </td>

           <td height="50" width="76" align="center" style="border-bottom:1px solid #333333">

 

  </td>
     </tr>
     </table>


        <?php    echo $table; ?>
    <body>
      
    </body>
    </html>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>


