<?php
include('dbconfig/config.php');
	if(isset($_GET['id'])){
		$test_id=$_GET['id'];
		}
$query="DELETE FROM `test` WHERE `test_id`='$test_id'";
$query1="DELETE FROM `question` WHERE `test_id`='$test_id'";
$query_run = mysqli_query($con,$query);
$query_run1 = mysqli_query($con,$query1);
if($query_run AND $query_run1)
{
echo '<script type="text/javascript"> alert("Quiz Removed Successfully...")</script>';	
echo "<script> location.href = 'update_quiz.php';</script>";
}
else{
	echo '<script type="text/javascript"> alert("Error In Removing")</script>';
}

?>
