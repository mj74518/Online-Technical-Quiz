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
    <link href="assets/css/style-responsive.css" rel="stylesheet"></head>

  <body>
	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="sign_up.php" method="post">
		        <h2 class="form-login-heading">sign up now</h2>
		        <div class="login-wrap">
		            <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
		            <br>
					<input type="text" name="email" class="form-control" placeholder="Email ID" autofocus>
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="Password">
					<br>
					<input type="password" name="cpassword" class="form-control" placeholder="Retype Password">
					<br>
				
				
		            <button class="btn btn-theme btn-block" name="submit_btn" type="submit"><i class="fa fa-lock"></i> SIGN UP</button>
		            <hr>
		            
		           
		            <div class="registration">
		                Already a User?<br/>
		                <a class="" href="login.php">
		                    Login Here
		                </a>
		            </div>
		
		        </div>
		
		        <?php
			if(isset($_POST['submit_btn']))
			
				{	
					$username=$_POST['username'];
					$password=$_POST['password'];
					$cpassword=$_POST['cpassword'];
					$email=$_POST['email'];
					
						if ($username!='' AND $password==$cpassword AND $email!=''){
							$query= " select * from user WHERE user_id='$username'";
							$query_run = mysqli_query($con,$query);
							 
							if(mysqli_num_rows($query_run)>0) 
							{
								echo '<script type="text/javascript"> alert("Username already exits.. Try Another Username")</script>';
							}
					
							else
							{
							$query1= "INSERT INTO `user`(`user_id`, `user_psswd`, `email`, `pic_status`)
							VALUES ('$username','$password','$email','0')";
							$query_ = mysqli_query($con,$query1);
						
							if($query_)
							{
								echo '<script type="text/javascript"> alert("You Have Registered Successfully... Go To Login Page")</script>';
								echo "<script> location.href = 'login.php';</script>";
							}
							}
						}	
						else
						{
							echo '<script type="text/javascript"> alert("Unable To Register!")</script>';
						}
				}
				?>
		      </form>	  	
	  	
	  	</div>
	  </div>


<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
<script>
$.backstretch("assets/img/login-bg.jpg", {speed: 500});
</script>
  </body>
</html>
