<?php
@session_start();
 

	  require_once("../db_connect/conect.php");
	$db = new database();




function sender($url,$key,$mobile,$senderId,$sms)
{
	$data = json_encode(array('api_key' => $key,'type'=>'unicode', 'contacts' => $mobile,'senderid'=>$senderId, 'msg' => $sms));
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch,CURLOPT_HTTPHEADER,array("Content-Type:application/json", "Accept: application/json", "Authorization: Basic c2JpdDpORXdRNXJRTw=="));
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
    $dd=curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //http_build_query($data). "\n";
	$contents = curl_exec($ch);
	if (curl_errno($ch)) {
	  echo curl_error($ch);
	  echo "\n<br />";
	  $contents = '';
	} else {
	  curl_close($ch);
	}
}


if (isset($_POST["add"])) 
{


	
		// $to_numbers = array('0' => "+8801820018772",'1'=>"+8801840241895");
    $query1 = "SELECT * FROM project_info";
	$sql1=$db->select_query($query1);	
	$fetc=mysqli_fetch_assoc($sql1);

	// Array ( [0] => 8801712790374 [1] => 8801711789184 )
	
	
	
	for($i = 0; $i < count($_POST["mytext"]);$i++){
$key='R60002955aeb2527c26bd5.91135862';
 $mobile  = $_POST["mytext"][$i]; //Receiver's country code+number
$senderId='8804445629106';// sender id number
$sms=$_POST["details"]; //Double quotes are good for new line characters e.g. \n
//$sms = urlencode($sms); //Very Important Otherwise spaces shall not be parsed correctly
ini_set('allow_url_fopen',1);
$url = "http://users.sendsmsbd.com/smsapi?";
$succ=sender($url,$key,$mobile,$senderId,$sms);
 }
 
 
 
	
	
	if ($succ) {
		echo "Send Success";
	}
	
	//////////////////////////////////////////////////////////////////////////////////
	//////////////////Do Not Modify Under Codes. Entry Prohabited/////////////////////
	//////////////////////////////////////////////////////////////////////////////////

	
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Bar counchil membar information</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>



    <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">

  <div class="panel panel-default" style="border-radius: 0px;">
  <div class="panel-heading" style="font-size: 16px; color: #16a085; text-transform: capitalize;"><b>Send Individual Message</b></div>
  <div class="panel-body">


<form method="post" enctype="multipart/form-data" action="">

  	<div class="form-group">
  		<button class="add_field_button btn btn-info" style="border-radius: 0px; ">Add More Fields</button>
  		
  	</div>
  	

  	<div class="form-group">
       <label >Number :</label>
    	<div class="input_fields_wrap">
        <div><input type="text" name="mytext[]" class="form-control"  style="border-radius: 0px; height: 40px;" value="88"></div>
      </div>


  </div>  


  	<div class="form-group">
       <label >Message :</label>
    	<textarea rows="10" class="form-control" name="details" style="border-radius: 0px;"></textarea>

  </div> 


<span>
	   		<?php
		if (isset($msg)) {
		echo $msg;
		}else{
		echo $db->sms;
		}
		?>

</span>


   

<center>
	<input type="submit" name="add" class="btn btn-success" style="width: 120px; border-radius: 0px;" value="Send">
<input type="submit" name="view" class="btn btn-danger" style="width: 120px; border-radius: 0px;" value="Reset">
</center>


</form>




</div>
</div>
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="mytext[]" class="form-control" style="border-radius:0px;" value="88"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>

</form>
</body>
</html>