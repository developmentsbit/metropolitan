<?php
error_reporting(1);
  @session_start();
  date_default_timezone_set("Asia/Dhaka");

  if($_SESSION["logstatus"] === "Active")
  { 
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();
    $fetchData[0]="";
    $fetchData[1]="";
    $fetchData[2]="";
    $fetchData[3]="";
    $fetchData[4]="";
    $fetchData[5]="";
    $fetchData[6]="";
    $fetchData[8]="";

   $id=$db->autogenerat('bank_transaction','id','TXN-','10');


   
    // $varBankName=mysqli_real_escape_string($db->link,isset($_POST["bankName"])?$_POST["bankName"]:"");
    $varAccountName=mysqli_real_escape_string($db->link,isset($_POST["accountName"])?$_POST["accountName"]:"");
    $varAccType=mysqli_real_escape_string($db->link,isset($_POST["transactionType"])?$_POST["transactionType"]:"");
    $varVouchar=mysqli_real_escape_string($db->link,isset($_POST["VoucherNo"])?$_POST["VoucherNo"]:"");

   

    $varAmount=mysqli_real_escape_string($db->link,isset($_POST["amount"])?$_POST["amount"]:"");

    if($varAccType=="Withdraw" or $varAccType=="Bank Cost")
    {
      $varAmount='-'.$varAmount;
    }

    
    $varDate=mysqli_real_escape_string($db->link,isset($_POST["date"])?$_POST["date"]:"");
    $varAdmin=$_SESSION["name"];
    $details=mysqli_real_escape_string($db->link,isset($_POST["details"])?$_POST["details"]:"");

if(isset($_REQUEST["addBtn"]))
{
  if(!empty($varAccountName) && !empty($varAmount) && !empty($varVouchar) && !empty($varAccType))
  {
    $sql="INSERT INTO `bank_transaction`(`id`,`account_name`,`transaction_type`,`vouchar_no`,`amount`,`date`,`admin`,`EntryDate`,`details`) VALUES ('$id','$varAccountName','$varAccType','$varVouchar','$varAmount','$varDate','$varAdmin','".date('Y-m-d')."','$details')";
    $db->insert_query($sql);
    $message=$message=$db->sms;

   // print "<script>location='ShowBankTranactionReport.php?id=$id'</script>";
  }
  else
  {
    $nulMessage="<span style='color:red; font-size:15px;'>Sorry !! Fields is Empty</span>";
  }

}


if(isset($_REQUEST["editBtn"]))
{

  if(!empty($varAccountName) && !empty($varAmount) && !empty($varVouchar) && !empty($varAccType))
  {
    $sql="REPLACE INTO `bank_transaction`(`id`,`account_name`,`transaction_type`,`vouchar_no`,`amount`,`date`,`admin`,`EntryDate`,`details`) VALUES ('$id','$varAccountName','$varAccType','$varVouchar','$varAmount','$varDate','$varAdmin','".date('Y-m-d')."','$details')";
      $db->update_query($sql);
    //echo $mod->sms;
   $message=$message=$db->sms;
  }
  else
  {
    $nulMessage="<span style='color:red; font-size:15px;'>Sorry !! Fields is Empty</span>";
  }
}



if(isset($_REQUEST["dltBtn"]))
{
  if(!empty($varAccountName) and !empty($varAmount))
  {
    $sql="DELETE FROM `bank_transaction` WHERE id='$varVouchar'";
    $mod->excuteQuery($sql);
    //echo $mod->sms;
    $message="Data Update"."&nbsp;". $mod->sms;
  }
  else
  {
    $nulMessage="<span style='color:red; font-size:15px;'>Sorry !! Fields is Empty</span>";
  }
}


if(isset($_GET["edtId"]))
{
    $sql="SELECT * FROM `bank_transaction`  WHERE `id`='".$_GET['edtId']."' ";




    $query=$db->link->query($sql);
    if($query)
    {
      $fetchData=$query->fetch_array();
      //print_r($fetch);
     // print $fetchData[0];
    }
}



if(isset($_GET["dltId"]))
{
    $sql="DELETE FROM `bank_transaction` WHERE `id`='".$_GET['dltId']."'";
    $query=$db->link->query($sql);
    if($query)
    {
      echo"Successfully Delete!!";
    }
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
        <script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
            
    <link rel="stylesheet" href="datespicker/datepicker.css">
     <script src="datespicker/bootstrap-datepicker.js"></script>
    <title>Bank Transaction</title>

  
<script type="text/javascript">
      
      
      $(document).ready(
        function()
        {
            getValue();
        }
    );

      
      function getValue()
      {

              var val= parseFloat($('#amount').val());
              var balance= parseFloat($('#balance').val());


               

              if(isNaN(val))
              {
                   $('#amount').val('');
              }
              else
              {
                 

                   var type=document.frm.transactionType.value;
               
                   if(type=="Withdraw")
                   {

                        if(balance<=val)
                        {
                             $('#amount').val('');
                        }
                   }



              }



      }

    </script>

<script type="text/javascript">

  $(document).ready(function()
  {
        $('#accountName').change(function()
        {
                check_balance();
        }); 
  });

function check_balance()
{
          var accountName = $('#accountName').val();
          $.post("CheckBalance.php", { accountName: accountName },
          function(result){
            if(result)
                {
                    $('#balance').val(result);  
                }
                else
                {
                   $('#balance').val("");
                }
        });
}  


      </script>
    
  </head>
  <body>
    <form name="frm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
		 <table class="table table-bordered table-hover" style="max-width: 900px;" align="center">
		  <thead class="bg-default">
		    <tr>
		      <th scope="col" colspan="2" align="center"> <center> <h3>Bank Transaction Entry</h3></center></th>
		    </tr>
		  </thead>
		  <tbody>

   <!--     <tr>
          <td>ID</td>
          <td><input type="text" name="id" value="<?php echo $fetchData[0];?>" class="form-control" autocomplete="off"></td>
        </tr> -->

		    <tr >
		      <td width="200">Account Number</td>
		      <td>
		      	<select class="form-control" name="accountName" id="accountName"  >
		      		<option>Select Bank Name</option>
		          <?php
                $selectBank="SELECT * FROM `bank_information` ORDER BY `bank_name` ASC ";
                $querySelectBank=$db->link->query($selectBank);
              if($querySelectBank)
              {
                while($fetchBankName=$querySelectBank->fetch_array())
                {
                  print "<option value='$fetchBankName[2]'>$fetchBankName[1]->$fetchBankName[6]->$fetchBankName[2]</option>";
                }
              }
              ?>
            </select>
		      	
		      </td>
		    </tr>

      <tr>
          <td>Total balance</td>
          <td><input type="text" name="balance" id="balance" class="form-control" autocomplete="off" readonly></td>
        </tr>   

		 
		    <tr>
		      <td>Transaction Type</td>
		      <td>
			      <div class="custom-control custom-radio custom-control-inline">
				    <input type="radio" class="custom-control-input" id="customRadio" name="transactionType" value="Deposit">
				    <label class="custom-control-label" for="customRadio">Deposit</label>
				  </div>

				  <div class="custom-control custom-radio custom-control-inline">
				    <input type="radio" class="custom-control-input" id="customRadio2" name="transactionType" value="Withdraw" onclick="return getValue();">
				    <label class="custom-control-label" for="customRadio2">Withdraw</label>
				  </div> 

           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="customRadio3" name="transactionType" value="Bank Cost">
            <label class="custom-control-label" for="customRadio3">Bank Account Cost</label>
          </div>  
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="customRadio4" name="transactionType" value="Bank Interest">
            <label class="custom-control-label" for="customRadio4">Bank Account Interest</label>
          </div> 


		      </td>
		    </tr>

		   
	

         <tr>
		      <td>Voucher No/Cheque No/TrxID</td>
		      <td><input type="text" name="VoucherNo" value="<?php echo $fetchData[3];?>" class="form-control" autocomplete="off"></td>
		    </tr>
		    <tr>
		      <td>Amount</td>
		      <td><input type="text" name="amount" value="<?php echo $fetchData[4];?>" class="form-control" autocomplete="off" onkeyup="return getValue();" id="amount"></td>
		    </tr>

		    <tr>
		      <td>Date</td>
		      <td><input type="text" name="date" value="<?php print date('d-m-Y')?>" class="form-control" autocomplete="off" placeholder="dd-mm-yyyy" ></td>
		    </tr>

        <tr>
          <td>Details</td>
          <td>
              <textarea name="details" class="form-control" autocomplete="off" placeholder="Note"> <?php echo $fetchData[8];?></textarea>
          </td>
        </tr>


		    

		     <tr class="bg-light">
		      <td scope="col" colspan="2" align="center">
		      <h4 class="text-success"><?php echo $message=isset($message)?$message:"" ; ?></h4><br>
		      	<button type="submit" name="addBtn" class="btn btn-success">Add</button>
		      	<button type="submit" name="editBtn" class="btn btn-primary">Edit</button>
				<button type="submit" name="dltBtn" class="btn btn-danger">Delete</button>
				<button type="submit" name="viewBtn" class="btn btn-info">View</button>
				<button type="submit" name="" class="btn btn-secondary">Cancel</button>
        <br>
		      </td>
		    </tr>
		  </tbody>
		</table>

		<?php
          if(isset($_REQUEST["viewBtn"]))
            {
              $table="<table class=' table table-hover table-bordered ' style='max-width:1200px; background-color:#fff;' align='center'>";
              $sql="SELECT `bank_transaction`.*,`bank_information`.`bank_name`,`bank_information`.`account_type` FROM `bank_transaction`
INNER JOIN `bank_information` ON `bank_information`.`account_number`=`bank_transaction`.`account_name`  ORDER BY `bank_transaction`.`id` DESC ";
              $query=$db->link->query($sql);
              if($query)
              {



              $table.="<tr class=' table table-bordered' style='background-color:#f4f4f4;' align='center'> 
                 <td><b>Vouchar/Cheque No. </b></td>
                        <td><b>Bank Name</b></td>
                         <td><b>Account Type</b></td>

                        <td><b>Account Name</b></td>
                        <td><b>Transaction Type</b></td>
                     
                        <td><b>Amount</b></td>
                        <td><b>Date</b></td>
                        <td><b>Admin</b></td>
                        <td><b>Entry Date</b></td>
                        <td><b>Report</b></td>
                        <td><b>Edit</b></td>
                        <td><b>Delete</b></td>
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
                    <td><a href='ShowBankTranactionReport.php?id=$fetch[0]' class='btn btn-outline-primary btn-sm'>Report </a></td>

                    <td><a href='bank_transaction.php?edtId=$fetch[0]' class='btn btn-outline-primary btn-sm'>EDIT </a></td>
                    <td><a href='bank_transaction.php?dltId=$fetch[0]' class='btn btn-outline-danger btn-sm' onClick='return Confirm_Click_Delete()'>DELETE </a></td>
                    </tr>";
              }  

            }

              $table.="</table>";
            echo $table;  
          }
          
        ?>		
	</form>	




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
</html>


<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>


