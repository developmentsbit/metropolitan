 




<?php
@error_reporting(1);
session_start();
date_default_timezone_set("Asia/Dhaka");
  require_once("../db_connect/config.php");
  require_once("../db_connect/conect.php");
  $db = new database();
  
  require "barcode/vendor/autoload.php";
  $Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
  $code = $Bar->getBarcode($_GET["id"], $Bar::TYPE_CODE_128);

    $id =$_GET["id"];
    $classID =$_GET["class"];
    $date =$_GET["date"];
    
    $sql=$db->link->query("SELECT `reg_student_personal_info`.`student_name`,`reg_student_acadamic_information`.`admission_disir_class`,`add_class`.`class_name` FROM `reg_student_personal_info` INNER JOIN `reg_student_acadamic_information` ON `reg_student_acadamic_information`.`id`=`reg_student_personal_info`.`id` INNER JOIN `add_class` ON `add_class`.`id`=`reg_student_acadamic_information`.`admission_disir_class` WHERE `reg_student_personal_info`.`id`='".$_GET['id']."'");
$fetch=$sql->fetch_array();

?>



<style type="text/css">
<!--
.style2 {color: #333333;font-size:14px;font-family:Arial, Helvetica, sans-serif; padding-left:10px;}
.style3 {color: #333333;font-size:14px;font-family:Arial, Helvetica, sans-serif; padding-left:10px;}
.style5 {color: #000000;font-size:14px;font-family:Arial, Helvetica, sans-serif;text-decoration:overline;}
-->
li{list-style:none}
.style7 {color: #000033;font-weight:bold;font-size:12px;font-family:Arial, Helvetica, sans-serif}
.style8 {color: #000066;font-size:14px;font-family:Arial, Helvetica, sans-serif}
</style>


 	<style type="text/css">
		
		@media print{
			.print{
				display:none;
			}

			a[href]:after {
    content: none !important;
  }

	</style>

<div style="    width: 95%;margin: auto;">


    <table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
    <tr >
  <td height="60" align="center" style="border-bottom:1px solid #333333">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>
      <td style="border-bottom:1px solid #333333" height="60" colspan="4" align="center" >
    <ul style=" padding-top:5px">
    
    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    Al Helal Academy</li>
   <li><p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"> Main Road, Sonagazi, Feni.</p></li>
    <li style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif">01728563480, www.alhelalacademy.edu.bd</li>

      


     </ul>      </td>
<td style="border-bottom:1px solid #333333" width="220" align="center"> 
<?php print $code; ?> 
</div>
 &nbsp;</td>
    </tr>
    

    
     <tr>
        <td colspan="6" align="center"> 

<table width="100%">

    <tr>
        <td colspan="9" align="center">  <span class="style3" style="float: left; clear: right;"> Print Date & Time : <?php print date(" Y-m-d  h:i:sa")?></span> 
        <span class="style3" style="float: left; clear: right;">Expire Date: <?php echo $_GET['date'];?> </span> 
        <span class="style3" style="  font-weight: bold; float: right;"> [Bank Copy] </span> </td>
    </tr>


   <tr>
      <td width="50" height="27"><span class="style3"> Name </span></td>
      <td width="10" align="center">:</td>
      <td width="150" style="font-size:14px;font-family:Arial, Helvetica, sans-serif"> <?php print $fetch[0]?> </td>

      <td width="100" ><span class="style3"> Admission ID </span></td>
      <td align="center">:</td>
      <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;font-weight: bold;"><?php print $id; ?></td>

      <td width="117"><span class="style2">Class</span></td>
      <td width="16" align="center">:</td>
      <td width="77" style="font-size:14px;font-family:Arial, Helvetica, sans-serif">   <?php print $fetch[2]?>
          </td>
    </tr>



    <tr>
    

      <td height="20"><span class="style3">Bank</span></td>
      <td align="center">:</td>
      <td width="205" style="font-size:14px;font-family:Arial, Helvetica, sans-serif">Islami Bank BD. Ltd.</td>

        <td><span class="style2">Branch</span></td>
      <td align="center">:</td>
      <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif"> Sonagazi Bazar Upo Shaka </td>


      <td><span class="style2">A/C No.  </span></td>
      <td align="center"></td>
      <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif">20506300200009309</td>
    </tr>
      
</table>

         </td>
    </tr>




   

      <tr>
      <td  colspan="6">


    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333" style="border-top:1px solid #333333">


        <tr >
          <td  width="30"  align="center"  style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333; ">SL</td>

          <td width="300" colspan="4" align="left" style="border-bottom:1px solid #333333;border-right:1px solid #333333; text-align: left;">Fee Title </td>

          <td width="100"  align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Amount  &nbsp;</span></td>
           

       

          
        </tr>

        <tr>
          <td height="10" align="center" 
          style="  border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333">

          1 </td>

          <td align="left" colspan="4" style="border-bottom:1px solid #333333;border-right:1px solid #333333">ভর্তি ফি</td>
         
          <td align="right" colspan="3" style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

         

        </tr>
        <tr>
          <td height="10" align="center" 
          style="  border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333">

          2 </td>

          <td align="left" colspan="4" style="border-bottom:1px solid #333333;border-right:1px solid #333333">	সেশন ফি</td>
        
          <td align="right" colspan="3" style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

         

        </tr>
        <tr>
          <td height="10" align="center" 
          style="  border-left:1px solid #333333;border-bottom:1px solid #333333;border-right:1px solid #333333">

          3 </td>

          <td align="left" colspan="4" style="border-bottom:1px solid #333333;border-right:1px solid #333333">আইসিটি ফি </td>
          
          <td align="right" colspan="3" style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

         

        </tr>     
        
        <tr>
          <td height="10" align="center" 
          style="  border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333">

          4 </td>

          <td align="left" colspan="4" style="  border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333">টিউশন ফি - জানুয়ারি</td>

          <td align="right" colspan="3" style="border-bottom:1px solid #333333;border-right:1px solid #333333">
          <?php 
          
          if($fetch[1]=="311609230006" || $fetch[1]=="311609230007" )
            {
                 echo "";
            }
            else
            {
                 echo "";
            }
          
          ?>&nbsp; </td>

         

        </tr>
  
  

     <tr >
          
          <td  align="right" style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333" colspan="5"> Total Payable Amount &nbsp;</td>

       

           <td width="80" colspan="2" align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333;"  width="100"> 
           
              <?php 
          
          if($fetch[1]=="311609230006" || $fetch[1]=="311609230007" )
            {
               echo "";
            }
            else
            {
                 echo "";
            }
          
          ?>
          
          &nbsp;

           </td>
          
        </tr>

           <tr>
           <td  colspan="7" align="left" style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333; padding-left:10px;">(In word): 

           </td>
          
        </tr>



   

 



  <tr>
    <td colspan="8" valign="top">

<table width="100%" height="50">
  
  <tr>
      <td  valign="bottom" align="center">


    

      </td>
      <td valign="bottom">
          ..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">
        Depositor
        </p>
      </td>
      <td colspan="2" align="center" valign="bottom"><p style="margin-top:3px;"></p></td>
  <td valign="bottom" align="center"><p style="font-weight: bold;; font-size: 12px;">Developed By: SBIT (www.sbit.com.bd)</p></td>
      <td align="right" valign="bottom" style="">
      
<p style=" text-align:center;"> 

 

</p>

        
..................................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px;  text-align: center; ">

       Receiver
        </p>

         </td>
    </tr>
</table>
    
</td>
</tr>

    

</table>



<br>
<!--.................................................................................................................................-->

    <table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
    <tr >
  <td height="60" align="center" style="border-bottom:1px solid #333333">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>
      <td style="border-bottom:1px solid #333333" height="60" colspan="4" align="center" >
    <ul style=" padding-top:5px">
    
    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    Al Helal Academy</li>
   <li><p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"> Main Road, Sonagazi, Feni.</p></li>
    <li style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif">01728563480, www.alhelalacademy.edu.bd</li>

      


     </ul>      </td>
<td style="border-bottom:1px solid #333333" width="220" align="center"> 
<?php print $code; ?> <p>Student Roll :</p> 
</div>
 &nbsp;</td>
    </tr>
    

    
     <tr>
        <td colspan="6" align="center"> 

<table width="100%">

    <tr>
        <td colspan="9" align="center">  <span class="style3" style="float: left; clear: right;"> Print Date & Time : <?php print date(" Y-m-d  h:i:sa")?></span> 
        <span class="style3" style="float: left; clear: right;">Expire Date: <?php echo $_GET['date'];?> </span> 
        <span class="style3" style="  font-weight: bold; float: right;"> [School Copy] </span> </td>
    </tr>


   <tr>
      <td width="50" height="27"><span class="style3"> Name </span></td>
      <td width="10" align="center">:</td>
      <td width="150" style="font-size:14px;font-family:Arial, Helvetica, sans-serif"> <?php print $fetch[0]?> </td>

      <td width="100" ><span class="style3"> Admission ID </span></td>
      <td align="center">:</td>
      <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;font-weight: bold;"><?php print $id; ?></td>

      <td width="117"><span class="style2">Class</span></td>
      <td width="16" align="center">:</td>
      <td width="77" style="font-size:14px;font-family:Arial, Helvetica, sans-serif">   <?php print $fetch[2]?>
          </td>
    </tr>



    <tr>
    

      <td height="20"><span class="style3">Bank</span></td>
      <td align="center">:</td>
      <td width="205" style="font-size:14px;font-family:Arial, Helvetica, sans-serif">Islami Bank BD. Ltd.</td>

        <td><span class="style2">Branch</span></td>
      <td align="center">:</td>
      <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif"> Sonagazi Bazar Upo Shaka </td>


      <td><span class="style2">A/C No.  </span></td>
      <td align="center"></td>
      <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif">20506300200009309</td>
    </tr>
      
</table>

         </td>
    </tr>




   

      <tr>
      <td  colspan="6">


    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333" style="border-top:1px solid #333333">


        <tr >
          <td  width="30"  align="center"  style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333; ">SL</td>

          <td width="300" colspan="4" align="left" style="border-bottom:1px solid #333333;border-right:1px solid #333333; text-align: left;">Fee Title </td>

          <td width="100"  align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Amount  &nbsp;</span></td>
              

       

          
        </tr>

        <tr>
          <td height="10" align="center" 
          style="  border-left:1px solid #333333;border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333">

          1 </td>

          <td align="left" colspan="4" style="border-bottom:1px solid #333333;border-right:1px solid #333333">ভর্তি ফি</td>
         
          <td align="right" colspan="3" style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

         

        </tr>
        <tr>
          <td height="10" align="center" 
          style="  border-left:1px solid #333333;border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333">

          2 </td>

          <td align="left" colspan="4" style="border-bottom:1px solid #333333;border-right:1px solid #333333">	সেশন ফি</td>
        
          <td align="right" colspan="3" style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

         

        </tr>
        <tr>
          <td height="10" align="center" 
          style=" border-left:1px solid #333333; border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333">

          3 </td>

          <td align="left" colspan="4" style="border-bottom:1px solid #333333;border-right:1px solid #333333">আইসিটি ফি </td>
          
          <td align="right" colspan="3" style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

         

        </tr>     
        
        <tr>
          <td height="10" align="center" 
          style=" border-left:1px solid #333333; border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333">

          4 </td>

          <td align="left" colspan="4" style="border-bottom:1px solid #333333;border-right:1px solid #333333">টিউশন ফি - জানুয়ারি</td>

          <td align="right" colspan="3" style="border-bottom:1px solid #333333;border-right:1px solid #333333"> &nbsp; </td>

         

        </tr>
  
  

     <tr >
          
          <td  align="right" style="  border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333" colspan="5"> Total Payable Amount &nbsp;</td>

       

           <td width="80" colspan="2" align="right" style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333;"  width="100">  &nbsp;

           </td>
          
        </tr>

           <tr>
           <td  colspan="7" align="left" style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333; padding-left:10px;">(In word): &nbsp;

           </td>
          
        </tr>



   

 



  <tr>
    <td colspan="8" valign="top">

<table width="100%" height="50">
  
  <tr>
      <td  valign="bottom" align="center">


    

      </td>
      <td valign="bottom">
          ..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">
        Depositor
        </p>
      </td>
      <td colspan="2" align="center" valign="bottom"><p style="margin-top:3px;"></p></td>
  <td valign="bottom" align="center"><p style="font-weight: bold;; font-size: 12px;">Developed By: SBIT (www.sbit.com.bd)</p></td>
      <td align="right" valign="bottom" style="">
      
<p style=" text-align:center;"> 

 

</p>

        
..................................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px;  text-align: center; ">

       Receiver
        </p>

         </td>
    </tr>
</table>
    
</td>
</tr>

    

</table>

<br>
<!--.................................................................................................................................-->

    <table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
    <tr >
  <td height="60" align="center" style="border-bottom:1px solid #333333">

    <img src="all_image/logoSDMS2015.png" width="76" height="74"/>

  </td>
      <td style="border-bottom:1px solid #333333" height="60" colspan="4" align="center" >
    <ul style=" padding-top:5px">
    
    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
    Al Helal Academy</li>
   <li><p style="margin-top:-1px;font-size:16px;font-family:Arial, Helvetica, sans-serif"> Main Road, Sonagazi, Feni.</p></li>
    <li style="margin-top:-13px;font-size:14px;font-family:Arial, Helvetica, sans-serif">01728563480, www.alhelalacademy.edu.bd</li>

      


     </ul>      </td>
<td style="border-bottom:1px solid #333333" width="220" align="center"> 
<?php print $code; ?> <p>Student Roll :</p> 
</div>
 &nbsp;</td>
    </tr>
    

    
     <tr>
        <td colspan="6" align="center"> 

<table width="100%">

    <tr>
        <td colspan="9" align="center">  <span class="style3" style="float: left; clear: right;"> Print Date & Time : <?php print date(" Y-m-d  h:i:sa")?></span> 
        <span class="style3" style="float: left; clear: right;">Expire Date: <?php echo $_GET['date'];?> </span> 
        <span class="style3" style="  font-weight: bold; float: right;"> [Student Copy] </span> </td>
    </tr>


   <tr>
      <td width="50" height="27"><span class="style3"> Name </span></td>
      <td width="10" align="center">:</td>
      <td width="150" style="font-size:14px;font-family:Arial, Helvetica, sans-serif"> <?php print $fetch[0]?> </td>

      <td width="100" ><span class="style3"> Admission ID </span></td>
      <td align="center">:</td>
      <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;font-weight: bold;"><?php print $id; ?></td>

      <td width="117"><span class="style2">Class</span></td>
      <td width="16" align="center">:</td>
      <td width="77" style="font-size:14px;font-family:Arial, Helvetica, sans-serif">   <?php print $fetch[2]?>
          </td>
    </tr>



    <tr>
    

      <td height="20"><span class="style3">Bank</span></td>
      <td align="center">:</td>
      <td width="205" style="font-size:14px;font-family:Arial, Helvetica, sans-serif">Islami Bank BD. Ltd.</td>

        <td><span class="style2">Branch</span></td>
      <td align="center">:</td>
      <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif"> Sonagazi Bazar Upo Shaka </td>


      <td><span class="style2">A/C No.  </span></td>
      <td align="center"></td>
      <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif">20506300200009309</td>
    </tr>
      
</table>

         </td>
    </tr>




   

      <tr>
      <td  colspan="6">


    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333" style="border-top:1px solid #333333">


        <tr >
          <td  width="30"  align="center"  style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333; ">SL</td>

          <td width="300" colspan="4" align="left" style="border-bottom:1px solid #333333;border-right:1px solid #333333; text-align: left;">Fee Title </td>

          <td width="100" align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7">Amount  &nbsp;</span></td>
          

       

          
        </tr>

        <tr>
          <td height="10" align="center" 
          style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333">

          1 </td>

          <td align="left" colspan="4" style="border-bottom:1px solid #333333;border-right:1px solid #333333">ভর্তি ফি</td>
         
          <td align="right" colspan="3" style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

         

        </tr>
        <tr>
          <td height="10" align="center" 
          style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333">

          2 </td>

          <td align="left" colspan="4" style="border-bottom:1px solid #333333;border-right:1px solid #333333">	সেশন ফি</td>
        
          <td align="right" colspan="3" style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

         

        </tr>
        <tr>
          <td height="10" align="center" 
          style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333">

          3 </td>

          <td align="left" colspan="4" style="border-bottom:1px solid #333333;border-right:1px solid #333333">আইসিটি ফি </td>
          
          <td align="right" colspan="3" style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

         

        </tr>     
        
        <tr>
          <td height="10" align="center" 
          style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333">

          3 </td>

          <td align="left" colspan="4" style="border-bottom:1px solid #333333;border-right:1px solid #333333">টিউশন ফি - জানুয়ারি</td>

          <td align="right" colspan="3" style="border-bottom:1px solid #333333;border-right:1px solid #333333"> &nbsp; </td>

         

        </tr>
  
  

     <tr >
          
          <td  align="right" style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333" colspan="5"> Total Payable Amount &nbsp;</td>

       

           <td width="80" colspan="2" align="right" style="border-bottom:1px solid #333333;border-right:1px solid #333333;"  width="100">  &nbsp;

           </td>
          
        </tr>

           <tr>
           <td  colspan="7" align="left" style=" border-left:1px solid #333333; border-bottom:1px solid #333333;border-right:1px solid #333333; padding-left:10px;">(In word): &nbsp;

           </td>
          
        </tr>



   

 



  <tr>
    <td colspan="8" valign="top">

<table width="100%" height="50">
  
  <tr>
      <td  valign="bottom" align="center">


    

      </td>
      <td valign="bottom">
          ..................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:60px;">
        Depositor
        </p>
      </td>
      <td colspan="2" align="center" valign="bottom"><p style="margin-top:3px;"></p></td>
  <td valign="bottom" align="center"><p style="font-weight: bold;; font-size: 12px;">Developed By: SBIT (www.sbit.com.bd)</p></td>
      <td align="right" valign="bottom" style="">
      
<p style=" text-align:center;"> 

 

</p>

        
..................................................................
        <p style="font-size:14px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px;  text-align: center; ">

       Receiver
        </p>

         </td>
    </tr>
</table>
    
</td>
</tr>

    

</table>
  <center> 
    <input type="button" class="print" value="Print" name="Print" style="height: 30px; width: 150px; background: #ff0000; color: #fff;" onclick="window.print()" ></input>
  </center>

</div>
  

