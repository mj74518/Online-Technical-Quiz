<?php	
 session_start();
 ob_start();
 include('dbconfig/config.php');	
	if($_SESSION['username'])
{	
	$admin_id=$_SESSION['username'];
	$result_1 = $con->query("Select * from admin WHERE admin_id='$admin_id' AND master_yes_or_no='Y'");
	if(mysqli_num_rows($result_1)>0){
	while($row_1 = $result_1->fetch_assoc())
	{ 
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

			
			<div class="row mt">
			<div class="col-md-12">
			<div class="content-panel">
			<center><h2>
					<font color="blue">
						<b>Admin Registered</b>
					</font>
					</h2>
			</center>

			<table class="table table-responsive table-hover table-condensed" >
				<thead>	
					<th><i class="fa fa-bullhorn"></i>&nbsp;Full_Name</th>	
					<th><i class="fa fa-question-circle"></i>&nbsp;Email</th>				
					<th><i class="fa fa-bookmark">&nbsp;Contact</th>				 
					<th>Actions</th>
				</thead>
				<tbody>


			<?php

			$result_3 = $con->query("Select * from admin");

			while($row_3 = mysqli_fetch_array($result_3))
				{ 			
				
					?>
					<tr>
					<td><?php echo $row_3['admin_name']; ?></td>
					<td><?php echo $row_3['email'];	?></td>
					<td><?php echo $row_3['contact'];	?></td>
				
					<td>
						<a href='update_admin.php?id=<?php echo $row_3['admin_id']; ?>'data-toggle="tooltip" data-placement="top" title="Update Information"><span class="glyphicon glyphicon-edit" style="font-size:20px; color:black;"></span></a>
					&nbsp;
						<a href='delete_rec.php?id=<?php echo $row_3['admin_id']; ?>' data-toggle="tooltip" data-placement="top" title="Delete Account"><span class="glyphicon glyphicon-trash" style="font-size:20px; color:red"></span></a>
					</td>
							
						<?php
				}
						?>
			</tbody>						
			</table>						
				
			</div>
			</div>
			</div>
		
			
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
		else
		{
		echo '<script type="text/javascript"> alert("You Do not have authority to view Admin Details...")</script>';
		echo "<script> location.href = 'index.php';</script>";
		}

	}
	else
	{
	header('Location:logout.php');
	}

	?>
</html>