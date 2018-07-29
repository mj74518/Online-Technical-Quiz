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

		
			<div class="row mt">
			<div class="col-md-12">
			<div class="content-panel">
			<center><h2>
					<font color="blue">
						<b>Student Registered</b>
					</font>
					</h2>
			</center>
			<form action="std_details.php" method="POST">

			<div id="dvContents">
			<table class="table table-hover table-condensed" >
				<thead>	
					<th><i class="fa fa-bullhorn"></i>Full_Name</th>	
					<th class="hidden-phone"><i class="fa fa-question-circle"></i>Email</th>				
					<th><i class="fa fa-bookmark">Contact</th>				
					<th>Highest Qualificaation</th> 
					<th>Year of Passing</th> 
					<th>City</th>
					<th>Address</th>
					<th colspan="3" style="text-align:center">Actions</th>
				</thead>
				<tbody>


			<?php

			$result_3 = $con->query("Select * from user");

			while($row_3 = mysqli_fetch_array($result_3))
				{ 			
				
					?>
					<tr>
					<td><?php echo $row_3['full_name']; ?></td>
					<td><?php echo $row_3['email'];	?></td>
					<td><?php echo $row_3['contact'];	?></td>
					<td><?php 
					$sql2="Select * from education_qualification";
					$result_4 = $con->query($sql2);
					while($row_4 = mysqli_fetch_array($result_4)){
						if($row_3['user_id'] == $row_4['user_id']){
						echo $row_4['edu_name'];	
						}
						else{
							echo "";
						}
					}?>
					</td>
					<td><?php 
					$sql2="Select * from education_qualification";
					$result_4 = $con->query($sql2);
					while($row_4 = mysqli_fetch_array($result_4)){
						if($row_3['user_id'] == $row_4['user_id']){
						echo $row_4['year_of_passing'];	
						}
						else{
							echo "";
						}
					}?></td>
					<td><?php echo $row_3['city_name']; ?></td>				
					<td><?php echo $row_3['address']; ?></td>				
						
						<td>
							<a href='update_profile.php?id=<?php echo $row_3['user_id']; ?>'data-toggle="tooltip" data-placement="top" title="Update Information"><span class="glyphicon glyphicon-edit" style="font-size:20px; color:black;"></span></a>
						</td>
						<td>
							<a href='delete_rec.php?del=<?php echo $row_3['user_id']; ?>' data-toggle="tooltip" data-placement="top" title="Delete Account"><span class="glyphicon glyphicon-trash" style="font-size:20px; color:red"></span></a>
						</td>
							
						<?php
				}
						?>  
				
			</div>
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
		}
		else
		{
			header('Location:logout.php');
		}

		?>
</html>
