<?php
include 'connect.php';

session_start();

 $user_id =  $_SESSION["user_id"] ;
 $user_name =  $_SESSION["user_name"] ;
 $user_email= $_SESSION["user_email"];
 $user_type= $_SESSION["user_type"]


?>
<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>TR CES 2078 F</title>   
<meta name="description" content="Bootstrap.">  
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<style>
.table-striped tbody tr:nth-child(odd) td,
.table-striped tbody tr:nth-child(odd) th {
	background-color: #DFF0D8;
}
.th {
  background-color: #04AA6D;
  color: white;
}
</style>

</head>  
<body style="margin:20px auto">  
<div class="container">
<div class="row header" style="text-align:center;color:green">
<h3>TR-CES-2708F</h3>
</div>
<br>

<div class="row header" style="text-align:left;color:blue">
<h3><a href="qctest.php">Home</a></h3>
</div>

<div class="row header" style="text-align:right;color:blue">
<h3><a href="logout.php">Logout</a></h3>
</div>
 <tr>
             <td colspan='5' style='text-align:center;background-color:powderblue;font-size:100%;'><b>PRODUCT LIST</b> <button><a href="export.php">Export Data</a></button></td></tr>

</tr>

<form  name="form" method="post" action="report.php" > 

<table id="myTable" class="table table-striped table-bordered table-responsive table-hover" > 

        <thead>  
          <tr>  
            <th>S.No.</th>  
            <th>Model Number</th>  
            <th>Device Type</th>  
            <th>Vendor Name</th>  
            <th>Device Serial Number</th>  
            <th>MAC Address</th>  
            <th>Software Version</th>  
            <th>Port Status</th>  
            <!--<th>Update</th> --> 

          </tr>  
        </thead>  

<?php
 
$sql = "Select * from device_detail";
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

?>
    <tbody>

<?php
while ($row = mysqli_fetch_array($query))
		{
    $id=$row['id'];
    $model_no=$row['model_no'];
    $device_type=$row['device_type'];
    $vendor_name=$row['vendor_name'];
    $serial_no=$row['serial_no'];
   $mac_address=$row['mac_address'];
   $software_version=$row['version'];
   $port_status=trim($row['port_status']);

   
      ?>

          <tr>
  
            <td><?php echo $id;?></td> 
            <td><?php echo $model_no;?></td>  
             <td><?php echo $device_type;?></td>  
            <td><?php echo $vendor_name;?></td>  
            <td><?php echo $serial_no;?></td>  
            <td><?php echo $mac_address;?></td>
            <td><?php echo $software_version;?></td>  
            <td><?php echo $port_status;?></td>  
  <!--<td><a href="update_port_status.php?serial_no=<?php echo $serial_no;?>"><button class="btn btn-sm btn-primary login-submit-cs" type="button" name="update">Update</button></a></td>
-->
          </tr>  
          <?php } ?>        
        </tbody>  
  
   </table>  
	  </div>
</form>
</body>
  
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>  
