<?php
    error_reporting(1);
    @session_start();
    if($_SESSION["logstatus"] === "Active")
    {
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();


//link dlt data.....................................
   if(isset($_GET['sl']))
    {
        $linid=$db->escape($_GET['sl']);
        $query="DELETE FROM `tc_reg` WHERE `sl`='$linid'";
        $delete=$db->delete_query($query);
        echo "<script>location='view_tc_reg.php'</script>";
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
              <h3 class="card-title">TC Register   </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                <tr>
                   
                    <th>Sl. No.</th>
                    <th>Class</th>
                    <th>Roll</th>
                    <th>ID </th>
                    <th>Student's Name </th>
                    <th>Father's Name</th>
                    <th>Mothers's Name</th>
                    <th>Gender</th>
                    <th>TC No</th>
                    <th>TC Date</th>
        
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php


                    $query="SELECT * FROM `tc_reg` order by sl DESC";
                    $result=$db->select_query($query);
                    
                
                    if($result)
                    {
                      $i=1;
                        while ($fetcharry=$result->fetch_array()) {
                  ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $fetcharry['class_name'];?></td>
                    <td><?php echo $fetcharry['roll'];?></td>
                    <td><?php echo $fetcharry['std_id'];?></td>
                    <td><?php echo $fetcharry['std_name'];?></td>
                    <td><?php echo $fetcharry['fathers_name'];?></td>
                    <td><?php echo $fetcharry['mothers_name'];?></td>
                    <td><?php echo $fetcharry['gender'];?></td>
                    <td><?php echo $fetcharry['tc_no'];?></td>
                    <td><?php echo $fetcharry['tc_date'];?></td>
                   
               
     
                    <td>
                        
                        <a href="view_tc_reg.php?sl=<?php echo $fetcharry['sl'];?>" class="btn btn-danger" title="Report" onclick="return confirmDelete()"> Delete</a>
                        
                    </td>
                </tr>
                <?php }} ?>

              
                </tbody>


                <tfoot>
               <tr>
                      <tr>
                     <th>Sl. No.</th>
                    <th>Class</th>
                    <th>Roll</th>
                    <th>ID </th>
                    <th>Student's Name </th>
                    <th>Father's Name</th>
                    <th>Mothers's Name</th>
                    <th>Gender</th>
                    <th>TC No</th>
                    <th>TC Date</th>
        
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