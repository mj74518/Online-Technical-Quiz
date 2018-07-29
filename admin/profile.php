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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE TECHNICAL QUIZ</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />  
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
	<style>
	.pfimage{
	width: 200px;
	padding: 10px;
	
	margin-left: 50px;
	overflow: hidden;	
	}
	
.pfimage img {
	width: 150px;
}
	</style>
    
   
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
			<div class="content-panel">
			
					<center>
					<form  action="#" method = "post" enctype="multipart/form-data">
					<?php
				if(isset($_POST['update']))
				{
					include("dbconfig/config.php");
					$username=$_SESSION['username'];
					$fullname=$_POST['fullname'];
					$contact=$_POST['contact'];
					$email=$_POST['email'];

					$query="update admin set `admin_name`='$fullname', `email`='$email', `contact`='$contact' WHERE admin_id='$username' ";
					$res=mysqli_query($con,$query);
					if($res)
					{
						echo"<script>alert('Profile Updated Successfully')</script>";
						header('Refresh:0');
					}
					else{
						$msg="New Password And Confirm Password Does not Match Try Again...";
					}
				}
				?>	
	  	
					<table class="table-condensed">
					<thead>
					<center><h2>
							<font color="blue">
								<b>Update Profile</b>
							</font>
							</h2>
					</center>
					
					
					</thead>
					
					<tbody>
					<tr><td colspan ="4"><h3>Basic Details- <hr/></h3></td></tr>
						
						<tr>
							<td colspan="2"><label>Username:</label></td>
							<td colspan="1"><input name="username" type="text" class="form-control" value="<?php echo $row_1['admin_id']; ?>" disabled="disabled"/></td>
						</tr>
						<tr>
							<td colspan="2"><label>Name:</label></td>
							<td colspan="1"><input name="fullname" type="text" class="form-control" value="<?php echo $row_1['admin_name']; ?>"  ></td>
							<td rowspan="3">
							<div class="pfimage" style="margin-left:100px">
							<?php
									if($row_1['pic_status']==1){
										echo"<img src='uploads/profile".$_SESSION['username'].".jpg?'".mt_rand().">";
									}
									else{
										echo"<img src='uploads/profiledefault.jpg'>";
									}
							?>
							</div>
							
							<input type="file" class="btn btn-primary" name="file" style="margin-left:50px"><br>
							<button type="submit" class="btn styled-button-8" style="margin-left:140px" name="submit_image" />Upload</button>
							<?php
								include('upload_pic.php');
								
							?>
							</td>
								
						</tr>

						<tr>
							<td colspan="2">Contact no.:&nbsp;&nbsp;<b>+91</td>
							<td colspan="1"><input name="contact" type="text" class="form-control" maxlength="10" value="<?php echo $row_1['contact']; ?>" /></td>
						</tr>
						
						
						 <tr>
							 <td colspan="2"><label>Email Id :</label></td>
							<td colspan="1">
							<input name="email" type="email" class="form-control" maxlength="80" value="<?php echo $row_1['email']; ?>" /></td>
						</tr>

						<tr><td colspan="4">
						<input type = "submit" value="Update" name="update" class="btn btn-primary" style="margin-left:45%;"/>
						</td></tr>
					
					
					</tbody>			 
					</table>	 
					</form>	
				</center>
			
			</div>  
			</div>
			</section>
	</section>



<footer class="site-footer" style="
	bottom:0px;
	position:fixed;
	width:100%;
	">          <div class="text-center">
              2018 - Mohit Chandra Joshi
              <a href="index.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
    
  </section>


    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
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
