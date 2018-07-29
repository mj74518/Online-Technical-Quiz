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
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>ONLINE TECHNICAL QUIZ</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    
  </head>

<body style="background-image:url('images/16.jpg'); background-size:100%;">
<section id="container" >
	<?php
		include('header_nav.php');
		include('index_nav.php');
	?>
	<section id="main-content">
		<section class="wrapper">
		<div class="row">
		<div class="content-panel">
		<div class="row">
			<span class="title1" style="margin-left:20%;font-size:30px;"><b>What You Want! to do...</b></span><br /><br />
		<div class="col-md-12">
				<div class="col-md-12"> 
				<a href="index.php"><input  type="submit"  class="btn btn-success" value="Back"/></a>
				</div>
				<div class="col-md-3"></div>
		<div class="col-md-6">   
			
			<form class="form-horizontal title1" action="edit_course.php"  method="post">
			<fieldset>
			<?php
			$sub_id=$_GET['id'];
			$sub_query=mysqli_query($con,"SELECT sub_name FROM subject WHERE sub_id='$sub_id'");
			while($r=mysqli_fetch_assoc($sub_query)){
			?>
				<div class="form-group">
				<label class="col-md-12 control-label"></label>  
				<div class="col-md-12">
				<input name="sub_name" value="<?php echo $r['sub_name']; ?>" class="form-control input-md" type="text"/>
				<input style="display:none;" name="sub_id" value="<?php echo $sub_id; ?>" class="form-control input-md" type="text"/>
				</div>
				</div>
			<?php
			}
			?>
				<div class="form-group">
				<label class="col-md-12 control-label"></label>
				<div class="col-md-12"> 
				<input  type="submit" name="create_btn2" style="margin-left:45%" class="btn btn-primary" value="Update Subject" class="btn btn-primary"/>
				</div>
				</div>

			</fieldset>
			</form>
			</div>

			</div>
			</div>
			</div>
			</div>  
			
			<?php
			
				if(isset($_POST['create_btn2'])){
				
			
				$sub_id = $_POST['sub_id'];
				$sub_name = mysqli_real_escape_string($con,$_POST['sub_name']);
				
				$query2="UPDATE `subject` SET `sub_name`='$sub_name' WHERE sub_id='$sub_id'";
				$query_run = mysqli_query($con,$query2);
				if($query_run){
				echo '<script type="text/javascript"> alert("Subject Updated Successfully")</script>';		
				echo "<script> location.href= 'update_course.php' </script>";		
				}
				else{
				echo '<script type="text/javascript"> alert("Error Creating")</script>';		
				}
				}
			?>				
			</section>
	</section>
<footer class="site-footer" style="bottom:0px;position:fixed;width:100%;">
	<div class="text-center">2018 - Mohit Chandra Joshi
		<a href="index.php#" class="go-top">
		<i class="fa fa-angle-up"></i>
		</a>
	</div>
</footer>
  </section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" class="include" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.nicescroll.js"></script>
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
