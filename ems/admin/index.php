<?php
  error_reporting(1);
  @session_start();
  
  if(isset($_POST["logOUt"]))
  {
    unset($_SESSION["logstatus"]);
  }
  
  if($_SESSION["logstatus"] === "Active")
  {
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();
    
    $projectinfo="SELECT  * FROM `project_info`";
    $result=$db->select_query($projectinfo);
    if($result>0){
      $fetch_result=$result->fetch_array();
    }
  ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Admin Panal || <?php if(isset($fetch_result)){ echo $fetch_result["title"];} else {echo "";}?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shortcut icon" href="all_image/shortcurt_iconSDMS2015.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>



<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
     
      <li class="nav-item d-none d-sm-inline-block">
      <input type="hidden" name="mmhidden" width="10" id="mmhidden">
<input type="hidden" name="smhidden" width="10" id="smhidden">


        <a href="../" class="nav-link" target="_blank">Home</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="./" class="nav-link">Dashboard</a>
      </li>

       <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3"  action="viewDetails.php" method="POST" >
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search Student" aria-label="Search" name="stID">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit" formtarget="_blank">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
   
           <li class="nav-item d-none d-sm-inline-block">




                                 <?php
                $pathdocument=$_SESSION["id"].".jpg";
                

                if (file_exists('all_image/'.$pathdocument)) 
                {?>

                  <img src="all_image/<?php echo $_SESSION["id"];?>.jpg"  style="height: 30px; width: 30px;">

              <?php  } 
                else {?>

                 <img src="all_image/male.png"  style="height: 30px; width: 30px;" >

                <?php }
          ?>


      </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><?php print $_SESSION["name"]?></a>
      </li>
        <li class="nav-item ">
        <a href="../adminloginpanel" class="nav-link">Logout</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="brand-link" >
      <img src="all_image/hompageCodeSDMS2015.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
   

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="font-size: 14px;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
<?php
      if($_SESSION["id"]=="306"){
          $select_dev_link="SELECT * FROM `main_link_info` GROUP BY `type` ORDER BY `SLNO` ASC";
          }else {
                $select_dev_link="SELECT `main_link_piority`.`Main_Link_id`,`main_link_info`.`type` FROM `main_link_piority`
INNER JOIN `main_link_info` ON `main_link_info`.`Main_Link_Id`=`main_link_piority`.`Main_Link_id`
WHERE `main_link_piority`.`adminId`='".$_SESSION["id"]."' GROUP BY `main_link_info`.`type`  ORDER BY `main_link_info`.`SLNO` ASC";
          }
          $chek_dev_link=$db->select_query($select_dev_link);
          if($chek_dev_link){
          while($fetch_link=$chek_dev_link->fetch_array()){
      
      ?>

           <li style="background: #17a2b8; padding-top: 7px; padding-bottom: 7px;padding-left: 15px; display: block; border-radius: 5px; margin-bottom: 3px;"> <?php echo $fetch_link["type"]; ?></li>


  <?php
          if($_SESSION["id"]=="306"){
            
            $select_main_link="SELECT * FROM `main_link_info`WHERE `type`='".$fetch_link["type"]."' ORDER BY `SLNO` ASC";
          }
          else {
            
            $select_main_link="SELECT `main_link_piority`.*,`main_link_info`.`Main_Link_Name`,`Page_Name`,`type`,`fafaIcon` FROM `main_link_info` 
INNER JOIN `main_link_piority` ON `main_link_piority`.`Main_Link_id`=`main_link_info`.`Main_Link_Id`
WHERE `main_link_piority`.`adminId`='".$_SESSION["id"]."' AND  `main_link_info`.`type`='$fetch_link[type]' ORDER BY `main_link_info`.`SLNO` ASC ";
          }
      
          $chek_main_link=$db->select_query($select_main_link);
          if($chek_main_link){
          while($fetch_main_link=$chek_main_link->fetch_array()){
          if($fetch_main_link["Page_Name"] =='#')
          {
          
          
    
          
      ?>


          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link" id="<?php print $fetch_main_link['Main_Link_Id'];?>" onclick="return mainmenu('<?php print $fetch_main_link['Main_Link_Id'];?>')">

              <i class="<?php  echo $fetch_main_link["fafaIcon"];?>"></i>

               
               
              <p>
                <?php  echo $fetch_main_link["Main_Link_Name"];?>

                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview " >

            <?php  
            if($_SESSION["id"]=="306"){
              
              $select_sub_link="SELECT * FROM  `sub_link_info` WHERE `Main_Link`='".$fetch_main_link[1]."' ORDER BY `Sl_No` ASC";
            }else{
              
              $select_sub_link="SELECT `sublinkpeority`.*,`sub_link_info`.`Sub_Link_Name`,`Sub_Page_Name`,`Sub_Link_Id`,`Sub_Page_Name`,`linktype`,`Sub_Page_Name`,`fafaIcon` FROM `sublinkpeority`
INNER JOIN `sub_link_info` ON `sub_link_info`.`Sub_Link_Id`=`sublinkpeority`.`sublinkId` WHERE 
`sublinkpeority`.`AdminId`='".$_SESSION["id"]."' AND `sub_link_info`.`Main_Link`='$fetch_main_link[1]' GROUP BY `sub_link_info`.`Sub_Link_Id` ORDER BY `sub_link_info`.`Sl_No` ASC";


            }
            
            $chek_Sub_link=$db->select_query($select_sub_link);
            if($chek_Sub_link)
            {
            while($fetch_sub_link=$chek_Sub_link->fetch_array()){

         ?>

       <li class="nav-item">
    <?php
        $x=$fetch_sub_link['Sub_Page_Name'];
        $y=$fetch_main_link[1];
        $z=$fetch_sub_link['Sub_Link_Id'];

        if($fetch_sub_link['linktype']=="Iframe")
        {


    ?>
                <a href="<?php print $x;?>" class="nav-link" id="<?php print $z;?>" target="ifrm" onclick="return showifram('<?php print $y;?>','<?php print $z;?>')">
                     <i class="nav-icon <?php echo $fetch_sub_link["fafaIcon"];?>"></i>
                    <p><?php echo $fetch_sub_link["Sub_Link_Name"];?></p>
                </a>
              <?php
            }
            else if($fetch_sub_link['linktype']=="New Tab")
            {?>

   <a href="<?php print $x;?>" target="_blank" class="nav-link" id="<?php print $z;?>"  >
                     <i class="<?php echo $fetch_sub_link["fafaIcon"];?>"></i>
                    <p><?php echo $fetch_sub_link["Sub_Link_Name"];?></p>
                </a>

         <?php   
       }
            ?>

              </li>
  <?php  
                 
               }
             }

  ?>
            </ul>
    </li>

    <?php 

        } 
       } 
     } 
   } 
 }

       ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="margin-top:5px;">
      <div class="container-fluid"  style=" text-align: center;">
       <span id="Dashboard">
        <?php

            include("dashboard.php");
  
          ?>
        </span>

      <span style="text-align: center;" id="showPages"></span>

    
      <span style="text-align: center;">

      <iframe  name="ifrm" id="ifrm"  height="800" width="100%" style="border: none;"></iframe>

      </span>
      
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="http://sbit.com.bd">SBIT</a></strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 5.8
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script type="text/javascript">
  

    $(document).ready(function()
  {
  
    $('#showPages').hide();
        $('#ifrm').hide();

       // var url=window.locatio

       n.href;
         // alert(url);

    
        //  var checking_html = '<img src="img/loading.gif" class="img-responsive"/> ';
        // $('#showPages').html(checking_html);
        //  var id="54656";

        //        $.ajax({
          
        //             type: "POST",
        //             url: "dashboard.php",
        //             data: {id:id},
        //             cache: false,
        //             success: function(data) {
        //             //alert(data);
        //            $('#showPages').html(data);
           
           
        //           }
        //             });
  });

    function showifram(mm,sm)
    {

    //  alert(sm);
       
   
   
   var checking_html = '<img src="all_image/loading.gif" class="img-responsive"/> ';
     $('#ifrm').html(checking_html);
   
    var valmm= $('#mmhidden').val();
    var valsm=$('#smhidden').val();
    //alert(valsm);

      if(valmm!="" && valsm!="")
      {
              $('#'+valmm).css("background-color", "#343a40");
              $('#'+valmm).css("color", "#c2c7d0");  

              $('#'+valsm).css("background-color", "#343a40");
              $('#'+valsm).css("color", "#d0d4db");
      }





    $('#'+mm).css("background-color", "#00CC00");
    $('#'+mm).css("color", "#fff");  

    $('#'+sm).css("background-color", "rgba(255,255,255,.9)");
    $('#'+sm).css("color", "#000");

  $('#mmhidden').val(mm);
  $('#smhidden').val(sm);

       $('#Dashboard').hide();
        $('#ifrm').show();
      $('#showPages').hide();

    }


function mainmenu(mainmenuid)
{


      $('#'+mainmenuid).css("background-color", "#00CC00");
    $('#'+mainmenuid).css("color", "#fff");  
}

function showPage(page,mm,sm)
{

  $('#Dashboard').hide();
    $('#ifrm').hide();
  $('#showPages').show();

   var checking_html = '<img src="all_image/loading.gif" class="img-responsive"/> ';
     $('#Dashboard').html(checking_html);
   
    var valmm= $('#mmhidden').val();
    var valsm=$('#smhidden').val();

      if(valmm!="" && valsm!="")
      {
              $('#'+valmm).css("background-color", "#343a40");
              $('#'+valmm).css("color", "#c2c7d0");  

              $('#'+valsm).css("background-color", "#343a40");
              $('#'+valsm).css("color", "#d0d4db");
      }





    $('#'+mm).css("background-color", "#00CC00");
    $('#'+mm).css("color", "#fff");  

    $('#'+sm).css("background-color", "rgba(255,255,255,.9)");
    $('#'+sm).css("color", "#000");



      var id="4567890"; 
        $.ajax({
          
                    type: "POST",
                    url: page,
                    data: {id:id},
                    cache: false,
                    success: function(data) {
                    //alert(data);
                   $('#showPages').html(data);
                    
                     $('#mmhidden').val(mm);
                      $('#smhidden').val(sm);

                  }
                    });
}


</script>

</body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>

