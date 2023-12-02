    <?php 
error_reporting(0);
@session_start();

@date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();



    $sscRoll=$_GET['id'];
    if(isset($sscRoll))
    {



    $data = $db->link->query("SELECT `online_reg_std_info`.*,`add_class`.`class_name`,`add_group`.`group_name` FROM `online_reg_std_info` INNER JOIN `add_class` ON `add_class`.`id`=`online_reg_std_info`.`class` INNER JOIN  `add_group` ON `add_group`.`id`=`online_reg_std_info`.`group` WHERE `online_reg_std_info`.`board_exam_roll_no`='".$_GET['id']."'");  
  
    if($fetch = $data->fetch_array())
    {
        $id=$fetch[0];
       
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ভর্তি ফরম</title>
    
<style type="text/css">
    @media print{
        .print{ display:none; }
    }
</style>
    <style>
    body{
        
        font-family: 'Noto Serif Bengali', serif;
    }
    *{
        padding: 0px;
        margin: 0px;
    }
  
    </style>
</head>
<body style="font-size:14px;">
            <div style="width: 750px; margin: auto; ">
            
                <table  width="100%" align="center" cellspacing="0" cellpadding="0" border="1" bordercolor="#ccc" >
                <tr>
                        <td>
                                    <table width="100%" cellspacing="0" cellpadding="0" >
                                        <tr>
                                                <td width="15%" align="center"><img src="logo.jpg" style="height:80px; padding: 5px;"> </td>
                                                <td align="center"> 

                                                    <p style="font-size:24px;"> ইকবাল মেমোরিয়াল সরকারি কলেজ </p> 
                                                    <p style="font-size:14px;"> দাগনভূঞা, ফেনী । </p>
                                                   

                                                </td>
                                                <td align="center" width="15%"><img src="govt.jpg" style="height:80px; padding: 5px;"> </td>
                                        </tr>
                                        <tr>
                                                <td colspan="3" align="center" style="font-size: 14px;"> <label>www.imc.edu.bd, </label> <label> info@imc.edu.bd, </label> <label>EIIN-106553, Cumilla Board: 6800, University Code: 4109, HSC (BMT) : 69013</label>  </td>
                                        </tr>
                                    </table>
                                    <br>
                        </td>
                </tr>

                <tr>
                        <td align="left"> <p> &nbsp; শিক্ষার্থী কর্তৃক ভর্তির আবেদনের পূরণীয় তথ্য : </p></td>
                </tr>

                    <tr>
                            <td>
                                
                                <table width="100%" cellspacing="0" cellpadding="0" align="center" >

                                    <tr>
                                            <td>রোল নং </td>
                                            <td>: <?php print $fetch['roll']?></td>
                                            <td>শ্রেণী</td>
                                            <td>: <?php print $fetch['class_name']?></td>
                                            <td>গ্রুপ</td>
                                            <td>: <?php print $fetch['group_name']?></td>

                                            <td rowspan="3"><img src="stdimage/<?php print $fetch['id']?>.jpg" style="height:100px; padding: 5px;"></td>
                                            
                                            
                                    </tr>

                                      <tr>
                                            <td>শিক্ষার্থী নাম </td>
                                            <td>: <?php print $fetch['name']?></td>
                                            <td>নাম (ইংরেজীতে)</td>
                                            <td>: <?php print $fetch['name_en']?></td>
                                            <td> মোবাইল নং</td>
                                            <td>: 2353467</td>
                                            
                                            
                                    </tr>

                                    <tr>
                                           <td>জন্ম নিবন্ধন/জাতীয় পরিচয় পত্র নং</td>
                                            <td>: 3453456</td>
                                            <td >জন্ম তারিখ(মাস/দিন/বছর)</td>
                                            <td>: <?php print $fetch['date_of_birth'] ?></td>
                                            <td>ধর্ম</td>
                                            <td>: <?php print $fetch['religion'] ?></td>
                                           
                                    </tr>

                                </table>


                                <table width="100%" cellspacing="0" cellpadding="0" align="center" >
                                    <tr>
                                            <td colspan="6" height="20" bgcolor="#f4f4f4">পিতার তথ্য:</td>
                                    </tr>
                                    <tr>
                                        <td>পিতার নাম</td>
                                        <td>: <?php print $fetch['fathers_name']?></td> 

                                        <td>পিতার নাম</td>
                                        <td>: <?php print $fetch['fathers_name_en']?></td> 
                                        <td>পরিচয় পত্র নং </td>
                                        <td>: <?php print $fetch['father_nid_no']?></td>
                                    </tr>    


                                    <tr>
                                        <td>শিক্ষাগত যোগ্যতা</td>
                                        <td>: <?php print $fetch['father_education']?></td> 

                                        <td>পেশা</td>
                                        <td>: <?php print $fetch['occupation']?></td> 

                                        <td>মোবাইল নাম্বার:</td>
                                        <td>: <?php print $fetch['father_phone']?></td>
                                    </tr>


                                    <!-- ............. Mothers Info........................ -->

                                         <tr>
                                            <td colspan="6" height="20" bgcolor="#f4f4f4">মাতার  তথ্য:</td>
                                    </tr>
                                    <tr>
                                        <td>মাতার  নাম</td>
                                        <td>: <?php print $fetch['mothers_name']?></td> 

                                        <td>মাতার  নাম</td>
                                        <td>: <?php print $fetch['mothers_name_en']?></td> 
                                        <td>পরিচয় পত্র নং </td>
                                        <td>: <?php print $fetch['mothers_nid_no']?></td>
                                    </tr>    


                                    <tr>
                                        <td>শিক্ষাগত যোগ্যতা</td>
                                        <td>: <?php print $fetch['mothers_edcuation']?></td> 

                                        <td>পেশা</td>
                                        <td>: <?php print $fetch['mothers_occupation']?></td> 

                                        <td>মোবাইল নাম্বার:</td>
                                        <td>: <?php print $fetch['mother_mobile_number']?></td>
                                    </tr>

                                        
                                    <!-- ............. Mothers Info........................ -->

                                        
                                        
                                         <tr>
                                            <td colspan="6" height="20" bgcolor="#f4f4f4"> পিতা/মাতা জীবিত না থাকলে:</td>
                                    </tr>
                                    <tr>
                                        <td>অভিভাবকের নাম</td>
                                        <td>: <?php print $fetch['guardian_name_bn']?></td> 

                                        <td> পরিচয় পত্র নং:</td>
                                        <td>: <?php print $fetch['guardian_nid_no']?></td> 
                                        <td>কর্মস্থল: </td>
                                        <td>: <?php print $fetch['guardian_job_location']?></td>
                                    </tr>    


                                    <tr>
                                        <td>শিক্ষাগত যোগ্যতা</td>
                                        <td>: <?php print $fetch['guardian_education']?></td> 

                                        <td>পেশা</td>
                                        <td>: <?php print $fetch['guardian_occupation']?></td> 

                                        <td>মোবাইল নাম্বার:</td>
                                        <td>: <?php print $fetch['guardian_mobile']?></td>
                                    </tr>
                                    
                                    
                                    

                                </table>

                            </td>
                    </tr>
                 

                <tr>
                        <td>
                                
                                  <table width="100%" cellspacing="0" cellpadding="0" align="center" >
                                    <tr>
                                             <td colspan="5" bgcolor="#f4f4f4">ছাত্র/ছাত্রীর স্থায়ী ঠিকানা: <br></td>
                                      </tr> 

                                        <tr>
                                            <td>বাড়ীর নাম: <?php print $fetch['pa_home_name']?></td>
                                            <td>গ্রাম: <?php print $fetch['pa_village']?></td>
                                            <td>ডাকঘর: <?php print $fetch['pa_post_office']?></td>
                                            <td>উপজেলা: <?php print $fetch['pa_upazila']?></td>
                                            <td>জেলা: <?php print $fetch['pa_district']?></td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#f4f4f4" colspan="5">ছাত্র/ছাত্রীর বর্তমান ঠিকানা:</td>
                                        </tr>
                                            <tr>
                                            <td>বাড়ীর নাম: <?php print $fetch['ra_home_name']?></td>
                                            <td>গ্রাম: <?php print $fetch['ra_village']?></td>
                                            <td>ডাকঘর: <?php print $fetch['ra_post_office']?></td>
                                            <td>উপজেলা: <?php print $fetch['ra_upazila']?></td>
                                            <td>জেলা: <?php print $fetch['ra_district']?></td>
                                        </tr>


                                        <tr>
                                            <td bgcolor="#f4f4f4" colspan="5">বোর্ড পরীক্ষার ফলাফল (এস.এস.সি / দাখিল / সমমান): </td>
                                        </tr>
                                            <tr>
                                            <td>পাশের সন: <?php print $fetch['board_exam_passyear']?></td>
                                            <td colspan="5">শিক্ষা প্রতিষ্ঠানের নাম: <?php print $fetch['board_exam_institute_name']?></td>

                                        </tr>

                                        <tr>

                                            <td>রেজিঃ নং: <?php print $fetch['board_exam_reg_no']?></td>
                                            <td>বোর্ড রোল নং: <?php print $fetch['board_exam_roll_no']?></td>
                                            <td>শিক্ষাবর্ষ: <?php print $fetch['board_exam_session']?></td>
                                            <td colspan="3">প্রাপ্ত জিপিএ :<?php print $fetch['board_exam_pass_gpa']?> </td>
                                        </tr>


                                  </table>


                        </td>
                </tr>  

                <tr>
                    <td>
                          <table width="100%" cellspacing="0" cellpadding="0" align="center" >
                                <tr>
                                        <td colspan="3"> ছাত্র/ছাত্রীর বিষয় সমূহ:</td>
                                </tr>
                                <tr> 
                                    <?php
                                        $sqltype=$db->link->query("SELECT `add_subject_info`.`select_subject_type`  FROM `online_subject_registration_table` 
INNER JOIN `add_subject_info` ON `add_subject_info`.`id`=`online_subject_registration_table`.`subject_id`
WHERE `std_id`='$id' GROUP BY `add_subject_info`.`select_subject_type`");
                                        while($fetch_type=$sqltype->fetch_array())
                                        {?>
                                                                <td>
                                                                    <b> <?php print $fetch_type[0].'</b><br> ';

                                                            


                                                $selectSub=$db->link->query("SELECT `subject_name`  FROM `online_subject_registration_table` 
INNER JOIN `add_subject_info` ON `add_subject_info`.`id`=`online_subject_registration_table`.`subject_id`
WHERE `std_id`='$id' AND `add_subject_info`.`select_subject_type`='$fetch_type[0]'");
                                        while($fetch_sub=$selectSub->fetch_array())
                                        {

                                                        print $fetch_sub[0].', &nbsp;&nbsp; <br>';
                                        }                     

                                    ?>
                                                                        
                                                                    </td>

                                    <?php
                                        }
                                    ?>
                                        
                                </tr>
                          </table>
                    </td>
                </tr>

               

 <tr>
                    <td>>> ভর্তি ফরমের সঙ্গে জমা দিতে হবেঃ 
একাদশ শ্রেণিতে ভর্তির জন্য এস,এস,সি/ সমমানের পরীক্ষার রেজিঃ কার্ড, প্রবেশপত্র, একাডেমিক ট্রান্সক্রিপ্ট ও  প্রশংসাপত্রের ফটোকপি (দুই সেট সত্যায়িত ছাড়া), পাসপোর্ট সাইজের রঙ্গিন ছবি ০৩ (তিন) কপি।
ভর্তির সময় একাডেমিক ট্রান্সক্রিপ্ট ও প্রশংসাপত্রের মূল কপি অবশ্যই জমা দিতে হবে। 
<br><br>
>> ভর্তিচ্ছু ছাত্র/ ছাত্রীর অঙ্গীকারনামাঃ 
আমি এই মর্মে নিশ্চয়তা প্রদান করছি যে, উপরে বর্ণিত সকল তথ্য সঠিক ও নির্ভুল। আমি কলেজের আইন শৃঙ্খলা পরিপন্থী ও রাষ্ট্র বিরোধী কোনো কর্মকাণ্ডে লিপ্ত থাকব না, এর ব্যত্যয় ঘটলে কলেজ কর্তৃপক্ষ যে সীদ্ধান্ত গ্রহণ করবে তা আমি মেনে নিতে বাধ্য থাকব।


</td>
                </tr>


                <tr>
                        <td>
                            
                            <table cellpadding="0" cellspacing="0" align="center" width="100%">
                                
                                    <tr>
                                                    <td align="center"><br><br>
                                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ....................................</p>
                                                        <p>অধ্যক্ষ <br> ইকবাল মেমোরিয়াল সরকারি কলেজ, দাগনভূঞা, ফেনী ।</p>
                                                    </td>

                                                      <td align="center"><br><br>
                                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ....................................</p>
                                                        <p>অভিভাবকের স্বাক্ষর <br> </p>
                                                    </td>

                                                   <td align="center"><br><br>
                                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ....................................</p>
                                                        <p>ছাত্রছাত্রী পূর্ণ স্বাক্ষর </p>
                                                    </td>
                                    </tr>
                            </table>

                        </td>
                </tr>

</table>
<table  width="100%" align="center" cellspacing="0" cellpadding="0" border="1" bordercolor="#ccc"  style="margin-top:400px;">


 <!-- ....................................Office Copy................................ -->

                    <tr>
                            <td height="50" align="center"> X </td>
                    </tr> 

                  

                           <tr>
                        <td>
                                    <table width="100%" cellspacing="0" cellpadding="0" >
                                        <tr>
                                              <td width="30%" align="center"><img src="onebank.jpg" style=" max-width: 150px; height: 20px;"> </td>
                                                <td align="center"> 

                                                    <p style="font-size:16px;">ওয়ান ব্যাংক লিঃ </p> 
                                              
                                                   

                                                </td>
                                                <td align="center" width="30%"><img src="okwalletLogo.jpg" style="height:20px; "> </td>
                                        </tr>
                                    
                                    </table>
                                   
                        </td>
                </tr>

                 <tr>
                        <td><table width="100%" cellspacing="0" cellpadding="0" align="center" >

                                    <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        
                                           
                                            <td align="right" colspan="2">Date: <?php print date('d-m-Y')?> &nbsp;&nbsp; <b>Office Copy</b> &nbsp;&nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td>প্রতিষ্ঠানের নাম</td>
                                        <td colspan="3" >: ইকবাল মেমোরিয়াল সরকারি কলেজ</td>
                                        <td>সঞ্চয় হিসাব</td>
                                        <td>: ০২৮৫২০১৯৮৮০০৬  </td>
                                        
                                    </tr>

                                    <tr>
                                            <td> <b> EMS/Roll </b> </td>
                                            <td>: <b> <?php print $fetch['roll']?> </b></td>
                                            <td>শ্রেণী</td>
                                            <td>: <?php print $fetch['class_name']?></td>
                                            <td>গ্রুপ</td>
                                            <td>: <?php print $fetch['group_name']?></td>
                                            
                                    </tr>

                                      <tr>
                                            <td>শিক্ষার্থী নাম </td>
                                            <td>: <?php print $fetch['name']?></td>
                                            <td>টাকার পরিমান: </td>
                                            <td><b>: <?php print $fetch['reg']?>/-</b></td>
                                            <td> কথায়  </td>
                                            <td>:  <b>
                                                <?php 
                                                if($fetch['group']=='321710120016' || $fetch['group']=='321710120017' )
                                                    {
                                                            print "Two Thousand Five Hundred Taka Only";
                                                    }
                                                    else
                                                    {
                                                         print "Two Thousand Six Hundred Taka Only";
                                                    }
                                                ?>
                                                </b>
                                            </td>
                                            
                                            
                                    </tr>

                                     <tr>    
                                            
                                             <td colspan="6">ব্যাংক স্কল নম্বর / TXI : .........................................ইকবাল মেমোরিয়াল সরকারি কলেজর পক্ষে গ্রহণ করা হল ।</td>
                                        </tr>
                                
                                         <tr>    
                                             
                                             <td colspan="6">জমাদানকারী মোবাইল নাম্বার : ..........................................</td>
                                        </tr>   

                                       

                                    <tr>

                                       
                                    <tr>
                                            <td colspan="2" align="left">
                                                <p>...............................................</p>
                                                <p>&nbsp;&nbsp; জমা দানকারীর স্বাক্ষর</p>
                                            </td>
                                            <td colspan="4" align="right">
                                                <p>...............................................</p>
                                                <p>ব্যাংক কর্মকর্তা/ ok wallet &nbsp;&nbsp; </p>
                                                Seal & Signature  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                            </td>
                                    </tr>

                                   
                                </table>

                            </td>
                </tr> 



              




 <!-- ....................................Student Copy................................ -->

                    <tr>
                            <td height="50" align="center"> X </td>
                    </tr> 

                  

                           <tr>
                        <td>
                                 <table width="100%" cellspacing="0" cellpadding="0" >
                                        <tr>
                                              <td width="30%" align="center"><img src="onebank.jpg" style=" max-width: 150px; height: 20px;"> </td>
                                                <td align="center"> 

                                                    <p style="font-size:16px;">ওয়ান ব্যাংক লিঃ </p> 
                                              
                                                   

                                                </td>
                                                <td align="center" width="30%"><img src="okwalletLogo.jpg" style="height:20px; "> </td>
                                        </tr>
                                    
                                    </table>
                                   
                        </td>
                </tr>

                 <tr>
                        <td><table width="100%" cellspacing="0" cellpadding="0" align="center" >

                                    <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        
                                           
                                            <td align="right" colspan="2">Date: <?php print date('d-m-Y')?> &nbsp;&nbsp; <b>Student Copy</b> &nbsp;&nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td>প্রতিষ্ঠানের নাম</td>
                                        <td colspan="3" >: ইকবাল মেমোরিয়াল সরকারি কলেজ</td>
                                        <td>সঞ্চয় হিসাব</td>
                                        <td>: ০২৮৫২০১৯৮৮০০৬  </td>
                                        
                                    </tr>

                                    <tr>
                                            <td> <b> EMS/Roll </b> </td>
                                            <td>: <b> <?php print $fetch['roll']?> </b></td>
                                            <td>শ্রেণী</td>
                                            <td>: <?php print $fetch['class_name']?></td>
                                            <td>গ্রুপ</td>
                                            <td>: <?php print $fetch['group_name']?></td>
                                            
                                    </tr>

                                      <tr>
                                            <td>শিক্ষার্থী নাম </td>
                                            <td>: <?php print $fetch['name']?></td>
                                            <td>টাকার পরিমান: </td>
                                            <td><b>: <?php print $fetch['reg']?>/-</b></td>
                                            <td> কথায়  </td>
                                            <td>:  <b>
                                                <?php 
                                                if($fetch['group']=='321710120016' || $fetch['group']=='321710120017' )
                                                    {
                                                            print "Two Thousand Five Hundred Taka Only";
                                                    }
                                                    else
                                                    {
                                                         print "Two Thousand Six Hundred Taka Only";
                                                    }
                                                ?>
                                                </b>
                                            </td>
                                            
                                            
                                    </tr>

                                     <tr>    
                                            
                                             <td colspan="6">ব্যাংক স্কল নম্বর / TXI : .........................................ইকবাল মেমোরিয়াল সরকারি কলেজর পক্ষে গ্রহণ করা হল ।</td>
                                        </tr>
                                
                                         <tr>    
                                             
                                             <td colspan="6">জমাদানকারী মোবাইল নাম্বার : ..........................................</td>
                                        </tr>   

                                       

                                    <tr>

                                 <tr>
                                            <td colspan="2" align="left">
                                                <p>...............................................</p>
                                                <p>&nbsp;&nbsp; জমা দানকারীর স্বাক্ষর</p>
                                            </td>
                                            <td colspan="4" align="right">
                                                <p>...............................................</p>
                                                <p>ব্যাংক কর্মকর্তা/ ok wallet &nbsp;&nbsp; </p>
                                                Seal & Signature  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                            </td>
                                    </tr>

                                   
                                </table>

                            </td>
                </tr> 
               



                <tr>
                        <td align="center" height="50">X</td>
                </tr>



 <!-- ....................................Bank Copy................................ -->

               

                           <tr>
                        <td>
                                   <table width="100%" cellspacing="0" cellpadding="0" >
                                        <tr>
                                              <td width="30%" align="center"><img src="onebank.jpg" style=" max-width: 150px; height: 20px;"> </td>
                                                <td align="center"> 

                                                    <p style="font-size:16px;">ওয়ান ব্যাংক লিঃ </p> 
                                              
                                                   

                                                </td>
                                                <td align="center" width="30%"><img src="okwalletLogo.jpg" style="height:20px; "> </td>
                                        </tr>
                                    
                                    </table>
                                   
                        </td>
                </tr>

                 <tr>
                        <td><table width="100%" cellspacing="0" cellpadding="0" align="center" >

                                  <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        
                                           
                                            <td align="right" colspan="2">Date: <?php print date('d-m-Y')?> &nbsp;&nbsp; <b>Bank Copy</b> &nbsp;&nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td>প্রতিষ্ঠানের নাম</td>
                                        <td colspan="3" >: ইকবাল মেমোরিয়াল সরকারি কলেজ</td>
                                        <td>সঞ্চয় হিসাব</td>
                                        <td>: ০২৮৫২০১৯৮৮০০৬  </td>
                                        
                                    </tr>

                                    <tr>
                                            <td> <b> EMS/Roll </b> </td>
                                            <td>: <b> <?php print $fetch['roll']?> </b></td>
                                            <td>শ্রেণী</td>
                                            <td>: <?php print $fetch['class_name']?></td>
                                            <td>গ্রুপ</td>
                                            <td>: <?php print $fetch['group_name']?></td>
                                            
                                    </tr>

                                      <tr>
                                            <td>শিক্ষার্থী নাম </td>
                                            <td>: <?php print $fetch['name']?></td>
                                            <td>টাকার পরিমান: </td>
                                            <td><b>: <?php print $fetch['reg']?>/-</b></td>
                                            <td> কথায়  </td>
                                            <td>:  <b>
                                                <?php 
                                                if($fetch['group']=='321710120016' || $fetch['group']=='321710120017' )
                                                    {
                                                            print "Two Thousand Five Hundred Taka Only";
                                                    }
                                                    else
                                                    {
                                                         print "Two Thousand Six Hundred Taka Only";
                                                    }
                                                ?>
                                                </b>
                                            </td>
                                            
                                            
                                    </tr>

                                     <tr>    
                                            
                                             <td colspan="6">ব্যাংক স্কল নম্বর / TXI : .........................................ইকবাল মেমোরিয়াল সরকারি কলেজর পক্ষে গ্রহণ করা হল ।</td>
                                        </tr>
                                
                                         <tr>    
                                             
                                             <td colspan="6">জমাদানকারী মোবাইল নাম্বার : ..........................................</td>
                                        </tr>   

                                       

                                    <tr>

                               <tr>
                                            <td colspan="2" align="left">
                                                <p>...............................................</p>
                                                <p>&nbsp;&nbsp; জমা দানকারীর স্বাক্ষর</p>
                                            </td>
                                            <td colspan="4" align="right">
                                                <p>...............................................</p>
                                                <p>ব্যাংক কর্মকর্তা/ ok wallet &nbsp;&nbsp; </p>
                                                Seal & Signature  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                            </td>
                                    </tr>

                                </table>

                            </td>
                </tr> 
                
               

                <tr class="print">
                    <td align="center" height="20"> <input type="button" style="height:35px; width: 120px; color: #fff; background: #ff0000; " value="Print" onclick="window.print()"></td>
                </tr>



            </table>
            </div>
    

    


</body>
</html>
<?php
 }

}
?>

    
       