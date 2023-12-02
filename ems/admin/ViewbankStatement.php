
<?php
  error_reporting(1);
  @session_start();
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



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Bank Transaction Report</title>
    
    <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">
    <script src="datespicker/bootstrap-datepicker.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <style>
  @media print{
      .print{
        display:none;
      }


    </style>
  </head>
  <body>

<br>
 <table  width="1000"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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
          <td colspan="3" align="center">
           
             <h3>Bank Transaction Statement</h3>

          </td>

     </tr>  
<?php
  $selectBank=$db->link->query("SELECT * FROM `bank_information` WHERE `account_number`='".$_GET['accountNumber']."' ");
  $fetch_bank_info=$selectBank->fetch_array();
?>

     <tr>
          <td colspan="3" align="center">
          <table class="table table-bordered">
          	<tr>
          		<td>Bank Name : </td>
          		<td><?php print $fetch_bank_info['bank_name']?></td>
          		<td>Account Number :</td>
          		<td><?php print $fetch_bank_info['account_number']?> </td>
          	</tr>	
          	<tr>
          		<td>Address : </td>
          		<td><?php print $fetch_bank_info['details']?></td>
          		<td>Print:</td>
          		<td><?php print date('d-m-Y');?></td>
          	</tr>
          </table>
          </td>
     </tr>


     <tr>
          <td colspan="3">
           
         <table class="table table-bordered">
         <thead> 
          <tr>
              <th>Date</th>
              <th>Voucher No/Cheque No/TrxID</th>
              <th>Details</th>
              <th>Deposit</th>
              <th>Withdraw</th>
              <th>Cost</th>
              <th>Interest</th>
              <th>Balance</th>
          </tr> 
          </thead>  

 <?php
$i=1;

$totalDeposit=0;
$totalWithdraw=0;
$totalCost=0;
$toalInterest=0;

$total=0;
  $sql=$db->link->query("SELECT * FROM `bank_transaction` WHERE `account_name`='".$_GET['accountNumber']."' ORDER BY `id` ASC ");
  while($fetch_info=$sql->fetch_array())
  {
$total=$total+$fetch_info['amount'];

?>
          <tr>
              <td style="height: 20px;"><?php print $fetch_info['date'] ;?></td>
              <td><?php print $fetch_info['vouchar_no'] ;?></td>
              <td><?php print $fetch_info['details'] ;?></td>
              <td>
              <?php  
              if($fetch_info['transaction_type']=="Deposit")
              {
              	 print $fetch_info['amount'];
              	 $totalDeposit=$totalDeposit+$fetch_info['amount'];
              }?>
              </td>

               <td>
              <?php  
              if($fetch_info['transaction_type']=="Withdraw")
              {
              	 print $fetch_info['amount'];
              	 $totalWithdraw=$totalWithdraw+$fetch_info['amount'];
              }?>
              </td>


              <td>
              <?php  
              if($fetch_info['transaction_type']=="Bank Cost")
              {
              	 print $fetch_info['amount'];
              	 $totalCost=$totalCost+$fetch_info['amount'];
              }?>
              </td>

              <td>
              <?php  
              if($fetch_info['transaction_type']=="Bank Interest")
              {
              	 print $fetch_info['amount'];
              	 $toalInterest=$toalInterest+$fetch_info['amount'];
              }?>
              </td>




              <td style="height: 20px;"><?php print $total;?></td>
            
              
          </tr>
     <?php
         }
    ?>

    <tr>
        <td colspan="3" align="right">Total  =</td>
        
        <td><b> <?php print $totalDeposit; ?></b></td>
        <td><b> <?php print $totalWithdraw; ?></b></td>
        <td><b> <?php print $totalCost; ?></b></td>
        <td><b> <?php print $toalInterest; ?></b></td>
        <td><b> <?php print $total; ?></b></td>
    

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
          ......................................................
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


<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>


  
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
