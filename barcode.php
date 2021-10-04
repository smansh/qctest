<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$link = mysqli_connect("localhost","root","teamw0rk22");
mysqli_select_db($link,"ttnp");

if(isset($_POST['submit'])){
	$barcode = $_POST['barcode'];
	$query = mysqli_query($link, "INSERT INTO barcode (barcode) VALUES ('$barcode')");
	header ("location:barcode.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>http://www.techjunkgigs.com/</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
body{
	background-color:#8c8c8c;
}
	.center-div
	{
	  position: absolute;
	  margin: auto;
	  top: 50px;
	  right: 0;

	  left: 0;
	  width: 250px;
	  height: 100px;
	 
	}
	</style>
	<script type="text/javascript">
		function remove(id)
		{
			if(confirm(' Sure to remove file ? '))
			{
				window.location='deletebarcode.php?remove_id='+id;
			}
		}
</script>	
</head>
<body>
<div class="center-div">
<form method = "POST" action = "barcode.php">
	<input type = "text" name = "barcode" autofocus required>
	<input type = "submit" name = "submit" value = "Insert">
</form>
<hr> 
<table class="table table-hover" width="100%" border="1" style = "border-collapse: collapse; background:#fff;">
    <tr style = "background-color:#86b300;">
    <td>Barcode</td>
    </tr>
    <?php
 $sql="SELECT * FROM barcode ORDER BY id DESC";
 $result_set=mysqli_query($link,$sql);

 while($row=mysqli_fetch_array($result_set))
 { ?>
        <tr>
        <td><?php echo $row['barcode'] ?></td>
        </tr>
		<?php } ?>
    </table>
</div>
<div><h1><a href = "">TR-CES2708-F</a></h1></div>
</body>
</html>

