<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compitable" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Dashboard</title>
    <!--Bootstarp-->
  <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
	<link rel="stylesheet" href="textEdit/redactor/redactor.css" />
	<link rel="stylesheet" href="../css/loading/loading.css" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.x-git.min.js"></script>
	<script src="textEdit/redactor/redactor.min.js"></script>
	<script type="text/javascript" src="../js/loading/pace.min.js"></script>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
<body>
		<table class="table table-hover" style="font-size: 18px;">

				<tr>
					<td></td>
					<td align="center">
							<table class="table table-bordered">
							<tr>
								<td colspan="2" align="center"><h3>(বিষয়ের উপর ক্লিক করে প্রশ্ন ওপেন করো)</h3></td>
							</tr>


								<tr>
									<td align="center"><h3> MCQ Question</h3></td>
									<td align="center"><h3>Creative Question</h3>
									        <form method="post"> <input Type="submit" class="btn btn-danger" name="load" value="পরীক্ষার সময় হলে সৃজনশীল প্রশ্ন পাওয়ার জন্য এই বাটনে ক্লিক করতে হবে ।" ></form>
									</td>
								</tr>
							

					<?php

        @session_start();
        @date_default_timezone_set('Asia/Dhaka');
        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        $db = new database();
        
        $phpdate=date("d");
        $phphour=date("h");
        $minute=date("i");
        print  $phphour;
        
      $date=date('d-m-Y');
      $dateTime = new DateTime('now', new DateTimeZone('Asia/Dhaka')); 
      $time=$dateTime->format("H.i"); 
    //  echo  $time;
        
        $key = "encryption key";
        $stdNewID= bin2hex(openssl_encrypt($_SESSION["useridid"],'AES-128-CBC', $key));
        
        $selectRoll="SELECT * FROM `running_student_info` WHERE `student_id`='".$_SESSION["useridid"]."'";
        $que=$db->select_query($selectRoll);
        $fetchGroup=$que->fetch_array();
        
        if($fetchGroup['class_id']=="311609100003")
        {
            // Six
              
        ?>
        <tr>
        	<td align="center">
        	    <a href="https://www.alhelalacademy.edu.bd/exam/qspaper.php?exid=21071&std=<?php print $stdNewID ;?>" target='_blank'>Science  MCQ Question  </a>  
        	</td>
        	<td align="center">
        	    <?php
        	        if($date=='17-08-2021' && $time>="10")
        	        {?>
        	            	<a href="https://www.alhelalacademy.edu.bd/other_img/282108160059.jpg" target='_blank'> Science Creative Question </a>
        	       <?php
        	       }
        	    ?>
                    
        	</td>
        </tr>

	        

	   <?php
        }
        else if($fetchGroup['class_id']=="311609110004")
        {
        // Seven
            
        ?>
                  
           <tr>
        	<td align="center">
        	    <a href="https://www.alhelalacademy.edu.bd/exam/qspaper.php?exid=21088&std=<?php print $stdNewID;?>" target='_blank'>Islam Studies MCQ Question  </a>  
        	    
        	    
        	    </td>
        	<td align="center">
                     <?php
        	          if($date=='17-08-2021' && $time>="11")
        	        {?>
        	            	<a href="https://www.alhelalacademy.edu.bd/other_img/282108160060.jpg" target='_blank'>  Islam Studies Creative Question </a>
        	       <?php
        	       }
        	    ?>
        	</td>
        </tr>



                
               
       <?php 
       }
       else if($fetchGroup['class_id']=="311609230005")
       {
           // Eight
       ?>
               <tr>
        	<td align="center">
        	    <a href="https://www.alhelalacademy.edu.bd/exam/qspaper.php?exid=21089&std=<?php print $stdNewID ;?>" target='_blank'><br> Mathematics MCQ Question  </a>  
        	    
        	    
        	    </td>
        	<td align="center">
        
                             <?php
        	       
        	        if($date=='17-08-2021' && $time>="12")
        	        {?>
        	     
        	            	<a href="https://www.alhelalacademy.edu.bd/other_img/282108160061.jpg" target='_blank'> Mathematics Creative Question </a>
        	            
        	       <?php
        	       }
        	    ?>
        	    
        	</td>
        </tr>

                
       <?php
       }
        else if($fetchGroup['class_id']=="311609230006")
       {
          // nine
       ?>
      
         <tr>
        	<td align="center">
        	    <a href="https://www.alhelalacademy.edu.bd/exam/qspaper.php?exid=21096&std=<?php print $stdNewID ;?>" target='_blank'>Biology MCQ Question </a>  <br>
        	    
        	  	<a href="https://www.alhelalacademy.edu.bd/exam/qspaper.php?exid=21098&std=<?php print $stdNewID ;?>" target='_blank'><br> Civics & Citizenship MCQ Question</a><br>
        	   	<a href="https://www.alhelalacademy.edu.bd/exam/qspaper.php?exid=21097&std=<?php print $stdNewID ;?>" target='_blank'><br> Business Ent. MCQ Question</a><br>

        	</td>
        	<td align="center">
                <?php
        	       
        	        if($date=='18-08-2021' && $time>="12.30")
        	        {?>
	                    	<a href="https://www.alhelalacademy.edu.bd/other_img/282108170068.jpg" target='_blank'>   Biology Creative Question </a><br>
        	            	 <a href="https://www.alhelalacademy.edu.bd/other_img/282108170069.jpg" target='_blank'>   Civics & Citizenship  Creative Question </a><br>
	                    	<a href="https://www.alhelalacademy.edu.bd/other_img/282108170070.jpg" target='_blank'>  Business Ent. Creative Question </a><br>

		             <?php
        	       }
        	    ?>
        	    
        	  <?php
        	       
        	        if($date=='17-08-2021' && $time>="15")
        	        {?>
	                    	<!--<a href="https://www.alhelalacademy.edu.bd/other_img/282108110029.jpg" target='_blank'>   ICT Creative Question </a><br>-->
	                 
        	            
		             <?php
        	       }
        	    ?>
        	    
        	    
        	</td>
        </tr>

                  
       <?php
       }
        else if($fetchGroup['class_id']=="311609230007")
       {
           //ten
       ?> 
       
            <tr>
            	<td align="center">
            	    	                    
        	     <a href="https://www.alhelalacademy.edu.bd/exam/qspaper.php?exid=21099&std=<?php print $stdNewID ;?>" target='_blank'>Biology MCQ Question </a>  <br>
        	    
        	  	<a href="https://www.alhelalacademy.edu.bd/exam/qspaper.php?exid=21100&std=<?php print $stdNewID ;?>" target='_blank'><br> Civics & Citizenship MCQ Question</a><br>
        	   	<a href="https://www.alhelalacademy.edu.bd/exam/qspaper.php?exid=21101&std=<?php print $stdNewID ;?>" target='_blank'><br> Business Ent. MCQ Question</a><br>
        	   	
        	    </td>
        	<td align="center">
                    
               	       <?php
        	       
        	        if($date=='18-08-2021' && $time>="12.30")
        	        {?>
	                    
	                    	<a href="https://www.alhelalacademy.edu.bd/other_img/282108170073.jpg" target='_blank'>   Biology Creative Question </a><br>
        	            	 <a href="https://www.alhelalacademy.edu.bd/other_img/282108170071.jpg" target='_blank'>   Civics & Citizenship  Creative Question </a><br>
	                    	<a href="https://www.alhelalacademy.edu.bd/other_img/282108170072.jpg" target='_blank'>  Business Ent. Creative Question </a><br>
        	            
		             <?php
        	       }
        	    ?>
        	    
        	  <?php
        	       
        	        if($date=='12-08-2021' && $time>="15")
        	        {?>
	                    	<!--<a href="https://www.alhelalacademy.edu.bd/other_img/282108110032.jpg" target='_blank'>   Bangladesh and Global Studies Creative Question </a><br>-->
	                    	<!--<a href="https://www.alhelalacademy.edu.bd/other_img/282108110033.jpg" target='_blank'>   Science Creative Question </a><br>-->
        	            
		             <?php
        	       }
        	    ?>
        	    
        	</td>
        </tr>
			                
       <?php
       }
      
      
      

       $select="SELECT * FROM `student_portal_dashboard`";
	   $checked_query=$db->select_query($select);
	   if($checked_query)
		{
			$fetch_zero=$checked_query->fetch_array();
			print $fetch_zero[2];
	   }
	   ?>
</table>
	   </td>
					<td></td>
				</tr>

				<tr>
				<td></td>
				<td></td>
				<td></td>
				</tr>
		</table>	
</body>
</html>