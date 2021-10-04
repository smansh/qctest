<?php
session_start();
 require('connect.php');

  date_default_timezone_set("Asia/Kolkata");



$log_time=date("Y-m-d  H:i:s", time());

$ip =  $_SERVER['REMOTE_ADDR'];

if (isset($_POST['username']) and isset($_POST['password']))
{
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
$st_id = $_POST['st_id'];

$admin = $_POST['admin'];

//3.1.2 Checking the values are existing in the database or not

if($admin=='on')
{
echo $query = "select * from  user where user_name='$username' and user_password='$password' and user_type='admin'  and user_status='Active'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row  = mysqli_fetch_array($result);
if(is_array($row)) {

         $_SESSION['start'] = time();
	 // taking now logged in time
	$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;


       $_SESSION["user_id"] = $row['user_id'];
       $_SESSION["user_name"] = $row['user_name'];
       $_SESSION["user_email"] = $row['user_email'];
       $_SESSION["user_type"] = $row['user_type'];

       $_SESSION["st_id"] = $st_id;

echo "connected with master";
echo "<script language='javascript' type='text/javascript'> location.href='main.php' </script>";

	} 
else
{

echo ("<SCRIPT LANGUAGE='JavaScript'>
window.location.href='index.php';
window.alert('User Name Or Password Invalid!')
</SCRIPT>");


//$Sql1="insert into  unauthoriz (time,ipaddr,username,password,status) VALUES('$log_time','$ip','$username','$password','login_failed') ";
//$result1=mysqli_query($con,$Sql1);
}

}
else
{
 $query = "select * from  user where user_name='$username' and user_password='$password' and user_status='Active'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION['start'] = time();
	 // taking now logged in time
	$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;

      
       $_SESSION["user_id"] = $row['user_id'];
       $_SESSION["user_name"] = $row['user_name'];
       $_SESSION["user_email"] = $row['user_email'];
       $_SESSION["user_type"] = $row['user_type'];
       $_SESSION["st_id"] = $st_id;

       $user_name=$row['user_name'];
//echo "connected with local user";


echo "<script language='javascript' type='text/javascript'> location.href='qctest.php' </script>";

echo $Sql1="insert into  visitor_log (username,ipaddr,action,action_time) VALUES('$user_name','$ip','Login','$log_time') ";

$result1=mysqli_query($conn,$Sql1);

} 
else
{


echo ("<SCRIPT LANGUAGE='JavaScript'>
window.location.href='index.php';
window.alert('User Name Or Password Invalid!')
</SCRIPT>");

}

}


}

?>
