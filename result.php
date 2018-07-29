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

  <body style="background-image:url('images/header.jpg'); background-size:100% cover;">

  <section id="container" >    
      <?php
		include('index_nav.php');
	  ?>
		
		<div class="row">
		<div class="col-lg-12 main-chart" style="display: flex;
    justify-content: center;
    align-items: center;
	margin-top:10%;">
		
		
		<center>
		<div class="col-sm-12" style="background:#fff; padding:1% 3% 3% 3% ; border-radius:3px;">
		<center><h2><b>LAST ATTEMPT RESULT</b></h2></center><hr>
	<?php
	$test_id=$_GET['test_id'];
	$sql="SELECT * FROM result WHERE test_id='$test_id'";
	$result=$con->query($sql);
		while($row=mysqli_fetch_array($result)){
	?>
		<table class="table table-striped table-advance table-hover" style="width:95%; background:#fff;" >
			<thead>
				<th>NAME</th>
				<th>QUIZ_NAME</th>
				<th>SUBJECT</th>
				<th>CORRECT</th>
				<th>INCORRECT</th>
				<th>USER_SCORE</th>
			</thead>
			<tbody>
			<tr>
				<td>
					<?php
					$user_id=$row['user_id'];
					$result_5 = $con->query("Select full_name from user WHERE user_id='$user_id'");
					while($row_5 = $result_5->fetch_assoc())
					{ 
					echo $row_5['full_name']; 			
					}
					?>
				</td>
			
				<td>
					<?php 
					$test_id=$row['test_id'];
					$result_7 = $con->query("Select * from test WHERE test_id='$test_id'");
					while($row_7 = $result_7->fetch_assoc())
					{ 
					echo $row_7['test_name']; 			
					
					?>
				</td>
				<td>
					<?php
					$sub_id=$row_7['sub_id'];
					$result_6 = $con->query("Select sub_name from subject WHERE sub_id='$sub_id'");
					while($row_6 = $result_6->fetch_assoc())
					{ 
					echo $row_6['sub_name']; 			
					}
					}
					?>
				</td>
				<td><?php echo $row['correct'] ?></td>
				<td><?php echo $row['incorrect'] ?></td>
				<td><?php echo $row['user_score'] ?></td>
			</tr>
			</tbody>
		</table>
	<?php 
			}
	
	?>	
	<a href="index.php"><input  type="submit" style="float:right"  class="btn btn-success" value="Continue"/></a>
		</div>	
</center>			
		

			
		
			</div>
			</div>
			<br />
			<br />
                  
		  
      
    
	  
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
