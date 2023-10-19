<?php
   error_reporting(1);
    

        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        date_default_timezone_set("Asia/Dhaka");
        $db = new database();
    
    if(isset($_POST["Submit"]))
     {
        $total=count($_POST['marks']);
        for($i=0;$i<$total;$i++)
        {

           $sql="REPLACE INTO `previous_result`(`student_id`,`marks`) VALUES('".$_POST['stdid'][$i]."','".$_POST['marks'][$i]."')";
            $query=$db->link->query($sql);
        }
        print '<script>alert("Save Successfully!!");</script>';
        
     }


     

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Due Invlice Generate </title>
    <script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	 
     <script type="text/javascript">
         
        function viewStudent(){

             var showLoadImg='<img src="../js/gificon/ajax-loader.gif" />Loading Please wait...';
         $('#viewStudent').html(showLoadImg);


        var className = $('#className').val();
        var lower = parseInt($('#lower').val());
        var upper = parseInt($('#upper').val()); 
        var month = $('#month').val();
        var year = $('#year').val();
        var date = $('#date').val();
        var low=upper;
        var upr=upper+10;



        var viewStudent = "viewStudent";
        if(className != "Select One")
            {    
            $.ajax({
                url:"dueStudentList.php",
                type:"POST",
                data :{className:className,month:month,lower:lower,upper:upper,year:year,date:date,viewStudent:viewStudent},
                cache:false,
                success:function(data)
                {
                    $('#viewStudent').html(data);
                    $('#lower').val(low);
                    $('#upper').val(upr);
                }
                
            });
        }
    }

    function studentDueInvoice()
    {
       
         $("#Save").attr('disabled', true);

         var showLoadImg='<img src="../js/gificon/ajax-loader.gif" /> Loading Please Wait..';
         $('#viewMessage').html(showLoadImg);

            var className = $('#className').val();
            var month = $('#month').val();
            var year = $('#year').val();
            var date = $('#date').val();

          var stdid = [];
          $(".studentID:checked").each(function(index, el) {
            stdid.push(this.value);
          });


            for(i=0;i<stdid.length;i++)
            {
                
                    var StudentID=stdid[i];
                    var feetitle='fees-'+stdid[i];
                    var feesid=[];
                    $('.'+feetitle+":checked").each(function(index, el) {
                        feesid.push(this.value);
                      });
                    var invoiceGenerate=invoiceGenerate;

                         $.ajax({
                            url:"NewInvoiceGenerate.php",
                            type:"POST",
                            data :{className:className,month:month,year:year,date:date,StudentID:StudentID,feesid:feesid,invoiceGenerate:invoiceGenerate},
                            cache:false,
                            success:function(data)
                            {
                                viewStudent();

                                $('#viewMessage').html(data);

                            }
                            
                        });



            }
             //$("#Save").attr('disabled', false);
                 //viewStudent();

    }

     </script>

    </head>

  <body>
   <form name="" action="" method="post"  enctype="multipart/form-data" class="form-horizontal">

  	
            <div class="col-md-8 col-md-offset-2" id="AddMarksStep1"><br/> <br/>
           
                <span class="glyphicon glyphicon-arrow-right text-justify text-uppercase text-warning" style="font-weight: bold; padding-top: 15px; font-size: 18px;"><strong style="padding-left:5px">Invoice Generate</strong></span><br/>
			
                <table class="table table-responsive table-hover table-bordered" style="margin-top:10px;">
                 <tr>
                        
                        <td><strong><span class="text-success" style="font-size: 15px;">Year</span></strong></td>
                        <td ><div class="col-md-8">
                         <input type="text"   class="form-control" name="year" id="year" style="width:280px; " placeholder="<?= date('Y');?>"  value="<?= date('Y');?>">
                         </div></td>
                    
                    
                      </tr>
                    <tr>
                    	<td ><strong><span class="text-success" style="font-size: 15px;">Select Class</span></strong></td>
                        <td ><div class="col-md-8">
                     <select class="form-control" name="className" id="className" style="width:280px; " >
      
                       <option>Select One</option>
                        <?php 
                            $select_class="SELECT * FROM `add_class` GROUP BY `id` ORDER BY `index` ASC";
                            $check_query=$db->select_query($select_class);
                            if($check_query){
                                while($fetch_class=$check_query->fetch_array())
                                {
                        ?>
                        <option value="<?php echo $fetch_class[0] ?>"><?php echo $fetch_class[2];?></option>
                        <span id="item_result"></span>
                        <?php } } ?>
        </select>

                                                </div>
                                                </td>
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

                         <tr>
                        <td>
                            <strong><span class="text-success" style="font-size: 15px;">Invoice Expiry  Date</span></strong></td>
                        <td><div class="col-md-8">
                        
                                
                                <input type="date"  style="width:285px; height: 30px;  font-size: 14px;" name="date" id="date" value="<?php print date('Y-m-d');?>" class="form-control" > </input>


                        </div>
                        </td>
                    </tr>


                    <tr>
                            <td>Select Roll Range</td>
                            <td>&nbsp; &nbsp;<label><input type="text" name="lower" id="lower" class="form-control" value="0"></input></label><label>To</label> <label><input type="text" id="upper" name="upper" class="form-control" value="10"></input></label></td>
                    </tr>
						
                <tr><td colspan="2" align="center">

                <input type="button" name="ResultGenerate" value="Show" class="btn btn-success btn-md" style="width: 180px" onclick="return viewStudent()">
                    
                </input> 

				
				</td></tr>
                <tr>
                        <td colspan="2">
                            
                                <span id="viewStudent">
                                    
                                </span>
                                <br>

                                 <span id="viewMessage" style="float: right;"> </span>

                        </td>

                </tr>

                </table>
							
                </div>
				
				
		</form>
    
 <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
