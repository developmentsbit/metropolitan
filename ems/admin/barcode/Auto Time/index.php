<!DOCTYPE html>
<html>
<head>
	<title>Auto Time</title>

	<link rel="stylesheet" href="libs/css/bootstrap.min.css">
	<style type="text/css">
		
		/*==========================HEADER*/
#clockdate{
	float:right;
}
.clockdate-wrapper {
    background-color: #333;
    padding:10px;
    max-width:170px;
    width:100%;
    text-align:center;
    margin:0 0 -2px 0; 
}
#clock{
    background-color:#333;
    font-family: sans-serif;
    font-size:25px;
    text-shadow:0px 0px 1px #fff;
    color:#fff;
}
#clock span {
	color:#888;
	text-shadow:0px 0px 1px #333;
	font-size:17px;
	position:relative;
	top:-7px;
}
#date {
    font-size:9px;
    font-family:arial,sans-serif;
    color:#fff;
}
	</style>
	<script>
		
		/* Navbar ClockDate */
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}



	</script>



</head>
<body  onload="startTime()">
		
			
			<div id="clockdate">
				<div class="clockdate-wrapper">
					<div id="clock"></div>
					<div id="date"><?php echo date('l, F j, Y'); ?></div>
				</div>
			</div>
		
</body>
</html>