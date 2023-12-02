
<?php
	error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();
    if(isset($_GET['id']))
    {
       $db->link->query("delete from photo_gellary where photo_id='".$_GET['id']."'");
    }

	?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compitable" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstarp-->
    <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
	<link rel="stylesheet" href="textEdit/redactor/redactor.css" />
	<script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
	<script src="textEdit/redactor/redactor.min.js"></script>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript"></script>
	</head>
<body>
	<form method="post" action="" name="photo_gallery" enctype="multipart/form-data" >
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<table class="table table-responsive table-bordered" style=" display:<?php echo $display; ?> ;margin-top:20px; border:1px solid #000;">
			<tr class="bg-primary">
				<td colspan="2" class="text-center"><span style="font-size:22px">Photo gallery</span></td>
			</tr>
			<tr>
				<td>
					<?php 
						$select_photo_gellary="select * from photo_gellary order by photo_id desc";
						$chke=$db->select_query($select_photo_gellary);
						if($chke){
						 while($fetch_photo=$chke->fetch_array())
						 {
					
					?>
					
						<div class='col-lg-3 col-md-3'>
							 <a href="../other_img/<?php print $fetch_photo[0]; ?>.<?php print "$fetch_photo[9]"; ?>"  target="_blank"> <img src="../other_img/<?php print $fetch_photo[0]; ?>.<?php print "$fetch_photo[9]"; ?>" class="img-responsive" style='margin-top:3px'> </a>
							<center><p> <label> <b><?php print $fetch_photo[2]; ?>, <?php print $fetch_photo[4].$fetch_photo[5].$fetch_photo[6].$fetch_photo[7].$fetch_photo[8]; ?></b></label> </p>

							 <p>

						
							 <a href="?id=<?php print $fetch_photo[0]; ?>" class="btn btn-danger">Delete</a>

							 </p>

							 </center>
							
						</div>
						<?php  } } ?>
				</td>
			</tr>
			
		</table>
		<div>
	</form>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
