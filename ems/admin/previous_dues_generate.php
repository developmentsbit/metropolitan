<?php
   error_reporting(1);
    

        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        date_default_timezone_set("Asia/Dhaka");
        $db = new database();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Previous Dues Generate </title>
    <script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	 
     <script type="text/javascript">

  $(document).ready(function()
  {
        $('#className').change(function()
        {
                check_FeeTitle();
        }); 
  });

function check_FeeTitle()
{
          var year = $('#running_year').val();
          var className = $('#className').val();
          var feeTitle="show";

          $.post("CheckBalance.php", { year: year,className:className,feeTitle:feeTitle },
          function(result){
            if(result)
                {
                    $('#ClassFee').html(result);  
                }
                else
                {
                   $('#ClassFee').html("");
                }
        });
}  



         
        function viewStudent(){

             var showLoadImg='<img src="../js/gificon/ajax-loader.gif" />Loading Please wait...';
         $('#viewStudent').html(showLoadImg);


        var className = $('#className').val();
        var lower = parseInt($('#lower').val());
        var upper = parseInt($('#upper').val()); 
        var month = $('#month').val();
        var year = $('#year').val();
        var date = $('#date').val();
        var ClassFee = $('#ClassFee').val();

        var running_year = $('#running_year').val();
        var low=upper;
        var upr=upper+10;



        var viewStudent = "viewStudent";
        if(className != "Select One")
            {    
            $.ajax({
                url:"dueGenerate.php",
                type:"POST",
                data :{className:className,month:month,lower:lower,upper:upper,year:year,date:date,viewStudent:viewStudent,running_year:running_year,ClassFee:ClassFee},
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


     </script>

    </head>

  <body>
   <form name="" action="" method="post"  enctype="multipart/form-data" class="form-horizontal">

  	
            <div class="col-md-8 col-md-offset-2" id="AddMarksStep1"><br/> <br/>
           
                <span class="glyphicon glyphicon-arrow-right text-justify text-uppercase text-warning" style="font-weight: bold; padding-top: 15px; font-size: 18px;"><strong style="padding-left:5px">Invoice Generate</strong></span><br/>
			
                <table class="table table-responsive table-hover table-bordered" style="margin-top:10px;">
                 <tr>
                        
                        <td><strong><span class="text-success" style="font-size: 15px;">Dues Year</span></strong></td>
                        <td ><div class="col-md-8">
                         <input type="text"   class="form-control" name="year" id="year" style="width:280px; " placeholder="<?= date('Y')-1;?>"  value="<?= date('Y')-1;?>">
                         </div></td>
                    
                    
                      </tr>

                         <tr>
                        
                        <td><strong><span class="text-success" style="font-size: 15px;">Running Year</span></strong></td>
                        <td ><div class="col-md-8">
                         <input type="text"   class="form-control" name="running_year" id="running_year" style="width:280px; " placeholder="<?= date('Y');?>"  value="<?= date('Y');?>">
                         </div></td>
                    
                    
                      </tr>


                    <tr>
                    	<td ><strong><span class="text-success" style="font-size: 15px;">Running Class</span></strong></td>
                        <td ><div class="col-md-8">


                        <select name="className" id="className" class="form-control" style="width:280px; " >
                        <option> Select Class</option>
                            <?php 
                                $select_section = "SELECT * FROM `add_class` order by `index` asc ";
                                $cheked_query=$db->select_query($select_section);
                                if($cheked_query)
                                {
                                    while($fetchsection=$cheked_query->fetch_array())
                                    {?>
                            
                   <option value="<?php echo "$fetchsection[0]and$fetchsection[2]"?>"><?php echo $fetchsection[2];?></option>

                            <?php  }  } ?>
                </select>


                 

                                                </div>
                                                </td>
                    </tr>
                    

                         <tr>
                        <td>
                            <strong><span class="text-success" style="font-size: 15px;">Select Fee Title</span></strong></td>
                        <td><div class="col-md-8">
                        
                               

                     <select name="ClassFee" class="form-control"  id="ClassFee" style="width:285px; height: 30px;  font-size: 14px;">
                                

                    </select>



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
