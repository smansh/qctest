<?php 
include 'connection.php';
$query= "SELECT max(id) from barcode";
$result=mysqli_query($con,$query);
$roow=mysqli_fetch_array($result);
     if($roow[0] == null){
          $idnomax=1;
     }else{
          $idnomax=$roow[0]+1;
     }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Product</title>

<?php 
require_once 'dashboard.php';
?>
<style type="text/css">
	
.box{
    box-shadow: 0px 0px 0px 0px ;
    margin-top: 7px;
    height: 620px;
 }

  .box:hover{
    box-shadow: 2px 5px 20px 0px ;
  }

</style>

</head>
<body>
	<div class="container mt-5">
                <?php $bno = date("ym"); ?>

		<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6 box">
		<h3 style="text-align: center;padding-top: 10px"><b>ADD PRODUCT</b></h3>

			<form method="POST" action="new.php" autocomplete="off" onsubmit="return check()">
			<div class="form-group">
			<label>ID: </label>
			<input type="text" class="form-control" id="maxid" value="<?php echo $idnomax ?>" readonly>
			</div>	
			<div class="form-group">
			<label>Barcode Number: </label>
			<input type="text" id="serial_number" name="serial_number" autofocus class="form-control" required>
			</div>
			<div class="form-group">
			<label>Product Name: </label>
			<input type="text" id="model" name="model" value="TR-CES2708-F" class="form-control" required>
			</div>
			<div class="form-group">
			<label>Batch Number: </label>
			<input type="text" id="bno" name="bno" value="<?php echo $bno;?>"class="form-control" required>
			</div>
			<!--<div class="form-group">
			<label>Product Description: </label>
			<textarea id="prddesc" name="prddesc" class="form-control" ></textarea>
			
			</div>-->
			<button class="btn btn-info" name="submit" type="submit">Save</button>
			</form>


		</div>
		</div>
	</div>
		<script type="text/javascript">
			function check(){
			prddesc=$('#prddesc').val();
			
			if (prddesc.length <= 250) {
				return true;

			}else{
				alert('Description Should be less Than 250 Characters');
				return false;
			}
			}

		</script>
</body>

</html>

<?php
include 'connection.php';
 date_default_timezone_set("Asia/Kolkata");

 $scan_date = date("Y-m-d  H:i:s");

if (isset($_POST['submit'])) {
	

    $serial_number = $_POST['serial_number'];
    $model = $_POST['model'];
    //$bno = $_POST['bno'];
     $bno = date("ym");
    $prddesc = $_POST['prddesc'];

$check=mysqli_query($con,"select * from barcode where serial_number='$serial_number'");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
/*
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='new.php';
 window.alert('Serial number exists')
    </SCRIPT>");
*/
header ("location:new.php");

}
else
{
    $CreateSql = "INSERT INTO `barcode`(`id`, `serial_number`, `model`, `batchnumber`, `prodesc`,`scan_date`) VALUES 
    ('$idnomax','$serial_number','$model','$bno','$prddesc','$scan_date')";

    $res=mysqli_query($con, $CreateSql);
}

    if ($res) {

/*
echo '<script type="text/javascript">'; 
echo 'alert("Successfully Inserted");'; 
echo 'window.location.href = "new.php";';
echo '</script>';
*/
header ("location:new.php");

    	$query= "SELECT max(id) from barcode";
		$result=mysqli_query($con,$query);
		$roow=mysqli_fetch_array($result);
		     if($roow[0] == null){
		          $idnomax=1;
		     }else{
		          $idnomax=$roow[0]+1;
		     }

		    echo '<script>
	
				$("#maxid").val('.$idnomax.');
			</script>';

    }else {
    	//echo "<script>alert('Not Inserted');</script>";
    }
}
mysqli_close($con);
 
?>
