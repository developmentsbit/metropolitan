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
        echo "<script>location='viewStudentDueInvoiceDelete.php'</script>";
    }  

   
//end link delete data........................

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
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

 

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Due Invoice  </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                <tr>
                    <th>Sl</th>
                    <th>Student ID</th>
                    <th>Class</th>
                    <th>Roll </th>
                    <th>Student Name</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Mobile</th>
                    <th>Expire Date</th>
                    <th>Invoice ID</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php

//                 

// `id` `` `date`  `roll` `name` `` `` `class_id` `class_name` `due` `` `invoiceExpireDate` `status` `payment_date` `bank_info` ,`updated_at`

                    $query="SELECT * FROM `student_dues` WHERE `status`='0'";
                    $result=$db->select_query($query);
                    
                
                    if($result)
                    {
                      $i=1;
                        while ($fetcharry=$result->fetch_array()) {
                  ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $fetcharry['student_id'];?></td>
                    <td><?php echo $fetcharry['class_name'];?></td>
                    <td><?php echo $fetcharry['roll'];?></td>
                    <td><?php echo $fetcharry['name'];?></td>
                    <td><?php echo $fetcharry['father_name'];?></td>
                    <td><?php echo $fetcharry['mother_name'];?></td>
                    <td><?php echo $fetcharry['mobile_no'];?></td>
                    <td><?php echo $fetcharry['invoiceExpireDate'];?></td>
                    <td><?php echo $fetcharry['invoice_id'];?></td>
                   
               
     
                    <td>
                        <a href="student_due_invoice.php?id=<?php echo $fetcharry['student_id'];?>&year=<?php echo date('Y');?>&date=<?php echo $fetcharry['date'];?>&clas=<?php echo $fetcharry['class_id'];?>&last_id=<?php echo $fetcharry['invoice_id'];?>" class="btn btn-success" title="Report" target="_blank"> Report</a> <br> <br>
                         <a href="paidInvoice.php?id=<?php echo $fetcharry['student_id'];?>&year=<?php echo date('Y');?>&date=<?php echo $fetcharry['date'];?>&clas=<?php echo $fetcharry['class_id'];?>&last_id=<?php echo $fetcharry['invoice_id'];?>" class="btn btn-info" title="Report" target="_blank" > Paid</a>
                         <br><br>
                        <a href="viewStudentDueInvoiceDelete.php?invoice=<?php echo $fetcharry['invoice_id'];?>" class="btn btn-danger" title="Report" onclick="return confirmDelete()"> Delete</a>
                        
                    </td>
                </tr>
                <?php }} ?>

              
                </tbody>


                <tfoot>
               <tr>
                      <tr>
                    <th>Sl</th>
                    <th>Student ID</th>
                    <th>Class</th>
                    <th>Roll </th>
                    <th>Student Name</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Mobile</th>
                    <th>Expire Date</th>
                    <th>Invoice ID</th>
                    <th>Action</th>
                </tr>
                   
                   
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>



</div>
<!-- ./wrapper -->

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