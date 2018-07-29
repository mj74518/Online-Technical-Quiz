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
		<div class="content-panel container">
		<div class="row">
		<button  class="btn btn-warning">
		<a href='cancel_quiz.php?id=<?php
		if(isset($_GET['test_id'])){
		echo $_GET['test_id'];
		}
		?>' data-toggle="tooltip" data-placement="top" title="Remove Quiz">
						<span class="glyphicon glyphicon-trash" style="font-size:20px; color:white">&nbsp;Cancel</span></a>
		</button>
		<span class="title1" style="margin-left:10%;font-size:30px;">
		<b>Enter Question Details</b></span>
		<br /><br />
		<div class="col-md-3"></div><div class="col-md-6">
		
		<form class="form-horizontal title1" name="form" action="create_quiz3.php?n=<?php
		if(isset($_GET['n'])){
		echo $_GET['n'];
		}
		?>&test_id=<?php
		if(isset($_GET['test_id'])){
		echo $_GET['test_id'];
		}
		?>"  method="post">
		<fieldset>
		<?php 
		
		for($i=1;$i<=@$_GET['n'];$i++)
		{
		echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
		<div class="form-group">
		<label class="col-md-12 control-label"></label>  
		<div class="col-md-12">
		<textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
		</div>
		</div>
		<!-- Text input-->
		<div class="form-group">
		<label class="col-md-12 control-label"></label>  
		<div class="col-md-12">
		<input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control" type="text">

		</div>
		</div>
		<!-- Text input-->
		<div class="form-group">
		<label class="col-md-12 control-label"></label>  
		<div class="col-md-12">
		<input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control" type="text">

		</div>
		</div>
		<!-- Text input-->
		<div class="form-group">
		<label class="col-md-12 control-label"></label>  
		<div class="col-md-12">
		<input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control" type="text">

		</div>
		</div>
		<!-- Text input-->
		<div class="form-group">
		<label class="col-md-12 control-label"></label>  
		<div class="col-md-12">
		<input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control" type="text">

		</div>
		</div>
		<br />
		<b>Correct answer</b>:<br />
		<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control" >
		<option value="a">Select answer for question '.$i.'</option>
		<option value="a">option a</option>
		<option value="b">option b</option>
		<option value="c">option c</option>
		<option value="d">option d</option> </select><br /><br />'; 
		}
		?>
			<!--form close-->
		<div class="form-group">
		<label class="col-md-12 control-label" for=""></label>
		<div class="col-md-12"> 
		<input  type="submit" name="key" style="margin-left:45%" class="btn btn-primary" value="Submit"/>
		</div>
		</div>
		</fieldset>
		<br />
		<br />
	</form>
	</div>
	</div>
	</div>
	</div>
	</section>
	</section>
<!--main content end-->
<footer class="site-footer" style="bottom:0px; position:fixed; width:100%;">
	<div class="text-center">2018 - Mohit Chandra Joshi
	<a href="create_quiz.php#" class="go-top">
	<i class="fa fa-angle-up"></i>
	</a>
	</div>
</footer>
</section>

    <!-- js placed at the end of the document so the pages load faster -->
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