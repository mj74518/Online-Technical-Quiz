<?php	
 session_start();
 ob_start();
 include('dbconfig/config.php');	
	if($_SESSION['username'])
{	
	$result_1 = $con->query("Select * from user");
	while($row_1 = $result_1->fetch_assoc())
	{ 
		if($row_1['user_id']==$_SESSION['username']){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE TECHNICAL QUIZ</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />  
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  
  </head>

  <body style="background-image:url('images/header.jpg'); background-size:100%;">

  <section id="container" >
      
      <?php
		include('index_nav.php');
	  ?>
          <section class="wrapper">
		<?php
			$test_id=@$_GET['test_id'];
			$que_id=@$_GET['que_id'];
			$total=@$_GET['total'];
			$s_no=@$_GET['s_no'];
		$result=$con->query("SELECT * FROM question WHERE test_id='$test_id' AND s_no='$s_no'");
while($row = $result->fetch_assoc())
	{
	$quiz_ques=$row['quiz_ques'];
	$que_id=$row['que_id'];
	$ans1=$row['ans1'];
	$ans2=$row['ans2'];
	$ans3=$row['ans3'];
	$ans4=$row['ans4'];
	$user_id=$row_1['user_id'];
	
		?>
			<div class="row">
			<div class="col-lg-12 main-chart">
			
			<hr>
		
<div class="panel" style="margin:0 auto; width:50%; padding:0.6%">

	<form  method="post" action="quiz_playnext.php?test_id=<?php echo $test_id ?>&s_no=<?php echo $s_no ?>
	&total=<?php echo $total ?>&que_id=<?php echo $que_id ?>"><br />
		
	<table class="table" style="margin:0 auto;" width="95%">
		<thead><h4><b>Question &nbsp;<?php echo $s_no; ?>&nbsp;:: <?php echo $quiz_ques ?></b></h4></thead><br /><br />
		<tbody>
		<tr><td>a)</td>
			<td><input class ="radio-inline" type="radio" name="ans" value="<?php echo $ans1 ?>" />&nbsp;&nbsp;&nbsp;<?php echo $ans1 ?></td>
		<td>b)</td>
			<td><input class ="radio-inline" type="radio" name="ans" value="<?php echo $ans2 ?>" />&nbsp;&nbsp;&nbsp;<?php echo $ans2 ?></td>
		</tr>
		<tr><td>c)</td>
			<td><input class ="radio-inline" type="radio" name="ans" value="<?php echo $ans3 ?>" />&nbsp;&nbsp;&nbsp;<?php echo $ans3 ?></td>
		
			<td>d)</td>
			<td><input class ="radio-inline" type="radio" name="ans" value="<?php echo $ans4 ?>" />&nbsp;&nbsp;&nbsp;<?php echo $ans4 ?></td>
		</tr>
		
	
		</tbody>
	</table><br>
	<div align="right">
	<a href="skip.php?test_id=<?php echo $test_id ?>&s_no=<?php echo $s_no ?>&total=<?php echo $total ?>&que_id=<?php echo $que_id ?>"
			name="skip" class="btn btn-round btn-primary">Skip</a>&nbsp;
				<input type="submit" name="save" class="btn btn-round btn-success" value="Submit & Next"></div>
	</form>
	
	<?php
	}
	?>
</div>		

			
			</div>
			</div>
			<br />
			<br />
			
      </section>
	<footer class="site-footer" style="bottom:0px;position:fixed;width:100%;">
	<div class="text-center">2018 - Mohit Chandra Joshi
	<a href="index.php#" class="go-top"><i class="fa fa-angle-up"></i></a>
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

    <!--common script for all pages-->
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
