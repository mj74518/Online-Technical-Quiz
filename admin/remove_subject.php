<?php
include('dbconfig/config.php');
if(isset($_GET['id'])){
$sub_id=$_GET['id'];
$query=mysqli_query($con,"DELETE FROM subject WHERE sub_id='$sub_id'");
if($query){
	echo '<script type="text/javascript"> alert("Subject Removed Successfully...")</script>';
	echo "<script> location.href = 'update_course.php';</script>";
}
else
	{
		echo '<script type="text/javascript"> alert("Unable To Remove!")</script>';
		echo "<script> location.href = 'update_course.php';</script>";
	}
}
?>