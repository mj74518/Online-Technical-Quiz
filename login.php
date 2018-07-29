<?php
	
 session_start();
 ob_start();
 include('dbconfig/config.php');	

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

  <body>
	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="login.php" method="post">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="Password">
					<br>
				
				<label><b>Usertype:&nbsp;&nbsp;&nbsp;</b></label>
				
				<div>
					<select class="form-control" name="type">
					<option value="-1" selected>Select</option>
					<option value="Student">Student</option>
					<option value="Admin">Admin</option>
					</select>
					</select>
				</div>
				<br>
		            <button class="btn btn-theme btn-block" name="login" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		            
		           
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="sign_up.php">
		                    Create an account
		                </a>
		            </div>
		
		        </div>
			  <?php 
				if(isset($_POST['login']))
				{
					$username=$_POST['username'];
					$password=$_POST['password'];
					$type=$_POST['type'];
					
					if ($type=='Student'){
							
						$query= " select * from user WHERE user_id='$username' AND user_psswd='$password'";
						
						$query_run = mysqli_query($con,$query);
						
						if(mysqli_num_rows($query_run)>0)
						{
							//valid
							$_SESSION['username']= $username; //inbuilt in php, used to create session for the variable which will last until browser is closed, it can be accessed in all the opened related pages.
							header('location:index.php');
						}
						else
						{
							//invalid
							echo '<script type="text/javascript"> alert("Invalid! credentials")</script>';	
						}	
					}
					
					if ($type=='Admin'){
						$query= " select * from admin WHERE admin_id='$username' AND admin_psswd='$password'";
						
						$query_run = mysqli_query($con,$query);
						
						if(mysqli_num_rows($query_run)>0)
						{
							//valid
							$_SESSION['username']= $username; //inbuilt in php, used to create session for the variable which will last until browser is closed, it can be accessed in all the opened related pages.
							header('location:admin/index.php');
						}
						else
						{
							//invalid
							echo '<script type="text/javascript"> alert("Invalid! credentials")</script>';	
						}
					}
					if($type==''){
						echo '<script type="text/javascript"> alert("Select Usertype")</script>';	
						}
				}
			?>
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
