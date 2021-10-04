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
require("connection.php");


$query="select id,serial_number,model,batchnumber,scan_date as production_date from barcode";


if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
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

 
fputcsv($output, array('ID','SERIAL NUMBER','MODEL','BATCH NUMBER','PRODUCTION DATE'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>
