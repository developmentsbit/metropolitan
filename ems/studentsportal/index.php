<?php
error_reporting(1);
@session_start();
@date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();

//print $_SESSION["useridid"];
if(isset($_GET["id"]))
{


$select_school="select * from project_info";
$cheke_school=$db->select_query($select_school);
if($cheke_school)
{
        $fetch_school_information=$cheke_school->fetch_array();
}

  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="Description" content="Skill Based IT" />
        <link rel="icon" type="image/x-icon" href="../admin/all_image/hompag55eCodeSDMS2015.jpg" />
          <title>Student Protal</title>
            <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
            <link rel="stylesheet" href="textEdit/redactor/redactor.css" />
            <link rel="stylesheet" href="../css/loading/loading.css" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="textEdit/redactor/redactor.min.js"></script>
            <script type="text/javascript" src="../js/loading/pace.min.js"></script>
            <link href="../css/bootstrap.min.css" rel="stylesheet">
            <link href="menu/menu.css" rel="stylesheet"  type="text/css">
        <style type="text/css">
            html {
            overflow: scroll;
            overflow-x: hidden;
            }
            ::-webkit-scrollbar {
                width: 0px;  /* remove scrollbar space */
                background: transparent;  /* optional: just make scrollbar invisible */
            }
            /* optional: show position indicator in red */
            ::-webkit-scrollbar-thumb {
                background: #FF0000;
            }
        </style>
    </head>
<body>
       
<div class="jumbotron" style="padding:10px;">
    <div class="container-fluid" style="padding:0px;">
                <label class="checkbox-inline">
                    <img src="../admin/all_image/logo.png" style="height: 80px; text-align: right;" class="img-responsive">
                </label>
    <label class="checkbox-inline">
    <h2 style="text-shadow:  0px 3px 3px #999;">    <?php print $fetch_school_information['institute_name'] ?></h2>         
    <h4>                    
        (Student Portal)</h4>
        </label>
    </div>
     </div>

  <div id="header-area" class="header_area" style="margin-top: -30px;">
        <div class="header_bottom">
            <div class="container-fluid">
                <div class="row">
                    <nav role="navigation" class="navbar navbar-default mainmenu">
                <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collection of nav links and other content for toggling -->
          <div id="navbarCollapse" class="collapse navbar-collapse">
           <ul id="fresponsive" class="nav navbar-nav dropdown">

               <li class="active"><a href="./">Home</a></li>


                <li><a href="student_info.php" target="ifrmae">Student Profile</a></li>
                 <li><a href="attendanceReport.php" target="ifrmae">Attendance Report</a></li>
                <li><a href="admit.php" target="ifrmae">Admit Card</a></li>
                <li><a href="http://alhelalacademy.edu.bd/OnlineExam/QuestionPaper.php?exam=Ex-000000073&StdID=<?php print $_SESSION['useridid']?>"  target="_blank" >Online Exam</a></li>
  
                 <li><a href="../showResult.php"  target="_blank">Result</a></li>

  <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle">Student Accounts &nbsp;<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                 
                <li><a href="DueandPaidReport.php" target="ifrmae">Total Due & Paid Report</a></li>
                <li><a href="dueReport.php" target="ifrmae">Due Report</a></li>
                
                        
                    
                  </ul>
                </li> 
            
                           <li><a href="changePassword.php"  target="ifrmae" >Change Password</a></li>
      
        <li><a href="login.php?page=logout">Logout</a></li> 

                               <!--  <li><a href="#Download">lorem ipsum</a></li>    -->     
                            </ul>
                        </div>
                    </nav>
                </div> 
            </div>            
        </div><!-- /.header_bottom -->
      
    </div>
 


  <script type="text/javascript">
  (function($){
  $(document).ready(function(){
    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
      event.preventDefault(); 
      event.stopPropagation(); 
      $(this).parent().siblings().removeClass('open');
      $(this).parent().toggleClass('open');
    });
  });
})(jQuery); </script>



      

        
        
        <div class="col-md-12" style=""><br>
            <iframe src="dashboard.php" name="ifrmae" style="height:1500px; width:100%; border: 0px;"></iframe>
                    
        </div>
        
        
        <div class="container-fluid">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 navbar-default" style="color:#000;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-left:0px; padding-top:25px; padding-bottom:25px;">
                    <b></a></b>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="right"  style="padding-left:0px;  padding-top:10px;  padding-bottom:10px;">
                    Developed by <a href="http://www.sbit.com.bd/" target="_blank">
                            <img src="img/1.png" style="height: 50px;" alt="logo">
                        </a>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    
<!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    
        
    </body>
</html>
<?php
}
else
{
    print "<script>location='login.php'</script>";

}
?>
