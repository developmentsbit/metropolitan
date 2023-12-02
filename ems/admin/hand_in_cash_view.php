<?php
    error_reporting(1);
    @session_start();
    if($_SESSION["logstatus"] === "Active")
    {
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();


//link dlt data.....................................
   if(isset($_GET['delete']))
    {
        $linid=$db->escape($_GET['delete']);
        $query="DELETE FROM `hand_in_cash` WHERE `date`='$linid'";
        $delete=$db->delete_query($query);
        echo "alert('Confrom Delete...');<script>location='hand_in_cash_view.php'</script>";
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
    
    function condel()
    {
      var con=confirm("Do you want to delete data?");
      if(con==true)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    function Click_edit()
    {
      var con=confirm("Are you sure to edit data?");
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
              <h3 class="card-title">View Cash Close </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                <tr>
                    <th>Date</th>
                    <th>Cash Close Duraton</th>
                    <th>Previous Balance</th>
                    <th>Fees Collection</th>
                   
                    <th>Others Collection</th>
                    <th>Expense</th>
                   
                    <th>Cash In Hend</th>
                    <th>Bank Balance</th>
                   
                    <th>Total Balance</th>
                    <th>Admin</th>
                   
                    <th class="actions">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $query="SELECT `date`,`previous_balance`,`student_collection`,`bank_withdraw`,`other_collection`,`expences`,`bank_deposit`,`hend_in_cash`,`TotalBankBalance`,`admin`,`CashCloseDuraton`,`TotalBalance` FROM `hand_in_cash`";
                    $result=$db->select_query($query);
                    
                
                    if($result)
                    {
                        while ($fetcharry=$result->fetch_array()) {
                  ?>
                <tr>
                    <td><?php echo $fetcharry[0];?></td>
                    <td><?php echo $fetcharry[10];?></td>
                    <td><?php echo $fetcharry[1];?></td>
                    <td><?php echo $fetcharry[2];?></td>
                   
                    <td><?php echo $fetcharry[4];?></td>
                    <td><?php echo $fetcharry[5];?></td>
                   
                    <td><?php echo $fetcharry[7];?></td>
                    <td><?php echo $fetcharry[8];?></td>
                      <td><?php echo $fetcharry['TotalBalance'];?></td>
                    <td><?php echo $fetcharry[9];?></td>
                  
                 
                   


                  
                    <td>
                        <a href="hand_in_cash_report.php?date=<?php echo $fetcharry[0];?>" class="btn btn-success" title="Report"> Report</a>

                         <a href="hand_in_cash_view.php?delete=<?php echo $fetcharry[0];?>" class="btn btn-danger" title="Report"> Delete</a>
                        
                    </td>
                </tr>
                <?php }} ?>

              
                </tbody>


                <tfoot>
               <tr>
                     <th>Date</th>
                    <th>Cash Close Duraton</th>
                    <th>Previous Balance</th>
                    <th>Fees Collection</th>
                 
                    <th>Others Collection</th>
                    <th>Expense</th>
                  
                    <th>Cash In Hend</th>
                    <th>Bank Balance</th>
                    <th>Total Balance</th>
                    <th>Admin</th>
                   
                    <th class="actions">Actions</th>
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