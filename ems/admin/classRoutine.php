<div class="col-md-9 col-xs-12 fontsize backgroundcol"  style="padding:0px ; margin:0px; margin-top:10px; padding-top:10px;" >

<table class="table table-hover" align="center">
<tr>
	<td class="success"> <h3>Class Routine</h3> </td>
</tr>

<?php
	$selectYear="SELECT `Year` FROM `routine` GROUP BY `Year` order by `Year` DESC ";
	$query=$db->link->query($selectYear);
	if($query)
	{

	while($fetch=$query->fetch_array())
	{
		
	
?>
<tr>
		<td  style="min-height: 500px;">
		<table class="table table-bordered">
		<tr><td>
			<?php
				print $fetch[0];

				?>
				</td></tr>
				<?php
					$type="SELECT `Routine_type` FROM `routine` WHERE `Year`='$fetch[0]' GROUP BY `Routine_type` ASC ";
					$result=$db->link->query($type);
					if($result)
					{


					while($fetchType=$result->fetch_array())
					{?>
							
								<tr>
										<td><?php if($fetchType[0]=="class") { print "Class Routine"; }?>
										<?php if($fetchType[0]=="teacher") { print "Teachers Routine"; }?>
										<?php if($fetchType[0]=="join") { print "Joint Routine"; }?> 

											<table class="table table-striped ">
													<tr>
														<td width="100">SL</td>
														<td>Title</td>
														<td width="100">View</td>
													</tr>

													<?php
													
														$routine="SELECT * FROM `routine` WHERE `Year`='$fetch[0]' AND `Routine_type`='$fetchType[0]' ORDER BY `Routine_id` DESC  ";
														$resultroutine=$db->link->query($routine);
														if($resultroutine)
														{
															$i=1;

														while($fetchroutine=$resultroutine->fetch_array())
														{?>
															<tr>
														<td width="100"><?php print $i++;?></td>
														<td><?php print $fetchroutine['Routine_title']; ?></td>
														<td width="100"><a href="#" > View</a></td>
													</tr>
												
														<?php
													}
													}
													?>

											</table>

										</td>
								</tr>
						

					<?php

					}
				}



			?>
				</table>
		</td>

</tr>

<?php
}
}
?>
	
</table>
</div>