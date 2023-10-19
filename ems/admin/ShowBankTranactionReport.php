<?php
  session_start();
  date_default_timezone_set("Asia/Dhaka");

  if($_SESSION["logstatus"] === "Active")
  { 
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();
 
    $sql="SELECT `bank_transaction`.*,`bank_information`.`bank_name`,`bank_information`.`account_type` FROM `bank_transaction`
INNER JOIN `bank_information` ON `bank_information`.`account_number`=`bank_transaction`.`account_name` where`bank_transaction`.`id`='".$_GET['id']."'";

    $query=$db->link->query($sql);
    if($query)
    {
      $fetchData=$query->fetch_array();
   
    }

        $projectinfo="SELECT * FROM project_info";
    $query=$db->select_query($projectinfo);
    if($query){
        $fetchinfo=$query->fetch_array();
    }

    

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

      <style>
  @media print{
      .print{
        display:none;
      }


    </style>
    </head>
    <br>
      <table  width="1000"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
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

     <tr>
          <td colspan="3">
            <br>
              <table width="100%" class="table table-hover table-bordered"> 
                  <tr>
                    <td width="20" align="center">Voucher/ Cheque No.</td>
                    <td width="50" align="center">Date</td>
                    <td width="100" align="left">Title</td>
                    <td width="300" align="left">Details</td>
                    <td width="100" align="center">Amount</td>
                  </tr>

                 <tr>
                    <td width="20" align="center"><?php print $fetchData['vouchar_no']?></td>
                    <td width="50" align="center"><?php print $fetchData['date']?></td>
                    <td width="100" align="left"><?php print $fetchData[2]?></td>
                    <td width="200" align="left"><?php print $fetchData['bank_name'].'->'.$fetchData['account_type'].'->'.$fetchData['account_name'].'<br>'.$fetchData['details'] ?></td>
                    <td width="100" align="center"><?php print $fetchData['amount']?></td>
                  </tr>


              </table>

          </td>

     </tr>

     </table>


<br>

<table width="1000" align="center">
  
  <tr>
      <td height="70" valign="bottom" align="center">


    

      </td>
      <td valign="bottom">
          ..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">

        Admin
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
<br>
<center> 
<input type="button" name="print" value="Print" class="print" style="height: 30px; width: 150px; background: GREEN; color: #fff; border: 0px;" 
onclick="window.print()">
</center>
       
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


