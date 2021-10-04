<?php

session_start();

$fdate = $_SESSION['fdate'] ;
 
$tdate = $_SESSION['tdate'] ;

$custom =$_SESSION['cus_name'] ;

/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/
 
// Database Connection
require("connect.php");


$query="select id,model_no,device_type,vendor_name,serial_no,mac_address,version,update_date,port_status from device_detail";


if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
}
 
$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}
 
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=TR-CES2708-F-Production.csv');
$output = fopen('php://output', 'w');
print "Techroutes Technical Support(http://www.techroutes.com) \n";
print "TR-CES2708-F-Production Report Details. \n";
print " Report Between ".$fdate." AND ".$tdate."\n";
print "\n";

 
fputcsv($output, array('SNo.','MODEL NUMBER','DEVICE TYPE','VENDOR NAME','SERIAL NUMBER','MAC ADDRESS','VERSION','TEST DATE','PORT STATUS'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>
