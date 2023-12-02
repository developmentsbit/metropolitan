  <?php
	 error_reporting(1);
     session_start();
     
	if($_SESSION["logstatus"] === "Active")
	{
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
	
	$selApp="select * from project_info";
    $queApp=$db->select_query($selApp);
    $fetchApp=mysqli_fetch_assoc($queApp);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Collection & Due Summary</title>
	<style type="text/css">
		@media print{
			.print{
				display:none;
			}
	</style>
  <script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
	  <script src="textEdit/redactor/redactor.min.js"></script>
  
    <link rel="stylesheet" href="datespicker/datepicker.css">
    
   <link href="../css/bootstrap.min.css" rel="stylesheet">
   
     <script src="datespicker/bootstrap-datepicker.js"></script>
	 
	     <script src="../js/bootstrap.min.js"></script>
	 <script type="text/javascript">
	 
	 
	    $(document).ready(function () {
                    
                    $('#example1').datepicker({
                        format: "dd/mm/yyyy"
                    });  
                
                });
				
				
             $(document).ready(function()
  {
        var checking_html = '<img src="search_group/loading.gif" /> Checking...';
        $('#className').change(function()
        {
            $('#item_result').html(checking_html);
                check_availability();
               Check_exam_type();
        });
    
 });

         //function to check username availability   
function check_availability()
{
        var class_name = $('#className').val();
        $.post("check_grou_name.php", { className: class_name },
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#groupname').html(result);
                    $('#item_result').html("");
                    $('#category_result').html('');
                }
                else
                {
                    //show that the username is NOT available
                    document.getElementById('category_result').style.color='RED';
                    $('#category_result').html('No Group Name Found');
                    $('#item_result').html("");
                    $('#groupname').html('');
                }
                
                $('#subject_type').html("");
                $('#sub_name').html("");
                $('#part_name').html('');
                $('#subjectcode').val('');
                 
        });

}

	
		

</script>
    </head>
  <body>
  	<form name="teacherinfo" action="" method="post"  enctype="multipart/form-data" class="form-horizontal marksEditEntry" >
           
			
                <table  height="100" width="960" align="center" style="border:1px #000 solid;" class="print" bgcolor="#f4f4f4">
                    
                    <tr>
                    		<td  colspan="3"><h1> &nbsp;Collection & Due Summary</h1></td>
                    </tr>

   					 <tr>
                    	
						<td><strong><span class="text-success" style="font-size: 15px;">Year</span></strong></td>
                        <td ><div class="col-md-8">
						 <input type="text"   class="form-control" name="year" style="width:280px; height: 25px; border-radius:0px;" placeholder="<?= date('Y');?>"  value="<?= date('Y');?>">
						 </div></td>
                    
					
					  </tr>
					

			


					<tr>
                    	<td >
                    		<strong><span class="text-success" style="font-size: 15px;">Select Month</span></strong></td>
                        <td ><div class="col-md-8">
                        
                        		<select class="form-control" name="selectMonth" id="month" style="width:285px; height: 30px;  font-size: 14px;">

                        		<option value="01">জানুয়ারি</option>
                        		<option value="02">ফেব্রুয়ারি</option>
                        		<option value="03">মার্চ</option>
                        		<option value="04">এপ্রিল</option>
                        		<option value="05">মে</option>
                        		<option value="06">জুন</option>
                        		<option value="07">জুলাই</option>
                        		<option value="08">আগস্ট</option>
                        		<option value="09">সেপ্টেম্বর</option>
                        		<option value="10">অক্টোবর</option>
                        		<option value="11">নভেম্বর</option>
                        		<option value="12">ডিসেম্বর</option>
                        		</select>


                        </div>
                    </tr>

					
					 <tr id="date">
                    	
						
					</tr>
					
					
				
					
                <tr>

                	<td colspan="2" align="left"> <br><input type="submit" name="showdata" value="Show Data" class="btn btn-danger btn-md" style="width: 120px; margin-left: 300px; height: 30px;" onClick="return ShowReportDaily()"></input><br>
				</td>

			</tr>
                </table>
							
                
				
				 
     </form>
     <?php
     		if(isset($_POST["showdata"])){

     		?>
     		 <table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table" >
    <tr>

   

      <td  height="50" colspan="4" align="center" >
      
    <ul style=" padding-top:5px">
    
    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px; list-style: none;"><?php echo $fetchApp["institute_name"]?></li>
   <li style="list-style: none;"><p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["location"]?></p></li>
    <li style=" list-style: none; margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php echo $fetchApp["phone_number"].','.$fetchApp["email"];?></li>
     </ul>      </td>
<td style="border-bottom:1px solid #333333"></td>
    </tr>

<tr>
    <td colspan="2" align="center"> <h3>Collection & Due Summary</h3>
    <h4> জানুয়ারি -   
    
    <?php  if($_POST["selectMonth"]==2)
         {
             echo "ফেব্রুয়ারি";
         }
         else if($_POST["selectMonth"]==3)
         {
             echo "মার্চ";
         }
      else if($_POST["selectMonth"]==4)
         {
             echo "এপ্রিল";
         }
      else if($_POST["selectMonth"]==5)
         {
             echo "মে";
         }
      else if($_POST["selectMonth"]==6)
         {
             echo "জুন";
         }
      else if($_POST["selectMonth"]==7)
         {
             echo "জুলাই";
         }
      else if($_POST["selectMonth"]==8)
         {
             echo "আগস্ট";
         }
      else if($_POST["selectMonth"]==9)
         {
             echo "সেপ্টেম্বর";
         }
      else if($_POST["selectMonth"]==10)
         {
             echo "অক্টোবর";
         }
      else if($_POST["selectMonth"]==11)
         {
             echo "নভেম্বর";
         }
      else if($_POST["selectMonth"]==12)
         {
             echo "ডিসেম্বর";
         }
     
     echo " , ";
     echo $_POST["year"];
    ?>
    </h4>
    
    </td>
</tr>

</table>
	<table class="table table-bordered table-striped" align="center" width="1200">
	    
	    
	<thead>
	    <tr>
	    <th>SL</th>
	    <th>Class Name </th>
	    <th>Pre. Due</th>
	    <th>Common Fee</th>
	    <th>Exceptional Fee</th>
	    <th>Total Amount</th>
	    <th>Total Discount</th>
	    <th>Net Amount</th>
	    <th>Paid</th>
	    <th>Running Paid</th>
	    <th>Due</th>
	  
	    </tr>
	    
	</thead>
	<tbody>
	    
	    <?php
	    $i=1;
	    
	    $totalPre=0;
	    $totalCommon=0;
	    $totalEx=0;
	    $totalAmount=0;
	    $totalDiscount=0;
	    $totalNetAmount=0;
	    $totalPaid=0;
	    $RunningPaid=0;
	    $totalDue=0;


                            $select_class="SELECT * FROM `add_class`  ORDER BY `index` ASC";
                            $check_query=$db->select_query($select_class);
                            if($check_query){
                                 while($fetch_class=$check_query->fetch_array())
                                {
                                ?>
	    <tr>
	        <td><?php print $i++; ?></td>
	        <td align="left"><?php   echo $fetch_class[2]; ?></td>
	
	        <td><?php
	        $sql="SELECT SUM(`student_account_info`.`AmountExceptional`) FROM `student_account_info` INNER JOIN `add_fee` ON `add_fee`.`id`=`student_account_info`.`fee_id`  INNER JOIN  `running_student_info` ON  `running_student_info`.`student_id`= `student_account_info`.`studentID` WHERE `student_account_info`.`year`='".$_POST["year"]."' AND `add_fee`.`title`='Previous dues' AND `student_account_info`.`class_id`='".$fetch_class[0]."' AND `add_fee`.`fk_month_id` BETWEEN '01' AND '".$_POST["selectMonth"]."'";
	       // echo $sql;
	        $select=$db->link->query($sql);
	        $fetch_previous=$select->fetch_array();
	        print $fetch_previous[0];
	        $totalPre=$totalPre+$fetch_previous[0];
	        ?> </td>
	        
	              <td><?php
	        $sql="SELECT SUM(`add_fee`.`amount`) FROM `student_account_info` INNER JOIN `add_fee` ON `add_fee`.`id`=`student_account_info`.`fee_id`  INNER JOIN  `running_student_info` ON  `running_student_info`.`student_id`= `student_account_info`.`studentID` WHERE `student_account_info`.`year`='".$_POST["year"]."' AND `add_fee`.`Common_Exceptional`='Common' AND `student_account_info`.`class_id`='".$fetch_class[0]."' AND `add_fee`.`fk_month_id` BETWEEN '01' AND '".$_POST["selectMonth"]."'";
	     // echo  $sql;
	        $select=$db->link->query($sql);
	        $fetch_common=$select->fetch_array();
	        print $fetch_common[0];
	        $totalCommon+=$fetch_common[0];
	        
	        ?> </td>
	        <td>
	            <?php
	        $sql="SELECT SUM(`student_account_info`.`AmountExceptional`) FROM `student_account_info` INNER JOIN `add_fee` ON `add_fee`.`id`=`student_account_info`.`fee_id`  INNER JOIN  `running_student_info` ON  `running_student_info`.`student_id`= `student_account_info`.`studentID` WHERE `student_account_info`.`year`='".$_POST["year"]."' AND `add_fee`.`Common_Exceptional`='exceptional' AND `student_account_info`.`class_id`='".$fetch_class[0]."' AND `add_fee`.`fk_month_id` BETWEEN '01' AND '".$_POST["selectMonth"]."'";
	       
	        $select=$db->link->query($sql);
	        $fetch_exceptional=$select->fetch_array();
	         $exceptional=$fetch_exceptional[0]-$fetch_previous[0];
	         echo $exceptional;
	         $totalEx+=$exceptional;
	        ?>
	        
	        </td>
	   
	        
	        <td> <?= $total= $fetch_previous[0]+$fetch_common[0]+$exceptional; ?></td>
	        <td>
	             <?php
	        $sql="SELECT SUM(`add_discount`.`discount`) FROM `add_discount` 
INNER JOIN `add_fee` ON `add_fee`.`id`=`add_discount`.`feeid`
INNER JOIN  `running_student_info` ON  `running_student_info`.`student_id`=`add_discount`.`student_id`
WHERE `add_discount`.`year`='".$_POST["year"]."' AND `add_discount`.`class_id`='".$fetch_class[0]."' AND `add_fee`.`fk_month_id` BETWEEN '01' AND '".$_POST["selectMonth"]."'";
	       
	        $select=$db->link->query($sql);
	        $fetch_discount=$select->fetch_array();
	        
	         echo $fetch_discount[0];
	         $totalDiscount+=$fetch_discount[0];
	         
	         $totalAmount+=$total;
	        ?>
	        </td>
	        <td>  <?= $amount=$total-$fetch_discount[0] ?> </td>
	        <td>
	            
	    <?php
	        $sql="SELECT SUM(`student_paid_table`.`paid_amount`) FROM `student_paid_table`
INNER JOIN  `add_fee` ON `add_fee`.`id`=`student_paid_table`.`fk_fee_id`
INNER JOIN  `running_student_info` ON  `running_student_info`.`student_id`=`student_paid_table`.`student_id`
WHERE `student_paid_table`.`class_id`='".$fetch_class[0]."' AND `student_paid_table`.`year`='".$_POST["year"]."'";
	       
	        $select=$db->link->query($sql);
	        $fetch_paid=$select->fetch_array();
	        
	         echo $fetch_paid[0];
	          $totalPaid+=$fetch_paid[0];
	         $totalNetAmount=$totalNetAmount+$amount;
	       ?>
	        
	        </td>	       
	        
	        
	        <td>
	            
	    <?php
	    
	        $sql="SELECT SUM(`student_paid_table`.`paid_amount`) FROM `student_paid_table`
INNER JOIN  `add_fee` ON `add_fee`.`id`=`student_paid_table`.`fk_fee_id`
INNER JOIN  `running_student_info` ON  `running_student_info`.`student_id`=`student_paid_table`.`student_id`
WHERE `student_paid_table`.`class_id`='".$fetch_class[0]."' AND `student_paid_table`.`year`='".$_POST["year"]."' AND `add_fee`.`fk_month_id` BETWEEN '01' AND '".$_POST["selectMonth"]."'";
	        $select=$db->link->query($sql);
	        $fetch_running_paid=$select->fetch_array();
	        echo $fetch_running_paid[0];
	        $RunningPaid+=$fetch_running_paid[0];
	   ?>
	        
	        </td>
	        
	        
	        
	        
	        <td> <?php $due=$amount-$fetch_running_paid[0];
	            if($due>0)
	            {
	                echo $due;
	                 $totalDue+=$due;
	            }
	        ?> </td>
	        <!--<td> </td>-->
	    </tr>
	                        <?php
                                }
                                }
                                ?>
                                
                                <tr>
                                    <td colspan="2" align="right"> Total :</td>
                                    
                                    <td align="right"><?php print $totalPre;?></td>
                                    <td align="right"><?php print $totalCommon;?></td>
                                    <td align="right"><?php print $totalEx;?></td>
                                    <td align="right"><?php print $totalAmount;?></td>
                                    <td align="right"><?php print $totalDiscount;?></td>
                                    <td align="right"><?php print $totalNetAmount;?></td>
                                    <td align="right"><?php print $totalPaid;?></td>
                                    <td align="right"><?php print $RunningPaid;?></td>
                                    <td align="right"><?php print $totalDue;?></td>
                                    <!--<td align="right"><?php print $totalAdvance;?></td>-->
                               
                                </tr>    
                                
                                <tr>
                                    <td colspan="11" align="center"> <input type="button" value="Print" class="btn btn-success" onclick="window.print()"></td>
                                    
                                    
                               
                                </tr>
	</tbody>
	
	
	
	 </table>
		
     		 <?php 	
 }  
     ?>

  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
