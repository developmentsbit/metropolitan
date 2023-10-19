


<?php
 		if(isset($_POST["Show"]))
 		{
 					$yrar=$_POST['year'];
 			print "<script>location='monthlyOthersExpenseReport2.php?year=$yrar'</script>";
 		}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Yearly Expense Report</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet">
     </head>
     <body>
     <form method="post">
     		<table class="table table-bordered" style="max-width: 800px; " align="center"> 
     			<tr>	
     				<td colspan="2" align="center"><h3>Yearly month wise Expense Report</h3></td>

     			</tr>
     			<tr>
     				<td>Year</td>
     				<td><input name="year" value="<?php print date('Y');?>" class="form-control" style="max-width: 300px;"> </input></td>

     			</tr>
     			<tr>	
     			<td></td>
     				<td colspan="2" align="left">

     					<input type="submit" value="Show" class="btn btn-success" style="width: 150px;" name="Show"></input>
     				</td>

     			</tr>
     		</table>
     		</form>
     </body>
     </html>

