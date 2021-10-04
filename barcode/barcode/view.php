<!DOCTYPE html>
<html>
<head>
	<title>View Products</title>
	<?php 
require_once 'dashboard.php';
$fdate = $_POST['fdate'];
$tdate = $_POST['tdate'];

?>
    <script src="datetimepicker_css.js"></script>

</head>
<body>
	<div class="container pt-5">
		<div class="table-responsive">
			<table class='table table-bordered table-sm'>
			<thead class='thead-light'>
				<tr>

<td style='text-align:center;background-color:powderblue;font-size:100%;'> From Date <input type="text" id="dateInput" name="fdate" class="dateInput"/></td>
<td style='text-align:center;background-color:powderblue;font-size:100%;'> To Date <input type="text" id="dateInput" name="tdate" class="dateInput"/></td>

<td style='text-align:center;background-color:powderblue;font-size:100%;'>
	<input type="submit" class="button1" name="search" value="Search" class="submit">
	</td>

<td colspan='5' style='text-align:center;background-color:powderblue;font-size:100%;'><b>PRODUCT LIST</b> <button><a href="export.php">Export Data</a></button></td></tr>
				<tr><th class='text-center'><b>SL NO</b></th>
					<th class='text-center'><b>PRODUCT NUMBER</b></th>
					<th class='text-center'><b>PRODUCT NAME</b></th>
					<th class='text-center'><b>BATCH NUMBER</b></th>
					<th class='text-center'><b>PRODUCTION DATE</b></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include 'connection.php';
				$sql="SELECT * FROM `barcode`";
				$res=mysqli_query($con,$sql);
				while ($row=mysqli_fetch_array($res)) {
				    echo "<tr align='center'>
				    		<td>$row[0]</td>
				    		<td>$row[1]</td>
				    		<td>$row[2]</td>
				    		<td>$row[3]</td>
				    		<td>$row[5]</td>

				    	  </tr>";
				}
				?>
			</tbody>

			</table>
		</div>
	</div>
</body>
</html>