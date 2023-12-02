<?php
@session_start();

require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();
if(isset($_GET["id"]))
{
    
    $date=$_GET['date'];
    $id=$_GET['id'];
    
    $sql=$db->link->query("SELECT `running_student_info`.`class_roll`,`student_personal_info`.`student_name`,`add_class`.`class_name`  FROM `running_student_info`
INNER JOIN `student_personal_info` ON `student_personal_info`.`id`=`running_student_info`.`student_id`
INNER JOIN `add_class` ON `add_class`.`id`=`running_student_info`.`class_id`
 WHERE `running_student_info`.`student_id`='$id' ");
    
    if($sql->num_rows>0)
    {
        $fetch=$sql->fetch_array();
    }
   
    
}


?>




<style type="text/css">
<!--
.style2 {color: #333333;font-size:11px;font-family:Arial, Helvetica, sans-serif; padding-left:10px;}
.style3 {color: #333333;font-size:11px;font-family:Arial, Helvetica, sans-serif; padding-left:10px;}
.style5 {color: #000000;font-size:11px;font-family:Arial, Helvetica, sans-serif;text-decoration:overline;}
-->
li{list-style:none}
.style7 {color: #000033;font-weight:bold;font-size:11px;font-family:Arial, Helvetica, sans-serif}
.style8 {color: #000066;font-size:11px;font-family:Arial, Helvetica, sans-serif}
</style>


 
   <style type="text/css">
		
		@media print{
			.print{
				display:none;
			}
			.notPrint{
				display:none;
			}
}

    @media printt
    {
        a[href]:after {
        		content: none !important;
         }
    }

</style>

<div style="width: 1100px; height: auto; background: #fff;">
    
<div style="height: 100%; width: 350px; background: #fff; float: left; clear: right; "> 

<table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
    <tr>
            <td  align="center" style="border-bottom:1px solid #333333;" width="50">
                    <img src="all_image/logoSDMS2015.png" style="height:70px; width:70px;"/>
            </td>
            <td style="border-bottom:1px solid #333333" align="center" >
                <ul style=" padding-top:5px">
                    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
                    Al Helal Academy</li>
                    <li><p style="margin-top:-1px;font-size:11px;font-family:Arial, Helvetica, sans-serif"> Main Road, Sonagazi, Feni.    </p></li>
                    <li style="margin-top:-13px;font-size:11px;font-family:Arial, Helvetica, sans-serif">01728563480, www.alhelalacademy.edu.bd</li>
                   <p style="width:50px; font-size:8px"> <div style="font-size:0;position:relative;width:202px;height:30px;">
<div style="background-color:black;width:4px;height:30px;position:absolute;left:0px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:6px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:12px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:22px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:30px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:36px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:44px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:50px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:58px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:66px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:74px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:80px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:88px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:98px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:106px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:110px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:114px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:122px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:132px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:142px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:146px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:154px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:160px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:170px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:176px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:186px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:194px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:198px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:0px;height:30px;position:absolute;left:202px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:0px;height:30px;position:absolute;left:202px;top:0px;">&nbsp;</div>
</div>
</p> 
                    
                 </ul>      
            </td>
            
              <td  align="center" style="border-bottom:1px solid #333333; text-align:center; font-size:10px; padding-left:20px;" width="150" >
                  
            </td>
    </tr>
    </table>
    
  <table  width="350"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
                <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Deposit  Date : .........................</span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> [Bank Copy] </span> 
                    </td>
                </tr>
               
                
                
                 <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Bank: Islami Bank Bd Ltd.</span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> Branch: Sonagazi Bazar Upo Shakha </span> 
                         
                    </td>
                </tr>
                
                         
                 <tr>
                    <td colspan="9" align="center" height="15">  
                      
                      
                 <span class="style3" style="float: left; clear: right;">A/C :20506300200009309</span>  
                          <span class="style3" style=" float: right;">Printing Date:  <?php print date('d-m-Y')?> </span> 
                    </td>
                </tr>
                
               
                
               <tr>
                  <td height="15" width="89"><span class="style3">Invoise Date </span></td>
                  <td width="9" align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php print $date; ?></td>
                  <td ><span class="style3">ID</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif;font-weight: bold;" colspan="4"><?php print $id; ?></td>
                </tr>
                    <tr>
                  <td height="15" ><span class="style3">Name</span></td>
                  <td align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch[1]; ?></td>
            
                <td><span class="style2">Class</span></td>
                <td align="center">:</td>
                <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch[2]; ?></td>
                <td><span class="style2">Roll</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch[0]; ?></td>
                </tr>
                
        
                
            </table>
     
    <table width="350" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333" style="border-top:1px solid #333333; font-size:12px;">
            <tr>
              <td  width="10" height="35"  align="center"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; ">SL</td>
              <td width="100" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333" colspan="4">Fee Title </td>
             
              <td width="80" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7"> Paid</span></td>
            </tr>

      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          1 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Previous Dues </td>
      
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          2 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Session Fee </td>

          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
              <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          4 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;ICT Fee - </td>
         
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          3 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Examination Fee -  </td>
         
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
        
      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          4 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Tution Fee- </td>
         
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          5 </td>
  <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Tution Fee- </td>
         
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
  
  

    <tr>
          <td height="35"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;" colspan="5" align="right">

          Total : </td>
          <td style="border-bottom:1px solid #333333;border-right:1px solid #333333;" align="right"></td>
  </tr>

           <tr>
           <td  colspan="6" height="35" align="left" style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; padding-left:10px;">(In word):  &nbsp;

           </td>
          
        </tr>



    </table>
<table  width="350"  border="0" align="left" cellpadding="0" cellspacing="0">
 <td valign="bottom">
          .......................
        <p style="font-size:11px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:20px;">

        Student
        </p>
      </td>

      <td align="right" valign="bottom" style="font-size:13px;">
        
   <br>
        
         <br>

..........................
        <p style="font-size:11px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px;  text-align: right; padding-right:20px; ">

       Receiver
        </p>

         </td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="font-size:13px;"> Developed by : SBIT </td>
    </tr>
</table>



  

</div>
<!--.....................................................................................................School ...................................................-->


<div style="height: 100%;  width: 345px; background: #fff; float: left; clear: right; padding:0px 25px 0px 30px;  "> 


<table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
    <tr>
            <td  align="center" style="border-bottom:1px solid #333333;" width="50">
                    <img src="all_image/logoSDMS2015.png" style="height:70px; width:70px;"/>
            </td>
            <td style="border-bottom:1px solid #333333" align="center" >
                <ul style=" padding-top:5px">
                    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
                    Al Helal Academy</li>
                    <li><p style="margin-top:-1px;font-size:11px;font-family:Arial, Helvetica, sans-serif"> Main Road, Sonagazi, Feni.    </p></li>
                    <li style="margin-top:-13px;font-size:11px;font-family:Arial, Helvetica, sans-serif">01728563480, www.alhelalacademy.edu.bd</li>
                   <p style="width:50px; font-size:8px"> <div style="font-size:0;position:relative;width:202px;height:30px;">
<div style="background-color:black;width:4px;height:30px;position:absolute;left:0px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:6px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:12px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:22px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:30px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:36px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:44px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:50px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:58px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:66px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:74px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:80px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:88px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:98px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:106px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:110px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:114px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:122px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:132px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:142px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:146px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:154px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:160px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:170px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:176px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:186px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:194px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:198px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:0px;height:30px;position:absolute;left:202px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:0px;height:30px;position:absolute;left:202px;top:0px;">&nbsp;</div>
</div>
</p> 
                    
                 </ul>      
            </td>
            
              <td  align="center" style="border-bottom:1px solid #333333; text-align:center; font-size:10px; padding-left:20px;" width="150" >
                  
            </td>
    </tr>
    </table>
    
  <table  width="350"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
                <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Deposit  Date : .........................</span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> [School Copy] </span> 
                    </td>
                </tr>
               
                
                
                 <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Bank: Islami Bank Bd Ltd.</span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> Branch: Sonagazi Bazar Upo Shakha </span> 
                         
                    </td>
                </tr>
                
                         
                 <tr>
                    <td colspan="9" align="center" height="15">  
                      
                      
                 <span class="style3" style="float: left; clear: right;">A/C :20506300200009309</span>  
                          <span class="style3" style=" float: right;">Printing Date:  <?php print date('d-m-Y')?> </span> 
                    </td>
                </tr>
                
               
                
               <tr>
                  <td height="15" width="89"><span class="style3">Invoise Date </span></td>
                  <td width="9" align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php print $date; ?></td>
                  <td ><span class="style3">ID</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif;font-weight: bold;" colspan="4"><?php print $id; ?></td>
                </tr>
                    <tr>
                  <td height="15" ><span class="style3">Name</span></td>
                  <td align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch[1]; ?></td>
            
                <td><span class="style2">Class</span></td>
                <td align="center">:</td>
                <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch[2]; ?></td>
                <td><span class="style2">Roll</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch[0]; ?></td>
                </tr>
                
        
                
            </table>
     
    <table width="350" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333" style="border-top:1px solid #333333; font-size:12px;">
            <tr>
              <td  width="10" height="35"  align="center"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; ">SL</td>
              <td width="100" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333" colspan="4">Fee Title </td>
             
              <td width="80" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7"> Paid</span></td>
            </tr>

      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          1 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Previous Dues </td>
      
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          2 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Session Fee </td>

          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
              <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          4 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;ICT Fee - </td>
         
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          3 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Examination Fee -  </td>
         
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
        
      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          4 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Tution Fee- </td>
         
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          5 </td>
  <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Tution Fee- </td>
         
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
  
  

    <tr>
          <td height="35"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;" colspan="5" align="right">

          Total : </td>
          <td style="border-bottom:1px solid #333333;border-right:1px solid #333333;" align="right"></td>
  </tr>

           <tr>
           <td  colspan="6" height="35" align="left" style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; padding-left:10px;">(In word):  &nbsp;

           </td>
          
        </tr>



    </table>
<table  width="350"  border="0" align="left" cellpadding="0" cellspacing="0">
 <td valign="bottom">
          .......................
        <p style="font-size:11px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:20px;">

        Student
        </p>
      </td>

      <td align="right" valign="bottom" style="font-size:13px;">
        
   <br>
        
         <br>

..........................
        <p style="font-size:11px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px;  text-align: right; padding-right:20px; ">

       Receiver
        </p>

         </td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="font-size:13px;"> Developed by : SBIT </td>
    </tr>
</table>



  </div>
<!--.....................................................................................................Student Copy...................................................-->

<div style="height: 100%;  width: 340px; background: #fff; float: right;  "> 




<table  width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
    <tr>
            <td  align="center" style="border-bottom:1px solid #333333;" width="50">
                    <img src="all_image/logoSDMS2015.png" style="height:70px; width:70px;"/>
            </td>
            <td style="border-bottom:1px solid #333333" align="center" >
                <ul style=" padding-top:5px">
                    <li style="color:#000000;font-family:microsoft-sun-serif;  font-size:26px;">
                    Al Helal Academy</li>
                    <li><p style="margin-top:-1px;font-size:11px;font-family:Arial, Helvetica, sans-serif"> Main Road, Sonagazi, Feni.    </p></li>
                    <li style="margin-top:-13px;font-size:11px;font-family:Arial, Helvetica, sans-serif">01728563480, www.alhelalacademy.edu.bd</li>
                   <p style="width:50px; font-size:8px"> <div style="font-size:0;position:relative;width:202px;height:30px;">
<div style="background-color:black;width:4px;height:30px;position:absolute;left:0px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:6px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:12px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:22px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:30px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:36px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:44px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:50px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:58px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:66px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:74px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:80px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:88px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:98px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:106px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:110px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:114px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:122px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:132px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:142px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:146px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:154px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:160px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:170px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:176px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:6px;height:30px;position:absolute;left:186px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:2px;height:30px;position:absolute;left:194px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:4px;height:30px;position:absolute;left:198px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:0px;height:30px;position:absolute;left:202px;top:0px;">&nbsp;</div>
<div style="background-color:black;width:0px;height:30px;position:absolute;left:202px;top:0px;">&nbsp;</div>
</div>
</p> 
                    
                 </ul>      
            </td>
            
              <td  align="center" style="border-bottom:1px solid #333333; text-align:center; font-size:10px; padding-left:20px;" width="150" >
                  
            </td>
    </tr>
    </table>
    
  <table  width="350"  border="0" align="left" cellpadding="0" cellspacing="0" height="100">
                <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Deposit  Date : .........................</span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> [Student Copy] </span> 
                    </td>
                </tr>
               
                
                
                 <tr>
                    <td colspan="9" align="center" height="15">  
                        <span class="style3" style="float: left; clear: right;"> Bank: Islami Bank Bd Ltd.</span>  
                        <span class="style3" style="  font-weight: bold; float: right;"> Branch: Sonagazi Bazar Upo Shakha </span> 
                         
                    </td>
                </tr>
                
                         
                 <tr>
                    <td colspan="9" align="center" height="15">  
                      
                      
                 <span class="style3" style="float: left; clear: right;">A/C :20506300200009309</span>  
                          <span class="style3" style=" float: right;">Printing Date:  <?php print date('d-m-Y')?> </span> 
                    </td>
                </tr>
                
               
                
               <tr>
                  <td height="15" width="89"><span class="style3">Invoise Date </span></td>
                  <td width="9" align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php print $date; ?></td>
                  <td ><span class="style3">ID</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif;font-weight: bold;" colspan="4"><?php print $id; ?></td>
                </tr>
                    <tr>
                  <td height="15" ><span class="style3">Name</span></td>
                  <td align="center">:</td>
                  <td width="205" style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch[1]; ?></td>
            
                <td><span class="style2">Class</span></td>
                <td align="center">:</td>
                <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch[2]; ?></td>
                <td><span class="style2">Roll</span></td>
                  <td align="center">:</td>
                  <td style="font-size:11px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch[0]; ?></td>
                </tr>
                
        
                
            </table>
     
    <table width="350" border="0" cellpadding="0" cellspacing="0" bordercolor="#333333" style="border-top:1px solid #333333; font-size:12px;">
            <tr>
              <td  width="10" height="35"  align="center"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; ">SL</td>
              <td width="100" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333" colspan="4">Fee Title </td>
             
              <td width="80" align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333"><span class="style7"> Paid</span></td>
            </tr>

      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          1 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Previous Dues </td>
      
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          2 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Session Fee </td>

          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
              <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          4 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;ICT Fee - </td>
         
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          3 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Examination Fee -  </td>
         
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
        
      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          4 </td>

         <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Tution Fee- </td>
         
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
      <tr>
          <td height="35" align="center" 
          style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;">

          5 </td>
  <td align="center" style="border-bottom:1px solid #333333;border-right:1px solid #333333; font-size:12px; text-align:left;" colspan="4"> &nbsp;Tution Fee- </td>
         
          <td align="right"  style="border-bottom:1px solid #333333;border-right:1px solid #333333">&nbsp; </td>

        </tr>
  
  

    <tr>
          <td height="35"  style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333;" colspan="5" align="right">

          Total : </td>
          <td style="border-bottom:1px solid #333333;border-right:1px solid #333333;" align="right"></td>
  </tr>

           <tr>
           <td  colspan="6" height="35" align="left" style="border-bottom:1px solid #333333;border-right:1px solid #333333; border-left:1px solid #333333; padding-left:10px;">(In word):  &nbsp;

           </td>
          
        </tr>



    </table>
<table  width="350"  border="0" align="left" cellpadding="0" cellspacing="0">
 <td valign="bottom">
          .......................
        <p style="font-size:11px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px; margin-left:20px;">

        Student
        </p>
      </td>

      <td align="right" valign="bottom" style="font-size:13px;">
        
   <br>
        
         <br>

..........................
        <p style="font-size:11px;font-family:Arial, Helvetica, sans-serif; margin-top: -0px;  text-align: right; padding-right:20px; ">

       Receiver
        </p>

         </td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="font-size:13px;"> Developed by : SBIT </td>
    </tr>
</table>


  </div>
</div>
	<br><br>
<center> <input type="button" value="Print" style="background:#ff0000; color:#fff; height:35px; width:100px; margin-top:20px; border-radious:10px;" onclick="window.print()" class="print"> </center>


