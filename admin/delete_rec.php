<?php
include('dbconfig/config.php');
if(isset($_GET['id'])){
$admin_id=$_GET['id'];
$query=mysqli_query($con,"DELETE FROM admin WHERE admin_id='$admin_id'");
if($query){
	echo '<script type="text/javascript"> alert("Subject Removed Successfully...")</script>';
	echo "<script> location.href = 'admin_details.php';</script>";
}
else
	{
		echo '<script type="text/javascript"> alert("Unable To Remove!")</script>';
		echo "<script> location.href = 'admin_details.php';</script>";
	}
}

elseif(isset($_GET['del'])){
$user_id=$_GET['del'];
$query=mysqli_query($con,"DELETE FROM user WHERE user_id='$user_id'");
if($query){
	echo '<script type="text/javascript"> alert("User Removed Successfully...")</script>';
	echo "<script> location.href = 'std_details.php';</script>";
}
else
	{
		echo '<script type="text/javascript"> alert("Unable To Remove!")</script>';
		echo "<script> location.href = 'std_details.php';</script>";
	}
}
?>