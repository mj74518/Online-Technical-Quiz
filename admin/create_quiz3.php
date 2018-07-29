<?php
include('dbconfig/config.php');
	if(isset($_GET['n'])){
		$n=$_GET['n'];
		};
	if(isset($_GET['test_id'])){
		$test_id=$_GET['test_id'];
		}
	
?>
<?php
for($i=1;$i<=$n;$i++){
	
$quiz_ques=mysqli_real_escape_string($con,$_POST["qns".$i]);
$s_no=$i;
$a=mysqli_real_escape_string($con,$_POST[$i.'1']);
$b=mysqli_real_escape_string($con,$_POST[$i.'2']);
$c=mysqli_real_escape_string($con,$_POST[$i.'3']);
$d=mysqli_real_escape_string($con,$_POST[$i.'4']);
$correct_a=mysqli_real_escape_string($con,$_POST['ans'.$i]);


$query2="INSERT INTO `question`(`s_no`, `test_id`, `quiz_ques`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_ans`) VALUES 
('$s_no', '$test_id', '$quiz_ques', '$a', '$b', '$c', '$d', '$correct_a')";
$query_run = mysqli_query($con,$query2);
if($query_run)
{
echo '<script type="text/javascript"> alert("Questions Added Successfully...")</script>';	
echo "<script> location.href = 'update_quiz.php';</script>";
}
else{
	echo '<script type="text/javascript"> alert("Error In Creating")</script>';
}
	
}
?>
