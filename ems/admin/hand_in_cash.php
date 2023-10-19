<?php
    error_reporting(1);
    date_default_timezone_set("Asia/Dhaka");
    @session_start();

	if($_SESSION["logstatus"] === "Active")
    {

    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();
    $LastDateCashclose="";
    $cashcloseLastdate="";

    $selectDate="SELECT * FROM `hand_in_cash` ORDER BY `date` DESC LIMIT 0,1";
    $queryDate=$db->select_query($selectDate);
    if($queryDate)
    {
          $lastCashCloseDate=$queryDate->fetch_array();
          $LastDateCashclose=$lastCashCloseDate[3];
    }

if(!empty($LastDateCashclose))
{
	 $d = new DateTime($LastDateCashclose);
	 $d->add(new DateInterval('P1D'));
	 $cashcloseLastdate=$d->format('Y-m-d'); 
}

$User_Name=$_SESSION["name"];

$Close_date=isset($_POST["Close_date"])?$_POST["Close_date"]:"";
$Previous_Cash=isset($_POST["Previous_Cash"])?$_POST["Previous_Cash"]:"";
$FromDate=isset($_POST["FromDate"])?$_POST["FromDate"]:date('Y-m-d');

$date=isset($_POST["ToDate"])?$_POST["ToDate"]:date('Y-m-d');
$total=isset($_POST["totalCashBalance"])?$_POST["totalCashBalance"]:"";
$student_collection=isset($_POST["student_collection"])?$_POST["student_collection"]:"";
$Expences_Cash=isset($_POST["Expences_Cash"])?$_POST["Expences_Cash"]:"";
$other_collection=isset($_POST["other_collection"])?$_POST["other_collection"]:"";

$Hend_In_Cash=isset($_POST["Hend_In_Cash"])?$_POST["Hend_In_Cash"]:"";
$comment=isset($_POST["comment"])?$_POST["comment"]:"";

$bankbalance=isset($_POST["bankDetaildAmount"])?$_POST["bankDetaildAmount"]:"";
$total_bankbalance=isset($_POST["TotalBankBalance"])?$_POST["TotalBankBalance"]:"";
$SiteNote=isset($_POST["SiteNote"])?$_POST["SiteNote"]:"";
$type="null";
$Surplus=isset($_POST["Surplus"])?$_POST["Surplus"]:"";
$bank_deposit=isset($_POST["cashdeposite"])?$_POST["cashdeposite"]:"";
$bank_withdraw=isset($_POST["cashwithdraw"])?$_POST["cashwithdraw"]:"";

if(isset($_POST["addbtn"]))
{
    if(!empty($Close_date))
    {
    	$duration=$_POST['FromDate'].' &nbsp;&nbsp; -  &nbsp;&nbsp; '.$_POST['ToDate'];  

        $sql="INSERT INTO `hand_in_cash`(`cash_close_date`, `previous_balance`, `date`, `total_cash`, `student_collection`, `expences`, `other_collection`, `bank_deposit`, `bank_withdraw`, `hend_in_cash`, `comment`, `admin`,`TotalExpense`,`BankBalanceDetails`,`TotalBankBalance`,`CashCloseDuraton`,`TotalBalance`,`SiteNote`) VALUES ('$Close_date','$Previous_Cash','$date','$total','$student_collection','$Expences_Cash','$other_collection','$bank_deposit','$bank_withdraw','$Hend_In_Cash','$comment','$User_Name','$Expences_Cash','$bankbalance','$total_bankbalance','$duration','$Surplus','$SiteNote')";
        $resultisnsert=$db->insert_query($sql);       
    }

}

if(isset($_POST['viewbtn']))
  {
         echo "<script>location='hand_in_cash_view.php'</script>";
  }


//link edit data................................... 
$fetch[0]="";
$fetch[1]="";
$fetch[2]="";
$fetch[3]="";
$fetch[4]="";
$fetch[5]="";
$fetch[6]="";
$fetch[7]="";
$fetch[8]="";
$fetch[9]="";
$fetch[10]="";
$fetch[11]="";
$fetch[12]="";
$fetch[13]="";


    if (isset($_POST["refresh"])) {
        echo "<script>location='hand_in_cash.php'</script>";
    }




// print $cashcloselastDate;
$studentCollection="SELECT SUM(`paid_amount`) FROM `student_paid_table`
WHERE `defult_Date` BETWEEN '$FromDate' AND '$date' ";
//print $studentCollection;

$StudentCollectionAmount[0]=0;
$StudentCollectionQuery=$db->select_query($studentCollection);
if($StudentCollectionQuery)
{
      $StudentCollectionAmount=$StudentCollectionQuery->fetch_array();
}


$OthersIncome="SELECT SUM(`amount`) FROM `other_income` WHERE `EntryDate` BETWEEN '$FromDate' AND '$date'";
//print $OthersIncome;

$fetchOthersIncome[0]=0;
$selectOthersIncome=$db->select_query($OthersIncome);
if($selectOthersIncome)
{
      $fetchOthersIncome=$selectOthersIncome->fetch_array();


}

$SelectDeposite=$db->select_query("SELECT SUM(`amount`) AS 'Bankbalance' FROM `bank_transaction` WHERE `transaction_type`='Deposit' AND `EntryDate`  BETWEEN '$FromDate' AND '$date'");
if($SelectDeposite)
{
      $cashdepositeBalance=$SelectDeposite->fetch_array();
      $cashdeposite=$cashdepositeBalance[0];
}


$Selectwithdraw=$db->select_query("SELECT SUM(`amount`) AS 'Bankbalance' FROM `bank_transaction` WHERE `transaction_type`='Withdraw' AND `EntryDate`  BETWEEN '$FromDate' AND '$date'");
if($Selectwithdraw)
{
      $cashWithdrawBalance=$Selectwithdraw->fetch_array();
      $cashwithdraw=abs($cashWithdrawBalance[0]);
}



$bankBalance=$db->select_query("SELECT SUM(`amount`) AS 'Bankbalance' FROM `bank_transaction`");
if($bankBalance)
{
      $TotalBankBalance=$bankBalance->fetch_array();
}


$sideNote=$db->select_query("SELECT SUM(`payable_amount`) AS 'deposit', SUM(`Cash_payment`) AS 'withdwaw' FROM `cash_received_withdraw`");
if($sideNote)
{
      $sideNoteBalance=$sideNote->fetch_array();
      $totalSideNote=$sideNoteBalance[0]-$sideNoteBalance[1];
}


$totalHendIncash=$lastCashCloseDate['TotalBalance']+$StudentCollectionAmount[0]+$fetchOthersIncome[0];

$expense="SELECT SUM(`amount`) FROM `other_cost` WHERE `Entry_Date` BETWEEN '$FromDate' AND '$date' ";

$fetchExpense[0]=0;
$selectexpense=$db->select_query($expense);
if($selectexpense)
{
      $fetchExpense=$selectexpense->fetch_array();
}

$totalExpense=$fetchExpense[0];

$Surplus=floatval($totalHendIncash-$totalExpense);

$cashinhandBalance=$Surplus-($TotalBankBalance[0]+$totalSideNote);

$equalBalance=$totalExpense+$TotalBankBalance[0]+$totalSideNote;


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



<link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/loading/loading.css" />
    <script type="text/javascript" src="../js/loading/pace.min.js"></script>
</head>

<body>

<div class="wrapper">

     <section class="content">
      <div class="container">
        <div class="row">


<div class="col-md-12 " style="margin: auto; margin-top: 50px;">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h2 class="card-title">Cash Close</h2>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
        <form method="post" enctype="multipart/form-data">
        <div class="card-body">

                  <div class="row">

                   <div class="col-md-3">
                        <div class="form-group">
                             <label>Last Cash Close Date : </label> 

                              <input type="text" name="Close_date" class="form-control"  value='<?php echo $LastDateCashclose;?>' readonly>
                          </div>
                   </div>

                    <div class="col-md-3">  
                         <div class="form-group">
                           <label>From</label>  

                            <input type="text"  name="FromDate" class="form-control"  value='<?php print $cashcloseLastdate; ?>' readonly>
                        </div>
                    </div>

                  <div class="col-md-3">
                      <div class="form-group">
                           <label>To </label> 

                            <input type="text" name="ToDate" class="form-control"  value='<?php echo $date;?>' >
                        </div>
                 </div>

                 <div class="col-md-3">
                       <div class="form-group">
                            <input type="submit" name="search" class="btn btn-success"  value='Search' style="margin-top:30px;" >
                        </div>
                 </div>
                </div>




                    <div class="row">

                    <div class="col-md-6">



                      

                        <div class="form-group">
                            <label>Previous Balance</label>

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="Previous_Cash" value="<?php print $lastCashCloseDate['TotalBalance'];?>"  readonly>
                        </div>


                       

                        <div class="form-group">
                           <label>Fees Collection</label> 

                            <input type="text" name="student_collection" class="form-control"  value="<?php echo $StudentCollectionAmount[0]; ?>" readonly>
                        </div>

                      

                         <div class="form-group">
                           <label>Other's Collection</label> 

                            <input type="text" name="other_collection" class="form-control"  value="<?php echo $fetchOthersIncome[0]; ?>" readonly>
                        </div>

                       <div class="form-group">
                            <label>Total Cash</label> <span> 

                            
                              <input style="border: 1px solid #b7b6b6;font-weight: bold;" type="text" class="form-control" name="totalCashBalance" value="<?php echo $totalHendIncash;?>"  readonly>
                        </div>


                    </div>

<!-- /////////////////////////////////////Expense /////////////////////////// -->

                    <div class="col-md-6">
                        

                    
                        <div class="form-group">
                            <label>Expences</label> <span> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="Expences_Cash" value="<?php echo $fetchExpense[0];?>" readonly>
                        </div> 


                         <div class="form-group">
                            <label> Others Expense </label> <span> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="othersexpense" value="0.00" readonly >
                        </div> 

                          <div class="form-group">
                            <label> Surplus </label> <span> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="Surplus" value="<?php echo $Surplus;?>"readonly >
                        </div> 


 						<div class="form-group">
                            <label> Total </label> <span> 

                            
                              <input style="border: 1px solid #b7b6b6; font-weight: bold;" type="text" class="form-control" name="netBlance" value="<?php echo $Surplus+$fetchExpense[0];?>"readonly >
                        </div> 
                    </div>

                </div>
                  <hr>
                <h3>Bank Transaction</h3>
                <div class="row">


 <div class="col-md-4">
                            <label>Cash Deposite </label> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="cashdeposite" value="<?php echo $cashdeposite;?>" readonly>
                        </div> 
 <div class="col-md-4">
                            <label>Cash Withdraw</label> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="cashwithdraw"   value="<?php print $cashwithdraw; ?>" readonly>
                        </div>
</div>
   <hr>
<div class="row">


 <div class="col-md-4">
                            <label>Site Note </label> <span> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="SiteNote" value="<?php echo $totalSideNote;?>" readonly>
                        </div> 
 <div class="col-md-4">
                            <label>Cash in Hand</label> <span> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="Hend_In_Cash"   value="<?php print $cashinhandBalance; ?>" readonly>
                        </div>

<div class="col-md-4">
                            <label>Bank Balance</label> 

                            
                              <input style="border: 1px solid #b7b6b6;" type="text" class="form-control" name="TotalBankBalance"  value="<?php print $TotalBankBalance[0]; ?>" readonly>
                        </div>

     </div>              
                
     <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Account Balance</label> 
                    
                       
 <textarea name="bankDetaildAmount" class="form-control textarea"  id="redactor">
<table class="table table-hover">
<tr> 
		<th>SL</th>
		<th>Bank Name</th>
		<th>Account Number</th>
		<th>Balance</th>
</tr>
<?php
$i=1;
$sql=$db->link->query("SELECT SUM(`amount`) AS 'Amount',`bank_information`.`bank_name`,`bank_information`.`account_number` FROM `bank_transaction` 
INNER JOIN `bank_information` ON `bank_information`.`account_number`=`bank_transaction`.`account_name` 
WHERE `bank_transaction`.`EntryDate` BETWEEN '2019-12-31' AND '$date' GROUP BY `bank_transaction`.`account_name`");
if($sql)
{
	while($fetchBankBalance=$sql->fetch_array())
	{?>
			<tr>
				<td><?php print $i++; ?></td>
				<td><?php print $fetchBankBalance[1];?></td>
				<td><?php print $fetchBankBalance[2];?></td>
				<td><?php print $fetchBankBalance[0];?></td>
			</tr>
<?php }
}  ?>

      </table>                      
       </textarea>                      
    </div>
                    </div>

     </div>



                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Comment</label> <span> 

                            <textarea name="comment" class="form-control"  placeholder="Enter Comment..."></textarea>
                        </div>
                    </div>

                </div>


                  <br>

                  <span><h5 align="center"><?php echo $db->sms; ?></h5> </span> 


        </div>
               <div class="card-footer bg-white" style="text-align: center;">
                    
                    <button type="submit" name="addbtn" class="btn btn-success">Submit</button>
                   <!--  <button type="submit" name="editbtn" class="btn btn-primary">Update</button> -->
                    <button type="submit" name="viewbtn" class="btn btn-warning">View</button>
                    <button type="submit" name="refresh" class="btn btn-danger">Refresh</button>

                </div>
        </form>
         </div>  
          </div>

          </div>

          </div>
          </section>
</div>
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

   
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>

  