<?php  

error_reporting(0);?>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label>Question</label>
       <textarea class="form-control textarea" id="Question" rows="3" name="Question" onkeypress="return newQuestion()"><?php if($selectQuestion){ print $fetchData[3]; }?></textarea>
    </div>
 
  </div>

  <div class="form-row">
    <div class="form-group col-md-8 ">
      <label>Option A</label>

        <textarea class="form-control textarea" id="Option1" name="Option1"><?php if($selectQuestion){ print $fetchData[4];}?></textarea>

         

    </div>

    <div class="form-group col-md-4  ">
      <label>Answer</label>
      <select  class="form-control" name="Answer1" id="Answer1">
           <?php 
                 if($selectQuestion)
                {
                    if($fetchData[8]=="True")
                    {
                        
                       ?>
                          <option value="<?php echo $fetchData[8];?>"><?php echo $fetchData[8];?></option>
                       <?php
                    }
                }
        ?>

        <option  value="False"> False </option>
        <option value="True"> True </option>
      </select>
    </div>
 
  </div>

  <div class="form-row">
    <div class="form-group col-md-8 ">
      <label>Option B</label>


        <textarea class="form-control textarea" id="Option2" name="Option2"><?php if($selectQuestion){ print $fetchData[5]; }?></textarea>


    </div>
    <div class="form-group col-md-4 ">
      <label >Answer</label>
     <select  class="form-control" name="Answer2" id="Answer2">
   
     <?php 
                 if($selectQuestion)
                {
                    if($fetchData[9]=="True")
                    {
                        
                       ?>
                          <option value="<?php echo $fetchData[9];?>"><?php echo $fetchData[9];?></option>
                       <?php
                    }
                }
        ?>

        <option  value="False"> False </option>
        <option value="True"> True </option>
      </select>
    </div>
 
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-8 ">
         <label>Option C</label>

             <textarea class="form-control textarea" id="Option3" name="Option3"><?php if($selectQuestion)
                { print $fetchData[6]; }?></textarea>


        
    </div>
    <div class="form-group col-md-4 ">
      <label >Answer</label>
      <select  class="form-control " name="Answer3" id="Answer3">
        <?php if($selectQuestion)
                {
                    if($fetchData[10]=="True")
                    {
                        
                       ?>
                          <option value="<?php echo $fetchData[10];?>"><?php echo $fetchData[10];?></option>
                       <?php
                    }
                }
        ?>
        <option  value="False"> False </option>
        <option value="True"> True </option>
      </select>
    </div>
 
  </div>

  <div class="form-row">
    <div class="form-group col-md-8 ">
       <label>Option D</label>

          <textarea class="form-control textarea" id="Option4" name="Option4"><?php if($selectQuestion){
                     print $fetchData[7];} ?></textarea>


        
    </div>
    <div class="form-group col-md-4  ">
      <label >Answer</label>
      <select  class="form-control" name="Answer4" id="Answer4">
        <?php 
                 if($selectQuestion)
                {
                    if($fetchData[11]=="True")
                    {
                        
                       ?>
                          <option value="<?php echo $fetchData[11];?>"><?php echo $fetchData[11];?></option>
                       <?php
                    }
                }
        ?>
         <option  value="False"> False </option>
        <option value="True"> True </option>
      </select>
    </div>

 <div class="form-group col-md-4  ">
      <label>Knowledge Category</label>
      <select  class="form-control" name="questionType" id="questionType">
        <?php 
                 if($selectQuestion)
                {
                   
                        
                       ?>
                          <option value="<?php echo $fetchData[13];?>"><?php echo $fetchData[13];?></option>
                       <?php
                    
                }
        ?>
         <option  value="Knowledge"> Knowledge </option>
        <option value="Realization"> Realization </option>
        <option value="Usege"> Usege </option>
        <option value="Higher Efficiency"> Higher Efficiency  </option>
      </select>
    </div>

 
  </div>

  <script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>