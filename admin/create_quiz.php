<?php
 session_start();
 ob_start();
 include('dbconfig/config.php');	
	if($_SESSION['username'])
{	
	$result_1 = $con->query("Select * from admin");
	while($row_1 = $result_1->fetch_assoc())
	{ 
	//echo $row_1['admin_name'];
		if($row_1['admin_id']==$_SESSION['username']){
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE TECHNICAL QUIZ</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />      
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

<body style="background-image:url('images/16.jpg'); background-size:100%;">
	<section id="container" >
  <?php
include('header_nav.php');
?>     
      <?php
		include('index_nav.php');
	  ?>
<section id="main-content">
			<section class="wrapper" style="width:98.5%">

			<div class="row">

			<div class="content-panel">
			<div class="row">
			<span class="title1" style="margin-left:20%;font-size:30px;">
			<b>Enter Quiz Details</b></span><br /><br />
			<div class="col-md-12"><div class="col-md-12"> 
			<a href="index.php"><input  type="submit"  class="btn btn-success" value="Back"/></a>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6">   
				<form class="form-horizontal title1" action="create_quiz.php"  method="post">
				<fieldset>


				<!-- Text input-->
				<div class="form-group">
				<label class="col-md-12 control-label"></label>  
				<div class="col-md-12">
				<input name="test_name" placeholder="Enter Quiz title" class="form-control input-md" type="text"/>

				</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				<label class="col-md-12 control-label"></label>  
				<div class="col-md-12">
			
				<select name="sub_id" class="form-control" >
				<option value="0">Select Subject</option>
					<?php
					$q = $con->query("SELECT sub_id,sub_name FROM subject");
					$i=1;
					while($row = mysqli_fetch_array($q))
					{
					?>						
					<option value="<?php echo $row['sub_id'];?>"><?php echo $row['sub_name'];?></option>
					<?php	
					}
					?>
				</select>  
				</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				<label class="col-md-12 control-label"></label>  
				<div class="col-md-12">
				<input name="total_ques" placeholder="Enter total number of questions" class="form-control input-md" type="number" />

				</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				<label class="col-md-12 control-label"></label>  
				<div class="col-md-12">
				<input name="total_time" placeholder="Enter time limit for test in minute" class="form-control input-md" type="number"/>

				</div>
				</div>
				
				<div class="form-group">
				<label class="col-md-12 control-label"></label>  
				<div class="col-md-12">
				<input name="marks" placeholder="Enter marks for each question" class="form-control input-md" type="number"/>

				</div>
				</div>


				<div class="form-group">
				<label class="col-md-12 control-label"></label>
				<div class="col-md-12"> 
				<input  type="submit" name="create_btn" style="margin-left:45%" value="Submit" class="btn btn-primary"/>
				</div>
				</div>

				</fieldset>
				</form>
			</div>

			</div>
			</div>
			</div>
			</div>
			<!--*******************************************************************************************************************************************  -->
			<?php

				if(isset($_POST['create_btn'])){
				
			
				$sub_id = $_POST['sub_id'];
				$test_name = $_POST['test_name'];
				$total_ques = $_POST['total_ques'];
				$total_time = $_POST['total_time'];
				$marks = $_POST['marks'];
				$ff=$_POST['test_name'];
				$name=explode(" ",$ff);
				$test_id = "";
				foreach($name as $i){
					$test_id = $test_id . $i;
				}
				$test_id=$test_id.date("Ymd");
				
				$quer="SELECT * from test WHERE test_name='$test_name'";
				$que=mysqli_query($con,$quer);
				
				if(mysqli_num_rows($que)>0){
				echo '<script type="text/javascript"> alert("Quiz '.$test_name.'<b> already exits")</script>';
				echo "<script> location.href = 'create_quiz.php';</script>";
				}
					else{
					$query="INSERT INTO `test` (`test_id`,`sub_id`,`test_name`,`total_ques`,`total_time`,`marks_per_ques`) VALUES 
					('$test_id','$sub_id','$test_name','$total_ques','$total_time','$marks')";
					$query_run = mysqli_query($con,$query);
					if($query_run){
					echo '<script type="text/javascript"> alert("Quiz Created Successfully")</script>';
					header("location:create_quiz2.php?test_id=$test_id&n=$total_ques");
					}
					else{
					echo '<script type="text/javascript"> alert("Error Creating")</script>';		
					}
				}
				}
			?>				
			</section>
	</section>

<footer class="site-footer" style="bottom:0px; position:fixed; width:100%;">
	<div class="text-center">2018 - Mohit Chandra Joshi
	<a href="create_quiz.php#" class="go-top">
	<i class="fa fa-angle-up"></i>
	</a>
	</div>
</footer>
</section>

   
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>

    <script src="assets/js/common-scripts.js"></script>
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

  </body>
  <?php 
	}
	}
		}
		else
		{
			header('Location:logout.php');
		}

		?>
</html>
