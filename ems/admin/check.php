<table border="2" width="1200">
<tr>
	<td>student_id</td>
	<td>voucher</td>
	<td>`fk_fee_id`</td>
	<td>`Fee Title`</td>
	<td>`Column`</td>
	<td>paid_amount</td>
	<td>date</td>
	<td>month</td>
	<td>year</td>
	<td>defult_Date</td>
	
</tr>
<?php
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");

	$db = new database();
	
	$paid="SELECT `student_id`,`voucher`,`fk_fee_id`,`paid_amount`,`date`,`month`,`year`,`defult_Date` FROM `student_paid_table` WHERE `month`='12'";
	$result=$db->select_query($paid);

	if($result)
	{

			while($fetch=$result->fetch_array())
			{
		
				$sql=$db->select_query("SELECT * FROM `add_fee` WHERE `id`='$fetch[2]'");
				//print "SELECT * FROM `add_fee` WHERE `id`='$fetch[2]'";
				
				if($sql)
				{
					$fetchtitle=$sql->fetch_array();	
				}
				else
				{
					$fetchtitle[1]="";
				}
					


				$sqll=$db->select_query("SELECT `fk_column_id`,`Name` FROM `columnwisefeesetupforstd`
INNER JOIN `coloumn_setup` ON `coloumn_setup`.`id`=`columnwisefeesetupforstd`.`fk_column_id`
 WHERE `fk_fee_id`='$fetch[2]'");
				if($sqll)
				{
					$col=$sqll->fetch_array();
				}
				else
				{
					$col[1]="";
				}
				


		?>

						<tr>
							<td><?php print $fetch[0]?></td>
							<td><?php print $fetch[1]?></td>
							<td><?php print $fetch[2]?></td>
							<td><?php print $fetchtitle[1]?></td>
							<td><?php print $col[1]?></td>
					
					
							<td><?php print $fetch[3]?></td>
							<td><?php print $fetch[4]?></td>
							<td><?php print $fetch[5]?></td>
							<td><?php print $fetch[6]?></td>
							<td><?php print $fetch[7]?></td>
							
						</tr>						
		<?php
			}

	}?>
</table>