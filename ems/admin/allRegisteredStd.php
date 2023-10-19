<?php
    error_reporting(1);
    @session_start();
    if($_SESSION["logstatus"] === "Active")
    {
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();

    if(isset($_GET["del"]))
    {


      $db->insert_query($sql2);
      $sql3="DELETE FROM `running_student_info` WHERE `student_id`='".$_GET["del"]."'";

      $db->delete_query($sql3);
      $sql4="DELETE FROM `subject_registration_table` WHERE `std_id`='".$_GET["del"]."'";
      $db->delete_query($sql4);

      print "<script>location='allRegisteredStd.php'</script>";
    }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> All Registered Student</title>
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
      .print{
        display:none;
      }

</style>

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
      var con=confirm("do you want to edit?");
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
              <h3 class="card-title" style="text-align: center">View All Registered Student  </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             
             
         <?php     

$select="SELECT * FROM `running_student_info`
INNER JOIN `add_class` ON `add_class`.`id`=`running_student_info`.`class_id`
GROUP BY `class_id` ASC  ";
 $i=0;

$table=' <table id="example1" class="table table-bordered table-striped">';
 $table.="<thead><tr><th>SL</th> <th>ID</th> <th>Roll</th> <th>Class</th>   <th>Group</th> <th>Name</th>  <th>Father's Name</th> <th>Mother's Name </th> <th>Phone</th>    <th>Gender</th> <th>Religion</th> <th width='50'>Session</th>   <th class='print' width='230'>Action</th>  </tr></thead>  <tbody>";

$result=$db->link->query($select);
while($fetch=$result->fetch_array())
{
   
   

     
     

        $selectclass="SELECT * FROM `running_student_info`  
INNER JOIN `add_group` ON `add_group`.`id`=`running_student_info`.`group_id`
WHERE `running_student_info`.`class_id`='$fetch[1]' ORDER BY `running_student_info`.`class_roll` ASC";
        $query=$db->link->query($selectclass);
        while($fetch_std=$query->fetch_array())
        {

              $std="SELECT `student_personal_info`.`student_name`,`student_personal_info`.`father_name`,`student_personal_info`.`mother_name`,`student_personal_info`.`gender`,`student_personal_info`.`religious`,`student_guardian_information`.`guardian_contact`,`student_acadamic_information`.`session2`
FROM `student_personal_info`  
INNER JOIN `student_guardian_information` ON `student_guardian_information`.`id`=`student_personal_info`.`id`
INNER JOIN `student_acadamic_information` ON `student_acadamic_information`.`id`=`student_personal_info`.`id`
WHERE `student_personal_info`.`id`='$fetch_std[0]'";

                $query_info=$db->link->query($std);

                if($query_info)
                {
                  $fetch_info=$query_info->fetch_array();
                }



            $i++;
            $table.="<tr><td>$i</td>  <td>$fetch_std[0]</td>    <td>$fetch_std[2]</td> <td>$fetch[class_name]</td> <td>$fetch_std[group_name]</td>  <td>$fetch_info[0] </td>   <td>$fetch_info[1]</td> <td>$fetch_info[2] </td> <td>0$fetch_info[5]</td> <td>$fetch_info[3]</td> <td>$fetch_info[4]</td>  <td>$fetch_info[6]</td>    <td class='print'>   <a href='viewStudentDetails.php?id=$fetch_std[0]' class='btn btn-success' target='_blank'>View </a>  <a href='student_resigtration.php?id=$fetch_std[0]&session=$fetch_info[6]&name=$fetch_info[0]&rel=$fetch_info[4]' class='btn btn-info' target='_blank'>Reg </a>  <a href='Student_information.php?edit=$fetch_std[0]' class='btn btn-warning' target='_blank' onclick='return Click_edit()'>Edit </a>    <a href='allRegisteredStd.php?del=$fetch_std[0]' class='btn btn-danger' onclick='return condel()'>Delete </a></td> 

            </tr>";

        }

  
}
$table.=" </tbody>";


      $table.="<tfoot><tr><th>SL</th> <th>ID</th> <th>Roll</th>  <th>Class</th>  <th>Group</th> <th>Name</th>  <th>Father's Name</th> <th>Mother's Name </th> <th>Phone</th>    <th>Gender</th> <th>Religion</th>  <th width='50'>Session</th>  <th class='print' width='250'>Action</th>  </tr></tfoot> ";



$table.="</table>";


print $table;

?>
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