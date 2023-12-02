<?php
  session_start();
  date_default_timezone_set("Asia/Dhaka");

  if($_SESSION["logstatus"] === "Active")
  { 
    require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");

    $db = new database();
 
    $sql="SELECT other_cost.`id`,`other_cost`.`date`,`income_expense_title`.`title`,`other_cost`.`description`,`other_cost`.`amount`,`other_cost`.`Entry_Date`,`address`,`receiver` FROM other_cost INNER JOIN `income_expense_title`
ON `income_expense_title`.`id`= other_cost.`title` WHERE `income_expense_title`.`type`='Expense' and  other_cost.`id`='".$_GET['id']."'";



    $query=$db->link->query($sql);
    if($query)
    {
      $fetchData=$query->fetch_array();
   
    }

  $projectinfo="SELECT * FROM project_info";
  $relproject=$db->select_query($projectinfo);
  if($relproject){
  $fetcproject=$relproject->fetch_array();
}

$i=1;


function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven',
        'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'
    );
    $list2 = array('', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninty', 'Hundred');
    $list3 = array('', 'Thousand', 'Million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion');

    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
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


      <table  width="1000"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
    <tr >
  <td height="50" align="center" style="border-bottom:1px solid #333333">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>

      <td style="border-bottom:1px solid #333333" height="50"  align="center" >
  
    
    <p style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    <?php print $fetcproject['institute_name'];?></p>

 <p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"> <?php print $fetcproject['location'];?>   </p>

    <p style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetcproject['phone_number'];?>,<?php print $fetcproject['email'];?></p>
         </td>

           <td height="50" width="200" align="center" style="border-bottom:1px solid #333333">

       <h5>Office Copy</h5>

  </td>
     </tr>

     <tr>
          <td colspan="3">
            <br>
              <table width="100%" class="table table-hover table-bordered"> 
   <tr>
                    <td width="20" align="center" colspan="5"><h4>Expense Voucher</h4></td>
                 
                  </tr>
                   <tr>
                    <td  align="center" colspan="5">
                          
                          <table class="table table-bordered">
                              <tr>
                                <td  style="width: 150px; height: 30px;"> Voucher No :</td>
                                <td align="left" style="width: 350px;"> <?php print $fetchData[0]?></td>
                                <td style="width: 150px;" >Date :</td>
                                <td ><?php print $fetchData['date']?></td>
                              </tr>
                              <tr>
                                <td> To :</td>
                                <td> <?php print $fetchData['receiver']?></td>
                                <td> Address</td>
                                <td> <?php print $fetchData['address']?></td>
                              </tr>
                          </table>
                    </td>
                 
                  </tr>


                  <tr>
                    
                    <td  align="center"  style="width: 100px;">Sl</td>
                    <td width="200" align="left">Title</td>
                    <td width="300" align="left" colspan="2">Details</td>
                    <td width="150" align="center">Amount</td>
                  </tr>

                 <tr>
                   
                    <td  align="center" style="height: 150px; vertical-align: center"><?php print $i; ?></td>
                    <td width="200" align="left"><?php print $fetchData[2];?></td>
                    <td width="200" align="left" colspan="2"><?php print $fetchData[3]; ?></td>
                    <td width="100" align="center"><?php print $fetchData['amount']?></td>
                  </tr>

                  <tr>
                    
                    <td  align="right" colspan="4"> <label  style="float: left;"> 
                      (In word): Tk. <?php 
              $tk=$db->my_money_format($fetchData['amount']);
              print convertNumberToWord($tk);
           ?> Only
           
                    </label>  <label> Total :</label> </td>
                    <td width="100" align="center"><?php print $fetchData['amount']?></td>
                  </tr>
                 


              </table>

          </td>

     </tr>

     </table>



<table width="1000" align="center">
  
  <tr>
      <td height="70" valign="bottom" align="center">


      </td>
      <td valign="bottom">
          ..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">

        Headmaster
        </p>
      </td>
        <td valign="bottom">
          ..........................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">

        Office Assistant
        </p>
      </td>

      <td align="right" valign="bottom" style="">
        <br>
        <br>
..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-right:60px; ">

        Receiver
        </p>

         </td>
    </tr>
</table>











<br>


      <table  width="1000"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
    <tr >
  <td height="50" align="center" style="border-bottom:1px solid #333333">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>

      <td style="border-bottom:1px solid #333333" height="50"  align="center" >
  
    
    <p style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    <?php print $fetcproject['institute_name'];?></p>

 <p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"> <?php print $fetcproject['location'];?>   </p>

    <p style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetcproject['phone_number'];?>,<?php print $fetcproject['email'];?></p>
         </td>

           <td height="50" width="200" align="center" style="border-bottom:1px solid #333333">

       <h5>Receiver Copy</h5>

  </td>
     </tr>

     <tr>
          <td colspan="3">
            <br>
              <table width="100%" class="table table-hover table-bordered"> 
   <tr>
                    <td width="20" align="center" colspan="5"><h4>Expense Voucher</h4></td>
                 
                  </tr>
                   <tr>
                    <td  align="center" colspan="5">
                          
                          <table class="table table-bordered">
                              <tr>
                                <td  style="width: 150px; height: 30px;"> Voucher No :</td>
                                <td align="left" style="width: 350px;"> <?php print $fetchData[0]?></td>
                                <td style="width: 150px;" >Date :</td>
                                <td ><?php print $fetchData['date']?></td>
                              </tr>
                              <tr>
                                <td> To :</td>
                                <td> <?php print $fetchData['receiver']?></td>
                                <td> Address</td>
                                <td> <?php print $fetchData['address']?></td>
                              </tr>
                          </table>
                    </td>
                 
                  </tr>


                  <tr>
                    
                    <td  align="center"  style="width: 100px;">Sl</td>
                    <td width="200" align="left">Title</td>
                    <td width="300" align="left" colspan="2">Details</td>
                    <td width="150" align="center">Amount</td>
                  </tr>

                 <tr>
                   
                    <td  align="center" style="height: 150px; vertical-align: center"><?php print $i; ?></td>
                    <td width="200" align="left"><?php print $fetchData[2];?></td>
                    <td width="200" align="left" colspan="2"><?php print $fetchData[3]; ?></td>
                    <td width="100" align="center"><?php print $fetchData['amount']?></td>
                  </tr>

                  <tr>
                    
                    <td  align="right" colspan="4"> <label  style="float: left;"> (In word): Tk. <?php 
              $tk=$db->my_money_format($fetchData['amount']);
              print convertNumberToWord($tk);
           ?> Only</label>  <label> Total :</label> </td>
                    <td width="100" align="center"><?php print $fetchData['amount']?></td>
                  </tr>
                 


              </table>

          </td>

     </tr>

     </table>



<table width="1000" align="center">
  
  <tr>
      <td height="70" valign="bottom" align="center">


      </td>
      <td valign="bottom">
          ..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">

        Headmaster
        </p>
      </td>
        <td valign="bottom">
          ..........................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">

        Office Assistant
        </p>
      </td>

      <td align="right" valign="bottom" style="">
        <br>
        <br>
..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-right:60px; ">

        Receiver
        </p>

         </td>
    </tr>
</table>






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


