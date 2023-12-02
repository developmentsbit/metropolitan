<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Yearly Income(Month-Wise)</title>
    <script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
    <script src="textEdit/redactor/redactor.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <form action="student_collection_month_wise.php" method="get"  enctype="multipart/form-data"  >
            <div class="col-md-8 col-md-offset-2" ><br/> <br/>
                <span class="glyphicon glyphicon-arrow-right text-justify text-uppercase text-warning" style="font-weight: bold; padding-top: 15px; font-size: 18px;"><strong style="padding-left:5px; text-transform: capitalize;">Yearly Income(Month-Wise)</strong></span><br/>
  
           <table class="table table-responsive table-hover table-bordered" style="margin-top:10px;">
                 
          <tr>
                      
          <td><strong><span class="text-success" style="font-size: 15px;">Select Type</span></strong></td>
          <td><div class="col-md-8">
            
            <select  name ="Type"  id="Type" class="form-control"  style="width:280px; border-radius:0px;">
                    <option value="3">Yearly</option>
            </select>
             </div></td>
                    
          
          </tr>
          
          
      <tr>
                      
          <td><strong><span class="text-success" style="font-size: 15px;">Year</span></strong></td>
          <td><div class="col-md-8">

            
           <input type="text" id="year" name="year" value="<?php print date('Y');?>" class="form-control" style="width:280px; border-radius:0px;">
             </div></td>
                    
          
          </tr>
          
          
          
        
          
                <tr>
                  <td colspan="2" align="left">
                    <input type="submit" name="showdata" value="Show Data" class="btn btn-success btn-md" style="width: 180px" formtarget="_blank"></input>
          </td>
      </tr>

                </table>

                </div>
 
    
     </form>

  </body>
</html>
