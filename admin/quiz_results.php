<?php	
 session_start();
 ob_start();
 include('dbconfig/config.php');	
	if($_SESSION['username'])
{	
	$result_1 = $con->query("Select * from admin");
	while($row_1 = $result_1->fetch_assoc())
	{ 
		if($row_1['admin_id']==$_SESSION['username']){
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

  <body style="background-image:url('images/16.jpg'); background-size:cover; background-position:center;">

  <section id="container" >
<?php
include('header_nav.php');
?>     
      <?php
		include('index_nav.php');
	  ?>
      <section id="main-content">
          <section class="wrapper">
		
			<div class="row">
			<div class="col-lg-12 main-chart">
			<div style="color:#000;"><h2><b>Attempted Quizes By Users</b></h2></div>
			<div class="col-md-12"> 
			<a href="view_results.php"><input  type="submit"  class="btn btn-success" value="Back"/></a>
			</div>
			<hr>
			<form action="update_quiz.php" method="POST">	
		<center>
		<div style="width:70%; background:#fff; padding:1% 3% 3% 3% ; border-radius:3px;">
		<?php
		$test_id=$_GET['test_id'];
		
				$result = $con->query("Select test_name from test WHERE test_id='$test_id'");
				while($row = mysqli_fetch_array($result))
				{ 			
				
		?>
		<center><h2><b><?php echo $row['test_name']; ?> Details</b></h2></center><br>
		<?php
		}
		?>
		<table class="table table-striped table-advance table-hover" style="width:95%; background:#fff;" >
				<thead>	
					<th>User Name</th>	
					<th>Quiz Name</th>
					<th>Total Questions</th>				
					<th>Total Time</th>				
					<th>Total Attempted</th>				
					<th>Total Unattempted</th>				
				</thead>
				<tbody>
					<?php
				$result_3 = $con->query("Select DISTINCT user_id from answer WHERE test_id='$test_id'");
				while($row_3 = mysqli_fetch_array($result_3))
				{ 			
				
					?>
					<tr>
					<td>
						<?php
						$user_id=$row_3['user_id'];
						$q = $con->query("SELECT full_name FROM user WHERE user_id='$user_id'");
						while($row_4 = mysqli_fetch_array($q))
						{					
						echo $row_4['full_name'];	
						}
						?>
					</td>	
						<?php
						$q1 = $con->query("SELECT * FROM test WHERE test_id='$test_id'");
						while($row_5 = mysqli_fetch_array($q1))
						{
						?>
					<td>
						<?php							
						echo $row_5['test_name'];	
						?>
					</td>
					<td>
						<?php
						echo $row_5['total_ques'];
						?>
					</td>
					<td><?php echo $row_5['total_time']; } ?></td>
					<td>
					<?php
					$result_4 = mysqli_query($con,"SELECT * FROM answer WHERE user_ans!=' ' AND user_id='$user_id' AND test_id='$test_id'");
					$rows = mysqli_num_rows($result_4);
					echo $rows;
					?>
					</td>									
					<td>
					<?php
					$result_4 = mysqli_query($con,"SELECT * FROM answer WHERE user_ans=' ' AND user_id='$user_id' AND test_id='$test_id'");
					$rows = mysqli_num_rows($result_4);
					echo $rows;
					?>
					</td>
					<?php
				}
					?>
				</tbody>
				<td colspan="5">
					</td>
					<td><a href='final_results.php?test_id=<?php echo $test_id; ?>' data-toggle="tooltip" data-placement="top" title="Update Quiz">
					<span class="glyphicon glyphicon-hand-right" style="color:green; cursor:pointer;">&nbsp;Final RESULTS</span></a>	
					</td>
			</table>
		</div>	
</center>			
		</form>
			</div>
			</div>
			<br />
			<br />
                  
          </section>
		  
      </section>
	  
	<?php
	include('footer.php');
	?>
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
