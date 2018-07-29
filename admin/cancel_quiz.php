<?php
include('dbconfig/config.php');
	if(isset($_GET['id'])){
		$test_id=$_GET['id'];
		}
$query="DELETE FROM `test` WHERE `test_id`='$test_id'";
$query_run = mysqli_query($con,$query);
if($query_run)
{
echo '<script type="text/javascript"> alert("Quiz Cancelled Successfully...")</script>';	
echo "<script> location.href = 'create_quiz.php';</script>";
}
else{
	echo '<script type="text/javascript"> alert("Error In Removing")</script>';
}

?>
