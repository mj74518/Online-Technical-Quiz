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
		
			<div class="row">
			<div class="col-lg-12 main-chart">
			<a href="index.php"><input  type="submit"  class="btn btn-success" value="Back"/></a>
			<div style="color:#000;"><h2><b>DASHBOARD</b></h2></div>
			<hr>
			<form action="update_quiz.php" method="POST">	
		<center>
		<div style="width:70%; background:#fff; padding:1% 3% 3% 3% ; border-radius:3px;">
		
		<center><h2><b>Available Quiz Details</b></h2></center><br>
		<table class="table table-striped table-advance table-hover" style="width:95%; background:#fff;" >
				<thead>
					<th>Subject</th>	
					<th>Quiz Name</th>	
					<th>Total Questions</th>				
					<th>Total Time</th>				
					<th colspan="3" style="text-align:center">Actions</th>
				</thead>
				<tbody>
					<?php
					if(isset($_GET['sub_id'])){
					$sub=$_GET['sub_id'];
					$result_3 = $con->query("Select * from test WHERE sub_id=$sub");	
					}
					else{
						$result_3 = $con->query("Select * from test");
					}
				while($row_3 = mysqli_fetch_array($result_3))
				{ 			
				
					?>
					<tr>
					<td><?php
					$sub_id=$row_3['sub_id'];
					$q = $con->query("SELECT sub_name FROM subject WHERE sub_id=$sub_id");
				
					while($row = mysqli_fetch_array($q))
					{
											
					echo $row['sub_name'];
						
					}
					?></td>
					<td><?php echo $row_3['test_name']; ?></td>
					<td><?php echo $row_3['total_ques']; ?></td>
					<td><?php echo $row_3['total_time']; ?></td>
													
					<td>
					<?php
					$username=$_SESSION['username'];
					$test=$row_3['test_id'];
					$query= " select * from answer WHERE user_id='$username' AND test_id='$test'";
					$query_run = mysqli_query($con,$query);
					 
					if(mysqli_num_rows($query_run)>0)
					{
					?>
						<span class="glyphicon glyphicon-ban-circle" style="color:red; cursor:pointer;">&nbsp;COMPLETED</span>
					<?php
					}
					else{
					?>
					<a href='quiz_play.php?test_id=<?php echo $row_3['test_id']?>&s_no=1&total=<?php echo $row_3['total_ques'];?>' data-toggle="tooltip" data-placement="top" title="Update Quiz">
						<span class="glyphicon glyphicon-play">&nbsp;START</span></a>
										
					<?php 
					}
					?>
					</td>
						
						<?php
				}
						?>  


					
				</tbody>
			</table>
		</div>	
</center>			
		</form>

			
		
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
