<?php
    error_reporting(1);
    @session_start();
    if($_SESSION["logstatus"] === "Active")
    {
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();


//link dlt data.....................................
   if(isset($_GET['invoice']))
    {
        $linid=$db->escape($_GET['invoice']);
        $query="DELETE FROM `student_dues` WHERE `invoice_id`='$linid'";
        $delete=$db->delete_query($query);

        $query="DELETE FROM `due_invoice` WHERE `voucher`='$linid'";
        $delete=$db->delete_query($query);

        


        echo "<script>location='StudentDueInvoiceReport.php'</script>";
    }  

     if(isset($_POST['delete']))
    {

       $totalInvoice=count($_POST['del']);
       for($c=0;$c<$totalInvoice;$c++)
       {
          $query="DELETE FROM `student_dues` WHERE `invoice_id`='".$_POST['del'][$c]."'";
          $db->delete_query($query);

          $query="DELETE FROM `due_invoice` WHERE `voucher`='".$_POST['del'][$c]."'";
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

                       $duration="SELECT `student_dues`.`invoiceExpireDate`,`month_setup`.`name` FROM `student_dues`
INNER JOIN `month_setup` ON `month_setup`.`id`=`student_dues`.`duration`
 WHERE `status`='0'  AND `class_id`='$x[0]' LIMIT 0,1  ";
                   // print $query;

                    $selectDuration=$db->select_query($duration);
                    if($selectDuration)
                    {
                      $fetchDuration=$selectDuration->fetch_array();
                    }
                    
              }


                $select_section = "SELECT * FROM `add_class` order by `index` asc ";
                $cheked_query=$db->select_query($select_section);
                if($cheked_query)
                {
                  while($fetchsection=$cheked_query->fetch_array())
                  {?>
              
                  <option value="<?php echo"$fetchsection[0]and$fetchsection[2]"?>"><?php echo $fetchsection[2];?></option>

              <?php  }  } ?>
     
            </select> 
                               </label>
                               <label>
                                  <input type="submit" value="Show" name="show" class="btn btn-success" style="width: 120px; padding-left: 10px;"></input>
                               </label>

                    </td>
                </tr>

                <tr>
                    <td align="center"><span style="font-size: 24px;"> Al Helal Academy </span>  <br><span style="font-size: 15px;">Student's Due Invoice</span>  <br><span style="font-size: 15px;"> মেয়াদ  : জানুয়ারি - <?php print $fetchDuration[1];?></span>  </td>
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
                    <th width="100">Expire Date</th>
                    <th>Invoice ID</th>
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

                    $query="SELECT * FROM `student_dues` WHERE `status`='0' AND `class_id`='$x[0]' ORDER BY `roll` ASC  ";
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
                    <td class="print"><input type="checkbox" name="del[]" value="<?php echo $fetcharry['invoice_id'];?>" checked></input></td>
                    <td><?php echo $i;?></td>
                    <td><?php echo $fetcharry['student_id'];?></td>
                    <td><?php echo $fetcharry['class_name'];?></td>
                    <td><?php echo $fetcharry['roll'];?></td>
                    <td><?php echo $fetcharry['name'];?></td>
                    <td><?php echo $fetcharry['father_name'];?></td>
                    
                    <td><?php echo $fetcharry['mobile_no'];?></td>
                    <td><?php echo $fetcharry['invoiceExpireDate'];?></td>
                    <td><?php echo $fetcharry['invoice_id'];?></td>
                    <td><?php echo $fetcharry['due'];?></td>
                   
               
     
                    <td class="print">
                  <a href="student_due_invoice.php?id=<?php echo $fetcharry['student_id'];?>&year=<?php echo date('Y');?>&date=<?php echo $fetcharry['date'];?>&clas=<?php echo $fetcharry['class_id'];?>&last_id=<?php echo $fetcharry['invoice_id'];?>" class="btn btn-success" title="Report" target="_blank"> Report</a> 

                         <a href="paidInvoice.php?id=<?php echo $fetcharry['student_id'];?>&year=<?php echo date('Y');?>&date=<?php echo $fetcharry['date'];?>&clas=<?php echo $fetcharry['class_id'];?>&last_id=<?php echo $fetcharry['invoice_id'];?>" class="btn btn-info" title="Report" target="_blank" > Paid</a>
                        
                        <a href="StudentDueInvoiceReport.php?invoice=<?php echo $fetcharry['invoice_id'];?>" class="btn btn-danger" title="Report" onclick="return confirmDelete()"> Delete</a>
                        
                    </td>
                </tr>
                <?php }} ?>

                    <tr>
                    <td class="print"></td>
                        <td colspan="5" align="right" >Total Student: </td>
                        <td ><?php 

                            $totalStd=$db->link->query("SELECT COUNT(*) AS 'Total' FROM `running_student_info` WHERE `class_id`='$x[0]'");
                            $fetchStd=$totalStd->fetch_array();
                            print $fetchStd[0];
                            
                        ?> </td>


                         <td  align="right" >Invoice: </td>
                        <td ><?php echo $i;?> </td>

                        <td  align="right" >Total Amount: </td>
                        <td ><?php print $subTotal;?> </td>
                        </tr>

                    <tr >
                        <td colspan="11" align="center" class="print">
                           <label> <input type="submit" value="Delete" name="delete" class="btn btn-danger"></input></label> 

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

