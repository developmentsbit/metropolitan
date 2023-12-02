

<?php
    error_reporting(1);
    @session_start();
    if($_SESSION["logstatus"] === "Active")
    {
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();

   
        $query="SELECT * FROM `hand_in_cash` WHERE `date`='".$_GET['date']."'";
        $chek=$db->select_query($query);
        if($chek)
            {
                $fetch=$chek->fetch_array();
                
            }
    

     $projectinfo="SELECT * FROM project_info";
    $query=$db->select_query($projectinfo);
    if($query){
        $fetchinfo=$query->fetch_array();
    }


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Expense Voucher</title>

      <style>
  @media print{
      .print{
        display:none;
      }


    </style>
    </head>
    <br>
      <table  width="1000"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
     <tr>
  <td height="50" align="center" style="border-bottom:1px solid #333333">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>

      <td style="border-bottom:1px solid #333333" height="50"  align="center" >
  
    
    <p style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    <?php print $fetchinfo['institute_name']?></p>

 <p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php print $fetchinfo['location']?>  </p>

    <p style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetchinfo['phone_number']?> ,<?php print $fetchinfo['email']?>  </p>
         </td>

           <td height="50" width="76" align="center" style="border-bottom:1px solid #333333">

 

  </td>
     </tr>

     <tr>
          <td colspan="3">
            <br>
              <table width="100%" class="table table-hover table-bordered " style="border: 1px solid #000;  "> 

                 <tr>
                    <td width="20" align="center" colspan="2">
                        
                            <table class="table table-bordered">
                              <tr>
                                    <td colspan="4" align="center"><h2>Cash Close Report</h2></td>
                                   
                                </tr> 

                                <tr>
                                    <td>Date : <?php print $fetch['date']?></td>
                                    <td>Cash Close Duration :<?php print $fetch['CashCloseDuraton']?> </td>
                                      <td>Admin :<?php print $fetch['admin']?> </td>

                                    <td>Previous Cash Close Date: <?php print $fetch['cash_close_date']?> </td>
                                </tr> 
                        </table>

                    </td>
                    
                   
                  </tr>

                  <tr>
                    <td width="20" align="center">Collection</td>
                    <td width="20" align="center">Expense</td>
                   
                  </tr>

                 <tr>
                    <td width="20" align="center">
                        
                        <table class="table table-bordered">
                                <tr>
                                    <td>Previous Balance</td>
                                    <td>:</td>
                                    <td align="right"><?php print $fetch['previous_balance']?></td>
                                </tr> 

                                <tr>
                                    <td>Fees Collection</td>
                                    <td>:</td>
                                    <td align="right"><?php print $fetch['student_collection']?></td>
                                </tr>  
                                
                          
                                  <tr>
                                    <td>Other's collection </td>
                                    <td>:</td>
                                    <td align="right"><?php print $fetch['other_collection']?></td>
                                </tr>

                                  <tr>
                                    
                                    <td colspan="2" align="right"> Total Cash : </td>
                                    <td align="right"> <?php print $fetch['total_cash']?></td>
                                </tr>


                        </table>

                    </td>
                    <td width="50" align="center">
                          <table class="table table-bordered">
                                <tr>
                                    <td>Expences</td>
                                    <td>:</td>
                                    <td align="right"><?php print $fetch['expences']?></td>
                                </tr>  

                                <tr>
                                    <td>Others Expense</td>
                                    <td>:</td>
                                    <td align="right">0.00</td>
                                </tr> 

                             
                                
                               

                                  <tr>
                                    
                                    <td colspan="2" align="right"> Total Expense : </td>
                                    <td align="right"><?php print $fetch['TotalExpense']?></td>
                                </tr>


                        </table>

                    </td>
                    </tr>

                    <tr>
                        <td colspan="2">Bank Report</td>
                      
                    </tr>

                    <tr>
                       
                        <td>Deposit</td>
                         <td>Withdraw</td>
                    </tr>  

                     <tr>
                     <td align="right"><?php print $fetch['bank_deposit']?></td>
                        <td align="right"><?php print $fetch['bank_withdraw']?></td>
                        
                    </tr>

                    <tr>
                    <td colspan="2">
                        
                               <table class="table table-bordered">
                                     <tr>
                                        <td  colspan="2"><h4>Surplus   </h4></td>
                                       
                                       
                                   </tr>
                                   
                                   <tr>
                                        <td>Cash In Hand :  </td>
                                        <td align="right"><?php print $fetch['hend_in_cash']?></td>
                                       
                                   </tr> 

                                    <tr>
                                        <td>Side Note:  </td>
                                        <td align="right"><?php print $fetch['SiteNote']?></td>
                                       
                                   </tr>
                                    <tr>
                                        <td>   Cash at Bank<br> Bank Balance: <?php print $fetch['BankBalanceDetails']?> </td>
                                        <td align="right"><?php print $fetch['TotalBankBalance']?></td>
                                       
                                   </tr>
                                      <tr>
                                        <td align="right">Total : </td>
                                        <td align="right"><?php print $fetch['TotalBankBalance']+$fetch['hend_in_cash']+$fetch['SiteNote']?></td>
                                       
                                   </tr>

                               </table>
                               
                               
                               </td>

                    </tr>
                    <tr>
                        <td colspan="2">Comments: <?php print $fetch['comment'];?></td>
                    </tr>


              </table>

          </td>

     </tr>

     </table>


<br>

<table width="1000" align="center">
  
  <tr>
      <td height="70" valign="bottom" align="center">


    

      </td>
      <td valign="bottom">
          ..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">

        Admin
        </p>
      </td>
      <td colspan="2" align="center" valign="bottom"><p style="margin-top:3px;"></p></td>
  <td valign="bottom" align="center"><p style="font-weight: bold;; font-size: 12px;">Developed By: SBIT (www.sbit.com.bd)</p></td>
      <td align="right" valign="bottom" style="">
        <br>
        <br>
..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-right:60px; ">

        Headmaster
        </p>

         </td>
    </tr>
</table>
<br>
<center> 
<input type="button" name="print" value="Print" class="print" style="height: 30px; width: 150px; background: GREEN; color: #fff; border: 0px;" 
onclick="window.print()">
</center>
       
    <body>
      
    </body>
    </html>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>


