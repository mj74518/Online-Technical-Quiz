<?php	
 session_start();
 ob_start();
 include('dbconfig/config.php');	
	if($_SESSION['username'])
{	
	$result_1 = $con->query("Select * from user");
	while($row_1 = $result_1->fetch_assoc())
	{ 
		if($row_1['user_id']==$_SESSION['username']){
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

  <body style="background-image:url('images/header.jpg'); background-size:100%;" >
  <?php include('index_nav.php') ?>
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

					$query_check="select * from user where user_id='$username' AND user_psswd='$oldpass'";
					$result=mysqli_query($con,$query_check);
					$count=mysqli_num_rows($result);
					if($count > 0)
					{
						if($newpass==$conpass){
							echo $query="update user set user_psswd='$newpass' where user_psswd='$oldpass' and user_id='$username' ";
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
	  	
		      <form class="form-login" action="change_pass.php" method="post">
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


<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>

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
