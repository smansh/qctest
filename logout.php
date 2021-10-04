
<?php
include 'connect.php';
session_start();

 $user_id =  $_SESSION["user_id"] ;
 $user_name =  $_SESSION["user_name"] ;
 $user_email= $_SESSION["user_email"];
 $user_type= $_SESSION["user_type"];
 $logout_time=date("Y-m-d  H:i:s", time());
 $ip =  $_SERVER['REMOTE_ADDR'];
/*
echo $query = "SELECT * from visitor_log where user_id='$user_id'";
$result = mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))
{ 
  $user_name=$row['username'];
  $ipaddr=$row['ipaddr'];
  $action=$row['action'];
  $login_time=$row['login_time'];
}
*/
echo $Sql1="insert into  visitor_log (username,ipaddr,action,action_time) VALUES('$user_name','$ip','Logout','$logout_time') ";
$result1=mysqli_query($conn,$Sql1);

session_unset();
session_destroy();
header("location:index.php");
?>

