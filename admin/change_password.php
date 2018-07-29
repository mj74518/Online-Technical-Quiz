<?php
 session_start();
 ob_start();
 include('dbconfig/config.php');	
	if($_SESSION['username'])
{	
	$result_1 = $con->query("Select * from admin");
	while($row_1 = $result_1->fetch_assoc())
	{ 
	//echo $row_1['admin_name'];
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
    <link href="assets/css/style-responsive.css" rel="stylesheet"></head>

 <body style="background-image:url('images/16.jpg'); background-size:100%;">
	<section id="container" >
  <?php
include('header_nav.php');
?>     
      <?php
		include('index_nav.php');
	  ?>
	  <div id="login-page">
	  
	  	<div class="container">
		<?php
				$count=$msg="";
				if(isset($_POST['submit']))
				{
					include("dbconfig/config.php");
					$username=$_SESSION['username'];
					$oldpass=$_POST['oldpass'];
					$newpass=$_POST['newpass'];
					$conpass=$_POST['conpass'];

					$query_check="select * from admin where admin_id='$username' AND admin_psswd='$oldpass'";
					$result=mysqli_query($con,$query_check);
					$count=mysqli_num_rows($result);
					if($count > 0)
					{
						if($newpass==$conpass){
							$query="update admin set admin_psswd='$newpass' where admin_psswd='$oldpass' and admin_id='$username' ";
							$res=mysqli_query($con,$query);
							if($res)
							{
								echo"<script>alert('Password Updated Successfully')</script>";
							}
						}
						else{
							$msg="New Password And Confirm Password Does not Match Try Again...";
						}
					}
					else
					{
						$msg="Old Password Is Incorrect";
					}
				}
				?>	
	  	
		      <form class="form-login" action="change_password.php" method="post">
		        <h2 class="form-login-heading">change password</h2>
		        <div class="login-wrap">
		            
		            <input type="password" name="oldpass" class="form-control" placeholder="Old Password">
					<br> 
					<input type="password" name="newpass" class="form-control" placeholder="New Password">
					<br>
					<input type="password" name="conpass" class="form-control" placeholder="Confirm Password">
					<br>
				
				
		            <button class="btn btn-theme04 btn-block" name="submit" type="submit"><i class="fa fa-upload"></i> UPDATE PASSWORD</button>
				<font color='red'>
				<?php echo $msg ?>
				</font>
		        </div>
		
		      </form>	  	
	  	
	  	</div>
	  </div>
	  </section>

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
