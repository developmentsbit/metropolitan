<?php
  error_reporting(1);
  @session_start();
  if($_SESSION["logstatus"] === "Active")
  {
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();

    if(isset($_POST["view"]))
    {
        $closeDate=$_POST['cashcloseDate'];
        $statingDate=$_POST['statingDate'];
        $endingDate=$_POST['endingDate'];

        print "<script>location='dailycollectionreport.php?lastClose=$closeDate&from=$statingDate&to=$endingDate'</script>";
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cash Close Statement </title>
  </head>
  <body>
  <form method="POST">
    <div class="container pt-5">

       <div class="row">

          <div class="col-12 bg-secondary text-light p-1  text-center"> <h2>Cash Close Statement </h2></div>

            <div class="col-3 p-2"> Select Previous Cash Close Date :</div>
            <div class="col-9 p-2"> 
          
            <select class="form-control" name="cashcloseDate">
                <?php
                  $sql="SELECT `date` FROM `hand_in_cash` order by `date` desc";
                  $query=$db->link->query($sql);
                  while($fetch=$query->fetch_array())
                  {
                      print  '<option>'.$fetch[0].'</option>';
                  }
                ?>
            </select>
            </div>

            <div class="col-3 p-2"> Stating Date :</div>
            <div class="col-9 p-2"> 
              <input type="text" name="statingDate" class="form-control" value="<?php print date('Y-m-d')?>" ></input>
            </div>

            <div class="col-3 p-2"> Ending Date :</div>
            <div class="col-9 p-2"> 
              <input type="text" name="endingDate" class="form-control" value="<?php print date('Y-m-d')?>"></input>
            </div>




            <div class="col-12 p-3 text-center" >
               <input type="submit" name="view" value="View" class="btn btn-success" style="width: 150px"></input> 
              
            </div>
      
       </div>
    </div>
</form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>

