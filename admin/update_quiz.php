<?php	
 session_start();
 ob_start();
 include('dbconfig/config.php');	
	if($_SESSION['username'])
{	
	$result_1 = $con->query("Select * from admin  ");
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
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />      
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body style="background-image:url('images/16.jpg'); background-size:100%;">
<?php
include('header_nav.php');
?>     
<?php
include('index_nav.php');
?>
<section id="main-content">
		<section class="wrapper">
		
	
		<div class="col-md-12">
		<div class="content-panel">
		<tr><td><a href="index.php"><input  type="submit"  class="btn btn-primary" style="margin-left:2%;" value="Back"/></a></td></tr>
		<table class="table-striped table-advance table-hover table-condensed" style="margin-left:8%;">
		
			<form class="form-horizontal title1" action="update_quiz.php"  method="post">
			<tr>
				<td><input name="test_name" placeholder="Enter Quiz Name" class="form-control input-md" type="text" required /></td>
				<td><button name="search" type="submit" class="btn btn-success" title="Search Quiz"><i class="fa fa-search"></i>&nbsp;Search</button></td>
			</tr>
			</form>
		</table>
		
		<form action="update_quiz.php" method="POST">	
		<center>
			<table class="table table-striped table-advance table-hover" style="width:70%" >
			<h2><b>Available Quiz Details</b></h2>
				<thead>	
					<th class="visible-lg visible-md">Subject</th>	
					<th>Quiz Name</th>	
					<th>Total Questions</th>				
					<th>Total Time</th>				
					<th colspan="2">Actions</th>
				</thead>
				<tbody>
					<?php
					if(isset($_POST['search']))
					{
						$test_name=$_POST['test_name'];
						
						$sql1="Select * from test WHERE test_name='$test_name';";
						$result_3 = $con->query($sql1);
						if(mysqli_num_rows($result_3)<=0)
						{
						echo "<div style='color:red'><b>The Quiz \"$test_name\" Not Found.......</b><div><br>";
						$result_3 = $con->query("Select * from test");
						}
					}
					
					else{
						$result_3 = $con->query("Select * from test");
					}
				while($row_3 = mysqli_fetch_array($result_3))
				{ 			
				
					?>
					<tr>
					<td class="visible-lg visible-md"><?php 
					$sub_id=$row_3['sub_id'];
					$q = $con->query("SELECT sub_name FROM subject WHERE sub_id=$sub_id");
				
					while($row = mysqli_fetch_array($q))
					{
											
					echo $row['sub_name'];
						
					} ?></td>
					<td><?php echo $row_3['test_name']; ?></td>
					<td><?php echo $row_3['total_ques']; ?></td>
					<td><?php echo $row_3['total_time']; ?></td>
													
					<td>
						<a href='edit_quiz.php?id=<?php echo $row_3['test_id']?>&n=<?php echo $row_3['total_ques'];?>' data-toggle="tooltip" data-placement="top" title="Update Quiz">
						<span class="glyphicon glyphicon-edit" style="font-size:20px; color:black;"></span></a>
					</td>
					<td>
						<a href='remove_quiz.php?id=<?php echo $row_3['test_id']; ?>' data-toggle="tooltip" data-placement="top" title="Remove Quiz">
						<span class="glyphicon glyphicon-trash" style="font-size:20px; color:red"></span></a>
					</td>
						
						<?php
				}
						?>  
					
					
				</tbody>
			</table>
</center>			
		</form>
		</div>
	</div>
	</div>
	
	</div>

	</section>
	</section>
<footer class="site-footer" style="bottom:0px; position:fixed; width:100%;">
	<div class="text-center">2018 - Mohit Chandra Joshi
	<a href="update_quiz.php#" class="go-top">
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