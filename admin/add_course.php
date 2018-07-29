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
		
		<div class="content-panel">
		<div class="row">
			<span class="title1" style="margin-left:20%;font-size:30px;"><b>What You Want! to do...</b></span><br /><br />
		<div class="col-md-12">
				<div class="col-md-12"> 
				<a href="index.php"><input  type="submit"  class="btn btn-success" value="Back"/></a>
				</div>
				<div class="col-md-3"></div>
		<div class="col-md-6">   
			
			<form class="form-horizontal title1" action="add_course.php"  method="post">
			<fieldset>
				<div class="form-group">
				<label class="col-md-12 control-label"></label>  
				<div class="col-md-12">
				<input name="course_name" placeholder="Enter Course Name" class="form-control input-md" type="text" required />

				</div>
				</div>

				<div class="form-group">
				<label class="col-md-12 control-label"></label>
				<div class="col-md-12"> 
				<input  type="submit" name="create_btn" style="margin-left:45%" class="btn btn-primary" value="Add Course" class="btn btn-primary"/>
				</div>
				</div>

			</fieldset>
			</form>
					<div style="margin-left:45%" class="btn"><b>OR</b></div>
			<form class="form-horizontal title1" action="add_course.php"  method="post">
			<fieldset>
				<div class="form-group">
				<label class="col-md-12 control-label"></label>  
				<div class="col-md-12">
				<select name="course_id2" class="form-control" >
				<option value="0">Select Course</option>
					<?php
					$q = $con->query("SELECT course_id,course_name FROM course");
					$i=1;
					while($row = mysqli_fetch_array($q))
					{
					?>						
					<option value="<?php echo $row['course_id'];?>"><?php echo $row['course_name'];?></option>
					<?php	
					}
					?>
				</select>
				</div>
				</div>
				<div class="form-group">
				<label class="col-md-12 control-label"></label>  
				<div class="col-md-12">
				<input name="sub_id" placeholder="Enter Subject id in the format eg: 101" maxlength="3" class="form-control input-md" type="text"/>
				</div>
				</div>
				
				<div class="form-group">
				<label class="col-md-12 control-label"></label>  
				<div class="col-md-12">
				<input name="sub_name" placeholder="Enter Subject Name" class="form-control input-md" type="text"/>
				</div>
				</div>

				<div class="form-group">
				<label class="col-md-12 control-label"></label>
				<div class="col-md-12"> 
				<input  type="submit" name="create_btn2" style="margin-left:45%" class="btn btn-primary" value="Add Subject" class="btn btn-primary"/>
				</div>
				</div>

			</fieldset>
			</form>
			</div>

			</div>
			</div>
			
			</div>  
			
			<?php
				if(isset($_POST['create_btn'])){
				
				$course_name = $_POST['course_name'];
				
				$quer="SELECT * from course WHERE course_name='$course_name'";
				$que=mysqli_query($con,$quer);
				if(mysqli_num_rows($que)>0){
				echo '<script type="text/javascript"> alert("Course '.$course_name.' already exits")</script>';
				echo "<script> location.href = 'add_course.php';</script>";
				}else{
					$ff=$_POST['course_name'];
					$name=explode(" ",$ff);
					$course_id = "";
					foreach($name as $i)
					{
					$course_id = $course_id . $i;
					$course_id=$course_id.date("Ymd");
				
					$query="INSERT INTO `course`(`course_id`,`course_name`) VALUES ('$course_id','$course_name')";
					$query_run = mysqli_query($con,$query);

					if($query_run){
					echo '<script type="text/javascript"> alert("Course Added Successfully")</script>';		
					echo "<script> location.href = 'add_course.php';</script>";
					}
					else{
					echo '<script type="text/javascript"> alert("Error Creating")</script>';		
					}
					}
					}				
				}

				if(isset($_POST['create_btn2'])){
				
			
				$course_id = $_POST['course_id2'];
				$sub_id = $_POST['sub_id'];
				$sub_name = mysqli_real_escape_string($con,$_POST['sub_name']);
				
				$quer2="SELECT * from subject WHERE sub_name='$sub_name'";
				$que2=mysqli_query($con,$quer2);
					if(mysqli_num_rows($que2)>0){
					echo '<script type="text/javascript"> alert("'.$sub_name.' subject already exits")</script>';
					}
					else
					{
						$query2="INSERT INTO `subject`(`sub_id`, `sub_name`, `course_id`) VALUES ('$sub_id', '$sub_name', '$course_id')";
						$query_run = mysqli_query($con,$query2);
						if($query_run){
						echo '<script type="text/javascript"> alert("Subject Added Successfully")</script>';		
						}
						else{
						echo '<script type="text/javascript"> alert("Error Creating")</script>';		
						}
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
