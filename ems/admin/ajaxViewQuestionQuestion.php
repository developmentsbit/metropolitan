<?php

	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
    $db = new database();

   
   	$select="SELECT * FROM `questionadd` WHERE `class`='".$_POST["className"]."' AND `subject`='".$_POST["subjectName"]."'";
   
    $r=$db->link->query($select);
    if($r)
    {
    	?>
             <div class="form-row">
             <?php
             $i=1;
                while($fetch=$r->fetch_array())
                {


             ?>
    <div class="form-group col-md-6" style="min-height: 100px;">

        <div  class="col-md-12" style="font-size: 16px; font-weight: bold; min-height: 50px;"> <label>Q<?php print $i++;?>. <?php print $fetch[3];?>  </label> <label> <a href="editQuestion.php?EditID=<?php print $fetch[0];?>" class="btn btn-info" >Edit</a></label> <label><a href="#" onclick="deleteQuestion('<?php print $fetch[0];?>')" class="btn btn-danger">Del</a></label>  </div> 
        <div  class="col-md-6" style="min-height: 30px;">A)  <?php print $fetch[4];?> <?php if($fetch[8]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?> </div>
        <div  class="col-md-6" style="min-height: 30px;">B)  <?php print $fetch[5];?><?php if($fetch[9]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?> </div>
        <div  class="col-md-6" style="min-height: 30px;">C)  <?php print $fetch[6];?> <?php if($fetch[10]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?></div>
        <div  class="col-md-6" style="min-height: 30px;">D)  <?php print $fetch[7];?> <?php if($fetch[11]=="True"){?>  <img src="../img/ok.png" style="height: 25px; width: 25px;"> <?php }?></div>


    </div>
    <?php
}
?>
    
    </div>


        <?php
    }
    else
    {
    	print "<span style='color:green; font-size:18px;'> Data Not Available!!</span>";
    }



?>

