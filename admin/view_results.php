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
         
		<section class="wrapper" style="width:98.5%">
		
		<div class="row mt">
		<div class="col-md-12">
		<div class="content-panel">
		<a href="index.php"><input  type="submit"  class="btn btn-success" style="margin-left:2%;" value="Back" /></a>
		
		<table class="table table-advance table-hover" style="width:95%; text-align:center; margin:0 auto; background:#fff;" >
				<caption><h2><b>Available Quiz Details</b></h2></caption><br>
				<thead>
					<th class="visible-md visible-lg" >Subject</th>	
					<th>Quiz Name</th>	
					<th>Total Questions</th>				
					<th>Total Time</th>				
					<th colspan="1" style="text-align:center">Attempt/Unattempted</th>
					<th colspan="1" style="text-align:center">Actions</th>
				</thead>
				<tbody>
					<?php
				$result_3 = $con->query("Select * from test");
				while($row_3 = mysqli_fetch_array($result_3))
				{ 			
				
					?>
					<tr>
					<td class="visible-md visible-lg" ><?php
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
													
					
					<?php
					$test=$row_3['test_id'];
					$query= " select * from answer WHERE test_id='$test'";
					$query_run = mysqli_query($con,$query);
					 
					if(mysqli_num_rows($query_run)>0)
					{
					?>
					<td>
						<span class="glyphicon" style="color:green; cursor:pointer;">&nbsp;ATTEMPTED</span>
					</td>
					<td>
					<a href='quiz_results.php?test_id=<?php echo $row_3['test_id']?>' data-toggle="tooltip" data-placement="top" title="Update Quiz">
					<span class="glyphicon glyphicon-hand-right" style="color:green; cursor:pointer;">&nbsp;VIEW RESULTS</span></a>	
					</td>
					<?php
					}
					else{
					?>
					<td>
						<span class="glyphicon">&nbsp;UNATTEMPTED</span>				
					</td>
					<td>
						<span class="glyphicon glyphicon-ban-circle" style="color:red; cursor:pointer;">&nbsp;VIEW RESULTS</span>					
					</td>
					<?php 
					}
				}
					?>
				</tbody>
			</table>
		</div>			
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
