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
        $query="DELETE FROM `onlineexamsubject` WHERE `Subject_ID`='$linid'";
        $delete=$db->delete_query($query);
       


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
              <h3 class="card-title">View Subject </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                <tr>
                    <th>SL No</th>
                    <th>Subject ID</th>
                    
                    <th>Class</th>
                    <th>Subject Name</th>
                   
                 <th>Index</th>
                   
                    <th class="actions">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $query="SELECT `onlineexamsubject`.*,`add_class`.`class_name` FROM `onlineexamsubject`
INNER JOIN `add_class` ON `add_class`.`id`=`onlineexamsubject`.`Class_ID` order by `Serial_No` ASC ";
                    $result=$db->select_query($query);
                    $i=1;
                
                    if($result)
                    {
                        while ($fetcharry=$result->fetch_array()) {
                  ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo  $fetcharry['Subject_ID'];?></td>
                    <td><?php echo $fetcharry['class_name'];?></td>
                    <td><?php echo $fetcharry['Subject_Name'];?></td>
                    <td><?php echo $fetcharry['Serial_No'];?></td>
              


                  
                    <td>
                        <a href="OnlineQuestionMakingSubject.php?id=<?php echo $fetcharry[0];?>" class="btn btn-info" title="Report"> Edit</a> 

                        <a href="ViewOnlineExamSubject.php?delete=<?php echo $fetcharry[0];?>" class="btn btn-danger" title="Report"> Delete</a>
                        
                    </td>
                </tr>
                <?php }} ?>

              
                </tbody>


                <tfoot>
               <tr>
                      <th>SL No</th>
                  
                    <th>Class</th>
                    <th>Subject Name</th>
                   
                   <th>Index</th>
                   
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