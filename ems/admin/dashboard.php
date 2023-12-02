


<?php
    error_reporting(1);
	  @session_start();
	  date_default_timezone_set("Asia/Dhaka");
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();
?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
      <?php
      $selectTeacherstaff = "SELECT COUNT(*) AS 'Total' FROM `teachers_information` where `Type`='Teacher'";
			$r=$db->select_query($selectTeacherstaff);
			if($r)
			{
						$fetchTeacher=$r->fetch_array();
						print $fetchTeacher['Total'];
			}
			?>
                <sup style="font-size: 20px"></sup></h3>

                <p>Total Teacher's</p>
              
              </div>
              <div class="icon">
                <i class="ion ion-person-add">
              
                </i>
              </div>
              <a href="ViewReportTeacherInfo.php" target="_blank" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
      <div class="small-box bg-warning">
          <div class="inner">
            <h3>
      <?php
        $selectTeacherstaff = "SELECT COUNT(*) AS 'Total' FROM `teachers_information` where `Type`='Stuff'";
			  $r = $db->select_query($selectTeacherstaff);
				if($r)
					{
						$fetchTeacher=$r->fetch_array();
						print $fetchTeacher['Total'];
					}
			 ?>
        </h3>
                <p>Total Staff's</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="ViewStaffReport.php" target="_blank" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                	
          <?php
                	$selectTeacherstaff = "SELECT COUNT(*) AS 'Total' FROM `running_student_info` WHERE `year`='".date('Y')."'";
                //	echo 	$selectTeacherstaff;
					$r = $db->select_query($selectTeacherstaff);
					if($r)
					{
						$fetchTeacher=$r->fetch_array();
						print $fetchTeacher['Total'];
					}
                ?>
                </h3>

                <p>Total Student's</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="viewStudentInfoReport.php" target="_blank" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>70%</h3>

                <p>Student's Attendance</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

       

        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            	<?php
            if($_SESSION["type"]=="Main Admin")
            {?>

        		<div class="col-md-12">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

             <div class="info-box-content">
                <span class="info-box-text"> Std Fees Collection

                </span>
                <span class="info-box-number">
                	
                	<?php
                		
							$studentCollection="SELECT SUM(`paid_amount`) FROM `student_paid_table`
							WHERE `defult_Date`='".date("Y-m-d")."'";
							
							
							$StudentCollectionQuery=$db->select_query($studentCollection);
							if($StudentCollectionQuery)
							{
							      $StudentCollectionAmount=$StudentCollectionQuery->fetch_array();

							      if($StudentCollectionAmount[0]>0)
							      print $StudentCollectionAmount[0].'.00';
							  else
							  	print '0.00';
							}
							

                	?>
                </span>
              </div>

                <div class="info-box-content">
                <span class="info-box-text"> Others Income

                </span>
                <span class="info-box-number">
                	
                	<?php
                			$OthersIncome="SELECT SUM(`amount`) FROM `other_income`
							WHERE `EntryDate`='".date("Y-m-d")."'";
							$selectOthersIncome=$db->select_query($OthersIncome);
							if($selectOthersIncome)
							{
							      $fetchOthersIncome=$selectOthersIncome->fetch_array();
							      if($fetchOthersIncome[0]>0)
							      print $fetchOthersIncome[0];
							  else
							  	print '0.00';


							}
                	?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bank Withdraw

</span>
                <span class="info-box-number"><?php
                	
                	$bankWithdraw="SELECT SUM(`amount`) FROM `bank_transaction` WHERE `EntryDate`= '".date("Y-m-d")."'  AND  `transaction_type`='Withdraw'";

                	
					
					$selectbankWithdraw=$db->select_query($bankWithdraw);
					if($selectbankWithdraw)
					{
					      $fetchbankWithdraw=$selectbankWithdraw->fetch_array();
					         if(abs($fetchbankWithdraw[0])>0)
							      print abs($fetchbankWithdraw[0]).'.00';
							  else
							  	print '0.00';

					}

                ?></span>
              </div>

               <div class="info-box-content">
                <span class="info-box-text">Total Cash

</span>
                <span class="info-box-number"><?php
                		$totalCollection=$StudentCollectionAmount[0]+$fetchOthersIncome[0]+abs($fetchbankWithdraw[0]);
                		print $totalCollection.'.00';

                ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Expense + Bank Deposit </span>
                <span class="info-box-number"><?php

						$expense="SELECT SUM(`amount`) FROM `other_cost`
						WHERE `Entry_Date`='".date("Y-m-d")."'";
						
						$selectexpense=$db->select_query($expense);
						if($selectexpense)
						{
						      $fetchExpense=$selectexpense->fetch_array();
						      if($fetchExpense[0]>0)
						      {

							      print abs($fetchExpense[0]);
						      }
							  else
							  {
							  	$fetchExpense[0]=0;
							  	print '0.00';
							  }
							  
						}



					$bankdiposit="SELECT SUM(`amount`) FROM `bank_transaction` WHERE `EntryDate` ='".date("Y-m-d")."'  AND  `transaction_type`='Deposit'";

					$selectbankdiposit=$db->select_query($bankdiposit);
					if($selectbankdiposit)
					{
					      $fetchbankdiposit=$selectbankdiposit->fetch_array();
					       if($fetchbankdiposit[0]>0)
						      {

							      print '+'.$fetchbankdiposit[0];
						      }
							  else
							  {
							  	$fetchbankdiposit[0]=0;
							  	print '+ 0.00 =';
							  }

					}

					$totalExpense=$fetchExpense[0]+$fetchbankdiposit[0];
					
					if($totalExpense>0)
						      {

							      print '='.$totalExpense.'.00';
						      }
							  else
							  {
							  	$totalExpense=0;
							  	print '0.00';
							  }

                ?></span>
              </div>    

                <div class="info-box-content">
                <span class="info-box-text">Today Cash in Hand</span>
                <span class="info-box-number"><?php
                print $totalCollection-$totalExpense.'.00';
                ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          
          </div>


            <?php
        }
            else
            {

			

         ?>


          <div class="col-md-12">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

             <div class="info-box-content">
                <span class="info-box-text"> Std Fees Collection

                </span>
                <span class="info-box-number">0.00</span>
              </div>

                <div class="info-box-content">
                <span class="info-box-text"> Others Income

                </span>
                <span class="info-box-number">0.00</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bank Withdraw

</span>
                <span class="info-box-number">0.00</span>
              </div>

               <div class="info-box-content">
                <span class="info-box-text">Total Collection

</span>
                <span class="info-box-number">0.00</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bank Deposit + Expense </span>
                <span class="info-box-number">0.00</span>
              </div>    

                <div class="info-box-content">
                <span class="info-box-text">Today Cash in Hand</span>
                <span class="info-box-number">0.00</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          
          </div>
<?php
}
?>
            
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
            <!--/.direct-chat -->

            <!-- TO DO List -->
          
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">



            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu float-right" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- Map card -->
            <div class="d-lg-none d-md-none d-sm-none d-xl-none   ">
             
             
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white"></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white"></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white"></div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
           
       <!--    /////////////////////////////////////////////////////////////////////// -->
    
    <!-- /.content -->
   <!--    /////////////////////////////////////////////////////////////////////// -->

            <!-- /.card -->

            <!-- Calendar -->
            
            <!-- /.card -->
          </section>

          </div>

 <div class="row">
          <div class="col-12 sm-12 md-12">
        
                    <section class="content">
      <div class="container-fluid">

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default   ">
          <div class="card-header bg-secondary">
            <h3 class="card-title ">Accounts Section</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
            

        
          <div class="row">
      <!--         ///////////////////////////// Menu////////////////// -->
      <?php  
            if($_SESSION["id"]=="306" ){
              
              $select_sub_link="SELECT * FROM  `sub_link_info` WHERE `Main_Link`='Main_Link-003' and `show`='1' ORDER BY `Sl_No` ASC ";
            }else{
              
     
 $select_sub_link="SELECT `sublinkpeority`.*,`sub_link_info`.`Sub_Link_Name`,`Sub_Page_Name`,`Sub_Link_Id`,`Sub_Page_Name`,`linktype`,`Sub_Page_Name`,`fafaIcon` FROM `sublinkpeority`
INNER JOIN `sub_link_info` ON `sub_link_info`.`Sub_Link_Id`=`sublinkpeority`.`sublinkId` WHERE 
`sublinkpeority`.`AdminId`='".$_SESSION["id"]."' AND `sub_link_info`.`Main_Link`='Main_Link-003' GROUP BY `sub_link_info`.`Sub_Link_Id` ORDER BY `sub_link_info`.`Sl_No` ASC";

            }
            
            $chek_Sub_link=$db->select_query($select_sub_link);
            if($chek_Sub_link)
            {
              $color=0;
            while($fetch_sub_link=$chek_Sub_link->fetch_array()){

               $x=$fetch_sub_link['Sub_Page_Name'];
                $y="Main_Link-003";
                $z=$fetch_sub_link['Sub_Link_Id'];
$color++;

if($color==1)
{
  $bgcolor="bg-info";
}
else if($color==2)
{
  $bgcolor="bg-success";
}
  else if($color==3)
{
  $bgcolor="bg-warning";
}
  else if($color==4)
{
  $bgcolor="bg-danger";

}  else if($color==5)
{
  $bgcolor="bg-primary";
  
}  
else if($color==6)
{
  $bgcolor="bg-secondary";
  $color=0;
}
              ?>

               <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon <?php print $bgcolor;?> elevation-1"><i class="<?php echo $fetch_sub_link["fafaIcon"];?>"></i></span>

              <div class="info-box-content">
              <?php
              if($fetch_sub_link['linktype']=="Iframe")
              {
                ?>
                   <a href="<?php print $fetch_sub_link['Sub_Page_Name']; ?>" class="nav-link" id="<?php print $z;?>" target="ifrm" onclick="return showifram('<?php print $y;?>','<?php print $z;?>')">  <span class="info-box-text"><?php echo $fetch_sub_link["Sub_Link_Name"];?></span></a>

              <?php
              }
               else if($fetch_sub_link['linktype']=="New Tab")
              {?>

                         <a href="<?php print $fetch_sub_link['Sub_Page_Name'];?>" class="nav-link" id="<?php print $z;?>" target="_blank">  <span class="info-box-text"><?php echo $fetch_sub_link["Sub_Link_Name"];?></span></a>



             <?php  }
              ?>
        
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>  
            <?php
          }
        }
        ?>
        </div>

           
            <!-- /.row -->
          </div>
        
        </div>
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
<?php 
   
          if($_SESSION["id"]=="306"){
            
            $select_main_link="SELECT * FROM `main_link_info`  WHERE `DashBoard`='1' ORDER BY `SLNO` ASC";
          }
          else{

            $select_main_link="SELECT `main_link_piority`.*,`main_link_info`.`Main_Link_Name`,`Page_Name`,`type`,`fafaIcon` FROM `main_link_info` 
INNER JOIN `main_link_piority` ON `main_link_piority`.`Main_Link_id`=`main_link_info`.`Main_Link_Id`
WHERE `main_link_piority`.`adminId`='".$_SESSION["id"]."' AND  `main_link_info`.`DashBoard`='1' ORDER BY `main_link_info`.`SLNO` ASC ";
          }

      $c=0;
          $chek_main_link=$db->select_query($select_main_link);
          if($chek_main_link){
          while($fetch_main_link=$chek_main_link->fetch_array()){
          	if($fetch_main_link[1]=='Main_Link-003' || $fetch_main_link[1]=='Main_Link-015')
          	 	continue;

          if($fetch_main_link["Page_Name"] =='#')
          {
          
          
    $c++;

if($c==1)
{
  $bg="bg-info";
}
else if($c==2)
{
  $bg="bg-primary";
}
  else if($c==3)
{
  $bg="bg-info";
}
  else if($c==4)
{
  $bg="bg-secondary";

}  else if($c==5)
{
  $bg="bg-primary";

}  
else if($c==6)
{
  $bg="bg-secondary";
  $c=0;
}
          
      ?>




        <div class="card card-default collapsed-card">
          <div class="card-header <?php print $bg?>">
          <h3 class="card-title"><?php  echo $fetch_main_link["Main_Link_Name"];?></h3>

            <div class="card-tools " >
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
      <!--         ///////////////////////////// Menu////////////////// -->
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
              $color=0;
            while($fetch_sub_link=$chek_Sub_link->fetch_array()){

               $x=$fetch_sub_link['Sub_Page_Name'];
                $y=$fetch_main_link[1];
                $z=$fetch_sub_link['Sub_Link_Id'];
$color++;

if($color==1)
{
  $bgcolor="bg-info";
}
else if($color==2)
{
  $bgcolor="bg-success";
}
  else if($color==3)
{
  $bgcolor="bg-warning";
}
  else if($color==4)
{
  $bgcolor="bg-danger";

}  else if($color==5)
{
  $bgcolor="bg-primary";
  
}  
else if($color==6)
{
  $bgcolor="bg-secondary";
  $color=0;
}
              ?>

               <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon <?php print $bgcolor;?> elevation-1"><i class="<?php echo $fetch_sub_link["fafaIcon"];?>"></i></span>

              <div class="info-box-content">
              <?php
              if($fetch_sub_link['linktype']=="Iframe")
              {
                ?>
                   <a href="<?php print $fetch_sub_link['Sub_Page_Name']; ?>" class="nav-link" id="<?php print $z;?>" target="ifrm" onclick="return showifram('<?php print $y;?>','<?php print $z;?>')">  <span class="info-box-text"><?php echo $fetch_sub_link["Sub_Link_Name"];?></span></a>

              <?php
              }
               else if($fetch_sub_link['linktype']=="New Tab")
              {?>

                         <a href="<?php print $fetch_sub_link['Sub_Page_Name'];?>" class="nav-link" id="<?php print $z;?>" target="_blank">  <span class="info-box-text"><?php echo $fetch_sub_link["Sub_Link_Name"];?></span></a>



             <?php  }
              ?>
        
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>  
            <?php
          }
        }
        ?>
        </div>
            <!--   /////////////////////////////End Menu///////////////// -->
          </div>
        
        </div>
        <!-- /.card -->
<?php
  }

  }
}
?>


        <!-- <div class="card card-default collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Quick Link3</h3>

            <div class="card-tools ">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">

              <i class="fas fa-plus"></i></button>

              <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-remove"></i>
              </button>
            </div>
          </div>

          
          <div class="card-body">
            
        
          </div>
          
          <div class="card-footer">
            Visit Result Processing
          </div>
        </div> -->
       

        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


          <!-- /.col -->
        </div>
        </div>
          <!-- right col -->
        
        <!-- /.row (main row) -->
  