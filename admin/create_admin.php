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

	<?php
		include('header_nav.php');
		include('index_nav.php');
	?>
	<section id="main-content">
	<section class="wrapper">
		<br /><a href="index.php"><input  type="submit"  class="btn btn-success" value="Back"/></a>
	</section>
	</section>
			
			
			<form class="form-login" action="#" method="post">
		        <h2 class="form-login-heading">add admin</h2>
		        <div class="login-wrap">
		            <input type="text" name="full_name" class="form-control" placeholder="Full Name" autofocus>
		            <br>
					<input type="email" name="email" class="form-control" placeholder="Email ID" autofocus>
		            <br>
					<input type="text" name="city_name" class="form-control" placeholder="City" autofocus>
		            <br>
					<input type="number" name="contact" maxlength="10" size="10" class="form-control" placeholder="Contact" autofocus>
		            <br>
		           <button class="btn btn-theme btn-block" name="submit_btn" type="submit"><i class="fa fa-lock"></i> SUBMIT</button>
		            <hr>
		        </div>
		
		        <?php
			if(isset($_POST['submit_btn']))
			
				{	
				$ff=$_POST['full_name'];
				$name=explode(" ",$ff);
				$username = "";
				foreach($name as $i){
					$username = $username . $i;
				}
				$username=$username.date("Ymd");
				$fullname=$_POST['full_name'];
				$password=$username;
				$contact=$_POST['contact'];
				$city_name=$_POST['city_name'];
				$email=$_POST['email'];
					
				if ($fullname!='' AND $password!='' AND $email!=''){
					$query= " select * from admin WHERE email='$email'";
					$query_run = mysqli_query($con,$query);
					 
					if(mysqli_num_rows($query_run)>0) 
					{
						echo '<script type="text/javascript"> alert("Email already exits.. Try Another Email")</script>';
					}
			
					else
					{
					$query1= "INSERT INTO `admin`(`admin_id`,`admin_name`, `admin_psswd`, `contact`, `email`, `pic_status`)
					VALUES ('$username','$fullname','$password','$contact','$email','0')";
					$query_ = mysqli_query($con,$query1);
				
					if($query_)
					{
						echo '<script type="text/javascript"> alert("Admin Added Successfully...")</script>';
						echo "<script> location.href = 'create_admin.php';</script>";
					}
					}
				}	
				else
				{
					echo '<script type="text/javascript"> alert("Unable To ADD!")</script>';
				}
				}
				?>
		      </form>	  	
	  	
			
<footer class="site-footer" style="bottom:0px;position:fixed;width:100%;">
	<div class="text-center">2018 - Mohit Chandra Joshi
		<a href="index.php#" class="go-top">
		<i class="fa fa-angle-up"></i>
		</a>
	</div>
</footer>

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
		else
		{
		echo '<script type="text/javascript"> alert("You Do not have authority to create admin...")</script>';
		echo "<script> location.href = 'index.php';</script>";
		}

	}
	else
	{
	header('Location:logout.php');
	}

	?>
</html>
