<?php
    error_reporting(1);
    @session_start();
    if($_SESSION["logstatus"] === "Active")
    {
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();


//link dlt data.....................................
   // if(isset($_GET['invoice']))
   //  {
   //      $linid=$db->escape($_GET['invoice']);
   //      $query="DELETE FROM `student_dues` WHERE `invoice_id`='$linid'";
   //      $delete=$db->delete_query($query);

   //      $query="DELETE FROM `due_invoice` WHERE `voucher`='$linid'";
   //      $delete=$db->delete_query($query);

   //      echo "<script>location='StudentDueInvoiceReport.php'</script>";
   //  }  

     if(isset($_POST['confirm']))
    {
      $date=date('Y-m-d');

       $totalInvoice=count($_POST['invoice']);
       for($c=0;$c<$totalInvoice;$c++)
       {

          $SelectInvoice=$db->link->query("SELECT * FROM `student_dues` WHERE `invoice_id`='".$_POST['invoice'][$c]."'");
          if($dueInvoice=$SelectInvoice->fetch_array())
          {
              $invoiceId=$dueInvoice['class_id'];
          }

            $selectClas="SELECT `index` FROM `add_class` WHERE `id`='$invoiceId'";
             if($invalue=$db->select_query($selectClas)->fetch_array())
             {
              if($invalue[0]==6 or $invalue[0]==7 or $invalue[0]==8 or $invalue[0]==9)
                {
                  $invalue[0]='0'.$invalue[0];
                }
              
              $y=date('y').$invalue[0];
             }

            $ID=$db->voucherID('student_paid_table','voucher',$y,'8',$invoiceId);
            $db->link->query("INSERT INTO `student_online_paid` (`invoice_id`,`date`,`student_id`,`roll`,`name`,`father_name`,`mother_name`,`class_id`,`class_name`,`due`,`mobile_no`,`invoiceExpireDate`,`status`,`payment_date`,`bank_info`,`updated_at`,`duration`,`invoice_no`) VALUES('$dueInvoice[1]','$dueInvoice[2]','$dueInvoice[3]','$dueInvoice[4]','$dueInvoice[5]','$dueInvoice[6]','$dueInvoice[7]','$dueInvoice[8]','$dueInvoice[9]','$dueInvoice[10]','$dueInvoice[11]','$dueInvoice[12]','$dueInvoice[13]','$dueInvoice[14]','$dueInvoice[15]','$dueInvoice[16]','$dueInvoice[17]','$ID')");


            $selectPaidTitle=$db->link->query("SELECT * FROM `due_invoice` WHERE `voucher`='".$_POST['invoice'][$c]."'");
            if($selectPaidTitle)
            {
                while($fetch_fee=$selectPaidTitle->fetch_array())
                {
                    $db->link->query("INSERT INTO `student_paid_table`(`student_id`,`voucher`,`class_id`,`paid_amount`,`date`,`admin_id`,`month`,`year`,`fk_fee_id`,`defult_Date`) VALUES('$fetch_fee[0]','$ID','$fetch_fee[2]','$fetch_fee[3]','$dueInvoice[14]','$fetch_fee[5]','$fetch_fee[6]','$fetch_fee[7]','$fetch_fee[8]','$dueInvoice[14]')");
                }
            }

          
          //print $_POST['invoice'][$c]."<br>";
            $query="DELETE FROM `student_dues`  WHERE `invoice_id`='".$_POST['invoice'][$c]."'";
            $db->delete_query($query);

            $query="DELETE FROM `due_invoice` WHERE `voucher`='".$_POST['invoice'][$c]."'";
            $db->delete_query($query);
       }
    }

   
//end link delete data........................

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Due Invoice Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
@media print{
  .print{ display: none; }
}
  </style>
    <script type="text/javascript">
    
    function confirmDelete()
    {
      var con=confirm("Do you want to delete ?");
      if(con==true)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    function confirmreceived()
    {
      var con=confirm("Are you sure you have received?");
      if(con==true)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

  </script>

</head>

 

<div class="container-fluid"> 
<form method="post">
<table class="table table-hover">
                <tr>
                    <td align="center" class="print">
                              <label>
                <select class="form-control" name="selectClass" style="width: 200px;"> 
                
              <?php 
              $fetchDuration[1]="";
              if(isset($_POST["show"]))
              {
                $x=explode("and",$_POST['selectClass']);
                $a=$_POST['selectClass'];
                  print '<option value='."$a".'>'.$x[1].'</option>';       
              }
                $select_section = "SELECT `class_id`,`class_name` FROM `student_dues` WHERE `status`='1' GROUP BY `class_id`";
                $cheked_query=$db->select_query($select_section);
                if($cheked_query)
                {
                  while($fetchsection=$cheked_query->fetch_array())
                  {?>
              
                  <option value="<?php echo"$fetchsection[0]and$fetchsection[1]"?>"><?php echo $fetchsection[1];?></option>

              <?php  }  } ?>
              <option value="AllClassandAllClass">All Class</option>
     
            </select> 
                               </label>
                               <label>
                                  <input type="submit" value="Show" name="show" class="btn btn-success" style="width: 120px; padding-left: 10px;"></input>
                               </label>

                    </td>
                </tr>

                <tr>
                    <td align="center">

                            <p>Al Helal Academy</p>
                            <p>Main Road, Sonagazi, Feni.</p>
                            <p>01728563480, www.alhelalacademy.edu.bd</p>
                      
                       </td>
                </tr>
</table>



              <table  class="table table-bordered table-striped">
                


               <thead>
                  <tr>
                    <th class="print">Select</th>
                    <th>Sl</th>
                    <th>ID</th>
                    <th>Class</th>
                    <th>Roll </th>
                    <th>Name</th>
                    <th>Father's Name</th>
                   
                    <th>Mobile</th>
                    
                    <th>Invoice ID</th>
                    <th width="100">Payment Date</th>
                    <th>Amount</th>
                    <th width="250" class="print">Action</th>
                </tr>
                </thead>
                <?php

              if(isset($_POST["show"]))
              {
                $x=explode("and",$_POST['selectClass']);          
                ?>

                <tbody>
                <?php

//                 

// `id` `` `date`  `roll` `name` `` `` `class_id` `class_name` `due` `` `invoiceExpireDate` `status` `payment_date` `bank_info` ,`updated_at`
                if($x[0]=="AllClass")
                {
                      $query="SELECT * FROM `student_dues` WHERE `status`='1'  ORDER BY `class_name` ASC  ";
                  
                }
                else
                {
                   $query="SELECT * FROM `student_dues` WHERE `status`='1' AND `class_id`='$x[0]' ORDER BY `roll` ASC  ";
                    
                }

                  // print $query;

                    $result=$db->select_query($query);
                    
                $subTotal=0;
                    if($result)
                    {
                      $i=0;
                        while ($fetcharry=$result->fetch_array()) {
                          $subTotal+=$fetcharry['due'];
                          $i++;
                  ?>
                <tr>
                    <td class="print"><input type="checkbox" name="invoice[]" value="<?php echo $fetcharry['invoice_id'];?>" checked></input></td>
                    <td><?php echo $i;?></td>
                    <td><?php echo $fetcharry['student_id'];?></td>
                    <td><?php echo $fetcharry['class_name'];?></td>
                    <td><?php echo $fetcharry['roll'];?></td>
                    <td><?php echo $fetcharry['name'];?></td>
                    <td><?php echo $fetcharry['father_name'];?></td>
                    <td><?php echo $fetcharry['mobile_no'];?></td>
                    <td><?php echo $fetcharry['invoice_id'];?></td>
                    <td><?php echo substr($fetcharry['payment_date'], 0,10);?></td>
                    <td><?php echo $fetcharry['due'];?></td>
                   
               
     
                    <td class="print">
                  <a href="student_due_invoice.php?id=<?php echo $fetcharry['student_id'];?>&year=<?php echo date('Y');?>&date=<?php echo $fetcharry['date'];?>&clas=<?php echo $fetcharry['class_id'];?>&last_id=<?php echo $fetcharry['invoice_id'];?>" class="btn btn-success" title="Report" target="_blank"> Report</a> 

                      <!--    <a href="paidInvoice.php?id=<?php echo $fetcharry['student_id'];?>&year=<?php echo date('Y');?>&date=<?php echo $fetcharry['date'];?>&clas=<?php echo $fetcharry['class_id'];?>&last_id=<?php echo $fetcharry['invoice_id'];?>" class="btn btn-info" title="Report" target="_blank" > Confirm</a> -->
                        
                    
                        
                    </td>
                </tr>
                <?php }} ?>

                    <tr>
                    <td class="print"></td>
                        <td colspan="6" align="right" >Total Student: </td>
                       


                         <td  align="right" >Invoice: </td>
                        <td ><?php echo $i;?> </td>

                        <td  align="right" >Total Amount: </td>
                        <td ><?php print $subTotal;?> </td>
                        </tr>

                    <tr >
                        <td colspan="11" align="center" class="print">
                           <label> <input type="submit" value="Confirm" name="confirm" class="btn btn-info"></input></label> 

                           <label> <input type="button" onclick="window.print()" value="Print" name="print" class="btn btn-success"></input></label>
                         </td>
                       
                    </tr>
              
                </tbody>


                <?php
              }
              ?>
              </table>
</form>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
<?php
}
?>

