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
    <link rel="stylesheet" href="css/main-button.css">

   <style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
}
.center1 {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  height: 20%;

}
.center2 {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

  </style>
    <title>Website Menu #5</title>
  </head>
  <body>


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
                  <li><a href="about.html" class="nav-link">Report</a></li>
                  <li><a href="#" class="nav-link">Management</a></li>
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

<form  name="form" method="post" action="c.php" > 
             
  <button class="button-one" type="submit" name="submit" >Test</button>
  

<?php
if(isset($_POST['submit'])) 
{


require_once "PHPTelnet.php";

$telnet = new PHPTelnet();

// if the first argument to Connect is blank,
// PHPTelnet will connect to the local host via 127.0.0.1
$result = $telnet->Connect('192.168.1.70','admin','admin');

if ($result == 0) {
$telnet->DoCommand('enable', $result);
$telnet->DoCommand('show version', $result);
$telnet->DoCommand('show interface brief', $result1);

// NOTE: $result may contain newlines
 echo "<br>";

$data=$result;
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

if ($i < 9)

{
$port_status= "G0/$i-$value";
$port_status=trim($port_status);

}
    $values[] = "$port_status";

if($port_status == "G0/1-down" )
{
 $class1="led-red1";
}
else
{
$class1="led-green1";
}

if($port_status == "G0/2-down" )
{
  $class2="led-red2";
}
else
{
 $class2="led-green2";
}
if($port_status == "G0/3-down" )
{
  $class3="led-red3";
}
else
{
 $class3="led-green3";
}

if($port_status == "G0/4-down" )
{
  $class4="led-red4";
}
else
{
 $class4="led-green4";
}
if($port_status == "G0/5-down" )
{
  $class5="led-red5";
}
else
{
 $class5="led-green5";
}
if($port_status == "G0/6-down" )
{
  $class6="led-red6";
}
else
{
 $class6="led-green6";
}
if($port_status == "G0/7-down" )
{
  $class7="led-red7";
}
else
{
 $class7="led-green7";
}

if($port_status == "G0/8-down" )
{
  $class8="led-red8";
}
else
{
 $class8="led-green8";
}

?>

<div class="container">
<div class="led-box">
    <div class="<?php echo $class1;?>"></div>
  </div>
  
<div class="led-box">
    <div class="<?php echo $class2;?>"></div>
  </div>

<div class="led-box">
    <div class="<?php echo $class3;?>"></div>
  </div>

<div class="led-box">
    <div class="<?php echo $class4;?>"></div>
  </div>

<div class="led-box">
    <div class="<?php echo $class5;?>"></div>
  </div>

<div class="led-box">
    <div class="<?php echo $class6;?>"></div>
  </div>

<div class="led-box">
    <div class="<?php echo $class7;?>"></div>
  </div>

<div class="led-box">
    <div class="<?php echo $class8;?>"></div>
  </div>

</div>

<?php
//end here

$i=$i+1;



}

}


}
$telnet->Disconnect();

}
 


?>
     
  
  <img  class="center2" width="50px" height="50px" src="images/process.png">
         <img class="center1"  src="images/2708f.png">

<?php

?>
<!--
<div class="container">
<div class="led-box">
    <div class="led-red2"></div>
  </div>
  
</div>
-->
<table>
  <tr>
    <th>Serial No</th>
    <td><?php echo $serial_no;?></td>
    <th>Mac Address</th>
    <td><?php echo $mac_address;?></td>
    <th>Version</th>
     <td><?php echo $software_version;?></td>
  </tr>

  </table>	
<button class="button-two"  onclick="insert.php" type="submit" name="submit">Next</button>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
  </form>
</body>
  
</html>  
