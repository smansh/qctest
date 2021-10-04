<?php 
include 'session.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Barcode Scan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<link href="css/addons/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <style>
#date
{
	margin-top:70px;
	color:blue;
	font-size:20px;
	padding:10px;
	width:500px;
}
</style>
  <script type="text/javascript">
    window.onload = setInterval(clock,1000);

    function clock()
    {
	  var d = new Date();
	  
	  var date = d.getDate();
	  
	  var month = d.getMonth();
	  var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
	  month=montharr[month];
	  
	  var year = d.getFullYear();
	  
	  var day = d.getDay();
	  var dayarr =["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];
	  day=dayarr[day];
	  
	  var hour =d.getHours();
      var min = d.getMinutes();
	  var sec = d.getSeconds();
	
	  document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year +" "+hour+":"+min+":"+sec;
	  document.getElementById("time").innerHTML=hour+":"+min+":"+sec;
    }
  </script>

 <style>
.header {
        color: #fff;
        font-size: 35px;
        font-weight: bold;
        font-family: sans-serif;
  text-align: center;

      }

.model {
        color: #1c87c9;
        font-size: 30px;
        font-weight: bold;
        font-family: sans-serif;
       text-align: center;

      }

      .blink {
        animation: blinker 0.6s linear infinite;
        color: green;
        font-size: 30px;
        font-weight: bold;
        font-family: sans-serif;
        text-align: center;

      }

  .blink1 {
        animation: blinker 0.6s linear infinite;
        color: red;
        font-size: 30px;
        font-weight: bold;
        font-family: sans-serif;
        text-align: center;

      }

      @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
    
    
    
     
      }
    </style>
	</head>
	<body>
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="dashboard.php">Barcode Scan</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
		    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="basicExampleNav">
		  <ul class="navbar-nav mr-auto">
		  <!-- 	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false"><span class="fa fa-edit"></span> Add Product</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          
          <a class="nav-link" href="new.php"><span class="fa fa-pencil-square"></span> Enquiry Form</a>
   
        </div>
      </li> -->
      <li class="nav-item">
            <a class="nav-link" href="new.php"><span class="fa fa-edit"></span> Add Product</a>
        </li>

      		<li class="nav-item">
		        <a class="nav-link" href="match.php"><span class="fa fa-search"></span> Match Product</a>
		    </li>
		    <li class="nav-item">
		        <a class="nav-link" href="view.php"><span class="fa fa-eye"></span> View Product</a>
		    </li>
		    </ul> 



		   <ul class="navbar-nav ml-auto">

              <li class="nav-item">
		        <a class="nav-link" href="logout.php"><span class="fa fa-sign-out"></span> Logout <b style="color: yellow"><?php echo $_SESSION['c_user']; ?></b></a>
		      </li>
        </ul>

		  </div>
		</nav>

<div class="w3-container">

  <tr>
<td>  <p text-align="right" id="date"></p>Tody Total Target 100</td>
</tr>
<!--<canvas alagin="right" id="canvas" width="200" height="200" ></canvas>-->

  <table class="w3-table-all">
    <thead>
      <tr class="w3-green">
        <th class="header">Model</th>
        <th class="header">Total Achieve</th>
        <th class="header">Total Pending</th>
      </tr>
    </thead>
<?php
 date_default_timezone_set("Asia/Kolkata");

 $current_date = date("Y-m-d");
$sql = "select count(serial_number) as total,model from barcode where scan_date like '$current_date%' group by model;";
//echo $sql;
$query = mysqli_query($con, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($con));
}

   ?>             

    <tr>
<?php

while ($row = mysqli_fetch_array($query))
                {
               $model=$row['model']; 
               $total_achieve=$row['total'];
               $total_pending=100- $total_achieve;


?>
      <td class="model"><?php echo $model;?></td>
      <td class="blink">&nbsp; &nbsp; &nbsp; <?php echo $total_achieve;?></td>
      <td class="blink1">&nbsp; &nbsp; &nbsp; <?php echo $total_pending;?></td>
    </tr>
              <?php } ?>        

  </table>
</div>
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/addons/datatables.min.js"></script>

<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>

	</body>
	</html>
