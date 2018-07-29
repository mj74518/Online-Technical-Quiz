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
		<a href="update_quiz.php"><input  type="submit"  class="btn btn-primary" style="margin-left:2%;" value="Back"/></a><br /><br />
		
		
		<span class="title1 visible-lg visible-md" style="margin-left:6%;font-size:30px;">
		
		<b>Update Question Details</b></span><span class="title1 visible-sm visible-xs" style="font-size:25px;">
		
		<b>Update Question Details</b></span><br />
		
		<div class="col-md-3"></div><div class="col-md-6">
		
		<fieldset>
			<?php
			$test_id=@$_GET['id'];
			$n=@$_GET['n'];
			$q = $con->query("SELECT * FROM question WHERE test_id='$test_id'");
			echo '<div class="panel" style="margin:5%">';
			$i=1;
			while($row = mysqli_fetch_array($q))
			{
				
			$qns=$row['quiz_ques'];
			$qid=$row['que_id'];
?>
			<form action="edit_quizdb.php?n=<?php
		if(isset($_GET['n'])){
		echo $_GET['n'];
		}
		?>&test_id=<?php
		if(isset($_GET['id'])){
		echo $_GET['id'];
		}
		?>" method="POST"  class="form-horizontal">
			<table class="table table-hover table-condensed" border="0">
			
			<?php
			echo'
			<h4><b>Question &nbsp;'.$i.'&nbsp;:: </b></h4>';
			echo '<textarea rows="3" cols="5" name="qns'.$i.'" class="form-control">'.$qns.'</textarea>';
			echo '<br />
			<tbody> <tr>';
			$que_id=$row['que_id'];
			$ans1=$row['ans1'];
			$ans2=$row['ans2'];
			$ans3=$row['ans3'];
			$ans4=$row['ans4'];
			$options=$row['correct_ans'];
			echo'<input style="display:none;" type="text" name="que_id'.$i.'" value="'.$que_id.'">';
			echo'<td>Option 1:</td><td><input class="form-control" type="text" name="'.$i.'ans1" value="'.$ans1.'">
			</td></tr>
			<tr>';
			echo'<td>Option 2:</td><td><input class="form-control" type="text" name="'.$i.'ans2" value="'.$ans2.'">
			<tr>';
			echo'<td>Option 3:</td><td><input class="form-control" type="text" name="'.$i.'ans3" value="'.$ans3.'">
			</td></tr>
			<tr>';
			echo'<td>Option 4:</td><td><input class="form-control" type="text" name="'.$i.'ans4" value="'.$ans4.'">
			</td></tr>';
			echo'<td>Correct Answer:</td><td>
		<select id="ans'.$i.'" name="correct_ans'.$i.'" placeholder="Choose correct answer " class="form-control" >'?>
		<option value="a" <?php if($options=="a") echo'selected="selected"';?> >option a</option>
		<option value="b" <?php if($options=="b") echo'selected="selected"';?> >option b</option>
		<option value="c" <?php if($options=="c") echo'selected="selected"';?> >option c</option>
		<option value="d" <?php if($options=="d") echo'selected="selected"';?> >option d</option> </select>
			</td></tr>
			</tbody>
			</table>
			<hr>
			<?php
			$i=$i+1;
			}?>
			<br />
			<button type="submit" class="btn btn-primary" style="float:right;">
			<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button>
			</form>
			</div>

		<!--form close-->
	
		</fieldset>
		<br />
		<br />
	
	</div>
	
	</div>
	</div>
	</section>
	</section>
<!--main content end-->
<footer class="site-footer" style="bottom:0px; position:fixed; width:100%;">
	<div class="text-center">2018 - Mohit Chandra Joshi
	<a href="#" class="go-top">
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