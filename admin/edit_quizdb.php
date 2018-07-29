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
$que_id=mysqli_real_escape_string($con,$_POST["que_id$i"]);
$a=mysqli_real_escape_string($con,$_POST[$i.'ans1']);
$b=mysqli_real_escape_string($con,$_POST[$i.'ans2']);
$c=mysqli_real_escape_string($con,$_POST[$i.'ans3']);
$d=mysqli_real_escape_string($con,$_POST[$i.'ans4']);
$correct_ans=mysqli_real_escape_string($con,$_POST['correct_ans'.$i]);
$query3="UPDATE `question` SET `quiz_ques`='$quiz_ques',`ans1`='$a',`ans2`='$b',`ans3`='$c',`ans4`='$d',`correct_ans`='$correct_ans' WHERE `test_id`='$test_id' AND `que_id`='$que_id'";
$query_run = mysqli_query($con,$query3);
}
if($query_run)
{
echo '<script type="text/javascript"> alert("Quiz Updated Successfully...")</script>';	
echo "<script> location.href = 'update_quiz.php';</script>";
}
else{
	echo '<script type="text/javascript"> alert("Error In Updating")</script>';
}

?>
