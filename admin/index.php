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
<style>
.mylabel{
	background-color: #2c3e50;
	color: white;
	font-size: 16px;
	top: 41%;
	left: 0;
	border-radius:5px;
	width: 60%;
	margin-left:15%;
	text-align:center;
	padding: 5px 0 5px 0;
}

.image {
	opacity: 1;
	display: block;
	width: 95%;
	height: auto;
	transition: .5s ease;
	backface-visibility: hidden;
}

.middle {
	transition: .5s ease;
	opacity: 0;
	position: absolute;
	top: 45%;
	left: 50%;
	transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	text-align: center;
}

.containe:hover .image {
	filter: blur(2px);
  <!-- opacity: 0.3; -->
}

.containe:hover .middle {
	opacity: 1;
}

.text {
	background-color: #4CAF50;
	color: white;
	border-radius:5px;
	left: 0;
	margin-left:-20%;
	padding: 5px 0 5px 0;
}
	</style>
	
  
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
			<div style="color:#00f;"><h2><b>DASHBOARD</b></h2></div>
			<hr>


			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 desc">
			<div class="containe">
			
			<a href="add_course.php">
			<img class="image" style="border-radius:50%;height: auto;" src="assets/img/portfolio/port04.jpg" alt="Add Course">
			<div class="middle"><div class="text"><h5><b>Add Course | Subject</b></h5></div></div></a>
			</div>
			<div class="mylabel"><h5><b>Add Course | Subject</b></h5></div>
			</div>
			&nbsp;
			
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 desc" >			
			<div class="containe">
			<a href="create_quiz.php">
			<img class="image" style="border-radius:50%;height: auto;" src="assets/img/portfolio/port04.jpg" alt="">
			<div class="middle"><div class="text"><h5><b>Create Quiz</b></h5></div></div></a>
			</div>
			<div class="mylabel"><h5><b>Create Quiz</b></h5></div>
			</div>
			&nbsp;
			
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 desc">
			<div class="containe">
			<a href="update_quiz.php">
			<img class="image" style="border-radius:50%;height: auto;" src="assets/img/portfolio/port04.jpg" alt="">
			<div class="middle"><div class="text"><h5><b>Update | Remove Quiz</b></h5></div></div></a>
			</div>
			<div class="mylabel"><h5><b>Update | Remove Quiz</b></h5></div>
			</div>
			&nbsp;
			
			
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 desc">
			<div class="containe">
			<a href="update_course.php">
			<img class="image" style="border-radius:50%;height: auto;" src="assets/img/portfolio/port04.jpg" alt="">
			<div class="middle"><div class="text"><h5><b>Update | Remove Subject</b></h5></div></div></a>
			</div>
			<div class="mylabel"><h5><b>Update | Remove Subject</b></h5></div>
			</div>
			&nbsp;

			
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 desc">
			<div class="containe">
			<a href="view_results.php">
			<img class="image" style="border-radius:50%;height: auto;" src="assets/img/portfolio/port04.jpg" alt="">
			<div class="middle"><div class="text"><h5><b>View Results</b></h5></div></div>
			</a>
			</div>
			<div class="mylabel"><h5><b>View Results</b></h5></div>
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
