<?php
session_start();

 $user_id =  $_SESSION["user_id"] ;
 $user_name =  $_SESSION["user_name"] ;
 $user_email= $_SESSION["user_email"];
 $user_type= $_SESSION["user_type"]

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">

    <link rel="stylesheet" href="css/diff-button.css">
    <link rel="stylesheet" href="css/status.css">
    <link rel="stylesheet" href="css/default_status.css">


   <style>

  </style>
    <title>QC-Test TR-S2708F</title>
  </head>
<body onload="myFunction()">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body">
         
      </div>
      </div>



      <header class="site-navbar site-navbar-target py-4" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="index.html" class="font-weight-bold text-white"><img src="images/logo.png"></a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-block"><a href="#" class="text-black site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-none" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="index.html" class="nav-link">Home</a></li>
                  <li><a href="report.php" class="nav-link">Report</a></li>
                  <li><a href="#" class="nav-link">Management</a></li>
                   <li><a href="logout.php">Logout</a></li>

                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>
        
    <!--<div class="hero" style="background-image: url('images/back.jpeg');"></div>-->
<div class="hero" style="background-color:#c3bebb;"></div>


  <h3 align="center">QC-Test: TR-CES2708F</h3>

<img  class="center" width="10%" height="10%" src="images/ces-700_1.jpg">


<form  id="frm1" name="frm"  method="post" onsubmit="return process()" action="qctest_bac.php"  > 

             
  <!--<button class="button-one" id="myButton" type="submit" name="submit" >Test</button>-->

<button class="button-one" type="submit" name="submit" id="test">Test</button>


  <img  id="img" class="center2" width="60px" height="50px" src="">
   <img class="center1"  src="images/2708f.png">

<div class="container">
    <div class="led-gray1"></div>
    <div class="led-gray2"></div>
    <div class="led-gray3"></div>
    <div class="led-gray4"></div>
    <div class="led-gray5"></div>
    <div class="led-gray6"></div>
    <div class="led-gray7"></div>
    <div class="led-gray8"></div>

</div>

<?php
if(isset($_POST['submit'])) 
{


require_once "PHPTelnet.php";

$telnet = new PHPTelnet();

// if the first argument to Connect is blank,
// PHPTelnet will connect to the local host via 127.0.0.1
$result = $telnet->Connect('192.168.1.70');

//if ($result == 0) 
//{

$telnet->DoCommand('admin', $result);
$telnet->DoCommand('admin', $result);
echo $result."----1<br>";
$telnet->DoCommand('enable', $result);
echo $result."----2<br>"; 
$telnet->DoCommand('show version', $result);
echo $result."-----3<br>"; 
$telnet->DoCommand('show interface brief', $result1);
echo $result1."----4<br>"; 
$telnet->DoCommand('exit', $result);
echo $result."<br>"; 
$telnet->DoCommand('exit', $result);
echo $result."<br><br><br>"; 
// NOTE: $result may contain newlines
 //echo "<br>";
echo 	$data=$result;

//echo $data=$result;
$str1="Serial num";
$pos1= strpos($data,$str1);
$serial_no=substr("$data",323,11);
//echo "<br>";

$str2="MAC Address";
$pos2= strpos($data,$str2);
$mac_address=substr("$data",494,18);
//echo "<br>";
$str3="Software, Version";
$pos3= strpos($data,$str3);
$software_version=substr("$data",120,18);

$data1=$result1;

//echo "<br>";

$regex = "/\sup|down/";

if(preg_match_all($regex, $data1, $matches))
{
   
$i=1;

foreach($matches[0]  as $value){

if ($i <= 8)

{
$port_status= "G0/$i-$value";
$port_status=trim($port_status);

}

    $values[] = "$port_status";

$i=$i+1;

}
}

 //$port= implode(',', $values);
 
$port = implode(',', array_slice($values, 0, 8)); 

 $status=(explode(",",$port));
/*
echo $status[0];
echo "<br>";
echo $status[1];
echo "<br>";
echo $status[2];
echo "<br>";
echo $status[3];
echo "<br>";
echo $status[4];
echo "<br>";
echo $status[5];
echo "<br>";

echo $status[7];
echo "<br>";

echo $status[5];
echo "<br>";
*/
/*check port status*/


if($status[0] == "G0/1-down")
{
$class1="led-red1";
}
else
{
$class1="led-green1";
}

if($status[1] == "G0/2-down")
{
$class2="led-red2";
}
else
{
$class2="led-green2";
}

if($status[2] == "G0/3-down")
{
$class3="led-red3";
}
else
{
$class3="led-green3";
}

if($status[3] == "G0/4-down")
{
$class4="led-red4";
}
else
{
$class4="led-green4";
}

if($status[4] == "G0/5-down")
{
$class5="led-red5";
}
else
{
$class5="led-green5";
}

if($status[5] == "G0/6-down")
{
$class6="led-red6";
}
else
{
 $class6="led-green6";
}

if($status[6] == "G0/7-down")
{
$class7="led-red7";
}
else
{
$class7="led-green7";
}

if($status[7] == "G0/8-down")
{
 $class8="led-red8";
}
else
{
$class8="led-green8";
}

/* end here */
$telnet->Disconnect();

}
//}
 
?>
     <input type='hidden' id='port_status' name='port_status' value='<?php echo $port ?>'>
    
  
  

<?php

if ($serial_no !='')
{
?>
<div class="container">
    <div class="<?php echo $class1;?>"></div>
   <div class="<?php echo $class2;?>"></div>
    <div class="<?php echo $class3;?>"></div>
    <div class="<?php echo $class4;?>"></div>
    <div class="<?php echo $class5;?>"></div>
    <div class="<?php echo $class6;?>"></div>
    <div class="<?php echo $class7;?>"></div>
    <div class="<?php echo $class8;?>"></div>
  </div>

</div>
<?php } ?>
<table>
  <tr>
    <th>Serial No</th>
    <td><?php echo $serial_no;?></td>
    <th>Mac Address</th>
    <td><?php echo $mac_address;?></td>
    <th>Version</th>
     <td><?php echo $software_version;?></td>
  </tr>

    <input type='hidden' id='serial_no' name='serial_no' value='<?php echo $serial_no ?>'>
    <input type='hidden' id='mac_address' name='mac_address' value='<?php echo $mac_address ?>'>
    <input type='hidden' id='version' name='version' value='<?php echo $software_version ?>'>
    <input type='hidden' id='user_name' name='user_name' value='<?php echo $user_name ?>'>


  </table>	
<!--<button type="submit" name="submit" class="button-two"  onclick="insert.php" >Next</button>-->
<?php
$ver="G0/1- up,G0/2-down,G0/3-down,G0/4-down,G0/5-down,G0/6-down,G0/7-down,G0/8- up,G0/8- up";
?>

<input type='submit' class="button-two" name="next" id="btSubmit" value='Next' onclick="form.action='insert_data.php';  return true;">


<script>
function myFunction() {

      document.getElementById('btSubmit').disabled = true; 


var serial_no=document.forms["frm"]["serial_no"].value;
var mac_address=document.forms["frm"]["mac_address"].value;
var version=document.forms["frm"]["version"].value;

if (serial_no==null || serial_no=="" || mac_address==null || mac_address=="" || version==null || version=="" || port_status=="G0/1- up,G0/2-down,G0/3-down,G0/4-down,G0/5-down,G0/6-down,G0/7-down,G0/8- up,G0/8- up") {
      document.getElementById('btSubmit').disabled = true; 
      document.getElementById("img").src = "proc1.png";
}
 
else {

     document.getElementById('btSubmit').disabled = false;
     document.getElementById("img").src = "giphy.webp";
}


}
function process() {
     document.getElementById("img").src = "giphy.webp";


}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $("#frm").submit(function (e) {

            //stop submitting the form to see the disabled button effect
            e.preventDefault();

            //disable the submit button
            $("#test").attr("disabled", true);



            return true;

        });
    });
</script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
  </form>
</body>
  
</html>  
