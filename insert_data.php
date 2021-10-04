<?php
include 'connect.php';

if(isset($_POST['next'])) 
{
$model_no="TR-CES-2708F";
$device_type="Switch";
$serial_no=trim($_POST['serial_no']);
$mac_address=trim($_POST['mac_address']);
$software_version=trim($_POST['version']);
$port_status=trim($_POST['port_status']);
$vendor_name="Techroutes Network Pvt. Ltd.";



$user_name=$_POST['user_name']; 

$ip =  $_SERVER['REMOTE_ADDR'];
$update_date=date('Y-m-d H:i:s',time());;

    $check=mysqli_query($conn,"select * from device_detail where serial_no='$serial_no' and mac_address='$mac_address'");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {

   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='qctest.php';
 window.alert('Serial number exists')
    </SCRIPT>");
   } 
else 
{  

if (!empty($serial_no)) {

$sql = "INSERT INTO device_detail(model_no,device_type,serial_no,mac_address,version,update_date,port_status,vendor_name) values('$model_no','$device_type','$serial_no','$mac_address','$software_version','$update_date','$port_status','$vendor_name')";
$result=mysqli_query($conn,$sql);
}


$query="select max(id) as id from device_detail ";

   $objQuery = mysqli_query($conn,$query);
while($objResult = mysqli_fetch_array($objQuery))
{
	 $update_id=$objResult["id"];
}

 $sql1 = "INSERT INTO update_log(station_id,update_id,username,update_time,ipaddr) values('st-01','$update_id','$user_name','$update_date','$ip')";
$result1=mysqli_query($conn,$sql1);

}

if($result)  
    {  
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='qctest.php';
 window.alert('Success')
    </SCRIPT>");
    }  
    else  
    {  
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='qctest.php';
 window.alert('NOT Success')
</SCRIPT>");  
    } 


}
?>