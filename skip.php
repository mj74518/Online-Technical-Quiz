<?php
 session_start();
 ob_start();
 include('dbconfig/config.php');

$test_id=@$_GET['test_id'];
$s_no=@$_GET['s_no'];
$total=@$_GET['total'];
$que_id=@$_GET['que_id'];
$user_id=$_SESSION['username'];
$q=mysqli_query($con,"SELECT * FROM question WHERE que_id='$que_id' " );
while($row=mysqli_fetch_array($q) )
{	
	$ans1=$row['ans1'];
	$ans2=$row['ans2'];
	$ans3=$row['ans3'];
	$ans4=$row['ans4'];
	
	$correct_ans=$row['correct_ans'];
	if($correct_ans=='a'){
		$correct_ans=$ans1;	
	}
	elseif($correct_ans=='b'){
		$correct_ans=$ans2;
	}
	elseif($correct_ans=='c'){
		$correct_ans=$ans3;
	}
	elseif($correct_ans=='d'){
		$correct_ans=$ans4;
	}
}
	if($s_no < $total)
	{
		$s_no=$s_no+1;
		header("location:quiz_play.php?test_id=$test_id&s_no=$s_no&total=$total");
	}
	elseif($s_no = $total)
	{
		$result_4 = mysqli_query($con,"SELECT * FROM answer WHERE user_id='$user_id' AND test_id='$test_id'");
		$rows = mysqli_num_rows($result_4);
		$attempted=$rows;
		$unattempted=$total-$rows;

		$query1="INSERT INTO `at_unat_ques`(`id`,`user_id`, `test_id`, `attempted`, `unattempted`) VALUES ('','$user_id', '$test_id', '$attempted', '$unattempted')";
		$query_run1 = mysqli_query($con,$query1);
		
		if($query_run1){
			$result_7 = mysqli_query($con,"SELECT * FROM at_unat_ques WHERE user_id='$user_id' AND test_id='$test_id'");
			$result_8 = mysqli_query($con,"SELECT marks_per_ques FROM test WHERE test_id='$test_id'");
			while($rowsresult=mysqli_fetch_array($result_7) AND $rowsresult1=mysqli_fetch_array($result_8) )
			{
			$marks=($rowsresult1['marks_per_ques']);
			
			$result_9 = mysqli_query($con,"SELECT * FROM answer WHERE user_id='$user_id' AND test_id='$test_id' AND correct_ans=user_ans");
			$correct = mysqli_num_rows($result_9);
			$incorrect = $total-$correct;
		
			$user_score=$correct * $marks;
			$test_date=date('y/m/d');
			$resultquery="INSERT INTO `result`(`user_id`, `test_id`, `test_date`, `correct`, `incorrect`, `user_score`) VALUES 
			('$user_id', '$test_id', '$test_date', '$correct', '$incorrect', '$user_score')";
			$query_ = mysqli_query($con,$resultquery);
			if($query_){
			echo '<script type="text/javascript"> alert("Quiz Completed...")</script>';
			echo "<script> location.href = 'index.php';</script>";
			}
			}
		}
		
	}
	
	else
		{
		header("location:index.php")or die('Error152');
	}
?>